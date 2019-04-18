<?php
    require "../header7.html";
?>
<html>
    <head>
        <title>Professor Portal</title>
    </head>
    <body>
    <style>
        .customform{
            border: 2px solid white;
            border-radius: 6px;
            padding:35px 25px 15px 25px;
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
        <div class="container customform" style="height:470px; width:300px;float: centre; margin-top: 100px; background-color:white ">
            <img class="img-fluid d-block mx-auto" src="../images/logo.jpg" alt="" style="height:100px;width:100px;">  
            <form action="professor.php" method= "POST"><p>
                Username:<br><input type="text" name="username" class="inp"><br><br>
                Password:<br><input type="password" name="password" class="inp"><br><br>
                <input type="submit" value="Log in" name="submit" style="margin-top:10px" align:centre class="submit"><br>
            </p></form>
        </div>
    </body>
</html>
<?php
    session_start();
    unset($_SESSION['professor']);
    require "../Schema/dbconnect.php";
    if(!isset($_SESSION['professor'])){
        if(isset($_POST['submit']))
        {
            $username=$_POST['username'];
            $password=$_POST['password'];
            if(empty($username)||empty($password)){
                echo "<script type='text/javascript'>
                    alert('Invalid Credentials');
                    </script>";
                die();
            }
            else{
                $enc_pass=md5($password);
                $sql = "SELECT * FROM professor WHERE username='$username' AND password='$enc_pass'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)==0)
                {
                    echo "<script type='text/javascript'>
                        alert('Invalid Credentials');
                        </script>";
                    die();
                }
                else
                {
                    $_SESSION['professor']=$username;
                    header("Location: profHome.php");
                }
            }
        }
    }
?>