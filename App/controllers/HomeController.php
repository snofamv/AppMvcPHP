<?php
namespace App\Controllers;
class HomeController extends ControllerBase
{
    public function __construct() {
        self::initSession();
        parent::__construct(true, __CLASS__);
    }
    public function index():void{
        error_log("HomeController::Index()");
        echo parent::getIndex("home/index", ["idUser" => 1, "userName" => "fABIANCITO", "userPass" => "ASDASD123"]);
    }
}
