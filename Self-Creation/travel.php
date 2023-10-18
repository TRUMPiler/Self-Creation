<?php 

session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <table id="requestedrides" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Source</th>
                <th>Destination</th>
                <th>From</th> 
                <th>To</th>
                <!-- <th>passenger Name</th> -->
                <th>View</th>
            </tr>
            
        </thead>
        <tbody>
            <?php include "viewing.php"; 
            while($row=$result->fetch_array())
            {
                
            
            ?>
            <tr>
            <td><?php echo $row["source"];?></td>
                <td><?php echo $row["Destination"];?></td>
                <td><?php echo $row["From_date"];?></td>
                <td><?php echo $row["To_date"];?></td>
                <td><button id="btnintrestRide" name="<?php echo $row["travelid"];?>">view Travel Details</button></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    <a href="home.php"><button>Back</button></a>
</body>
<script>
    
    $(document).ready(function(){
       
        $("#requestedrides").dataTable();
        $("#btnintrestRide").click(function(){
            var x=document.getElementById("btnintrestRide").name;
            $.post("travelidset.php",{Requestride:x},function(data){
                
                window.location="viewtravel.php";
            })    
        })
    })
</script>
</html>