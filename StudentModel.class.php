<?php
class StudentModel extends Model{
    public function getAll(){//获取所有记录
        $rs=$this->db->fetchAll('select * from student');
        return $rs;
    }
   public function getByNo($stu_no){ //获取一条记录
       $rs=$this->db->fetchRow("select * from student where stu_no=$stu_no");
       return $rs;
   }
}