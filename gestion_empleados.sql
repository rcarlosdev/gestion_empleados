-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla gestion_empleados.departamentos: ~0 rows (aproximadamente)
INSERT INTO `departamentos` (`id`, `nombre_departamento`) VALUES
	(1, 'TI'),
	(2, 'Servicio al Cliente'),
	(3, 'Recursos Humanos');

-- Volcando datos para la tabla gestion_empleados.empleados: ~0 rows (aproximadamente)
INSERT INTO `empleados` (`id`, `nombres`, `apellidos`, `fecha_ingreso`, `comentarios`, `genero_id`, `departamento_id`, `salario`) VALUES
	(2, 'María', 'Gómez', '2021-08-22', NULL, 2, 2, 4000000.00),
	(3, 'Luis', 'Martínez', '2023-01-10', 'Nuevo ingreso', 1, 1, 1400000.00),
	(4, 'Carlos', 'Restrepo', '2024-12-10', 'Nuevo empleado', 1, 1, 2490000.00),
	(5, 'Laura', 'Fernandez', '2024-12-04', '', 2, 2, 16000000.00);

-- Volcando datos para la tabla gestion_empleados.gastos: ~0 rows (aproximadamente)
INSERT INTO `gastos` (`id`, `año`, `mes`, `ingresos`, `gastos`, `departamento_id`) VALUES
	(1, '2024', 1, 10000.00, 7000.00, 1),
	(2, '2024', 1, 15000.00, 8000.00, 2),
	(3, '2024', 2, 12000.00, 9000.00, 1);

-- Volcando datos para la tabla gestion_empleados.generos: ~0 rows (aproximadamente)
INSERT INTO `generos` (`id`, `nombre`) VALUES
	(1, 'Masculino'),
	(2, 'Femenino'),
	(3, 'Otro');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
