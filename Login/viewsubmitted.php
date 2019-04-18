<title>Submitted Projects</title>
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
                <a class="navbar-brand brand-name" href="" style="padding-left:20px;" id="title"><?php echo " Project Keep - Submitted Projects" ;?></a>    
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
    require "../Schema/dbconnect.php";
    if(!isset($_SESSION['student']))
        die("You are not allowed to access this page");
    $username=$_SESSION['student'];
    $query="SELECT * FROM submission WHERE username='$username' AND submitted=1";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==0)
    {
        echo '<div class="container" style="height:100% ;width:100%">
                <p style="text-align:center;padding:10%;font-size:30px;font-family:\'../fonts/Futura_Light_font.ttf\'">You haven\'t submitted any projects..</p>
            </div> ';
        die();
    }
    echo '<br><br><br>';
    while($row=mysqli_fetch_assoc($result))
    {
        $path=$row['file'];
        $uid=$row['uid'];
        $coursecode=substr($uid,0,5);
        $title=substr($uid,5);
        echo '<a href='.$path.'
        style="text-decoration:none;color:black;padding-top:10px;padding-bottom:10px;"><p style="padding-left:50px;padding-top:2px; padding-left:30%;font-size: 20px; font-family:\'../fonts/Futura_Light_font.ttf\'" >'.$coursecode.
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        .$title.'</p></a>';
    }
?>