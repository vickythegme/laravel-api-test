<?php
	include("api.php");
	$servername = "localhost";
	$hostname = "your_host_name";
	$password = "you_host_password";
	$dbname = "your_db_name";
	$con=mysql_connect("$servername","$hostname","$password");
	//$con = mysqli_connect('localhost', 'root', '', 'agent_text');
	// Check connection
	if (mysqli_connect_errno($con)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if(isset($_POST['txtSub'])) {
		$name = $_POST['txtName'];
		$email = $_POST['txtEmail'];
		$number = $_POST['txtContactNo'];
		$lookingfor = $_POST['txtLookingFor'];
		$message = $_POST['txtaMessage'];
		$sql = "INSERT into contact (username, email, pnumber, lookingfor, message) values ('$name', '$email', '$number', '$lookingfor', '$message')";
		//echo $sql;
		$fn = new Api;
		$arr = array('username' => $name, 'message' => $message, 'email' => $email, 'number' => $number, 'lookingfor' => $lookingfor);
		$result= $fn -> vi_post("contact", $arr); //method to connect to the api and send data
		$json_output = json_decode($result); // get the result
		if($json_output -> message == 'success') {
			mysqli_query($con,$sql);
			echo "The Data is saved in both the api as well as your db";
		} elseif ($json_output -> message == 'failed') {
			echo "The Data is not saved";
		}

	}
?>
<html>
<head>
<title>
Test
</title>
</head>
<body>
<div class="container">
	<form method="post" action="" name="contact_form">
		<label>
			Name:
		</label>
		<input type="text" name="txtName">
		<br/>
		<label>
			Looking for:
		</label>
		<select name="txtLookingFor">
		<option value="Enquiry">Enquiry</option>
		<option value="Contact">Contact</option>
		</select>
		<br/>
		<label>Message</label>
		<textarea rows="10" cols="30" name="txtaMessage"> </textarea>
		<br/>
		<label>
			Contact No
		</label>
		<input type="text" name="txtContactNo">
		<br/>
		<label>Email</label>
		<input type="text" name="txtEmail">
		<br/>
		<input type="submit" name="txtSub">
	</form>
</div>
</body>
</html>
