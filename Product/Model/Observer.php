<?php

class Virtua_Product_Model_Observer
{
    public function checkAvailability()
    {
        $store_id = Mage::app()->getDefaultStoreView()->getStoreId();
        Mage::app()->setCurrentStore($store_id);

        $collection = Mage::getModel('virtua_product/product')->getCollection()
            ->addFieldToSelect(array('id','product_id','name','email','create'));



        $collection->getSelect()->join(array('product' => cataloginventory_stock_item), 'product.product_id = main_table.product_id',array('product.is_in_stock') );

        foreach ($collection as $c )
        {
            $name[] = $c['name'];
            $email[] = $c['email'];
            $is_in_stock[] = $c['is_in_stock'];
            $create[] = $c['create'];
            $product_id[] = $c['product_id'];
            $id[] = $c['id'];
        }

        $collection_count = count($collection);

        $products = Mage::getModel('catalog/category')->load()
            ->getProductCollection()
            ->addAttributeToSelect('entity_id')
            ->addAttributeToSelect('status')
            ->addAttributeToFilter('status', array('eq' => Mage_Catalog_Model_Product_Status::STATUS_ENABLED));

        foreach($products as $p)
        {
            $entity_id[] = $p['entity_id'];
        }

        $z = 1;
        for($a = 0; $a <= $collection_count; $a++)
        {
            if(in_array($product_id[$a],$entity_id))
            {
                if($is_in_stock[$a] == '1' && $create[$a] == null )
                {
                    try {

                        $config = array(
                            'ssl' => 'tls',
                            'port' => 587,
                            'auth' => 'login',
                            'username' => 'blagoff88@gmail.com',
                            'password' => 'INF1988_&'
                        );

                        $transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);

                        $wiadomosc = 'Twoj produkt ' . $name[$a] . ' jest juz dostepny.';

                        Zend_Mail::setDefaultTransport($transport);
                        echo $z . ' ' . $email[$a] . '<br>';
                        $z++;
                        $mail = new Zend_Mail('UTF-8');
                        $mail->addTo($email[$a], 'Odbiorca');
                        $mail->setFrom('p.przewoznik@virtuasoftware.com', 'Nadawca');
                        $mail->setSubject('Temat wiadomosci');
                        $mail->setBodyText($wiadomosc);
                        $mail->send();


                        $update = array('create' => now());

                        $model = Mage::getModel('virtua_product/product')->load($id[$a])->addData($update);

                        try
                        {
                            $model->setId($id[$a])->save();
                            echo 'Zapisano do bazy<br>';
                        }
                        catch(Exception $e)
                        {
                            echo $e->getMessage();
                        }

                    }
                    catch(Exception $e)
                    {
                        echo $e->getMessage();

                    }
                }
            }

        }
    }


}
