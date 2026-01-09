<?php
declare(strict_types=1);

class Autoload{
    public static function register(){
        spl_autoload_register(function ($class) {
            $baseDir = __DIR__ . '/app/'; 
            $class = str_replace('App\\', '', $class); 
            $file = $baseDir . str_replace('\\', '/', $class) . '.php';
            if (file_exists($file)) {
                require_once $file;
            } else {
                echo " Fichier non trouvé: $file\n"; 
            }
        });
    }
}
