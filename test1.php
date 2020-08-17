<?php
header('Content-Type:text/html;charset=utf-8');
require('./MysqlPDO.class.php');
$obj=MysqlPDO::getInstance();
echo '<hr>';
$rc=$obj->fecthRow("select * from student where stu_no='17010105'");
var_export($rc);
$rs=$obj->fetchAll('select * from student');
echo '<pre>';
var_export($rs);
