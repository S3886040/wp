// Price Calculations //
// These variables are global variables relative to price Calculations
const tixQty = document.querySelectorAll("[type=number]");
const dayButtons = document.querySelectorAll("[type=radio]");
const totalDiv = document.getElementById("totalAmount");

// Here we set create our ticket selection object which will be updated as the customers
// enters data into the booking form.
// The object is initated by the PHP version if there is data saved for the user on reload.
let ticketSelection = ticketSelectionPHP;
// Prices object - data is taken from assignment 2 spec
let prices = {
  discount: {
    STA: 15.0,
    STP: 13.5,
    STC: 12.0,
    FCA: 24.0,
    FCP: 22.5,
    FCC: 21.0,
  },
  full: {
    STA: 20.5,
    STP: 18.0,
    STC: 16.5,
    FCA: 30.0,
    FCP: 27.0,
    FCC: 24.0,
  },
};

var pricingPolicy = {
  MON: { "12pm": "discount", "6pm": "discount", "9pm": "discount" },
  TUE: { "12pm": "discount", "6pm": "full", "9pm": "full" },
  WED: { "12pm": "discount", "6pm": "full", "9pm": "full" },
  THU: { "12pm": "discount", "6pm": "full", "9pm": "full" },
  FRI: { "12pm": "discount", "6pm": "full", "9pm": "full" },
  SAT: { "12pm": "full", "3pm": "full", "6pm": "full", "9pm": "full" },
  SUN: { "12pm": "full", "3pm": "full", "6pm": "full", "9pm": "full" },
};

function isFullDiscountedOrNotShowing(day, time) {
  if (
    typeof pricingPolicy[day] === "undefined" ||
    typeof pricingPolicy[day][time] === "undefined"
  ) {
    return "not showing";
  }

  return pricingPolicy[day][time];
}

// Will return a boolean value if file is showing. And update the global dayCategory
// Variable.
function getShowingTime(day) {
  let dayCategory = "";
  let time;
  // Maybe the best use of a switch case condition block is for days of the week.
  // We must set the customers individual day selection into a format which relates
  // to the master object created by the php object data.
  switch (day) {
    case "MON":
      dayCategory = "MON-TUES";
      break;
    case "TUES":
      dayCategory = "MON-TUES";
      break;
    case "WED":
      dayCategory = "WED-FRI";
      break;
    case "THURS":
      dayCategory = "WED-FRI";
      break;
    case "FRI":
      dayCategory = "WED-FRI";
      break;
    case "SAT":
      dayCategory = "SAT-SUN";
      break;
    case "SUN":
      dayCategory = "SAT-SUN";
      break;
  }
  time = movieObjectjs[currentMovie]["sessionTimes"][dayCategory];
  return time;
}

// This function will be called each time the day or ticket amount is updated.
function calculatePrices(ticketType) {
  // function variables
  let totalAmount = 0;
  // This nested loop will calculate the price using price objects and selections
  // comparing ticket selections to the price list. If there is a match this amount
  // will be added to the totalAmount
  for (let ticket in ticketSelection) {
    for (let price in prices[ticketType]) {
      if (ticket == price) {
        totalAmount += prices[ticketType][price] * ticketSelection[ticket];
      }
    }
  }
  // This will update our html page to inform the user of the price
  if (totalAmount > 0) {
    totalDiv.innerHTML = "$" + totalAmount.toFixed(2);
  } else {
    totalDiv.innerHTML = "";
  }
}

tixQty.forEach(function (item) {
  item.addEventListener("input", function (e) {
    let ticketChosen;
    tixQty.forEach(function (item) {
      item.classList.remove("badInput");
      if (item.value > 0) {
        ticketChosen = true;
      }
    });

    if (e.target.value > 10) {
      e.target.value = 10;
    } else if (e.target.value <= 0) {
      e.target.value = "";
    }

    let seatTypeTemp = e.target.name.slice(6, 9);
    if (ticketChosen) {
      ticketSelection[seatTypeTemp] = e.target.value;

      let time = getShowingTime(ticketSelection.day);
      let fullDiscountedOrNotShowing = isFullDiscountedOrNotShowing(
        ticketSelection.day,
        time
      );
      if (fullDiscountedOrNotShowing != "not showing") {
        calculatePrices(fullDiscountedOrNotShowing);
      } else {
        totalDiv.innerHTML = "";
      }
    } else {
      delete ticketSelection[seatTypeTemp];
      calculatePrices(ticketSelection.day);
    }
  });
});

notShowingModal = document.getElementById("not-showing-modal");
dayButtons.forEach((item) => {
  item.addEventListener("click", function (e) {
    ticketSelection.day = e.target.value;
    let time = getShowingTime(ticketSelection.day);
    let fullDiscountedOrNotShowing = isFullDiscountedOrNotShowing(
      ticketSelection.day,
      time
    );
    if (fullDiscountedOrNotShowing != "not showing") {
      calculatePrices(fullDiscountedOrNotShowing);
      notShowingModal.style.visibility = "hidden";
      notShowingModal.innerHTML = "";
    } else {
      notShowingModal.style.visibility = "visible";
      notShowingModal.innerHTML = "The film is not showing on this day";
      totalDiv.innerHTML = "";
    }
  });
});

// Regex Checks //
const nameInput = document.getElementById("nameInput");
const numberInput = document.getElementById("numberInput");
const emailInput = document.getElementById("emailInput");

const nameRegex = /^[a-zA-Z '.-]{1,100}$/;
const numberRegex = /^(\(04\)|04|\+614)( ?\d){8}$/;
const emailRegex = /^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-.]+$/;

function regexTester(regex, input) {
  let passed = false;
  if (!regex.test(input.value)) {
    input.classList.add("badInput");
  }
  if (regex.test(input.value)) {
    input.classList.remove("badInput");
    passed = true;
  }
  return passed;
}

nameInput.addEventListener("input", function () {
  regexTester(nameRegex, nameInput);
});

numberInput.addEventListener("input", function () {
  regexTester(numberRegex, numberInput);
});

emailInput.addEventListener("input", function () {
  regexTester(emailRegex, emailInput);
});

// On Form Submit //
const formSubmit = document.getElementById("formSubmit");

// Form submit will check all input fields and add feedback for the user
// if there are fields missing or not passing validity checks
formSubmit.addEventListener("click", function (e) {
  let ticketChosen = false;
  tixQty.forEach(function (item) {
    if (item.value > 0) {
      ticketChosen = true;
    }
  });
  if (!ticketChosen) {
    tixQty.forEach(function (item) {
      item.classList.add("badInput");
    });
  }

  if (ticketSelection.day == null) {
    notShowingModal.style.visibility = "visible";
    notShowingModal.innerHTML = "Please Select a day";
  }

  regexTester(nameRegex, nameInput);
  regexTester(numberRegex, numberInput);
  regexTester(emailRegex, emailInput);

  let showing = getShowingTime(ticketSelection.day);
  let fullDiscountedOrNotShowing = isFullDiscountedOrNotShowing(
    ticketSelection.day,
    time
  );

  if (
    !ticketChosen ||
    ticketSelection.day == null ||
    !regexTester(numberRegex, numberInput) ||
    !regexTester(numberRegex, numberInput) ||
    !regexTester(emailRegex, emailInput) ||
    showing == "not showing"
  ) {
    e.preventDefault();
  }
});

////////////////////////////
