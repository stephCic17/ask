<?php

include "connexion.php";
include "tchat.php";

echo "toto";
$select = "SELECT * FROM tchat WHERE id_message > 46 ORDER BY id_message ASC";
print_r($select);
	$res = pg_query($dbconnect, $select);
$test = pg_fetch_row($res);

	print_r($test);
?>

<?php

/*
Question and upvote:

insert_question OK
insert_upvote OK miss insert upvote to user
insert_upvote_question_no_user OK
get_last_question OK
get_question OK
get_nb_upvote_question OK

*/

/*

Users:

insert_user OK
get_mail_user OK
get_firstname_user OK
get_lastname OK
get_password OK
