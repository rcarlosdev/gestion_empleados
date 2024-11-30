<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container">
    <h1 class="text-center my-3">Editar Empleado</h1>
    
    <!-- Formulario para editar un empleado -->
    <form action="index.php?action=editar&id=<?php echo $empleado['id']; ?>" method="POST">
        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" class="form-control" name="nombres" value="<?php echo $empleado['nombres']; ?>" required>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" value="<?php echo $empleado['apellidos']; ?>" required>
        </div>
        <div class="form-group">
            <label for="fecha_ingreso">Fecha de Ingreso</label>
            <input type="date" class="form-control" name="fecha_ingreso" value="<?php echo $empleado['fecha_ingreso']; ?>" required>
        </div>
        <div class="form-group">
            <label for="comentarios">Comentarios</label>
            <textarea class="form-control" name="comentarios"><?php echo $empleado['comentarios']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="genero">Género</label>
            <select class="form-select" name="genero">
                <option value="1" <?php if ($empleado['genero_id'] == '1') echo 'selected'; ?>>Masculino</option>
                <option value="2" <?php if ($empleado['genero_id'] == '2') echo 'selected';  ?>>Femenino</option>
                <option value="3" <?php if ($empleado['genero_id'] == '3') echo 'selected';  ?>>Otro</option>
            </select>
        </div>
        <div class="form-group">
            <label for="departamento">Departamento</label>
            <select class="form-select" name="departamento">
                <option value="1" <?php if ($empleado['departamento_id'] == '1') echo 'selected'; ?> >TI</option>
                <option value="3" <?php if ($empleado['departamento_id'] == '2') echo 'selected'; ?> >Servicio al Cliente</option>
                <option value="2" <?php if ($empleado['departamento_id'] == '3') echo 'selected'; ?> >Recursos Humanos</option>
            </select>
        </div>
        <div class="form-group">
            <label for="salario">Salario</label>
            <input type="number" class="form-control" name="salario" value="<?php echo $empleado['salario']; ?>" required>
        </div>
        <div class="d-flex my-5 gap-3 justify-content-center">
            <button type="submit" class="btn btn-warning">Actualizar Empleado</button>
            
            <a href="index.php" class="btn btn-secondary">Volver</a>
        </div>
    
    </form>
</div>
