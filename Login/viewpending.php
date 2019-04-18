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
            .logo{
                border: 0px solid white;
                border-radius: 25px;
            }
    </style>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <img class="img-fluid d-block mx-auto logo" src="../images/logo.jpg" alt="" style="height:50px;width:50px;">
                <a class="navbar-brand brand-name" href="" style="padding-left:20px;" id="title"><?php echo " Project Keep - Pending Projects" ;?></a>    
                <a class="navbar-brand" href="studHome.php" style="padding-left:55% ">Home</a>
                <a class="navbar-brand" href="logoutStudent.php" style="padding-left:20px ">Logout</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                </div>
            </div>
        </nav>
        <!--<header class="py-5 bg-image-full" id="setBackground">
            <img class="img-fluid d-block mx-auto" src="../images/logo.png" alt="" style="height:100px;width:90px;padding-top: 0px;margin-top: 0px">  
        </header>
    --><script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
<?php
    session_start();
    if(!isset($_SESSION['student']))
        die("You are not allowed to access this page");
    require "../Schema/dbconnect.php";
    $var=time();
    $sql="SELECT * FROM project WHERE deadline>'$var'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==0)
    {
        echo '<div class="container" style="height:100% ;width:100%">
                <p style="text-align:center;padding:10%;font-size:30px;font-family:\'../fonts/Futura_Light_font.ttf\'">No projects as of now...Keep watching this space</p>
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
    if(mysqli_num_rows($res)==0)
    {
        echo '<div class="container" style="height:100% ;width:100%">
                <p style="text-align:center;padding:10%;font-size:30px;font-family:\'../fonts/Futura_Light_font.ttf\'">Your projects are complete..</p>
            </div> ';
        die();
    }
    else{
        echo '<p style="padding-top:5%">&nbsp;</p>';
        while($row=mysqli_fetch_assoc($res))
        {
            $var=$row['uid'];
            echo '<a href="submit.php?coursecode='.substr($var,0,5).'&amp;title='.substr($var,5).'"
             style="text-decoration:none;color:black;padding-top:10px;padding-bottom:10px;">
            <p style="text-align:left;padding-bottom:2%;padding-left:30%;padding-right:10%;font-size:20px;font-family:\'../fonts/Futura_Light_font.ttf\">'
            .substr($var,0,5).
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
            .substr($var,5).'</a>';
        }
    }
?>