/*Contact Popup*/
var modalBtn = document.querySelector('.cta-add');
var modalBg = document.querySelector('.modal-bg');
var modalClose = document.querySelector('.modal-close');
modalBtn.addEventListener('click',function(){
modalBg.classList.add('bg-active');
});

modalClose.addEventListener('click',function(){
  modalBg.classList.remove('bg-active');
});


/*Sticky Header 
 */
window.onscroll = function() {myFunction()};
			
var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
  header.classList.add("sticky");
  } else {
  header.classList.remove("sticky");
  }
}

/* Details menu*/
function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
  tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
  tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}



const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');
const links = document.querySelectorAll('.nav-links li');
var mylogo = document.getElementById("myLogo");


hamburger.addEventListener('click', () => {
navLinks.classList.toggle('open');
links.forEach(link =>{
 link.classList.toggle("fade");

});
});

$(document).ready(function(){
  $('#hamburgerID').on('click', function() {
  //$('#myLogo').toggle().delay( 800 );
});
});

$( '.nav-links li a' ).on("click", function(){
  $('#hamburgerID').click();
});