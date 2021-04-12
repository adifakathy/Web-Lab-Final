
<?php
function session_check(){

   
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if (!isset($_SESSION['UserName'])) {
        if (!isset($_SESSION['Password'])) {
            echo "successfull";
            exit;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>Please enter Username and password to login</p>
<div class="container">
<form action="session.php" method="post">
Username  : <input type="text" name="Username"><br>
Password  : <input type="password" name="Password"><br>
<input type="submit" name = "submit">
</form>
</div>
<?php
require_once("databaseConnection.php");
$con =createdb  ();
session_start();
if (isset($_POST['submit'])) {
	$Username = $_POST['Username'];
	$password = $_POST['Password'];

	$query = "SELECT * FROM infomation WHERE username='$Username' and password='$Password'";

	$result = mysqli_query($con, $query);
	$rows = mysqli_num_rows($result);
	if ($rows == 1) {
		$_SESSION['Username'] = $Username;
        $_SESSION['Password'] = $Password;
		echo "Login successfull .";
	}else {
		echo "Not matched ,Try again";
	}
}
?>
</body>
</html>