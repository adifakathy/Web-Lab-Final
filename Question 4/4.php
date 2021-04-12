<?php


$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$email =$_POST['email'];
$psw =$_POST['psw'];
$pswrepeat =$_POST['pswrepeat'];



echo "<h2>Registration Information:</h2>";
echo $email;
echo "<br>";
echo $psw;
echo "<br>";
echo $pswrepeat;
echo "<br>";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM information WHERE id=4";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>