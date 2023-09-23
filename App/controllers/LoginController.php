<?php
namespace App\Controllers;
class LoginController extends ControllerBase
{

    public function __construct()
    {
        parent::__construct(false,__CLASS__);

    }

    public function index():void{
        echo parent::getIndex("login/index");
    }
    public function login():void
    {

        if (parent::existsPOST(["usuario", "clave"])) {
            $user = parent::getPOST("usuario");
            $pwd = parent::getPOST("clave");

            if ($this->validateCredentials($user, $pwd)) {
                $this->initSession(); #INICIAR SESION
                if($this->setSessionId($user)){
                    header("location: /home");

                }else{
                    header("location: /login");
                    exit();
                }

            }
            else {
                header("location: /login");
                exit();
            }
        }
    }


    // Otros métodos del controlador
    private function validateCredentials($user, $pwd): bool
    {
        if ($user == "adm" && $pwd == "123") {
            return true;
        } else {
            return false;
        }
    }





}
