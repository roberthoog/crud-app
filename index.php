<?php
//including the database connection file
include_once("config.php");
include_once("header.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head>	
	<title>Index CRUD-app</title>
</head>

<body>
<div class="container">
	<div class="row align-items-center">
		<h1>Simple CRUD app</h1>
		<hr>

<?php include('menu.php')?>


		<table class="table table-hover table-sm">

		<tr bgcolor='#CCCCCC'>
			<td>Name</td>
			<td>Age</td>
			<td>Email</td>
			<td>Update</td>
		</tr>
		<?php
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['age']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
		</table>
<hr>
<h4><a href="https://github.com/roberthoog/crud-app">KÄLLKOD</a></h4>
			</div>
		</div>
	</div>
</body>
</html>
