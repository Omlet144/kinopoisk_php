<?php
abstract class Controller{
    protected  $connection;
    public function __construct($connection){
        $this->connection = $connection;
    }
    public abstract function add($model);
    public abstract function removeById($id) ;
    public abstract function removeByModel($model);
    public abstract function updateById($id, $newModel);
    public abstract function updateByModel($oldModel, $newModel);
    public abstract function selectById($id);
    public abstract function selectByFilter($text);
    public abstract function selectTable();
}
?>
