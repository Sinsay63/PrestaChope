#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP DATABASE IF EXISTS prestachope_bdd6;
CREATE DATABASE prestachope_bdd6;
USE prestachope_bdd6;

#------------------------------------------------------------
# Table: Categories
#------------------------------------------------------------

CREATE TABLE Categories(
        Id          Int  Auto_increment  NOT NULL ,
        nom         Varchar (50) NOT NULL ,
        description Varchar (50) NOT NULL
	,CONSTRAINT Categories_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: SousCategories
#------------------------------------------------------------

CREATE TABLE SousCategories(
        Id            Int  Auto_increment  NOT NULL ,
        nom           Varchar (50) NOT NULL ,
        Id_Categories Int NOT NULL
	,CONSTRAINT SousCategories_PK PRIMARY KEY (Id)

	,CONSTRAINT SousCategories_Categories_FK FOREIGN KEY (Id_Categories) REFERENCES Categories(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Stock
#------------------------------------------------------------

CREATE TABLE Stock(
        Id       Int  Auto_increment  NOT NULL ,
        quantite Int NOT NULL
	,CONSTRAINT Stock_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Produits
#------------------------------------------------------------

CREATE TABLE Produits(
        Id          Int  Auto_increment  NOT NULL ,
        nom         Varchar (50) NOT NULL ,
        description Varchar (50) NOT NULL ,
        prix        Float NOT NULL ,
        Id_Stock    Int NOT NULL
	,CONSTRAINT Produits_PK PRIMARY KEY (Id)

	,CONSTRAINT Produits_Stock_FK FOREIGN KEY (Id_Stock) REFERENCES Stock(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Tresorerie
#------------------------------------------------------------

CREATE TABLE Tresorerie(
        Id    Int  Auto_increment  NOT NULL ,
        Total Float NOT NULL
	,CONSTRAINT Tresorerie_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Factures
#------------------------------------------------------------

CREATE TABLE Factures(
        Id            Int  Auto_increment  NOT NULL ,
        Id_Tresorerie Int NOT NULL
	,CONSTRAINT Factures_PK PRIMARY KEY (Id)

	,CONSTRAINT Factures_Tresorerie_FK FOREIGN KEY (Id_Tresorerie) REFERENCES Tresorerie(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

CREATE TABLE Users(
        Id       Int  Auto_increment  NOT NULL ,
        nom      Varchar (50) NOT NULL ,
        prenom   Varchar (50) NOT NULL ,
        pseudo   Varchar (50) NOT NULL ,
        password Varchar (50) NOT NULL ,
        email    Varchar (50) NOT NULL ,
        age      Int NOT NULL ,
        cagnotte Float NOT NULL ,
        isAdmin  Int NOT NULL
	,CONSTRAINT Users_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Clients
#------------------------------------------------------------

CREATE TABLE Clients(
        Id        Int  Auto_increment  NOT NULL ,
        nom       Varchar (50) NOT NULL ,
        prenom    Varchar (50) NOT NULL ,
        adresse   Varchar (50) NOT NULL ,
        telephone Varchar (50) NOT NULL ,
        Id__Users Int NOT NULL
	,CONSTRAINT Clients_PK PRIMARY KEY (Id)

	,CONSTRAINT Clients__Users_FK FOREIGN KEY (Id__Users) REFERENCES _Users(Id)
	,CONSTRAINT Clients__Users_AK UNIQUE (Id__Users)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commandes
#------------------------------------------------------------

CREATE TABLE Commandes(
        Id         Int  Auto_increment  NOT NULL ,
        Id_Clients Int NOT NULL
	,CONSTRAINT Commandes_PK PRIMARY KEY (Id)

	,CONSTRAINT Commandes_Clients_FK FOREIGN KEY (Id_Clients) REFERENCES Clients(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Quantites
#------------------------------------------------------------

CREATE TABLE Quantites(
        Id           Int  Auto_increment  NOT NULL ,
        nombre       Int NOT NULL ,
        Id_Commandes Int NOT NULL
	,CONSTRAINT Quantites_PK PRIMARY KEY (Id)

	,CONSTRAINT Quantites_Commandes_FK FOREIGN KEY (Id_Commandes) REFERENCES Commandes(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Avoir1
#------------------------------------------------------------

CREATE TABLE Avoir1(
        Id            Int NOT NULL ,
        Id_Categories Int NOT NULL
	,CONSTRAINT Avoir1_PK PRIMARY KEY (Id,Id_Categories)

	,CONSTRAINT Avoir1_Produits_FK FOREIGN KEY (Id) REFERENCES Produits(Id)
	,CONSTRAINT Avoir1_Categories0_FK FOREIGN KEY (Id_Categories) REFERENCES Categories(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Possede5
#------------------------------------------------------------

CREATE TABLE Possede5(
        Id          Int NOT NULL ,
        Id_Produits Int NOT NULL
	,CONSTRAINT Possede5_PK PRIMARY KEY (Id,Id_Produits)

	,CONSTRAINT Possede5_Quantites_FK FOREIGN KEY (Id) REFERENCES Quantites(Id)
	,CONSTRAINT Possede5_Produits0_FK FOREIGN KEY (Id_Produits) REFERENCES Produits(Id)
)ENGINE=InnoDB;

