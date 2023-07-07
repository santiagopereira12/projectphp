<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
        <div class="form-group">
            <label for="email">correo:</label>
            <input type="email" class="form-control" placeholder="enter email" id="email" name="ingresoCorreo">
        </div>
        <div class="form-group">
            <label for="pwd">Contraseña</label>
            <input type="password" class="form-control" placeholder="enter password" id="pwd" name="ingresopassword">
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox">Recordar credenciales
            </label>
        </div>
        <?php
        $ingreso = new controladorFormularios();
        $ingreso -> ctrIngreso();
        ?>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
    
</div>