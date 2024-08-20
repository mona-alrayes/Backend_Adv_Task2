<?php

namespace Post;

use model\Model;
use Database\Database;

class Post extends Model
{
    public $title;
    public $content;
    public $author;

    public function __construct()
    {
        Database::connect();  // Ensure a connection is made
    }

    public function setAttr($title, $content, $author)
    {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
    }

    public static function listAll()
    {
        $sql = "SELECT * FROM posts";
        return Database::Get($sql);
    }

    public function create()
    {
        $sql = "INSERT INTO posts (title, content, author, created_at, updated_at) 
                VALUES (?, ?, ?, NOW(), NOW())";
        $params = [$this->title, $this->content, $this->author];
        return Database::Query($sql, $params);
    }

    public function read($id)
    {
        $sql = "SELECT * FROM posts WHERE id = ?";
        return Database::Get($sql, [$id]);
    }


    public function update($id)
    {
        $sql = "UPDATE posts SET title = ?, content = ?, author = ?, updated_at = NOW() WHERE id = ?";
        $params = [$this->title, $this->content, $this->author, $id];
        return Database::Query($sql, $params);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM posts WHERE id = ?";
        return Database::Query($sql, [$id]);
    }
}
