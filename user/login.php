<?php
include "Users.php";
session_start();
extract($_POST);

if (test_pseudo($pseudo) == 1){
	$id = get_id_user($pseudo);
	if (test_password_user($id, $password) == 1)
	{

		$_SESSION["pseudo"] = $pseudo;
		$_SESSION["id"] = get_id_user($pseudo);
		$_SESSION["last"] = get_lastname_user($id);
		$_SESSION["fisrt"] = get_firstname_user($id);
		$_SESSION["mail"] = get_mail_user($id);
		$_SESSION["password"] = $password;
		echo "<script> document.location.href=\"http://ciconia.io/ask\"</script>";
	}
	else{
		echo "<script> document.location.href=\"http://ciconia.io/ask\"</script>";
	}
}
	else
		echo "<script> document.location.href=\"http://ciconia.io/ask\"</script>";
	

?>