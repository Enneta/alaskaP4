CREATE DATABASE alaskaforteroche CHARACTER SET utf8 COLLATE utf8_general_ci;
use alaskaforteroche;
CREATE TABLE b_post (
    id int AUTO_INCREMENT,
    title varchar(255),
    chapitre int,
    content text,
    parution Date,
    image text,
    PRIMARY KEY (ID)
);
CREATE TABLE b_comment (
    id int AUTO_INCREMENT,
    content text,
    parution Date,
    idbillet int,
    signaler int,
    statut boolean,
    PRIMARY KEY (id),
    FOREIGN KEY (idbillet) REFERENCES b_post(id)
);
CREATE TABLE b_user (
    id int AUTO_INCREMENT,
    pseudo varchar(50),
    pass varchar(250),
    PRIMARY KEY (id)
);
INSERT INTO `b_user`(`pseudo`, `pass`) VALUES ('admin','$2y$10$rSbWgOl7mDvxm1DKHVFH5.K27eeR9Y.ceRKs6tfVc98eAjad/0dXe');