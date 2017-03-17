<?php

include "connexion.php";
include "tchat/tchat.php";
include "user/Users.php";
include "question/Questions.php";
include "function.php";

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

	<link rel="stylesheet" href="css/content.css" type="text/css" />
	<link rel="stylesheet" href="css/modal.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/navbar.css" type="text/css" />
	<link rel="stylesheet" href="css/footer.css" type="text/css" />
	<link rel="stylesheet" href="css/question.css" type="text/css" />
	<link rel="stylesheet" href="css/chat.css" type="text/css" />
	<link rel="stylesheet" href="css/videoWrapper.css" type="text/css" />

	<script type="text/javascript" src="ressources/jquery.js"></script>
	<script type="text/javascript" src="script.js"></script>

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
							<input name="name" type="text" placeholder="Pseudo ou email" />
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
						<a onclick="loadInscriptionConnect()">S'inscrire</a> -
						<a onclick="sendIdentifiant()">Mot de passe perdu ?</a>
					</footer>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF POPUP LOGIN -->

	<!-- POPUP SUBSCRIBE -->
	<!-- <div class="popupInscription">
		<div class="p">
			<h2>S'inscrire</h2>
			<form method="post" action="user/create_account.php">
				<p><input type="text" name="first" placeholder="firstname"/></p>
				<p><input type="text" name="last" placeholder="lastname"/></p>
				<p><input type="email" name="mail" placeholder="mail"/></p>
				<p><input type="text" name="pseudo" placeholder="pseudo"/></p>
				<p><input type="password" name="password" placeholder="password"/></p>
				<p><input type="submit" value="ok"/></p>
			</form>
			<button class="connect" onclick="loadConnectInscription()">Me Connecter</button>
		</div>
		<a class="close" onclick="closeInscription()"> X</a>
	</div> -->

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
							<fieldset class="-large -has-icon ">
								<i class="icon -user"></i>
								<input name="name" type="name" placeholder="Email" />
							</fieldset>
							<fieldset class="-large -has-icon">
								<i class="icon -lock"></i>
								<input name="password" type="password" placeholder="Mot de passe" />
							</fieldset>
							<button class="button -large -primary">
								<span>S'inscrire</span>
							</button>
						</div>
						<div class="wrapper why">
							<img class="image" src="assets/imgs/svg/egg.svg"></img>
							<label>Pourquoi créer un compte</label>
							<p>Pendant les emissions de Ciconia, avoir un compte vous permet de réagir en temps réel et de poser des questions à l'avance.</p>
						</div>
					</div>
					<footer>
						<a href="">Se connecter</a> -
						<a href="">Mot de passe perdu ?</a>
					</footer>
				</div>
			</div>
		</div>
	</div>
	<!-- POPUP SUBSCRIBE -->

	<!-- POPUP SENDMAIL ? -->
	<!-- <div class="sendIdentifiant">
		<form method="post" action="user/sendMail.php">
			<p><input type="email" name="mail" placeholder="email"/></p>
			<p><input type="submit" value="ok"/></p>
		</form>
			<a class="close" onclick="closeSendInscription()">X</a>
	</div> -->
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
						<a href="/" class="link pull-right">Accueil</a>
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
						<figure id="noActiveLive" class="filter -blur -example">
				      <figcaption>
				        <h6 class="title">Pas de live en cours</h6>
								<span class="desc">On revient bientôt !</span>
				      </figcaption>
				    </figure>
					</div>
					<!-- END OF VIDEO WRAPPER -->

					<!-- CHAT WRAPPER -->
					<div class="chat-wrapper" id="tchatF">
						<div class="chat" id="tchat">
							<?php $msg = get_all_message();foreach ($msg as $val) echo $val; ?>
						</div>
						<!-- <script type="text/javascript"> var x = document.getElementById('tchat');
						 x.scrollTop = x.scrollHeight; </script> -->
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
						<?php } else echo "<button class='button -large open-login-modal'> Connectez-vous pour acceder au tchat</button>"; ?>
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
					</div>
					<?php if ($_SESSION["id"]){?>
						<div id="questionForm">
							<form method="post" action="#">
								<textarea name="question"></textarea>
								<input type="submit" value="enter"/>
							</form>
						</div><?php } else echo "<button class='button -large open-login-modal'> Connectez-vous pour poser votre question</button>";
							  ?>
				</div>
			</div>
			<!-- QUESTION WRAPPER -->

			<?php echo get_footer(); ?>
		</div>

</body>
