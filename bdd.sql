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
("Epeda", "Delhi", "190x90", 759, 529, "https://cdn.laredoute.com/products/6/f/7/6f7b8446a8e4fc2e16f915c28e244fe4.jpg?imgopt=twic&twic=v1"),
("Dreamway", "Orlando", "190x90", 809, 709, "https://cdn.laredoute.com/products/2/e/0/2e0f0ecf1baf1ff3c96c4ebf79f81359.jpg?imgopt=twic&twic=v1"),
("Bultex", "Nice", "190x140", 759, 529, "https://cdn.laredoute.com/products/9/4/e/94ec075ea99aeb5cc4501b194b8c36d4.jpg?imgopt=twic&twic=v1"),
("Epeda", "Seville", "200x160", 1019, 509, "https://cdn.laredoute.com/products/1/9/d/19df72b14d4e642949778ef79d2493b3.jpg?imgopt=twic&twic=v1/cover=700x700"),
("Dorsoline", "Intensity", "200x200", 1599, 1290, "https://cdn.laredoute.com/products/b/9/5/b95c5896d19c3edee6c311ef4fa8c7d1.jpg?imgopt=twic&twic=v1");
