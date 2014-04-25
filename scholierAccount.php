<?php
/**
 * Created by PhpStorm.
 * User: cwi93
 * Date: 21-04-14
 * Time: 15:35
 */
include ('config.php');

session_start();
if(!isset($_SESSION['loggedin'])){
header('location:login.php');
exit();
}
$userid = $_SESSION['user_id'];
$userNaam = mysql_query("SELECT naam FROM `studyhelpergebruiker` WHERE `id` = '$userid'") or die (mysql_error());
$usersSchool = mysql_query("SELECT school FROM `studyhelpergebruiker` WHERE `id` = '$userid'") or die (mysql_error());
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="text/html">
    <title>StudyHelper</title>

    <script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
    <link href="assets/css/site.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<div id="studentAccount_Wrapper">
    <div class="menu-wrapper">
        <div class="container text-center" id="nav-container">
            <img class="profile-logo" src="assets/images/studyhelper_logo.png" alt="Logo">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 hidden-xs hidden-sm button-col-small">
                <div class="Web_settingDropdown input-group-btn pull-right">
                    <li class="dropdown">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Instellingen<span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo 'scholier.php?id=';echo $_SESSION['user_id'];?>">Home</a></li>
                            <li><a href="<?php echo 'scholierAccount.php?id=';echo $_SESSION['user_id'];?>">Mijn Account</a></li>
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
                            <li><a href="<?php echo 'scholier.php?id=';echo $_SESSION['user_id'];?>">Home</a></li>
                            <li><a href="<?php echo 'scholierAccount.php?id=';echo $_SESSION['user_id'];?>">Mijn Account</a></li>
                            <li><a href="logout.php">Uitloggen</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="editscholier_info">
                <div class="inner">
                    <div class="col-md-12 text-center footer-col">
                        <form class="form-horizontal" role="form" action="editScholierProfile.php" method="get">
                            <div class="form-group">
                                <div class="col-xs-4"></div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Naam" name="naam" id="naam" class="inputfield"
                                        value="<?php
                                        while ($row = mysql_fetch_array($userNaam))
                                        {
                                            $naam = $row["naam"];
                                            echo $naam;
                                        }
                                        ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-4"></div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="School" name="school" id="school" class="inputfield"
                                           value="<?php
                                           while ($row = mysql_fetch_array($usersSchool))
                                           {
                                               $school = $row["school"];
                                               echo $school;
                                           }
                                           ?>"/>
                                </div>
                            </div><br/>
                            <button class="btn btn-default btn-lg" type="submit" id="aanmelden">Aanpassen</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>