<?php
namespace App\Models;   
use PDOException;
use PDO;
class BaseModel {
    protected $conn;
    protected $sqlBuilder;
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost; dbname=web3014; charset=utf8", "root", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function all()
    {
        $model = new static;
        $model->sqlBuilder = "Select * From " . $model->tableName;
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
        }
        public static function limit($quantity)
    {
        $model = new static;
        $model->sqlBuilder = "Select * From " . $model->tableName . " LIMIT $quantity";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
    public function insert($arr = [])
    {
        $this->sqlBuilder = "INSERT INTO $this->tableName(";
        $cols = "";
        $values = "";
        foreach ($arr as $col => $value) {
            $cols .= "`" . $col . "`, ";
            $values .= ":{$col}, ";
        }

        $cols = rtrim($cols, ", ");
        $values = rtrim($values, ", ");

        $this->sqlBuilder .= $cols . ") VALUES(" . $values . ")";

        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute($arr);
    }
    /**
     * function findOne lấy ra 1 bản ghi
     * @param $id: tham số truyền vào là id (khóa chính)
     */
    public static function findOne($primary,$id)
    {
        $model = new static;
        $model->sqlBuilder = "Select * From $model->tableName WHERE `$primary`='$id'";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
      
            return $result[0];
        }
    
    

    /**
     * function update: cập nhật dữ liệu
     * @param $id: tham số là khóa chính
     * @param array $data: mảng dữ liệu 
     */
    public function update($id, $data = [])
    {
        $this->sqlBuilder = "Update $this->tableName SET ";
        foreach ($data as $key => $value) {
            $this->sqlBuilder .= "`$key`=':$key', ";
        }
        $this->sqlBuilder = rtrim($this->sqlBuilder, ", ");
        $this->sqlBuilder .= " WHERE product_id = $id";
        echo "$this->sqlBuilder";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($this->sqlBuilder);
        // var_dump($this->sqlBuilder);die;
        $stmt->execute();
    }
    public function delete($primary, $id) {
        $this->sqlBuilder = "DELETE FROM $this->tableName WHERE $primary=$id";
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
    }
    public function where($colName, $condition, $value)
    {
        $this->sqlBuilder = "Select * From $this->tableName WHERE $colName` $condition '$value' ";
        return $this;
    }
    public function andWhere($colName, $condition, $value)
    {
        $this->sqlBuilder .= " AND `$colName` $condition '$value' ";
        return $this;
    }
    public function orWhere($colName, $condition, $value)
    {
        $this->sqlBuilder .= " OR `$colName` $condition '$value' ";
        return $this;
    }
    public function get()
    {
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
}
?>