<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Proceso</title>
</head>
<body>


<?php
		echo $_POST['nom'], '<br \>';
		echo $_POST['tel'], '<br \>';
		echo $_POST['mail'], '<br \>';
		echo $_POST['dir'], '<br \>';
		echo $_POST['primero'], '<br \>';
		echo $_POST['segundo'], '<br \>';
		echo (isset($_POST['cafeote'])) ? (($_POST['cafeote'] == 'c') ? 'Cafe<br \>': 'Te<br \>'): '';
		echo ($_POST['nom'] == '') ? 'Sin observaciones' : $_POST['obs'], '<br \>';
		echo ($_POST['condi'] == 'ok') ? 'Acepta las condiciones <br \>' : '';

    ?>
</body>
</html>