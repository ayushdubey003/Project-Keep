<title>Admin Login</title>
<?php
    session_start();
    require ("../header.html");
?>
<html>
    <head></head>
    <body>
    <style>

        .loginform{
            border: 2px solid white;
            border-radius: 6px;
            padding:35px 25px 15px 25px;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16), 0 0 0 1px rgba(0, 0, 0, 0.08);
        }

        a, p{
            font-family:"../fonts/Futura_Light_font.ttf";
            font-size:18px;
            font-weight:bold;
            color:#6b6b6b;
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
        .submit:hover {background-color: #37a90b}
        .submit:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        body{
            background-image: url("../images/back.jpg");
            background-color: black;
            padding: 20px 0px 0px 0px;
        }
    </style>
        <div class="container loginform" style="height:500px; width:320px;float: centre; margin-top: 100px; background-color:white ">
            <img class="img-fluid d-block mx-auto" src="../images/logo.jpg" alt="" style="height:100px;width:100px;">  
            <form action="admin.php" method= "POST">
                <p>Username:<input type="text" name="username" class="inp"></p><br>
                <p>Password:<input type="password" name="password" class="inp"></p><br>
                <input style="margin-top:10px;" type="submit" value="Log in" name="submit" align:centre class="submit"><br>
            </form>
        </div>
    </body>
</html>
<?php
    @session_start();
    unset($_SESSION['admin']);
    if(!isset($_SESSION['admin'])){
        if(isset($_POST['submit']))
        {
            $username=$_POST['username'];
            $password=$_POST['password'];
            if(empty($username)||empty($password)){
                echo "<script type='text/javascript'>
                    alert('Invalid Credentials');
                    </script>";
                header("Location: logout.php");
                die();
            }
            if($username=="admin"&&$password=="1234")
            {
                $_SESSION["admin"]="admin";
                $registration="registration.php";
                header("Location: $registration");
            }
            else{
                echo "<script type='text/javascript'>
                    alert('Invalid Credentials');
                    </script>";
                die();
            }
        }
    }
    else
        header("Location: registration.php");
?>