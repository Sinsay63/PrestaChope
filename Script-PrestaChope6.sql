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

#------------------------------------------------------------
# Table: Produits
#------------------------------------------------------------

CREATE TABLE produits(
        Id                Int  Auto_increment  NOT NULL ,
        nom               Varchar (50) NOT NULL ,
        description       Varchar (50) NOT NULL ,
        prix              Float NOT NULL ,
        stock             Int NOT NULL,
        Id_Catégories     Int NOT NULL,
        Id_SousCatégories INT NOT NULL
	,CONSTRAINT produits_PK PRIMARY KEY (Id)
        ,CONSTRAINT produits_categories_FK FOREIGN KEY (Id_Catégories) REFERENCES categories(Id)
        ,CONSTRAINT produits_souscategories_FK FOREIGN KEY (Id_SousCatégories) REFERENCES souscategories(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Tresorerie
#------------------------------------------------------------

CREATE TABLE tresorerie(
        Id    Int  Auto_increment  NOT NULL ,
        total Float NOT NULL 
	,CONSTRAINT tresorerie_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


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





#------------------------------------------------------------
# Table: Commandes
#------------------------------------------------------------

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
