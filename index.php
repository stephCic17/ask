<?php

include "connexion.php";
include "tchat/tchat.php";
include "user/Users.php";
include "question/Questions.php";
include "footer.php";

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

	<link rel="icon" href="assets/imgs/favicon.ico">
	<script type="text/javascript" src="ressources/jquery.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/content.css" type="text/css" />
	<link rel="stylesheet" href="css/modal.css" type="text/css" />
	<link rel="stylesheet" href="css/navbar.css" type="text/css" />
	<link rel="stylesheet" href="css/footer.css" type="text/css" />
	<link rel="stylesheet" href="css/question.css" type="text/css" />
	<link rel="stylesheet" href="css/chat.css" type="text/css" />
	<link rel="stylesheet" href="css/videoWrapper.css" type="text/css" />


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
					<form method="post" action="user/login.php">
						<fieldset class="-large -has-icon">
							<i class="icon -user"></i>
							<input name="name" type="text" placeholder="Pseudo" onblur="test_invalid_pseudo(this)"/>
						</fieldset>
						<fieldset class="-large -has-icon">
							<i class="icon -lock"></i>
							<input name="password" type="password" placeholder="Mot de passe" />
						</fieldset>
						<button type="submit" id="btn-connect" class="button -large -primary">
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
							<form method="post" action="user/create_account.php">
								<fieldset class="-large -has-icon ">
									<i class="icon -user"></i>
									<input name="pseudo" type="name" placeholder="Pseudo" onblur="test_valid_pseudo(this)" />
								</fieldset>
								<fieldset class="-large -has-icon ">
									<i class="icon -user"></i>
									<input name="mail" type="name" placeholder="Email" onblur="test_valid_mail(this)"/>
								</fieldset>
								<fieldset class="-large -has-icon">
									<i class="icon -lock"></i>
									<input name="password" type="password" placeholder="Mot de passe" />
								</fieldset>
								<button id="btn-subscribe" class="button -large -primary">
									<span>S'inscrire</span>
								</button>
							</form>
						</div>
						<div class="wrapper why">
							<img class="image" src="assets/imgs/svg/egg.svg"></img>
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
					<form method="post" action="user/sendMail.php">
						<fieldset class="-large -has-icon">
							<i class="icon -user"></i>
							<input name="email" type="text" placeholder="Email" onblur="test_valid_mail_send(this)"/>
						</fieldset>
						<button id="btn-sendMail" type="submit" class="button -large -primary">
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
							<a href="user/disconnect.php" class="button -round pull-right -line-primary pull-right">Se déconnecter</a>
						<?php } ?>
						<a href="#" class="link pull-right">Live</a>
						<a href="https://ciconia.io" class="link pull-right">Accueil</a>
					</div>
				</div>
			</div>
		</nav>
		<!-- END OF NAVIGATION -->
		<div id="content">
			<div class="container">
				<!-- VIDEO WRAPPER -->
				<div id="videoWrapper">
					<iframe width="560" height="349" src="https://www.youtube.com/embed/txcWDy_3xS8?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
					<?php if (test_flag_video() == 0){ ?>
					<figure id="noActiveLive" class="filter -blur -example">
						<figcaption>
							<div class="egg"></div>
							<h6 class="title">Pas de live en cours</h6>
							<span class="desc">Retrouve-nous le 23 mars a 21h ! Sur le theme de l'accouchement</span>
				      </figcaption>
				    </figure>
					<?php } ?>
				</div>
				<!-- END OF VIDEO WRAPPER -->
				
				<!-- CHAT WRAPPER -->
				<div class="chat-wrapper" id="tchatF">
					<div class="chat" id="tchat">
						<script>getMessage(); </script>
					</div>
					<?php if ($_SESSION["id"]){ ?>
						<div id="tchatForm">
							<form method="post" action="#">
								<div class="merge -horizontal -large">
									<input class="tchatArea" type=”text" placeholder="Ton texte..." />
									<button class="button -primary -only-icon">
										<i class="icon -paper-plane"></i>
									</button>
								</div>
							</form>
						</div>
					<?php } else echo "<button class='button -primary -large open-login-modal'> Connectez-vous pour acceder au tchat</button>"; ?>
				</div>
				<!-- END OF CHAT WRAPPER -->
				
			<!-- QUESTION WRAPPER -->
				<div class="container">
					<div class="question-wrapper" id="questionF">
						<h6>
							<i class="icon -archive"></i>
							QUESTIONS DU LIVE
						</h6>
					<div id="affQ">
						<script>getQuestion();</script>
					</div>
					<?php if ($_SESSION["id"]){?>
						<div class="message -with-intent -line-primary" id="questionForm">
							<i class="icon -bubble-heart"></i>
							<h5>Posez votre question</h5>
							<form method="post" action="#">
								<div class="merge -horizontal">
									<input name="question" type=”text" placeholder="Ton texte..." />
									<button type="submit" class="button -primary -only-icon question-button">
										Entrer
									</button>
								</div>
							</form>
						</div><?php } else echo "<button class='button -primary -large open-login-modal'> Connectez-vous pour poser votre question</button>";
							  ?>
				</div>
			</div>
			<!-- QUESTION WRAPPER -->
			<?php echo get_footer(); ?>
		</div>
</body>
<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
						  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
 ga('create', 'UA-93939676-1', 'auto');
 ga('send', 'pageview'); 
</script>
