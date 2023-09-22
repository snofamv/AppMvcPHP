<?php

namespace App\Controllers;

use League\Plates\Engine;

class ControllerBase
{
    private $templates;
    private $requireSession;

    public function __construct($requireSession = true)
    {
        session_start();

        $this->templates = new Engine('App/views/templates');
        $this->requireSession = $requireSession;

        // Inicia la sesión en el constructor si se requiere
        // ...
        if ($this->requireSession) {
            if (!$this->checkSession()) {
                // Redirigir o realizar acciones en función de la sesión no válida
            }
        }
    }
    // Verificar la sesión
    // Agrega un método para verificar la sesión
    private function checkSession()
    {
        // Verificar si la sesión no está activa (por ejemplo, si no hay un usuario logueado)
        if (!isset($_SESSION['user'])) {
            return false;
        }
        return true;
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
                error_log("Controlador::ExistsPOST => No existe el parametro $param");
                return false;
            }
        }
        return true;
    }
    function existsGET($params)
    {
        foreach ($params as $param) {
            if (!isset($_GET[$param])) {
                error_log("Controlador::ExistsGET => No existe el parametro $param");
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
