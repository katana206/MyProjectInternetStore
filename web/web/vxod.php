<?php
  session_start();
?>
<html>
  <head>
  <meta charset="windows-1251">>
  </head>
  <body align="center">
<p align="center">
    <h2> ���� </h2><br>
    <form method=post action=vxod.php>
	  Login: <input type=text name=login><br>
	  Password: <input type=password name=password><br><br>
	  <input type=submit name=enter value=Enter>
    </form><br>
    ���� ������ ��������������: <a href="authorize.php"> ���������� </a><hr><br>
<?php
   if (isset($_POST['enter'])){
	if(($_POST[login]=="") || ($_POST[password]==""))echo "<script>alert(\"������ ����� ��� ������\");</script>";
	else{	    
		     $_SESSION['login'] = $_POST['login'];
 		     $_SESSION['password'] = $_POST['password'];
 		     $link = mysqli_connect("localhost", "root", "","store") or die("������ " . mysqli_error($link)); 
		     $login = htmlentities(mysqli_real_escape_string($link,$_POST[login]));
		$query ="SELECT * FROM users WHERE login='$login' "; 
		$result = mysqli_query($link, $query) or die("������ " . mysqli_error($link)); 	
		if (!$result) echo "<script>alert(\"������ �����\");</script>"; 
  		else {
			if($_SESSION['login']=="admin" && $_SESSION['password']=="123"){
				echo "<script>alert(\"³�����. �� - �����������\");</script>"; 
				echo "<a href='2_2.php'>������� ��� ������������ </a><hr>";
			}
			else echo "<script>alert(\"���� ������� �������\");</script>";
		}
 	}
  }
?>
  </p></body>
</html>
