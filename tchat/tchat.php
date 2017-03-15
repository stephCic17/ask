<?php
function insert_message($id_user, $message){
	include "../connexion.php";

	$timestamp = time();
	$insert = "INSERT INTO tchat(id_user, message, timestamp) VALUES ('$id_user', '$message', '$timestamp')";
	$result = pg_query($dbconnect, $insert);
}


function get_last_message(){
	include "../connexion.php";
	
	$select = "SELECT id_message FROM tchat ORDER BY id_message DESC LIMIT 1";
	$result = pg_query($dbconnect, $select);
	$last = pg_fetch_row($result);

	return $last[0];
}

function get_hour($timestamp){
	return date("H:i", $timestamp);
}

function get_all_message(){
	include "connexion.php";
	include "../user/Users.php";
		
	$allmsg = "SELECT * FROM tchat ORDER BY id_message DESC LIMIT 30";
	$res = pg_query($dbconnect, $allmsg);
	$i = 0;
	$data = array();
	while(($msg = pg_fetch_row($res)) && $i < 42){
		$data[$i++] .= '<div class="msg"><b>'.get_pseudo_user($msg[1]).'</b><p class="hour">'.get_hour($msg[3]).'</p><p class="tchatP">'.$msg[2].'</p></div>';
	}
	$i = count($data)-1;
	$j = 0;
	$ok = array();
	while ($i > -1)
		$ok[$j++] = $data[$i--];

	return $ok;
}