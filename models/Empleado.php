<?php
require_once 'config/database.php';

class Empleado {
    public $id;
    public $nombres;
    public $apellidos;
    public $fecha_ingreso;
    public $comentarios;
    public $genero;
    public $departamento;
    public $salario;

    // Crear un nuevo empleado
    public function crear() {
        global $pdo;
        $sql = "INSERT INTO empleados (nombres, apellidos, fecha_ingreso, comentarios, genero_id, departamento_id, salario) 
                VALUES (:nombres, :apellidos, :fecha_ingreso, :comentarios, :genero, :departamento, :salario)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombres' => $this->nombres,
            ':apellidos' => $this->apellidos,
            ':fecha_ingreso' => $this->fecha_ingreso,
            ':comentarios' => $this->comentarios,
            ':genero' => $this->genero,
            ':departamento' => $this->departamento,
            ':salario' => $this->salario
        ]);
    }

    // Obtener todos los empleados
    public static function obtenerTodos() {
        global $pdo;

        $sql = "SELECT e.*, d.nombre_departamento AS departamento, g.nombre AS genero
            FROM empleados e
            LEFT JOIN departamentos d ON e.departamento_id = d.id
            LEFT JOIN generos g ON e.genero_id = g.id";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un empleado por ID
    public static function obtenerPorId($id) {
        global $pdo;
        $sql = "SELECT e.*, d.nombre_departamento AS departamento, g.nombre AS genero
            FROM empleados AS e
            LEFT JOIN departamentos AS d ON e.departamento_id = d.id 
            LEFT JOIN generos g ON e.genero_id = g.id
            WHERE e.id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un empleado
    public static function actualizar($id, $datos) {
        global $pdo;

        $sql = "UPDATE empleados SET nombres = :nombres, apellidos = :apellidos, fecha_ingreso = :fecha_ingreso, comentarios = :comentarios, genero_id = :genero, departamento_id = :departamento, salario = :salario WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombres' => $datos['nombres'],
            ':apellidos' => $datos['apellidos'],
            ':fecha_ingreso' => $datos['fecha_ingreso'],
            ':comentarios' => $datos['comentarios'],
            ':genero' => $datos['genero'],
            ':departamento' => $datos['departamento'],
            ':salario' => $datos['salario'],
            ':id' => $id
        ]);
    }

    // Eliminar un empleado
    public static function eliminar($id) {
        global $pdo;
        $sql = "DELETE FROM empleados WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
?>
