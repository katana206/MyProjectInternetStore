<html>
  <head>
  </head>
  <body align="center">
<p align="center">
<h2> ����������� </h2><br>
	<form method=post action=authorize.php>
	  Name: <input type=text name=name><br>
	  SurName: <input type=text name=surname><br>
	  Login: <input type=text name=login><br>
	  Password: <input type=password name=password><br>
	  Tel: <input type=password name=tel><br><br>
	  <input type=submit name=reg value=Registration><hr>
	</form>

<?php
  $link = mysqli_connect("localhost", "root", "","store") or die("������ " . mysqli_error($link)); 
  if (isset($_POST['reg'])){
	if(($_POST[login]=="")|| ($_POST[password]==""))echo "<script>alert(\"������ ����� ��� ������\");</script>";
	else{	
		$name = htmlentities(mysqli_real_escape_string($link,$_POST[name]));
		$surname = htmlentities(mysqli_real_escape_string($link,$_POST[surname]));
		$login = htmlentities(mysqli_real_escape_string($link,$_POST[login]));
		$password = htmlentities(mysqli_real_escape_string($link,$_POST[password]));
		$tel = htmlentities(mysqli_real_escape_string($link,$_POST[tel]));
		$sql = "INSERT INTO users SET  Name='$name',Surname='$surname',Login='$login',Password='$password',Tel='$tel'"; 
 		$result = mysqli_query( $link,$sql);
		if (!$result) echo "<script>alert(\"������ �����������\");</script>"; 
  		else echo "<script>alert(\"�� ������� ����������������!��������� �� �������� �����. \");</script>"; 
	}	
  }
?>
</p></body>
</html>
