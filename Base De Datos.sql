-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2020 a las 00:13:12
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgrh_surtimaxbd`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectEstudiosID` (IN `_ID` INT)  SELECT * FROM estudios WHERE ID_Candidate = _ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectExperienciaID` (IN `_ID` INT)  SELECT * FROM work_experience WHERE ID_Candidate = _ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectIdiomasID` (IN `_ID` INT)  SELECT * FROM idiomas WHERE ID_Candidate = _ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectReferenciasID` (IN `_ID` INT)  SELECT * FROM personal_references WHERE ID_Candidate = _ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPASK_PASS` (IN `_PASSWORD` VARCHAR(70), `_ID_EMPLOYEE` INT)  BEGIN 
SELECT * FROM users WHERE PASSWORD = _PASSWORD AND ID_Employee = _ID_EMPLOYEE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPASSIGN_EMPLOYEE` (IN `_VALOR` INT)  BEGIN 
SELECT * FROM Employee WHERE ID = _VALOR; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPCOUNT_EMPLOYEE` (IN `_STATUS` CHAR(1))  BEGIN 
 SELECT count(Status) as empActivos FROM Employee WHERE Status = _STATUS; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPCOUNT_USERS` (IN `_STATUS` CHAR(1))  BEGIN 
SELECT count(Employee.ID) as usuActivos FROM Users inner join Employee on Employee.ID = Users.ID_Employee WHERE Employee.Status = _STATUS;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPDELETE_NOTE` (IN `_ID` INT)  BEGIN 
DELETE FROM notas WHERE ID = _ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPEDIT_EMPLOYEE` (IN `_NAME` VARCHAR(30), `_LASTNAME` VARCHAR(30), `_TYPEDOCUMENT` CHAR(2), `_NUMDOCUMENT` BIGINT, `_ADDRESS` VARCHAR(50), `_BIRTHDATE` DATE, `_PHONE` BIGINT, `_CELLPHONE` BIGINT, `_MAIL` VARCHAR(100), `_GENDER` CHAR(1), `_MARITALSTATUS` CHAR(1), `_EPS` VARCHAR(30), `_ARL` VARCHAR(30), `_ID_OCCUPATION` INT, `_PHOTO` VARCHAR(255), `_ID_EMPLOYEE` INT)  BEGIN 
 UPDATE EMPLOYEE SET NAME = _NAME, LASTNAME = _LASTNAME, TYPEDOCUMENT = _TYPEDOCUMENT, ADDRESS = _ADDRESS, BIRTHDATE = _BIRTHDATE, PHONE = _PHONE, CELLPHONE = _CELLPHONE, MAIL = _MAIL, GENDER = _GENDER, MARITALSTATUS = _MARITALSTATUS, EPS = _EPS, ARL = _ARL, PHOTO = _PHOTO, ID_OCCUPATION = _ID_OCCUPATION, ID_EMPLOYEE = _ID_EMPLOYEE WHERE NUMDOCUMENT = _NUMDOCUMENT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPEDIT_NOTE` (IN `_NOTA` TEXT, `_NOMBRE` VARCHAR(30), `_APELLIDO` VARCHAR(30), `_ID` INT)  BEGIN 
UPDATE notas SET nota = _NOTA, fecha = now(), nombre = _NOMBRE, apellido = _APELLIDO WHERE ID = _ID; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPEDIT_PASS` (IN `_PASSWORD` VARCHAR(70), `_PASSWORD_CURRENT` VARCHAR(70), `_ID_EMPLOYEE` INT)  BEGIN 
UPDATE users SET Password = _PASSWORD WHERE Password = _PASSWORD_CURRENT AND ID_Employee = _ID_EMPLOYEE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPEDIT_ROLE` (IN `_ID` INT)  BEGIN
UPDATE EMPLOYEE SET PERFIL = "SI" WHERE ID = _ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPEDIT_USER` (IN `_ULTIMOLOGIN` DATETIME, `_TOTALLOGIN` BIGINT, `_ID_EMPLOYEE` INT)  BEGIN 
UPDATE users SET ultimoLogin = _ULTIMOLOGIN, totalLogin = _TOTALLOGIN WHERE ID_Employee = _ID_EMPLOYEE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPFULL_LOGIN` (IN `_STATUS` CHAR(1))  BEGIN 
SELECT users.totalLogin, Employee.Name, Employee.LastName FROM users INNER JOIN Employee ON Employee.ID = users.ID_Employee WHERE Employee.Status = _STATUS;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPGRAPH_ROLE` ()  BEGIN
SELECT Occupation.Type, count(Occupation.ID) AS total FROM Employee INNER JOIN Occupation ON Employee.ID_Occupation = Occupation.ID WHERE Employee.Status = 'A' GROUP BY(Type);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPGRAPH_ROLES` ()  BEGIN
SELECT occupation.type, count(Employee.ID) AS total FROM employee INNER JOIN occupation ON Employee.ID_Occupation = occupation.ID INNER JOIN users ON users.ID_Employee = Employee.ID WHERE Status = 'A' GROUP BY(occupation.Type);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPLIST_ROLES` (IN `_STATUS` CHAR(1))  BEGIN 
SELECT Employee.ID, Employee.Mail, Employee.Name, Employee.LastName, Employee.TypeDocument, Employee.NumDocument, Occupation.Type, Employee.ID_Occupation FROM Employee INNER JOIN Occupation ON Employee.ID_Occupation = Occupation.ID WHERE (Employee.ID_Occupation = 1 OR Employee.ID_Occupation = 2) AND Employee.perfil = 'NO' AND Employee.Status = _STATUS;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPNEW_EMPLOYEE` (IN `_NAME` VARCHAR(30), `_LASTNAME` VARCHAR(30), `_TYPEDOCUMENT` CHAR(2), `_NUMDOCUMENT` BIGINT, `_ADDRESS` VARCHAR(50), `_BIRTHDATE` DATE, `_PHONE` BIGINT, `_CELLPHONE` BIGINT, `_MAIL` VARCHAR(100), `_GENDER` CHAR(1), `_MARITALSTATUS` CHAR(1), `_EPS` VARCHAR(30), `_ARL` VARCHAR(30), `_PHOTO` VARCHAR(255), `_ID_OCCUPATION` INT, `_ID_EMPLOYEE` INT)  BEGIN 
  INSERT INTO EMPLOYEE(NAME, LASTNAME, TYPEDOCUMENT, NUMDOCUMENT, ADDRESS, BIRTHDATE, ADMISSIONDATE, PHONE, CELLPHONE, MAIL, GENDER, MARITALSTATUS, EPS, ARL, PHOTO, STATUS ,ID_OCCUPATION, ID_EMPLOYEE, PERFIL) VALUES (_NAME, _LASTNAME, _TYPEDOCUMENT, _NUMDOCUMENT, _ADDRESS, _BIRTHDATE, NOW(), _PHONE, _CELLPHONE, _MAIL, _GENDER, _MARITALSTATUS, _EPS, _ARL, _PHOTO, "A", _ID_OCCUPATION, _ID_EMPLOYEE, "NO"); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPNEW_MSG` (IN `_MENSAJE` TEXT, `_USUARIO` VARCHAR(40), `_FOTO` VARCHAR(255))  BEGIN 
INSERT INTO CHAT(MENSAJE, USUARIO, FOTO, FECHA) VALUES(_MENSAJE, _USUARIO, _FOTO, NOW());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPNEW_NOTA` (IN `_NOTA` TEXT, `_NOMBRE` VARCHAR(30), `_APELLIDO` VARCHAR(30))  BEGIN 
INSERT INTO NOTAS(NOTA, FECHA, NOMBRE, APELLIDO) VALUES(_NOTA, NOW(), _NOMBRE, _APELLIDO);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPNEW_USER` (IN `_PASSWORD` VARCHAR(70), `_ID_EMPLOYEE` INT)  BEGIN 
INSERT INTO USERS(PASSWORD, ID_EMPLOYEE, TOTALLOGIN) VALUES(_PASSWORD, _ID_EMPLOYEE, 0);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPSEARCH_EMPLOYEE_GENERAL` ()  BEGIN
SELECT Employee.ID, Employee.Name, Employee.LastName, Employee.TypeDocument, Employee.NumDocument, Employee.Photo, Employee.cellphone, Employee.Phone,Employee.Address, Employee.Mail, Occupation.Type, Employee.Status, Employee.Birthdate, Employee.Admissiondate, Employee.Gender, Employee.Maritalstatus, Employee.Eps, Employee.Arl FROM Employee INNER JOIN 
Occupation ON Occupation.ID = Employee.ID_Occupation ORDER BY Employee.ID ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPSEARCH_EMPLOYEE_ID` (IN `_ID` INT)  BEGIN
SELECT Employee.ID, Employee.Name, Employee.LastName, Employee.TypeDocument, Employee.NumDocument, Employee.Photo, Employee.cellphone, Employee.Phone,Employee.Address, Employee.Mail, Occupation.Type, Employee.Status, Employee.Birthdate, Employee.Admissiondate, Employee.Gender, Employee.Maritalstatus, Employee.Eps, Employee.Arl FROM Employee INNER JOIN 
Occupation ON Occupation.ID = Employee.ID_Occupation WHERE Employee.ID = _ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPSEARCH_EMPLOYEE_STATUS` ()  BEGIN
SELECT Employee.ID, Employee.Name, Employee.LastName, Employee.TypeDocument, Employee.NumDocument, Employee.Photo, Employee.cellphone, Employee.Phone,Employee.Address, Employee.Mail, Occupation.Type, Employee.Status, Employee.Birthdate, Employee.Admissiondate, Employee.Gender, Employee.Maritalstatus, Employee.Eps, Employee.Arl FROM Employee INNER JOIN 
Occupation ON Occupation.ID = Employee.ID_Occupation WHERE Employee.Status = 'A';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPSEARCH_USER` ()  BEGIN
SELECT Employee.ID, Employee.Name, Employee.LastName, Employee.Photo, Employee.TypeDocument, Employee.NumDocument, Employee.Mail, Employee.Gender, Employee.Phone, Employee.Cellphone, Employee.Status, Occupation.Type, Users.ultimoLogin FROM Employee INNER JOIN Users ON Employee.ID = Users.ID_Employee INNER JOIN Occupation ON Employee.ID_Occupation = Occupation.ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPSEE_MESSAGES` ()  BEGIN
SELECT * FROM CHAT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPSEE_NOTES` ()  BEGIN
SELECT * FROM NOTAS;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPSTATUS_EMPLOYEE` (IN `_STATUS` CHAR(1), `_ID` INT)  BEGIN 
 UPDATE EMPLOYEE SET STATUS = _STATUS WHERE ID = _ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPVALIDATE_CELLPHONE` (IN `_VALOR` BIGINT)  BEGIN 
SELECT * FROM Employee WHERE CELLPHONE = _VALOR; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPVALIDATE_DOCUMENT` (IN `_VALOR` BIGINT)  BEGIN 
SELECT * FROM Employee WHERE NUMDOCUMENT = _VALOR; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPVALIDATE_MAIL` (IN `_VALOR` VARCHAR(100))  BEGIN 
SELECT * FROM Employee WHERE MAIL = _VALOR; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_SIGNIN` (IN `_MAIL` VARCHAR(30))  BEGIN
SELECT employee.Mail, users.Password, employee.Name, employee.LastName, employee.TypeDocument, employee.NumDocument, employee.Photo, occupation.Type, employee.ID, employee.Status, users.totalLogin  FROM employee inner join users on users.ID_employee = employee.ID inner join occupation on occupation.ID = employee.ID_Occupation WHERE employee.Mail = _MAIL;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academic_training`
--

CREATE TABLE `academic_training` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Certification` varchar(255) NOT NULL,
  `Institution` varchar(50) NOT NULL,
  `ID_Candidate` int(11) NOT NULL,
  `ID_Level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `academic_training`
--

INSERT INTO `academic_training` (`ID`, `Name`, `Time`, `Certification`, `Institution`, `ID_Candidate`, `ID_Level`) VALUES
(1, 'Diseño De Exterior', '11 Años', 'URLCERTIFICACION', 'Celestin Freinet', 52867815, 5),
(2, 'Ingeniero', '14 Años', 'URLCERTIFICACION', 'Dulce Maria', 1062937631, 5),
(3, 'Trader', '11 Años', 'URLCERTIFICACION', 'Celestin', 2147483647, 6),
(7, 'Aseos Generales', '15 años', 'URL CERT', 'Colegio', 45698745, 2),
(8, 'bachiller', '5 Dias', 'URL CERT', ' SENA', 45698745, 2),
(9, 'Videojuegos', '2 Dias ', 'URL CERT', 'Sena', 45698745, 2),
(10, 'Aseos Generales', '15 años', 'URL CERT', 'Colegio', 896654785, 2),
(11, 'bachiller', '5 Dias', 'URL CERT', 'SENA', 896654785, 4),
(12, 'Videojuegos', '5 horas', 'URL CERT', 'Universidad Andes', 896654785, 2),
(13, 'Aseos Generales', '15 años', 'URL CERT', 'Casa', 36521478, 1),
(14, 'Tecnica en Sistemas', '5 Dias', 'URL CERT', ' SENA', 36521478, 5),
(15, 'Videojuegos', '2 Dias ', 'URL CERT', 'Sena', 36521478, 4),
(16, 'Primaria', '15 años', 'URL CERT', 'Casa', 2147483647, 7),
(17, 'Tecnica en Sistemas', '5 Dias', 'URL CERT', ' SENA', 2147483647, 7),
(18, 'Videojuegos', '5 horas', 'URL CERT', 'Sena', 2147483647, 4),
(19, 'Artes Plasticas', '15 años', 'URL CERT', 'Colegio', 1000381632, 3),
(20, 'bachiller', '5 Dias', 'URL CERT', 'SENA', 1000381632, 2),
(21, 'Videojuegos', '5 horas', 'URL CERT', 'Sena', 1000381632, 5),
(25, 'Artes Plasticas', '15 años', 'URL CERT', 'Casa', 789655412, 5),
(26, 'Tecnica en Sistemas', '5 Dias', 'URL CERT', 'SENA', 789655412, 5),
(27, 'Videojuegos', '2 Dias ', 'URL CERT', 'Universidad Andes', 789655412, 4),
(34, 'Artes Plasticas', '15 años', 'URL CERT', 'Casa', 33659987, 3),
(35, 'Tecnica en Sistemas', '5 Dias', 'URL CERT', 'SENA', 33659987, 4),
(36, 'Videojuegos', '2 Dias ', 'URL CERT', 'Sena', 33659987, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `announcement`
--

CREATE TABLE `announcement` (
  `ID` int(11) NOT NULL,
  `State` char(1) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ID_Employee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `announcement`
--

INSERT INTO `announcement` (`ID`, `State`, `Date`, `ID_Employee`) VALUES
(1, 'A', '2020-09-11 13:44:19', 1),
(2, 'I', '2020-09-11 13:44:47', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidate`
--

CREATE TABLE `candidate` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `LastName` varchar(30) DEFAULT NULL,
  `TypeDocument` char(2) DEFAULT NULL,
  `NumDocument` int(20) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `Phone` bigint(20) DEFAULT (0 - 0),
  `Cellphone` bigint(20) DEFAULT NULL,
  `Mail` varchar(30) DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `Maritalstatus` char(1) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `DescriptionC` text DEFAULT NULL,
  `Status` char(1) DEFAULT NULL,
  `DateAplication` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Id_Vacant` int(11) DEFAULT NULL,
  `statusReview` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `candidate`
--

INSERT INTO `candidate` (`ID`, `Name`, `LastName`, `TypeDocument`, `NumDocument`, `Address`, `Birthdate`, `Phone`, `Cellphone`, `Mail`, `Gender`, `Maritalstatus`, `Photo`, `DescriptionC`, `Status`, `DateAplication`, `Id_Vacant`, `statusReview`) VALUES
(0, '', '', '', 0, '', '0000-00-00', 0, 0, '', '', '', '', '', 'I', '2020-10-30 21:56:11', NULL, 0),
(98, 'ANDERSON', 'PACHECO', 'CE', 898989, 'Calle 59 No. 27 - 35 Barrio Galán', '1996-05-19', 9987745, 9874563201, 'anderson@mail', 'M', 'D', 'views/assets/img/avatar.png', 'Persona responsable, apasionada por el aprendizaje y la innovación. Con experiencia en publicidad y mercadeo.', 'I', '2020-10-29 21:41:57', 1, 0),
(95, 'ANDERSON ', 'PACHECO', 'CE', 6694994, '07304 Roberto Torrente Apt. 578', '1992-02-14', 6694994, 3265987412, 'anderson@mail', 'M', 'D', 'views/assets/img/avatare.png', 'Persona seria, responsable y dinámica, con facilidad de adaptación. Disfruto del constante aprendizaje, lo cual ha significado para mi trayectoria profesional, una gran ventaja en la medida en que presto especial interés a la innovación y la mejora de las tareas y los procesos en los cuales me involucro.', 'E', '2020-10-29 19:02:13', 3, 0),
(96, 'ALAN', ' PEREZ', 'CC', 33659987, 'Carrera 56A No. 51 - 81', '1992-11-15', 63332599, 9888874445, 'alan@mail.com', 'F', 'S', 'views/assets/img/avatar1.png', ' Tengo experiencia en múltiples áreas de mi ámbito laboral; busco vincularme a una empresa que valore la creatividad y permita a sus trabajadores crecer en el campo laboral.', 'A', '2020-10-29 20:52:29', 3, 0),
(94, 'JUNAITO', 'ARIZA ', 'CC', 36521478, '379 Adela Riera', '1993-03-01', 987455632, 6325478945, 'juanito@mail.com', 'M', 'D', 'views/assets/img/avatare.png', 'Tengo experiencia en desarrollo de producto y diseño de experiencias de usuario. Actualmente me desempeño en el campo de la gestión para el diseño.', 'A', '2020-10-29 20:52:36', 2, 0),
(37, 'CARMEN ', 'ARIZA', 'PA', 45698745, '55663 Clemente 759 - Juliatown, Nav  88248', '1986-09-09', 6659559, 3123605987, 'carmen@mail.com', 'O', 'D', 'views/assets/img/avatar2.png', 'Soy una persona paciente, amable y con muchas ganas de aprender. En el momento me encuentro en la búsqueda de un empleo en atención al cliente en el cual pueda demostrar mis habilidades para entablar relaciones interpersonales. Soy muy responsable, aprendo rápido y tengo muy buena disposición.', 'S', '2020-10-30 22:54:41', 1, 0),
(101, 'ANDERSON', 'PACHECO', 'CC', 45698765, 'Calle 20 No. 22 - 27 piso 3 Edificio Cumanday', '1984-09-12', 9874569, 3698521470, 'anderson@mail', 'M', 'V', 'views/assets/img/avatar.png', 'Soy una persona dinámica y creativa, habituada al trabajo bajo presión. Tengo experiencia en atención al usuario y muy buenas relaciones interpersonales, por lo cual se me facilita el trabajo en equipo, lo cual además disfruto.', 'A', '2020-10-29 20:34:03', 1, 0),
(22, ' FRANCISCO', 'DETRONES', 'CE', 49855525, '263 Ureña Lugar Apt. 462', '1987-12-15', 64498775, 3256987412, 'man@mail.com', 'M', 'D', 'views/assets/img/avatare.png', 'Soy una persona perfeccionista con gusto por la actualización constante y el aprendizaje continuo. Considero en el uso responsable de las tecnologías y el tratamiento de datos, como una responsabilidad del ingeniero y de todos los profesionales en las áreas de manejo de la información.', 'E', '2020-10-29 20:34:07', 2, 0),
(1, 'ELENA', 'PEREZ', 'CC', 52867815, 'Cra 131 # 132 C-03', '2000-06-12', 6694994, 3123636573, 'elena@elena.com', 'F', 'U', 'views/assets/img/usuarios/1000567887/163.jpg', 'Soy una persona emprendedora, que adora los retos y no se rinde fácilmente. Muy detallista y autodidacta cada día, nunca dejo de aprender y tengo un especial don de gentes.', 'A', '2020-10-30 23:03:05', 2, 0),
(17, 'JUANITO', 'PEREZ ', 'CC', 91135492, 'Calle 12 No. 4 - 19  Edificio Panamericano Of. 406', '2001-07-27', 3123636573, 3123636573, 'juan@mail.com', 'F', 'S', 'views/assets/img/avatar.png', 'Auxiliar administrativo con experiencia en actualización, registro y manejo de información a gran escalada, además de tareas varias.\r\nSoy una persona proactiva, organizada y responsable, con muy buenas relaciones interpersonales. Siempre tengo la mejor disposición para la realización de mis labores y cumplo ágilmente con las tareas que me son asignadas.', 'A', '2020-10-29 20:34:22', 2, 0),
(18, 'EDILSON ', 'ARIZA ', 'CC', 97889654, '520 Leal Colonia Apt. 153', '1987-06-03', 6698779, 6325478945, 'edilson@mail', 'M', 'C', 'views/assets/img/avatar.png', 'Profesional en administración de empresas con experiencia en gestión y establecimiento de procesos en el área comercial. Poseo una alta capacidad para entablar relaciones interpersonales y manejo 3 idiomas a nivel profesional: español, inglés y francés.', 'E', '2020-10-29 20:34:28', 3, 0),
(34, 'ANTONIETA', 'PEREZ', 'CE', 569874412, '093 Carmen Bajada Suite 963', '1992-07-04', 6687445, 3157896457, 'antonieta@mail.com', 'F', 'U', 'views/assets/img/avatar2.png', 'Ingeniero industrial con más de 5 años de experiencia en mejora y optimización de procesos en negocios de atención al cliente. A nivel profesional, considero que es fundamental para el ingeniero readaptarse constantemente e integrar la tecnología a las necesidades del ser humano para optimizar resultados.', 'S', '2020-10-29 17:55:13', 3, 0),
(97, 'JOSE', 'RODRIGUEZ', 'CE', 789655412, 'Carrera 54 No. 68 - 80 Barrio el Prado', '1994-05-21', 9987556, 3265899741, 'jose@mail.com', 'O', 'C', 'views/assets/img/avatar.png', 'Soy una persona amable, paciente y comunicativa. Tengo muy buenas relaciones interpersonales y aprendo rápidamente. Como profesional, siempre estoy a la vanguardia de las tendencias en mi campo y doy gran importancia a la innovación y el detalle', 'A', '2020-10-29 20:34:32', 3, 0),
(100, 'OLGA', 'PACHECO', 'CC', 896654785, 'Carrera 10A No. 20 - 40  Edificio El Clarín piso 3', '1996-05-04', 5558966321, 6987745236, 'Olga@mail.com', 'F', 'C', 'views/assets/img/avatar1.png', 'Actualmente me encuentro en la búsqueda de un empleo en el que pueda demostrar mis habilidades aportando valor agregado a la empresa y ayudando a la resolución de problemas al interior de ella.', 'S', '2020-10-29 17:55:13', 2, 0),
(99, 'LUCILA', ' MOTAVITA', 'PA', 1000381632, 'Carrera 7A No. 32 - 63 piso 2', '1989-09-11', 35697000, 3100000000, 'Lucla@mail', 'O', 'C', 'views/assets/img/avatar.png', 'Actualmente me encuentro en la búsqueda de un empleo en el que pueda aprender mucho y demostrar mis capacidades, al interior de una empresa en la que pueda crecer a futuro tanto a nivel personal como profesional.', 'E', '2020-10-29 20:34:37', 3, 0),
(4, 'VALENTINA', 'ARIZA', 'CE', 1000823222, 'Carrera 56A No. 51 - 81', '1993-08-11', 6694994, 3126985120, 'Valentina@Ariza.com', 'F', 'C', 'views/assets/img/avatar2.png', 'Soy una persona paciente, amable y con muchas ganas de aprender. En el momento me encuentro en la búsqueda de un empleo en atención al cliente en el cual pueda demostrar mis habilidades para entablar relaciones interpersonales. Soy muy responsable, aprendo rápido y tengo muy buena disposición.', 'A', '2020-10-30 22:55:16', 1, 0),
(2, 'Andrés', 'Montaña', 'CE', 1062937631, 'Cra 45#424-75', '1997-11-22', 70916732, 3093713931, 'Andres11@gmail.com', 'M', 'C', 'views/assets/img/avatar.png', 'Con años de experiencia en la gestión de sistemas, he sido   capaz de adaptarme a los diferentes planes informáticos de las empresas para las que he trabajado. Adicionalmente, cuento con una gran capacidad de análisis de la información y experiencia en la gestión de   equipos.', 'A', '2020-10-29 20:34:44', 2, 0),
(3, 'MIGUEL', 'LOZANO', 'PA', 2147483647, 'Cra 15#124-15', '1991-08-09', 79017352, 3009163431, 'Migu09255@gmail.com', 'M', 'V', 'views/assets/img/avatar.png', 'Soy un tipo de trabajador que está acostumbrado al trabajo  bajo presión, tengo varios años de experiencia en atención al cliente y en búsqueda de oportunidades comerciales. También me considero una persona resolutiva, con buen ánimo y capaz de resolver problemas   fácilmente.', 'S', '2020-10-29 17:55:13', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `ID` int(11) NOT NULL,
  `MENSAJE` text DEFAULT NULL,
  `USUARIO` varchar(40) DEFAULT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`ID`, `MENSAJE`, `USUARIO`, `FOTO`, `FECHA`) VALUES
(139, 'hola mundo', 'Andrey', 'views/assets/img/avatar.png', '2020-08-18 21:21:27'),
(141, 'hola a todos', 'Andrey', 'views/assets/img/avatar.png', '2020-08-19 16:28:48'),
(142, 'hola a todos', 'ANDREY STEVEN', 'views/assets/img/usuarios/1000459754/852.jpg', '2020-09-16 13:08:16'),
(143, 'holis', 'ANDREY STEVEN', 'views/assets/img/usuarios/1000459754/852.jpg', '2020-09-27 23:37:36'),
(144, 'hola a todos', 'ANDREY STEVEN', 'views/assets/img/usuarios/1000459754/852.jpg', '2020-10-06 00:08:44'),
(145, 'Hi men ', 'ARLEX', 'views/assets/img/usuarios/1193566275/598.jpg', '2020-10-20 12:45:09'),
(146, 'Recordar Traer Informes ', 'ARLEX', 'views/assets/img/usuarios/1193566275/598.jpg', '2020-10-26 09:46:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details_announcement`
--

CREATE TABLE `details_announcement` (
  `ID` int(11) NOT NULL,
  `ID_Vacant` int(11) DEFAULT NULL,
  `ID_Announcement` int(11) DEFAULT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `details_announcement`
--

INSERT INTO `details_announcement` (`ID`, `ID_Vacant`, `ID_Announcement`, `Quantity`) VALUES
(1, 4, 1, 2),
(2, 1, 1, 3),
(3, 3, 2, 3),
(4, 2, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `TypeDocument` char(2) NOT NULL,
  `NumDocument` bigint(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Birthdate` date NOT NULL,
  `Admissiondate` timestamp NULL DEFAULT NULL,
  `Phone` bigint(20) DEFAULT NULL,
  `Cellphone` bigint(20) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Maritalstatus` char(1) NOT NULL,
  `Eps` varchar(30) NOT NULL,
  `Arl` varchar(30) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Status` char(1) NOT NULL,
  `ID_Occupation` int(11) NOT NULL,
  `ID_Employee` int(11) DEFAULT NULL,
  `PERFIL` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `employee`
--

INSERT INTO `employee` (`ID`, `Name`, `LastName`, `TypeDocument`, `NumDocument`, `Address`, `Birthdate`, `Admissiondate`, `Phone`, `Cellphone`, `Mail`, `Gender`, `Maritalstatus`, `Eps`, `Arl`, `Photo`, `Status`, `ID_Occupation`, `ID_Employee`, `PERFIL`) VALUES
(1, 'ARLEX', 'ARIZA AGUDELO', 'CC', 1193566275, 'CLL 66 # 68-70', '2002-07-01', '2020-09-11 05:56:09', 6694994, 3107511448, 'arlex123@gmail.com', 'M', 'S', 'COMPENSAR', 'COLMENA', 'views/assets/img/usuarios/1193566275/598.jpg', 'A', 1, 3, 'SI'),
(2, 'LUIS ALBERTO', 'NIñO MONTAñA', 'CC', 1000951631, 'CRA 145#150-35', '2002-12-12', '2020-09-11 05:56:09', 7949933, 3002339931, 'luisninomontana@gmail.com', 'M', 'S', 'SALUD TOTAL', 'COLMENA', 'views/assets/img/usuarios/1000951631/343.png', 'A', 1, 3, 'SI'),
(3, 'ANDREY STEVEN', 'PARRA ARIZA', 'CC', 1000459754, 'DIG 152 # 34-12', '2002-03-12', '2020-09-11 05:56:09', 3459859, 3126369875, 'asparra13@gmail.com', 'M', 'C', 'SANITAS', 'COLMENA', 'views/assets/img/usuarios/1000459754/852.jpg', 'A', 1, 3, 'SI'),
(4, 'JUAN', 'ARISTIZABAL', 'CC', 1000459752, 'DIG 552 37b', '1999-10-15', '2020-09-11 05:56:09', 3459494, 3596987654, 'juanparra13@gmail.com', 'M', 'V', 'SANITAS', 'COLMENA', 'views/assets/img/usuarios/1000459752/516.png', 'A', 2, 1, 'SI'),
(5, 'FERNEY CARLOS', 'RODRIGUEZ SALAMANCA', 'CC', 1000459434, 'DIG 1140 37B', '1975-01-01', '2020-09-11 05:56:09', 3455459, 3145698778, 'rodriguez14@gmail.com', 'M', 'S', 'FAMISANAR', 'COLMENA', 'views/assets/img/usuarios/1000459434/855.jpg', 'A', 3, 3, 'NO'),
(6, 'JUAN ', 'VALDEZ PAEZ', 'CC', 1000456789, 'DIG 151 B # 136 A 75', '2020-08-12', '2020-09-11 05:56:09', 4598767, 3124567890, 'Juan@gmail.com', 'M', 'C', 'SANITAS', 'COLMENA', 'views/assets/img/usuarios/1000456789/189.png', 'A', 4, 3, 'SI'),
(7, 'ANDRES CARLOS', 'CORTES LOPEZ', 'TI', 1000567890, 'DIG 151 B # 136 A 50', '2020-08-10', '2020-09-11 05:56:09', 4567890, 3203974567, 'asparr113@misena.edu.co', 'F', 'C', 'SANITAS', 'COLMENA', 'views/assets/img/usuarios/1000567890/528.jpg', 'A', 5, 3, 'NO'),
(8, 'JUAN ANDRES', 'TORRES UMENZA', 'TI', 234567890, 'CLL 66 # 45-60', '2020-10-22', '2020-10-09 23:37:06', 2345678, 3124567689, 'juan123@gmail.com', 'M', 's', 'SANITAS', 'COLMENA', 'views/assets/img/usuarios/234567890/864.png', 'A', 4, 3, 'NO');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `estudios`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `estudios` (
`ID` int(11)
,`Name` varchar(50)
,`Time` varchar(30)
,`Certification` varchar(255)
,`Institution` varchar(50)
,`ID_Candidate` int(11)
,`ID_Level` int(11)
,`Type` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `idiomas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `idiomas` (
`ID` int(11)
,`Certification` varchar(255)
,`Institution` varchar(20)
,`ID_Type` int(11)
,`ID_Candidate` int(11)
,`Name` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interview`
--

CREATE TABLE `interview` (
  `id` int(11) NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hour_start` time DEFAULT NULL,
  `hour_end` time DEFAULT NULL,
  `comments` varchar(50) DEFAULT NULL,
  `Id_Asp` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `interview`
--

INSERT INTO `interview` (`id`, `date_start`, `date_end`, `date`, `hour_start`, `hour_end`, `comments`, `Id_Asp`, `status`) VALUES
(1, '2020-10-13 10:18:00', '2020-10-13 14:22:00', '2020-10-13', '10:18:00', '14:22:00', 'Algo De Luis ', 45698745, 1),
(2, '2020-10-09 14:05:00', '2020-10-09 23:07:00', '2020-10-09', '14:05:00', '23:07:00', 'traer hoja de vida', 52867815, 1),
(3, '2020-10-12 19:31:00', '2020-10-12 21:31:00', '2020-10-12', '19:31:00', '21:31:00', 'entrevista', 1000823222, 1),
(18, '2020-10-28 10:00:00', '2020-10-28 11:00:00', '2020-10-28', '10:00:00', '11:00:00', 'Llegar Puntual', 0, 0),
(19, '2020-10-28 11:00:00', '2020-10-28 12:00:00', '2020-10-28', '11:00:00', '12:00:00', 'Venir Bien Presentable', 0, 0),
(20, '2020-10-28 12:00:00', '2020-10-28 13:00:00', '2020-10-28', '12:00:00', '13:00:00', 'Traer Hoja de Vida', 0, 0),
(21, '2020-10-28 14:00:00', '2020-10-28 15:00:00', '2020-10-28', '14:00:00', '15:00:00', 'Llegar 5 Min. Antes', 0, 0),
(22, '2020-10-29 10:00:00', '2020-10-29 11:00:00', '2020-10-29', '10:00:00', '11:00:00', 'LLegar a la hora indicada', 0, 0),
(23, '2020-10-29 12:00:00', '2020-10-29 13:00:00', '2020-10-29', '12:00:00', '13:00:00', 'Venir en Traje Formal', 0, 0),
(24, '2020-11-05 10:00:00', '2020-11-05 11:00:00', '2020-11-05', '10:00:00', '11:00:00', 'Venir con Hoja de Vida', 0, 0),
(25, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', '11:12:00', '11:30:00', 'Prueba Disparador', 0, 0),
(26, '2020-11-05 15:00:00', '2020-11-05 16:00:00', '2020-11-05', '15:00:00', '16:00:00', 'LLegar 10 min. antes', 0, 0),
(27, '2020-11-05 17:00:00', '2020-11-05 18:00:00', '2020-11-05', '17:00:00', '18:00:00', 'Traer Hoja de Vida en Pdf', 0, 0),
(28, '2020-11-07 11:00:00', '2020-11-07 12:00:00', '2020-11-07', '11:00:00', '12:00:00', 'Venir Presentable', 0, 0),
(29, '2020-11-07 14:00:00', '2020-11-05 15:00:00', '2020-11-05', '14:00:00', '15:00:00', 'Llegar 5 min. antes', 0, 0),
(30, '2020-11-07 16:00:00', '2020-11-05 17:00:00', '2020-11-05', '16:00:00', '17:00:00', 'Traer Dos Fotos 4x4', 0, 0),
(31, '2020-11-09 10:00:00', '2020-11-09 11:00:00', '2020-11-09', '10:00:00', '11:00:00', 'Traer hoja de Vida en Fisico', 0, 0),
(32, '2020-11-09 12:00:00', '2020-11-09 13:00:00', '2020-11-09', '12:00:00', '13:00:00', 'Llegar 5 min. antes', 0, 0),
(33, '2020-11-09 15:00:00', '2020-11-09 16:00:00', '2020-11-09', '15:00:00', '16:00:00', 'Venir en Traje Formal', 0, 0),
(34, '2020-11-09 16:00:00', '2020-11-09 17:00:00', '2020-11-09', '16:00:00', '17:00:00', 'Traer una Foto en Fondo Blanco', 0, 0),
(35, '2020-11-11 10:00:00', '2020-11-11 11:00:00', '2020-11-11', '10:00:00', '11:00:00', 'Llegar 10 min. antes', 0, 0),
(36, '2020-11-11 12:00:00', '2020-11-11 13:00:00', '2020-11-11', '12:00:00', '13:00:00', 'Venir Presentable', 0, 0),
(37, '2020-11-11 15:00:00', '2020-11-11 16:00:00', '2020-11-11', '15:00:00', '16:00:00', 'Traer Hoja de Vida en Digital', 0, 0),
(58, '2020-10-08 21:25:00', '2020-10-08 21:24:00', '2020-10-08', '21:25:00', '21:24:00', ' Prueba Disparador', 0, 0),
(95, '2020-11-05 12:00:00', '2020-11-05 13:00:00', '2020-11-05', '12:00:00', '13:00:00', 'Traer Dos Fotos 4x4', 0, 0);

--
-- Disparadores `interview`
--
DELIMITER $$
CREATE TRIGGER `CambioEstado` AFTER UPDATE ON `interview` FOR EACH ROW BEGIN 
    	UPDATE Candidate SET STATUS = 'A' WHERE NumDocument = NEW.Id_Asp;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `language`
--

CREATE TABLE `language` (
  `ID` int(11) NOT NULL,
  `Certification` varchar(255) NOT NULL,
  `Institution` varchar(20) NOT NULL,
  `ID_Type` int(11) NOT NULL,
  `ID_Candidate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `language`
--

INSERT INTO `language` (`ID`, `Certification`, `Institution`, `ID_Type`, `ID_Candidate`) VALUES
(1, 'URL CERTIFICACION', 'WordBee', 1, 52867815),
(2, 'URL CERTIFICACION', 'WordEsprese', 5, 1062937631),
(3, 'URL CERTIFICACION', 'WordSocial', 4, 52867815),
(4, '', 'WordBee', 1, 1000823222),
(5, '', 'Escuela de Aleman', 2, 1000823222),
(6, '', 'Escuela De Chino', 5, 1000823222),
(20, '', 'WordBee', 1, 569874412),
(21, '', 'Escuela de Aleman', 3, 569874412),
(22, '', 'Escuela De Chino', 4, 569874412),
(27, '', 'WordBee', 1, 45698745),
(28, '', 'Escuela de Aleman', 2, 45698745),
(29, '', 'Escuela De Chino', 4, 45698745),
(42, '', 'WordBee', 1, 45698765),
(43, '', 'Escuela de Aleman', 3, 45698765),
(44, '', 'Escuela De Chino', 4, 45698765),
(45, '', 'WordBee', 4, 2147483647),
(46, '', 'Escuela de Aleman', 2, 2147483647),
(47, '', 'Escuela De Chino', 4, 2147483647),
(48, '', 'WordBee', 2, 1000381632),
(49, '', 'Escuela de Aleman', 2, 1000381632),
(50, '', 'Escuela De Chino', 1, 1000381632),
(54, '', 'WordBee', 2, 789655412),
(55, '', 'Escuela de Aleman', 2, 789655412),
(56, '', 'Escuela De Chino', 3, 789655412),
(63, '', 'WordBee', 1, 33659987),
(64, '', 'Escuela de Aleman', 2, 33659987),
(65, '', 'Escuela De Chino', 1, 33659987);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `level`
--

CREATE TABLE `level` (
  `ID` int(11) NOT NULL,
  `Type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `level`
--

INSERT INTO `level` (`ID`, `Type`) VALUES
(1, 'Primaria'),
(2, 'Secundaria'),
(3, 'Tecnico'),
(4, 'Tecnologo'),
(5, 'Profesional'),
(6, 'Especializacion'),
(7, 'Maestria'),
(8, 'Doctorado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `APELLIDO` varchar(30) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `NOTA` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`ID`, `NOMBRE`, `APELLIDO`, `FECHA`, `NOTA`) VALUES
(19, 'ANDREY STEVEN', 'PARRA ARIZA', '2020-09-11', 'aseo general'),
(20, 'ANDREY STEVEN', 'PARRA ARIZA', '2020-09-16', 'renovar contratos'),
(22, 'ANDREY STEVEN', 'PARRA ARIZA', '2020-09-27', 'MODIFICAR HORARIOS'),
(23, 'ANDREY STEVEN', 'PARRA ARIZA', '2020-10-05', 'nuevos contratos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `occupation`
--

CREATE TABLE `occupation` (
  `ID` int(11) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `occupation`
--

INSERT INTO `occupation` (`ID`, `Type`) VALUES
(1, 'Administrador'),
(2, 'Auxiliar'),
(3, 'Cajero'),
(4, 'Bodeguista'),
(5, 'Domiciliario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_references`
--

CREATE TABLE `personal_references` (
  `ID` int(11) NOT NULL,
  `NumDocument` bigint(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Occupation` varchar(20) NOT NULL,
  `Association` varchar(20) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Id_Candidate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal_references`
--

INSERT INTO `personal_references` (`ID`, `NumDocument`, `Name`, `Occupation`, `Association`, `Phone`, `Id_Candidate`) VALUES
(1, 1000381632, 'Carlos Perez', 'Ingeniero Civil', 'Conocido', 3156228978, 52867815),
(2, 1827391742, 'Jazmin Montaña', 'Ingienera Industrial', 'Madre', 3034916374, 1062937631),
(3, 177725482, 'Juan Neira', 'Ingeniero Civil', 'Conocido', 3092745174, 2147483647),
(4, 119356625, 'ARLEX ARIZA', 'INGENIERO', 'Otro', 1349654654, 49855525),
(5, 1000981354, 'VALENTINA ARIZA ', 'INDEPENDIENTE', 'Jefe Anterior', 52123456689, 49855525),
(6, 2589631478, 'ELENA AGUDELO', 'ESTUDIANTE', 'Amigo', -1123456789, 49855525),
(25, 7789654213, 'ANDERSON PERES', 'INGENIERO', 'Amigo', 55698874, 569874412),
(26, 55698777412, 'Tomas Rendon', 'ASEADOR', 'Jefe Anterior', 88965569, 569874412),
(27, 9987445632, 'TOMAS PEREZ', 'INDEPENDIENTE', 'Amigo', 9987789, 569874412),
(34, 78998789, 'ANDERSON PERES', 'INGENIERO', 'Jefe Anterior', 16, 45698745),
(35, 7578978, 'ANDRES GARCIA', 'ESTUDIANTE', 'Amigo', 78879214, 45698745),
(36, 321456987, 'TOMAS PEREZ', 'INDEPENDIENTE', 'Jefe Anterior', 78787877877, 45698745),
(40, 55, 'ARLEX ARIZA', 'INGENIERO', 'Familiar', 225, 898989),
(49, 998744566, 'ARLEX ARIZA', 'INGENIERO', 'Jefe Anterior', 978898778, 45698765),
(50, 23336599874, 'JAMES RODIGUEZ', 'ESTUDIANTE', 'Otro', 66598552, 45698765),
(51, 1233666598, 'TOMAS PEREZ', 'ESTUDIANTE', 'Familiar', 998777455, 45698765),
(52, 889655574, 'ARLEX ARIZA', 'INGENIERO', 'Jefe Anterior', 88977745, 36521478),
(53, 99877455, 'VALENTINA ARIZA ', 'INDEPENDIENTE', 'Amigo', 321456987, 36521478),
(54, 998745221, 'TOMAS PEREZ', 'ESTUDIANTE', 'Jefe Anterior', 9874445521, 36521478),
(55, 8897455, 'ANDERSON PERES', 'INGENIERO', 'Familiar', 212225478, 2147483647),
(56, 998744555, 'VALENTINA ARIZA ', 'INDEPENDIENTE', 'Amigo', 66698444, 2147483647),
(57, 3321456698, 'ELENA AGUDELO', 'ESTUDIANTE', 'Cónyuge', 98744125555, 2147483647),
(58, 7889988, 'ARLEX ARIZA', 'INGENIERO', 'Jefe Anterior', 98778996, 1000381632),
(59, 100000000, 'ELENA AGUDELO', 'ELENA AGUDELO', 'Jefe Anterior', 63211145, 1000381632),
(60, 10000000, 'TOMAS PEREZ', 'ESTUDIANTE', 'Amigo', 23001445, 1000381632),
(61, 0, '', '', '', 0, 0),
(62, 0, '', '', '', 0, 0),
(63, 0, '', '', '', 0, 0),
(64, 987778556, 'ARLEX ARIZA', 'INGENIERO', 'Amigo', 98874452, 789655412),
(65, 998744451111, 'VALENTINA ARIZA ', 'ESTUDIANTE', 'Amigo', 66325558, 789655412),
(66, 1111111111, 'TOMAS PEREZ', 'ESTUDIANTE', 'Amigo', 114255987, 789655412),
(67, 0, '', '', '', 0, 0),
(68, 0, '', '', '', 0, 0),
(69, 0, '', '', '', 0, 0),
(70, 0, '', '', '', 0, 0),
(71, 0, '', '', '', 0, 0),
(72, 0, '', '', '', 0, 0),
(73, 9855656, 'ANDERSON PERES', 'INGENIERO', 'Jefe Anterior', 987444512, 33659987),
(74, 42223659, 'ELENA AGUDELO', 'INDEPENDIENTE', 'Amigo', 699855, 33659987),
(75, 855222, 'TOMAS PEREZ', 'ESTUDIANTE', 'Amigo', 9855563, 33659987);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `review`
--

CREATE TABLE `review` (
  `ID` int(11) NOT NULL,
  `Id_Candidate` int(11) DEFAULT NULL,
  `Result` varchar(4) DEFAULT NULL,
  `Comments` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `review`
--

INSERT INTO `review` (`ID`, `Id_Candidate`, `Result`, `Comments`) VALUES
(1, 1000823222, '4', 'Algo'),
(2, 36521478, '2.5', 'ALguna Mierda'),
(3, 52867815, '4.5', 'Algo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typelanguage`
--

CREATE TABLE `typelanguage` (
  `ID` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `typelanguage`
--

INSERT INTO `typelanguage` (`ID`, `Name`) VALUES
(1, 'Ingles'),
(2, 'Alemán'),
(3, 'Francés'),
(4, 'Portugués'),
(5, 'Chino mandarín');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `ID_Employee` int(11) NOT NULL,
  `ultimoLogin` datetime DEFAULT NULL,
  `totalLogin` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `Password`, `ID_Employee`, `ultimoLogin`, `totalLogin`) VALUES
(2, '$2a$07$asxx54ahjppf45sd87a5aup99rIx2W39BEYsU2PasHcJX0W6UrZ9m', 2, '2020-08-11 23:35:42', 10),
(3, '$2a$07$asxx54ahjppf45sd87a5aup99rIx2W39BEYsU2PasHcJX0W6UrZ9m', 3, '2020-10-20 11:41:04', 30),
(4, '$2a$07$asxx54ahjppf45sd87a5aup99rIx2W39BEYsU2PasHcJX0W6UrZ9m', 4, '2020-10-06 01:51:04', 21),
(7, '$2a$07$asxx54ahjppf45sd87a5auzQPmdZpm4TK/jzLGTzhC2fflYNDtMPy', 1, '2020-10-26 11:27:49', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacant`
--

CREATE TABLE `vacant` (
  `ID` int(11) NOT NULL,
  `Wage` bigint(20) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `ID_Employee` int(11) DEFAULT NULL,
  `NameVacant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vacant`
--

INSERT INTO `vacant` (`ID`, `Wage`, `Description`, `ID_Employee`, `NameVacant`) VALUES
(1, 50000, 'Entregar Facturas', 2, 3),
(2, 1100000, 'Descargar pedidos y almacenarlos en bodega.', 1, 4),
(3, 1100000, 'Entregar las compras facturadas a los clientes en sus casas.', 1, 5),
(4, 950000, 'Ayuda Al Administrador', 1, 2);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vwemployee`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vwemployee` (
`ID` int(11)
,`Name` varchar(30)
,`LastName` varchar(30)
,`TypeDocument` char(2)
,`NumDocument` bigint(20)
,`Address` varchar(50)
,`Birthdate` date
,`Admissiondate` timestamp
,`Phone` bigint(20)
,`Cellphone` bigint(20)
,`Mail` varchar(100)
,`Gender` char(1)
,`Maritalstatus` char(1)
,`Eps` varchar(30)
,`Arl` varchar(30)
,`Photo` varchar(255)
,`Status` char(1)
,`ID_Occupation` int(11)
,`ID_Employee` int(11)
,`PERFIL` char(2)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `work_experience`
--

CREATE TABLE `work_experience` (
  `ID` int(11) NOT NULL,
  `Company` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Boss` varchar(50) NOT NULL,
  `Document` int(11) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Time` varchar(20) NOT NULL,
  `ID_Candidate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `work_experience`
--

INSERT INTO `work_experience` (`ID`, `Company`, `Role`, `Boss`, `Document`, `Phone`, `Time`, `ID_Candidate`) VALUES
(1, 'Desempleados S.A', 'Coordinador', 'Carlos Calero', 566982256, 3269857841, '24 AÑOS ', 52867815),
(2, 'Empleados', 'Coordinador', 'Felipe Romero', 78896542, 6226401733, '24 AÑOS ', 1062937631),
(3, 'Desempleados S.A', 'Empleado', 'Sebastian Garavito', 895323, 7828362963, '13AÑOS ', 1062937631),
(4, 'TELMEX', 'CEO', 'JUAN ANDRES', 659845245, 98744563210, '24 AÑOS ', 52867815),
(5, 'TELMEX', 'ADMIN', 'TOMAS ANTONIO ', 5465465, 989565656, '24 AÑOS ', 52867815),
(6, 'TELMEZ 2.0 ', 'ASEADOR', 'NICOLL', 56465465, 54646465, '24 AÑOS ', 52867815),
(16, 'TELMEX', 'ADMINISTRADOR', 'CAMILA CACERES', 54545785, 99874456, '24 AÑOS ', 569874412),
(17, 'TELMEX', 'ADMIN', 'ANDRES ARIAS', 5465465, 989565656, '24 AÑOS ', 569874412),
(18, 'TELMEZ 2.0 ', 'ASEADOR', 'TOMAS RENDON', 56465895, 54646465, '24 AÑOS ', 569874412),
(40, 'TELMEX', 'CEO', 'JOSE DIAS ', 54545785, 98744563210, '24 AÑOS ', 45698745),
(41, 'AGROHUMANA', 'ADMIN', 'MAXIMILIANO', 5465465, 989565656, '24 AÑOS ', 45698745),
(42, 'TELMEZ 2.0 ', 'ASEADOR', 'GABRIEL MORENO', 56465465, 54646465, '24 AÑOS ', 45698745),
(43, 'TELMEX', 'CEO', 'NICOLAS TORRES', 985647855, 98744563210, '24 AÑOS ', 896654785),
(44, 'AGROHUMANA', 'ADMIN', 'FERNANDO VILLEGAS', 5465465, 989565656, '24 AÑOS ', 896654785),
(45, 'TELMEZ 2.0 ', 'ASEADOR', 'ANDRES TORRES', 56465465, 54646465, '24 AÑOS ', 896654785),
(46, 'TELMEX', 'CEO', 'JUAN GILLREMO', 54545785, 98744563210, '24 AÑOS ', 36521478),
(47, 'AGROHUMANA', 'ADMIN', 'ANDRES GARCIA', 5465465, 989565656, '24 AÑOS ', 36521478),
(48, 'TELMEZ 2.0 ', 'ASEADOR', 'FALCAO GARCIA', 56465895, 54646465, '24 AÑOS ', 36521478),
(49, 'TELMEX', 'ADMINISTRADOR', 'GABRIEL GARCIA ', 985647855, 98744563210, '24 AÑOS ', 2147483647),
(50, 'AGROHUMANA', 'ADMIN', 'DAVID GOMEZ', 5465465, 989565656, '24 AÑOS ', 2147483647),
(51, 'TELMEZ 2.0 ', 'ASEADOR', 'CARLOS GARCIA', 56465465, 54646465, '24 AÑOS ', 2147483647),
(52, 'TELMEX', 'CEO', 'CARLOS GLAN', 54545785, 99874456, '24 AÑOS ', 1000381632),
(53, 'AGROHUMANA', 'ADMIN', 'ANDRES MORENO', 5465465, 989565656, '24 AÑOS ', 1000381632),
(54, 'TELMEZ 2.0 ', 'FRANCISCO ', 'BOTERO ', 56465465, 54646465, '24 AÑOS ', 1000381632),
(56, '', '', '', 0, 0, '24 AÑOS ', 0),
(57, '', '', '', 0, 0, '24 AÑOS ', 0),
(58, 'TELMEX', 'CEO', 'ALGUIEN', 54545785, 99874456, '24 AÑOS ', 789655412),
(59, 'AGROHUMANA', 'ADMIN', 'ALGUIEN2', 5465465, 989565656, '24 AÑOS ', 789655412),
(60, 'TELMEZ 2.0 ', 'ASEADOR', 'ALGUIEN3', 56465465, 54646465, '24 AÑOS ', 789655412),
(61, '', '', '', 0, 0, '24 AÑOS ', 0),
(62, '', '', '', 0, 0, '24 AÑOS ', 0),
(63, '', '', '', 0, 0, '24 AÑOS ', 0),
(64, '', '', '', 0, 0, '24 AÑOS ', 0),
(65, '', '', '', 0, 0, '24 AÑOS ', 0),
(66, '', '', '', 0, 0, '24 AÑOS ', 0),
(67, 'TELMEX', 'CEO', 'ALGUIEN', 54545785, 98744563210, '24 AÑOS ', 33659987),
(68, 'AGROHUMANA', 'ADMIN', 'ALGUIEN2', 5465465, 989565656, '24 AÑOS ', 33659987),
(69, 'TELMEZ 2.0 ', 'ASEADOR', 'ALGUIEN3', 56465465, 54646465, '24 AÑOS ', 33659987);

-- --------------------------------------------------------

--
-- Estructura para la vista `estudios`
--
DROP TABLE IF EXISTS `estudios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estudios`  AS  select `a`.`ID` AS `ID`,`a`.`Name` AS `Name`,`a`.`Time` AS `Time`,`a`.`Certification` AS `Certification`,`a`.`Institution` AS `Institution`,`a`.`ID_Candidate` AS `ID_Candidate`,`a`.`ID_Level` AS `ID_Level`,`l`.`Type` AS `Type` from (`academic_training` `a` join `level` `l` on(`l`.`ID` = `a`.`ID_Level`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `idiomas`
--
DROP TABLE IF EXISTS `idiomas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `idiomas`  AS  select `l`.`ID` AS `ID`,`l`.`Certification` AS `Certification`,`l`.`Institution` AS `Institution`,`l`.`ID_Type` AS `ID_Type`,`l`.`ID_Candidate` AS `ID_Candidate`,`t`.`Name` AS `Name` from (`language` `l` join `typelanguage` `t` on(`t`.`ID` = `l`.`ID_Type`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vwemployee`
--
DROP TABLE IF EXISTS `vwemployee`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwemployee`  AS  select `employee`.`ID` AS `ID`,`employee`.`Name` AS `Name`,`employee`.`LastName` AS `LastName`,`employee`.`TypeDocument` AS `TypeDocument`,`employee`.`NumDocument` AS `NumDocument`,`employee`.`Address` AS `Address`,`employee`.`Birthdate` AS `Birthdate`,`employee`.`Admissiondate` AS `Admissiondate`,`employee`.`Phone` AS `Phone`,`employee`.`Cellphone` AS `Cellphone`,`employee`.`Mail` AS `Mail`,`employee`.`Gender` AS `Gender`,`employee`.`Maritalstatus` AS `Maritalstatus`,`employee`.`Eps` AS `Eps`,`employee`.`Arl` AS `Arl`,`employee`.`Photo` AS `Photo`,`employee`.`Status` AS `Status`,`employee`.`ID_Occupation` AS `ID_Occupation`,`employee`.`ID_Employee` AS `ID_Employee`,`employee`.`PERFIL` AS `PERFIL` from `employee` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academic_training`
--
ALTER TABLE `academic_training`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Candidate` (`ID_Candidate`),
  ADD KEY `ID_Level` (`ID_Level`);

--
-- Indices de la tabla `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Employee` (`ID_Employee`);

--
-- Indices de la tabla `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`NumDocument`),
  ADD KEY `Id_Vacant` (`Id_Vacant`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `details_announcement`
--
ALTER TABLE `details_announcement`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Announcement` (`ID_Announcement`),
  ADD KEY `ID_Vacant` (`ID_Vacant`);

--
-- Indices de la tabla `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Employee` (`ID_Employee`),
  ADD KEY `ID_Occupation` (`ID_Occupation`);

--
-- Indices de la tabla `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_Asp` (`Id_Asp`);

--
-- Indices de la tabla `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Candidate` (`ID_Candidate`),
  ADD KEY `ID_Type` (`ID_Type`);

--
-- Indices de la tabla `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `personal_references`
--
ALTER TABLE `personal_references`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Id_Candidate` (`Id_Candidate`);

--
-- Indices de la tabla `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ResultCandidate` (`Id_Candidate`);

--
-- Indices de la tabla `typelanguage`
--
ALTER TABLE `typelanguage`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Employee` (`ID_Employee`);

--
-- Indices de la tabla `vacant`
--
ALTER TABLE `vacant`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Employee` (`ID_Employee`),
  ADD KEY `NameVacant` (`NameVacant`);

--
-- Indices de la tabla `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Candidate` (`ID_Candidate`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `academic_training`
--
ALTER TABLE `academic_training`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `announcement`
--
ALTER TABLE `announcement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de la tabla `details_announcement`
--
ALTER TABLE `details_announcement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `interview`
--
ALTER TABLE `interview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `language`
--
ALTER TABLE `language`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `level`
--
ALTER TABLE `level`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `occupation`
--
ALTER TABLE `occupation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personal_references`
--
ALTER TABLE `personal_references`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `typelanguage`
--
ALTER TABLE `typelanguage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `vacant`
--
ALTER TABLE `vacant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `academic_training`
--
ALTER TABLE `academic_training`
  ADD CONSTRAINT `academic_training_ibfk_1` FOREIGN KEY (`ID_Candidate`) REFERENCES `candidate` (`NumDocument`),
  ADD CONSTRAINT `academic_training_ibfk_2` FOREIGN KEY (`ID_Level`) REFERENCES `level` (`ID`);

--
-- Filtros para la tabla `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`ID_Employee`) REFERENCES `employee` (`ID`);

--
-- Filtros para la tabla `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`Id_Vacant`) REFERENCES `vacant` (`ID`);

--
-- Filtros para la tabla `details_announcement`
--
ALTER TABLE `details_announcement`
  ADD CONSTRAINT `details_announcement_ibfk_1` FOREIGN KEY (`ID_Announcement`) REFERENCES `announcement` (`ID`),
  ADD CONSTRAINT `details_announcement_ibfk_2` FOREIGN KEY (`ID_Vacant`) REFERENCES `vacant` (`ID`);

--
-- Filtros para la tabla `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`ID_Employee`) REFERENCES `employee` (`ID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`ID_Occupation`) REFERENCES `occupation` (`ID`);

--
-- Filtros para la tabla `interview`
--
ALTER TABLE `interview`
  ADD CONSTRAINT `interview_ibfk_1` FOREIGN KEY (`Id_Asp`) REFERENCES `candidate` (`NumDocument`);

--
-- Filtros para la tabla `language`
--
ALTER TABLE `language`
  ADD CONSTRAINT `language_ibfk_1` FOREIGN KEY (`ID_Candidate`) REFERENCES `candidate` (`NumDocument`),
  ADD CONSTRAINT `language_ibfk_2` FOREIGN KEY (`ID_Type`) REFERENCES `typelanguage` (`ID`);

--
-- Filtros para la tabla `personal_references`
--
ALTER TABLE `personal_references`
  ADD CONSTRAINT `personal_references_ibfk_1` FOREIGN KEY (`Id_Candidate`) REFERENCES `candidate` (`NumDocument`);

--
-- Filtros para la tabla `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `ResultCandidate` FOREIGN KEY (`Id_Candidate`) REFERENCES `candidate` (`NumDocument`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ID_Employee`) REFERENCES `employee` (`ID`);

--
-- Filtros para la tabla `vacant`
--
ALTER TABLE `vacant`
  ADD CONSTRAINT `vacant_ibfk_1` FOREIGN KEY (`ID_Employee`) REFERENCES `employee` (`ID`),
  ADD CONSTRAINT `vacant_ibfk_2` FOREIGN KEY (`NameVacant`) REFERENCES `occupation` (`ID`);

--
-- Filtros para la tabla `work_experience`
--
ALTER TABLE `work_experience`
  ADD CONSTRAINT `work_experience_ibfk_1` FOREIGN KEY (`ID_Candidate`) REFERENCES `candidate` (`NumDocument`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
