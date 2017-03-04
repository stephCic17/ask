<?php

function add_answer_tchat($answer, $id_user){
	$date_answer = new Date();
	$hours = new Date();

	$insert = "INSERT INTO tchat (id_user, answer, date_answer, hours) VALUE ($id_user, $answer, $date_answer, $hours)";
	$result	= pg_query($dbconnect, $insert);

}

function get_tchat_day($day){
	$select = "SELECT answer FROM tchat WHERE date_answer = $day";
	$result = pg_query($dbconnect, $select);

//A revoir
	foreach (($answer = pg_fetch_row($result))) {
			$tab_answer = $answer[0];
	}

	return $tab_answer;
}

function get_tchat_user($id_user){
	$select = "SELECT answer FROM tchat WHERE id_user = $id_user ";
	$result = pg_query($dbconnect, $select);

foreach (($answer = pg_fetch_row($result))) {
			$tab_answer = $answer[0];
	}

	return $tab_answer;

}

