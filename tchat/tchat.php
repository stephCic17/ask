<?php
function insert_message($id_user, $message){
	include "../connexion.php";

	$insert = "INSERT INTO tchat(id_user, message) VALUES ('$id_user', '$message')";
	$result = pg_query($dbconnect, $insert);
	
}


function get_last_message(){
	include "../connexion.php";
	
	$select = "SELECT id_message FROM tchat ORDER BY id_message DESC LIMIT 1";
	$result = pg_query($dbconnect, $select);
	$last = pg_fetch_row($result);

	return $last[0];
}

function get_all_message(){
	include "../connexion.php";
	include "../user/Users.php";
		
	$allmsg = "SELECT * FROM tchat ORDER BY id_message DESC LIMIT 30";
	$res = pg_query($dbconnect, $allmsg);
	$i = 0;
	$data = array();
	while(($msg = pg_fetch_row($res))){
		$data[$i++] .= '<b>'.get_pseudo_user($msg[1]).':'.$msg[2].'</b><br />';
	}
	$j = 0;
	$i = count($data);
	while ($i > -1){
		$msg[$j++] = $data[$i--];
	}
	return $msg;
}