<?php
include "Users.php";
extract($_POST);
print_r($_POST);
print_r($pseudo);
if ($pseudo == test_pseudo($pseudo)){
	$id = get_id_user($pseudo);
	//ADd hash
	if ($password == get_password_user($id))
	{
		echo "ok";
	}
	else{
		echo "KO";
	}
}
	else
		echo "KO";
	

?>