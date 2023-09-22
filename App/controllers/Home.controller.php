<?php
namespace App\Controllers;
class HomeController extends ControllerBase
{
    public function __construct() {
        parent::__construct(true);
    }
    public function index(){
        error_log("HomeController::Index()");
        echo parent::getIndex("home/index");
    }
}
