<?php
session_start();
if(isset($_SESSION['loggedin'])){
    $userId = $_SESSION['user_id'];
    header("Location: account.php?id=".$userId);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
    <meta content="text/html">
    <title>StudyHelper</title>

    <script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
    <link href="assets/css/site.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<ul class="onepage-buttons">
    <li>
        <a class="onepage-home-button" role="button"">
            <img class="onepage-home-image" src="./assets/images/home_button.png">
        </a>
        <a class="onepage-info-button" role="button"">
        <img class="onepage-info-image" src="./assets/images/info_button.png">
        </a>
    </li>
</ul>
<div class="homeBackground-wrapper background-cover">
    <div class="menu-wrapper">
        <div class="container text-center" id="nav-container">
            <img class="logo-img" src="assets/images/studyhelper_logo.png" alt="Logo">
        </div>
    </div>
    <div class="homepage-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 hidden-xs hidden-sm button-col-small">
                    <a href="login.php" class="scholier_button" role="button">
                        <img class="Web_Login_Button" src="assets/images/inloggen.png" alt="Login pagina voor scholieren">
                    </a>
                    <a href="register.php" class="student_button" role="button">
                        <img class="Web_Register_Button" src="assets/images/register.png" alt="Login pagina voor studenten">
                    </a>
                    <a class="meerinfo_button" role="button">
                        <img class="Web_MeerInfo_Button" src="assets/images/meerinfo_button.png" alt="Slide down voor meer informatie">
                    </a>
                </div>
                <div class="col-xs-12 visible-sm visible-xs button-col-small">
                    <a href="login.php" class="scholier_button" role="button">
                        <img class="Mob_Login_Button" src="assets/images/inloggen.png" alt="Login pagina voor scholieren">
                    </a>
                    <a href="register.php" class="student_button" role="button">
                        <img class="Mob_Register_Button" src="assets/images/register.png" alt="Login pagina voor studenten">
                    </a>
                    <a class="meerinfo_button" role="button">
                        <img class="Mob_MeerInfo_Button" src="assets/images/meerinfo_button.png" alt="Slide down voor meer informatie">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="meerInfo">
    <div class="container">
        <div class="row">
            <div class="ontdek_site_text">
                <h1>Wat is StudyHelper?</h1>
                <div class="col-md-12 ontdek_intro">
                    Je vraagt je vast af wat StudyHelper voor jou kan betekenen!

                    <div class="ontdek_scholieren">
                        <img class="voorscholieren" src="assets/images/scholier.png" alt="voor scholieren"><br/><br/>
                        Zit jij in het 5e jaar of 6e jaar van de middelbare school en wil jij hierna gaan studeren? Dan is dit de ideale platform voor jou!
                        StudyHelper biedt jou de ervaringen van de huidige studenten. Bekijk de foto's die door de studenten zijn gefotografeerd (wat betreft studie)
                        en misschien kom jij iets interessants tegen!
                    </div>
                    <div class="ontdek_studenten">
                        <img class="voorstudenten" src="assets/images/student.png" alt="voor studenten"><br/><br/>
                        Als student maak jij de tofste dingen tijdens je studie! Deel je creaties, idee&euml;n, presentaties etc. met de alle scholieren. Scholieren
                        kunnnen hierdoor op basis van jouw ervaringen een leuke studie kiezen. Hierdoor verminderen wij het aantal studenten die van studie wisselen!
                        Help de scholieren, ons en het maatschappij mee!
                    </div>
                </div>
                <div class="instagram_example col-md-6 pull-right">
                    <div class="instagram_example1">
                        <iframe width="300" height="400" src="//instagram.com/p/a-lShyL2ey/embed/" frameborder="0" scrolling="no" allowtransparency="true"></iframe>
                    </div>
                    <div class="instagram_example2">
                        <iframe width="300" height="400" src="//instagram.com/p/abGOz5LGi7/embed/" frameborder="0" scrolling="no" allowtransparency="true"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function()
    {
        $('.Web_MeerInfo_Button').on('click', function(){
            $('html, body').animate({scrollTop: $('.meerInfo').offset().top -0 }, 'slow');
        });
        $('.Mob_MeerInfo_Button').on('click', function(){
            $('html, body').animate({scrollTop: $('.meerInfo').offset().top -0 }, 'slow');
        });
        $('.onepage-home-image').on('click', function(){
            $('html, body').animate({scrollTop: $('.homepage-wrapper').offset().top -450 }, 'slow');
        });
        $('.onepage-info-image').on('click', function(){
            $('html, body').animate({scrollTop: $('.meerInfo').offset().top -0 }, 'slow');
        });
    });
</script>
</body>