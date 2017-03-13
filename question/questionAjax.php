<?php
include "../connexion.php";
include "Questions.php";
include "../user/Users.php";

session_start();

$d = array();
extract ($_POST);

if ($_POST["action"] == "addQuestion"){
	$d["test"] = insert_question($_SESSION["id"], htmlentities($question, ENT_QUOTES, "UTF-8"), 1);
	$d["erreur"] = "ok";
}

if ($_POST["action"] == "addUpvote"){

	$d["up"] = test_upvote($_SESSION["id"], $id);
	$d["test"] = insert_upvote($_SESSION["id"],$id);
	$d["erreur"] = "ok";
	$question = get_all_question(1);
	$i = 0;
	while ($question[$i]["id"] > 0)
	{
				$d["div"] .= "<div id=".$question[$i]["id"]."><h4>".$question[$i]["question"]." <a onclick=\"upvote(".$question[$i]["id"].")\"><i class=\"icon -chevron-up\"></i></a></h4><p> votes ".$question[$i++]["upvote"]."</p></div>";

	}
}
if ($_POST["action"] == "getQuestions"){
	$d["erreur"] = "ok";
	$d["lastid"] = get_last_question();
	$question = get_all_question(1);
	$i = 0;
	while ($question[$i]["id"] > 0)
	{
		$d["div"] .= "<div id=".$question[$i]["id"]."><h4>".$question[$i]["question"]." <a onclick=\"upvote(".$question[$i]["id"].")\"><i class=\"icon -chevron-up\"></i></a></h4><p> votes ".$question[$i++]["upvote"]."</p></div>";
	}
}
echo json_encode($d);

?>