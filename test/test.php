<?php
include '../vendor/autoload.php';

$client = new \OceanEngineThink\clients\OceanEngineClient();

$device = $client->setDevice('Android');

//echo $device->getShowLink();
//echo "\n";
//echo $device->getClickLink();
//echo "\n";
//echo $device->getShowLink();
//echo "\n";
//echo $device->getClickLink();

$callback = $device->getDevice()->setCallbackParam([
        'callback_param' => 'CI7giPTo2PsCEJ7giPTo2PsCGNGmoon6AiDvreXdkAEojqjKl-rY-wIwDDgBQiIyMDIwMDYxOTE1MzUyMTAxMDEzMDAzNzEzMTJGMDJGNDMwSAFQAA==',
    ])->activation();

var_dump($callback);