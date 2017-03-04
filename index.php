<?php

include "connexion.php";
include "Questions.php";
include "Users.php";

print_r(get_password_user(5));


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
