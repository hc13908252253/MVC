<?php
class MysqlPDO{
    private $config=array(
        'driver'=>'mysql',
        'host'=>'localhost',
        'port'=>'3306',
        'username'=>'root',
        'pwd'=>'001600k3',
		'dbname'=>'stu_manager',
        'charset'=>'utf8'
         );
    private $pdo;//连接对象
    // 单例模式---三私一公
    private static $instance;
    private function __construct($param){
        $this->config=array_merge($this->config,$param);
        $this->connect();
    }
    private function __clone(){

    }
    public static function getInstance($param=array()){
        if(!self::$instance instanceof self){   //当前$instance实例不在自己的类对象中
            self::$instance=new self($param);
        }
        return self::$instance;
    }
    // 连接数据库
    private function connect(){
        try {
            $dsn="{$this->config['driver']}:host={$this->config['host']};port={$this->config['port']};dbname={$this->config['dbname']};charset={$this->config['charset']}";//code...
            $this->pdo=new PDO($dsn,$this->config['username'],$this->config['pwd']);
	        } catch (PDOException $ex) {
            die('数据库连接失败'.$ex->getMessage());//throw $th;
        }

    }
    //几个执行sql语句
    public function query($sql){//获取PDOStatement结果集对象$re
       $rs=$this->pdo->query($sql);
       if($rs===false){
        die('操作失败'.$this->pdo->errorInfo());
       }
	   return $rs;
    }
    public function fecthRow($sql) {//获取一条记录
		return $this->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function fetchAll($sql){//获取所有记录，返回二维数组
        return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}