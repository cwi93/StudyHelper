<?php
/**
 * Created by PhpStorm.
 * User: cwi93
 * Date: 15-04-14
 * Time: 11:19
 */
include_once('header.phtml');
include ('config.php');
require 'instagram.class.php';
require 'instagram.config.php';

session_start();
if(!isset($_SESSION['loggedin'])){
    header('location:login.php');
    exit();
}
$userId = $_SESSION['user_id'];
$instagramAutoLogin = mysql_query("SELECT * FROM studyhelpergebruiker WHERE id = '$userId' ") or die (mysql_error());
$loginUrl = $instagram->getLoginUrl();

while ($row = mysql_fetch_array($instagramAutoLogin)) {
    $instaId = $row["instagram_id"];
    $instaToken = $row["instagram_access_token"];
    if (empty($_SESSION['userdetails']))
    {
        if ($instaId == true)
        {
            header ('Location:'.$loginUrl);
        }
    }
}
?>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link href="assets/css/site.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="assets/js/modernizr.custom.26633.js"></script>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-12 hidden-xs hidden-sm button-col-small">
            <div class="Web_settingDropdown input-group-btn pull-right">
                <li class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Instellingen<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo 'studentAccount.php?id=';echo $_SESSION['user_id'];?>">Mijn Account</a></li>
                        <li><a href="logout.php">Uitloggen</a></li>
                    </ul>
                </li>
            </div>
        </div>
        <div class="col-xs-12 visible-sm visible-xs button-col-small">
            <div class="Mob_settingDropdown input-group-btn text-center">
                <li class="dropdown">
                    <a class="dropdown-toggle mob_dropdown" data-toggle="dropdown"><img class="Mob_settings" src="assets/images/settings.png" alt="mob settingspicture"></a>
                    <ul class="dropdown-menu mob_dropdown_settings">
                        <li><a href="<?php echo 'studentAccount.php?id=';echo $_SESSION['user_id'];?>">Mijn Account</a></li>
                        <li><a href="logout.php">Uitloggen</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="text-center">
            <?php
            if (empty($_SESSION['userdetails']))
            {
                $loginUrl = $instagram->getLoginUrl();
                echo "<a class=\"btn btn-warning loginIGButton\" href=\"$loginUrl\"><h3>Login met Instragram</h3></a>";
                ?>
                <button type="button" class="help_button btn btn-danger btn-md pull-left" data-html="true" data-toggle="popover" data-placement="bottom"
                        data-content="Het delen van je studie ervaringen is erg simpel en snel.<br> Je hebt de eerste stap, het inloggen al voltooid!<br><br>
                 Klik nu op de oranje 'Login met Instagram' knop en koppel je account aan Instagram.<br>  Vergeet niet om je Account
                  bij te werken met je huidige studie en school!"Login >
                    HELP!
                </button><br/>
                <script type="text/javascript">
                    $('[data-toggle="popover"]').popover();
                </script>
                <?php
            }
            else
            {
                ?>
                <button type="button" class="help_button btn btn-danger btn-md pull-left" data-html="true" data-toggle="popover" data-placement="bottom"
                        data-content="Gefeliciteerd! Je account is nu gekoppeld aan je Studyhelper account!<br> Deel je studiefoto's m.b.v. de hashtag #studyhelper<br/><br/>
                        Vergeet niet om je Accountbij te werken met je huidige studie en school!"Login >
                    HELP!
                </button><br/>
                <script type="text/javascript">
                    $('[data-toggle="popover"]').popover();
                </script>
                <?php
                $data=$_SESSION['userdetails'];

                ?><h3><?php echo 'Welkom ' .$data->user->username; ?></h3><?php
                echo "<div style='float:center; margin-left:0px'><img style='border: #FFF solid;' src=\"{$data->user->profile_picture}\" ></div>";

                $instagram->setAccessToken($data);
            }
            if (!empty($_SESSION['userdetails']))
            {
            ?>
            <h3>Your Photos</h3>
            <div class="col-md-2"></div>
            <div class="col-md-12">
                <div class="instgramPhotos">
                    <section class="main">
                        <div id="ri-grid" class="ri-grid ri-grid-size-3">
                            <ul>
                                <?php
                                //$tag = 'studyhelper';
                                $popular = $instagram->getUserMedia($data->user->id);
                                foreach ($popular->data as $instagramPicture)
                                {

                                    // Display results
                                    foreach ($instagramPicture->tags as $tag)
                                    {
                                        if ($tag == 'studyhelper') {
                                            echo "<li><a><img src=\"{$instagramPicture->images->thumbnail->url}\"></a></li>";
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.gridrotator.js"></script>
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