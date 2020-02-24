<?php

//before using a db you have to connect to i by providing the following information

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dukamojadb';

//php has helper functions that help connect to databases, mysqli_connect(), the function returns a boolean

$conn = mysqli_connect($servername, $username, $password, $dbname);

//check if conn is successful

if (!$conn){
    die("Database connection is unsuccessful<br>".mysqli_connect_error());

}
?>