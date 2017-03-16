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

	<link rel="stylesheet" href="css/popup.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/navbar.css" type="text/css" />
	<link rel="stylesheet" href="css/footer.css" type="text/css" />
	<link rel="stylesheet" href="css/question.css" type="text/css" />
	<link rel="stylesheet" href="css/chat.css" type="text/css" />

	<script type="text/javascript" src="ressources/jquery.js"></script>
	<script type="text/javascript" src="script.js"></script>

</head>
<body>

	<!-- POPUP LOGIN -->
	<div class="popupConnect">
		<div class="p">
			<h2>Se Connecter</h2>
			<form method="post" action="user/login.php">
				<p><input type="text" name="pseudo" placeholder="pseudo"/></p>
				<p><input type="password" name="password" placeholder="password"/></p>
				<p><input type="submit" value="ok" /></p>
			</form>
			<a class="identifiant" onclick="sendIdentifiant()">Me renvoyer mes identifiants</a>
			<button class="connect" onclick="loadInscriptionConnect()">M'inscrire</button>
		</div>
		<a class="close" onclick="closeConnect()">X</a>
	</div>
	<!-- END OF POPUP LOGIN -->

	<!-- POPUP SUBSCRIBE -->
	<div class="popupInscription">
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
	</div>
	<!-- POPUP SUBSCRIBE -->

	<!-- POPUP SENDMAIL ? -->
	<div class="sendIdentifiant">
		<form method="post" action="user/sendMail.php">
			<p><input type="email" name="mail" placeholder="email"/></p>
			<p><input type="submit" value="ok"/></p>
		</form>
			<a class="close" onclick="closeSendInscription()">X</a>
	</div>
	<!-- END OF POPUP SENDMAIL ? -->

		<!-- NAVIGATION -->
		<nav id="nav">
		  <div class="container">
		    <div class="row">
		      <div class="twelve col">
		        <a id="logo" class="pull-left"></a>
						<?php if (!$_SESSION["pseudo"]){?>
							<a onClick="loadInscription()" class="button -round pull-right -line-primary">S'inscrire</a>
							<a onClick="loadConnect()" class="button -round pull-right -line-primary">Se connecter</a>
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

		<div class="container">
			<div class="row">
				<div id="videoWrapper">
					<iframe width="560" height="349" src="https://www.youtube.com/embed/txcWDy_3xS8?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
				</div>
				<div id="tchatF">
					<div id="tchat">
						<?php $msg = get_all_message();foreach ($msg as $val) echo $val; ?>
					</div>
					<script type="text/javascript">var x = document.getElementById('tchat');
					 x.scrollTop = x.scrollHeight;</script>
					<?php if ($_SESSION["id"]){?>
						<div id="tchatForm">
							<form method="post" action="#">
								<div class="merge -horizontal -large">
									<input class="tchatArea" type=”text" placeholder="Ton texte..." />
									<button class="button -primary -only-icon">
										<i class="icon -paper-plane"></i>
									</button>
								</div>
								</div>
							</form>
						</div>
					<?php }
					else
					 echo "<button class='connect' onClick='loadConnect()'> Connectez-vous pour acceder au tchat</button>";
								 ?>
				</div>
				<div id="questionF">
					<div class="row">
						<h6> QUESTIONS DU LIVE</h6>
						<div id="affQ">
							<?php $question = get_all_question_answer(1);$i = 0;while ($question[$i]["id"] > 0){echo "<div id=n".$question[$i]["id"]."><h4>".$question[$i++]["question"]." <a  ><i class=\"icon -check\"></i></a></h4></div>";}?>
							<?php $question = get_all_question(1);$i = 0;while ($question[$i]["id"] > 0){echo "<div id=n".$question[$i]["id"]."><h4>".$question[$i]["question"]." <a  onclick=\"upvote(".$question[$i]["id"].")\"><i class=\"icon -chevron-up\"></i></a></h4><p> votes ".$question[$i++]["upvote"]."</p></div>";}?>
						</div>
						<?php if ($_SESSION["id"]){?>
							<div id="questionForm">
								<form method="post" action="#">
									<textarea name="question"></textarea>
									<input type="submit" value="enter"/>
								</form>
							</div><?php } else echo "<button class='connect' onClick='loadConnect()'> Connectez-vous pour poser votre question</button>";
								  ?>
					</div>
				</div>
				<?php echo get_footer(); ?>
</body>
