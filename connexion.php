<?php
// ce fichier réalise deux connexions successives : au serveur de base de données, puis à la base de données

// PARTIE A ADAPTER : définition des variables de connexion
$serveur = "pizzarty.fr";		// adresse IP du serveur de données
							// (localhost s'il est hébergé par la même machine que le serveur web)
$utilisateur = "root";  	// nom de l'utilisateur se connectant à la base avec les droits adéquats
$motdepasse = "pizzarty.frmysql72";  		// mot de passe de cet utilisateur
$base = "User";  			// nom de la base de données

// connexion au serveur de données désigné par la variable $serveur
// la variable $cx_srv reçoit une valeur booléenne indiquant un succès (True) ou un échec (False) de la connexion
$cx_srv = mysql_connect($serveur, $utilisateur, $motdepasse);

// test du succès de la connexion au serveur de données afin de passer ensuite à la connexion à la base de données
if($cx_srv==False)
	{  
		print "Echec de la connexion au serveur ".$serveur." : problème d'adresse IP, d'utilisateur (login et/ou mot de passe) ou d'indisponibilité du serveur).<br />";
	}
else
	{
	    // connexion à la base de données désignée par la variable $base à partir de la connexion précédente ($cx-srv)
		// la variable $cx_base reçoit une valeur booléenne indiquant un succès (True) ou un échec (False) de la connexion
	     $cx_base= mysql_select_db($base, $cx_srv);
	    
		// test du succès de la connexion à la base de données
	    if($cx_base==False)
			{  
				print "Echec de la connexion à la base ".$base." : base inexistante/indisponible ou absence totale de droits de l'utilisateur sur cette base.<br />";
	             // fermeture de la connexion au serveur
	             mysql_close($cx_srv);
			}
			else
			{
				}
	}
?>
