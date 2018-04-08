<?php
  session_start();
?>
<html>
  <head>
  <meta charset="windows-1251">>
  </head>
  <body align="center">
<p align="center">
    <h2> Вхід </h2><br>
    <form method=post action=vxod.php>
	  Login: <input type=text name=login><br>
	  Password: <input type=password name=password><br><br>
	  <input type=submit name=enter value=Enter>
    </form><br>
    Якщо бажаєте зареєструватись: <a href="authorize.php"> Регістрація </a><hr><br>
<?php
   if (isset($_POST['enter'])){
	if(($_POST[login]=="") || ($_POST[password]==""))echo "<script>alert(\"Пустой логин или пароль\");</script>";
	else{	    
		     $_SESSION['login'] = $_POST['login'];
 		     $_SESSION['password'] = $_POST['password'];
 		     $link = mysqli_connect("localhost", "root", "","store") or die("Ошибка " . mysqli_error($link)); 
		     $login = htmlentities(mysqli_real_escape_string($link,$_POST[login]));
		$query ="SELECT * FROM users WHERE login='$login' "; 
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 	
		if (!$result) echo "<script>alert(\"Ошибка входа\");</script>"; 
  		else {
			if($_SESSION['login']=="admin" && $_SESSION['password']=="123"){
				echo "<script>alert(\"Вітаемо. Ви - адміністратор\");</script>"; 
				echo "<a href='2_2.php'>Сторінка для адміністратора </a><hr>";
			}
			else echo "<script>alert(\"Вход віполнен успешно\");</script>";
		}
 	}
  }
?>
  </p></body>
</html>
