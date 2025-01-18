let currentSlideIndex = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;
const nextButton = document.querySelector('.next');
const prevButton = document.querySelector('.prev');

// Muestra la diapositiva correspondiente al índice actual
function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
    });
}

// Muestra la diapositiva inicial
showSlide(currentSlideIndex);

// Función para ir a la diapositiva siguiente
function nextSlide() {
    currentSlideIndex = (currentSlideIndex + 1) % totalSlides;
    showSlide(currentSlideIndex);
}

// Función para ir a la diapositiva anterior
function prevSlide() {
    currentSlideIndex = (currentSlideIndex - 1 + totalSlides) % totalSlides;
    showSlide(currentSlideIndex);
}

// Agregar eventos a los botones de siguiente y anterior
nextButton.addEventListener('click', nextSlide);
prevButton.addEventListener('click', prevSlide);

// Configurar cambio automático cada 8 segundos
setInterval(nextSlide, 5000);
