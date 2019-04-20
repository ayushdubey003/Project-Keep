<title>Review Projects</title>
<?php
    session_start();
    require "../Schema/dbconnect.php";
    require "../header2.html";
    echo '<script>document.getElementById("title").innerHTML = "Project Keep - Projects"</script>';
    if(!isset($_SESSION['professor']))
        die("You are not allowed to access this page");
    $username=$_SESSION['professor'];
    $query="SELECT * FROM project WHERE username='$username'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==0)
    {
        echo '<div class="container customform" style="height:100% ;width:100%">
                <p style="text-align:center;padding:10%;font-size:30px;font-family:\'../fonts/Futura_Light_font.ttf\'">You haven\'t given any assignments..</p>
            </div> ';
        die();
    }
    $a = 1;
    echo '<br><br><br>';
    echo '<div class="container customform" style="height:auto; width:500px;float: centre; margin-top: 100px; background-color:">';
    while($row=mysqli_fetch_assoc($result))
    {
        $title=$row['title'];
        $description=$row['description'];
        $uid=$row['coursecode'].$title;
        echo '<a href="view.php?uid='.$uid.
        '" style="text-decoration:none;color:black;padding-bottom:10px;"><p class="project" style="font-weight:bold;padding-top:0px; padding-left:10px;padding-right:10px;font-size: 20px; color:#6b6b6b; font-family:\'../fonts/Futura_Light_font.ttf\';" >'.$a.'. '.$title.
        '</p><i class="desc" style="padding-top:0px; margin-bottom:20px;padding-left:28px;padding-right:10px;font-size: 17px; font-weight:italics; color:#6b6b6b; font-family:\'../fonts/Futura_Light_font.ttf\'" >'
        .$description.'</i></a><br><br>';
        $a = $a + 1;
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
                padding: 60px 0px 80px 0px;
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
        <script>document.getElementById("title").innerHTML = "Project Keep - Projects"</script>
    </body>
</html>