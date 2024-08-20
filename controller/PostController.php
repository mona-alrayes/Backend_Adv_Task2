<?php
use Post\Post;
use controller\Controller;

class PostController extends Controller
{
    private $post; // Declare a property to hold the Post object

    public function __construct()
    {
        $this->post = new Post(); // Instantiate the Post object once in the constructor
    }

    public function index()
    {
        return Post::listAll(); // This is a static method, so we call it directly on the Post class
    }

    public function create(array $data)
    {
        $this->post->setAttr($data['title'], $data['content'], $data['author']);
        if ($this->post->create()) {
            return "Post created successfully.";
        } else {
            return "Failed to create post.";
        }
    }

    public function read($id)
    {
        return $this->post->read($id);
    }

    public function update(array $data, $id)
    {
        $this->post->setAttr($data['title'], $data['content'], $data['author']);
        if ($this->post->update($id)) {
            return "Post updated successfully.";
        } else {
            return "Failed to update post.";
        }
    }

    public function delete($id)
    {
        if ($this->post->delete($id)) {
            return "Post deleted successfully.";
        } else {
            return "Failed to delete post.";
        }
    }
}
