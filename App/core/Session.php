<?php

namespace App\Core;

Interface Session
{
    static function initSession():void;
    function setSessionId($id):bool;
    function finishSession():void;
    function checkSession($id):bool;
}