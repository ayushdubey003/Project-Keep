<?php
  require "header.html";
  require "Schema/createdb.php";
  require "Schema/professor_projects.php";
  require "Schema/professor.php";
  require "Schema/student_submissions.php";
  require "Schema/student.php";
?>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Main Page</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/full-width-pics.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <section class="py-5">
    <div class="container">
      <a href="Login/student.php"><button class="butt">Login as Student&nbsp;&nbsp;&nbsp</button></a><br><br>
      <a href="Login/professor.php"><button class="butt">Login as Professor</button></a><br><br>
    </div>
  </section>
</body>
</html>
