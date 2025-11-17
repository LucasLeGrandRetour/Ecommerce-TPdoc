<?php

/**
 * Fichier de configuration de la base de données
 * Il est suggéré d'enlever ce fichier des push ultérieurs
 */
$_ENV['bd'] = 'bdECommerce'; // utilisateur de la base de données
$_ENV['local_dsn'] = 'mysql:host=127.0.0.1;dbname=bdECommerce;port=3306'; // local data source name

/**
 * Comptes ayant les habilitations 
 */
$_ENV['Read'] = 'ComptesDesClients_Read'; // utilisateur de la base de données
$_ENV['pwdRead'] = 'pwd2CDC_Read'; // mot de passe de l'utilisateur de la base de données

$_ENV['Create'] = 'ComptesDesClients_Create'; // utilisateur de la base de données
$_ENV['pwdCreate'] = 'pwd2CDC_Create'; // mot de passe de l'utilisateur de la base de données

$_ENV['Update'] = 'ComptesDesClients_Update'; // utilisateur de la base de données
$_ENV['pwdUpdate'] = 'pwd2CDC_Update'; // mot de passe de l'utilisateur de la base de données

$_ENV['All'] = 'ComptesDesClients_All'; // utilisateur de la base de données
$_ENV['pwdAll'] = 'pwd2CDC_All'; // mot de passe de l'utilisateur de la base de données

$_ENV['options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''); // option pour le driver PDO : UTF8 pour gérer les accents
