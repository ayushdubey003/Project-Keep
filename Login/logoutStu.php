<?php 
    session_start();
    unset($_SESSION['student']);
    require "../header.html";  
?>
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
        background-image: url("../images/back.jpg");
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
        margin-right:0%;
        font-size:24px;
        font-family:"../fonts/Futura_Light_font.ttf";
        width:320px;
        border-radius:3px;
        background: #3cbd0c;
        font-weight: bold;
    }
</style>
<body>
    <div class="container" style="height:200px;width:300px;margin-top:20%">
        <script>alert('Password Reset Successful!')</script>
        <a href="student.php"><button class="butt">Login</button></a>
    </div>
</body>