
<?php
include "../connexion.php";
include "tchat.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" />
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" />

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="tchat.js"></script>
<script type="text/javascript">
<?php
			 $data =  get_last_message();
 ?>
var lastid = <?php echo $data; ?>
</script>
</head>
	<body>
		<div id="contener">
			<h1> Tchat</h1>
			<div id="tchat">
				<?php	$msg = get_all_message();
				foreach ($msg as $val)
				echo $val;
				?>
			</div>
			<div id="tchatForm">
				<form method="post" action="#">
					
					<textarea name="message"></textarea>
				<input type="submit" value="enter"/>
			</div>
	</body>
</html>
