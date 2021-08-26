<?php

class Posts extends DB
{
    public $id;
    public $title;
    public $content;
    public $author_id;
    public $author;
    public $post_data;

    public function __construct(int $id = 1)
    {
        $this->id = $id;
        $this->title = $this->post_data['title'];
        $this->content = $this->post_data['content'];
        $this->author = $this->get_author();
        $this->post_data = $this->get_post_data($id);
    }

    public function get_post_data(int $id_p = 1): array
    {
        $post = self::query("SELECT * FROM posts WHERE id_post = $this->id");
        return $post[0];
    }

    public function get_posts_tags(): array
    {
        $tags = self::query("SELECT * FROM c_post_tag WHERE id_post = $this->id");
        return count($tags) == 0 ? [] : $tags;
    }
    public function get_author(): array
    {
        $author = self::query("SELECT * FROM users WHERE id_user = $this->author_id");
        return $author[0];
    }

    public function get_posts_comments(): array
    {
        return count(self::query("SELECT * FROM comments WHERE id_post = $this->id")) == 0 ? [] : self::query("SELECT * FROM comments WHERE id_post = $this->id");
    }
}
