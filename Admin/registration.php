<?php 
    session_start();
    if(!isset($_SESSION['admin']))
        die("You 're not allowed to access this page");
    require '../header.html';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Main Page</title>
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/full-width-pics.css" rel="stylesheet">
        <link href="../css/custom.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
    </head>
    <style>
        .column1 {
            float: left;
            width: 50%;
            margin-top:8%;
        }
        .column2 {
            float: left;
            width: 50%;
            margin: 18% 0px 0% 0px;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .big{
            font-family:"../fonts/Futura_Light_font.ttf";
            font-weight:bold;
            font-size:78px;
            color:white;
            margin:50px 0px 0px 110px;
        }
        .medium{
            font-family:"../fonts/Futura_Light_font.ttf";
            font-size:32px;
            color:white;
            margin:50px 0px 0px 110px;
        }
        body{
            background-image: url("../images/back.jpg");
            background-color: black;
            padding: 20px 0px 0px 0px;
        }
        a, p{
            font-family:"../fonts/Futura_Light_font.ttf";
            font-size:18px;
            font-weight:bold;
            color:#6b6b6b;
        }
        .butt{
            margin-left:20%;
            font-size:24px;
            font-family:"../fonts/Futura_Light_font.ttf";
            width:320px;
            border-radius:3px;
            background: #3cbd0c;
            font-weight: bold;
        }
    </style>
    <body>
        <div class="row">
            <div class="column1">
                <section class="py-5">
                <div class="container">
                    <p class="big">Hello there, Administrator.<p>
                    
                </div>
            </div>
            <div class="column2">
                <div class="container">
                    <a href="student.php"><button class="butt">Register a Student&nbsp;&nbsp;&nbsp</button></a><br><br><br>
                    <a href="professor.php"><button class="butt">Register a Professor</button></a><br><br><br>
                    <a href="logout.php"><button class="butt">Logout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a><br><br>
                </div>
            </div>
        </div>
  </section>
    </body>
</html>