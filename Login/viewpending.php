<title>Pending Projects</title>
<!DOCTYPE html>
<html>
    <head>
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/full-width-pics.css" rel="stylesheet">
        <link href="../css/custom.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
    </head>
    <style>
            .project{
                color:#6b6b6b;
            }
            .logo{
                border: 0px solid white;
                border-radius: 25px;
            }
            .customform{
                border: 2px solid white;
                border-radius: 6px;
                background: white;
                padding:35px 30px 15px 30px;
                margin-top:50px;
                box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16), 0 0 0 1px rgba(0, 0, 0, 0.08);
            }
            body{
                background-image: url("../images/back.jpg");
                background-color: black;
                padding: 40px 0px 180px 0px;
                background-position: center center;
            }
            .brand-name{
                font-weight:bold;
            }
            a, p, li, ol{
                font-family:"../fonts/Futura_Light_font.ttf";
                font-size:18.5px;
                color:#6b6b6b;
            }
            .note{
                font-family:"../fonts/Futura_Light_font.ttf";
                font-size:15px;
                color:#6b6b6b;
            }
            .b{
                font-size:19px;
                color: #8c8e8c ;
            }
            .inp
            {
                width:100%;
                height:50px;
                margin: 8px 0px;
                padding: 12px 20px;
                box-sizing: border-box;
                border: 2px solid gray;
                border-radius: 4px;
            }
            .submit
            {
                border-radius:2px;
                margin-left: 34%;
                background-color:#3cbd0c;
                color:white;
                font-size:18px;
                font-weight:bold;
                text-align: center;
                padding: 10px 20px 10px 20px;
                font-size: 15px;
                border: none;
                font-family:"../fonts/Futura_Light_font.ttf";
            }
            .submit:hover {background-color: #37a90b;}
            .submit:active {
                background-color: #3e8e41;
                box-shadow: 0 5px #666;
                transform: translateY(4px);
            }
            .dropdown{
                width:270px;
                height:40px;
            }
    </style>
    <body>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
    
</html>

<?php
    session_start();
    require('../header3.html');
    echo '<script>document.getElementById("title").innerHTML = "Project Keep - Projects Due"</script>';
    if(!isset($_SESSION['student']))
        die("You are not allowed to access this page");
    require "../Schema/dbconnect.php";
    $var=time();
    $sql="SELECT * FROM project WHERE deadline>'$var'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==0)
    {
        echo '<div class="container" style="height:60% ;width:100%;margin-top:50px;">
                <p style="text-align:center;padding:10%;font-size:30px;color:white;font-weight:bold;font-family:\'../fonts/Futura_Light_font.ttf\'">No projects as of now...Keep watching this space</p>
            </div> ';
        die();
    }
    $projects=array();
    $i=0;
    while($row=mysqli_fetch_assoc($result)){
        $var1=$row['coursecode'];
        $var2=$row['title'];
        $uid=$var1.$var2;
        $projects[$i]=$uid;
        $i++;
    }
    $username=$_SESSION['student'];
    for($j=0;$j<$i;$j++)
    {
        $query="SELECT * FROM submission WHERE uid='$projects[$j]' AND username='$username'";
        $res=mysqli_query($conn,$query);
        if(mysqli_num_rows($res)==0)
        {
            $que="INSERT INTO submission (username,file,uid)
                VALUES('$username','nowhere','$projects[$j]')";
            mysqli_query($conn,$que);
        }
    }
    $query="SELECT * FROM submission WHERE submitted='0' AND username='$username'";
    $res=mysqli_query($conn,$query);
    $a = 1;
    if(mysqli_num_rows($res)==0)
    {
        echo '<div class="container" style="height:100% ;width:100%">
                <p style="text-align:center;padding:10%;color:white;font-weight:bold;font-size:35px;font-family:\'../fonts/Futura_Light_font.ttf\'">Your projects are complete..</p>
            </div> ';
        die();
    }
    else{
        echo '<p style="padding-top:5%">&nbsp;</p>';
        echo '<div class="container customform" style="padding:20px 20px 30px 20px; height:auto; width:500px;float: centre; margin-top: 100px; background-color:">';
        while($row=mysqli_fetch_assoc($res))
        {
            $var=$row['uid'];
            echo '<a href="submit.php?coursecode='.substr($var,0,5).'&amp;title='.substr($var,5).'"
             style="text-decoration:none;color:#6b6b6b;padding-left:20px;padding-bottom:0px;font-weight=bold;">
            <p style="text-align:left;padding-left:20;font-weight:bold;color:#6b6b6b;padding-left:4px;padding-right:10%;font-size:20px;font-family:\'../fonts/Futura_Light_font.ttf\">'
            .substr($var,0,5).
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><i style="text-align:left;color:#6b6b6b;padding-left:4px;padding-right:10%;font-size:20px;font-family:\'../fonts/Futura_Light_font.ttf\">'
            .substr($var,5).'</a><br><hr>';
            $a = $a + 1;
        }
        echo '</div>';
    }
?>
<script>document.getElementById("title").innerHTML = "Project Keep - Projects Due"</script>