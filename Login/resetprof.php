<?php
    session_start();
    if(!isset($_SESSION['professor']))
    {
        die("You are not allowed to access this page");
    }
    require "../header2.html";  
?>
<html>
    <head>
        <title>Password Reset Page</title>
    </head>
    <body>
        <style>
                .customform{
                border: 2px solid white;
                border-radius: 6px;
                padding:35px 30px 15px 30px;
                box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16), 0 0 0 1px rgba(0, 0, 0, 0.08);
            }
            body{
                background-image: url("../images/back.jpg");
                background-color: black;
                padding: 60px 0px 80px 0px;
            }
            .brand-name{
                font-weight:bold;
            }
            a, p{
                font-family:"../fonts/Futura_Light_font.ttf";
                font-size:18px;
                color:#6b6b6b;
            }
            .b{
                font-size:19px;
                color: #8c8e8c ;
            }
            .inp
            {
                width:100%;
                height:40px;
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
        <div class="container customform" style="height:640px; width:420px;float: centre; margin-top: 100px; background-color:white ">
            <img class="img-fluid d-block mx-auto" src="../images/logo.jpg" alt="" style="height:100px;width:100px;">  
            <form action="resetprof.php" method="POST">
                <p>Old Password *: <br> <input type= "password" name="oldpassword" class="inp" ><br><br><br>
                New Password *: <br> <input type= "password" name="newpassword" class="inp"><br><br><br>
                Confirm Password *: <br> <input type= "password" name="confirmpassword" class="inp"><br><br><br>
                <input type="submit" value="Submit" name="sub" align:centre class="submit"><br><br>
            </p></form>
        </div>
    </body>
    <script>
        document.getElementById("title").innerHTML = "Project Keep - Reset Password"
    </script>
</html>
<?php
    if(isset($_POST['sub'])){
        $oldpass=$_POST['oldpassword'];
        $newpass=$_POST['newpassword'];
        $confirmpass=$_POST['confirmpassword'];
        $username=$_SESSION['professor'];
        if(empty($oldpass)||empty($newpass)||empty($confirmpass))
        {
            echo "<script type='text/javascript'>
                    alert('All fields are compulsary');
                </script>";
            die();
        }
        require "../Schema/dbconnect.php";
        $query="SELECT * FROM professor WHERE username='$username'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result))
            $old_pass=$row['password'];
        if($old_pass!=md5($oldpass))
        {
            echo "<script type='text/javascript'>
                    alert('Old password entered does not match');
                </script>";
            die();
        }
        if($newpass!=$confirmpass)
        {
            echo "<script type='text/javascript'>
                    alert('Field 2 and 3 must match');
                </script>";
            die(); 
        }
        $len=strlen($newpass);
        if($len<6||len>15)
        {
            echo "<script type='text/javascript'>
                    alert('Password length must be between 6 and 15 characters');
                </script>";
            die(); 
        }
        $enc_password=md5($newpass);
        $old_enc_pass=md5($oldpass);
        $sql="UPDATE professor SET password='$enc_password' WHERE username='$username' AND password='$old_enc_pass'";
        if(mysqli_query($conn,$sql))
        {
            header("Location: logoutProf.php");
        }
    }
?>