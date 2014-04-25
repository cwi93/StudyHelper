<?php
/**
 * Created by PhpStorm.
 * User: cwi93
 * Date: 14-04-14
 * Time: 13:05
 */
$dbhost = "localhost";
// sql.cmi.hro.nl
$dbuser = "root";
// studnr
$dbpassword = "";
// studpassword
$dbdatabase = "StudyHelper";
// studnr

mysql_connect($dbhost, $dbuser, $dbpassword, $dbdatabase) or die(mysql_error());
mysql_select_db($dbdatabase) or die(mysql_error());
?>