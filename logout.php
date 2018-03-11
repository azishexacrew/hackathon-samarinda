<?php
session_start();
//konfigurasi link logout.php?x=ok
if ($_REQUEST['x'] == "ok")
{
if(ISSET($_SESSION['user']))
{
UNSET($_SESSION['user']);
}
}
header("location: index.php");
session_destroy();
?>