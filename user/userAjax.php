<?php
include "../connexion.php";
include "Users.php";
$d = array();
session_start();
extract($_POST);
if ($_POST["action"] == "Testlogin"){
	$testPseudo = test_pseudo($pseudo);
	if ($testPseudo != NULL && $pseudo == $testPseudo){
		$id = get_id_user($pseudo);
		$d["erreur"] = $id;
		
	}
	else
		$d["erreur"] = $testPseudo;
}
echo json_encode($d);
?>