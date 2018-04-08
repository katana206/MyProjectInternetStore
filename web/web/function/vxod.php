<?php
  session_start();
?>
<html>
  <head>
  </head>
  <body align="center">
<p align="center">
    <h2> Вход </h2><br>
    <form method=post action=vxod.php>
	  Login: <input type=text name=login><br>
	  Password: <input type=password name=password><br><br>
	  <input type=submit name=enter value=Enter>
    </form><br>
    Если вы не зарегистрированы: <a href="authorize.php">Регистрация</a><hr><br>
   <!-- Ïåðåéòè íà íàñòóïíó ñòîð³íêó: <a href="1.php">òóò </a>
-->
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
			echo "<script>alert(\"Вход выполнен успешно!\");</script>";//ïåðåíàïðàâëåíèå íà äðóãóþ ñòð
		}
 	}
  }
?>
  </p></body>
</html>
