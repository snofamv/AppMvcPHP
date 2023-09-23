<?php
namespace App\Models;


class Model  implements IModel
{

    private $conn;
    public function __construct()
    {
        $conn = new Conexion();
    }

    public function getAll($template):void{
        $res = $this->conn->query();

        return $res;
    }
    public function findId($template):void{}
    public function updateId($template):void{}
    public function dropId($template):void{}
    public function createId($template):void{}
}
