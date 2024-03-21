// Preloader
window.addEventListener('load', function(){
  document.querySelector('#preloader')?.remove();
});

$(document).ready(()=>{
  // menu
  let menu_but = document.querySelector('.menu__mobile-but'),
  menu_ul = document.querySelector('.menu__ul');

  menu_but.addEventListener('click', ()=> menu_ul.classList.toggle('menu_active'));
  menu_ul.addEventListener('click', ()=> menu_ul.classList.remove('menu_active'));

  // slick slider
  $('.works__slider').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false,
    responsive: [
      {
        breakpoint: 990,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
    ]
  });

  // Анимированное изменение чисел
  let num = document.querySelector('#experience-num');
  let flag = true;
  document.addEventListener('scroll', ()=>{
    let screenY = window.pageYOffset; 
    if(num && flag && (screenY + window.innerHeight - 100 >= num.getBoundingClientRect().top + pageYOffset)){
      dynamicCount(num, 11396, 12000, 2, 10);
      flag = false;
    };
  }, {passive: true});

  function dynamicCount(elem, start, end, step, interval){
    let counter = start;
    setInterval(() => {
      if(counter < end){
        counter = step + counter;
        elem.innerText = counter;
      }
    }, interval);
  }

  // up button
  const btnUp = {
    el : document.querySelector('#up-but'),
    show(){
      this.el.classList.add('active');
    },

    hide(){
      this.el.classList.remove('active');
    },

    addEventListener(){
      window.addEventListener('scroll', ()=>{
        window.scrollY > 300 ? this.show() : this.hide();
      }, {passive: true});
      this.el.addEventListener('click', ()=> window.scrollTo({top:0, left:0, behavior: 'smooth'}))
    } 
  }
  btnUp.addEventListener();
});



// wow js
new WOW().init();