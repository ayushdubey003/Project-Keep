<title>Submitted Projects</title>
<?php
    session_start();
    require "../header3.html";
    require "../Schema/dbconnect.php";
    if(!isset($_SESSION['student']))
        die("You are not allowed to access this page");
    $username=$_SESSION['student'];
    $query="SELECT * FROM submission WHERE username='$username' AND submitted=1";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==0)
    {
        echo '<div class="container" style="height:100% ;width:100%">
                <p style="text-align:center;padding:10%;font-size:30px;font-family:\'../fonts/Futura_Light_font.ttf\'">You haven\'t submitted any projects..</p>
            </div> ';
        die();
    }
    echo '<br><br><br>';
    while($row=mysqli_fetch_assoc($result))
    {
        $path=$row['file'];
        $uid=$row['uid'];
        $coursecode=substr($uid,0,5);
        $title=substr($uid,5);
        echo '<a href='.$path.'
        style="text-decoration:none;color:black;padding-top:10px;padding-bottom:10px;"><p style="padding-left:50px;padding-top:2px; padding-left:30%;font-size: 20px; font-family:\'../fonts/Futura_Light_font.ttf\'" >'.$coursecode.
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        .$title.'</p></a>';
    }
?>