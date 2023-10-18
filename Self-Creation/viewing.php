<?php

if(isset($_SESSION["fname"]))
{
    if($_SESSION["fname"]=="")
    {
        echo "<script>window.location='login.php'</script>";
    }
}

include "connection.php";
$query="SELECT 
source,Destination,From_date,To_date,travelid
FROM 
tbl_travel where userID=".$_SESSION["userid"]."";
$result=mysqli_query($conn,$query);

?>