<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.register.css"/>
<title>Inscription</title>

</head>
<body>
<?php
ini_set('display_errors', 'off');
if(isset($_POST['submit']))
{
   $nom= htmlentities(trim ($_POST['nom']));
   $prenom= htmlentities(trim ($_POST['prenom']));
   $pseudodeconnexion= htmlentities(trim ($_POST['pseudodeconnexion']));
   $motdepasse= htmlentities(trim($_POST['motdepasse']));
   $confirmerlemotdepasse= htmlentities(trim($_POST['confirmerlemotdepasse']));
   $adresse= htmlentities(trim ($_POST['adresse']));
   $codepostal= htmlentities(trim ($_POST['codepostal']));
   $ville= htmlentities(trim ($_POST['ville']));
   $departement= htmlentities(trim ($_POST['departement']));
   $pays= htmlentities(trim ($_POST['pays']));
   $courriel= htmlentities(trim ($_POST['courriel']));
   $telephone= htmlentities(trim ($_POST['telephone']));

     if($nom&&$pseudodeconnexion&&$motdepasse&&$confirmerlemotdepasse&&$adresse&&$codepostal&&$ville&&$courriel)
     {
       if ($motdepasse==$confirmerlemotdepasse)
       {
          $motdepasse= md5 ($motdepasse);  /* on crypte le mot de passe pour plus de sécurité */
		  
          $connect= mysql_connect('localhost','root','') or die('Error');
		  
           mysql_select_db('phplogin2');
		   
           $reg= mysql_query("SELECT * FROM users WHERE pseudodeconnexion='$pseudodeconnexion'"); /* Cette ligne empêche la création de pseudos semblables */
		   
           $rows = mysql_num_rows($reg);

           if($rows==0) /* si le pseudo n'est pas trouvé alors on l'enregistre */
           {

              $query = mysql_query ("INSERT INTO users VALUES('','$nom','$prenom','$pseudodeconnexion','$motdepasse','$adresse','$codepostal','$ville','$departement','$pays','$courriel','$telephone')");

              die("Inscription terminée <a href='login.php'> connéctez </a> vous");
			  
            }else echo "Ce pseudo n'est pas disponible";
			
        }else echo"Les mots de passe ne correspondent pas";

    }else echo "Veuillez saisir tous les champs";
}


?>
     <div id="bloc_page">
            <header>
                <div id="titre_principal">
                    <img src="images/logo.png" alt="Logo du Site" id="logo" />
                    
                    <h2>Site d'échange et de partage de fruits et légumes</h2>
                </div>
                
                <nav>
                    <ul>
                        <li><a href="homepage.html">Accueil</a></li>
                        <li><a href="login.php">Mon Compte</a></li>
                        <li><a href="#">Forum</a></li>
                        <li><a href="#">Ma Région</a></li>
    					<li><a href="#">Recherche avancée</a></li>
                    </ul>
                </nav>
            </header>



			<div id="banniere_image">
                
            </div>




	<form id="formulaire" method="POST" action="register.php">
	<p>Nom: <input type="text" name="nom" > </p>
	<p>Prénom: <input type="text" name="prenom" ></p>
	<p>Pseudo de connexion: <input type="text" name="pseudodeconnexion" ></p>
	<p>Mot de passe: <input type="password" name="motdepasse"  > <p/>
	<p>Confirmer le mot de passe: <input type="password" name="confirmerlemotdepasse" ></p>
	<p>Adresse: <input type="text" name="adresse" > <p/>
	<p>Code postal: <input type="text" name="codepostal" ><p/>
    <p>Ville: <input type="text" name="ville" ></p>
	<p>Département: <input type="text" name="departement" ><p/>
    <p>Pays: <input type="text" name="pays" ></p>
	<p>Courriel: <input type="text" name="courriel" > <p/>
    <p>Téléphone: <input type="text" name="telephone" ><p/>
	<p>J'accepte les<a href='conditions.html'> conditions générales</a> :
	<input type="checkbox" name="conditions"></p></br>
	<input type="submit" value="S'inscrire" name="submit">
	</form>

</body>
</div>
</html>

	
	



