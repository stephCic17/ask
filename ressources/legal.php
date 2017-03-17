<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"/>
<head>
  <meta http-equiv="Content-Type" content="text/html"/>
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="css/popup.css" type="text/css" media="screen" />
  <script type="text/javascript" src="ressources/jquery.js"></script>
  <script type="text/javascript" src="script.js"></script>
  <script type="text/javascript">
  </script>
</head>
<body id="body">
  <div class="popupConnect">
	<div class="p">
	  <h2>Se Connecter</h2>
	  <form method="post" action="user/login.php">
		<p><input type="text" name="pseudo" placeholder="pseudo"/></p>
		<p><input type="password" name="password" placeholder="password"/>
		<p><input type="submit" value="ok"></p>
	  </form>
	</div>
	<a class="close" onclick="closeConnect()">X</a>
  </div>
  <div class="popupInscription">
	<div class="p">
	  <h2>S'inscrire</h2>
	  <form method="post" action="user/create_account.php">
		<p><input type="text" name="first" placeholder="firstname"></p>
		<p><input type="text" name="last" placeholder="lastname"></p>
		<p><input type="email" name="mail" placeholder="mail"></p>
		<p><input type="text" name="pseudo" placeholder="pseudo"/></p>
		<p><input type="password" name="password" placeholder="password"/></p>
		<p><input type="submit" value="ok"></p>
	  </form>
	</div>
	<a class="close" onclick="closeInscription()"> X</a>
  </div>
  <nav id='nav'>
	<ul>
	  <li><a href="" id="logo" ui-sref="nav.home"><img src="assets/imgs/jpg/CiconiaLogo.png" width="150px"/></a></li>
	  <li><?php if (!$_SESSION["pseudo"]){?><a href="#" onClick="loadInscription()" class="cta touch button half-right -big -round -line-grey-lighten-5">S'inscrire</a><?php } ?></li>
	  <li><?php if (!$_SESSION["pseudo"]){?><a href="#" onClick="loadConnect()" class="cta touch button half-right -big -round -line-grey-lighten-5">Se Connecter</a><?php }else{?>
	  <a href="user/disconnect.php"  class="cta touch button half-right -big -round -line-grey-lighten-5">Se Deconnecter</a><?php } ?></li>
	  <li><a id="link" ui-sref-active="active" class="uppercase center">Live</a></li>
	  <li><a id="link" ui-sref-active="active" ui-sref="nav.home" class="uppercase center">Accueil</a></li>
	</ul>
	</nav>
	  <div class="containerLegal">
	  <div id="legalHeader">
	  <h1>Mentions légales</h1>
	</div>
	  <div class="articleLegalNb">
	  <h3>Article 1</h3>
	  <p class="articleLegal"></p>
	</div>
	</div
	</body>
