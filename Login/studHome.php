<?php
    session_start();
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
        .butt{
            padding: 8px;
            margin:8px;
            text-align:center;
            width:100%;
        }
    </style>
    <body>
        <div class="container" style="height:400px;width:300px;">
            <a href="viewpending.php"><button class="butt">View Pending Projects</button></a>
            <a href="viewsubmitted.php"><button class="butt">View Submitted Projects</button></a>
            <a href="logoutStudent.php"><button class="butt">Logout</button></a>
        </div>
    </body>
</html>