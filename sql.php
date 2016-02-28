<?
	include('connexion.php');
	$user=$_POST['pseudo'];
	$mdp=$_POST['password'];
	$sql=mysql_query("SELECT prenom, nom, mail FROM UserConnexion WHERE identifiant='$user' AND password='$mdp'");

	if(mysql_num_rows($sql)==0) {
		echo "Echec d'authentification. Identifiant ou mot de passe incorrecte.";
	} else {
	
		$ligne=mysql_fetch_array($sql); 
		echo "Bonjour $ligne[prenom] $ligne[nom]";
		
		$sql2=mysql_query("SELECT nom, prenom, mail FROM UserConnexion");
		$ligne2=mysql_fetch_array($sql2);
		echo "<br/>Voici tous les utilisateurs<br/>";
		
		while($ligne2 !=false) {
			echo $ligne2['nom']." ".$ligne2['prenom']." ".$ligne2['mail']."<br/>";
			$ligne2=mysql_fetch_array($sql2); 
		}
		
	}
?>
