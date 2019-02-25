<?php
error_reporting(E_ALL);
require("database.php");

if($_POST) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	$sql = "SELECT * FROM accounts WHERE username = '".$username."'";
		
	$result = $conn->query($sql);
	
	if ($result->num_rows == 1) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if($password == $row['password']) {
				echo "Login Success";
			}
		}
	} else {
		echo "Login Failed";
	}
	
	if ($conn->error) {
	   printf("Errormessage: %s\n", $conn->error);
	}
}

?>

<form action="login.php" method="post">
	<p>
		Username: <input type="text" placeholder="Username" name="username" /><br>
		Password: <input type="password" placeholder="Password" name="password" /><br>
		<input type="submit" value="Login">
	</p>
</form>