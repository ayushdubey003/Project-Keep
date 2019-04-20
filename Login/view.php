<title>View Page</title>
<?php 
    session_start();
    $username=$_SESSION['professor'];
    require "../header2.html";
    require "../Schema/dbconnect.php";
    $uid=$_GET['uid'];
    $query="SELECT * FROM submission WHERE uid='$uid' AND submitted=1";
    $result=mysqli_query($conn,$query);
    $num_rows=mysqli_num_rows($result);
    echo '<script>
    document.getElementById("title").innerHTML = "Project Keep - Total Submissions ('.$num_rows.')"</script>';
    if($num_rows==0)
    {
        echo '<div class="container" style="height:100% ;width:100%">
                <p style="text-align:center;padding:10%;font-size:30px;font-family:\'../fonts/Futura_Light_font.ttf\'">No submissions received for this assignment..</p>
            </div> ';
        die();
    }    
    echo '<p id = "total" style="text-align:left;padding-top:20px;padding-left:5%;font-size:20px;font-family:\'../fonts/Futura_Light_font.ttf\'">'.$num_rows.'</p>';
    echo '<div class="container" style="padding:20px 20px 60px 20px; height:auto; width:500px;float: centre; margin-top: 100px; background-color:">';
    while($row=mysqli_fetch_assoc($result))
    {
        echo '<div class="container customform" style="padding:20px 20px 20px 20px; margin:30px 0px 0px 0px;height:auto; width:440px;float: centre; margin-top: 100px; background-color:">';
        $path=$row['file'];
        $name=$row['username'];
        $query="SELECT * FROM student WHERE username='$name'";
        $res=mysqli_query($conn,$query);
        while($ro=mysqli_fetch_assoc($res))
        {
            $firstname=$ro['firstname'];
            $lastname=$ro['lastname'];
        }
        echo '<a href='.$path.'
        style="text-decoration:none;color:black;padding-top:10px;padding-bottom:10px;">
        <p style="padding-left:10px;padding-top:2px;font-size: 20px; font-family:\'../fonts/Futura_Light_font.ttf\';font-weight:bold;">
        Submission by '.$firstname.' '.$lastname.'<br><i style="font-size:16px;font-weight:normal;"> (Username: '.$name.
        ')</p></a>';
        echo '</div>';
    }
    echo '</div>';
?>

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

<script>
    var a = document.getElementById("total").innerHTML;
    document.getElementById("total").innerHTML = "";
    document.getElementById("title").innerHTML = "Project Keep - Total Submissions ("+a+")"</script>
