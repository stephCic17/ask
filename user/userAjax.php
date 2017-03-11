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
		insert_user($last, $first, $mail, $password, $login);
		$_SESSION["pseudo"] = $login;
		$_SESSION["id"] = get_id_user($pseudo);
	}
	else
		$d["erreur"] ="KO";
}


echo json_encode($d);
?>