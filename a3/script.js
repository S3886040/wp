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
      let secTop = sections[i].offsetTop;
      let secBot = sections[i].offsetTop + sections[i].offsetHeight;
      if (window.scrollY >= secTop && window.scrollY < secBot) {
        navLinks[i].classList.add("current");
      } else {
        navLinks[i].classList.remove("current");
      }
    }
  }
};

// Price Calculations //
const tixQty = document.querySelectorAll("[type=number]");

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

let seatsSelected = {};

tixQty.forEach((item) => {
  item.addEventListener("input", (e) => {
    if (e.target.value > 10) {
      e.target.value = 10;
    } else if (e.target.value < 1 || e.target.value == 0) {
      e.target.value = "";
    }
    let seatTypeTemp = e.target.name.slice(6, 9);
    if (e.target.value != "") {
      seatsSelected[seatTypeTemp] = e.target.value;
      console.log(seatsSelected);
    } else {
      delete seatsSelected[seatTypeTemp];
      console.log(seatsSelected);
    }
  });
});

function calulatePrices(seats, ticketType) {}

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
