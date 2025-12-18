create database zoo_assad;
use zoo_assad;

CREATE TABLE utilisateurs (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    role ENUM('Visiteur', 'Guide', 'Admin'),
    is_active BOOLEAN DEFAULT false,
    mdp_hash VARCHAR(255) NOT NULL
);

CREATE TABLE habitats (
    id_habitat INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    type_climat VARCHAR(100),
    description TEXT,
    zone_zoo VARCHAR(100)
);

CREATE TABLE animaux (
    id_animal INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    espece VARCHAR(100),
    alimentation VARCHAR(100),
    image VARCHAR(255),
    pays_origine VARCHAR(100),
    description_courte TEXT,
    id_habitat INT,
    CONSTRAINT fk_animaux_habitat
        FOREIGN KEY (id_habitat)
        REFERENCES habitats(id_habitat)
);

CREATE TABLE visites_guidees (
    id_visite INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    date_heure DATETIME NOT NULL,
    langue VARCHAR(50),
    capacite_max INT,
    statut ENUM('ouverte', 'complete', 'annulee') DEFAULT 'ouverte',
    duree INT,
    prix DECIMAL(10,2),
    id_guide INT,
    CONSTRAINT fk_visite_guide
        FOREIGN KEY (id_guide)
        REFERENCES utilisateurs(id_utilisateur)
);

CREATE TABLE etapes_visite (
    id_etape INT AUTO_INCREMENT PRIMARY KEY,
    titre_etape VARCHAR(150),
    description_etape TEXT,
    ordre_etape INT,
    id_visite INT,
    CONSTRAINT fk_etape_visite
        FOREIGN KEY (id_visite)
        REFERENCES visites_guidees(id_visite)
);

CREATE TABLE reservations (
    id_reservation INT AUTO_INCREMENT PRIMARY KEY,
    id_visite INT NOT NULL,
    id_visiteur INT NOT NULL,
    nb_personnes INT NOT NULL,
    date_reservation DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_reservation_visite
        FOREIGN KEY (id_visite)
        REFERENCES visites_guidees(id_visite),
    CONSTRAINT fk_reservation_visiteur
        FOREIGN KEY (id_visiteur)
        REFERENCES utilisateurs(id_utilisateur)
);

CREATE TABLE commentaires (
    id_commentaire INT AUTO_INCREMENT PRIMARY KEY,
    id_visite_parcouru INT NOT NULL,
    id_visiteur INT NOT NULL,
    note INT CHECK (note BETWEEN 1 AND 5),
    text TEXT,
    date_commentaire DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_commentaire_visite
        FOREIGN KEY (id_visite_parcouru)
        REFERENCES visites_guidees(id_visite),
    CONSTRAINT fk_commentaire_visiteur
        FOREIGN KEY (id_visiteur)
        REFERENCES utilisateurs(id_utilisateur)
);


