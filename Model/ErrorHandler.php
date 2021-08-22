<?php 

class ErrorHandler{
    public static function init(array $error){
        $_SESSION['error_handler_template'] = $error;
        if($_GET['url'] !== "ErrorPage") header("Location: ErrorPage");
    }
}