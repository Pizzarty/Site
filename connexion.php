<?php
// ce fichier r�alise deux connexions successives : au serveur de base de donn�es, puis � la base de donn�es

// PARTIE A ADAPTER : d�finition des variables de connexion
$serveur = "pizzarty.fr";		// adresse IP du serveur de donn�es
							// (localhost s'il est h�berg� par la m�me machine que le serveur web)
$utilisateur = "root";  	// nom de l'utilisateur se connectant � la base avec les droits ad�quats
$motdepasse = "pizzarty.frmysql72";  		// mot de passe de cet utilisateur
$base = "User";  			// nom de la base de donn�es

// connexion au serveur de donn�es d�sign� par la variable $serveur
// la variable $cx_srv re�oit une valeur bool�enne indiquant un succ�s (True) ou un �chec (False) de la connexion
$cx_srv = mysql_connect($serveur, $utilisateur, $motdepasse);

// test du succ�s de la connexion au serveur de donn�es afin de passer ensuite � la connexion � la base de donn�es
if($cx_srv==False)
	{  
		print "Echec de la connexion au serveur ".$serveur." : probl�me d'adresse IP, d'utilisateur (login et/ou mot de passe) ou d'indisponibilit� du serveur).<br />";
	}
else
	{
	    // connexion � la base de donn�es d�sign�e par la variable $base � partir de la connexion pr�c�dente ($cx-srv)
		// la variable $cx_base re�oit une valeur bool�enne indiquant un succ�s (True) ou un �chec (False) de la connexion
	     $cx_base= mysql_select_db($base, $cx_srv);
	    
		// test du succ�s de la connexion � la base de donn�es
	    if($cx_base==False)
			{  
				print "Echec de la connexion � la base ".$base." : base inexistante/indisponible ou absence totale de droits de l'utilisateur sur cette base.<br />";
	             // fermeture de la connexion au serveur
	             mysql_close($cx_srv);
			}
			else
			{
				}
	}
?>
