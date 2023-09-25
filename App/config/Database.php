<?php

namespace App\Config;


interface Database
{

    public function connect();
    public function getById($table, $id);
    public function getAllFromTable($table);
    public function save($table, $newData);
    public function delete($table, $id);
    public function update($table, $newData);

}