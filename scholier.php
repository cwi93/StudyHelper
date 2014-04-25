<?php
/**
* Created by PhpStorm.
* User: cwi93
* Date: 15-04-14
* Time: 11:19
*/
include 'config.php';
require 'instagram.class.php';
require 'instagram.config.php';

session_start();
if(!isset($_SESSION['loggedin'])){
header('location:login.php');
exit();
}

if(isset($_POST['school']) && $_POST['opleiding']) {
    $instagramAutoLogin = mysql_query('SELECT instagram_id FROM studyhelpergebruiker WHERE school = "' . $_POST['school'] . '" AND opleiding = "' . $_POST['opleiding'] . '"') or die (mysql_error());
    $ervaring = mysql_query('SELECT ervaring FROM studyhelpergebruiker WHERE school = "' . $_POST['school'] . '" AND opleiding = "' . $_POST['opleiding'] . '"') or die (mysql_error());
}
else
{
    $instagramAutoLogin = mysql_query("SELECT instagram_id FROM studyhelpergebruiker") or die (mysql_error());
    $ervaring = mysql_query("SELECT ervaring FROM studyhelpergebruiker") or die (mysql_error());
}

$schoolquery = mysql_query("SELECT * FROM school") or die (mysql_error());
$opleidingquery = mysql_query("SELECT * FROM opleiding") or die (mysql_error());
$userquery = mysql_query("SELECT school FROM studyhelpergebruiker") or die (mysql_error());

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="text/html">
    <title>StudyHelper</title>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link href="assets/css/site.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="assets/js/modernizr.custom.26633.js"></script>
</head>
<body>
<div id="scholier">
    <div class="OnePagerScholieren">
        <div class="menu-wrapper">
            <div class="container text-center" id="nav-container">
                <img class="profile-logo" src="assets/images/studyhelper_logo.png" alt="Logo">
                <div class="row">
                    <div class="col-md-12 hidden-xs hidden-sm button-col-small">
                        <div class="Web_settingDropdown input-group-btn pull-right">
                            <li class="dropdown">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Instellingen<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo 'scholierAccount.php?id=';echo $_SESSION['user_id'];?>">Mijn Account</a></li>
                                    <li><a href="logout.php">Uitloggen</a></li>
                                </ul>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 visible-sm visible-xs button-col-small">
                    <div class="Mob_settingDropdown input-group-btn text-center">
                        <li class="dropdown">
                            <a class="dropdown-toggle mob_dropdown" data-toggle="dropdown"><img class="Mob_settings" src="assets/images/settings.png" alt="mob settingspicture"></a>
                            <ul class="dropdown-menu mob_dropdown_settings">
                                <li><a href="<?php echo 'scholierAccount.php?id=';echo $_SESSION['user_id'];?>">Mijn Account</a></li>
                                <li><a href="logout.php">Uitloggen</a></li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="dropdownFilter">
                <div class="col-md-2"></div>
                <form class="form-horizontal" action="" method="post">
                    <div class="col-md-4">
                        <select class="form-control" name="school">
                            <?php
                            echo '<option selected value="'.$_POST['school'].'">'.$_POST['school'].'</option>';
                            echo '<option value=""></option>';
                            while ($row = mysql_fetch_array($schoolquery))
                            {
                                $school = $row["school"];
                                echo '<option  value="'.$school.'">'.$school.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" name="opleiding">
                            <?php
                            echo '<option selected value="'.$_POST['opleiding'].'">'.$_POST['opleiding'].'</option>';
                            echo '<option value=""></option>';
                            while ($row = mysql_fetch_array($opleidingquery))
                            {
                                $opleiding = $row["opleiding"];
                                echo '<option  value="'.$opleiding.'">'.$opleiding.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-default btn-sm" type="submit" id="filter">Zoek</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="instgramPhotos">
                    <section class="main">
                        <div id="ri-grid" class="ri-grid ri-grid-size-3">
                            <ul>
                                <?php
                                $tag = 'studyhelper';
                                $instagramPhotos = $instagram->getTagMedia($tag);
                                while(list($id) = mysql_fetch_row($instagramAutoLogin))
                                {
                                    foreach ($instagramPhotos->data as $instagramPicture)
                                    {
                                        if ($instagramPicture->caption->from->id == $id)
                                        {
                                            echo "<li><a><img class=\"instagramTimeline\" src=\"{$instagramPicture->images->thumbnail->url}\"></a></li>";
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="reviews">
                <h2 class="text-center">Reviews</h2>
                <div id="slides">
                    <?php
//                    while(list($id) = mysql_fetch_row($instagramAutoLogin))
//                    {
                    while ($row = mysql_fetch_array($ervaring))
                    {
                        $showErvaring = $row["ervaring"];
                        if ($showErvaring == true)
                        {
                            if($instagramAutoLogin == true)
                            {
                                echo "<li>$showErvaring</li>";
                            }
                        }
                    }
//                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.gridrotator.js"></script>
<script src="assets/js/jquery.slides.min.js"></script>
<script type="text/javascript">
    $(function() {
        $( '#ri-grid' ).gridrotator( {
            rows : 2,
            columns : 6,
            maxStep : 2,
            interval : 2000,
            w1024 : {
            rows : 2,
            columns : 6
            },
            w768 : {
            rows : 3,
            columns : 4
            },
            w480 : {
            rows : 3,
            columns : 3
            },
            w320 : {
            rows : 4,
            columns : 2
            },
            w240 : {
            rows : 3,
            columns : 3
            }
        } );
    });
</script>
<script>
    $(function() {
        $('#slides').slidesjs({
            height        : 150,
            width         : 620,
            responsive    : true
        });
    });
</script>
</body>
</html>
