<?php
include "Users.php";
session_start();
?><script type="text/javascript" src="../script.js"></script>
<?php
extract($_POST);
date_default_timezone_set('UTC');
if (test_pseudo($pseudo) == 0){
		insert_user( $mail, $password, $pseudo);
		$_SESSION["pseudo"] = $pseudo;
		$_SESSION["id"] = get_id_user($pseudo);
		$_SESSION["mail"] = $mail;
		$_SESSION["password"] = $password;
	echo "	<script> document.location.href=\"http://ciconia.io/ask\"</script>";
}
else {
	$_SESSION["last"] = $last;
	$_SESSION["fisrt"] = $first;
	$_SESSION["mail"] = $mail;
	$_SESSION["password"] = $password;
	
	echo "	<script>document.location.href=\"http://ciconia.io/ask/user/pseudo.php\"</script>";
	}
?>