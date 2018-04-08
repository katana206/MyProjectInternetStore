<?php
  session_start();
?>
<?php
   if (isset($_POST['enter'])){
	if(($_POST[login]=="") || ($_POST[password]==""))echo "<script>alert(\"Пустой логин или пароль!!!\");</script>";
	else{	    
		     $_SESSION['log'] = $_POST['login'];
 		     $_SESSION['password'] = $_POST['password'];
 		     $link = mysqli_connect("localhost", "root", "","store") or die("Ошибка!" . mysqli_error($link)); 
		     $login = htmlentities(mysqli_real_escape_string($link,$_POST[login]));
		$query ="SELECT * FROM users WHERE login='$login' "; 
		$result = mysqli_query($link, $query) or die("Ошибка!" . mysqli_error($link)); 	
		if (!$result) echo "<script>alert(\"Ошибка входа!\");</script>"; 
  		else {
			echo "<script>alert(\"Вход выполнен успешно!\");</script>";
		}
 	}
  }
?>
