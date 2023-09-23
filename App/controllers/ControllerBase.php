<?php

namespace App\Controllers;

use League\Plates\Engine;
use App\Core\Session;

class ControllerBase implements Session
{
    private Engine $templates;
    private bool $requireSession;
    private bool $sessionActive = false;

    public function __construct($requireSession = true, $className)
    {
        self::log($className);
        $this->templates = new Engine( dirname(__DIR__) .'\Views\Templates');
        $this->requireSession = $requireSession;

        // Valida la sesión en el constructor
        if ($this->requireSession) { #SI REQUIERE SESION

                #VALIDAR ROLES - PENDIENTE
            if ($this->checkSession()) { #SI SE VALIDA UNA SESION EXISTENTE
                $this->sessionActive = true;
            }else{
                // Redirigir o realizar acciones en función de la sesión no válida
                PHP_SESSION_ACTIVE && session_unset();
                #PHP_SESSION_ACTIVE && session_abort();
                PHP_SESSION_ACTIVE && session_destroy();
                header("location: /login");
                exit();
            }
        }
    }
    private static function log($className):void{
        $className = explode('\\',$className);
        error_log ("CONTROLADOR CARGADO: ". ($className[2]));
    }

    public static function initSession(): void
    {
        session_start();
    }

    public function checkSession($id):bool
    {
        #VEFICA SI SESION ESTA VACIO
        #VALIDAR ESTO CON ID EN BD
        if (!isset($_SESSION['userId'])) {
            return false;
        }
        return true;
    }
public function setSessionId($id): bool
    {
        if(PHP_SESSION_ACTIVE && !empty($id)){
            if($_SESSION["userId"] = $id) return true;
        }
        return false;
    }

public function finishSession(): void
    {
        $this->sessionActive = false;
        session_unset();
        session_destroy();
    }

    // Create a template object
    public function getIndex($template, $data = [])
    {
        $template = $this->templates->make("$template");
        return $template->render($data);
    }

    // Render a template directly
    public function getIndexDirectly($template, $data = [])
    {
        return $this->templates->render("$template", $data);
    }

    function existsPOST($params)
    {
        foreach ($params as $param) {
            if (!isset($_POST[$param])) {
                return false;
            }
        }
        return true;
    }
    function existsGET($params)
    {
        foreach ($params as $param) {
            if (!isset($_GET[$param])) {
                return false;
            }
        }
        return true;
    }

    function getGET($param)
    {
        return $_GET[$param];
    }
    function getPOST($param)
    {
        return $_POST[$param];
    }




}
