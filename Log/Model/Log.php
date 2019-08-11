<?php

class Virtua_Log_Model_Log
{
    public function create()
    {
        Mage::log("Test,utworzono: ". now(), null, 'test.log');
    }
}