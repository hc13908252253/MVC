<?php
class Model{
    public $db;
    public function __construct(){
        $this->init();
    }
    private function init(){
        $this->db=MysqlPDO::getInstance();
    }
}