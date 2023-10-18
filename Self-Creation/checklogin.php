<?php 
session_start();

include "connection.php";
$email=$_POST["email"];
$query="select * from users where email='$email' limit 1";
$result=mysqli_query($conn,$query);
if($result->num_rows>0)
{
    echo "true";
    while($row=$result->fetch_array())
    {
        $_SESSION["name"]=$row["Name"];
        $_SESSION["email"]=$row["email"];
        $_SESSION["userid"]=$row["userid"];
    }
}   
else
{
    echo "false";
    
}
?>