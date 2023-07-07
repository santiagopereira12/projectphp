<?php
require_once "Modelos/Conexion.php";
class modeloFormularios{
    static public function mdlRegistro($tabla, $datos){
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla(correo, nombre, apellido, password) VALUES 
        (:correo, :nombre, :apellido, :password);");
        $stmt ->bindParam(":correo", $datos["correo"],PDO::PARAM_STR);
        $stmt ->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
        $stmt ->bindParam(":apellido", $datos["apellido"],PDO::PARAM_STR);
        $stmt ->bindParam(":password", $datos["password"],PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(conexion::conectar()->errorInfo());
        }
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function mdlSeleccionarRegistro($tabla, $item, $valor){
        if($item == null && $valor == null){
            $stmt = conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla;");
            $stmt->execute();
            return $stmt -> fetchAll();
        }else{
            $stmt = conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla where $item = :$item;");
            $stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt -> fetch();
        }
         
    }
    static public function mdlActualizarRegistro($tabla, $datos){
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET correo=:correo,nombre=:nombre,
        apellido=:apellido,password=:password WHERE id = :id;");
        $stmt ->bindParam(":correo", $datos["correo"],PDO::PARAM_STR);
        $stmt ->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
        $stmt ->bindParam(":apellido", $datos["apellido"],PDO::PARAM_STR);
        $stmt ->bindParam(":password", $datos["password"],PDO::PARAM_STR);
        $stmt ->bindParam(":id", $datos["id"],PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(conexion::conectar()->errorInfo());
        }
    }
    static public function mdlEliminarRegistro($tabla, $valor){
        $stmt = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt ->bindParam(":id", $valor, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(conexion::conectar()->errorInfo());
        }
    }
}
?>