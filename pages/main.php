<?php 
	require_once('../core.php'); 
	$bil1 = random_int(0,20);
	$bil2 = random_int(0,20);
	$_SESSION['jawaban'] = $bil1+$bil2; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Soal Pertanyaan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body >

<style type="text/css">
	table{
		width: 25%;
		border:1px solid #000;
	}
	table tr td{
		border:1px solid grey;
		padding: 5px 8px;
	}
</style>
<?php if($_SESSION['lives'] > 0){ ?>
	<h3>Hallo <?= $_COOKIE['username']; ?>, tetap semangat ya... you can do the best!</h3>
	<h3>Lives: <?= $_SESSION['lives']; ?> | Score: <?= $_SESSION['score']; ?></h3><hr/>
	<h2>Berapakah <?= $bil1.'+'.$bil2; ?></h2>
	<form method="post" action="result.php">
		<input type="number" name="jawaban" placeholder="jawaban anda" required>
		<input type="submit" name="submit" value="Submit">
	</form>
	
<?php }else{ 
		$conn = connect_sql();
		$sql = "SELECT * FROM leaderboard ORDER BY score DESC LIMIT 10";
		$hasil = $conn->query($sql);
	?>
	<h3>Hallo <?= $_COOKIE['username']; ?>... Sayang permainan sudah selesai. Semoga kali lain bisa lebih baik.</h3>
	<h3>Score: <?= $_SESSION['score']; ?></h3><hr/>
	<br/>
	<a href="../index.php">[Main Lagi]</a> 
	<br/><br/>
		<h3>HALL OF FAME</h3>
		<?php if($hasil->num_rows > 0){
			$no =0; ?>
			<table>
			<tr>
				<td>NO</td>
				<td>NAMA</td>
				<td>SCORE</td>
			</tr>
		<?php
			while($row = $hasil->fetch_assoc()) {
				$no++;
				echo "<tr>
				<td>".$no."</td>
				<td>".$row['nama']."</td>
				<td>".$row['score']."</td>
				</tr>";
				}
		?>
		</table>
		<?php }else{ ?>
			<p>Data Kosong</p>
		<?php } ?>
	
<?php } ?>

</body>
</html>
