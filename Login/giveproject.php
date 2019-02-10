<?php
    session_start();
    if(!isset($_SESSION['professor']))
        die("You're not allowed to access this page");
    require("../header2.html");
?>
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
            margin-bottom: 20px;
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
<div class="container" style="height:400px;width:450px;padding-top:80px">
    <form action="giveproject.php" method="POST">
        Title * :<br> <input type="text" name="title" class="inp"><br>
        Description * :<br><input type="text" name="description" class="inp"><br>
        Deadline * :<br>
        Note: The time for submission will be set to 23:59:59 hrs<br>
        <input type="date" name="deadline" class="inp"><br><br>
        <input type="submit" name="submit" value="Submit" class="submit">
    </form>
</div>
<?php
    require "../Schema/dbconnect.php";
    if(isset($_POST['submit']))
    {
        $title=$_POST['title'];
        $description=$_POST['description'];
        $deadline=$_POST['deadline'];
        if(empty($title)||empty($description)||empty($deadline)){
            echo "<script type=text/javascript>
                alert('All Fields are compulsary');
            </script>";
            die();
        }
        $ts=strtotime($deadline);
        $ts=$ts-270*60-1;
        $ts=$ts+86400;
        if($ts<time())
        {
            echo "<script type=text/javascript>
                alert('Deadline time cannot be less than current time');
            </script>";
            die();
        }
        $username=$_SESSION['professor'];
        $sql="SELECT coursecode FROM professor WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
        $coursecode=$row['coursecode'];
        $query="INSERT INTO project (username,title,description,coursecode,deadline)
            VALUES('$username','$title','$description','$coursecode','$ts')";
        $uid=$coursecode+$title;
        if(mysqli_query($conn,$query))
            header("Location: profHome.php");
        else
            echo "<script type=text/javascript>
            Error connecting to database    
            </script>";
    }
?>