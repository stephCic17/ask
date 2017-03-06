<?php
include "../connexion.php";
include "Users.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		
		<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" />
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
																 
		<script type="text/javascript" src="../ressources/jquery.js"></script>
		<script type="text/javascript" src="user.js"></script>
	</head>
	<body>
																 
		<div id="contener">
		<div id="login">
			<form method="post" action="#">				
				<input type="text" name="pseudo" placeholder="login"/>
				<input type="password" name="password" placeholder="password"/>
				<input type="submit" value="ok">
			</form>
		</div>
		</div>
	</body>
</html>
	
