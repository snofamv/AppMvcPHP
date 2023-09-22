<?php
namespace App\Models;
interface IModel{
    public function getAll($template);
    public function findId($template);
    public function updateId($template);
    public function dropId($template);
    public function createId($template);
}