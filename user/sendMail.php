<?php
include "Users.php";
extract($_POST);

$id = get_id_with_mail($mail);
$pseudo = get_pseudo_user($id);
$first = get_firstname_user($id);

$msg = "<html><body><h1>Bonjour ".$first."</h1><p> Votre pseudo est ".$pseudo."</p><form action='http://ciconia.io/ask/user/chooseNewPass.php'><input type='hidden' name='pseudo' value=".$pseudo."><input type='submit' value='Changer mon mot de passe'></form></body></html>";
$headers ="From: 'Ciconia'<contact@ciconia.io>"."\n"; // De...
$headers .='Reply-To: contact@ciconia.io'."\n"; // Adresse E-Mail de réponse
$headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
$headers .='Content-Transfer-Encoding: 8bit';
mail($mail, "renvois d'identifiants", $msg, $headers);
//echo "<script> document.location.href=\"http://ciconia.io/ask\"</script>";