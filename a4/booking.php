<?php
  //Tools Inlcudes session start function.
  include_once('tools.php');
  include_once('html-modules.php');
  if ( !isset($movieObject[ $_GET['movie'] ]) ) {
  header("Location: index.php");
  }
  $formErrors = [];
  //Additional data is added to the session which will be used by the receipt page
  //Data added: showing time, time purchase of was made.
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once('post-validation.php');
    $formErrors = validateBooking();
    if (count($formErrors) == 0) {
      $_SESSION['cart'] = $_POST;
      $_SESSION['cart']['time'] = getShowingTime($_POST['day']);
      date_default_timezone_set('Australia/Melbourne');
      $_SESSION['cart']['bookingTime'] = date('l d/m/y G:i');
      header("Location: receipt.php");
    }
  };

  $_POST['seats']['STA'] = unsetFB($_POST['seats']['STA']);
  $_POST['seats']['STP'] = unsetFB($_POST['seats']['STP']);
  $_POST['seats']['STC'] = unsetFB($_POST['seats']['STC']);
  $_POST['seats']['FCA'] = unsetFB($_POST['seats']['FCA']);
  $_POST['seats']['FCP'] = unsetFB($_POST['seats']['FCP']);
  $_POST['seats']['FCC'] = unsetFB($_POST['seats']['FCC']);

  $_POST['user']['name'] = unsetFB($_POST['user']['name']);
  $_POST['user']['email'] = unsetFB($_POST['user']['email']);
  $_POST['user']['mobile'] = unsetFB($_POST['user']['mobile']);

  $_POST['day'] = unsetFB($_POST['day']);

  $_POST['day'] =  htmlentities($_POST['day'], ENT_QUOTES);

  $currentMovie = unsetFB($_GET['movie']);
  $nameError = '';
  $emailError = '';
  $mobileError = '';
  $dayErrorValue = '';
  $dayErrorStyle = '';
  $seatsError = '';

  // Errors will be displayed on booking page if found.
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
  php2js($movieObject, 'movieObjectjs');
  php2js($currentMovie, 'currentMovie');
?>

<!DOCTYPE html>
<html lang='en'>
  <?= headRender("Lunardo Booking Page") ?>

  <body>
    <?= headerRender() ?>
    <?= navRender() ?>
    <main>
      <section id='movie-details'>
        <?= movieRender($currentMovie) ?>
      </section>
      <section id='booking-form'>
        <div class='booking-form-content'>
          <h1>Booking</h1>
          <div class='underline'></div>
          <form action='booking.php?movie=<?= $currentMovie?>' method='POST'>
            <input type="hidden" name="movie" value=<?= $currentMovie?>>
            <fieldset class='seat-set'>
              <legend>Standard Seats</legend>
              <div class='underline'></div>
              <label for='STA'>Adult</label>
              <button onClick="minusButton('STA', event)">-</button><input id='STA' type='number' min='1' max='10' name=seats[STA] value="<?= $_POST['seats']['STA'] = htmlentities($_POST['seats']['STA'], ENT_QUOTES); ?>" /><button>+</button><br />
              <label for='STP'>Concession</label>
              <input id='STP' type='number' min='1' max='10' name=seats[STP] value="<?= $_POST['seats']['STP'] = htmlentities($_POST['seats']['STP'], ENT_QUOTES); ?>" /><br />
              <label for='STC'>Child</label>
              <input id='STC' type='number' min='1' max='10' name=seats[STC] value="<?= $_POST['seats']['STC'] = htmlentities($_POST['seats']['STC'], ENT_QUOTES); ?>" /><br />
            </fieldset>
            <fieldset class='seat-set'>
              <legend>First Class Seats</legend>
              <div class='underline'></div>
              <label for='FCA'>Adult</label>
              <input id='FCA' type='number' min='1' max='10' name=seats[FCA] value="<?= $_POST['seats']['FCA'] = htmlentities($_POST['seats']['FCA'], ENT_QUOTES); ?>" /><br />
              <label for='FCP'>Concession</label>
              <input id='FCP' type='number' min='1' max='10' name=seats[FCP] value="<?= $_POST['seats']['FCP'] = htmlentities($_POST['seats']['FCP'], ENT_QUOTES); ?>" /><br />
              <label for='FCC'>Child</label>
              <input id='FCC' type='number' min='1' max='10' name=seats[FCC] value="<?= $_POST['seats']['FCC'] = htmlentities($_POST['seats']['FCC'], ENT_QUOTES); ?>" /><br />
              <?= $seatsError ?>
            </fieldset>
            <fieldset class='day-set'>
              <legend>Day Sessions</legend>
              <div class='underline'></div>
              <input type=radio id='mon' name='day' value='MON' <?= setChecked($_POST['day'],'MON')?> /><label for='mon'> Monday</label>
              <input type=radio id='tues' name='day' value='TUES' <?=setChecked($_POST['day'],'TUES')?> /> <label for='tues'>Tuesday</label>
              <input type=radio id='wed' name='day' value='WED' <?=setChecked($_POST['day'],'WED') ?> /> <label for='wed'>Wednesday</label>
              <input type=radio id='thurs' name='day' value='THURS' <?=setChecked($_POST['day'],'THURS') ?> /> <label for='thurs'>Thursday</label>
              <input type=radio id='fri' name='day' value='FRI' <?=setChecked($_POST['day'],'FRI') ?> /> <label for='fri'>Friday</label>
              <input type=radio id='sat' name='day' value='SAT' <?= setChecked($_POST['day'],'SAT') ?> /> <label for='sat'>Saturday</label>
              <input type=radio id='sun' name='day' value='SUN' <?=setChecked($_POST['day'],'SUN') ?> /> <label for='sun'>Sunday</label>
              <div id='not-showing-modal' <?= $dayErrorStyle ?>><?= $dayErrorValue ?></div>
            </fieldset>

            <fieldset class='details-set'>
              <legend>Your Details</legend>
              <div class='underline'></div>
              <label for='nameInput'>Your Name</label><br />
              <input id="nameInput" type='text' name=user[name] value="<?= $_POST['user']['name'] = htmlentities(($_POST['user']['name']), ENT_QUOTES);?>" /><?= $nameError ?><br />
              <label for='emailInput'>Email Address</label><br />
              <input id='emailInput' type='email' name=user[email] value="<?= $_POST['user']['email'] = htmlentities($_POST['user']['email'], ENT_QUOTES); ?>" required /><?= $emailError ?><br />
              <label for='numberInput'>Mobile Number</label><br />
              <input id="numberInput" type='text' name=user[mobile] value="<?= $_POST['user']['mobile'] = htmlentities($_POST['user']['mobile'], ENT_QUOTES); ?>" /><?= $mobileError ?><br />
              <span>Total Amount: </span>
              <div id="totalAmount"></div>
            </fieldset>
            <input id='formSubmit' type='submit' name='submit' value='submit' />
            <input type=radio id='userMem' name='userMem' value='UserMem'  /><label class="userMemLabel" id='userMemLabel' for='userMem' checked>Remember Me</label>
          </form>
        </div>
      </section>
    </main>
    <?= footerRender() ?>
    <script src='script.js'></script>
    <?= debugModule() ?>
    <?= printMyCode() ?>
  </body>

</html>
