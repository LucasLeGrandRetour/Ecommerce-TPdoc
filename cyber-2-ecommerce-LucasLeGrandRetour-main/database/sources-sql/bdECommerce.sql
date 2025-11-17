USE bdECommerce;
#------------------------------------------------------------
# Table: client
#------------------------------------------------------------
CREATE TABLE client(
        id      smallint  Auto_increment  NOT NULL ,
        nom Varchar (20) NOT NULL,
	prenom Varchar (15) NOT NULL,
        dateNaissance date NOT NULL,
	CONSTRAINT client_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Données de départ
#------------------------------------------------------------
INSERT INTO client VALUES (1, 'PARD','Léo','2000/05/12'), (2, 'ATEUR','Nordine','1990/12/08'), (3, 'ADOR','Matt','1980/01/28');

#------------------------------------------------------------
# Table: compte
#------------------------------------------------------------
CREATE TABLE compte(
        numero      Int  Auto_increment  NOT NULL ,
        solde mediumint NOT NULL,
	titulaire smallint NOT NULL,
	CONSTRAINT compte_PK PRIMARY KEY (numero)
)ENGINE=InnoDB;

ALTER TABLE compte
ADD CONSTRAINT compte_titulaire_PK FOREIGN KEY (`titulaire`) REFERENCES client (`id`);

#------------------------------------------------------------
# Données de départ
#------------------------------------------------------------
INSERT INTO compte VALUES (1, 10000,3), (2, 50,1), (3, 6000,2), (4, 100,1);

#------------------------------------------------------------
# Vue SQL : vueComptesDesClients
#------------------------------------------------------------

CREATE VIEW vueComptesDesClients (numeroCompte, nomTitulaire,prenomTitulaire,soldeCompte) 
AS SELECT numero, nom, prenom, solde FROM client INNER JOIN compte ON client.id=compte.titulaire;

#------------------------------------------------------------
# Habilitations sur la vue
#------------------------------------------------------------

GRANT
SELECT ON bdECommerce.vueComptesDesClients TO ComptesDesClients_Read@`%`;

GRANT
SELECT,
INSERT
    ON bdECommerce.vueComptesDesClients TO ComptesDesClients_Create @`%`;

GRANT
SELECT,
UPDATE ON bdECommerce.vueComptesDesClients TO ComptesDesClients_Update @`%`;

GRANT
ALL ON bdECommerce.vueComptesDesClients TO ComptesDesClients_All @`%`;