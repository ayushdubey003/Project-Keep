<title>File Upload</title>
<?php 
    session_start();
    if(!isset($_SESSION['student']))
        die("You are not allowed to access this page");
    if(isset($_POST['submit']))
    {
        $size=$_FILES['data']['size'];
        if($size==0)
        {
            die(Header("Location: viewpending.php"));
        }
        $type=$_FILES['data']['type'];
        if($type!='application/pdf')
        {
            die(Header("Location: viewpending.php"));
        }
        $tmp_name=$_FILES['data']['tmp_name'];
        $newname=time().'.pdf';
        if(move_uploaded_file($tmp_name,"../uploads/$newname"))
        {
            $path="../uploads/$newname";
            $username=$_SESSION['student'];
            $uid=$_SESSION['uid'];
            require "../header3.html";
            require "../Schema/dbconnect.php";
            $query="UPDATE submission SET submitted=1 WHERE username='$username' AND uid='$uid'";
            mysqli_query($conn,$query);
            $query="UPDATE submission SET file='$path' WHERE username='$username' AND uid='$uid'";
            $result=mysqli_query($conn,$query);
            echo '<div class="container" style="height:100% ;width:100%">
                <p style="text-align:center;padding:10%;font-size:30px;font-family:\'../fonts/Futura_Light_font.ttf\'">File uploaded succesfully....Plz do not reload this page..</p>
            </div> ';
        }
    }
?>