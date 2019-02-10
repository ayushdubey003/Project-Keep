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
    $query="CREATE TABLE project (username VARCHAR(30) NOT NULL,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(100) NOT NULL,
    coursecode VARCHAR(10) NOT NULL,
    deadline INTEGER NOT NULL)";
    mysqli_query($conn,$query);
    mysqli_close($conn);
?>