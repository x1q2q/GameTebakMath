<?php require_once('core.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>PROJEK GAME TEBAH MATH - UTS PTIK'19</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body >

<?php
if(isRegister()){
	initScoreLives();
	require_once 'pages/dashboard.php';
}else{
	require_once 'pages/register.php';
}
?>

</body>
</html>
