<?php 
    $server="localhost";
    $user="Ayush";
    $password="abcdefgh";
    $dbname="ProjectKeep";
    $conn=mysqli_connect($server,$user,$password,$dbname);
    if(!$conn)
        die ("Error connecting to database");
?>