<?php
  include_once('tools.php');
  include_once('html-modules.php');
  // if ( !isset($movieObject[ $_GET['movie'] ]) ) {
  // header("Location: index.php"); // redirect if movie code invalid
  // }
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once('post-validation.php');
    validateBooking();
  };
  $currentMovie = unsetFB($_GET['movie']);;
  $email = unsetFB($_POST['user']['email']);
  $name = unsetFB($_POST['user']['name']);
  $mobile = unsetFB($_POST['user']['mobile']);

  php2js($movieObject, 'movieObjectjs');
  php2js($currentMovie, 'currentMovie');
?>

<!DOCTYPE html>
<?= headRender("Lunardo Booking Page") ?>

  <body>
    <?= headerNavRender() ?>
    <main>
      <section id='movie-details'>
        <?= movieRender($currentMovie) ?>
      </section>
      <section id='booking-form'>
        <div class='booking-form-content'>
          <h1>Booking</h1>
          <div class='underline'></div>
          <form action='booking.php?movie=<?= $currentMovie?>' method='POST'>
            <input type="hidden" name="movie" value=<?= $currentMovie?> >
            <fieldset class='seat-set'>
              <legend>Standard Seats</legend>
              <div class='underline'></div>
              <label for='STA'>Adult</label>
              <input id='STA' type='number' min='1' max='10' name=seats[STA] /><br />
              <label for='STP'>Concession</label>
              <input id='STP' type='number' min='1' max='10' name=seats[STP] /><br />
              <label for='STC'>Child</label>
              <input id='STC' type='number' min='1' max='10' name=seats[STC] /><br />
            </fieldset>
            <fieldset class='seat-set'>
              <legend>First Class Seats</legend>
              <div class='underline'></div>
              <label for='FCA'>Adult</label>
              <input id='FCA' type='number' min='1' max='10' name=seats[FCA] /><br />
              <label for='FCP'>Concession</label>
              <input id='FCP' type='number' min='1' max='10' name=seats[FCP] /><br />
              <label for='FCC'>Child</label>
              <input id='FCC' type='number' min='1' max='10' name=seats[FCC] /><br />
            </fieldset>
            <fieldset class='day-set'>
              <legend>Day Sessions</legend>
              <div class='underline'></div>
              <input type=radio id='mon' name='day' value='MON' /><label for='mon'> Monday</label>
              <input type=radio id='tues' name='day' value='TUES' /> <label for='tues'>Tuesday</label>
              <input type=radio id='wed' name='day' value='WED' /> <label for='wed'>Wednesday</label>
              <input type=radio id='thurs' name='day' value='THURS' /> <label for='thurs'>Thursday</label>
              <input type=radio id='fri' name='day' value='FRI' /> <label for='fri'>Friday</label>
              <input type=radio id='sat' name='day' value='SAT' /> <label for='sat'>Saturday</label>
              <input type=radio id='sun' name='day' value='SUN' /> <label for='sun'>Sunday</label>
              <div id='not-showing-modal'></div>
            </fieldset>

            <fieldset class='details-set'>
              <legend>Your Details</legend>
              <div class='underline'></div>
              <label for='nameInput'>Your Name</label><br />
              <input id="nameInput" type='text' name=user[name] value="<?= $name ?>" /><br />
              <label for='emailInput'>Email Address</label><br />
              <input id='emailInput' type='email' name=user[email] value="<?= $email ?>" required/><br />
              <label for='numberInput'>Mobile Number</label><br />
              <input id="numberInput" type='text' name=user[mobile] value="<?= $mobile ?>" /><br />
              <span>Total Amount: </span>
              <div id="totalAmount"></div>
            </fieldset>
            <input id ='formSubmit' type='submit' name='submit' value='submit' />
          </form>
        </div>
      </section>
    </main>
    <footer>
      <div>
        Contact Info-<br>
        Email: contact@lunardo-cinema.com.au<br>
        Phone: (03) 9788 7883<br>
        Address: 34 cresent st Mt Martha, 3467
      </div>
      <div>&copy;<script>
          document.write(new Date().getFullYear());
        </script> Justin Healy, s3886040.<a href='https://github.com/S3886040/wp/tree/main/a2'>GitHub</a>. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
    <script src='script.js'></script>
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
