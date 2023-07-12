var navOpen = document.getElementById('nav-open');
var navDetails= document.getElementById('nav-details');
var navClose = document.getElementById('nav-close');

navOpen.addEventListener('click', () => {
   document.getElementById('nav-details').style.transform = 'translateX(0%)';
})

navClose.addEventListener('click', () => {
   document.getElementById('nav-details').style.transform = 'translateX(100%)';
})