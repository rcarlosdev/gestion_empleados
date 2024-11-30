<?php
require_once './controllers/EmpleadoController.php';

$empleado_controller = new EmpleadoController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'crear') {
        $empleado_controller->crear();
    } elseif ($action == 'editar') {
        $empleado_controller->editar($_GET['id']);
    } elseif ($action == 'eliminar') {
        $empleado_controller->eliminar($_GET['id']);
    }
} else {
    $empleado_controller->index();
}
?>
