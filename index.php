<?php

include "connexion.php";
include "tchat/tchat.php";
include "user/Users.php";
include "question/Questions.php";

session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

	<head>

		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/popup.css" type="text/css" media="screen" />
		<script type="text/javascript" src="ressources/jquery.js"></script>
		<script type="text/javascript" src="tchat/tchat.js"></script>
	
		<script type="text/javascript" src="user/popup.js"></script>

		<script type="text/javascript">
		<?php
		 $data =  get_last_message();
		 ?>
		 var lastid = <?php echo $data; ?>;
		 var popupActive = 0;
		</script>

	</head>
	<body>
		<nav id='nav'>
			<div class="container">
				<ul>
					<li><a href="" id="logo" ui-sref="nav.home"><img src="assets/imgs/jpg/CiconiaLogo.png" width="150px"/></a></li>
					<li><?php if (!$_SESSION["pseudo"]){?><a href="#" onClick="loadInscription()" class="cta touch button half-right -big -round -line-grey-lighten-5">S'inscrire</a><?php } ?></li>
					<li><?php if (!$_SESSION["pseudo"]){?><a href="#" onClick="loadConnect()" class="cta touch button half-right -big -round -line-grey-lighten-5">Se Connecter</a>
						<?php }
						else{?>
						<a href="user/disconnect.php"  class="cta touch button half-right -big -round -line-grey-lighten-5">Se Deconnecter</a><?php } ?></li>
					<li><a id="link" ui-sref-active="active" class="uppercase center">Live</a></li>
					<li><a id="link" ui-sref-active="active" ui-sref="nav.home" class="uppercase center">Accueil</a></li>
				</ul>
			</div>
		</nav>
		<div class="popupConnect">
			<h2>Se Connecter</h2>
			<a href="#" onclick="closeConnect()">X</a>
			<form method="post" action="user/login.php">
				<input type="text" name="pseudo" placeholder="login"/>
				<input type="password" name="password" placeholder="password"/>
				<input type="submit" value="ok">
			</form>
		</div>
		<div class="popupInscription">
			<a href="#" onclick="closeInscription()">X</a>
			<h2>S'inscrire</h2>
			<form method="post" action="user/create_account.php">
				<input type="text" name="first" placeholder="firstname">
				<input type="text" name="last" placeholder="lastname">
				<input type="email" name="mail" placeholder="mail">
				<input type="text" name="pseudo" placeholder="login"/>
				<input type="password" name="password" placeholder="password"/>
				<input type="submit" value="ok">
			</form>
		</div>
		<h1> Tchat</h1>
		<div id="tchatF">

			<div id="tchat">
				<?php
				$msg = get_all_message();
				foreach ($msg as $val)
				echo $val;
				?>

			<div id="tchatForm">
				<form method="post" action="#">
					<textarea name="message"></textarea>
					<input type="submit" value="enter"/>
			</div>
			</div>
			<script>
			var x = document.getElementById('tchatF');
			x.scrollTop = x.scrollHeight;
			</script>

	</body>
		
