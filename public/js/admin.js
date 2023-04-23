//const { remove } = require("lodash");

// add hovered class to selected list item
let list = document.querySelectorAll(".navigation_bar li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle_button = document.querySelector(".toggle_button");
let navigation_bar = document.querySelector(".navigation_bar");
let main_section = document.querySelector(".main_section");

toggle_button.onclick = function () {
  navigation_bar.classList.toggle("active");
  main_section.classList.toggle("active");
};


let message = document.getElementById("alert");

setTimeout(function() {
    message.remove();
  }, 3000);




