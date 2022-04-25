
<?php if (isset($_GET['message']))
{
	echo$_GET['message'];
}
?>
	<form method="POST" action="user_traitement.php">
    <p>
	<table id="champs_connexion">
	<tr>
		<td>Login : </td>
		<td><input name="login"  type="text"/></td>
	</tr>
	
	<tr>
		<td><input name="valider" type="submit" value="OK"/></td>
        
	</tr>
	</table>

	<?php if(isset($_SESSION['message'])) 
		     echo $_SESSION['message']; ?></td>
	
</form>

	