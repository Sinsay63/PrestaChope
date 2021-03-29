#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP DATABASE IF EXISTS prestachope_bdd6;
CREATE DATABASE prestachope_bdd6;
USE prestachope_bdd6;

#------------------------------------------------------------
# Table: Produits
#------------------------------------------------------------

CREATE TABLE Produits(
        Id          Int  Auto_increment  NOT NULL ,
        nom         Varchar (50) NOT NULL ,
        description Varchar (50) NOT NULL ,
        prix        Float NOT NULL ,
        stock       Int NOT NULL
	,CONSTRAINT Produits_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


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
# Table: Tresorerie
#------------------------------------------------------------

CREATE TABLE Tresorerie(
        Id    Int  Auto_increment  NOT NULL ,
        Total Float NOT NULL
	,CONSTRAINT Tresorerie_PK PRIMARY KEY (Id)
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
        adresse   Varchar (50) NOT NULL ,
        telephone Varchar (50) NOT NULL ,
        Id_Users  Int NOT NULL
	,CONSTRAINT Clients_PK PRIMARY KEY (Id)

	,CONSTRAINT Clients_Users_FK FOREIGN KEY (Id_Users) REFERENCES Users(Id)
	,CONSTRAINT Clients_Users_AK UNIQUE (Id_Users)
)ENGINE=InnoDB;






#------------------------------------------------------------
# Table: Commandes
#------------------------------------------------------------

CREATE TABLE Commandes(
        Id          Int  Auto_increment  NOT NULL ,
        Id_Clients  Int NOT NULL
	,CONSTRAINT Commandes_PK PRIMARY KEY (Id)
	,CONSTRAINT Commandes_Clients_FK FOREIGN KEY (Id_Clients) REFERENCES Clients(Id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: Factures
#------------------------------------------------------------

CREATE TABLE Factures(
        Id            Int  Auto_increment  NOT NULL ,
        Id_Tresorerie Int NOT NULL,
        Id_Commandes  Int NOT NULL
	,CONSTRAINT Factures_PK PRIMARY KEY (Id)
        ,CONSTRAINT Factures_Commandes_FK FOREIGN KEY (Id_Commandes) REFERENCES Commandes(Id)
	,CONSTRAINT Factures_Tresorerie_FK FOREIGN KEY (Id_Tresorerie) REFERENCES Tresorerie(Id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: Produits_Categories
#------------------------------------------------------------

CREATE TABLE Produits_Categories(
        Id_Produits   Int NOT NULL ,
        Id_Categories Int NOT NULL
	
	,CONSTRAINT Produits_Categories_PK PRIMARY KEY (Id_Produits,Id_Categories)

	,CONSTRAINT Produits_Categories_Produits_FK FOREIGN KEY (Id_Produits) REFERENCES Produits(Id)
	,CONSTRAINT Produits_Categories_Categories_FK FOREIGN KEY (Id_Categories) REFERENCES Categories(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Quantites_Produits
#------------------------------------------------------------

CREATE TABLE Produits_Commandes(
        Id_Produits  Int NOT NULL ,
        Id_Commandes Int NOT NULL,
        quantites    INT NOT NULL
	,CONSTRAINT Produits_PK PRIMARY KEY (Id_Produits,Id_Commandes)
        ,CONSTRAINT Produits_Commandes_Produits_FK FOREIGN KEY (Id_Produits) REFERENCES Produits(Id)
        ,CONSTRAINT Produits_Commandes_Commandes_FK FOREIGN KEY (Id_Commandes) REFERENCES Commandes(Id)
	
)ENGINE=InnoDB;
