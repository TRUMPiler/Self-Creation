<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>#map {
  height: 400px;
}</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>

    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>

</head>
<body>
    <form action="" method="POST" class="myForm">
<?php
include "connection.php";
if(isset($_SESSION["travelid"]))
{
    $query="SELECT 
source,Destination,From_date,To_date,travelid
FROM 
tbl_travel where travelid=".$_SESSION["travelid"]."";
// echo $query;
$result=mysqli_query($conn,$query);
    $result=mysqli_query($conn,$query);
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            
            // echo "<h4>Passenger Name:".$row["passengername"]."</h4>";
            echo "<h4 id='address'>Source:".$row["source"]."</h4>";
            echo "<input type='text' name='latitude' id='lat' hidden>";
            echo "<input type='text' name='longitude' id='long' hidden>";
            echo "<h4 id='daddress'>Destination:".$row["Destination"]."</h4>";
            echo "<input type='text' name='dlat' id='dlat' hidden>";
            echo "<input type='text' name='dlong' id='dlong' hidden>";
            echo "<h4>Travel Begins From:".$row["From_date"]."</h4>";
            echo "<h4>Travel Ends On:".$row["To_date"]."</h4>";
            echo "<h4 id='distance'>Estimated Distance of the ride</h4>";
            echo "<h4 id='duration'>Estimated Duration of the ride</h4>";
            // $query="select driver.id,interestID,Cost FROM tbl_interest JOIN driver where driver.email='".$_SESSION["email"]."'";
            $results=mysqli_query($conn,$query);
            if($results->num_rows>0)
            { 
              while($row=$results->fetch_array())
              {
                // echo "<h4>Cost given for the trip is:".$row["Cost"]."</h4>";
                echo "<a href='travel.php'>Back</a>";        
              }
            }
            else
            {
                echo "<a href='travel.php'>Back</a>";        
                // echo "
                // <input type='text' name='cost_estimation' required>
                //    ";
            }
        }
    }   
}
            
?>   

<!-- <input type='text' name='cost_estimation' required> -->
    <!-- <input type="submit" id="estimation" value="Submit Your Estimation"> -->
</form> 
<script>
    $(document).ready(function(){
        settingLoc();
        
        // $("form").on("submit",function(event)
        //         {
        //             event.preventDefault();
        //             var formValues=$(this).serialize();
        //             $.post(
        //                 "setinterest.php",
        //              formValues,
        //             function(data,status){
                      
        //                 if(data=="true")
        //                 {
        //                   alert("Estimation send to passenger");
        //                   window.location='index';
        //                 }
        //                 else
        //                 {
        //                   alert("Estimation Already exists");
        //                   window.location='index.php';
        //                 }
        //                 }   
        //         )
        //         });
    })
        function settingLoc(){
      
                  
      var address=document.getElementById("address").innerText;
      
      console.log(address);   
      const settingss = {
      
      async: true,
      crossDomain: true,
      url: 'https://trueway-geocoding.p.rapidapi.com/Geocode?address='+address+'&language=en',
      method: 'GET',
      headers: {
          'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
          'X-RapidAPI-Host': 'trueway-geocoding.p.rapidapi.com'
      }
  };
  
  $.ajax(settingss).done(function (response) {
  console.log(response);
      var lat=response.results[0].location.lat;
      var long=response.results[0].location.lng;
      console.log(lat);
      document.querySelector(".myForm input[name='latitude']").value=lat;
      document.querySelector(".myForm input[name='longitude']").value=long;
  });

  
  var daddress=document.getElementById("daddress").innerText;; 
console.log(daddress);   
const settings = {

async: true,
crossDomain: true,
url: 'https://trueway-geocoding.p.rapidapi.com/Geocode?address='+daddress+'&language=en',
method: 'GET',
headers: {
'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
'X-RapidAPI-Host': 'trueway-geocoding.p.rapidapi.com'
}
};

$.ajax(settings).done(function (responses) {
console.log(responses);
var dlat=responses.results[0].location.lat;
var dlong=responses.results[0].location.lng;
console.log(dlat);
document.querySelector(".myForm input[name='dlat']").value=dlat;
document.querySelector(".myForm input[name='dlong']").value=dlong;

});
overloadings();
console.log("called map");
    }
async function overloadings()
{
        try{
            await new Promise(r=>setTimeout(r,2000));
            L.mapquest.key = 'w03p4OcwnfyANcr03u9OE13IfBPPwV1g';
  var baseLayer = L.mapquest.tileLayer('map');

var map = L.mapquest.map('map', {
  center: [37.7749, -122.4194],
  layers: baseLayer,
  zoom: 12
});


  // Create markers for source and destination
  var sourceMarker = L.mapquest.textMarker([37.7749, -122.4194], {
    text: 'Source',
    position: 'right',
  }).addTo(map);

  var destinationMarker = L.mapquest.textMarker([34.0522, -118.2437], {
    text: 'Destination',
    position: 'right',
  }).addTo(map);

  L.mapquest.directions().route({
   
    start: ''+document.querySelector(".myForm input[name='latitude']").value+','+document.querySelector(".myForm input[name='longitude']").value+'', // Starting address or location
    end: ''+document.querySelector(".myForm input[name='dlat']").value+','+document.querySelector(".myForm input[name='dlong']").value+'',    // Ending address or location
  });
        }
      finally{
        calculate();
      }  
  
    }
    function calculate()
    {
        
        const settings = {
	async: true,
	crossDomain: true,
	url: 'https://trueway-matrix.p.rapidapi.com/CalculateDrivingMatrix?origins='+document.querySelector(".myForm input[name='latitude']").value+'%2C'+document.querySelector(".myForm input[name='longitude']").value+'&destinations='+document.querySelector(".myForm input[name='dlat']").value+'%2C'+document.querySelector(".myForm input[name='dlong']").value+'&avoid_highway=true',
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
		'X-RapidAPI-Host': 'trueway-matrix.p.rapidapi.com'
	}
};

$.ajax(settings).done(function (response) {
	console.log(response);
    var dis=response.distances[0];
    var dur=response.durations[0];
    $("#duration").html("Estimated Duration of the ride "+secondsToHms(dur));
    $("#distance").html("Estimated Distance of the ride "+dis/1000+"km");
});
    }
    function secondsToHms(d) {
    d = Number(d);
    var h = Math.floor(d / 3600);
    var m = Math.floor(d % 3600 / 60);
    var s = Math.floor(d % 3600 % 60);
    var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours, ") : "";
    var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes, ") : "";
    var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";
    return hDisplay + mDisplay + sDisplay; 
}
</script>
<div id="map"></div>
</body>
</html>