<?php 
    $server="localhost";
    $user="Ayush";
    $pass="abcdefgh";
    $dbname="ProjectKeep";
    $conn=mysqli_connect($server,$user,$pass,$dbname);
    if(!$conn)
        die ("Error connecting to database");
?>