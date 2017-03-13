<?php

include "connexion.php";
include "tchat/tchat.php";
include "user/Users.php";
include "question/Questions.php";


session_start();
//$msg = get_all_message();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
		  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"/>
	<head>
	<meta http-equiv="Content-Type" content="text/html"/>
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/popup.css" type="text/css" media="screen" />
		<script type="text/javascript" src="ressources/jquery.js"></script>
		<script type="text/javascript" src="tchat/tchat.js"></script>	
		<script type="text/javascript">
		<?php
		 $data =  get_last_message();
		 $dataQ =  get_last_question();
		 ?>
		 var lastid = <?php echo $data; ?>;
		 var lastidQ = <?php echo $dataQ; ?>;
		 var popupActive = 0;
		</script>

	</head>
	<body>
		<div class="container">
		<nav id='nav'>
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
			<div>

			</div>
			<div class="row">
				<div>
					<p>Video</p>
				</div>
			<div id="tchatF">
			<h1> Tchat</h1>		
				<div id="tchat">	

				</div>
				<div id="tchatForm">
					<form method="post" action="#">
						<textarea name="message"></textarea>
						<input type="submit" value="enter"/>
					</form>
				</div>
			</div>
			</div>
			<div id="questionF">
				<h1> Question</h1>		
			<div id="affQ">
				<?php 
				$question = get_all_question(1);
				$i = 0;
				while ($question[$i]["id"] > 0)
				{
					echo "<div id=".$question[$i]["id"]."><p>".$question[$i]["question"]." upvote ".$question[$i]["upvote"]."<a href=\"#\" onclick=\"upvote(".$question[$i++]["id"].")\"><i class=\"icon -chevron-up\"></i></a></div>";
				}
				?>
			</div>
			<div id="questionForm">
				<form method="post" action="#">
					<textarea name="question"></textarea>
					<input type="submit" value="enter"/>
				</form>
			</div>
														</div>
	</body>
	
