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
    $query="CREATE TABLE submission (username VARCHAR(30) NOT NULL,
    file varchar(100),
    uid VARCHAR(100000000),
    submitted INTEGER DEFAULT 0)";
    mysqli_query($conn,$query);
    mysqli_close($conn);
?>