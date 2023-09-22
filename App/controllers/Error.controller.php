<?php 
namespace App\Controllers;

Class ErrorController extends ControllerBase{
    // SE PASA COMO ID EL NOMBRE DEL CONTROLADOR NO ENCONTRADO 
    public function __construct() {
        parent::__construct();
    }
    public function Index($error){
        echo parent::getIndex("error/error", $error);
    }

}