
<div id="ecommerce_comptesclients_description">
<h2> Liste des comptes de la société </h2>
	<?php
            if ($lesComptesDesClients==null)
                echo "La société ne dispose d'aucun compte client enregistré à ce stade.";
            else {
        ?>
                    <table class='texte'><tr> <th> Numéro de compte</th><th> Nom du titulaire</th><th> Prénom du titulaire</th><th> Solde du compte</th></tr>
        <?php

                    foreach ($lesComptesDesClients as $compte) {

                        /* ************************************************************************/
                        /* ************************** Mise en place du DAO ************************/
                        // Les éléments stockés dans le tableau $lesComptesDesClients
                        // sont maintenant des objets métiers.
                        // Ici, il s'agit d'objets de la classe CompteClient
                        // La manière de récupérer les valeurs diffère donc un peu ....
        ?>
                        <tr> <th class='retrait'> <?php echo $compte->getNum();?></th><td> <?php echo $compte->getNom();?></td><td> <?php echo $compte->getPrenom();?></td><th class='monetaire'> <?php echo $compte->getSolde(). " €";?></th></tr>
        <?php                    
                    }
        ?>
                    </table>
        <?php     }
                       
	?>
                

</div>