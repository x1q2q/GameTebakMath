<?php 
	require_once('../core.php'); 
	if(isset($_POST['submit']) AND isset($_POST['jawaban'])){
		$jwb1 = $_POST['jawaban'];
		$jwb2 = $_SESSION['jawaban'];

		calcQuest($jwb1, $jwb2);
		if($_SESSION['lives'] == 0){
			$conn = connect_sql();
			$sql = "INSERT INTO leaderboard (id, nama, score) VALUES (null, '".$_COOKIE['username']."', '".$_SESSION['score']."')";
			$conn->query($sql);
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Result Jawaban</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body >
	<h3>Hallo <?= $_COOKIE['username'].', '.getJawaban($jwb1,$jwb2); ?></h3>
	<h3>Lives: <?= $_SESSION['lives']; ?> | Score: <?= $_SESSION['score']; ?></h3><hr/>
	<br/><br/>
	<a href="main.php">[Soal Selanjutnya]</a>
<?php	
	}else{
		echo "<a href='main.php'>[Refresh]</a>";
	}
?>
</body>
</html>