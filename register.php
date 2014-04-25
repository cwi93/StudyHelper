<?php
/**
 * Created by PhpStorm.
 * User: cwi93
 * Date: 17-04-14
 * Time: 11:01
 */
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
<div class="register-wrapper">
    <div class="register text-center">
        <ul class="login-home">
            <li>
                <a href="index.php" class="login-home-button" role="button"">
                <img class="login-home-image" src="./assets/images/home_button.png">
                </a>
            </li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="section student1">
                    <div class="inner">
                        <img class="register_logo" src="assets/images/register_logo.png" alt="StudyHelper Register logo">
                        <div class="col-md-12 text-center footer-col">
                            <form class="form-horizontal" role="form" action="registerphp.php" method="get">
                                <div class="form-group">
                                    <div class="col-xs-4"></div>
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control" placeholder="Gebruikersnaam" name="gebruikersnaam" id="Gebruikersnaam" class="inputfield" />

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-4"></div>
                                    <div class="col-xs-4">
                                        <input type="password" class="form-control" placeholder="Wachtwoord" name="wachtwoord" id="Wachtwoord" class="inputfield"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-4"></div>
                                    <div class="col-xs-4">
                                        <input type="password" class="form-control" placeholder="Nogmaals uw wachtwoord" name="wachtwoord2" id="Wachtwoord2" class="inputfield"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-4"></div>
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control" placeholder="E-mail adres" name="email" id="email" class="inputfield"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-md-5"></div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="status">
                                            <option value="Scholier">Scholier</option>
                                            <option value="Student">Student</option>
                                        </select>
                                    </div>
                                </div><br/>
                                <button class="btn btn-default btn-lg" type="submit" id="aanmelden">Registreren</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>