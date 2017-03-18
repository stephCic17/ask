<?php
session_start();

?>
<?php

include "../connexion.php";
include "../tchat/tchat.php";
include "Users.php";
include "../question/Questions.php";
include "../function.php";

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"/>
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<meta http-equiv="Content-Type" content="text/html"/>
	
	<title>Ciconia</title>
	<meta name="author" content="Ciconia"/>
	<meta name="description" content="Ciconia est une application calendrier de grossesse personnalisé"/>
	<meta name="keywords" content="grossesse, timeline"/>

	<link rel="icon" href="../assets/imgs/favicon.ico">

	<link rel="stylesheet" href="../css/style.css" type="text/css" />
	<link rel="stylesheet" href="../css/content.css" type="text/css" />
	<link rel="stylesheet" href="../css/modal.css" type="text/css" />
	<link rel="stylesheet" href="../css/navbar.css" type="text/css" />
	<link rel="stylesheet" href="../css/footer.css" type="text/css" />
	<link rel="stylesheet" href="../css/question.css" type="text/css" />
	<link rel="stylesheet" href="../css/chat.css" type="text/css" />
	<link rel="stylesheet" href="../css/videoWrapper.css" type="text/css" />

	<script type="text/javascript" src="../ressources/jquery.js"></script>
	<script type="text/javascript" src="user.js"></script>
	
</head>
<body>
	
	<!-- POPUP LOGIN -->
	<div id="loginModal" class="modal login">
		<div class="overlay close-modal"></div>
		<div class="content">
			<div class="card content-wrapper">
				<div class="close-button close-modal">
					<i class="icon -cross"></i>
				</div>
				<div>
					<h5>Se connecter</h5>
					<form method="post" action="login.php">
						<fieldset class="-large -has-icon">
							<i class="icon -user"></i>
							<input name="name" type="text" placeholder="Pseudo" />
						</fieldset>
						<fieldset class="-large -has-icon">
							<i class="icon -lock"></i>
							<input name="password" type="password" placeholder="Mot de passe" />
						</fieldset>
						<button type="submit" class="button -large -primary">
							<span>Se connecter</span>
						</button>
					</form>
					<footer>
						<a class="open-subscribe-modal">S'inscrire</a> -
						<a class="open-lostpassword-modal">Mot de passe perdu ?</a>
					</footer>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF POPUP LOGIN -->
	
	<!-- POPUP SUBSCRIBE -->
	<div id="subscribeModal" class="modal login -subscribe">
		<div class="overlay close-modal"></div>
		<div class="content">
			<div class="card content-wrapper">
				<div class="close-button close-modal">
					<i class="icon -cross"></i>
				</div>
				<div>
					<h5>Inscription</h5>
					<div class="two-cols-verticaly-aligned">
						<div class="wrapper">
							<form method="post" action="create_account.php">
								<fieldset class="-large -has-icon ">
									<i class="icon -user"></i>
									<input name="pseudo" type="name" placeholder="Pseudo" />
								</fieldset>
								<fieldset class="-large -has-icon ">
									<i class="icon -user"></i>
									<input name="mail" type="name" placeholder="Email" />
								</fieldset>
								<fieldset class="-large -has-icon">
									<i class="icon -lock"></i>
									<input name="password" type="password" placeholder="Mot de passe" />
								</fieldset>
								<button class="button -large -primary">
									<span>S'inscrire</span>
								</button>
							</form>
						</div>
						<div class="wrapper why">
							<img class="image" src="../assets/imgs/svg/egg.svg"></img>
							<label>Pourquoi créer un compte</label>
							<p>Pendant les emissions de Ciconia, avoir un compte vous permet de réagir en temps réel et de poser des questions à l'avance.</p>
						</div>
					</div>
					<footer>
						<a class="open-login-modal">Se connecter</a> -
						<a class="open-lostpassword-modal">Mot de passe perdu ?</a>
					</footer>
				</div>
			</div>
		</div>
	</div>
	<!-- POPUP SUBSCRIBE -->
	
	<!-- POPUP SENDMAIL ? -->
	<div id="lostPasswordModal" class="modal login">
		<div class="overlay close-modal"></div>
		<div class="content">
			<div class="card content-wrapper">
				<div class="close-button close-modal">
					<i class="icon -cross"></i>
				</div>
				<div>
					<h5>Mot de passe perdu ?</h5>
					<form method="post" action="sendMail.php">
						<fieldset class="-large -has-icon">
							<i class="icon -user"></i>
							<input name="email" type="text" placeholder="Email" />
						</fieldset>
						<button type="submit" class="button -large -primary">
							<span>Envoyer !</span>
						</button>
					</form>
					<footer>
						<a class="open-login-modal">Se connecter</a> -
						<a class="open-subscribe-modal">S'inscrire</a>
					</footer>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF POPUP SENDMAIL ? -->
<!-- NAVIGATION -->
	<nav id="nav">
		<div class="container">
	    <div class="row">
	      <div class="twelve col">
	        <a id="logo" class="pull-left"></a>
	<?php if (!$_SESSION["pseudo"]){?>
		<a class="button -round pull-right -line-primary open-subscribe-modal">S'inscrire</a>
		<a class="button -round pull-right -line-primary open-login-modal">Se connecter</a>
	<?php } else { ?>
		<a href="disconnect.php" class="button -round pull-right -line-primary pull-right">Se déconnecter</a>
<?php } ?>
<a href="#" class="link pull-right">Live</a>
<a href="/" class="link pull-right">Accueil</a>
      </div>
    </div>
  </div>
</nav>	
<!-- END OF NAVIGATION -->
<div id="content">
					<?php if ($_SESSION["pseudo"]){
						echo "<script> document.location.href=\"http://ciconia.io/ask\"</script>";}?>
					<h1>Choisissez un autre pseudo</h1>
					<fieldset class="-large -has-icon">
						<div id="UserForm">
							<form method="post" action="#">			
				<input type="text"  name="login" />
				<input type="submit" value="enter"/>
						</div>
</body>
</html>
