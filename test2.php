<?php
require'./MysqlPDO.class.php';
require'./Model.class.php';
require'./StudentModel.class.php';
$stu=new StudentModel();
echo "<pre>";
 print_r($stu->getAll());
var_dump($stu->getByNo('1805010130'));