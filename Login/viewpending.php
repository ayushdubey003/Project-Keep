<?php
    session_start();
    if(!isset($_SESSION['student']))
        die("You are not allowed to access this page");
    require "../header3.html";
    require "../Schema/dbconnect.php";
    $var=time();
    $sql="SELECT * FROM project WHERE deadline>'$var'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==0)
    {
        echo '<div class="container" style="height:100% ;width:100%">
                <p style="text-align:center;padding:10%;font-size:30px;font-family:\'../fonts/Futura_Light_font.ttf\'">No projects as of now...Keep watching this space</p>
            </div> ';
        die();
    }
    $projects=array();
    $i=0;
    while($row=mysqli_fetch_assoc($result)){
        $var1=$row['coursecode'];
        $var2=$row['title'];
        $uid=$var1.$var2;
        $projects[$i]=$uid;
        $i++;
    }
    $username=$_SESSION['student'];
    for($j=0;$j<$i;$j++)
    {
        $query="SELECT * FROM submission WHERE uid='$projects[$j]' AND username='$username'";
        $res=mysqli_query($conn,$query);
        if(mysqli_num_rows($res)==0)
        {
            $que="INSERT INTO submission (username,submission,uid)
                VALUES('$username',NULL,'$projects[$j]')";
            mysqli_query($conn,$que);
        }
    }
    $query="SELECT * FROM submission WHERE submitted='0' AND username='$username'";
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res)==0)
    {
        echo '<div class="container" style="height:100% ;width:100%">
                <p style="text-align:center;padding:10%;font-size:30px;font-family:\'../fonts/Futura_Light_font.ttf\'">Your projects are complete..</p>
            </div> ';
        die();
    }
    else{
        echo '<p style="padding-top:5%">&nbsp;</p>';
        while($row=mysqli_fetch_assoc($res))
        {
            $var=$row['uid'];
            echo '<a href="submit.php?coursecode='.substr($var,0,5).'&amp;title='.substr($var,5).'" style="text-decoration:none;color:black"><p style="text-align:left;padding-bottom:2%%;padding-left:20%;padding-right:10%;font-size:20px;font-family:\'../fonts/Futura_Light_font.ttf\">'.substr($var,0,5).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.substr($var,5).'</a>';
        }
    }
?>