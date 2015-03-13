<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style_sign_in.css"/>
<title>Inscription</title>

</head>
<?php

if(isset($_POST['submit']))
{
$username= htmlentities(trim ($_POST['username']));
$password= htmlentities(trim($_POST['password']));
$repeatpassword= htmlentities(trim($_POST['repeatpassword']));
if($username&&$password&&$repeatpassword)
{
if ($password==$repeatpassword)
{
$password= md5 ($password);
/* on crypte le mot de passe pour eviter que les pirates informatiques puissent le récupérer */
$connect= mysql_connect('localhost','root','') or die('Error');
mysql_select_db('phplogin');
$reg= mysql_query("SELECT * FROM users WHERE username='$username'"); /* Cette ligne empêche la création de pseudos semblables */
$rows = mysql_num_rows($reg);

if($rows==0) /* si le pseudo n'est pas trouvé alors on l'enregistre */
{

$query = mysql_query ("INSERT INTO users VALUES('','$username','$password')");

die("Inscription terminée");
}else echo "Ce pseudo n'est pas disponible";
}else echo"Les passwords ne correspondent pas";

}else echo "Veuillez saisir tous les champs";
}


?>
<div id="bloc_page">
            <header>
                <div id="titre_principal">
                    <img src="images/site_logo.jpg" alt="Logo du Site" id="logo" />
                    <h1 id="titre_site">Adopt'UnFruit.com</h1>
                    <h2>Site d'échange et de partage de fruits et légumes</h2>
                </div>
                
                <nav>
                    <ul>
                        <li><a href="homepage.html">Accueil</a></li>
                        <li><a href="inscription2.php">Mon Compte</a></li>
                        <li><a href="#">Forum</a></li>
                        <li><a href="#">Ma Région</a></li>
						<li><a href="#">Recherche avancée</a></li>
                    </ul>
                </nav>
            </header>


<body>
			<div id="banniere_image">
                
            </div>

<form id="formulaire" method="POST" action="inscription2.php">


	<form method="POST" action="register.php">
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
</form>

</body>
</div>
</html>