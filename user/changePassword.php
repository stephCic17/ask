<?php
include "Users.php";
print_r($_POST);
print_r(change_password_user(get_id_user($_POST["pseudo"]), $_POST["password"]));
echo "<script> document.location.href=\"http://ciconia.io/ask\"</script>";
?>