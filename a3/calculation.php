<?php
$pricingPolicy = [
  'MON'=> [ "12pm"=> "discount", "6pm"=> "discount", "9pm"=> "discount" ],
  'TUES'=> [ "12pm"=> "discount", "6pm"=> "full", "9pm"=> "full" ],
  'WED'=> [ "12pm"=> "discount", "6pm"=> "full", "9pm"=> "full" ],
  'THURS'=> [ "12pm"=> "discount", "6pm"=> "full", "9pm"=> "full" ],
  'FRI'=> [ "12pm"=> "discount", "6pm"=> "full", "9pm"=> "full" ],
  'SAT'=> [ "12pm"=> "full", "3pm"=> "full", "6pm"=> "full", "9pm"=> "full" ],
  'SUN'=> [ "12pm"=> "full", "3pm"=> "full", "6pm"=> "full", "9pm"=> "full" ],
];

$prices = [
  'discount' => [
    'STA' => 15.0,
    'STP'=> 13.5,
    'STC'=> 12.0,
    'FCA'=> 24.0,
    'FCP'=> 22.5,
    'FCC'=> 21.0,
  ],
  'full' => [
    'STA'=> 20.5,
    'STP'=> 18.0,
    'STC'=> 16.5,
    'FCA'=> 30.0,
    'FCP'=> 27.0,
    'FCC'=> 24.0,
  ]
];

function isFullDiscountedOrNotShowing($day, $time) {
  global $pricingPolicy;
  if (!isset($pricingPolicy[$day][$time])) {
    return "not showing";
  }

  return $pricingPolicy[$day][$time];
}

function calculatePrices($seats, $day, $time) {
  global $prices;
  $totals = [];
  $total['finalTotal'] = 0;
  $total['GST'] = 0;
  $fullDiscountedOrNotShowing = isFullDiscountedOrNotShowing($day, $time);
  foreach ($seats as $seat => $amount) {
    if($amount) {
      $totals['#' . $seat] = $amount;
      foreach ($prices[$fullDiscountedOrNotShowing] as $ticket => $price) {
        if($seat == $ticket) {
          $totals['$' . $seat] = $price * (int)$amount;
          $total['finalTotal'] += $price * (int)$amount;
        }
      }
    } else {
      $totals['#' . $seat] = 0;
      $totals['$' . $seat] = 0;
    }
  };
  $total['finalTotal'] = number_format($total['finalTotal'], 2);
  $total['GST'] = number_format($total['finalTotal'] / 11, 2);
  return $totals + $total;
}




 ?>
