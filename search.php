<!DOCTYPE html>
<html>
<head>
	<title>PHP searching</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<form action="search.php" method="post">
<input id="mySearch" type="text" name="search" value="Search.." onFocus="if(this.value=='Search..') this.value='';" onblur="if(this.value=='') this.value='Search..'">
<input class="btn" type="submit" name="submit" value="Найти">
	
</form>

</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=search",'root','root');
if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `test` WHERE title = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<div class="table">
		<table>
			
			<tr>
				<td><?php echo $row->title; ?></td>
				<td><?php echo $row->text;?></td>
			</tr>

		</table>
       		
<?php		
	}	
    else{
		echo '<p class="msg"> ' . $_SESSION['message']='Попробуйте задать другой запрос' . ' </p>';
		
	
    }
	
        
}

?>
