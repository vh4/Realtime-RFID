<?php
/* 
--------------------------------------------------------------------------------------------
            application for CRUD to register any class with function register will be easy

                   use this for any class and call them with namespace or other namer function

                        welcome to register class autoload function :v



--------------------------------------------------------------------------------------------
                        */
                        
spl_autoload_register(function($class){
    $class = explode('\\', $class);
    $class = end($class);

    require_once __DIR__. '/../Controller/'. $class. '.php';
});