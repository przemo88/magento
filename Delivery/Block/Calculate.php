<?php

class Virtua_Delivery_Block_Calculate extends Mage_Core_Block_Template
{

    public function calculate()
    {


        $temp  = Mage::registry('current_product');



        $value = Mage::getStoreConfig('virtua_delivery/virtua_group/virtua_select');


        $delivery_time = $temp->getDeliveryTime();

        $no_delivery_date = $temp->getNoDeliveryDate();

        $exp_no_delivery_day = explode(',', $no_delivery_date);


        $delivery_day = date('d.m.Y', strtotime("+$delivery_time day", strtotime(date('d.m.Y'))));


        $exp_value = explode(',', $value);


        $number_day = $this->calculate_number_day($delivery_day);


        $a = $this->check($delivery_day, $exp_no_delivery_day, $exp_value, $number_day);

        return $a;

    }


    private function check($delivery_day, $exp_no_delivery_day, $exp_value, $number_day)
    {

        if (in_array($delivery_day, $exp_no_delivery_day) || in_array($number_day, $exp_value)) {
            $delivery_day = date('d.m.Y', strtotime("+1 days", strtotime(date($delivery_day))));

            $number_day = $this->calculate_number_day($delivery_day);
            return $this->check($delivery_day, $exp_no_delivery_day, $exp_value, $number_day);

        } else {
            return $delivery_day;
        }


    }

    private function calculate_number_day($delivery_day)
    {
        $week = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

        $day_to_number = date("l", strtotime($delivery_day));
        for ($d = 0; $d <= count($week); $d++) {
            if ($day_to_number == $week[$d]) {

                $number_day = array_search($day_to_number, $week);
                $number_day += 1;
            }
        }
        return $number_day;
    }



}