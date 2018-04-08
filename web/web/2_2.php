<?php
session_start();
?>

<html>
  <head>
  </head>
  <body align=center><br>
<form method=post action=2_2.php>
<p align=right> Kod: <input type=text name=kod> <input type=submit name=search value=Search></p>
<h2> Table products </h2>  


<?php
	$link = mysqli_connect("localhost", "root", "","store") or die("Ошибка " . mysqli_error($link));	

if (isset($_POST['search'])){
        if($_POST["kod"]=="") echo "__";
	else{
		$kod=htmlentities(mysqli_real_escape_string($link,$_POST["kod"]));
		$sql ="SELECT * FROM products WHERE Kod='$kod' "; 
		$result = $link->query($sql); 		
		while ($row = $result->fetch_assoc()){
				echo"<br>Result of searching:<br><table border=1  align=center><tr><th>Kod</th><th>Nazva</th><th>Description</th><th>Category</th><th>Cost</th><th></th><th></th></tr>";
				echo "<tr><td><input type=text name=kod value=".$row['Kod']."></td>";
       				echo "<td><input type=text name=nazva value=".$row['Nazva']."></td>";
				echo "<td><input type=text name=desc value=".$row['Description']."></td>";
				echo "<td><input type=text name=cat value=".$row['Category']."></td>";
				echo "<td><input type=text name=cost value=".$row['Cost']."></td></tr></table>";

				
   		}
		echo "<input type=submit name=delete value='Delete'>";
		echo "<input type=submit name=save value='Save'>";
		
		if(isset($_POST["save"])){
echo "save";
						$kod = htmlentities(mysqli_real_escape_string($link,$_POST[kod]));
						$name = htmlentities(mysqli_real_escape_string($link,$_POST[name]));
						$desc = htmlentities(mysqli_real_escape_string($link,$_POST[desc]));
						$cat = htmlentities(mysqli_real_escape_string($link,$_POST[cat]));
						$cost = htmlentities(mysqli_real_escape_string($link,$_POST[cost]));

					$sql = "UPDATE products SET Kod='$kod', Nazva='$name', Description='$desc', Category='$cat', Cost='$cost' WHERE Kod='$kod'"; 
 					$result = mysqli_query( $link,$sql) or die("Ошибка " . mysqli_error($link)); 
					if($result) echo "Kod=".$row['Kod']." was success UPDATE";
		}
	}
} 
if(isset($_POST["del"])){
echo"DEl";
					//$query ="DELETE FROM products WHERE Kod='$kod'"; 
					//$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
					//if($result) echo "Kod=".$row['Kod']." was success DELETE";
		}
	$sql = "SELECT * FROM products";
        $result = $link->query($sql); 
	echo"<br>All products:<br><table border=1  align=center><tr ><th> Kod</th><th>Nazva</th><th>Description</th><th>Category</th><th>Cost</th></tr>";
	while ($row = $result->fetch_assoc()){
			echo "<tr><td>".$row['Kod']."</td>";
       			echo "<td>".$row['Nazva']."</td>";
			echo "<td>".$row['Description']."</td>";
			echo "<td>".$row['Category']."</td>";
			echo "<td>".$row['Cost']."</td>";
   	}
	echo"</table>";			
if (isset($_POST['exit'])){
  	session_unset();
        echo"Сессия удалена:  ";
	print_r($_SESSION);
}
?>

<br>
 <input type=submit name=exit value=Выйти>
 <a href="vxod.php"> Bернуться на главную </a>
</form>
</body>
</html>

