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

if ($_POST["action"] == "addUpvote")
{
	if ($_SESSION["id"])
		{
			$id_user = $_SESSION["id"];
			$select = "SELECT id_up FROM upvotes WHERE id_q='$id' AND id_user='$id_user'";
			$result = pg_query($dbconnect, $select);
			$res = pg_fetch_row($result);
			if (!$res[0]){
				$d["test"] = insert_upvote($_SESSION["id"],$id);
				$d["erreur"] = "ok";
				$question = get_all_question(1);
				$i = 0;
				while ($question[$i]["id"] > 0)
				{
					$d["div"] .= "<div id=n".$question[$i]["id"]."><h4>".$question[$i]["question"]." <a onclick=\"upvote(".$question[$i]["id"].")\"><i class=\"icon -chevron-up\"></i></a></h4><p> votes ".$question[$i++]["upvote"]."</p></div>";
					
				}
			}
		}
		else{
			$d["erreur"] = "id";
		}
}
	
if ($_POST["action"] == "getQuestions"){
	$d["erreur"] = "ok";
	$d["lastid"] = get_last_question();
	$question = get_all_question_answer(1);
	$i = 0;
	while ($question[$i]["id"] > 0)
	{
		$d["div"] .= "<div id=n".$question[$i]["id"]."><h4>".$question[$i]["question"]." <a onclick=\"upvote(".$question[$i]["id"].")\"><i class=\"icon -check\"
></i></a></h4></div>";
	}
}
	$question = get_all_question(1);
	$i = 0;
	while ($question[$i]["id"] > 0)
	{
		$d["div"] .= "<div id=n".$question[$i]["id"]."><h4>".$question[$i]["question"]." <a onclick=\"upvote(".$question[$i]["id"].")\"><i class=\"icon -chevron-up\"
></i></a></h4><p> votes ".$question[$i++]["upvote"]."</p></div>";
	}
}
echo json_encode($d);

?>