<?php 
    session_start();
    $username=$_SESSION['student'];
    require "../header3.html";
    $coursecode=$_GET['coursecode'];
    $title=$_GET['title'];
?>