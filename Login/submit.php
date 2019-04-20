<title>Submission Page</title>
<?php 
    session_start();
    $username=$_SESSION['student'];
    require "../header3.html";
    require "../Schema/dbconnect.php";
    echo '<script>document.getElementById("title").innerHTML="Project Keep - Submit"</script>';
    $coursecode=$_GET['coursecode'];
    $title=$_GET['title'];
    $_SESSION['uid']=$coursecode.$title;
    $query="SELECT * FROM project WHERE coursecode='$coursecode' AND title='$title'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);
    $description=$row['description'];
    echo '<div class="container" style="height:200px;width:80%;padding-top:5%">';
        echo '<p style="font-weight:bold;padding-left:50px; font-size: 26px; font-family:\'../fonts/Futura_Light_font.ttf\'">Course Code  : '.$coursecode.'</p>';
        echo '<i style="padding-left:50px;font-weight:bold; font-size: 20px; font-family:\'../fonts/Futura_Light_font.ttf\'">Title  : '.$title.'</i><br>';
        echo '<i style="padding-left:50px; font-size: 17px; font-family:\'../fonts/Futura_Light_font.ttf\'">Description  : '.$description.'</i>';
        echo '<form method="POST" action="upload.php" enctype="multipart/form-data">
        <input style="margin-left:50px;padding-top: 5%" type="file" name="data" accept="application/pdf"/><br>
        <input style="margin-left:50px;margin-top: 1.5%" name="submit" value="Submit" type="submit"/>
        </form>';
    echo "</div>";
?>
<style>
            .project{
                color:#6b6b6b;
            }
            .logo{
                border: 0px solid white;
                border-radius: 25px;
            }
            .customform{
                border: 2px solid white;
                border-radius: 6px;
                background: white;
                padding:35px 30px 15px 30px;
                margin-top:50px;
                box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16), 0 0 0 1px rgba(0, 0, 0, 0.08);
            }
            body{
                
            }
            .brand-name{
                font-weight:bold;
            }
            a, p, li, ol, i, input{
                font-family:"../fonts/Futura_Light_font.ttf";
                font-size:20px;
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
