#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP DATABASE IF EXISTS prestachope_bdd6;
CREATE DATABASE prestachope_bdd6;
USE prestachope_bdd6;



#------------------------------------------------------------
# Table: Categories
#------------------------------------------------------------

CREATE TABLE categories(
        Id          Int  Auto_increment  NOT NULL ,
        nom         Varchar (50) NOT NULL ,
        description Varchar (50) NOT NULL
	,CONSTRAINT categories_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;

INSERT INTO `categories` (`Id`, `nom`, `description`) VALUES
(1, 'NONE', 'Catégorie de base'),
(2, 'bières', 'description bières'),
(3, 'Vins', 'description vins');


#------------------------------------------------------------
# Table: SousCategories
#------------------------------------------------------------

CREATE TABLE souscategories(
        Id            Int  Auto_increment  NOT NULL ,
        nom           Varchar (50) NOT NULL ,
        Id_Categories Int NOT NULL
	,CONSTRAINT souscategories_PK PRIMARY KEY (Id)
	,CONSTRAINT souscategories_categories_FK FOREIGN KEY (Id_Categories) REFERENCES categories(Id)
)ENGINE=InnoDB;

INSERT INTO `souscategories` (`Id`, `nom`, `Id_Categories`) VALUES
(1, 'NONE', 1),
(2, 'blonde', 2),
(3, 'brune', 2),
(4, 'rouge', 3),
(5, 'rosé', 3);

#------------------------------------------------------------
# Table: Produits
#------------------------------------------------------------

CREATE TABLE produits(
        Id                Int  Auto_increment  NOT NULL ,
        nom               Varchar (50) NOT NULL ,
        description       Varchar (50) NOT NULL ,
        prix              Float NOT NULL ,
        stock             Int NOT NULL,
    	image			  Varchar (50) NOT NULL,
        Id_Catégories     Int NOT NULL,
        Id_SousCatégories INT NOT NULL
	,CONSTRAINT produits_PK PRIMARY KEY (Id)
        ,CONSTRAINT produits_categories_FK FOREIGN KEY (Id_Catégories) REFERENCES categories(Id)
        ,CONSTRAINT produits_souscategories_FK FOREIGN KEY (Id_SousCatégories) REFERENCES souscategories(Id)
)ENGINE=InnoDB;

INSERT INTO `produits` (`Id`, `nom`, `description`, `prix`, `stock`, `image`, `Id_Catégories`, `Id_SousCatégories`) VALUES
(1, 'Heineken', 'bouteille de 33cl', 1.5, 50, 'assets/images/heineken.png', 2, 2),
(2, 'Chateauneuf du pâpe', 'bouteille 1L ', 25.5, 20, NULL, 3, 4),
(3, 'Kronembourg', 'bouteille de 33cl', 2, 25, NULL, 3, 3);




#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

CREATE TABLE users(
        Id       Int  Auto_increment  NOT NULL ,
        nom      Varchar (50) NOT NULL ,
        prenom   Varchar (50) NOT NULL ,
        pseudo   Varchar (50) NOT NULL ,
        password Varchar (50) NOT NULL ,
        email    Varchar (50) NOT NULL ,
        age      Int NOT NULL ,
        cagnotte Float NOT NULL DEFAULT 0,
        isAdmin  Int NOT NULL DEFAULT 0
	,CONSTRAINT users_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;

INSERT INTO `users` (`Id`, `nom`, `prenom`, `pseudo`, `password`, `email`, `age`, `cagnotte`, `isAdmin`) VALUES
(1, 'HOUDIER', 'Yanis', 'Sinsay', '5cee219187649d473cf8489852a6a8880bdc6744', 'yanis.houdier@gmail.com', 19, 152.3, 1),
(2, 'RICHARD', 'Nathim', 'Nath', '075fbaa6a593c1261a529d81540c10bbbc12d8b2', 'nath@gmail.com', 22, 35.5, 0);


#------------------------------------------------------------
# Table: Panier
#------------------------------------------------------------
CREATE TABLE panier(
        Id                Int  Auto_increment  NOT NULL ,
        quantité        Int NOT NULL,
        Id_Produits     Int NOT NULL,
        Id_Users        Int NOT NULL
	,CONSTRAINT panier_PK PRIMARY KEY (Id)
        ,CONSTRAINT panier_produits_FK FOREIGN KEY (Id_Produits) REFERENCES produits(Id)
        ,CONSTRAINT panier_users_FK FOREIGN KEY (Id_Users) REFERENCES users(Id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: Clients
#------------------------------------------------------------

CREATE TABLE clients(
        Id           Int  Auto_increment  NOT NULL ,
        adresse      Varchar (50) NOT NULL ,
        ville        Varchar (50) NOT NULL ,
        code_postal  Int (5) NOT NULL ,
        telephone    Varchar (50) NOT NULL ,
        Id_Users     Int NOT NULL
	,CONSTRAINT clients_PK PRIMARY KEY (Id)
	,CONSTRAINT clients_users_FK FOREIGN KEY (Id_Users) REFERENCES users(Id)
	,CONSTRAINT clients_users_AK UNIQUE (Id_Users)
)ENGINE=InnoDB;

INSERT INTO `clients` (`Id`, `adresse`,`ville`,`code_postal`, `telephone`, `Id_Users`) VALUES
(1, '5 allée des jardins Aubière','Aubière' ,'63170', '0750253428', 1),
(2, '10 rue des prés ','Vichy','03000', '0670303413', 2);



#------------------------------------------------------------
# Table: Commandes
#------------------------------------------------------------

CREATE TABLE contact(
        Id          Int Auto_increment NOT NULL , 
        contenu    longtext NOT NULL,
        type_demande Varchar (30) NOT NULL,
        is_viewed Int NOT NULL,
        Id_Clients Int NOT NULL
        ,CONSTRAINT contact_PK PRIMARY KEY(Id)
        ,CONSTRAINT contact_clients_FK FOREIGN KEY (Id_CLients) REFERENCES clients(Id)
)ENGINE=InnoDB;


CREATE TABLE commandes(
        Id          Int  Auto_increment  NOT NULL ,
        Id_Clients  Int NOT NULL
	,CONSTRAINT commandes_PK PRIMARY KEY (Id)
	,CONSTRAINT commandes_clients_FK FOREIGN KEY (Id_Clients) REFERENCES clients(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Factures
#------------------------------------------------------------

CREATE TABLE factures(
        Id            Int  Auto_increment  NOT NULL ,
        Id_Commandes  Int NOT NULL,
        montant       Int NOT NULL  
	,CONSTRAINT factures_PK PRIMARY KEY (Id)
        ,CONSTRAINT factures_commandes_FK FOREIGN KEY (Id_Commandes) REFERENCES commandes(Id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: Quantites_Produits
#------------------------------------------------------------

CREATE TABLE produits_commandes(
        Id_Produits  Int NOT NULL ,
        Id_Commandes Int NOT NULL,
        quantites    INT NOT NULL
	,CONSTRAINT produits_PK PRIMARY KEY (Id_Produits,Id_Commandes)
        ,CONSTRAINT produits_commandes_produits_FK FOREIGN KEY (Id_Produits) REFERENCES produits(Id)
        ,CONSTRAINT produits_commandes_commandes_FK FOREIGN KEY (Id_Commandes) REFERENCES commandes(Id)
	
)ENGINE=InnoDB;
