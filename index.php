<?php

include "connexion.php";
include "Questions.php";


print_r(get_nb_upvote_question(2));


/*

insert_question OK
insert_upvote OK miss insert upvote to user
insert_upvote_question_no_user OK
get_last_question OK
get_question OK
get_nb_upvote_question OK

*/