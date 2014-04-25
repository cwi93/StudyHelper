<?php
/**
 * Created by PhpStorm.
 * User: cwi93
 * Date: 14-04-14
 * Time: 11:22
 */
include 'config.php';

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

session_start();

if(isset ($_SESSION['loggedin']))
{
    $id = $dbid;
    header("Location: account.php?id=".$id);
    exit;
}

if (isset($_POST["submit"]))
{
    $username = $_POST ["gebruikersnaam"];
    $password = $_POST ["wachtwoord"];

    if ($username && $password)
    {
        $query = mysql_query("SELECT * FROM studyhelpergebruiker WHERE gebruikersnaam='$username'");

        if($query)
        {
            $numrows = mysql_num_rows($query);
            if($numrows != 0)
            {
                while ($row = mysql_fetch_assoc($query))
                {
                    $dbusername = $row ['gebruikersnaam'];
                    $dbpassword = $row ['wachtwoord'];
                    $dbid = $row ['id'];
                }
                if ($username == $dbusername && $password == $dbpassword)
                {
                    $_SESSION['gebruikersnaam'] = $dbusername;
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_id'] = $dbid;
                    $id = $dbid;
                    header("Location: account.php?id=".$id);
                    exit;
                }
                else
                {
                    $notice = "Wachtwoord komt niet overeen met de gebruikersnaam";

                }
            }
            else
            {
                $notice = "Gebruiker bestaat niet";
            }
        }
        elseif (!$username && !$password)
        {
            $notice = "Alle velden zijn niet ingevoerd";
        }
        elseif (!$username)
        {
            $notice = "Gebruikersnaam is niet ingevoerd";
        }
        elseif (!$password)
        {
            $notice = "Wachtwoord is niet ingevoerd";
        }
    }
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
    <div class="login-wrapper">
        <ul class="login-home">
            <li>
                <a href="index.php" class="login-home-button" role="button"">
                    <img class="login-home-image" src="./assets/images/home_button.png">
                </a>
            </li>
        </ul>
        <div class="login text-center">
            <div class="container">
                <div class="row">
                    <div class="login_form">
                        <div class="inner">
                            <img class="login_logo" src="assets/images/login_logo.png" alt="StudyHelper Login logo">
                            <p>
                                <?php if (isset($notice))
                                {
                                    echo $notice;
                                }
                                ?>
                            </p>
                            <div class="col-md-12 footer-col">
                                <form class="form-horizontal" role="form" method="post">
                                    <div class="form-group">
                                        <div class="col-xs-4"></div>
                                        <div class="col-xs-4">
                                            <input type="text" class="form-control" placeholder="Gebruikersnaam" name="gebruikersnaam" id="Gebruikersnaam" class="inputfield" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-4"></div>
                                        <div class="col-xs-4">
                                            <input type="password" class="form-control" id="exampleInputEmail2" placeholder="Wachtwoord" name="wachtwoord" id="Wachtwoord" class="inputfield"/>

                                        </div>
                                    </div>
                                    <input class="btn btn-default btn-lg" type="submit" value="Login" name="submit" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>