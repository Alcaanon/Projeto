<?php 
    session_start();

    date_default_timezone_set('America/Sao_Paulo');

    spl_autoload_register(function($file_name){
        
        $files = array(
            "php" . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "{$file_name}.php",
            "php" . DIRECTORY_SEPARATOR . "repository" . DIRECTORY_SEPARATOR . "{$file_name}.php",
            "php" . DIRECTORY_SEPARATOR . "service" . DIRECTORY_SEPARATOR . "{$file_name}.php",
        );

        foreach ($files as $fileName) {
            if(file_exists($fileName)) {
                require_once($fileName);
            }
        }
    });