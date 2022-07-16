(function($) {
  const hamburger = document.querySelector('.toggle');
  const nav = document.querySelector('.nav');

  const handleClick = () => {
    hamburger.classList.toggle('open');
    nav.classList.toggle('open');
  }

  hamburger.addEventListener('click', handleClick);
})
(jQuery);
