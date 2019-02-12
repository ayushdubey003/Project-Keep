<title>View Page</title>
<?php 
    session_start();
    $username=$_SESSION['professor'];
    require "../header2.html";
    require "../Schema/dbconnect.php";
    $uid=$_GET['uid'];
    $query="SELECT * FROM submission WHERE uid='$uid' AND submitted=1";
    $result=mysqli_query($conn,$query);
    $num_rows=mysqli_num_rows($result);
    if($num_rows==0)
    {
        echo '<div class="container" style="height:100% ;width:100%">
                <p style="text-align:center;padding:10%;font-size:30px;font-family:\'../fonts/Futura_Light_font.ttf\'">No submissions received for this assignment..</p>
            </div> ';
        die();
    }
    echo '<p style="text-align:left;padding-top:20px;padding-left:5%;font-size:20px;font-family:\'../fonts/Futura_Light_font.ttf\'">Total Submissions received = '.$num_rows.'</p>';
    while($row=mysqli_fetch_assoc($result))
    {
        $path=$row['file'];
        $name=$row['username'];
        echo '<a href='.$path.'
        style="text-decoration:none;color:black;padding-top:10px;padding-bottom:10px;"><p style="padding-left:50px;padding-top:2px; padding-left:30%;font-size: 20px; font-family:\'../fonts/Futura_Light_font.ttf\'" >Submission by '.$name.
        '</p></a>';
    }
?>
