<html>
<head>
	<title>Add Data</title>
</head>

<body>

<h1>Simple CRUD app</h1>
<hr>
<?php
//including the database connection file
include_once("config.php");
include_once("header.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$age = $_POST['age'];
	$email = $_POST['email'];
		
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {
				
		if(empty($name)) {
			echo "<p class='warning'>Name field is empty.</p><br/>";
		}
		
		if(empty($age)) {
			echo "<p class='warning'>Age field is empty.</p><br/>";
		}
		
		if(empty($email)) {
			echo "<p class='warning'>Email field is empty.</p><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO users(name, age, email) VALUES(:name, :age, :email)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':name', $name);
		$query->bindparam(':age', $age);
		$query->bindparam(':email', $email);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<h3>Data added successfully.</h3><br>";
		echo "<h3><br/><a href='index.php'>View Result</a></h3>";
	}
}
?>
</body>
</html>
