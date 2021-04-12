<?php
function createdb(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "information";
$conn = mysqli_connect($servername,$username,$password);

if (!$conn){
    die("connection failed : ".mysqli_connect_error());
}


$sql = "CREATE DATABASE IF NOT EXISTS $dbname ";

if(mysqli_query($conn,$sql)){
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    $sql ="
        CREATE TABLE IF NOT EXISTS info( 
            name VARCHAR(25),
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(25),
            password VARCHAR(25));";

    if(mysqli_query($conn,$sql)){
        return $conn;
    }
    else{
        echo "can't create table ";
    }
}
else{
    echo "can't create database ".mysqli_connection_error($conn);
}

}

?>