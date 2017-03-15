<?php

include "connexion.php";
include "tchat/tchat.php";
include "user/Users.php";
include "question/Questions.php";
include "element.php";

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
		  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"/>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<meta http-equiv="Content-Type" content="text/html"/>
	<title>Ciconia</title>
	<link rel="stylesheet" href="css/popup.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />

	<script type="text/javascript" src="ressources/jquery.js"></script>
	<script type="text/javascript" src="script.js"></script>	
</head>
<body>
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
	<div class="sendIdentifiant">
		<form method="post" action="user/sendMail.php">
			<p><input type="email" name="mail" placeholder="email"/></p>
			<p><input type="submit" value="ok"/></p>
		</form>
			<a class="close" onclick="closeSendInscription()">X</a>
	</div>
		<nav id='nav'>
			<ul>
				<li><a id="logo" ui-sref="nav.home"><img src="assets/imgs/jpg/CiconiaLogo.png" width="150px"></a></li>
				<li><?php if (!$_SESSION["pseudo"]){?><a onClick="loadInscription()" class="cta touch button half-right -big -round -line-grey-lighten-5">S'inscrire</a><?php } ?></li>
				<li><?php if (!$_SESSION["pseudo"]){?><a onClick="loadConnect()" class="cta touch button half-right -big -round -line-grey-lighten-5">Se Connecter</a><?php }	else{?>
					<a href="user/disconnect.php"  class="cta touch button half-right -big -round -line-grey-lighten-5">Se Deconnecter</a><?php } ?></li>
				<li><a id="link" ui-sref-active="active" class="uppercase center">Live</a></li>
				<li><a id="link" ui-sref-active="active" ui-sref="nav.home" class="uppercase center">Accueil</a></li>
			</ul>
		</nav>
		<div class="container">
			<div class="row">
				<div id="flux">
					<img src="assets/imgs/jpg/amina.jpg"/>
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
</body>

	
