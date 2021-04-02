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
(1, 'bi�res', 'description bi�res'),
(2, 'Vins', 'description vins');


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
(1, 'blonde', 1),
(2, 'brune', 1),
(3, 'rouge', 2),
(4, 'ros�', 2);

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
        Id_Cat�gories     Int NOT NULL,
        Id_SousCat�gories INT NOT NULL
	,CONSTRAINT produits_PK PRIMARY KEY (Id)
        ,CONSTRAINT produits_categories_FK FOREIGN KEY (Id_Cat�gories) REFERENCES categories(Id)
        ,CONSTRAINT produits_souscategories_FK FOREIGN KEY (Id_SousCat�gories) REFERENCES souscategories(Id)
)ENGINE=InnoDB;

INSERT INTO `produits` (`Id`, `nom`, `description`, `prix`, `stock`, `image`, `Id_Cat�gories`, `Id_SousCat�gories`) VALUES
(1, 'Heineken', 'bouteille de 33cl', 1.5, 50, 'assets/images/heineken.png', 1, 1),
(2, 'Chateauneuf du p�pe', 'bouteille 1L ', 25.5, 20, NULL, 2, 3),
(3, 'Kronembourg', 'bouteille de 33cl', 2, 25, NULL, 1, 2);


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
        cagnotte Float NOT NULL ,
        isAdmin  Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;

INSERT INTO `users` (`Id`, `nom`, `prenom`, `pseudo`, `password`, `email`, `age`, `cagnotte`, `isAdmin`) VALUES
(1, 'HOUDIER', 'Yanis', 'Sinsay', 'Sinsay', 'yanis.houdier@gmail.com', 19, 152.3, 1),
(2, 'RICHARD', 'Nathim', 'Nath', 'Nath', 'nath@gmail.com', 22, 35.5, 0);

#------------------------------------------------------------
# Table: Clients
#------------------------------------------------------------

CREATE TABLE clients(
        Id        Int  Auto_increment  NOT NULL ,
        adresse   Varchar (50) NOT NULL ,
        telephone Varchar (50) NOT NULL ,
        Id_Users  Int NOT NULL
	,CONSTRAINT clients_PK PRIMARY KEY (Id)
	,CONSTRAINT clients_users_FK FOREIGN KEY (Id_Users) REFERENCES users(Id)
	,CONSTRAINT clients_users_AK UNIQUE (Id_Users)
)ENGINE=InnoDB;

INSERT INTO `clients` (`Id`, `adresse`, `telephone`, `Id_Users`) VALUES
(1, '5 all�e des jardins Aubi�re - Aubi�re 63170', '0750253428', 1),
(2, '10 rue des pr�s - Vichy 03000', '0670303413', 2);



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

INSERT INTO `commandes` (`Id`, `Id_Clients`) VALUES
(1, 1),
(2, 2);

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

INSERT INTO `factures` (`Id`, `Id_Commandes`, `montant`) VALUES
(1, 1, 0),
(2, 2, 0);


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

INSERT INTO `produits_commandes` (`Id_Produits`, `Id_Commandes`, `quantites`) VALUES
(1, 1, 20),
(2, 1, 5);