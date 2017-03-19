<?php
include "Users.php";
extract($_POST);

$id = get_id_with_mail($email);
$pseudo = get_pseudo_user($id);
$first = get_firstname_user($id);

$msg = "<html><body><h1 style=\"color:#03696a;\">Bonjour</h1><p> Vous avez demandez le renvois de vos identifiants</p><p>Votre pseudo est <b style=\"font-weight:bold; color:#048b8d\">".$pseudo."</b></p><p>Pour modifier votre mot de passe cliquez sur le boutton ci-dessous et laissez vous guider</p><form action='http://ciconia.io/ask/user/chooseNewPass.php'><input type='hidden' name='pseudo' value=".$pseudo."><input style=\"background-color:#048b8d;color:#FFF; border-rabius:2px;\" type='submit' value='Changer mon mot de passe'></form></body></html>";
$headers ="From: 'Ciconia'<contact@ciconia.io>"."\n"; // De...
$headers .='Reply-To: contact@ciconia.io'."\n"; // Adresse E-Mail de réponse
$headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
$headers .='Content-Transfer-Encoding: 8bit';
mail($email, "renvois d'identifiants", $msg, $headers);
echo "<script> document.location.href=\"http://ciconia.io/ask\"</script>";