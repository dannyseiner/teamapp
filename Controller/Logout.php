<?php 
Class Logout extends Controller{
    public static function log_out_user()
    {
        unset($_SESSION['user']);
        header("Location: login");
    }
}

Logout::log_out_user();