<?php
/**
 * Created by PhpStorm.
 * User: cwi93
 * Date: 14-04-14
 * Time: 16:22
 */
include_once ('config.php');

$userId = $_SESSION['user_id'];
session_start();
if(!isset($_SESSION['loggedin'])){
    header('location:login.php');
    exit();
}
function getUserState($id) {
    $id = (int)$id;
    $query = mysql_query("SELECT * FROM studyhelpergebruiker WHERE id = '$id'") or die (mysql_error());
    if(mysql_num_rows($query) == 0)
    {
        echo "geen status gevonden";
    }
    else
    {
        while($post = mysql_fetch_assoc($query))
        {
            $gebruikersStatus = $post["status"];
            if ($gebruikersStatus == "Student")
            {
                header("Location: student.php?id=".$id);
            }
            if ($gebruikersStatus == "Scholier")
            {
                header("Location: scholier.php?id=".$id);
            }
            if ($gebruikersStatus == false)
            {
                header("Location: index.php");
            }
        }
    }
}
getUserState($_GET['id']);