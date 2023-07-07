<?php

#controlador de cormularios(clase).
class controladorFormularios{
    #metodo de registro.
    static public function ctrRegistro(){
        if(isset($_POST["registroNombre"])){
            $tabla = "registros";
            $datos = array("correo" => $_POST["registroCorreo"],
                           "nombre" => $_POST["registroNombre"],
                           "apellido" => $_POST["registroApellido"],
                           "password" => $_POST["registroContraseña"]);
            $respuesta = modeloFormularios::mdlRegistro($tabla, $datos);
            return $respuesta;
        }
    }
    static public function ctrSeleccionarRegistros($item, $valor){
        $tabla = "registros";
        $respuesta = modeloFormularios::mdlSeleccionarRegistro($tabla, $item, $valor);
        return $respuesta;
    }
    public function ctrIngreso(){
        if(isset($_POST["ingresoCorreo"])){
            $tabla = "registros";
            $item = "correo";
            $valor = $_POST["ingresoCorreo"];
            $respuesta = modeloFormularios::mdlSeleccionarRegistro($tabla, $item, $valor);
            if($respuesta["correo"] == $_POST["ingresoCorreo"] && $respuesta["password"] == $_POST["ingresopassword"]){
                $_SESSION["validarIngreso"] = "ok";
                echo '<script>
                if(window.history.replaceState ){
                    window.history.replaceState( null, null, window.location.href);
                }
                window.location = "index.php?modulo=inicio";
                </script>';
            }else{
                echo '<script>
                if(window.history.replaceState ){
                    window.history.replaceState( null, null, window.location.href);
                }
                </script>';
                echo '<div class="alert alert-danger">Usuario no Registrado</div>';
            }
            
        }
    }
    static public function ctrActualizarRegistro(){
        if(isset($_POST["actualizarNombre"])){
            if($_POST["actualizarPassword"] != ""){
                $password = $_POST["actualizarPassword"];
            }else{
                $password = $_POST["passwordActual"];
            }
            $tabla = "registros";
            $datos = array("id" => $_POST["idUsuario"],
                           "correo" => $_POST["actualizarCorreo"],
                           "nombre" => $_POST["actualizarNombre"],
                           "apellido" => $_POST["actualizarApellido"],
                           "password" => $password);
            $respuesta = modeloFormularios::mdlActualizarRegistro($tabla, $datos);
            return $respuesta;
        }
    }
    public function ctrEliminarRegistro(){
        if(isset($_POST["elminarRegistro"])){
            $tabla = "registros";
            $valor = $_POST["elminarRegistro"];
            $respuesta = modeloFormularios::mdlEliminarRegistro($tabla, $valor);
            if($respuesta == "ok"){
                echo '<script>
                if(window.history.replaceState){
                    window.history.relaceState( null, null, window.location.href);
                }
                window.location = "index.php?modulo=inicio";
                </script>';
            }
        }
    }
}
?>