<?php
    session_start();
    if(isset($_SESSION['professor'])){
        include("../header.html");
        include("../Schema/dbconnect.php");
        $username=$_SESSION['professor'];
        $query="SELECT * FROM professor WHERE username='$username'";
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
        <div class="container" style="height:400px;width:280px;">
            <a href="giveproject.php"><button class="butt">Give Project</button></a>
            <a href="reviewproject.php"><button class="butt">Previous Projects</button></a>
            <a href="resetprof.php"><button class="butt">Reset Password</button></a>
            <a href="logoutProfessor.php"><button class="butt">Logout</button></a>
        </div>
    </body>
</html>