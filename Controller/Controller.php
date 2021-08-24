<?php

class Controller extends DB
{
    protected static $data = [];

    public static function CreateView($view_name)
    {
        if(isset($_SESSION['user'])) require_once './Model/User.php';
        if(!isset($_SESSION['user']) && $_GET['url'] !== 'login') header("Location: login");
        // CALL FUNCTION LOAD DATA IF FUNCTION EXISTS
        if (method_exists(lcfirst($view_name), 'LoadData')) lcfirst($view_name)::LoadData();
        extract(self::$data);
        if (file_exists("./View/$view_name.php")) {
            echo '<head>';
                require_once "./Src/css/main.php";
                require_once "./Src/php/head.php";
            echo ' </head>
                <body>';
                    if($_GET['url'] !== 'login') require_once "./Src/php/navbar.php";
                    require_once "./View/$view_name.php";
                    require_once "./Src/js/main.php";
            echo '</body></html>';
        }
    }

    public static function image(string $image, string $class = '') 
    {
        return '<img class="$class" src="data:image/png;base64,'.base64_encode($image).'">';
    }
}
