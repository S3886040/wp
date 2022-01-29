// Price Calculations //
// These variables are global variables relative to price Calculations
const tixQty = document.querySelectorAll("[type=number]");
const dayButtons = document.querySelectorAll("[type=radio]");
const totalDiv = document.getElementById("totalAmount");

// Here we set create our ticket selection object which will be updated as the customers
// enters data into the booking form.
let ticketSelection = { day: null };
// Prices object - data is taken from assignment 2 spec
let prices = {
  discountedPrices: {
    STA: 15.0,
    STP: 13.5,
    STC: 12.0,
    FCA: 24.0,
    FCP: 22.5,
    FCC: 21.0,
  },
  normalPrices: {
    STA: 20.5,
    STP: 18.0,
    STC: 16.5,
    FCA: 30.0,
    FCP: 27.0,
    FCC: 24.0,
  },
};

let dayCategory = "";
function isShowing(day) {
  let showing;
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
  if (movieObjectjs[currentMovie]["sessionTimes"][dayCategory] == "-") {
    showing = false;
  } else {
    showing = true;
  }
  return showing;
}

// This fuction will be called each time the day or ticket amount is updated.
function calculatePrices() {
  // function variables
  let ticketType = "normalPrices";
  let totalAmount = 0;

  if (ticketSelection.day != null) {
    // This loop will decide if the customers day selection will be calcualted
    // as a discounted price or normal price taking into consideration the screening
    // time.
    // movieObjectjs is taken from the global scope spun up by tools.php's php2js function
    for (var movie in movieObjectjs) {
      if (movie == currentMovie) {
        var time = movieObjectjs[movie].sessionTimes[dayCategory];
        if (time.length == 4) {
          time = time.slice(0, 2);
        } else if (time.length == 3) {
          time = time.slice(0, 1);
        }
        if (ticketSelection.day == "MON") {
          ticketType = "discountedPrices";
        } else if (
          (dayCategory == "MON-TUES" || "WED-FRI") &&
          time >= 12 &&
          time > 6
        ) {
          ticketType = "discountedPrices";
        } else {
          ticketType = "normalPrices";
        }
      }
    }

    // This nested loop will calculate the price using price objects and selections
    // then update the global variable totalAmount
    for (var ticket in ticketSelection) {
      for (var price in prices[ticketType]) {
        if (ticket == price) {
          totalAmount += prices[ticketType][price] * ticketSelection[ticket];
        }
      }
    }
    // This will update our html page to inform the user
    if (totalAmount > 0) {
      totalDiv.innerHTML = "$" + totalAmount.toFixed(2);
    } else {
      totalDiv.innerHTML = "";
    }
  }
}

tixQty.forEach(function (item) {
  item.addEventListener("input", function (e) {
    tixQty.forEach(function (item) {
      item.classList.remove("badInput");
    });

    if (e.target.value > 10) {
      e.target.value = 10;
    } else if (e.target.value <= 0) {
      e.target.value = "";
    }
    let seatTypeTemp = e.target.name.slice(6, 9);
    if (e.target.value != "") {
      ticketSelection[seatTypeTemp] = e.target.value;
      let showing = isShowing(ticketSelection.day);
      if (showing) {
        calculatePrices();
      } else {
        totalDiv.innerHTML = "";
      }
    } else {
      delete ticketSelection[seatTypeTemp];
      calculatePrices();
    }
  });
});

notShowingModal = document.getElementById("not-showing-modal");
dayButtons.forEach((item) => {
  item.addEventListener("click", function (e) {
    if (e.target.value != "") {
      ticketSelection.day = e.target.value;
      let showing = isShowing(ticketSelection.day);
      console.log(showing);
      if (showing) {
        calculatePrices();
        notShowingModal.style.visibility = "hidden";
        notShowingModal.innerHTML = "";
      } else {
        notShowingModal.style.visibility = "visible";
        notShowingModal.innerHTML = "The film is not showing on this day";
        totalDiv.innerHTML = "";
      }
    }
  });
});

// Regex Checks //
const nameInput = document.getElementById("nameInput");
const numberInput = document.getElementById("numberInput");
const emailInput = document.getElementById("emailInput");

const nameRegex = /^[a-zA-Z '.-]{1,255}$/;
const numberRegex = /^(\(04\)|04|\+614)( ?\d){8}$/;
const emailRegex = /^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-.]+$/;

function regexTester(regex, input) {
  console.log(input.value);
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

// On Submit //
const formSubmit = document.getElementById("formSubmit");

formSubmit.addEventListener("click", function (e) {
  let ticketChosen = false;
  for (var ticket in ticketSelection) {
    for (var price in prices["normalPrices"]) {
      if (ticket == price) {
        ticketChosen = true;
      }
    }
  }
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

  let showing = showing(ticketSelection.day);
  if (
    !ticketChosen ||
    ticketSelection.day == null ||
    !regexTester(numberRegex, numberInput) ||
    !regexTester(numberRegex, numberInput) ||
    regexTester(emailRegex, emailInput) ||
    !showing
  ) {
    e.preventDefault();
  }
});

////////////////////////////
