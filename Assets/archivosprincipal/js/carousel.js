/**
 * Carousel Component Logic
 * Maneja la lógica del carrusel de proyectos con efecto abanico
 */

document.addEventListener('DOMContentLoaded', function() {
  let currentSlide = 0;
  const track = document.getElementById('carouselTrack');
  if (!track) return; // Evitar errores si no existe

  const slides = Array.from(track.querySelectorAll('.carousel-slide'));
  const dots = document.querySelectorAll('.carousel-dot');

  // Detectar si es PC (1200px+)
  const isPC = window.innerWidth >= 1200;

  function updateCarousel() {
    slides.forEach((slide, index) => {
      slide.classList.remove('active');
      
      // Calcular posición relativa al slide actual
      let relativePos = (index - currentSlide + slides.length) % slides.length;
      
      // Configurar posiciones en forma de abanico
      let rotation, offsetX, scale, opacity, zIndex;
      
      if (relativePos === 0) {
        // Carta frontal (principal - en el centro)
        rotation = 0;
        offsetX = 0;
        scale = 1;
        opacity = 1;
        zIndex = 30;
        slide.classList.add('active');
      } else if (relativePos === 1) {
        // Segunda carta (a la derecha)
        rotation = 20;
        offsetX = isPC ? 220 : 80;
        scale = 0.95;
        opacity = 0.8;
        zIndex = 20;
      } else if (relativePos === 2) {
        // Tercera carta (a la izquierda)
        rotation = -20;
        offsetX = isPC ? -220 : -80;
        scale = 0.95;
        opacity = 0.8;
        zIndex = 20;
      } else {
        // Cartas que no se ven
        rotation = 0;
        offsetX = 0;
        scale = 0.8;
        opacity = 0;
        zIndex = 1;
      }
      
      slide.style.zIndex = zIndex;
      slide.style.opacity = opacity;
      slide.style.transform = `translate(calc(-50% + ${offsetX}px), -50%) rotateZ(${rotation}deg) scale(${scale})`;
    });
    
    // Actualizar dots
    dots.forEach((dot, index) => {
      dot.classList.remove('active');
      if (index === currentSlide) {
        dot.classList.add('active');
      }
    });
  }

  function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    updateCarousel();
  }

  // Inicializar
  updateCarousel();

  // Eventos de click en las cartas
  slides.forEach((slide, index) => {
    slide.addEventListener('click', () => {
      currentSlide = index;
      updateCarousel();
    });
  });

  // Eventos de los dots
  dots.forEach(dot => {
    dot.addEventListener('click', () => {
      currentSlide = parseInt(dot.getAttribute('data-slide'));
      updateCarousel();
    });
  });

  // Auto-play carousel
  setInterval(nextSlide, 6000);
});
