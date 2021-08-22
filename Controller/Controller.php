<?php

class Controller extends DB
{
    protected static $data = [];

    public static function CreateView($view_name)
    {
        // CALL FUNCTION LOAD DATA IF FUNCTION EXISTS
        if (method_exists(lcfirst($view_name), 'LoadData')) lcfirst($view_name)::LoadData();
        extract(self::$data);
        if (file_exists("./View/$view_name.php")) {
            $get_main_css_file = file_get_contents("Src/css/main.css");
            echo '
            <head> <style>' . $get_main_css_file . ' </style> </head>
            <body>';
            require_once "./View/$view_name.php";
            echo '</body></html>';
        }
    }
}
