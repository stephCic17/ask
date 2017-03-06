<?php
function insert_message($id_user, $message){
	include "connexion.php";

	$insert = "INSERT INTO tchat(id_user, message) VALUES ('$id_user', '$message')";
	$result = pg_query($dbconnect, $insert);
	
}


function get_last_message(){
	include "connexion.php";
	
	$select = "SELECT id_message FROM tchat ORDER BY id_message DESC LIMIT 1";
	$result = pg_query($dbconnect, $select);
	$last = pg_fetch_row($result);

	return $last[0];
}

