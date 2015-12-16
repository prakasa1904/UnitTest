<?php

spl_autoload_register(function ($class_name) {
    $class_name =  str_replace('\\', '/', $class_name);
    $filename =  'app/' . $class_name . '.php';
    if (file_exists($filename)) {
        include($filename);
        if (class_exists($class_name)) {
            return TRUE;
        }
    }
    return FALSE;
});