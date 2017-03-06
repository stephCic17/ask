<?php

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

function get_password_user($id_user){
	include "../connexion.php";

	$select = "SELECT password FROM users WHERE id_user = $id_user";
	$result = pg_query($dbconnect, $select);
	$password = pg_fetch_row($result);

	return $password[0];
}

function insert_user($lastname, $firstname, $mail, $password){
	include '../connexion.php';

	$date = new DateTime;
	$date_inscription = $date->format('d-m-Y');
	$pass = hash('whirlpool', $date_inscription.$password);


	$insert = "INSERT INTO users (lastname, firstname, mail, password, date_inscription, upvote) VALUES ('$lastname', '$firstname', '$mail', '$pass', '$date_inscription', '0')";

	$result = pg_query($dbconnect, $insert);

	return $insert;
}

function test_pseudo($pseudo){
	include "../connexion.php";

	$select = "SELECT pseudo FROM users WHERE pseudo='$pseudo'";
	$result = pg_query($dbconnect, $select);
	$pseudo = pg_fetch_row($result);

	return $pseudo[0];
}

function get_id_user($pseudo){
	include "../connexion.php";

	$select = "SELECT id_user FROM users WHERE pseudo = '$pseudo'";
	$result = pg_query($dbconnect, $select);
	$id = pg_fetch_row($result);

	return $id[0];
}