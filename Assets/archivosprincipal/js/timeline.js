/**
 * Timeline Component Logic
 * Maneja las animaciones del timeline con Intersection Observer
 */

document.addEventListener('DOMContentLoaded', function() {
  const timelineItems = document.querySelectorAll('.timeline-item');
  
  if (timelineItems.length === 0) return; // Evitar errores si no existen elementos
  
  const observerOptions = {
    threshold: 0.2,
    rootMargin: '0px 0px -50px 0px'
  };
  
  const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate-in');
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);
  
  timelineItems.forEach(item => {
    observer.observe(item);
  });
});
