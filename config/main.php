<?php
$simpleConfig = [];

$simpleConfig['default_method']      = 'index';
$simpleConfig['controller_location'] = 'Controllers';
$simpleConfig['src_dir']             = 'src';


function getConfig($key) {
    global $simpleConfig;

    if(array_key_exists($key, $simpleConfig)){
        return $simpleConfig[$key];
    }
    return null;
}
