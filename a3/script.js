/// Scroll Navigation ////
window.onscroll = function () {
  if (window.location.pathname.includes("index")) {
    let navLinks = document
      .getElementsByTagName("nav")[0]
      .getElementsByTagName("a");
    let sections = document
      .getElementsByTagName("main")[0]
      .getElementsByTagName("section");

    for (var i = 0; i < sections.length; i++) {
      let secTop = sections[i].offsetTop - 100;
      let secBot = sections[i].offsetTop + sections[i].offsetHeight - 100;
      if (window.scrollY > secTop && window.scrollY <= secBot) {
        navLinks[i].classList.add("current");
      } else {
        navLinks[i].classList.remove("current");
      }
    }
  }
};

// Price Calculations //
// These variables are global variables relative to price Calculations
const tixQty = document.querySelectorAll("[type=number]");
const dayButtons = document.querySelectorAll("[type=radio]");
let totalAmount = 0;
const totalDiv = document.getElementById("totalAmount");
// Prices object - data is taken assignment 2 spec
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

// here we set create our ticket selection object which will be updated as the customers
// enters data into the booking form.
let ticketSelection = { day: null };

// his fuction will be called each time the day or ticket amount is updated.
function calculatePrices() {
  // function variables
  let ticketType = "normalPrices";
  let dayCategory = "";
  totalAmount = 0;

  if (ticketSelection.day != null) {
    // Maybe the best use of a switch case condition block is for days of the week.
    // We must set the customers individual day selection into a format which relates
    // to the master object created by the php object data.
    switch (ticketSelection.day) {
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

    // This loop will decide if the customers day selection will be calcualted
    // as a discounted price or normal price taking into consideration the screening
    // time.
    for (var movie in movieObjectjs) {
      if (movie == currentMovie) {
        let time = movieObjectjs[movie].sessionTimes[dayCategory];
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
      let totalAmountTemp;
      for (var price in prices[ticketType]) {
        if (ticket == price) {
          totalAmount += prices[ticketType][price] * ticketSelection[ticket];
        }
      }
    }
    // This will update our html page to inform the user
    totalDiv.innerHTML = totalAmount;
  }
}

tixQty.forEach((item) => {
  item.addEventListener("input", (e) => {
    if (e.target.value > 10) {
      e.target.value = 10;
    } else if (e.target.value < 1 || e.target.value == 0) {
      e.target.value = "";
    }
    let seatTypeTemp = e.target.name.slice(6, 9);
    if (e.target.value != "") {
      ticketSelection[seatTypeTemp] = e.target.value;
      console.log(ticketSelection);
      calculatePrices();
    } else {
      delete ticketSelection[seatTypeTemp];
      console.log(ticketSelection);
      calculatePrices();
    }
  });
});
dayButtons.forEach((item) => {
  item.addEventListener("click", (e) => {
    if (e.target.value != "") {
      ticketSelection.day = e.target.value;
      console.log(ticketSelection);
      calculatePrices();
    }
  });
});

// Regex Checks //
const nameInput = document.getElementById("nameInput");
const numberInput = document.getElementById("numberInput");

const nameRegex = /^[a-zA-Z '.-]{1,255}$/;

const numberRegex = /^(\(04\)|04|\+614)( ?\d){8}$/;

nameInput.addEventListener("input", function () {
  if (!nameRegex.test(nameInput.value)) {
    nameInput.classList.add("badInput");
  }
  if (nameRegex.test(nameInput.value)) {
    nameInput.classList.remove("badInput");
  }
});

numberInput.addEventListener("input", function () {
  if (!numberRegex.test(numberInput.value)) {
    numberInput.classList.add("badInput");
  }
  if (numberRegex.test(numberInput.value)) {
    numberInput.classList.remove("badInput");
  }
});

////////////////////////////
