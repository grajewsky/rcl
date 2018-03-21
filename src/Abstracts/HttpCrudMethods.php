<?php
namespace RCL\Abstracts;

abstract class HttpCrudMethods {

    public abstract function list();
    public abstract function get($id=false);
    public abstract function create($data);
    public abstract function delete($id);
    public abstract function update($data);

}