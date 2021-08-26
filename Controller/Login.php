<?php

class Login extends Controller
{
    public static function login_user(): void
    {
        $email = $_POST["remail"];
        $get_user = self::query("SELECT * FROM users WHERE email = '$email'");
        if (count($get_user) == 0)  return;
        if (password_verify($_POST["rpassword"], $get_user[0]["password"])) {
            $_SESSION["user"] = $get_user[0];
            header("Location: dashboard");
        }
    }
    public static function register_user(): void
    {
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $check_for_same_acc = self::query("SELECT * FROM users WHERE username = '$username' OR email = '$email'");
        if (count($check_for_same_acc) !== 0) return;
        self::query("INSERT INTO users (username, email, password, profile_image) VALUES ('$username','$email','$password'");
    }
}

if (isset($_POST['login'])) Login::login_user();
if (isset($_POST['register'])) Login::register_user();
