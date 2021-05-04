<?php 
function initScoreLives(){
	$_SESSION['lives'] = 5;
	$_SESSION['score'] = 0;
}
function isRegister(){
	$login = isset($_COOKIE['username']) AND 
			isset($_COOKIE['email'])?true:false; 
	return $login;
}
function simpanDataEntri($nm,$em){
	$lm_simpan = time()+3*30*24*3600;
	setcookie("username", $nm, $lm_simpan,"/");
 	setcookie("email", $em, $lm_simpan,"/");
}
function getJawaban($jwb1,$jwb2){
	$str = $jwb1 == $jwb2? 'Selamat jawaban Anda benar..' : 
		'sayang jawaban Anda salah… tetap semangat ya !!!';
	return $str;
}	
function calcQuest($jwb1, $jwb2){
	if($jwb1 == $jwb2){
		$_SESSION['score']+=10;
	}else{
		$_SESSION['lives']-=1;
		$_SESSION['score']-=2;
	}
}

?>