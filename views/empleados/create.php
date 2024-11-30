<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container">

    <h1 class="text-center my-3">Crear Empleado</h1>
    <form action="index.php?action=crear" method="POST">
        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" class="form-control" name="nombres" required>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" required>
        </div>
        <div class="form-group">
            <label for="fecha_ingreso">Fecha de Ingreso</label>
            <input type="date" class="form-control" name="fecha_ingreso" required>
        </div>
        <div class="form-group">
            <label for="comentarios">Comentarios</label>
            <textarea class="form-control" name="comentarios"></textarea>
        </div>
        <div class="form-group">
            <label for="genero">Género</label>
            <select class="form-select" name="genero" required>
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
                <option value="3">Otro</option>
            </select>
        </div>
        <div class="form-group">
            <label for="departamento">Departamento</label>
            <select class="form-select" name="departamento" required>
                <option value="1">TI</option>
                <option value="2">Contabilidad</option>
                <option value="3">Recursos Humanos</option>
            </select>
        </div>
        <div class="form-group">
            <label for="salario">Salario</label>
            <input type="number" class="form-control" name="salario" required>
        </div>
        <div class="d-flex my-5 gap-3 justify-content-center">
            <button type="submit" class="btn btn-success">Crear Empleado</button>
            <a href="index.php" class="btn btn-primary">Volver</a>
        </div>
    </form>

</div>

<script>
    // validar formulario
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();
        var form = this;
        var inputs = form.querySelectorAll('input, textarea, select');
        var valid = true;
        inputs.forEach(function(input) {
            if (input.required && input.value == '') {
                valid = false;
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
            }
        });

        if (valid) {
            form.submit();
        }
    });

</script>