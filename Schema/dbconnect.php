<?php 
    $server="localhost";
    $username="Ayush";
    $password="abcdefgh";
    $dbname="ProjectKeep";
    $conn=mysqli_connect($server,$username,$password,$dbname);
    if(!$conn)
        die ("Error connecting to database");
?>