

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Sistema`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categoria`
--

CREATE TABLE `Categoria` (
  `ID_Categria` int NOT NULL,
  `Categoria` varchar(30) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `Cliente`
--

CREATE TABLE `Cliente` (
  `ID_Cliente` int NOT NULL,
  `ID_Usuario` int NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Edad` varchar(50) DEFAULT 'No se estableció la edad.',
  `AyudaBusqueda` varchar(50) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `Fiar`
--

CREATE TABLE `Fiar` (
  `ID_Fiar` int NOT NULL,
  `ID_Cliente` int NOT NULL,
  `ID_Usuario` int NOT NULL,
  `ID_Producto` int NOT NULL,
  `Cantidad` int NOT NULL,
  `Deuda` decimal(18,2) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `ID_Inventario` int NOT NULL,
  `ID_Producto` int NOT NULL,
  `CantidadIncial` int NOT NULL,
  `CantidadVendida` int NOT NULL,
  `CantidadActual` int NOT NULL,
  `PrecioCompra` decimal(18,2) NOT NULL,
  `PrecioVenta` decimal(18,2) NOT NULL,
  `Ingresos` decimal(18,2) NOT NULL,
  `Egresis` decimal(18,2) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `Producto`
--

CREATE TABLE `Producto` (
  `ID_Producto` int NOT NULL,
  `ID_Usuario` int NOT NULL,
  `ID_Categria` int NOT NULL,
  `NombreProducto` varchar(50) NOT NULL,
  `Activo` bit(1) NOT NULL,
  `CodigoDelProducto` varchar(50) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `TipoUser`
--

CREATE TABLE `TipoUser` (
  `ID_TipoUser` int NOT NULL,
  `NombreTipoUser` varchar(30) NOT NULL
);

--
-- Dumping data for table `TipoUser`
--

INSERT INTO `TipoUser` (`ID_TipoUser`, `NombreTipoUser`) VALUES(1, 'Administrador');
INSERT INTO `TipoUser` (`ID_TipoUser`, `NombreTipoUser`) VALUES(2, 'Empleado');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID_Usuario` int NOT NULL,
  `ID_TipoUser` int DEFAULT NULL,
  `Users` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Edad` int DEFAULT NULL,
  `FotoPerfil` longblob,
  `Activo` bit(1) DEFAULT NULL,
  `Linea` bit(1) NOT NULL,
  `Cedula` varchar(50) NOT NULL,
  `NumeroDeTelefono` varchar(30) NOT NULL
);

--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`ID_Categria`);

--
-- Indexes for table `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`ID_Cliente`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indexes for table `Fiar`
--
ALTER TABLE `Fiar`
  ADD PRIMARY KEY (`ID_Fiar`),
  ADD KEY `ID_Cliente` (`ID_Cliente`),
  ADD KEY `ID_Producto` (`ID_Producto`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`ID_Inventario`),
  ADD KEY `inventario_ibfk_1` (`ID_Producto`);

--
-- Indexes for table `Producto`
--
ALTER TABLE `Producto`
  ADD PRIMARY KEY (`ID_Producto`),
  ADD KEY `Producto_ibfk_1` (`ID_Usuario`),
  ADD KEY `Producto_ibfk_2` (`ID_Categria`);

--
-- Indexes for table `TipoUser`
--
ALTER TABLE `TipoUser`
  ADD PRIMARY KEY (`ID_TipoUser`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD KEY `Users_ibfk_1` (`ID_TipoUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `ID_Categria` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Cliente`
--
ALTER TABLE `Cliente`
  MODIFY `ID_Cliente` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Fiar`
--
ALTER TABLE `Fiar`
  MODIFY `ID_Fiar` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `ID_Inventario` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Producto`
--
ALTER TABLE `Producto`
  MODIFY `ID_Producto` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `TipoUser`
--
ALTER TABLE `TipoUser`
  MODIFY `ID_TipoUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID_Usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Cliente`
--
ALTER TABLE `Cliente`
  ADD CONSTRAINT `Cliente_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `Users` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Fiar`
--
ALTER TABLE `Fiar`
  ADD CONSTRAINT `Fiar_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `Cliente` (`ID_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fiar_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `Producto` (`ID_Producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fiar_ibfk_3` FOREIGN KEY (`ID_Usuario`) REFERENCES `Users` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`ID_Producto`) REFERENCES `Producto` (`ID_Producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Producto`
--
ALTER TABLE `Producto`
  ADD CONSTRAINT `Producto_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `Users` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Producto_ibfk_2` FOREIGN KEY (`ID_Categria`) REFERENCES `Categoria` (`ID_Categria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`ID_TipoUser`) REFERENCES `TipoUser` (`ID_TipoUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
