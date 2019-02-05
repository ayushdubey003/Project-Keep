<php>
</php>
</php><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Main Page</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/full-width-pics.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<style>
  #setBackground{
    background-image: url("images/nit.jpg");
    float: top;
    height: 200px;
    width :100%;
  }
  .butt{
    margin-left: 40%;
    background-color: #4CAF50;
    color:white;
    text-align: center;
    padding: 10px 20px 10px 20px;
    font-size: 24px;
    border: none;
    border-radius: 12px;
    font-family:"fonts/Futura_Light_font.ttf";
  }
  .butt:hover {background-color: #3e8e41}
  .butt:active {
    background-color: #3e8e41;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
  }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#">Welcome</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
          </div>
        </div>
      </nav>
  <header class="py-5 bg-image-full" id="setBackground">
    <img class="img-fluid d-block mx-auto" src="images/logo.png" alt="" style="height:100px;width:90px;padding-top: 0px;margin-top: 0px">
  </header>
  <section class="py-5">
    <div class="container">
      <button class="butt">Login as Student&nbsp;&nbsp;&nbsp</button><br><br>
      <button class="butt">Login as Professor</button><br><br>
      <button class="butt">Login as Admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button><br><br>
    </div>
  </section>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
