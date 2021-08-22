<?php
class Users extends Controller
{
    public static function LoadData()
    {
        self::$data = self::query("SELECT * FROM users");
    }
}
