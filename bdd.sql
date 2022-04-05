CREATE database literie3000 CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

use literie3000;

CREATE TABLE matelas (
id INT PRIMARY KEY AUTO_INCREMENT,
marque VARCHAR(25),
modele VARCHAR(25) NOT NULL,
dimension VARCHAR(15) NOT NULL,
prix SMALLINT,
prix_promo SMALLINT,
photo VARCHAR(256)
);

INSERT INTO matelas
(marque, modele, dimension, prix, prix_promo, photo)
VALUES
("Epeda", "Delhi", "190x90", 759, 529, "epeda-delhi-190x90.jpg"),
("Dreamway", "Orlando", "190x90", 809, 709, "dreamway-orlando-190x90.jpg"),
("Bultex", "Nice", "190x140", 759, 529, "bultex-nice-190x140.jpg"),
("Epeda", "Seville", "200x160", 1019, 509, "epeda-seville-200x160.jpg"),
("Dorsoline", "Intensity", "200x200", 1599, 1290, "dorsoline-intensity-200x200.jpg");
