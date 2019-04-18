<?php
    session_start();
    include("../header.html");
    if(isset($_SESSION['student'])){
        include("../header.html");
        include("../Schema/dbconnect.php");
        $username=$_SESSION['student'];
        $query="SELECT * FROM student WHERE username='$username'";
        $result=mysqli_query($conn,$query);
        $firstname="";
        $lastname="";
        while($row=mysqli_fetch_assoc($result)){
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
        }
        echo '<br><br>
        <title>Welcome Page</title>
        <p style="padding-left:50px; font-size: 20px; font-family:\'../fonts/Futura_Light_font.ttf\'" >Welcome '.$firstname.' '.$lastname.'</p>';
    }
    else
        die("You are not allowed to access this page");
?>
<html>    
    <style>
        .column1 {
            float: left;
            width: 55%;
        }
        .column2 {
            float: left;
            width: 45%;
            margin: 22% 0px 0% 0px;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .big{
            font-family:"../fonts/Futura_Light_font.ttf";
            font-weight:bold;
            font-size:72px;
            color:white;
            margin:50px 0px 0px 110px;
        }
        .medium{
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
                            <p class="big">Hey there, Engineer<p>
                            <p class="medium">Welcome to the Keep. Keep was created by an ambitious little bastard by the name of Ayush Dubey. He wanted to create a portal for submission of assignments for his batch. So that's what he did. With Keep, you can view your pending assignments, or review the past projects you have submitted. Keep was created to have fun. Enjoy!</p>
                            <br>
                        </div>
                </div>
                <div class="container column2" style="height:400px;width:300px;">
                    <a href="viewpending.php"><button class="butt">View Pending Projects</button></a>
                    <br><br><a href="viewsubmitted.php"><button class="butt">View Submitted Projects</button></a>
                    <br><br><a href="resetpassword.php"><button class="butt">Reset Password</button></a>
                    <br><br><a href="logoutStudent.php"><button class="butt">Logout</button></a>
                </div>
        </div>
    </body>
</html>