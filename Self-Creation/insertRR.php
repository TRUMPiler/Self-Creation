<?php 
session_start();
$userid=0;
include "connection.php";
$query="select userid from users where Name='".$_SESSION["name"]."' and email='".$_SESSION["email"]."' limit 1";
$result=mysqli_query($conn,$query);
if($result->num_rows>0)
{
    while($row=$result->fetch_array())
    {
        $userid=$row["userid"];
        $query="insert into tbl_travel(userid,source,Destination,From_date,to_date) values($userid,'".$_POST["source"]."','".$_POST["Destination"]."','".$_POST["From_date"]."','".$_POST["To_date"]."')";
        $results=mysqli_query($conn,$query);
        if($results>0)
        {
            
            $source=$_POST["source"];
            $dest=$_POST["Destination"];
            $from=$_POST["From_date"];
            $to=$_POST["To_date"];                
            $to_email = $_SESSION["email"];
            $subject = "Plan sender";
            $body = "Your Travel plan from $source to $dest begainning from $from and expected reaching time is $to";
            $headers = "From: dashtaxigg@gmail.com";
            if (mail($to_email, $subject, $body, $headers)) {
                echo "true";
            
            }
            else
            {
                echo "false";
            }

        }
        else
        {
            echo "false";
        }
    }
}
?>