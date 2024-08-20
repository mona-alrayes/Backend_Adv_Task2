<?php
namespace Controller;
abstract class Controller{
    
    abstract public function index();
    abstract public function create(array $data);
    abstract public function read($id);
    abstract public function update(array $data , $id);
    abstract public function delete($id);
}