<?php
    require 'createdb.php';
    $servername = "localhost";
    $username = "Ayush";
    $password = "abcdefgh";
    $dbname="ProjectKeep";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        die ("Error connecting to database");
    }
    $query="CREATE TABLE student (username VARCHAR(30) PRIMARY KEY NOT NULL,
    password VARCHAR(32) NOT NULL,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL)";
    mysqli_query($conn,$query);
    mysqli_close($conn);
?>