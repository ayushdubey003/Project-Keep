<?php
    session_start();
    include("../header.html");
    $user=$_SESSION['professor'];
    echo "Welcome $user";
?>