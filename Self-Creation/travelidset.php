<?php 
session_start();
$_SESSION["travelid"]=$_POST["Requestride"];
echo "true";
echo $_SESSION["travelid"];
?>