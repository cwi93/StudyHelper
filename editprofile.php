<?php
/**
 * Created by PhpStorm.
 * User: cwi93
 * Date: 23-04-14
 * Time: 00:44
 */
include ('config.php');

session_start();
$userid = $_SESSION['user_id'];
$opleiding = $_GET['opleiding'];
$school = $_GET['school'];
$ervaring = $_GET['ervaring'];

mysql_query("UPDATE `studyhelpergebruiker` SET `opleiding` = '$opleiding', `school` = '$school', `ervaring` = '$ervaring' WHERE `id` = '$userid'");

header('Location: studentAccount.php?id='.$_SESSION['user_id']);
exit;
?>