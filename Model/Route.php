<?php

class Route
{
    public static $validRoutes = [];
    
    public static function set(string $route, $function)
    {
        self::isValid($_GET['url']);
        self::$validRoutes[] = $route;
        if ($_GET['url'] == $route) {
            $function->__invoke();
        }
    }

    public static function isValid(string $route)
    {
        $config = parse_ini_file('app.ini');

        if($_GET['url'] == 'index.php') {
            header("Location: {$config['main_site']}");
            return;
        }
        if (!file_exists("View/".ucfirst($route).".php")) {
            $_SESSION['error_handler_template'] = [ 
                "header" => "Site doesnt exists",
                "code" => 404,
                "text" => "This website doesn't exists ",
                "file" => $route,
                "line" => "NULL"
            ];
            header('Location: Errorpage');
        }
    }
}
