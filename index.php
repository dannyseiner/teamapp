<?php
session_start();
require_once('Model/ErrorHandler.php');
require_once('Model/Elementer.php');
// LOAD CONFIG
$config = parse_ini_file('app.ini');
// DISPLAY ERRORS FROM CONFIG SETTINGS
if($config['mode'] == 'development'){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);   
}else if($config['mode'] == 'production'){
    error_reporting(0);
}else{
    ErrorHandler::init([ 
        "header" => "Unknown mode",
        "code" => 101,
        "text" => "Allowed modes [ development , production ] ",
        "file" => "app.ini",
        "line" => "mode = "
    ]);
}
// MAIN SITE
if(isset($config['main_site']) && !file_exists("View/{$config['main_site']}.php") || !file_exists("Controller/{$config['main_site']}.php")){
    ErrorHandler::init([ 
        "header" => "Main site doesn't exists!",
        "code" => 404,
        "text" => "You must create View and Controller for {$config['main_site']}",
        "file" => "app.ini",
        "line" => "main_site = "
    ]);
}

// SHOW LOAD TIME WHEN MODE = DEVELOPMENT ( CONSOLE LOG )
if($config['loadtime'] == 'show'){
    echo '<script type="text/javascript">
        var timerStart = Date.now();
    </script>';
}else if($config['loadtime'] == 'hidden'){

}else{
    ErrorHandler::init([ 
        "header" => "Invalid option",
        "code" => 102,
        "text" => "Allowed options [ show , hidden ] or comment the line.",
        "file" => "app.ini",
        "line" => "loadtime = "
    ]);
}

// REQUIRE FILES  { MODAL / CONTROLLER / VIEW } OPTIONAL { HEAD / NAV}

// HEAD
if(isset($config['head'])) {
    Elementer::Create($config['head']);
}
// NAV
if(isset($config['nav'])) {
    Elementer::Create('nav');
}

spl_autoload_register(function ($class_name) {
    if (file_exists('Model/'.$class_name.'.php')) {
        require_once 'Model/'.$class_name.'.php';
    } elseif (file_exists('Controller/'.$class_name.'.php')) {
        require_once 'Controller/'.$class_name.'.php';
    }
});

require_once 'Routes.php';
