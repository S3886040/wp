<?php

/* Call this function in the booking page like so:
   $fieldErrors = validateBooking();
   If the array is empty, then no errors were generated
*/
function validateBooking() {
  $errors = []; // new empty array to return error messages
  $nameRegex = "/^[a-zA-Z '.-]{1,100}$/";
  $numberRegex = "/^(\(04\)|04|\+614)( ?\d){8}$/";

  if ($_POST['user']['name'] == '') {
    $errors['user']['name'] = "Name can't be blank";
  } else if(!preg_match($nameRegex, $_POST['user']['name'])) {
    $errors['user']['name'] = "This is not a valid name input";
  }
  if ($_POST['user']['email'] == '') {
    $errors['user']['email'] = "Email can't be blank";
  } else if(!filter_var($_POST['user']['email'],FILTER_VALIDATE_EMAIL)) {
    $errors['user']['email'] = "Invalid Email";
  }
  if ($_POST['user']['mobile'] == '') {
    $errors['user']['mobile'] = "Number can not be blank";
  } else if(!preg_match($numberRegex, $_POST['user']['mobile'])){
    $errors['user']['mobile'] = "You must provide a mobile number";
  }

  if(count($errors) > 0)
  foreach ($errors['user'] as $error => $value) {
    print_r($value);
  }

  if(count($errors) > 0) {
    $nameError = ' <span style="color:red">'.unsetFB($errors['name']).'</span>';
  } else {
    header("Location: receipt.php");
  }


}



?>
