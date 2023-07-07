<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
        <div class="form-group">
            <label for="email">Ingresa el correo:</label>
            <input type="email" class="form-control" placeholder="enter email" id="email" name="registroCorreo">
        </div>
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" placeholder="enter name" id="name" name="registroNombre">
        </div>
        <div class="form-group">
            <label for="last-name">Apellido</label>
            <input type="text" class="form-control" placeholder="enter lastname" id="last-name" name="registroApellido">
        </div>
        <div class="form-group">
            <label for="pwd">Contraseña</label>
            <input type="password" class="form-control" placeholder="enter password" id="pwd" name="registroContraseña">
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox">Recordar credenciales
            </label>
        </div>
        <?php
        #instaciar la clase de un metodo no estatico.
        /*$registro = new controladorFormularios();
        $registro -> ctrRegistro();*/
        
        #instanciar clase con metodo estatico.
        $registro = controladorFormularios::ctrRegistro();
        if($registro == "OK"){
            #Script para eliminar registros del formulario.
            echo '<script>
            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
            </script>';
            echo '<div class="alert alert-success">Registro Exitoso</div>';
        }
        ?>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    
</div>