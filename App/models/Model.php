<?php
namespace App\Models;


class Model  implements IModel
{
    public function getAll($template):void{}
    public function findId($template):void{}
    public function updateId($template):void{}
    public function dropId($template):void{}
    public function createId($template):void{}
}
