-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2024 a las 15:37:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ClienteID` int(11) NOT NULL,
  `Cedula` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '9999999999',
  `Nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SectorID` int(11) NOT NULL,
  `Apellido` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Telefono` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Celular` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `FechaCreacion` datetime NOT NULL,
  `FechaActualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ClienteID`, `Cedula`, `Nombre`, `SectorID`, `Apellido`, `Telefono`, `Celular`, `Email`, `FechaCreacion`, `FechaActualizacion`) VALUES
(1, '0905477665', 'Luis', 1, 'Pérez', '02666555', '0995264359', 'test@test.com', '2024-04-02 23:35:21', '2024-04-02 23:35:21'),
(2, '1100007003', 'Melva', 23, 'Zapata', '022233345', '0987864540', 'melva@outlook.es', '2024-04-03 11:07:00', '2024-04-03 11:07:00'),
(3, '1714930020', 'David ', 42, 'Gutiérrez', '026007744', '0992742398', 'david@hotmail.com', '2024-04-04 17:05:38', '2024-04-04 17:05:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuestotarifa`
--

CREATE TABLE `impuestotarifa` (
  `ImpuestoTarifaID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Sigla` varchar(8) NOT NULL,
  `Valor` decimal(10,2) NOT NULL,
  `Descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `impuestotarifa`
--

INSERT INTO `impuestotarifa` (`ImpuestoTarifaID`, `Nombre`, `Sigla`, `Valor`, `Descripcion`) VALUES
(1, 'IVA', 'IVA', 12.00, 'IVA del producto'),
(2, 'Tarjeta de débito', 'TD', 2.24, 'Tarifa bancaria para pago con tarjeta de débito (incluye IVA).'),
(3, 'Tarjeta de crédito corriente', 'TCCC', 4.50, 'Tarifa bancaria para pago con tarjeta de crédito en crédito corriente (incluye IVA).');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `PedidoID` int(11) NOT NULL,
  `SesionID` varchar(14) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ClienteID` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `PagoTipoID` int(11) NOT NULL,
  `PedidoEstadoID` int(11) NOT NULL,
  `SectorID` int(11) NOT NULL,
  `Barrio` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Descuento` decimal(10,0) NOT NULL,
  `PedidoValorTotal` decimal(10,0) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`PedidoID`, `SesionID`, `ClienteID`, `Fecha`, `PagoTipoID`, `PedidoEstadoID`, `SectorID`, `Barrio`, `Descuento`, `PedidoValorTotal`) VALUES
(1, '20200402233808', 1, '2024-04-02 23:38:39', 1, 1, 0, 'San Fernando', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidodetalle`
--

CREATE TABLE `pedidodetalle` (
  `PedidoDetalleID` int(11) NOT NULL,
  `PedidoID` int(11) NOT NULL,
  `ProductoID` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(10,0) NOT NULL,
  `IVA` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `pedidodetalle`
--

INSERT INTO `pedidodetalle` (`PedidoDetalleID`, `PedidoID`, `ProductoID`, `Cantidad`, `Precio`, `IVA`) VALUES
(1, 1, 1, 1, 52, 0.00),
(2, 1, 2, 1, 54, 0.00),
(3, 1, 3, 1, 51, 0.00),
(4, 1, 4, 1, 59, 0.00),
(5, 1, 5, 1, 10, 0.00),
(6, 1, 6, 1, 16, 0.00),
(7, 1, 7, 1, 7, 0.00),
(8, 1, 8, 1, 5, 0.00),
(9, 1, 9, 1, 29, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoestado`
--

CREATE TABLE `pedidoestado` (
  `PedidoEstadoID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidoestado`
--

INSERT INTO `pedidoestado` (`PedidoEstadoID`, `Nombre`) VALUES
(1, 'Registrado'),
(2, 'Pagado'),
(3, 'Entregado'),
(4, 'Reversado'),
(5, 'Devuelto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ProductoID` int(11) NOT NULL,
  `ProductoCategoriaID` varchar(50) DEFAULT NULL,
  `ProductoTipoID` varchar(50) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `FechaUltimoPrecio` date DEFAULT NULL,
  `Descuento` decimal(5,2) DEFAULT NULL,
  `PagaIVA` tinyint(1) NOT NULL DEFAULT 1,
  `Orden` int(11) DEFAULT NULL,
  `Activo` tinyint(4) DEFAULT NULL,
  `RutaImagen` varchar(150) DEFAULT NULL,
  `RutaImagenThumb` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ProductoID`, `ProductoCategoriaID`, `ProductoTipoID`, `Nombre`, `Precio`, `FechaUltimoPrecio`, `Descuento`, `PagaIVA`, `Orden`, `Activo`, `RutaImagen`, `RutaImagenThumb`) VALUES
(1, 'Víveres', 'Arroz (1 kg)', 'Arroz (1 kg)', 1.50, '2024-06-25', 0.00, 1, 7, 1, 'images/productos/thumbnails/alimentos/viveres1.png', 'images/productos/checkout/viveres/viveres1.png'),
(2, 'Víveres', 'Pasta (500 g)', 'Pasta (500 g)', 1.20, '2024-06-25', 0.00, 1, 9, 1, 'images/productos/thumbnails/alimentos/viveres2.png', 'images/productos/checkout/viveres/viveres2.png'),
(3, 'Víveres', 'Lentejas (1 kg)', 'Lentejas (1 kg)', 2.00, '2024-06-25', 0.00, 1, 8, 1, 'images/productos/thumbnails/alimentos/viveres3.png', 'images/productos/checkout/viveres/viveres3.png'),
(4, 'Víveres', 'Harina (1 kg)', 'Harina (1 kg)', 1.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/alimentos/viveres4.png', 'images/productos/checkout/viveres/viveres4.png'),
(5, 'Víveres', 'Frijoles (1 kg)', 'Frijoles (1 kg)', 2.50, '2024-06-25', 0.00, 1, 6, 1, 'images/productos/thumbnails/alimentos/viveres5.png', 'images/productos/checkout/viveres/viveres5.png'),
(6, 'Víveres', 'Aceite de oliva (1 litro)', 'Aceite de oliva (1 litro)', 6.00, '2024-06-25', 0.00, 1, 3, 1, 'images/productos/thumbnails/alimentos/viveres6.png', 'images/productos/checkout/viveres/viveres6.png'),
(7, 'Víveres', 'Sal (1 kg)', 'Sal (1 kg)', 0.50, '2024-06-25', 0.00, 1, 10, 1, 'images/productos/thumbnails/alimentos/viveres7.png', 'images/productos/checkout/viveres/viveres7.png'),
(8, 'Víveres', 'Azúcar (1 kg)', 'Azúcar (1 kg)', 1.00, '2024-06-25', 0.00, 1, 4, 1, 'images/productos/thumbnails/alimentos/viveres8.png', 'images/productos/checkout/viveres/viveres8.png'),
(9, 'Víveres', 'Leche en polvo (500 g)', 'Leche en polvo (500 g)', 3.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/alimentos/viveres9.png', 'images/productos/checkout/viveres/viveres9.png'),
(10, 'Víveres', 'Avena (500 g)', 'Avena (500 g)', 2.00, '2024-06-25', 0.00, 1, 5, 1, 'images/productos/thumbnails/alimentos/viveres10.png', 'images/productos/checkout/viveres/viveres10.png'),
(11, 'Bebidas', 'Agua embotellada (1.5 litros)', 'Agua embotellada (1.5 litros)', 0.70, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/bebidas/bebida1.png', 'images/productos/checkout/bebidas/bebidas1.png'),
(12, 'Bebidas', 'Jugo de naranja (1 litro)', 'Jugo de naranja (1 litro)', 2.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/bebidas/bebida2.png', 'images/productos/checkout/bebidas/bebidas2.png'),
(13, 'Bebidas', 'Refresco (2 litros)', 'Refresco (2 litros)', 1.50, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/bebidas/bebida3.png', 'images/productos/checkout/bebidas/bebidas3.png'),
(14, 'Bebidas', 'Café (250 g)', 'Café (250 g)', 4.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/bebidas/bebida4.png', 'images/productos/checkout/bebidas/bebidas4.png'),
(15, 'Bebidas', 'Té (20 bolsas)', 'Té (20 bolsas)', 2.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/bebidas/bebida5.png', 'images/productos/checkout/bebidas/bebidas5.png'),
(16, 'Bebidas', 'Cerveza (6 pack)', 'Cerveza (6 pack)', 8.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/bebidas/bebida6.png', 'images/productos/checkout/bebidas/bebidas6.png'),
(17, 'Bebidas', 'Vino (botella)', 'Vino (botella)', 10.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/bebidas/bebida7.png', 'images/productos/checkout/bebidas/bebidas7.png'),
(18, 'Bebidas', 'Leche de almendras (1 litro)', 'Leche de almendras (1 litro)', 3.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/bebidas/bebida8.png', 'images/productos/checkout/bebidas/bebidas8.png'),
(19, 'Bebidas', 'Bebida energética (1 unidad)', 'Bebida energética (1 unidad)', 2.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/bebidas/bebida9.png', 'images/productos/checkout/bebidas/bebidas9.png'),
(20, 'Bebidas', 'Sidra (1 litro)', 'Sidra (1 litro)', 5.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/bebidas/bebida10.png', 'images/productos/checkout/bebidas/bebidas10.png'),
(21, 'Snacks', 'Papas fritas (bolsa)', 'Papas fritas (bolsa)', 1.50, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/snacks/snack1.png', 'images/productos/checkout/snacks/snacks1.png'),
(22, 'Snacks', 'Galletas (paquete)', 'Galletas (paquete)', 2.50, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/snacks/snack2.png', 'images/productos/checkout/snacks/snacks2.png'),
(23, 'Snacks', 'Chocolate (barra)', 'Chocolate (barra)', 1.50, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/snacks/snack3.png', 'images/productos/checkout/snacks/snacks3.png'),
(24, 'Snacks', 'Palomitas de maíz (bolsa)', 'Palomitas de maíz (bolsa)', 1.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/snacks/snack4.png', 'images/productos/checkout/snacks/snacks4.png'),
(25, 'Snacks', 'Mix de frutos secos (250 g)', 'Mix de frutos secos (250 g)', 4.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/snacks/snack5.png', 'images/productos/checkout/snacks/snacks5.png'),
(26, 'Snacks', 'Barritas de granola (paquete de 6)', 'Barritas de granola (paquete de 6)', 3.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/snacks/snack6.png', 'images/productos/checkout/snacks/snacks6.png'),
(27, 'Snacks', 'Pretzels (bolsa)', 'Pretzels (bolsa)', 2.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/snacks/snack7.png', 'images/productos/checkout/snacks/snacks7.png'),
(28, 'Snacks', 'Chicles (paquete)', 'Chicles (paquete)', 1.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/snacks/snack8.png', 'images/productos/checkout/snacks/snacks8.png'),
(29, 'Snacks', 'Galletas saladas (paquete)', 'Galletas saladas (paquete)', 2.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/snacks/snack9.png', 'images/productos/checkout/snacks/snacks9.png'),
(30, 'Snacks', 'Golosinas (paquete)', 'Golosinas (paquete)', 2.50, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/snacks/snack10.png', 'images/productos/checkout/snacks/snacks10.png'),
(31, 'Limpieza', 'Detergente (1 litro)', 'Detergente (1 litro)', 3.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/limpieza/limpieza1.png', 'images/productos/checkout/limpieza/limpieza1.png'),
(32, 'Limpieza', 'Suavizante (1 litro)', 'Suavizante (1 litro)', 2.50, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/limpieza/limpieza2.png', 'images/productos/checkout/limpieza/limpieza2.png'),
(33, 'Limpieza', 'Limpiador multiusos (1 litro)', 'Limpiador multiusos (1 litro)', 2.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/limpieza/limpieza3.png', 'images/productos/checkout/limpieza/limpieza3.png'),
(34, 'Limpieza', 'Papel higiénico (4 rollos)', 'Papel higiénico (4 rollos)', 2.50, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/limpieza/limpieza4.png', 'images/productos/checkout/limpieza/limpieza4.png'),
(35, 'Limpieza', 'Toallas de papel (rollo)', 'Toallas de papel (rollo)', 1.50, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/limpieza/limpieza5.png', 'images/productos/checkout/limpieza/limpieza5.png'),
(36, 'Limpieza', 'Desinfectante (1 litro)', 'Desinfectante (1 litro)', 2.50, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/limpieza/limpieza6.png', 'images/productos/checkout/limpieza/limpieza6.png'),
(37, 'Limpieza', 'Lavaplatos líquido (1 litro)', 'Lavaplatos líquido (1 litro)', 2.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/limpieza/limpieza7.png', 'images/productos/checkout/limpieza/limpieza7.png'),
(38, 'Limpieza', 'Limpiador de vidrios (500 ml)', 'Limpiador de vidrios (500 ml)', 1.50, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/limpieza/limpieza8.png', 'images/productos/checkout/limpieza/limpieza8.png'),
(39, 'Limpieza', 'Cloro (1 litro)', 'Cloro (1 litro)', 1.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/limpieza/limpieza9.png', 'images/productos/checkout/limpieza/limpieza9.png'),
(40, 'Limpieza', 'Bolsas de basura (paquete de 20)', 'Bolsas de basura (paquete de 20)', 3.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/limpieza/limpieza10.png', 'images/productos/checkout/limpieza/limpieza10.png'),
(41, 'Aseo Personal', 'Jabón (1 unidad)', 'Jabón (1 unidad)', 1.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/aseopersonal/aseo1.png', 'images/productos/checkout/aseo_personal/aseo_personal1.png'),
(42, 'Aseo Personal', 'Champú (500 ml)', 'Champú (500 ml)', 3.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/aseopersonal/aseo2.png', 'images/productos/checkout/aseo_personal/aseo_personal2.png'),
(43, 'Aseo Personal', 'Pasta de dientes (1 tubo)', 'Pasta de dientes (1 tubo)', 2.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/aseopersonal/aseo3.png', 'images/productos/checkout/aseo_personal/aseo_personal3.png'),
(44, 'Aseo Personal', 'Desodorante (1 unidad)', 'Desodorante (1 unidad)', 3.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/aseopersonal/aseo4.png', 'images/productos/checkout/aseo_personal/aseo_personal4.png'),
(45, 'Aseo Personal', 'Acondicionador (500 ml)', 'Acondicionador (500 ml)', 3.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/aseopersonal/aseo5.png', 'images/productos/checkout/aseo_personal/aseo_personal5.png'),
(46, 'Aseo Personal', 'Enjuague bucal (500 ml)', 'Enjuague bucal (500 ml)', 4.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/aseopersonal/aseo6.png', 'images/productos/checkout/aseo_personal/aseo_personal6.png'),
(47, 'Aseo Personal', 'Crema corporal (250 ml)', 'Crema corporal (250 ml)', 3.50, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/aseopersonal/aseo7.png', 'images/productos/checkout/aseo_personal/aseo_personal7.png'),
(48, 'Aseo Personal', 'Papel higiénico (4 rollos)', 'Papel higiénico (4 rollos)', 2.50, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/aseopersonal/aseo8.png', 'images/productos/checkout/aseo_personal/aseo_personal8.png'),
(49, 'Aseo Personal', 'Toallas sanitarias (paquete de 10)', 'Toallas sanitarias (paquete de 10)', 3.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/aseopersonal/aseo9.png', 'images/productos/checkout/aseo_personal/aseo_personal9.png'),
(50, 'Aseo Personal', 'Rasuradoras desechables (paquete de 5)', 'Rasuradoras desechables (paquete de 5)', 2.00, '2024-06-25', 0.00, 1, NULL, 1, 'images/productos/thumbnails/aseopersonal/aseo10.png', 'images/productos/checkout/aseo_personal/aseo_personal10.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productocategoria`
--

CREATE TABLE `productocategoria` (
  `ProductoCategoriaID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productocategoria`
--

INSERT INTO `productocategoria` (`ProductoCategoriaID`, `Nombre`) VALUES
(1, 'viveres'),
(2, 'bebidas'),
(3, 'snacks'),
(4, 'limpieza'),
(5, 'aseo_personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productotipo`
--

CREATE TABLE `productotipo` (
  `productotipoID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `etiqueta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productotipo`
--

INSERT INTO `productotipo` (`productotipoID`, `Nombre`, `etiqueta`) VALUES
(1, 'Arroz (1 kg)', 'Víveres'),
(2, 'Pasta (500 g)', 'Víveres'),
(3, 'Lentejas (1 kg)', 'Víveres'),
(4, 'Harina (1 kg)', 'Víveres'),
(5, 'Frijoles (1 kg)', 'Víveres'),
(6, 'Aceite de oliva (1 litro)', 'Víveres'),
(7, 'Sal (1 kg)', 'Víveres'),
(8, 'Azúcar (1 kg)', 'Víveres'),
(9, 'Leche en polvo (500 g)', 'Víveres'),
(10, 'Avena (500 g)', 'Víveres'),
(11, 'Agua embotellada (1.5 litros)', 'Bebidas'),
(12, 'Jugo de naranja (1 litro)', 'Bebidas'),
(13, 'Refresco (2 litros)', 'Bebidas'),
(14, 'Café (250 g)', 'Bebidas'),
(15, 'Té (20 bolsas)', 'Bebidas'),
(16, 'Cerveza (6 pack)', 'Bebidas'),
(17, 'Vino (botella)', 'Bebidas'),
(18, 'Leche de almendras (1 litro)', 'Bebidas'),
(19, 'Bebida energética (1 unidad)', 'Bebidas'),
(20, 'Sidra (1 litro)', 'Bebidas'),
(21, 'Papas fritas (bolsa)', 'Snacks'),
(22, 'Galletas (paquete)', 'Snacks'),
(23, 'Chocolate (barra)', 'Snacks'),
(24, 'Palomitas de maíz (bolsa)', 'Snacks'),
(25, 'Mix de frutos secos (250 g)', 'Snacks'),
(26, 'Barritas de granola (paquete de 6)', 'Snacks'),
(27, 'Pretzels (bolsa)', 'Snacks'),
(28, 'Chicles (paquete)', 'Snacks'),
(29, 'Galletas saladas (paquete)', 'Snacks'),
(30, 'Golosinas (paquete)', 'Snacks'),
(31, 'Detergente (1 litro)', 'Limpieza'),
(32, 'Suavizante (1 litro)', 'Limpieza'),
(33, 'Limpiador multiusos (1 litro)', 'Limpieza'),
(34, 'Papel higiénico (4 rollos)', 'Limpieza'),
(35, 'Toallas de papel (rollo)', 'Limpieza'),
(36, 'Desinfectante (1 litro)', 'Limpieza'),
(37, 'Lavaplatos líquido (1 litro)', 'Limpieza'),
(38, 'Limpiador de vidrios (500 ml)', 'Limpieza'),
(39, 'Cloro (1 litro)', 'Limpieza'),
(40, 'Bolsas de basura (paquete de 20)', 'Limpieza'),
(41, 'Jabón (1 unidad)', 'Aseo Personal'),
(42, 'Champú (500 ml)', 'Aseo Personal'),
(43, 'Pasta de dientes (1 tubo)', 'Aseo Personal'),
(44, 'Desodorante (1 unidad)', 'Aseo Personal'),
(45, 'Acondicionador (500 ml)', 'Aseo Personal'),
(46, 'Enjuague bucal (500 ml)', 'Aseo Personal'),
(47, 'Crema corporal (250 ml)', 'Aseo Personal'),
(48, 'Papel higiénico (4 rollos)', 'Aseo Personal'),
(49, 'Toallas sanitarias (paquete de 10)', 'Aseo Personal'),
(50, 'Rasuradoras desechables (paquete de 5)', 'Aseo Personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `SectorID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `ZonaID` int(11) NOT NULL,
  `Costo` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`SectorID`, `Nombre`, `ZonaID`, `Costo`) VALUES
(1, 'Cutuglahua', 1, 8),
(2, 'Turubamba', 1, 7),
(3, 'Guamaní', 1, 7),
(4, 'La Ecuatoriana', 1, 7),
(5, 'Quitumbe', 1, 7),
(6, 'Chillogallo', 1, 7),
(7, 'La Mena', 1, 6),
(8, 'Solanda', 1, 6),
(9, 'La Argelia', 1, 6),
(10, 'San Bartolo', 1, 6),
(11, 'La Ferroviaria', 1, 6),
(12, 'Chilibulo', 1, 6),
(13, 'La Magdalena', 1, 4),
(14, 'Chimbacalle', 1, 5),
(15, 'Puengasí', 1, 5),
(16, 'La Libertad', 2, 6),
(17, 'Centro Histórico', 2, 6),
(18, 'Itchimbía', 2, 6),
(19, 'San Juan', 2, 7),
(20, 'Mariscal Sucre', 3, 7),
(21, 'Belisario Quevedo', 3, 7),
(22, 'Rumipamba', 3, 7),
(23, 'Iñaquito', 3, 8),
(24, 'Jipijapa', 3, 8),
(25, 'Cochapamba', 3, 8),
(26, 'La Concepción', 3, 8),
(27, 'La Kennedy', 3, 8),
(28, 'El Inca', 3, 8),
(29, 'Cotocollao', 3, 8),
(30, 'Ponceano', 3, 8),
(31, 'Comité del Pueblo', 3, 8),
(32, 'El Condado', 3, 8),
(33, 'Carcelén', 3, 8),
(34, 'Llano Chico', 3, 9),
(35, 'Llano Grande', 3, 9),
(36, 'Calderón', 3, 10),
(37, 'Pomasqui', 3, 12),
(38, 'Guangopolo', 4, 6),
(39, 'Conocoto', 4, 6),
(40, 'Alangasí', 4, 9),
(41, 'San Rafael', 4, 7),
(42, 'Sangolquí', 4, 8),
(43, 'Cumbayá', 5, 10),
(44, 'Tumbaco', 5, 10),
(45, 'Puembo', 5, 12),
(46, 'Yaruquí', 5, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablasecuencial`
--

CREATE TABLE `tablasecuencial` (
  `TablaSecuencialID` int(11) NOT NULL,
  `Tabla` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tablasecuencial`
--

INSERT INTO `tablasecuencial` (`TablaSecuencialID`, `Tabla`, `Valor`) VALUES
(1, 'Cliente', 1),
(2, 'Pedido', 1),
(3, 'PedidoDetalle', 1),
(4, 'Sucriptor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `ZonaID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`ZonaID`, `Nombre`) VALUES
(1, 'Sur'),
(2, 'Centro'),
(3, 'Norte'),
(4, 'Valle de los Chillos'),
(5, 'Valle de Tumbaco');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ClienteID`);

--
-- Indices de la tabla `impuestotarifa`
--
ALTER TABLE `impuestotarifa`
  ADD PRIMARY KEY (`ImpuestoTarifaID`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`PedidoID`);

--
-- Indices de la tabla `pedidoestado`
--
ALTER TABLE `pedidoestado`
  ADD PRIMARY KEY (`PedidoEstadoID`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ProductoID`);

--
-- Indices de la tabla `productocategoria`
--
ALTER TABLE `productocategoria`
  ADD PRIMARY KEY (`ProductoCategoriaID`);

--
-- Indices de la tabla `productotipo`
--
ALTER TABLE `productotipo`
  ADD PRIMARY KEY (`productotipoID`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`SectorID`);

--
-- Indices de la tabla `tablasecuencial`
--
ALTER TABLE `tablasecuencial`
  ADD PRIMARY KEY (`TablaSecuencialID`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`ZonaID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ProductoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `productotipo`
--
ALTER TABLE `productotipo`
  MODIFY `productotipoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
