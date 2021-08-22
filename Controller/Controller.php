<?php

class Controller extends DB
{
    protected static $data = [];
    protected static $config;

    public static function CreateView($view_name)
    {
        self::loadConfig();
        // CALL FUNCTION LOAD DATA IF FUNCTION EXISTS
        if(method_exists(lcfirst($view_name),'LoadData')) lcfirst($view_name)::LoadData();
        extract(self::$data);
        if (file_exists("./View/$view_name.php")) {
            require_once "./View/$view_name.php";
            $config = parse_ini_file('app.ini');
            if(isset($config['footer'])) {
                Elementer::Create($config['footer']);
            }
            if($config['loadtime'] == 'show' && $config['mode'] == 'development') {
                echo '
                    <script type="text/javascript">
                        window.onload = function() {
                            console.log("Website load time: ", Date.now()-timerStart+"ms");
                        };
                    </script>';
            }
        }
    }
    public static function loadConfig()
    {
        self::$config = parse_ini_file('app.ini');
    }
}
