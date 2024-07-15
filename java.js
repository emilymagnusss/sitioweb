// menu desplegable de usuario
const dropdownToggle = document.querySelector('.dropdown-toggle');
const dropdownMenu = document.querySelector('.dropdown-menu');

dropdownToggle.addEventListener('click', () => {
  dropdownMenu.classList.toggle('show');
});



// Selecionar los elementos del carousel
const carousel = document.getElementById('Carousel');
const sliderList = carousel.querySelector('.slider-list');
const sliderSlides = sliderList.children;
const sliderControlCenterRight = carousel.querySelector('.slider-control-centerright');
const sliderControlBottomRight = carousel.querySelector('.slider-control-bottomright');
const controls = sliderControlBottomRight.children;

// Variables para controlar el carousel
let currentSlide = 0;
let slideWidth = sliderSlides[0].offsetWidth;
let sliderListWidth = sliderList.offsetWidth;
let animationDuration = 500; // Duración de la animación en milisegundos

// Función para mover el carousel a la siguiente diapositiva
function nextSlide() {
  currentSlide++;
  if (currentSlide >= sliderSlides.length) {
    currentSlide = 0;
  }
  animateSlider();
}

// Función para mover el carousel a la diapositiva anterior
function prevSlide() {
  currentSlide--;
  if (currentSlide < 0) {
    currentSlide = sliderSlides.length - 1;
  }
  animateSlider();
}

// Función para animar el carousel
function animateSlider() {
  sliderList.style.transform = `translate3d(${currentSlide * -slideWidth}px, 0px, 0px)`;
  sliderList.style.transition = `transform ${animationDuration}ms ease`;
}

// Función para actualizar los controles del carousel
function updateControls() {
  for (let i = 0; i < controls.length; i++) {
    controls[i].classList.remove('active');
  }
  controls[currentSlide].classList.add('active');
}

// Event listeners para los controles del carousel
sliderControlCenterRight.addEventListener('click', nextSlide);
sliderControlBottomRight.addEventListener('click', prevSlide);

// Inicializar el carousel
animateSlider();
updateControls();

// Actualizar el carousel cuando se cambia de tamaño la ventana
window.addEventListener('resize', () => {
  slideWidth = sliderSlides[0].offsetWidth;
  sliderListWidth = sliderList.offsetWidth;
  animateSlider();
});

