<?php
if(isset($_GET["id"])){
    $item = "id";
    $valor = $_GET["id"];
    $usuarios = controladorFormularios::ctrSeleccionarRegistros($item, $valor);
}
?>
<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
        <div class="form-group">
            <label for="email">Ingresa el correo:</label>
            <input type="email" class="form-control" value="<?php echo $usuarios["correo"]; ?>" placeholder="ingresar correo" id="email" name="actualizarCorreo">
        </div>
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" value="<?php echo $usuarios["nombre"]; ?>" placeholder="ingresar nombre" id="name" name="actualizarNombre">
        </div>
        <div class="form-group">
            <label for="last-name">Apellido</label>
            <input type="text" class="form-control" value="<?php echo $usuarios["apellido"]; ?>" placeholder="ingresar apellido" id="last-name" name="actualizarApellido">
        </div>
        <div class="form-group">
            <label for="pwd">Contraseña</label>
            <input type="password" class="form-control" placeholder="ingresar contraseña" id="pwd" name="actualizarPassword">
            <input type="hidden" name="passwordActual" value="<?php echo $usuarios["password"]; ?>">
            <input type="hidden" name="idUsuario" value="<?php echo $usuarios["id"]; ?>">
        </div>

        <?php
        $actualizar = controladorFormularios::ctrActualizarRegistro();
        if($actualizar == "ok"){
            echo '<script>
            if(window.history.replaceState){
                window.history.replaceState( null, null, window.location.href);
            }
            </script>';
            echo '<div class="alert alert-success">Datos Actualizados</div>
            
            <script>
            setTimeout(function(){
                window.location = "index.php?modulo=inicio";
            },3000)
            </script>';
        }
        ?>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    
</div>