<?php
include "../connexion.php";
include "tchat.php";

$d = array();

extract ($_POST);
if ($_POST["action"] == "addMessage"){
	insert_message(1,$message);
	$d["erreur"] = "ok";
}

if ($_POST["action"] == "getMessage"){
	$insertmsg = "SELECT * FROM tchat WHERE id_message > $lastid ORDER BY id_message ASC";
	$res = pg_query($dbconnect, $insertmsg);
	$d["result"] = "";
	$d["lastid"] = $lastid;
	while (($msg = pg_fetch_row($res))){
		$d["result"] .= '<b>'.$msg[1].':'.$msg[2].'</b><br />';
		$d["lastid"] = $msg[0];
	}
	$d["erreur"] = "ok";
}
echo json_encode($d);
?>