<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Booking Page</title>
    
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='../wireframe.js'></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Cormorant+Garamond&family=Permanent+Marker&display=swap" rel="stylesheet">
  </head>

  <body>

    <header id='home'>
        <div class ='header-content-wrapper'>
            <h1>Lunardo</h1>
            <!-- Sourced from https://vector.me/browse/690940/camera_icon -->
            <img src='../../media/camera_icon.svg' class='logo' alt='Lunardo Icon'>
        </div>  
    </header>

    <nav class='nav-bar'>
      <ul class='nav-list'>
        <li class='nav-item'><a href="index.php#home">Home</a></li>
        <li class='nav-item'><a href="index.php#about-us">About Us</a></li>
        <li class='nav-item'><a href="index.php#seats-prices">Seats/Prices</a></li>
        <li class='nav-item'><a href="index.php#now-showing">Now Showing</a></li>
      </ul>
    </nav>

    <main>
      <section id='movie-details'>
        <div class='movie-details-content'>
        <div class='movie-details-header'>
        <h1>Dune(2021)</h1>
        <h3>Rating: M</h3>
        <div class='underline'></div>
        </div>
        
            <div class='flex-details'>    
                <div class='img-left'>
                <img src="../../media/Dune.jpg" alt="Dune Movie Poster" style="width:300px;height:300px;">
            </div>
            <div class='content-right'>
                <h3>Session Times:</h3>
                <div class='underline'></div>
                <h3>Mon-Tues</h3>
                <p>9pm<p>
                <h3>Wed-Fri</h3>
                <p>9pm<p>
                <h3>Sat-Sun</h3>
                <p>6pm<p>      
            </div>
            </div>
            <h2>Synopsis</h2>
            <p>
            A mythic and emotionally charged hero's journey, "Dune" tells the story of Paul Atreides, a brilliant and gifted young man 
            born into a great destiny beyond his understanding, who must travel to the most dangerous planet in the universe to ensure the 
            future of his family and his people. As malevolent forces explode into conflict over the planet's exclusive supply of the most 
            precious resource in existence-a commodity capable of unlocking humanity's greatest potential-only those who can conquer their 
            fear will survive.
            </p>
            <!-- iframe video source form Youtube https://www.youtube.com/watch?v=8g18jFHCLXk-->
            <iframe width="420" height="315"
            src="https://www.youtube.com/embed/8g18jFHCLXk">
            </iframe>
        </div>
      </section>
      <section id='booking-form'>
        <div class='booking-form-content'>
            <h1>Booking</h1>
            <div class='underline'></div>
            <form action='booking.php' method='POST'>
                <input type="hidden" name="ACT">
                <fieldset class='seat-set'>
                    <legend>Seat Choice</legend>
                    <label>Standard Adult</label>
                    <input type='number' min='1' max='10' name=seats[STA] /><br/>
                    <label>Standard Concession</label>
                    <input type='number' min='1' max='10' name=seats[STP]/><br/>
                    <label>Standard Child</label>
                    <input type='number' min='1' max='10' name=seats[STC]/><br/>
                    <label>First Class Adult</label>
                    <input type='number' min='1' max='10' name=seats[FCA]/><br/>
                    <label>First Class Concession</label>
                    <input type='number' min='1' max='10' name=seats[FCP]/><br/>
                    <label>First Class Child</label>
                    <input type='number' min='1' max='10' name=seats[FCC]/><br/>
                </fieldset>
                <fieldset class='day-set'>
                    <legend>Session Times</legend>
                    <input type=radio id='mon' name='day' value='MON' /><label for='mon'> Monday</label>
                    <input type=radio id='tues' name='day' value='TUES'/> <label for='tues'>Tuesday</label>
                    <input type=radio id='wed' name='day' value='WED'/> <label for ='wed'>Wednesday</label>
                    <input type=radio id='thurs'name='day' value='THURS'/> <label for='thurs'>Thursday</label>
                    <input type=radio id='fri' name='day' value='FRI'/> <label for='fri'>Friday</label>
                    <input type=radio id='sat' name='day' value='SAT'/> <label for='sat'>Saturday</label>
                    <input type=radio id='sun' name='day' value='SUN'/> <label for='sun'>Sunday</label>
                </fieldset>
                <fieldset class='details-set'>
                    <legend>Your Details</legend>
                    <label>Your Name</label><br/>
                    <input type='text' name=user[name] required/><br/>
                    <label>Email Address</label><br/>
                    <input type='text' name=user[email] required/><br/>
                    <label>Mobile Number</label><br/>
                    <input type='text' name=user[mobile] required/><br/>
                </fieldset>
                <input type='submit' name='submit' value='submit' />
            </form>
        </div>
      </section>
    </main>
    <footer>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Justin Healy, s3886040. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
    <aside id="debug">
      <hr>
      <h3>Debug Area</h3>
      <pre>
GET Contains:
<?php print_r($_GET) ?>
POST Contains:
<?php print_r($_POST) ?>
SESSION Contains:
<?php print_r($_SESSION) ?>
      </pre>
    </aside>

  </body>
</html>
