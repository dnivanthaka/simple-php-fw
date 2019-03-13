<?php
$methodCall = 'index';
$controllerLocation = 'Controllers';
    // Your custom class dir
    define('CLASS_DIR', 'src'.DIRECTORY_SEPARATOR);

    // Add your class dir to include path
    set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);

    // You can use this trick to make autoloader look for commonly used "My.class.php" type filenames
    spl_autoload_extensions('.php');

    // Use default autoload implementation
    spl_autoload_register(function($class){
//        try{
//            spl_autoload($class);
//        }catch(\LogicException $e){
//            echo '404 Cannot find controller '.$class;
//        } 
        spl_autoload(ucfirst($class));
    });

//    print_r($_SERVER);
    $path = filter_input(INPUT_SERVER, 'PATH_INFO', FILTER_SANITIZE_URL);
    $segments = explode('/', $path);
    
    $controller = $segments[1];
    $params = array_slice($segments, 2);
    $class_file = __DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.ucfirst($controller).'.php';
    
    if(file_exists($class_file)){
        include $class_file;
        $controllerInstance = new $controller();
        // params[0] could be a method call, check if a function exists
        if(count($params) == 0 || empty($params[0])){
            if (method_exists($controllerInstance, $methodCall)) {
                call_user_func(array($controllerInstance, $methodCall));
                exit();
            }else{
                 echo '404 Cannot find method '.$methodCall;
            }
        }else{
            if($params[0] && is_numeric($params[0])){
                if (method_exists($controllerInstance, $methodCall)) {
                    call_user_func_array(array($controllerInstance, $methodCall), $params);
                    exit();
                }else{
                     echo '404 Cannot find method '.$methodCall;
                }
            }else{
                // First check if a method exists or else send this as a param to index method
                if(count($params) > 0 && method_exists($controllerInstance, $params[0])){
                    $actual_params = array_slice($params, 1);
                    call_user_func_array(array($controllerInstance, $params[0]), $actual_params);
                    exit();
                }else{
                        //404 error
                        echo '404 Cannot find method '.$methodCall;
                }
            }
        }
        
    }else{
        echo '404 Cannot find controller '.$controller;
    }
    
    