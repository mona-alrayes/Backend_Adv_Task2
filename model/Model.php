<?php

namespace Model;

abstract class Model
{
    abstract public static function listAll();
    abstract public function create();
    abstract public function read($id);
    abstract public function update($id);
    abstract public function delete($id);
}
