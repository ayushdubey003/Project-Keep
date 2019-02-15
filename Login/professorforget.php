<?php 
    require "../header8.html";
?>
<html>
    <head>
        <title>Forgot Password</title>
    </head>
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
        <div class="container" style="height:400px;width:300px;padding-top:10%">
            <form action="professorforget.php" method="POST">
                Username:<br><input type="email" name="username" style="width:100%" class="inp">
                <br>
                <input type="submit" name="submit" value="Submit" class="submit">
            </form>
        </div>
    </body>
</html>
<?php
    require "../Schema/dbconnect.php";
    if(isset($_POST['submit']))
    {
        $username=$_POST['username'];
        if(empty($username))
        {
            echo "<script type='text/javascript'>
                    alert('Username cannot be empty');
                </script>";
            die();
        }
        $query="SELECT * FROM professor WHERE username='$username'";
        $result=mysqli_query($conn,$query);
        $num_rows=mysqli_num_rows($result);
        if($num_rows==0)
        {
            echo "<script type='text/javascript'>
                    alert('You are not registered !');
                </script>";
            die();
        }
        $password=rand(10000,99999);
        $mod=1000000007;
        for($i=0;$i<5;$i++)
        {
            $password=$password*rand(10000,99999);
            $password=$password%$mod;
        }
        $encpassword=md5($password);
        $subject="Do not Reply";
        $text="Dear User,\nYour username is $username and password is $password. Please use it to Login in the future";
        $headers="From: ayushdubey957@gmx.com";
        if(mail($username,$subject,$text,$headers)){
            //do nothing
        }
        else
        {
            echo "<script type='text/javascript'>
            alert('Error sending mail');
            </script>";
            die();
        }
        $sql="UPDATE professor SET password='$encpassword' WHERE username='$username'";
        if(mysqli_query($conn, $sql))
            header ("Location: checkpointprof.php");
    }
?>