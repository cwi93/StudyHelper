<?php
/**
 * Created by PhpStorm.
 * User: cwi93
 * Date: 15-04-14
 * Time: 11:22
 */
session_start();
session_unset();
session_destroy();
ob_start();
header("location:index.php");
ob_end_flush();
exit;

?>