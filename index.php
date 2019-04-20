<?php
  require "headeri.html";
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
  <div class="row">  
  <div class="column1">
        <section class="py-5">
        <div class="container">
            <p class="big">Welcome to the Keep!<p>
            <p class="medium">Project Keep is an assignment submission portal for a classroom. Keep enables its registered teachers to create assignments for their students, to be completed before a due date.</p>
            <br>
        </div>
    </div>
    <div class="container column2" style="height:400px;width:280px;">
      <div class="container">
        <a href="Login/student.php"><button class="butt">Login as Student&nbsp;&nbsp;&nbsp</button></a><br><br>
        <a href="Login/professor.php"><button class="butt">Login as Professor</button></a><br><br>
      </div>
    </div>
</div>
  </section>
</body>
<style>
  .column1 {
      float: left;
      width: 55%;
  }
  .column2 {
      float: left;
      width: 45%;
      margin: 18% 0px 0% 0px;
  }
  .row:after {
      content: "";
      display: table;
      clear: both;
  }
  .big{
      font-family:"../fonts/Futura_Light_font.ttf";
      font-weight:bold;
      font-size:72px;
      color:white;
      margin:50px 0px 0px 110px;
  }
  .medium{
      font-size:32px;
      color:white;
      margin:50px 0px 0px 110px;
  }
  body{
      background-image: url("images/back.jpg");
      background-color: black;
      padding: 20px 0px 0px 0px;
  }
  a, p{
      font-family:"../fonts/Futura_Light_font.ttf";
      font-size:18px;
      font-weight:bold;
      color:#6b6b6b;
  }
  .butt{
      margin-left:20%;
      font-size:24px;
      font-family:"../fonts/Futura_Light_font.ttf";
      width:320px;
      border-radius:3px;
      background: #3cbd0c;
      font-weight: bold;
  }
</style>
</html>
