<?php
require_once 'models/Empleado.php';

class EmpleadoController {

    public function index() {
        $empleados = Empleado::obtenerTodos();
        require_once 'views/empleados/index.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            try {
                $empleado = new Empleado();
                $empleado->nombres = $_POST['nombres'];
                $empleado->apellidos = $_POST['apellidos'];
                $empleado->fecha_ingreso = $_POST['fecha_ingreso'];
                $empleado->comentarios = $_POST['comentarios'];
                $empleado->genero = $_POST['genero'];
                $empleado->departamento = $_POST['departamento'];
                $empleado->salario = $_POST['salario'];
                $empleado->crear();
                header("Location: index.php?success=Empleado creado correctamente.");
            } catch (Exception $e) {

                $error = $e->getMessage();
                header("Location: index.php?error=Error al guardar empleado.");
            }
        }
        require_once 'views/empleados/create.php';
    }

    public function editar($id) {
        
        $empleado = Empleado::obtenerPorId($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $empleado['nombres'] = $_POST['nombres'];
                $empleado['apellidos'] = $_POST['apellidos'];
                $empleado['fecha_ingreso'] = $_POST['fecha_ingreso'];
                $empleado['comentarios'] = $_POST['comentarios'];
                $empleado['genero'] = intval($_POST['genero']);
                $empleado['departamento'] = intval($_POST['departamento']);
                $empleado['salario'] = floatval($_POST['salario']);
                
                Empleado::actualizar($id, $empleado);
    
                header("Location: index.php?success=Empleado actualizado correctamente.");
            } catch (Exception $e) {
                
                $error = $e->getMessage();
                header("Location: index.php?error=Error al actualizar empleado.");
            }
        }

        require_once 'views/empleados/edit.php';
    }

    public function eliminar($id) {
        try{
            $empleado = Empleado::obtenerPorId($id);
            Empleado::eliminar($id);
            header("Location: index.php?success=Empleado eliminado correctamente.");
        }
        catch(Exception $e){
            $error = $e->getMessage();
            header("Location: index.php?error=Error al eliminar empleado.");
        }
    }
}
?>
