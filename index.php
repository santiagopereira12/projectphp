<?php

require_once "Controladores/plantilla_Controlador.php";
require_once "Controladores/fomularios_Controlador.php";
require_once "Modelos/formularios_Modelo.php";


#instaciar clase en un objeto.
$plantilla = new controladorPlantilla();
$plantilla -> ctrTraerPlantilla();
?>