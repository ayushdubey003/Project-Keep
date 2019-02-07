<?php 
    session_start();
    if(@$_SESSION['admin']!="admin")
        die("You 're not allowed to access this page");
    require '../header.html';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Main Page</title>
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/full-width-pics.css" rel="stylesheet">
        <link href="../css/custom.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
    </head>
    <body>
        <section class="py-5">
        <div class="container">
            <a href="student.php"><button class="butt">Register a Student&nbsp;&nbsp;&nbsp</button></a><br><br>
            <a href="professor.php"><button class="butt">Register a Professor</button></a><br><br>
            <a href="logout.php"><button class="butt">Logout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a><br><br>
        </div>
  </section>
    </body>
</html>