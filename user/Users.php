<?php

function change_password_user($id, $pass){
	include "../connexion.php";
	$select = "SELECT date_inscription FROM users WHERE id_user='$id'";
	$result = pg_query($dbconnect, $select);
	$date = pg_fetch_row($result);

	$date_inscription = $date[0];

	$password = hash('whirlpool', $date_inscription.$pass);
	$update = "UPDATE users SET password='$password' WHERE id_user='$id'";
	$result = pg_query($dbconnect, $update);
	$res = pg_fetch_row($result);
	return $update;
}

function get_date_inscription($id){
	include "../connexion.php";
	$select = "SELECT date_inscription FROM users WHERE id_user='$id'";
	$result = pg_query($dbconnect, $select);
	$date = pg_fetch_row($result);
	return $date[0];
}

function get_id_with_mail($mail){
	include "../connexion.php";

	$select = "SELECT id_user FROM users WHERE mail='$mail'";
	$result = pg_query($dbconnect, $select);
	$mail = pg_fetch_row($result);
	return $mail[0];
	
}

function get_mail_user($id_user){
	include "../connexion.php";

	$select = "SELECT mail FROM users WHERE id_user = '$id_user'";
	$result = pg_query($dbconnect, $select);
	$mail = pg_fetch_row($result);

	return $mail[0];
}

function get_lastname_user($id_user){
	include "../connexion.php";	

	$select = "SELECT lastname FROM users WHERE id_user = $id_user";
	$result = pg_query($dbconnect, $select);
	$lastname = pg_fetch_row($result);

	return $lastname[0];
}


function get_firstname_user($id_user){
	include "../connexion.php";	

	$select = "SELECT firstname FROM users WHERE id_user = $id_user";
	$result = pg_query($dbconnect, $select);
	$firstname = pg_fetch_row($result);

	return $firstname[0];
}

function test_password_user($id_user, $passwordtest){
	include "../connexion.php";

	$select = "SELECT * FROM users WHERE id_user='$id_user'";
	$result = pg_query($dbconnect, $select);
	$password = pg_fetch_row($result);
	$pass = hash('whirlpool', $password[5].$passwordtest);
	if($pass == $password[7])
		return 1;
	else
		return 0;
}
function get_pseudo_user($id_user){
	include "../connexion.php";
	include "connexion.php";
	session_start();
		
	$select = "SELECT login FROM users WHERE id_user='$id_user'";
	$result = pg_query($dbconnect, $select);
	$password = pg_fetch_row($result);

	return $password[0];
}

function insert_user($mail, $password, $login){
	include '../connexion.php';
	date_default_timezone_set('UTC');
	
	$date_inscription = time();
	$pass = hash('whirlpool', $date_inscription.$password);


	$insert = "INSERT INTO users (mail, password, date_inscription, upvote, login) VALUES ( '$mail', '$pass', '$date_inscription', '0', '$login')";

	$result = pg_query($dbconnect, $insert);

	return $insert;
}

function test_pseudo($pseudo){
	include "../connexion.php";

	$select = "SELECT login FROM users WHERE login='$pseudo'";
	$result = pg_query($dbconnect, $select);
	$login = pg_fetch_row($result);

	if($login[0] == $pseudo)
		return 1;
	else
		return 0;
}

function get_id_user($pseudo){
	include "../connexion.php";
	include "connexion.php";

	$select = "SELECT id_user FROM users WHERE login = '$pseudo'";
	$result = pg_query($dbconnect, $select);
	$id = pg_fetch_row($result);
	
	return $id[0];
}