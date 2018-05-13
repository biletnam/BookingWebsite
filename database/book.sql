CREATE DATABASE book;
USE book1;
CREATE TABLE `register` (
  `userid` varchar(50) PRIMARY KEY ,
  `name` varchar(50) NOT NULL ,
  `email` varchar(50) NOT NULL ,
  `password` varchar(50) NOT NULL ,
  `address` varchar(500) NOT NULL ,
  `contact` varchar(50) NOT NULL  ,
  `message` varchar(500) NOT NULL
) ;
CREATE TABLE `seat` (
  `userid` varchar(50) NOT NULL ,
  `number` int(10) NOT NULL,
  `PNR` varchar(13) NOT NULL ,
  `date` date NOT NULL
) ;
