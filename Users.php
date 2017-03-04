<?php

function get_mail_user($id_user){
	include "connexion.php";

	$select = "SELECT mail FROM users WHERE id_user = $id_user";
	$result = pg_query($dbconnect, $select);
	$mail = pg_fetch_all($result);

	return $mail;
}

function get_lastname_user($id_user){
	include "connexion.php";	

	$select = "SELECT lastname FROM users WHERE id_user = $id_user";
	$result = pg_query($dbconnect, $select);
	$lastname = pg_fetch_row($result);

	return $lastname;
}


function get_firstname_user($id_user){
	include "connexion.php";	

	$select = "SELECT firstname FROM users WHERE id_user = $id_user";
	$result = pg_query($dbconnect, $select);
	$firstname = pg_fetch_row($result);

	return $firstname;
}

function get_password_user($id_user){
	include "connexion.php";

	$select = "SELECT password FROM users WHERE id_user = $id_user";
	$result = pg_query($dbconnect, $select);
	$password = pg_fetch_row($result);

	return $password;
}

function insert_user($lastname, $firstname, $mail, $password){
	include 'connexion.php';

	$date_inscription = new Date()//function to transform date if doesnt work
	$pass = ;//Hash password


	$insert = "INSERT INTO users (lastname, firstname, mail, password, date_inscription, upvote) VALUES ($lastname, $firstname, $mail, $pass_hash, $date_inscription, 0)";

	$result = pg_query($dbconnect, $insert);
}

