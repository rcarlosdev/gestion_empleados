# Documentación de la Base de Datos - Gestión de empleados y Gastos

Este repositorio contiene el esquema de base de datos para gestionar la información de empleados, sus departamentos y los gastos asociados a cada departamento.

## Creación de la Base de Datos

```sql
CREATE DATABASE gestion_empleados;
```

## Creación de las tablas

### Tabla departamentos

```sql
CREATE TABLE departamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_departamento VARCHAR(100) NOT NULL
);
```

### Tabla generos

```sql
CREATE TABLE generos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

```

### Tabla empleados

```sql
CREATE TABLE empleados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    fecha_ingreso DATE NOT NULL,
    comentarios TEXT,
    genero_id INT NOT NULL,
    departamento_id INT NOT NULL,
    salario DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (genero_id) REFERENCES generos(id),
    FOREIGN KEY (departamento_id) REFERENCES departamentos(id)
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
    FOREIGN KEY (departamento_id) REFERENCES departamentos(id)
);
```

## Relaciones Entre Tablas

1. **empleados y Departamento:**
   - Un empleado pertenece a un único departamento. La relación se establece mediante el campo `departamento_id` en la tabla `empleados`, que hace referencia al `id` en la tabla `Departamento`.

2. **Gastos y Departamento:**
   - Un gasto está relacionado con un único departamento. La relación se establece mediante el campo `departamento_id` en la tabla `Gastos`, que hace referencia al `id` en la tabla `Departamento`.

3. **empleados y Géneros:**
   - Un empleado tiene un género asignado. La relación se establece mediante el campo `genero_id` en la tabla `empleados`, que hace referencia al `id` en la tabla `generos`.

## PUNTO 4 - Consultas SQL

### Listado de todos los datos de los empleados del departamento “Ti”

```sql
SELECT e.id, e.nombres, e.apellidos, e.fecha_ingreso, e.comentarios, g.nombre AS genero, d.nombre_departamento, e.salario
FROM empleados e
JOIN generos g ON e.genero_id = g.id
JOIN departamentos d ON e.departamento_id = d.id
WHERE d.nombre_departamento = 'TI';
```

### Listados de los 3 departamentos que más gastos producen

```sql
SELECT d.nombre_departamento, SUM(g.gastos) AS total_gastos
FROM Gastos g
JOIN departamentos d ON g.departamento_id = d.id
GROUP BY d.id
ORDER BY total_gastos DESC
LIMIT 3;
```

### Listado de datos del empleado con mayor salario

```sql
SELECT e.id, e.nombres, e.apellidos, e.fecha_ingreso, e.comentarios, g.nombre AS genero, d.nombre_departamento, e.salario
FROM empleados e
JOIN generos g ON e.genero_id = g.id
JOIN departamentos d ON e.departamento_id = d.id
ORDER BY e.salario DESC
LIMIT 1;
```

### Cantidad de empleados con salarios menor a 1,500.000

```sql
SELECT COUNT(*) AS cantidad_empleados
FROM empleados
WHERE salario < 1500000;
```
