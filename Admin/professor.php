<?php 
    session_start();
    if(@$_SESSION['admin']!="admin")
        die("You 're not allowed to access this page");
    require '../header.html';
?>
<html>
    <head>
        <title>Professor Registration Page</title>
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
            .dropdown{
                width:270px;
                height:40px;
            }
        </style>
        <div class="container" style="height:400px; width:300px;float: centre; margin-top: 100px; background-color:white ">
            <form action="professor.php" method="POST">
                E-mail Id ( It will be used as username ): <br> <input type= "text" name="username"class="inp" ><br>
                First Name: <br> <input type= "text" name="firstname" class="inp"><br>
                Last Name: <br> <input type= "text" name="lastname" class="inp">
                Course Code: &nbsp;
                <select name="coursecode" class="dropdown">
                    <option value="">Select</option>
                    <option value="CS401" name="CS401">CS401 (Database Management System)</option>
                    <option value="CS402" name="CS401">CS402 (Theory Of Computation)</option>
                    <option value="CS403" name="CS401">CS403 (Microprocessors and Interfacing)</option>
                    <option value="CS404" name="CS401">CS404 (Data Communication)</option>
                    <option value="CS405" name="CS401">CS405 (Software Engineering)</option>
                </select><br><br>
                <input type="submit" value="Submit" name="sub" align:centre class="submit">
            </form>
        </div>
    </body>
</html>
<?php
    @session_start();
    if(isset($_POST['sub']))
    {
        $_SESSION['admin']="admin";
        $username=$_POST['username'];
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $coursecode=$_POST['coursecode'];
        if(empty($username)||empty($firstname)||empty($lastname)||empty($coursecode)){
            echo "<script type='text/javascript'>
                alert('Invalid Credentials');
                </script>";
            die();
        }
        if (!preg_match("/^[a-zA-Z]*$/",$firstname)||!preg_match("/^[a-zA-Z]*$/",$lastname)) {
            echo "<script type='text/javascript'>
            alert('Only Letters allowed');
            </script>";
            die();
        }
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            echo "<script type='text/javascript'>
            alert('Invalid e-mail format');
            </script>";
            die(); 
        }
        require "../Schema/dbconnect.php";
        $password=rand(10000,99999);
        $mod=1000000007;
        for($i=0;$i<5;$i++)
        {
            $password=$password*rand(10000,99999);
            $password=$password%$mod;
        }
        $encpassword=md5($password);
        $query="SELECT * FROM professor WHERE username='$username'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0)
        {
            echo "<script ype='text/javascript'>
            alert('Username already exists');
            </script>";
            die();
        }
        $sql="INSERT INTO professor (username,password,firstname,lastname,coursecode)
        VALUES('$username','$encpassword','$firstname','$lastname','$coursecode')";
        mysqli_query($conn, $sql);
        $subject="Do not Reply";
        $text="Dear User,\nYour username is $username and password is $password. Please use it to Login in the future";
        $headers="From: ayushdubey957@gmx.com";
        if(mail($username,$subject,$text,$headers)){
            echo "<script type='text/javascript'>
            alert('Mail Sent');
            </script>";
            die(); 
        }
        else
            echo "Error sending mail";
    }
?>