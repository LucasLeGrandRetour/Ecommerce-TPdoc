<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// lien vers la classe mère
include_once "Base.php";
// lien vers la classe métier associée à la VUE SQL ComptesClients de la base de données
include_once "CompteClient.php";


include_once __DIR__ . "/../configBdd.php";

class CompteClientDAO extends Base
{

    public function __construct()
    {
        parent::__construct(); // par défaut la connexion n'est pas établie.
    }

    /**
     * Méthode permettant de définir la connexion
     * à la base de données
     * avec les habilitations les plus adéquates (droits restreints)
     * selon l'action à réaliser
     */
    private function setConnexionSelonRole(string $role)
    {
        $this->setConnexionBase($_ENV['local_dsn'], $_ENV[$role], $_ENV['pwd' . $role], $_ENV['options']);
    }

    // Nouvelle méthode créée à l'intérieur du modèle 
    // pour rendre l'application plus modulaire 

    /**
     * Fonction qui permet de récupérer les informations relatives aux comptes des clients
     * @return array $lesLignes
     */
    public function getLesComptesDesClients(): array
    {
        // connexion à la base de données avec des droits adéquats
        $this->setConnexionSelonRole("Read");

        $ordreSqlASoumettre = "SELECT * FROM vueComptesDesClients;";

        // exécution de la requête
        $resultat = $this->query($ordreSqlASoumettre);

        //extraction des données récupérées sous la forme d'un tableau associatif (PHP)
        $lesLignes = $resultat->fetchAll();

        // fermeture de la connexion à la base de données
        $resultat = null;


        /* ************************************************************************/
        /* ************************** Mise en place du DAO ************************/

        // conversion des données issues de la BD
        // en objet métier pour l'application
        $listeDesComptesDesclients = array();
        foreach ($lesLignes as $uneLigne) {
            //creation d'un objet de la classe CompteClient
            // à partir de données d'une ligne récupérée
            // dans la VUE  vueComptesDesClients
            $unCompteDeClient = new CompteClient($uneLigne["numeroCompte"], $uneLigne["nomTitulaire"], $uneLigne["prenomTitulaire"], $uneLigne["soldeCompte"]);

            //ajout de l'objet de la classe Developpeur dans le tableau $listeDesDeveloppeurs
            array_push($listeDesComptesDesclients, $unCompteDeClient);
        }
        return $listeDesComptesDesclients;
    }

    /**
     * Fonction qui permet de réaliser le virement d'un montant d'un compte à un autre
     * @return bool $resultat
     */
    public function virerDeVers($cpteSource, $cpteDestination, $montant): int
    {
        $this->setConnexionSelonRole("All");

        $ordreSqlASoumettre1 = "UPDATE vueComptesDesClients SET soldeCompte = soldeCompte - $montant WHERE numeroCompte= $cpteSource;";

        // exécution de la requête sur le compte source
        $nbLignesModifiees1 = $this->exec($ordreSqlASoumettre1);

        $ordreSqlASoumettre2 = "UPDATE vueComptesDesClients SET soldeCompte = soldeCompte + $montant WHERE numeroCompte= $cpteDestination;";

        // exécution de la requête sur le compte destination
        $nbLignesModifiees2 = $this->exec($ordreSqlASoumettre2);

        // mise à jour du nombre de lignes modifiées par les 2 requetes au total
        $nbLignesModifieesAuTotal = $nbLignesModifiees1 + $nbLignesModifiees2;

        return $nbLignesModifieesAuTotal;
    }
}
