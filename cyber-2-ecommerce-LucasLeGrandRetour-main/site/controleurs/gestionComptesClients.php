<?php

include_once "modeles/CompteClientDAO.php";
if (isset($_GET['action']))
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
else
    $action = "consultation";


switch ($action) {
    case 'consultation':
        $sourceDeDonnees = new CompteClientDAO();
        $lesComptesDesClients = $sourceDeDonnees->getLesComptesDesClients();
        include_once "vues/listeComptesDesClients.php";
        break;

    case 'demanderVirement':
        include_once "vues/formVirement.php";
        break;

    case 'faireVirement':
        $sourceDeDonnees = new CompteClientDAO();
        $cpteSource = $_POST['compteSource'];
        $cpteDestination = $_POST['compteDestination'];
        $montant = $_POST['montant'];
        $nbLignesMaj = $sourceDeDonnees->virerDeVers($cpteSource, $cpteDestination, $montant);

        if ($nbLignesMaj == 2) {
            $statut = "succes";
            $message = "Le transfert a bien été réalisé.";
        } else {
            if ($nbLignesMaj > 2) {
                $statut = "avertissement";
                $message = "$nbLignesMaj comptes de clients ont été mis à jour. Ceci paraît étrange....";
            } else {
                $statut = "erreur";
                $message = "Le transfert N'a PAS pu être réalisé.";
            }
        }
        break;
}
