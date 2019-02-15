<?php 
    session_start();
    unset($_SESSION['professor']);
    require "../header.html";  
?>
<style>
        .butt{
            margin:10%;
            padding: 8px;
            margin:8px;
            text-align:center;
            width:100%;
        }
    </style>
<body>
    <div class="container" style="height:200px;width:300px;margin-top:7%">
        <p style="font-size:20px;font-family:'../fonts/Futura_Light_font.ttf'">&nbsp;&nbsp;Password Reset Succesful</p>
        <a href="professor.php"><button class="butt">Login</button></a>
    </div>
</body>