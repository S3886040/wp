<?php
  include_once('tools.php');
  include_once('html-modules.php');
  if ( !isset($movieObject[ $_GET['movie'] ]) ) {
  header("Location: index.php"); // redirect if movie code invalid
  }
  $formErrors = [];
  $name = '';
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_POST['user']['name'] = htmlentities(($_POST['user']['name']), ENT_QUOTES);
    $name = unsetFB($_POST['user']['name']);
    $_POST['user']['mobile'] = htmlentities($_POST['user']['mobile'], ENT_QUOTES);
    $mobile = unsetFB($_POST['user']['mobile']);
    $_POST['user']['email'] = htmlentities($email = unsetFB($_POST['user']['email']), ENT_QUOTES);
    $_POST['seats']['STA'] = htmlentities($sta = unsetFB($_POST['seats']['STA']), ENT_QUOTES);
    $_POST['seats']['STP'] = htmlentities($stp = unsetFB($_POST['seats']['STP']), ENT_QUOTES);
    $_POST['seats']['STC'] = htmlentities($stc = unsetFB($_POST['seats']['STC']), ENT_QUOTES);
    $_POST['seats']['FCA'] = htmlentities($fca = unsetFB($_POST['seats']['FCA']), ENT_QUOTES);
    $_POST['seats']['FCP'] = htmlentities($fcp = unsetFB($_POST['seats']['FCP']), ENT_QUOTES);
    $_POST['seats']['FCC'] = htmlentities($fcc = unsetFB($_POST['seats']['FCC']), ENT_QUOTES);

    include_once('post-validation.php');
    $formErrors = validateBooking();
  };

  $currentMovie = unsetFB($_GET['movie']);
  $nameError = '';
  $emailError = '';
  $mobileError = '';
  $dayErrorValue = '';
  $dayErrorStyle = '';
  $seatsError = '';

  if(count($formErrors) > 0) {
    $nameError = ' <span style="color:red">'.unsetFB($formErrors['user']['name']).'</span>';
    $emailError = ' <span style="color:red">'.unsetFB($formErrors['user']['email']).'</span>';
    $mobileError = ' <span style="color:red">'.unsetFB($formErrors['user']['mobile']).'</span>';
    if(unsetFB($formErrors['day']) != "") {
      $dayErrorValue = $formErrors['day'];
      $dayErrorStyle = 'style=visibility:visible';
    }
    $seatsError = ' <span style="color:red">'.unsetFB($formErrors['seats']).'</span>';
  }

  $ticketSelectionPHP = [];
  foreach ($_POST['seats'] as $seat => $amount) {
    if($amount >= 1) {
      $ticketSelectionPHP[$seat] = $amount;
    }
  }
  php2js($ticketSelectionPHP, 'ticketSelectionPHP');
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
              <input id='STA' type='number' min='1' max='10' name=seats[STA] value="<?= $sta ?>"/><br />
              <label for='STP'>Concession</label>
              <input id='STP' type='number' min='1' max='10' name=seats[STP] value="<?= $stp ?>"/><br />
              <label for='STC'>Child</label>
              <input id='STC' type='number' min='1' max='10' name=seats[STC] value="<?= $stc ?>"/><br />
            </fieldset>
            <fieldset class='seat-set'>
              <legend>First Class Seats</legend>
              <div class='underline'></div>
              <label for='FCA'>Adult</label>
              <input id='FCA' type='number' min='1' max='10' name=seats[FCA] value="<?= $fca ?>"/><br />
              <label for='FCP'>Concession</label>
              <input id='FCP' type='number' min='1' max='10' name=seats[FCP] value="<?= $fcp ?>"/><br />
              <label for='FCC'>Child</label>
              <input id='FCC' type='number' min='1' max='10' name=seats[FCC] value="<?= $fcc ?>"/><br />
              <?= $seatsError ?>
            </fieldset>
            <fieldset class='day-set'>
              <legend>Day Sessions</legend>
              <div class='underline'></div>
              <input type=radio id='mon' name='day' value='MON' <?= setChecked($_POST['day'],'MON') ?> /><label for='mon'> Monday</label>
              <input type=radio id='tues' name='day' value='TUES' <?= setChecked($_POST['day'],'TUES') ?> /> <label for='tues'>Tuesday</label>
              <input type=radio id='wed' name='day' value='WED' <?= setChecked($_POST['day'],'WED') ?> /> <label for='wed'>Wednesday</label>
              <input type=radio id='thurs' name='day' value='THURS' <?= setChecked($_POST['day'],'THURS') ?> /> <label for='thurs'>Thursday</label>
              <input type=radio id='fri' name='day' value='FRI' <?= setChecked($_POST['day'],'FRI') ?> /> <label for='fri'>Friday</label>
              <input type=radio id='sat' name='day' value='SAT' <?= setChecked($_POST['day'],'SAT') ?> /> <label for='sat'>Saturday</label>
              <input type=radio id='sun' name='day' value='SUN' <?= setChecked($_POST['day'],'SUN') ?> /> <label for='sun'>Sunday</label>
              <div id='not-showing-modal' <?= $dayErrorStyle ?>><?= $dayErrorValue ?></div>
            </fieldset>

            <fieldset class='details-set'>
              <legend>Your Details</legend>
              <div class='underline'></div>
              <label for='nameInput'>Your Name</label><br />
              <input id="nameInput" type='text' name=user[name]  value="<?= $name ?>"/><?= $nameError ?><br />
              <label for='emailInput'>Email Address</label><br />
              <input id='emailInput' type='email' name=user[email] value="<?= $email ?>" required/><?= $emailError ?><br />
              <label for='numberInput'>Mobile Number</label><br />
              <input id="numberInput" type='text' name=user[mobile] value="<?= $mobile ?>" /><?= $mobileError ?><br />
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
