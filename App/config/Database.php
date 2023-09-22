<?php

class Database{
    private $cnx;

    function __construct()
    {
        try {
            $this->cnx = new PDO("");
        } catch (\PDOException $err) {
            echo $err->getMessage();
        }finally{
            return $this->cnx;
        }
    }
}