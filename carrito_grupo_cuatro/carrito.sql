-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2024 a las 00:07:29
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
  `Precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `pedidodetalle`
--

INSERT INTO `pedidodetalle` (`PedidoDetalleID`, `PedidoID`, `ProductoID`, `Cantidad`, `Precio`) VALUES
(1, 1, 1, 1, 52),
(2, 1, 2, 1, 54),
(3, 1, 3, 1, 51),
(4, 1, 4, 1, 59),
(5, 1, 5, 1, 10),
(6, 1, 6, 1, 16),
(7, 1, 7, 1, 7),
(8, 1, 8, 1, 5),
(9, 1, 9, 1, 29);

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
  `ProductoCategorialD` varchar(50) DEFAULT NULL,
  `ProductoTipolD` varchar(50) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `FechaUltimoPrecio` date DEFAULT NULL,
  `Descuento` decimal(5,2) DEFAULT NULL,
  `Activo` tinyint(4) DEFAULT NULL,
  `Rutalmagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ProductoID`, `ProductoCategorialD`, `ProductoTipolD`, `Nombre`, `Precio`, `FechaUltimoPrecio`, `Descuento`, `Activo`, `Rutalmagen`) VALUES
(1, 'Víveres', 'Arroz (1 kg)', 'Arroz (1 kg)', 1.50, '2024-06-25', 0.00, 1, 'C:\\xampp1\\htdocs\\carrito1\\Imagenes\\viveres/Designe'),
(2, 'Víveres', 'Pasta (500 g)', 'Pasta (500 g)', 1.20, '2024-06-25', 0.00, 1, 'Imagenes/viveres/Designer (1)'),
(3, 'Víveres', 'Lentejas (1 kg)', 'Lentejas (1 kg)', 2.00, '2024-06-25', 0.00, 1, 'Imagenes/viveres/Designer (2).jpeg'),
(4, 'Víveres', 'Harina (1 kg)', 'Harina (1 kg)', 1.00, '2024-06-25', 0.00, 1, 'Imagenes/viveres/f.elconfidencial.com_original_6be'),
(5, 'Víveres', 'Frijoles (1 kg)', 'Frijoles (1 kg)', 2.50, '2024-06-25', 0.00, 1, 'Imagenes/viveres/lukasz-rawa-h-xmD_Sg_08-unsplash.'),
(6, 'Víveres', 'Aceite de oliva (1 litro)', 'Aceite de oliva (1 litro)', 6.00, '2024-06-25', 0.00, 1, 'Imagenes/viveres/roberta-sorge-uOBApnN_K7w-unsplas'),
(7, 'Víveres', 'Sal (1 kg)', 'Sal (1 kg)', 0.50, '2024-06-25', 0.00, 1, 'Imagenes/viveres/charlesdeluvio-sSLI7KXPwzU-unspla'),
(8, 'Víveres', 'Azúcar (1 kg)', 'Azúcar (1 kg)', 1.00, '2024-06-25', 0.00, 1, 'Imagenes/viveres/mathilde-langevin-ymEgsqhdOXw-uns'),
(9, 'Víveres', 'Leche en polvo (500 g)', 'Leche en polvo (500 g)', 3.00, '2024-06-25', 0.00, 1, 'Imagenes/viveres/howtogym-S9NchuPb79I-unsplash.jpg'),
(10, 'Víveres', 'Avena (500 g)', 'Avena (500 g)', 2.00, '2024-06-25', 0.00, 1, 'Imagenes/viveres/margarita-zueva-CY-OkOICA9o-unspl'),
(11, 'Bebidas', 'Agua embotellada (1.5 litros)', 'Agua embotellada (1.5 litros)', 0.70, '2024-06-25', 0.00, 1, ' Imagenes/bebidas/nathan-dumlao-sIVjw-ps25g'),
(12, 'Bebidas', 'Jugo de naranja (1 litro)', 'Jugo de naranja (1 litro)', 2.00, '2024-06-25', 0.00, 1, 'Imagenes/bebidas/paul-hanaoka-8WYjqXqNZs4-'),
(13, 'Bebidas', 'Refresco (2 litros)', 'Refresco (2 litros)', 1.50, '2024-06-25', 0.00, 1, ' Imagenes/bebidas/andrey-ilkevich-Qvnohn4Gy'),
(14, 'Bebidas', 'Café (250 g)', 'Café (250 g)', 4.00, '2024-06-25', 0.00, 1, 'Imagenes/bebidas/clay-banks-_wkd7XBRfU4-unsplash.j'),
(15, 'Bebidas', 'Té (20 bolsas)', 'Té (20 bolsas)', 2.00, '2024-06-25', 0.00, 1, 'Imagenes/bebidas/aniketh-kanukurthi-Qaor6nxikUM-un'),
(16, 'Bebidas', 'Cerveza (6 pack)', 'Cerveza (6 pack)', 8.00, '2024-06-25', 0.00, 1, 'Imagenes/bebidas/giovanna-gomes-_8KV86shhPo-unspla'),
(17, 'Bebidas', 'Vino (botella)', 'Vino (botella)', 10.00, '2024-06-25', 0.00, 1, 'Imagenes/bebidas/hector-j-rivas-N7M7mSgUgwo-unspla'),
(18, 'Bebidas', 'Leche de almendras (1 litro)', 'Leche de almendras (1 litro)', 3.00, '2024-06-25', 0.00, 1, 'Imagenes/bebidas/sandi-benedicta-8Pp9M13xuzs-unspl'),
(19, 'Bebidas', 'Bebida energética (1 unidad)', 'Bebida energética (1 unidad)', 2.00, '2024-06-25', 0.00, 1, 'Imagenes/bebidas/gkgraphix-53-Bf-K7BbYIMo-unsplash'),
(20, 'Bebidas', 'Sidra (1 litro)', 'Sidra (1 litro)', 5.00, '2024-06-25', 0.00, 1, 'Imagenes/bebidas/sidra2.jpg'),
(21, 'Snacks', 'Papas fritas (bolsa)', 'Papas fritas (bolsa)', 1.50, '2024-06-25', 0.00, 1, 'mockup-free-OEWFJWuGRKY-unsplash.jpg'),
(22, 'Snacks', 'Galletas (paquete)', 'Galletas (paquete)', 2.50, '2024-06-25', 0.00, 1, 'mae-mu-kID9sxbJ3BQ-unsplash.jpg'),
(23, 'Snacks', 'Chocolate (barra)', 'Chocolate (barra)', 1.50, '2024-06-25', 0.00, 1, 'tetiana-bykovets-H22N-9s8AUw-unsplash.jpg'),
(24, 'Snacks', 'Palomitas de maíz (bolsa)', 'Palomitas de maíz (bolsa)', 1.00, '2024-06-25', 0.00, 1, 'pylz-works-ViI6qkoRfNA-unsplash.jpg'),
(25, 'Snacks', 'Mix de frutos secos (250 g)', 'Mix de frutos secos (250 g)', 4.00, '2024-06-25', 0.00, 1, 'maksim-shutov-pUa1On18Jno-unsplash.jpg'),
(26, 'Snacks', 'Barritas de granola (paquete de 6)', 'Barritas de granola (paquete de 6)', 3.00, '2024-06-25', 0.00, 1, 'towfiqu-barbhuiya-Y-VDI9vQS3M-unsplash.jpg'),
(27, 'Snacks', 'Pretzels (bolsa)', 'Pretzels (bolsa)', 2.00, '2024-06-25', 0.00, 1, 'israel-albornoz-f3wRaue-5oI-unsplash.jpg'),
(28, 'Snacks', 'Chicles (paquete)', 'Chicles (paquete)', 1.00, '2024-06-25', 0.00, 1, 'hunter-newton-4-Luj-VwTvM-unsplash.jpg'),
(29, 'Snacks', 'Galletas saladas (paquete)', 'Galletas saladas (paquete)', 2.00, '2024-06-25', 0.00, 1, 'romina-bm-DnHnW-3I04I-unsplash.jpg'),
(30, 'Snacks', 'Golosinas (paquete)', 'Golosinas (paquete)', 2.50, '2024-06-25', 0.00, 1, 'luis-aguila-xLvIcAYuuMQ-unsplash.jpg'),
(31, 'Limpieza', 'Detergente (1 litro)', 'Detergente (1 litro)', 3.00, '2024-06-25', 0.00, 1, 'Imagenes/limpieza/clay-banks-kBaf0DwBPbE-unsplash.'),
(32, 'Limpieza', 'Suavizante (1 litro)', 'Suavizante (1 litro)', 2.50, '2024-06-25', 0.00, 1, 'Imagenes/limpieza/29168_G.jpg'),
(33, 'Limpieza', 'Limpiador multiusos (1 litro)', 'Limpiador multiusos (1 litro)', 2.00, '2024-06-25', 0.00, 1, 'Imagenes/limpieza/pan-xiaozhen-pj-BrFZ9eAA-unsplas'),
(34, 'Limpieza', 'Papel higiénico (4 rollos)', 'Papel higiénico (4 rollos)', 2.50, '2024-06-25', 0.00, 1, 'Imagenes/limpieza/colourblind-kevin-jEMcrcWSf3M-un'),
(35, 'Limpieza', 'Toallas de papel (rollo)', 'Toallas de papel (rollo)', 1.50, '2024-06-25', 0.00, 1, 'Imagenes/limpieza/toalla-z-economica-2.jpg'),
(36, 'Limpieza', 'Desinfectante (1 litro)', 'Desinfectante (1 litro)', 2.50, '2024-06-25', 0.00, 1, 'Imagenes/limpieza/no-revisions-MzKfGx6Kyd8-unsplas'),
(37, 'Limpieza', 'Lavaplatos líquido (1 litro)', 'Lavaplatos líquido (1 litro)', 2.00, '2024-06-25', 0.00, 1, 'Imagenes/limpieza/nathan-dumlao-mAWTLZIjI8k-unspla'),
(38, 'Limpieza', 'Limpiador de vidrios (500 ml)', 'Limpiador de vidrios (500 ml)', 1.50, '2024-06-25', 0.00, 1, 'Imagenes/limpieza/monika-borys-Jev1bpIZj2Y-unsplas'),
(39, 'Limpieza', 'Cloro (1 litro)', 'Cloro (1 litro)', 1.00, '2024-06-25', 0.00, 1, 'Imagenes/limpieza/Copia-de-220224_CBX_CH_CLX_Splas'),
(40, 'Limpieza', 'Bolsas de basura (paquete de 20)', 'Bolsas de basura (paquete de 20)', 3.00, '2024-06-25', 0.00, 1, 'Imagenes/limpieza/la-autentica-funda-de-basura-ind'),
(41, 'Aseo Personal', 'Jabón (1 unidad)', 'Jabón (1 unidad)', 1.00, '2024-06-25', 0.00, 1, 'Imagenes\\aseo_personal/alecsander-alves-WeEaKXZkBs'),
(42, 'Aseo Personal', 'Champú (500 ml)', 'Champú (500 ml)', 3.00, '2024-06-25', 0.00, 1, 'Imagenes\\aseo_personal/pmv-chamara-OXYOFT9gTOE-uns'),
(43, 'Aseo Personal', 'Pasta de dientes (1 tubo)', 'Pasta de dientes (1 tubo)', 2.00, '2024-06-25', 0.00, 1, 'Imagenes\\aseo_personal/jonathan-cooper-WdJRLZrWAvQ'),
(44, 'Aseo Personal', 'Desodorante (1 unidad)', 'Desodorante (1 unidad)', 3.00, '2024-06-25', 0.00, 1, 'Imagenes\\aseo_personal/mojtaba-mosayebzadeh-Uirh8K'),
(45, 'Aseo Personal', 'Acondicionador (500 ml)', 'Acondicionador (500 ml)', 3.00, '2024-06-25', 0.00, 1, 'Imagenes\\aseo_personal/neauthy-skincare-8jg7vumdUl'),
(46, 'Aseo Personal', 'Enjuague bucal (500 ml)', 'Enjuague bucal (500 ml)', 4.00, '2024-06-25', 0.00, 1, 'Imagenes\\aseo_personal/mishaal-zahed-KDJ1TbLDoOo-u'),
(47, 'Aseo Personal', 'Crema corporal (250 ml)', 'Crema corporal (250 ml)', 3.50, '2024-06-25', 0.00, 1, 'Imagenes\\aseo_personal/taylor-beach-kwu9Ny5dKOE-un'),
(48, 'Aseo Personal', 'Papel higiénico (4 rollos)', 'Papel higiénico (4 rollos)', 2.50, '2024-06-25', 0.00, 1, 'Imagenes\\aseo_personal/claire-mueller-3HoHDoFL5gM-'),
(49, 'Aseo Personal', 'Toallas sanitarias (paquete de 10)', 'Toallas sanitarias (paquete de 10)', 3.00, '2024-06-25', 0.00, 1, 'Imagenes\\aseo_personal/natracare-2eDUzkOfNpA-unspl'),
(50, 'Aseo Personal', 'Rasuradoras desechables (paquete de 5)', 'Rasuradoras desechables (paquete de 5)', 2.00, '2024-06-25', 0.00, 1, 'Imagenes\\aseo_personal/brett-jordan-SlBPJExlseU-un');

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
