<?php
include "../connexion.php";
include "tchat.php";
include "../user/Users.php";

session_start();

$d = array();
$d["erreur"] = "toto";
extract ($_POST);
if ($_POST){
if ($_POST["action"] == "addMessage"){
	if ($message != ""){
		$d["test"] = insert_message($_SESSION["id"],htmlentities($message, ENT_QUOTES, "UTF-8"));
		$d["erreur"] = "ok";
	}
}
$d["result"] = "";
if ($_POST["action"] == "getMessage"){
	$allmsg = "SELECT * FROM tchat ORDER BY id_message DESC LIMIT 30";
	$res = pg_query($dbconnect, $allmsg);
	$i = 0;
	$data = array();
	while(($msg = pg_fetch_row($res)) && $i < 42){
		$data[$i++] .= '<div class="msg"><b>'.get_pseudo_user($msg[1]).' </b><p class="hour"> '.get_hour($msg[3]).'</p><p class="tchatP">'.$msg[2].'</p></div>';
	}
	$i = count($data)-1;
	$j = 0;
	$ok = array();
	while ($i > -1)
		$d["result"].= $data[$i--];
	$d["erreur"] = "ok";
}
echo json_encode($d);
}
?>