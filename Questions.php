<?php

function insert_question($id_user, $question){
	include "connexion.php";

	$insert = "INSERT INTO questions (id_user, question, upvote) VALUES ($id_user, $_question, 0)";
	$result = pg_query($dbconnect, $insert);
}

function insert_upvote_case($id_user, $id_q){
	include "connexion.php";
	
	$insert = "INSERT INTO upvotes (id_user, id_q) VALUES ($id_user, $id_q)";
	$result	= pg_query($dbconnect, $insert);
	add_upvote_db($id_user, $id_q);
}

function add_upvote_db($id_user, $id_q){
	include "connexion.php";

	$insert = "ALTER TABLE questions WHERE id=$id_q SET upvote = upvote+1";
	$result = pg_query($dbconnect, $insert);

	$insert = "ALTER TABLE users WHERE id=$id_user SET upvote = upvote+1";
	$result = pg_query($dbconnect, $insert);
}

function get_last_question(){
	include "connexion.php";

	$select = "SELECT LAST(id_q) FROM questions";
	$result = pg_query($dbconnect, $select);
	$last = pg_fetch_row($result);
	return $last;
}

function get_question($id_q){
include "connexion.php";

	$select = "SELECT question FROM questions WHERE id_q = $id_q";
	$result = pg_query($dbconnect, $select);
	$question = pg_fetch_row($result);

	return $question;

}

function get_nb_upvote_question($id_q){
	include "connexion.php";

	$select = "SELECT upvote FROM question WHERE id_q=$id_q";
	$result = pg_query($dbconnect, $select);
	$nb_upvote = pg_fetch_row($result);

	return $nb_upvote;
}

function get_id_who_ask($id_q){
	include "connexion.php";

	$select = "SELECT id_user FROM questions WHERE id_q = $id_q";
	$result = pg_query($dbconnect, $select);
	$id_ask = pg_fetch_row($result);

	return $id_ask;
}


?>