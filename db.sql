create database formValidation;
use formValidation;

create table `user`(
    `id` int(11) NOT NULL auto_increment,
    `email` varchar(150) NOT NULL,
    `password` varchar(150) NOT NULL
)