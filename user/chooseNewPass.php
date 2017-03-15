<form method="post" action="changePassword.php">
<input type="hidden" name="pseudo" value=<?php echo $_GET["pseudo"] ?>>
	 <input type="password" name="password" placeholder="nouveau mot de passe">
	 <input type="submit" value="ok">
</form>