const slider = document.getElementById('slider');
const btnLeft = document.querySelector('.btn-left');
const btnRight = document.querySelector('.btn-right');

let sectionIndex = 0;
const sections = document.querySelectorAll('.slider-section');
const totalSections = sections.length;
const visibleSections = 3; // Número de secciones visibles a la vez
const sectionWidth = 100 / visibleSections; // Ancho de cada sección en porcentaje

btnRight.addEventListener('click', () => {
    sectionIndex = (sectionIndex < totalSections - visibleSections) ? sectionIndex + 1 : 0;
    slider.style.transform = 'translateX(' + (-sectionIndex * sectionWidth) + '%)';
});

btnLeft.addEventListener('click', () => {
    sectionIndex = (sectionIndex > 0) ? sectionIndex - 1 : totalSections - visibleSections;
    slider.style.transform = 'translateX(' + (-sectionIndex * sectionWidth) + '%)';
});
