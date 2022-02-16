/// Scroll Navigation ////
//Built from soultion provided by Trevor in Course Modules
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
