<?php
session_start();

$s_email = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";
$s_name = isset($_SESSION["s_name"])? $_SESSION["s_name"]:"";
 echo "Session ID : ".$s_email." / Name : ".$s_name;
?>
