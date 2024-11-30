<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container">
    <h1 class="text-center my-3">Listado de Empleados</h1>
    <a href="index.php?action=crear" class="btn btn-primary float-end m-3">Agregar Empleado</a>

    <!-- Tabla para mostrar todos los empleados -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Fecha de Ingreso</th>
                <th>Comentarios</th>
                <th>Género</th>
                <th>Departamento</th>
                <th>Salario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $empleado): ?>
                <tr>
                    <td><?php echo $empleado['id']; ?></td>
                    <td><?php echo $empleado['nombres']; ?></td>
                    <td><?php echo $empleado['apellidos']; ?></td>
                    <td><?php echo $empleado['fecha_ingreso']; ?></td>
                    <td><?php echo $empleado['comentarios']; ?></td>
                    <td><?php echo $empleado['genero']; ?></td>
                    <td><?php echo $empleado['departamento']; ?></td>
                    <td><?php echo $empleado['salario']; ?></td>
                    <td>
                        <!-- Botón de edición -->
                        <a href="./index.php?action=editar&id=<?php echo $empleado['id']; ?>" class="btn btn-warning">Editar</a>

                        <!-- Botón de eliminación -->
                        <a href="#" onclick="confirmarEliminacion(<?php echo $empleado['id']; ?>)" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<script>
    function confirmarEliminacion(id) {
        if (confirm("¿Estás seguro de que deseas eliminar este empleado?")) {
            window.location.href = "./index.php?action=eliminar&id=" + id;
        }
    }

    // mostrar mensaje de error si existe
    <?php if (isset($_GET['error'])): ?>
        alert("<?php echo $_GET['error']; ?>");
    <?php endif; if (isset($_GET['success'])): ?>
        alert("<?php echo $_GET['success']; ?>");
    <?php endif; ?>

</script>