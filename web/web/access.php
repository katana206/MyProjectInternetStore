<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
<title>Вход в магазин</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style_for_access.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>

 <form method="POST" action="access.php "> 
 <label for="login">Введите ваш логин:</label>
 <input type="text" name="login"><br>
 <label for="password">Введите ваш пароль:</label>
 <input type="password" name="password"><br>
 <input type="submit" name="enter" value="Вход"></input>



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
	//	echo var_dump($result); 	
		if (!$result) echo "<script>alert(\"Ошибка входа!\");</script>";
			else {
			if($_SESSION['login']=="admin" && $_SESSION['password']=="123"){
				echo "<script>alert(\"Вы зашли как администратор\");</script>"; 
				echo "<a href='2_2.php'>Страничка для администратора </a><hr>";
			}
			else echo "<script>alert(\"Вы успешно вошли в аккаунт\");</script>"; 
  	/*	else { 
			echo "<script>alert(\"Вход выполнен успешно!\");window.close(); window.open('cart.html',width=300,height=50);
			</script>";
		
 	}*/}
  }}
?>
</form>
</body>
</html>