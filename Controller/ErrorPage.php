<?php

class ErrorPage extends Controller
{
    public static function LoadData(){
        self::$data = $_SESSION['error_handler_template'];
    }
}
// EVENTS