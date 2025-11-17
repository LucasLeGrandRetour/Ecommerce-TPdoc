-- script d'initialisation de la base de données pour l'application web avec les droits de l'utilisateur
DROP DATABASE IF EXISTS bdECommerce;

CREATE DATABASE IF NOT EXISTS bdECommerce CHARACTER SET utf8 COLLATE utf8_general_ci;

DROP USER IF EXISTS ComptesDesClients_Read @`%`;

DROP USER IF EXISTS ComptesDesClients_Create @`%`;

DROP USER IF EXISTS ComptesDesClients_Update @`%`;

CREATE USER ComptesDesClients_Read @`%` IDENTIFIED BY 'pwd2CDC_Read';

CREATE USER ComptesDesClients_Create @`%` IDENTIFIED BY 'pwd2CDC_Create';

CREATE USER ComptesDesClients_Update @`%` IDENTIFIED BY 'pwd2CDC_Update';

CREATE USER ComptesDesClients_All @`%` IDENTIFIED BY 'pwd2CDC_All';


USE bdECommerce;