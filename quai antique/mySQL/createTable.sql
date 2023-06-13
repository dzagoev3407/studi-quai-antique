/* Création d'une table pour l'admin */

CREATE TABLE admin
(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255),
    mdp VARCHAR(255)
)

/* Création d'une table contact pour le formulaire sur la page d'accueil */

CREATE TABLE contact
(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(150),
    email VARCHAR(255),
    message TEXT(255)
)

/* Création d'une table pour les images */

CREATE TABLE img
(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nomImage VARCHAR(150),
    url VARCHAR(255)
)

/* Création d'un administrateur dans la table ADMIN */

INSERT INTO `admin` (`id`, `email`, `mdp`) VALUES (NULL, 'kevin.bonnefoy8407@outlook.fr', 'Admin07@');

/* Création d'une table pour ajouter un menu */

CREATE TABLE menus
(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(150),
    formule TEXT(50),
    desc TEXT(255)
)