let currentCarouselIndex = 1;

function showCarousel(index) {
    document.getElementById('carousel').style.display = 'block'; // Mostrar carrusel
    currentCarouselIndex = index;
    updateCarousel();
}

function updateCarousel() {
    const items = document.querySelectorAll('.carousel-item');
    items.forEach((item, index) => {
        item.classList.remove('active');
        if (index + 1 === currentCarouselIndex) {
            item.classList.add('active');
        }
    });
}

function nextItem() {
    currentCarouselIndex = currentCarouselIndex < 12 ? currentCarouselIndex + 1 : 1;
    updateCarousel();
}

function prevItem() {
    currentCarouselIndex = currentCarouselIndex > 1 ? currentCarouselIndex - 1 : 12;
    updateCarousel();
}
