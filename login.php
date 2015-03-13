

<?php
session_start();
if(isset($_POST['submit']))
{
	$username = $POST['username'];
	$password = $POST['password'];
	
	if($username&&$password)
	{
		$password = md5(password);
		$connect = mysql_connect('localhost','root','');
		mysql_select_db('phplogin');
		
		$query = mysql_query("SELECT * FROM users WHERE username = '$username'&&password='$password'");
		$rows = mysql_num_rows($query);
		if(rows==1)
		{
			$_SESSION['username']=$username;
			header('Location:membre.php');
		}else echo "Pseudo et/ou mot de passe incorrect";
	}else echo "Veuillez saisir tous les champs";
	
}


?>

<form method = "POST" action="login.php">
		<p> Votre pseudo : </p>
		<input type="text" name="username">
		<p> Votre mot de passe : </p>
		<input type="password" name="password"><br/><br/>
		<input type="submit"value="S'identifier">