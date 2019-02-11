<?php 
    session_start();
    if(!isset($_SESSION['student']))
        die("You are not allowed to access this page");
    if(isset($_POST['submit']))
    {
        $size=$_FILES['data']['size'];
        if($size==0)
        {
            die(Header("Location: viewpending.php"));
        }
        $type=$_FILES['data']['type'];
        if($type!='application/pdf')
        {
            die(Header("Location: viewpending.php"));
        }
        echo "oK";
    }
?>