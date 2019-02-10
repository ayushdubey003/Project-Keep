<?php
    session_start();
    require ("../header.html");
?>
<html>
    <head></head>
    <body>
    <style>
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
            background-color: #4CAF50;
            color:white;
            text-align: center;
            padding: 10px 20px 10px 20px;
            font-size: 15px;
            border: none;
            font-family:"../fonts/Futura_Light_font.ttf";
        }
        .submit:hover {background-color: #3e8e41}
        .submit:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
    </style>
        <div class="container" style="height:400px; width:300px;float: centre; margin-top: 100px; background-color:white ">
            <form action="admin.php" method= "POST">
                Username:<br><input type="text" name="username" class="inp"><br>
                Password:<br><input type="password" name="password" class="inp"><br><br>
                <input type="submit" value="Log in" name="submit" align:centre class="submit"><br>
            </form>
        </div>
    </body>
</html>
<?php
    @session_start();
    if(!isset($_SESSION['admin'])){
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