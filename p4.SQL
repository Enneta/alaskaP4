CREATE DATABASE alaskaforteroche CHARACTER SET utf8 COLLATE utf8_general_ci;
use alaskaforteroche;
CREATE TABLE b_post (
    id int AUTO_INCREMENT,
    title varchar(255),
    content text,
    date Datetime,
    image text,
    PRIMARY KEY (ID)
);
CREATE TABLE b_comment (
    id int AUTO_INCREMENT,
    content text,
    date Datetime,
    idbillet int,
    signaler int,
    statut boolean,
    PRIMARY KEY (id),
    FOREIGN KEY (idbillet) REFERENCES b_post(id)
);
CREATE TABLE b_user (
    id int AUTO_INCREMENT,
    pseudo varchar(50),
    pass varchar(50),
    PRIMARY KEY (id)
);
INSERT INTO `b_user`(`pseudo`, `pass`) VALUES ('admin','admin');