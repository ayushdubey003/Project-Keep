<?php
    $servername = "localhost";
    $username = "Ayush";
    $password = "abcdefgh";
    $conn = mysqli_connect($servername, $username, $password);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "CREATE DATABASE ProjectKeep";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>