<?php
    namespace App\Models;

    use PDO;
    use PDOException;

    class BaseModel {
        protected $conn;
        protected $tableName;
        protected $sqlBuilder;
        protected $id = 'id';

        public function __construct() {
            try {
                $this->conn = new PDO("mysql:host=localhost;dbname=asm-php2;charset=utf8", "root", "");
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e) {
                echo "Có lỗi xảy ra <br>" . $e->getMessage();
            }
        }

        public static function all() {
            $model = new static;
            $model->sqlBuilder = "SELECT * FROM $model->tableName";
            $stmt = $model->conn->prepare($model->sqlBuilder);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }

        public static function find($id) {
            $models = new static;
            $models->sqlBuilder = "SELECT * FROM $models->tableName WHERE $models->id = '$id' ";
            $stmt = $models->conn->prepare($models->sqlBuilder);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);

            if ($result) {
                return $result[0];
            } else {
                return [];
            }
        }

        public function insert($arr) {
            $this->sqlBuilder = "INSERT INTO $this->tableName(";
            $cols = "";
            $params = "";
            foreach ($arr as $key => $value) {
                $cols .= "`$key`, ";
                $params .= ":$key, ";
            }

            $cols = rtrim($cols, ", ");
            $params = rtrim($params, ", ");
            $this->sqlBuilder .= $cols . ") Value(" . $params . ")";

            $stmt = $this->conn->prepare($this->sqlBuilder);
            $stmt->execute($arr);

            return $this->conn;
        }

        public function update($id, $arr) {
            $this->sqlBuilder = "UPDATE $this->tableName SET ";
            foreach($arr as $key => $value) {
                $this->sqlBuilder .= "`$key` = :$key, ";
            }

            $this->sqlBuilder = rtrim($this->sqlBuilder, ", ");
            $this->sqlBuilder .= " WHERE $this->id = :$this->id";
            
            // them id vao array
            $arr[$this->id] = $id;

            $stmt = $this->conn->prepare($this->sqlBuilder);
            $stmt->execute($arr);
        }

        public function delete($id) {
            $this->sqlBuilder = "DELETE FROM $this->tableName WHERE $this->id = '$id'";
            $stmt = $this->conn->prepare($this->sqlBuilder);
            $stmt->execute();
        }
        
        public function where($colName, $condition, $value) {
            $this->sqlBuilder = "SELECT * FROM $this->tableName WHERE $colName $condition '$value'";

            return $this;
        }

        public function andWhere($colName, $condition, $value) {
            $this->sqlBuilder .= " AND $colName $condition '$value'";

            return $this;
        }

        public function orWhere($colName, $condition, $value) {
            $this->sqlBuilder .= " OR $colName $condition '$value'";

            return $this;
        }

        public function take($number1, $number2) {
            $this->sqlBuilder = "SELECT * FROM $this->tableName LIMIT $number1,$number2";
            return $this;
        }

        public function get() {
            $stmt = $this->conn->prepare($this->sqlBuilder);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }

        public function findIn($array) {
            $this->sqlBuilder = "SELECT * FROM $this->tableName WHERE $this->id IN (";
            foreach($array as $k => $v) {
                $this->sqlBuilder .= "$v, ";
            }

            $this->sqlBuilder = rtrim($this->sqlBuilder, ', ');
            $this->sqlBuilder .= ")";
            
            return $this;
        }
    }
?>