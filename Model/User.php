<?php 

class User extends DB{
    public $id;
    public $username;
    public $email;
    public $password;
    public $image;

    public function __construct($id)
    {
        $get_user_data = self::query("SELECT * FROM users WHERE id_user = $id");
        $this->id = $id;
        $this->username = $get_user_data[0]['username'];
        $this->email = $get_user_data[0]['email'];
        $this->password = $get_user_data[0]['password'];
        $this->image = $get_user_data[0]['profile_image'];
    }

    public function get_user_posts(int $limit = 100) : array
    {
        $posts = self::query("SELECT * FROM posts WHERE id_user = $this->id");
        return $limit == 1 ? $posts[0] : $posts;
    }

    public function get_users_meta($meta_key) : string
    {
        $get_meta = self::query("SELECT * FROM user_meta WHERE meta_key = '$meta_key'");
        return count($get_meta) == 0 ? "" : $get_meta[0];
    }

    public function update_user_meta($meta_key, $meta_value) : void
    {
        self::query("UPDATE users SET meta_value = $meta_value WHERE id_user = $this->id AND meta_key = $meta_key");
    }
    public function get_user(int $id = 1) : array 
    {
        $get_user = self::query("SELECT * FROM users WHERE id_user = $id");
        return count($get_user) == 0 ? [] : $get_user[0];
    }

    public function get_friends_count() : int 
    {
        return count(self::query("SELECT * FROM friends WHERE id_user1 = $this->id OR id_user2 = $this->id"));
    }

}

$user = new User($_SESSION['user']['id_user']);