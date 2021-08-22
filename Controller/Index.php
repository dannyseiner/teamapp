<?php

class Index extends Controller
{
    public static function LoadData()
    {
        // LOAD DATA INTO GLOBAL DATA VARIABLE, DATA WILL BE EXTRACTED
        $data_request = self::query('SELECT * FROM users 
        JOIN users_data ON users.id_user = users_data.id_user LIMIT 1');
        self::$data = $data_request[ count($data_request) - 1];
    }
}
// EVENTS