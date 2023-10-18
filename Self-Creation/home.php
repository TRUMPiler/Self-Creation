<?php session_start()
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Welcome <?php echo $_SESSION["name"];?></title>
  </head>
  <body>
    <article>
        <nav>
            <ul>
                <!-- <a href="">Contacts</a>
                <a href="">Information</a>
                <a href="">Schedule</a> -->
                <a href="home.php" id="left">Home</a>
            </ul>
        </nav>
        <h1 class="fade-in">Welcome to Planner help</h1><br>
        <!-- <h1 class="fade-in">plan your trips Now</h1> -->
        <div id="content" class="fade-in-2">
            <ul type="none">
            <h3 class="fade-in">Schedule Your travel</h3>
                <!-- <li><a href="">Culture</a></li>
                <li><a href="">History</a></li> -->
                <li><a href="plan trip.php">Plan Now</a></li>
            </ul>
        </div>
        <div class="footer">
            <p>Kyoto Industries © <span><script>document.write(/\d{4}/.exec(Date())[0])</script>
            </span></p>
        </div>
    </article>
  </body>
  </html>
 