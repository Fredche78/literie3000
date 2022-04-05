CREATE database literie3000 CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

use literie3000;

CREATE TABLE matelas (
id INT PRIMARY KEY AUTO_INCREMENT,
marque VARCHAR(25),
modele VARCHAR(25) NOT NULL,
dimension VARCHAR(15) NOT NULL,
prix SMALLINT,
prix_promo SMALLINT
);

INSERT INTO matelas
(marque, modele, dimension, prix, prix_promo)
VALUES
("Epeda", "Delhi", "190x90", 759, 529),
("Dreamway", "Orlando", "190x90", 809, 709),
("Bultex", "Nice", "190x140", 759, 529),
("Epeda", "Seville", "200x160", 1019, 509),
("Dorsoline", "Intensity", "200x200", 1599, 1290);
