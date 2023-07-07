<?php
if(isset($_SESSION["validarIngreso"])){
    if($_SESSION["validarIngreso"] != "ok"){
        echo '<script>window.location = "index.php?modulo=ingreso"</script>';
        return;
    }
}else{
    echo '<script>window.location = "index.php?modulo=ingreso"</script>';
    return;
}
$usuario = controladorFormularios::ctrSeleccionarRegistros(null, null);


?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>N. REGISTROS</th>
            <th>CORREO ELECTRONICO</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>FECHA</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuario as $key => $value):?>
            <tr>
                <td><?php echo ($key+1);?></td>
                <td><?php echo $value["correo"];?></td>
                <td><?php echo $value["nombre"];?></td>
                <td><?php echo $value["apellido"];?></td>
                <td><?php echo $value["fecha"]?></td>
                <td>
                    <div class="btn-group">
                        <div class="px-1">
                        <a href="index.php?modulo=editar&id=<?php echo $value["id"]; ?>" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                    </div>

                        <form method="POST">
                            <input type="hidden" value="<?php echo $value["id"]; ?>" name="elminarRegistro">
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>

                            <?php
                            $eliminar = new controladorFormularios();
                            $eliminar -> ctrEliminarRegistro();
                            ?>
                        </form>

                    </div>
                </td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>