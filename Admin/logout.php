<?php
    session_start();
    $var=$_SESSION['admin'];
    $_SESSION['admin']="something else";
    $admin="admin.php";
    session_destroy();
    header("Location: $admin");
?>