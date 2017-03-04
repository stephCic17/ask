File Question.php:

								Function for question's part. insert question, add upvote

Function For Insert question and upvote:

insert_question(id_user, question);
This function insert one question with id user number upvote is initialized at zero.


insert_upvote_case(id_user, id_q)
This function insert upvote to db with id_user and id_q, 

add_upvote_db(id_user, id_q)
This function is automaticly called when we call insert upvote she increment nb upvote for question and number upvote for user 


Function for get question and upvote:

get_last_question()
Return question's id who has insert at the end.

get_question(id_q)
Return text of question she take id of question in parameters

get_nb_upvote_question(id_q)
Return number of upvote for one question she take id of question in parameters 

get_id_who_ask(id_question)
Return id of user who ask a question she take in parameters id of questions.


File Users.php

								Function for User add and get

	get_mail_user(id_user)
Return mail string. 
Take id_user in parameter;

	get_lastname_user(id_user)
Return last name of user.
Parameter id_user

	

	get_firstname_user(id_user)
Return first name of user.
Parameter id_user.

	get_password_user(id_user)
Return password of users.
Take in parameter id_user.

	insert_user(lastname, firstname, password)
Insert to DB a new user take on parameter lastname, firstname, password
 