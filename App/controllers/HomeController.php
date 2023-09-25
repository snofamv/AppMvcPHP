<?php
namespace App\Controllers;
use App\Config\Config;
use App\Models\User;

class HomeController extends ControllerBase
{
    public function __construct() {
        $this->initSession();
        parent::__construct(true, __CLASS__);
    }
    public function index():void{
        echo parent::getIndex("home/index", ["datos"=>$this->test()]);
    }

    public function test(): array{
        $usuario = new User;
        $usuarios = $usuario->getAllFromTable("usuarios");
        return $usuarios;

    }
}
