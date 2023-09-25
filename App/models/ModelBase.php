<?php

namespace App\Models;
use App\Config\Database;
use PDO;
abstract class ModelBase implements Database
{
    protected mixed $connection = null;

    public function connect()
    {
        if($this->connection !== null){
            return $this->connection;
        }else{
            try {
                $this->connection = new PDO("mysql:host=localhost;dbname=sistema1;charset=utf8", "root", "");
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (\PDOException $error){
                error_log($error->getMessage());
                echo $error->getTrace();
            } finally {
                return $this->connection;
            }
        }
    }
    public function getAllFromTable($table):array {
        $this->connect();
        $stmt = $this->connection->query("SELECT * FROM $table");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getById($table, $id):array{
        $stmt = $this->connection->query("SELECT * FROM $table WHERE $table.id = $id");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function save($table, $newData = []){
//        $connection = $this->connect();
//        if($res = $connection->query("INSERT INTO `$table` VALUES ($values)")){
//            return $res;
//        }
//        return false;
    }
    public function update($table, $newData){

    }
    public final function delete($table, $id){

    }




}
