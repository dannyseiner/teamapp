<?php

class DB
{
    protected static $config;
    private static function con()
    {
        $config = parse_ini_file('app.ini');
        $pdo = new PDO("mysql:host=" . $config['dbhost'] . ";dbname=" . $config['database'] . ";charset=utf8", $config['dbuser'], $config['dbpassword']);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    public static function query($query, $params = array())
    {
        $stmt = self::con()->prepare($query);
        $stmt->execute($params);
        $data = $stmt->fetchAll();
        return $data;
    }
}

