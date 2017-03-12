<?php

function insert_question($id_user, $question, $id_session){
	include "../connexion.php";

	$insert = "INSERT INTO questions (id_user, question, upvote, id_session) VALUES ('$id_user', '$question', '0', '$id_session')";
	$result = pg_query($dbconnect, $insert);
	return $insert;
}

function insert_upvote($id_user, $id_q){
	include "../connexion.php";
	
	$insert = "INSERT INTO upvotes (id_user, id_q) VALUES ($id_user, $id_q)";
	$result	= pg_query($dbconnect, $insert);
	$insert = "UPDATE questions SET upvote=upvote+1 WHERE id_q='$id_q'"; 
	$result = pg_query($dbconnect, $insert);
	return $insert;

}

function insert_upvote_question_no_user($id_q){
	include "connexion.php";
	
	$insert = "UPDATE questions SET upvote=upvote+1 WHERE id_q='$id_q'"; 
	$result = pg_query($dbconnect, $insert);
}

function get_last_question(){
	include "../connexion.php";
	include "connexion.php";

	$select = "SELECT id_q FROM questions ORDER BY id_q DESC LIMIT 1";

	$result = pg_query($dbconnect, $select);
	$last = pg_fetch_row($result);


	return $last[0];
}

function get_question($id_q){
include "connexion.php";

	$select = "SELECT question FROM questions WHERE id_q=$id_q";
	$result = pg_query($dbconnect, $select);
	$question = pg_fetch_row($result);

	return $question[0];

}
function get_all_question($id_session){
include "connexion.php";
include "../connexion.php";

	$select = "SELECT * FROM questions WHERE id_session='$id_session ' ORDER BY upvote DESC";
	$result = pg_query($dbconnect, $select);
	$quest = array();
	$i = 0;
	while($question = pg_fetch_row($result)){
		$quest[$i]["id"] = $question[0];
		$quest[$i]["question"] = $question[2];
		$quest[$i++]["upvote"] = $question[3];
	}

	return $quest;

}

function get_nb_upvote_question($id_q){
	include "connexion.php";

	$select = "SELECT upvote FROM questions WHERE id_q=$id_q";
	$result = pg_query($dbconnect, $select);
	$nb_upvote = pg_fetch_row($result);

	return $nb_upvote[0];
}

function get_id_who_ask($id_q){
	include "connexion.php";

	$select = "SELECT id_user FROM questions WHERE id_q = $id_q";
	$result = pg_query($dbconnect, $select);
	$id_ask = pg_fetch_row($result);

	return $id_ask[0];
}


?>