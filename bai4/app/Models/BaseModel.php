<?php
namespace App\Models;
use PDO;
use PDOException;

class BaseModel
{
    protected $conn;
    protected $tableName;
    protected $sqlBuilder;
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=php2;charset=utf8" ,"root", "");
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function all()
    {
        $model = new static;
        $model->sqlBuilder = "Select * from $model->tableName";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
//func insert: them du lieu
//params: $data co cau truc
//$data = [firstname=>'ng', lastname => 'duy',..]
    public function insert($data=[]) {
        $this->sqlBuilder = "INSERT INTO $this->tableName(";
        $colNames = '';
        $params = '';
        //lay ten cot ,ten tham so tu mang data
        foreach ($data as $key => $value) {
            $colNames .= "`$key`, ";
            $params .= ":$key, ";
        }
            //loai bo dau phay o cuoi chuoi
            $colNames = rtrim($colNames, ', ');
            $params = rtrim($params, ', ');
            //noi cau lenh sql
            $this->sqlBuilder .= $colNames . ") VALUES (" . $params . ")";
            $stmt = $this->conn->prepare($this->sqlBuilder);    
            $stmt->execute($data);
        }

      //ham lay ra mot ban ghi
      public static function findOne($id){
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE id = '$id'";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
        //neu co du lieu
        if($result) {
            return $result[0];
        }
        return false;
      }

    //   function update: cap nhat du lieu
    //   @param $arr: la mang du lieu can cap nhap
      public function update($arr =[]){
        $this->sqlBuilder = "UPDATE $this->tableName SET";
        foreach($arr as $key => $value){
            $this->sqlBuilder .= "`$key`=:$key, ";
        }
        $this->sqlBuilder = rtrim($this->sqlBuilder, ", ");
        $this->sqlBuilder .= " WHERE id =:id";
        //$this->id lay tu ham findOne
        if(isset($this->id)){
            $arr['id'] = $this->id;
            $stmt = $this->conn->prepare($this->sqlBuilder);
            $stmt->execute($arr);
            return true;
        }
        return false;   
      }

      public function delete($id) {
        $this->sqlBuilder = "DELETE FROM $this->tableName WHERE id ='$id'";
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
      }

    //   function where()
    //   @param $colName: ten cot
    //   @param $colName: dieu kien
    //   @param $colName: gia tri
      public function where($colName, $codition, $value){
        $this->sqlBuilder = "SELECT * FROM $this->tableName WHERE $colName $codition '$value'";
        return $this;
      }

      public function andWhere($colName, $codition, $value)
      {
        $this->sqlBuilder .= " AND $colName $codition '$value'";
        return $this;
      }

      public function orWhere($colName, $codition, $value)
      {
        $this->sqlBuilder .= " OR $colName $codition '$value'";
        return $this;
      }

    //   function get: lay du lieu tu cau lenh where
      public function get(){
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
      }

}