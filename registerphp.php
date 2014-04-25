<?php
/**
 * Created by PhpStorm.
 * User: cwi93
 * Date: 14-04-14
 * Time: 16:07
 */
include ('config.php');

session_start();
if($_GET["gebruikersnaam"] && $_GET["wachtwoord"] && $_GET["wachtwoord2"] && $_GET["email"] && $_GET["status"])
{
    if($_GET["wachtwoord"] == $_GET["wachtwoord2"])
    {
        $sql = "insert into studyhelpergebruiker (gebruikersnaam, wachtwoord, email, status) values ('$_GET[gebruikersnaam]','$_GET[wachtwoord]','$_GET[email]', '$_GET[status]')";
        $result = mysql_query($sql) or die(mysql_error());

        header("Location: index.php");
        exit;
    }
    else
    {
        echo "Uw wachtwoord komt niet overeen.";
    }
}
else
{
    echo "Error, probeer opnieuw";
}
?>