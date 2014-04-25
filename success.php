<?php
/**
 * Created by PhpStorm.
 * User: cwi93
 * Date: 22-04-14
 * Time: 10:25
 */
include 'config.php';
require 'instagram.class.php';
require 'instagram.config.php';

// Receive OAuth code parameter
$code = $_GET['code'];



// Check whether the user has granted access
if (true === isset($code)) {

    // Receive OAuth token object
    $data = $instagram->getOAuthToken($code);
    // Take a look at the API response

    if(empty($data->user->username))
    {
        header('Location: student.php?id='.$_SESSION['user_id']);

    }
    else
    {
        session_start();
        $_SESSION['userdetails']=$data;

        $userid = $_SESSION['user_id'];
        $igid = $data->user->id;
        $token = $data->access_token;

        $userdbid= mysql_query("select id from studyhelpergebruiker where id='$userid'");

        mysql_query("UPDATE `studyhelpergebruiker` SET `instagram_id` = '$igid', `instagram_access_token` = '$token' WHERE `id` = '$userid'");

        header('Location: student.php?id='.$_SESSION['user_id']);
    }
}
else
{
// Check whether an error occurred
    if (true === isset($_GET['error']))
    {
        echo 'An error occurred: '.$_GET['error_description'];
    }

}

?>
