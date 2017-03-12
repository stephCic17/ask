<?php
include "../connexion.php";
include "Questions.php";
include "../user/Users.php";

session_start();

$d = array();
extract ($_POST);
$d["erreur"] = "toto";
if ($_POST["action"] == "addUpvote"){

	$d["test"] = insert_upvote($_SESSION["id"],$id);
	$d["erreur"] = "ok";
	$question = get_all_question(1);
	$i = 0;
	while ($question[$i]["id"] > 0)
	{
		$d["div"] .= "<div id=".$question[$i]["id"]."><p>".$question[$i]["question"]." upvote ".$question[$i]["upvote"]."<a href=\"#\" onclick=\"upvote(".$question[$i++]["id"].")\"><i class=\"icon -chevron-up\"></i></a></div>";
		}
}

echo json_encode($d);

?>