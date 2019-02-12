<title>Review Projects</title>
<?php
    session_start();
    require "../header2.html";
    require "../Schema/dbconnect.php";
    if(!isset($_SESSION['professor']))
        die("You are not allowed to access this page");
    $username=$_SESSION['professor'];
    $query="SELECT * FROM project WHERE username='$username'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==0)
    {
        echo '<div class="container" style="height:100% ;width:100%">
                <p style="text-align:center;padding:10%;font-size:30px;font-family:\'../fonts/Futura_Light_font.ttf\'">You haven\'t given any assignments..</p>
            </div> ';
        die();
    }
    echo '<br><br><br>';
    while($row=mysqli_fetch_assoc($result))
    {
        $title=$row['title'];
        $description=$row['description'];
        $uid=$row['coursecode'].$title;
        echo '<a href="view.php?uid='.$uid.
        '" style="text-decoration:none;color:black;padding-top:10px;padding-bottom:10px;"><p style="padding-top:2px; padding-left:30px;padding-right:30px;font-size: 20px; font-family:\'../fonts/Futura_Light_font.ttf\'" >'.$title.
        '<br>'
        .$description.'</p></a>';
    }
?>