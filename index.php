<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/tests.controlador.php";
require_once "controladores/preguntas.controlador.php";
require_once "controladores/carreras.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/tests.modelo.php";
require_once "modelos/preguntas.modelo.php";
require_once "modelos/carreras.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();