<?php 
    session_start();
    unset($_SESSION['professor']);
    header("Location: professor.php");
?>