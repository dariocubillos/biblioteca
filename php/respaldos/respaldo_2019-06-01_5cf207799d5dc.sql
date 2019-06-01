SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- Database: `bvm`
--




CREATE TABLE `books` (
  `ISBN` varchar(15) NOT NULL,
  `Title` varchar(125) DEFAULT NULL,
  `Authors` varchar(100) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Slot` int(11) DEFAULT NULL,
  `Thumbnail` varchar(100) DEFAULT NULL,
  `Description` text,
  `Pages` int(11) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `PubDate` date DEFAULT NULL,
  PRIMARY KEY (`ISBN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO books VALUES
("9781590595053","Pro MySQL","Michael Kruckenberg, Jay Pipes and Brian Aker","5","1","bcs01.gif","","798","49.99","2005-07-15"),
("22223334444444","LIBRO PRUEBA","JUAN X","3","0","","","100","24.5","2000-06-06"),
("9781590593929","Beginning PHP 5 and MySQL E-Commerce","Cristian Darie and Mihai Bucica","5","4","bcs04.gif","","707","46.99","2008-02-21"),
("9781590595091","PHP 5 Recipes","Frank M. Kromann, Jon Stephens, Nathan A. Good and Lee Babin","7","5","bcs05.gif","","672","44.99","2005-10-04"),
("9781430227939","Beginning Perlx","James Tower","5","7","bcs06.gif","","464","39.99","2010-05-14"),
("9781590595350","The Definitive Guide to MySQL 5","Michael Kofler","2","7","bcs07.gif","","784","49.99","2005-10-04"),
("9781590595626","Building Online Communities with Drupal, phpBB, and WordPress","Robert T. Douglass, Mike Little and Jared W. Smith","1","8","bcs08.gif","","560","49.99","2005-12-16"),
("9781590595084","Pro PHP Security","Chris Snyder and Michael Southwell","7","9","bcs09.gif","","528","44.99","2005-09-08"),
("9781590595312","Beginning Perl Web Development","Steve Suehring","8","10","bcs10.gif","","376","39.99","2005-11-07");




CREATE TABLE `borrowedbooks` (
  `IDprestamo` int(15) NOT NULL AUTO_INCREMENT,
  `fkbook` varchar(15) NOT NULL,
  `fkuser` varchar(20) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `datedelivery` datetime DEFAULT NULL,
  `estate` enum('RESERVADO','PRESTADO','RETRASADO','PERDIDO') DEFAULT NULL,
  PRIMARY KEY (`IDprestamo`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;


INSERT INTO borrowedbooks VALUES
("13","9781590595091","1234567890","2019-05-01 19:39:39","0000-00-00 00:00:00","RETRASADO"),
("10","9781430227939","1234567890","2019-04-22 00:37:39","0000-00-00 00:00:00","RETRASADO");




CREATE TABLE `settings` (
  `FieldName` char(30) NOT NULL,
  `Value` char(250) DEFAULT NULL,
  PRIMARY KEY (`FieldName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO settings VALUES
("ImagePath","imageneslibros/");




CREATE TABLE `users` (
  `ID` varchar(20) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Tel` int(15) DEFAULT NULL,
  `Addres` varchar(100) DEFAULT NULL,
  `Pass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO users VALUES
("ADMIN","ADMIN","ADMIN","","0","","ADMIN"),
("1234567890","Juan","Perez","juanperez@gmail.com","123456789","calle","LINUX");




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;