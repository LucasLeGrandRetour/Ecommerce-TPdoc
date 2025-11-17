<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">



	<title>SITE ECOMMERCE</title>
	<link rel="stylesheet" href="css/styleflexbox.css">
	<link rel="stylesheet" href="css/integrationPolicesExotiques.css">

</head>

<body>
	<header>
		<img class="ecommerce_logo" src="images/ecommerce_logo.jpg" alt="ecommerce logo" />

		<h1 class="titre">SITE ECOMMERCE</h1>
	</header>


	<section>
		<nav>
			<ul>
				<li> <a href="index.php?controleur=accueil"> Accueil</a></li>
				<li> <a href="index.php?controleur=comptesClients&action=consultation"> Liste des comptes </a></li>
				<li> <a href="index.php?controleur=comptesClients&action=demanderVirement"> Faire un virement </a></li>
			</ul>
		</nav>
		<div id="contenu">
			<?php
			//valeurs par défaut si aucun message à afficher
			$statut = $message = "";

			// si aucune information n'est présente dans l'url, le controleur par défaut sera "accueil"
			if (isset($_GET['controleur']))
				$controleur = filter_var($_GET['controleur'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			else
				$controleur = "accueil";

			switch ($controleur) {
				case 'accueil':
					include_once "vues/accueil.html";
					break;
				case 'comptesClients':
					include_once "controleurs/gestionComptesClients.php";

					break;
			}

			if ($message != "") {
				include_once "vues/message.php";
			}


			?>

		</div>
	</section>
	<footer>
		<p id="banniere">
			Le BTS SIO du lycée Saint-John Perse
		</p>
		<div id="SJP_SIO_Presentation">
			<p> Le BTS SIO(Services Informatiques aux Organisations) est un diplôme de technicien du domaine informatique. Selon l'option choisie, l'étudiant diplomé sera spécialisé en maintenance systèmes et réseaux (option SISR) ou bien en développement d'applications métiers (option SLAM).
				Les diplômés peuvent s'insérer dans la vie active, mais il leur est suggéré, dans la mesure du possible, de poursuivre leurs études : en licence LMD (dont licences informatique et parcours MIAGE, licence professionnelle, école d'ingénieur ou école spécialisée.
			</p>
			<img id="SJP_Logo" src="images/SJP_logo_long.jpg" alt="SJP formation BTS SIO" />
		</div>
	</footer>
</body>

</html>