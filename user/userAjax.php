<?php
include "../connexion.php";
include "Users.php";
session_start();
$d = array();

extract ($_POST);
if ($_POST["action"] == "TestPseudo"){
	if (test_pseudo($login) == 0){		
		$d["erreur"] = "ok";
		extract($_SESSION);
		insert_user(htmlentities($last,ENT_QUOTES, "UTF-8") , htmlentities($first, ENT_QUOTES, "UTF-8"), htmlentities($mail. ENT_QUOTES, "UTF-8"), htmlentities($password, ENT_QUOTES, "UTF-8"), htmlentities($login, ENT_QUOTES, "UTF-8"));
		$_SESSION["pseudo"] = $login;
		$_SESSION["id"] = get_id_user($pseudo);
	}
	else
		$d["erreur"] = "KO";
}

if ($_POST["action"] == "TestPseudoInput"){
	if (test_pseudo($login) == 0)
		$d["erreur"] = "ok";
	else
		$d["erreur"] = "KO";
}
echo json_encode($d);
?>