# 📦 site ECommerce en architecture MVC et DAO et rôles applicatifs

Projet réalisé dans le cadre des AP web en SIO2 SLAM au semestre 1

## 📌 Sommaire

- [📄 Présentation du projet](#présentation-du-projet)
- [🧱 Organisation du dossier site](#organisation-du-dossier-site)
- [🧱 Le dossier database](#Le_dossier-database)
- [🧱 Le dossier tests](#Le_dossier-tests)
- [🧱 Utilisation du dépôt avec GitHub Codespaces](#Utilisation-du-depôt-avec-GitHub-Codespaces)
- [🧱 Serveur php et service mariadb (avec la base métier)](#Serveurs)
- [🧱 Utilisation de XDebug](#Utilisation-de-XDebug)
- [🧱 Tests unitaires](#Tests-unitaires)
- [🧱 Documentation](#Documentation)

---

<a id="présentation-du-projet"></a>

## Présentation du projet

Nous sommes dans une entreprise factice d’ecommerce qui propose l’échange de biens entre particuliers.
Pour ce faire, elle a besoin de gérer les mouvements d’argent entre le vendeur et l’acheteur, qui sont tous les deux des clients de la société d’ecommerce.

Ce projet est une application web permettant de ** gérer les transactions financières entre les utilisateurs de la plateforme.**.  
L'application permet notamment de :

- consulter la liste des comptes et leur solde
- faire un virement d'un montant donné d'un compte expéditeur vers un compte destinataire

<a id="organisation-du-dossier-site"></a>

## 🧱 Organisation du dossier site

**architecture MVC** :
L'application suit le modèle MVC (Modèle-Vue-Contrôleur).

Chaque couche a un rôle bien défini :

    1. Modèles : gestion des données et interactions avec la base.
    2. Contrôleurs : logique métier et traitement des requêtes.
    3. Vues : affichage dynamique du contenu.

**configBdd.php** :
Fichier de configuration pour la connexion à la base de données (par exemple, hôte, nom d'utilisateur, mot de passe, nom de la base).

**index.php** :
Point d'entrée principal du site.
Gère le routage en fonction des paramètres de l'URL (?p=...) et appelle les contrôleurs correspondants.

<a id="Le_dossier-database"></a>

## 🧱 Le dossier database

Ce dernier permet de créer/ initialiser/recharger/sauvegarder la base de données locale au codespace

<a id="Le_dossier-tests"></a>

## 🧱 Le dossier tests

Ce dernier contient les fichiers de tests qui pourront être lancés de manière automatisé

<a id="Utilisation-du-depôt-avec-GitHub-Codespaces"></a>

### Utilisation avec GitHub Codespaces

**Créez un codespace pour ouvrir ce dépot** :

- Cliquez sur le bouton "Code" dans GitHub et sélectionnez "Open with Codespaces".
- Si vous n'avez pas encore de Codespace, cliquez sur "New Codespace".
- Cliquez sur le bouton "Code" dans GitHub et sélectionnez "Open with Codespaces".
- Si vous n'avez pas encore de Codespace, cliquez sur "New Codespace".

Le Codespace ainsi créé contient toutes les configurations nécessaires pour démarrer le développement.
Le Codespace ainsi créé contient toutes les configurations nécessaires pour démarrer le développement.

<a id="Serveurs"></a>

### Serveur php et service mariadb (avec la base métier)

1. **Pour lancer les services** :

   - Dans le terminal, exécutez le script `start.sh` :
     ```bash
     ./start.sh
     ```
     Ce script démarre le serveur PHP intégré sur le port 8000, démarre mariadb et crée la base métier depuis le script renseigné (mettre à jour en fonction du projet).

2. **Ouvrir le service php dans un navigateur** :

   - Accédez à `http://localhost:8000` pour voir la page d'accueil de l'API.

3. **Accèder à la BDD** :

   - En mode commande depuis le client mysql en ligne de commande
     Exemple :
     ```bash
     mysql -u mediateq-web -p
     ```
   - En client graphique avec l'extension Database dans le codespace (Host:127.0.0.1)

   - avec phpMyAdmin sur le port 8080

4. **initialiser la BDD** :

   - Au premier démarrage, créez la bdd métier avec le fichier sql
     ```bash
     ./database/scripts/initBDD.sh
     ```

5. **Sauver et mettre à jour la BDD** :

   - A chaque fois que vous avez fait des modifs significatives dans la BDD métier, lancer le script bash saveBDD pour écraser le fichier sql actuel de la bdd par votre sauvegarde (puis pensez à push sur le distant pour vos collaborateurs)
     ```bash
     ./database/scripts/saveBDD.sh
     ```
   - Si des modifs ont été faites à la BDD et que vous avez récupéré du dépot distant (pull) une version mise à jour du script de la BDD métier, lancer le script bash reloadBDD pour écraser la bdd actuelle de votre codespace par celle du script récupéré.

     ```bash
     ./database/scripts/reloadBDD.sh
     ```

   - Au premier démarrage, créez la bdd métier avec le fichier sql
     ```bash
     ./database/scripts/initBDD.sh
     ```

<a id="Utilisation-de-XDebug"></a>

## Utilisation de XDebug

Ce Codespace contient XDebug pour le débogage PHP.
**Exemple de déboguage avec Visual Studio Code** :

- Ouvrez le panneau de débogage en cliquant sur l'icône de débogage dans la barre latérale ou en utilisant le raccourci clavier `Ctrl+Shift+D`.
- Sélectionnez la configuration "Listen for XDebug" et cliquez sur le bouton de lancement (icône de lecture).
- Ouvrez un fichier php
- Ajouter un point d'arrêt.
- Sollicitez dans le navigateur une page qui appelle le traitement
- Une fois le point d'arrêt atteint, essayez de survoler les variables, d'examiner les variables locales, etc.

[Tuto Grafikart : Xdebug, l'exécution pas à pas ](https://grafikart.fr/tutoriels/xdebug-breakpoint-834)

<a id="Tests-unitaires"></a>

## Tests unitaires

Ce projet utilise PHPUnit pour les tests unitaires.

1. ** Installer les dépendances **
   Pour exécuter les tests unitaires, assurez-vous que les dépendances nécessaires sont installées via Composer en executant :

```bash
composer install
```

2. ** Lancer les tests **
   Une fois les dépendances installées, lancez les tests avec la commande suivante :

```bash
vendor/bin/phpunit --testdox tests/
```

Cela exécutera tous les tests définis dans le projet et affichera les résultats dans le terminal.

3. ** Structure des tests **
   Les tests sont organisés dans le répertoire `tests/` et suivent cette structure :

- tests/modeles/ : Contient les tests pour les modèles (par exemple, CompteClientDAO.php).
- tests/controleur/ : Contient les tests pour les contrôleurs (par exemple, gestionComptesClients.php).

4. ** Ajouter de nouveaux tests **
   Pour ajouter un nouveau test :

- Créez un fichier de test dans le répertoire approprié (par exemple, tests/modele/NouveauModeleTest.php).

- Assurez-vous que le fichier suit la convention de nommage `NomClasseTest.php` et que la classe de test étend `PHPUnit\Framework\TestCase`.

Exemple de test unitaire simple :

```php
<?php

use PHPUnit\Framework\TestCase;

class ExempleTest extends TestCase
{
   public function testAddition()
   {
      $this->assertEquals(4, 2 + 2);
   }
}
```

Une fois le test ajouté, relancez la commande PHPUnit pour vérifier son bon fonctionnement.

<a id="Documentation"></a>

## Documentation

**phpDocumentor** est un outil qui permet de générer automatiquement la documentation technique de votre code PHP à partir des commentaires présents dans vos fichiers source.

**Fonctionnement :**

- _Commentaires PHPDoc_ : Vous commentez vos classes, fonctions et propriétés avec des blocs de commentaires spéciaux (PHPDoc).
- _Génération automatique_ : phpDocumentor analyse ces commentaires et crée une documentation HTML structurée et navigable.
- _Personnalisation_ : Vous pouvez choisir le dossier à documenter (`-d ./site`) et le dossier de sortie (`-t ./documentation`).

**Exemple de commentaire PHPDoc :**

```php
<?php
/**
 * Additionne deux nombres.
 *
 * @param int $a
 * @param int $b
 * @return int
 */
function addition(int $a, int $b) : int {
    return $a + $b;
}
```

plus d'infos sur [le guide phpDocumentor](https://docs.phpdoc.org/guide/getting-started/what-is-a-docblock.html#what-is-a-docblock)

**Commande de génération :**

```
php phpDocumentor.phar run -d ./site -t ./documentation
```

- `-d ./site` : dossier contenant le code à documenter.
- `-t ./documentation` : dossier où sera générée la documentation HTML.

**Résultat :**
Après exécution, ouvrez le fichier index.html sur le serveur executé sur le port 8001 dans un navigateur pour consulter la documentation de votre projet.
