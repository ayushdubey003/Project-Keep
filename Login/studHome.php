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
        /*echo '<br><br>
        <title>Welcome Page</title>
        <p id = "greeting"; style="padding-left:50px; font-size: 30px; font-family:\'../fonts/Futura_Light_font.ttf\'; padding-top:75px;color:white" >Welcome '.$firstname.' '.$lastname.'</p>';
    */}
    else
        die("You are not allowed to access this page");
?>
<html>    
    <style>
        .column1 {
            float: left;
            width: 55%;
        }
        #greeting{
            margin: 0% 0px 0% 60px;
        }
        .column2  {
            float: left;
            width: 45%;
            margin: 12% 0px 0% 0px;
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
            font-size:38px;
            color:white;
            margin:50px 0px 0px 110px;
        }
        body{
            background-image: url("../images/back.jpg");
            background-color: black;
            background-position: centre centre;
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
                        <div class="container"><br><br>
                            <p class="big">Hey there, <?php echo $firstname?><p>
                            <p class="medium" id="gre">Whats on your mind today?
                            Look in the Keep if you have any more pending assignemensts.</p>
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

<?php
    include("../Schema/dbconnect.php");
    $countsub=(mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(username) FROM submission WHERE username='$username' AND submitted=1")));
    $countproj=(mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(username) FROM project")));
    $a = $countproj['count(username)'];
    $b = $countsub['count(username)'];
    //echo $a;
    //echo $b;

    echo '<script>if('.$b.'<'.$a.'){document.getElementById("gre").innerHTML="Whats on your mind today? Look in the Keep.We think you have some more pending assignemensts.";}else{document.getElementById("gre").innerHTML="Yipeee! You have no more pending assignments. Just relax and have a nice day .";}</script>';
?>
