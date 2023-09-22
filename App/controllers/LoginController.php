<?php
namespace App\Controllers;

class LoginController extends ControllerBase
{

    public function __construct()
    {
        parent::__construct(true,__CLASS__);
    }

    public function index(){
        error_log("LoginController::Index()");
        echo parent::getIndex("login/index", []);
    }
    public function login($vars = null)
    {
        error_log("LoginController::LOGIN()");

        if (parent::existsPOST(["usuario", "clave"])) {
            $user = parent::getPOST("usuario");
            $pwd = parent::getPOST("clave");

            if ($this->validateCredentials($user, $pwd)) {
                error_log("*ACCESO VALIDO*\nUSER: ".$user."\tPWD: ".$pwd);
                echo "ACCESO VALIDO";
                header("location: /home");
                exit();
            } 
            else {
                error_log("*CREDENCIALES INVALIDAS*");
                header("location: /login");
                exit();
            }
        }
    }
    

    // Otros métodos del controlador
    private function validateCredentials($user, $pwd): bool
    {
        error_log("LoginController::validateCredentials()");
        if ($user == "adm" && $pwd == "123") {
            return true;
        } else {
            return false;
        }
    }
}
