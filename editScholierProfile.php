<?php
/**
 * Created by PhpStorm.
 * User: cwi93
 * Date: 24-04-14
 * Time: 20:03
 */
include ('config.php');

session_start();
$userid = $_SESSION['user_id'];
$naam = $_GET['naam'];
$school = $_GET['school'];

mysql_query("UPDATE `studyhelpergebruiker` SET `naam` = '$naam', `school` = '$school' WHERE `id` = '$userid'");

header('Location: scholierAccount.php?id='.$_SESSION['user_id']);
exit;
?>