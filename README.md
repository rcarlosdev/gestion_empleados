# Documentación de la Base de Datos - Gestión de Empleados y Gastos

Este repositorio contiene el esquema de base de datos para gestionar la información de empleados, sus departamentos y los gastos asociados a cada departamento.

## Creación de la Base de Datos

```sql
CREATE DATABASE GestionEmpleados;
```

## Creación de las tablas

### Tabla DEPARTAMENTOS

```sql
CREATE TABLE Departamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_departamento VARCHAR(100) NOT NULL
);
```

### Tabla GENEROS

```sql
CREATE TABLE Generos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

```

### Tabla EMPLEADOS

```sql
CREATE TABLE Empleados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    fecha_ingreso DATE NOT NULL,
    comentarios TEXT,
    genero_id INT NOT NULL,
    departamento_id INT NOT NULL,
    salario DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (genero_id) REFERENCES Generos(id),
    FOREIGN KEY (departamento_id) REFERENCES Departamento(id)
);
```

### Tabla GASTOS

```sql
CREATE TABLE Gastos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    año YEAR NOT NULL,
    mes TINYINT NOT NULL CHECK (mes BETWEEN 1 AND 12),
    ingresos DECIMAL(10, 2) NOT NULL,
    gastos DECIMAL(10, 2) NOT NULL,
    departamento_id INT NOT NULL,
    FOREIGN KEY (departamento_id) REFERENCES Departamento(id)
);
```

## Relaciones Entre Tablas

1. **Empleados y Departamento:**
   - Un empleado pertenece a un único departamento. La relación se establece mediante el campo `departamento_id` en la tabla `Empleados`, que hace referencia al `id` en la tabla `Departamento`.

2. **Gastos y Departamento:**
   - Un gasto está relacionado con un único departamento. La relación se establece mediante el campo `departamento_id` en la tabla `Gastos`, que hace referencia al `id` en la tabla `Departamento`.

3. **Empleados y Géneros:**
   - Un empleado tiene un género asignado. La relación se establece mediante el campo `genero_id` en la tabla `Empleados`, que hace referencia al `id` en la tabla `Generos`.

## PUNTO 4 - Consultas SQL

### Listado de todos los datos de los empleados del departamento “Ti”

```sql
SELECT e.id, e.nombres, e.apellidos, e.fecha_ingreso, e.comentarios, g.nombre AS genero, d.nombre_departamento, e.salario
FROM Empleados e
JOIN Generos g ON e.genero_id = g.id
JOIN Departamentos d ON e.departamento_id = d.id
WHERE d.nombre_departamento = 'TI';
```

### Listados de los 3 departamentos que más gastos producen

```sql
SELECT d.nombre_departamento, SUM(g.gastos) AS total_gastos
FROM Gastos g
JOIN Departamentos d ON g.departamento_id = d.id
GROUP BY d.id
ORDER BY total_gastos DESC
LIMIT 3;
```

### Listado de datos del empleado con mayor salario

```sql
SELECT e.id, e.nombres, e.apellidos, e.fecha_ingreso, e.comentarios, g.nombre AS genero, d.nombre_departamento, e.salario
FROM Empleados e
JOIN Generos g ON e.genero_id = g.id
JOIN Departamentos d ON e.departamento_id = d.id
ORDER BY e.salario DESC
LIMIT 1;
```

###  Cantidad de empleados con salarios menor a 1,500.000

```sql
SELECT COUNT(*) AS cantidad_empleados
FROM Empleados
WHERE salario < 1500000;
```
