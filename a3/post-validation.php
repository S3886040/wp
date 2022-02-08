<?php

/* Call this function in the booking page like so=>
   $fieldErrors = validateBooking();
   If the array is empty, then no errors were generated
*/

function validateBooking() {
  $errors = []; // new empty array to return error messages
  $nameRegex = "/^[a-zA-Z '.-]{1,100}$/";
  $numberRegex = "/^(\(04\)|04|\+614)( ?\d){8}$/";
  // Name checks
  if ($_POST['user']['name'] == '') {
    $errors['user']['name'] = "Name can't be blank";
  } else if(!preg_match($nameRegex, $_POST['user']['name'])) {
    $errors['user']['name'] = "This is not a valid name";
  }
  // Email Checks
  if ($_POST['user']['email'] == '') {
    $errors['user']['email'] = "Email can't be blank";
  } else if(!filter_var($_POST['user']['email'],FILTER_VALIDATE_EMAIL)) {
    $errors['user']['email'] = "Invalid Email";
  }
  // Mobile number checks
  if ($_POST['user']['mobile'] == '') {
    $errors['user']['mobile'] = "Number can not be blank";
  } else if(!preg_match($numberRegex, $_POST['user']['mobile'])){
    $errors['user']['mobile'] = "You must provide a valid mobile number";
  }
  // Day selection checks
  $day = unsetFB($_POST['day']);
  $showingTime = getShowingTime($day);
  if($day == "") {
    $errors['day'] = "You must select a day";
  } else if($showingTime == "Not valid") {
    header("Location: index.php");
  } else if($showingTime == "-") {
    $errors['day'] = "The film is not showing on this day";
  }

  // Seat Integer Checks
  $seatSelected = false;
  foreach ($_POST['seats'] as $seat => $amount) {
    global $seatSelected;
    if($amount != "") {
      $seatSelected = true;
      if(!filter_var($amount, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1, "max_range"=>10)))) {
        $errors['seats'] = "Please enter a valid number between 1 and 10";
      }
    }
  }
  if($seatSelected == false) {
    $errors['seats'] = "Please choose a ticket and enter an amount";
  }
  return $errors;
}

$pricingPolicy = [
  'MON'=> [ "12pm"=> "discount", "6pm"=> "discount", "9pm"=> "discount" ],
  'TUE'=> [ "12pm"=> "discount", "6pm"=> "full", "9pm"=> "full" ],
  'WED'=> [ "12pm"=> "discount", "6pm"=> "full", "9pm"=> "full" ],
  'THU'=> [ "12pm"=> "discount", "6pm"=> "full", "9pm"=> "full" ],
  'FRI'=> [ "12pm"=> "discount", "6pm"=> "full", "9pm"=> "full" ],
  'SAT'=> [ "12pm"=> "full", "3pm"=> "full", "6pm"=> "full", "9pm"=> "full" ],
  'SUN'=> [ "12pm"=> "full", "3pm"=> "full", "6pm"=> "full", "9pm"=> "full" ],
];

// Will return showing time or string confirming film is not showing on day passed to function
function getShowingTime($day) {
  $dayCategory = "";
  $time = "";
  global $movieObject;
  switch ($day) {
    case "MON":
      $dayCategory = "MON-TUES";
      break;
    case "TUES":
      $dayCategory = "MON-TUES";
      break;
    case "WED":
      $dayCategory = "WED-FRI";
      break;
    case "THURS":
      $dayCategory = "WED-FRI";
      break;
    case "FRI":
      $dayCategory = "WED-FRI";
      break;
    case "SAT":
      $dayCategory = "SAT-SUN";
      break;
    case "SUN":
      $dayCategory = "SAT-SUN";
      break;
    default:
      $dayCategory = "Day not valid";
  }
  if($dayCategory != "Day not valid") {
    $time = $movieObject[$_GET['movie']]["sessionTimes"][$dayCategory];
  } else {
    $time = "Not Valid";
  }
  return $time;
}

?>
