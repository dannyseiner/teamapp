<?php 

class Posts extends DB {
    public $id;
    public $title;
    public $content;
    public $author;

    public function __construct(int $id = 1)
    {
        
    }
}