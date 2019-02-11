<title>Submission Page</title>
<?php 
    session_start();
    $username=$_SESSION['student'];
    require "../header3.html";
    require "../Schema/dbconnect.php";
    $coursecode=$_GET['coursecode'];
    $title=$_GET['title'];
    $_SESSION['uid']=$coursecode.$title;
    $query="SELECT * FROM project WHERE coursecode='$coursecode' AND title='$title'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);
    $description=$row['description'];
    echo '<div class="container" style="height:200px;width:80%;padding-top:5%">';
        echo '<p style="padding-left:50px; font-size: 20px; font-family:\'../fonts/Futura_Light_font.ttf\'">Course Code  : '.$coursecode.'</p>';
        echo '<p style="padding-left:50px; font-size: 20px; font-family:\'../fonts/Futura_Light_font.ttf\'">Title  : '.$title.'</p>';
        echo '<p style="padding-left:50px; font-size: 20px; font-family:\'../fonts/Futura_Light_font.ttf\'">Description  : '.$description.'</p>';
    echo "</div>";
?>
<form method="POST" action="upload.php" enctype="multipart/form-data">
    <input style="margin-left:200px;padding-top: 5%" type="file" name="data" accept="application/pdf"/><br>
    <input style="margin-left:200px;margin-top: 1.5%" name="submit" value="Submit" type="submit"/>
</form>