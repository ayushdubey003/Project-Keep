<title>Project Section</title>
<?php
    session_start();
    if(!isset($_SESSION['professor']))
        die("You're not allowed to access this page");
    require("../header2.html");
?>
<style>
    .customform{
        border: 2px solid white;
        border-radius: 6px;
        background: white;
        padding:35px 30px 15px 30px;
        margin-top:50px;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16), 0 0 0 1px rgba(0, 0, 0, 0.08);
    }
    body{
        background-image: url("../images/back.jpg");
        background-color: black;
        padding: 60px 0px 80px 0px;
        background-position: center center;
    }
    .brand-name{
        font-weight:bold;
    }
    a, p{
        font-family:"../fonts/Futura_Light_font.ttf";
        font-size:18.5px;
        color:#6b6b6b;
    }
    .note{
        font-family:"../fonts/Futura_Light_font.ttf";
        font-size:15px;
        color:#6b6b6b;
    }
    .b{
        font-size:19px;
        color: #8c8e8c ;
    }
    .inp
    {
        width:100%;
        height:50px;
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
<div class="container customform" style="height:680px;width:460px;">
    <img class="img-fluid d-block mx-auto" src="../images/logo.jpg" alt="" style="height:100px;width:100px;">
    <form action="giveproject.php" method="POST">
        <p>Title * :<br> <input type="text" name="title" class="inp"><br><br>
        Description * :<br><input type="text" name="description" class="inp"><br><br>
        Deadline * :
        <p class="note"><i>Note: The time for submission will be set to 23:59:59 hrs</i></p>
        <input type="date" name="deadline" class="inp"><br><br><br>
        <input type="submit" name="submit" value="Submit" class="submit" style="margin-left:38%;"></p>
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