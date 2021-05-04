<form method="post" action="">
  <div>
    <label for="username">NAMA PENGGUNA</label><br/>
    <input type="text"  name="username" placeholder="Masukkan username" required>
  </div>
  <div><br/>
	<label for="email">EMAIL</label><br/>
    <input type="email" name="email" placeholder="Masukkan email" required>
  </div>
  <br/>
  <input type="submit" name="submit" value="Submit">
</form>
<?php 
 if($_SERVER['REQUEST_METHOD'] == "POST"){
 	$nama = $_POST['username'];
 	$email = $_POST['email'];

 	if(isset($_POST['submit'])){
 		simpanDataEntri($nama, $email);	
 		header('Location:index.php');
 	}
 }
?>