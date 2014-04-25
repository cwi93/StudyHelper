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
$schoolquery = mysql_query("SELECT * FROM `school`") or die (mysql_error());
$opleidingquery = mysql_query("SELECT * FROM `opleiding`") or die (mysql_error());
$ervaringquery = mysql_query("SELECT ervaring FROM `studyhelpergebruiker` WHERE `id` = '$userid'") or die (mysql_error());
$usersOpleiding = mysql_query("SELECT opleiding FROM `studyhelpergebruiker` WHERE `id` = '$userid'") or die (mysql_error());
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
                                <li><a href="<?php echo 'student.php?id=';echo $_SESSION['user_id'];?>">Home</a></li>
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
                                <li><a href="<?php echo 'student.php?id=';echo $_SESSION['user_id'];?>">Home</a></li>
                                <li><a href="<?php echo 'studentAccount.php?id=';echo $_SESSION['user_id'];?>">Mijn Account</a></li>
                                <li><a href="logout.php">Uitloggen</a></li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12 footer-col">
                    <form class="form-horizontal" role="form" action="editprofile.php" method="get">
                        <div class="form-group">
                            <h2>Selecteer hier uw school en opleiding.</h2>
                            <div class="dropdownForStudents">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <select class="form-control" name="school" id="schoolDropdown">
                                        <?php
                                        while ($row = mysql_fetch_array($usersSchool)) {
                                            $school = $row["school"];
                                            echo '<option selected value="'.$school.'">'.$school.'</option>';
                                        }
                                        while ($row = mysql_fetch_array($schoolquery)) {
                                            $school = $row["school"];
                                            echo '<option value="'.$school.'">'.$school.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="opleiding" id="opleidingDropdown">
                                        <?php
                                        while ($row = mysql_fetch_array($usersOpleiding)) {
                                            $opleiding = $row["opleiding"];
                                            echo '<option selected value="'.$opleiding.'">'.$opleiding.'</option>';
                                        }
                                        while ($row = mysql_fetch_array($opleidingquery)) {
                                            $opleiding = $row["opleiding"];
                                            echo '<option value="'.$opleiding.'">'.$opleiding.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <br/>
                                <textarea class="form-control" name="ervaring" rows="4"><?php
                                    while ($row = mysql_fetch_array($ervaringquery))
                                    {
                                        $ervaring = $row["ervaring"];
                                        echo $ervaring;
                                    }
                                ?>

                                </textarea>
                            </div>
                        </div>
                        <button class="btn btn-default btn-sm" type="submit" id="wijzigen">Wijzigen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>