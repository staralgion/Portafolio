document.addEventListener('DOMContentLoaded', function() {
  
  const buttons = document.querySelectorAll('.btn-filter');
  const items = document.querySelectorAll('.galeria-item');

  // Datos de proyectos: image puede ser string (una imagen) o array (varias)
  const projectData = {
    'web-1': {
      title: 'E-Commerce Moderno',
      image: [
        baseurl + '/Assets/archivosprincipal/img/1.webp',
        baseurl + '/Assets/archivosprincipal/img/2.webp',
        baseurl + '/Assets/archivosprincipal/img/3.webp',
        baseurl + '/Assets/archivosprincipal/img/4.webp',
        baseurl + '/Assets/archivosprincipal/img/5.webp',
        baseurl + '/Assets/archivosprincipal/img/6.webp'
      ]
    },
    'mobile-1': {
      title: 'App de Fitness',
           image: [
         baseurl + '/Assets/archivosprincipal/img/7.webp',
        baseurl + '/Assets/archivosprincipal/img/8.webp',
        baseurl + '/Assets/archivosprincipal/img/9.webp',
        baseurl + '/Assets/archivosprincipal/img/10.webp',
        baseurl + '/Assets/archivosprincipal/img/11.webp',
        baseurl + '/Assets/archivosprincipal/img/12.webp',
        baseurl + '/Assets/archivosprincipal/img/13.webp'
      ]
    },
    'ui-1': {
      title: 'Diseño de Sistema UI',
      image: [
         baseurl + '/Assets/archivosprincipal/img/14.webp',
         baseurl + '/Assets/archivosprincipal/img/14a.webp',
        baseurl + '/Assets/archivosprincipal/img/15.webp',
        baseurl + '/Assets/archivosprincipal/img/16.webp',
        baseurl + '/Assets/archivosprincipal/img/17.webp',
        baseurl + '/Assets/archivosprincipal/img/18.webp',
      ]
    }
  };

  function showAll() {
    items.forEach(i => {
      i.style.display = '';
      i.classList.remove('d-none');
    });
  }

  buttons.forEach(btn => {
    btn.addEventListener('click', function() {
      const filter = this.getAttribute('data-filter');
      buttons.forEach(b => b.classList.remove('active'));
      this.classList.add('active');

      if (filter === 'all') {
        showAll();
        return;
      }

      items.forEach(i => {
        const cat = i.getAttribute('data-category');
        if (cat === filter) {
          i.style.display = '';
          i.classList.remove('d-none');
        } else {
          i.style.display = 'none';
          i.classList.add('d-none');
        }
      });
    });
  });

  // Abrir modal con imagen única o carrusel
  const projectCards = document.querySelectorAll('.galeria-card-inline');
  projectCards.forEach(card => {
    const button = card.querySelector('button[data-project]');
    if (button) {
      button.addEventListener('click', (e) => {
        e.preventDefault();
        const modal = new bootstrap.Modal(document.getElementById('projectModal'));
        const title = card.querySelector('h5').textContent;
        const projectKey = button.getAttribute('data-project');
        const data = projectData[projectKey];
        document.getElementById('projectTitle').textContent = title;

        // Limpiar carrusel
        const carousel = document.getElementById('projectCarousel');
        const carouselInner = document.getElementById('carouselInner');
        carouselInner.innerHTML = '';
        carousel.classList.add('d-none');
        document.getElementById('projectImage').classList.add('d-none');

        if (data && data.image) {
          if (Array.isArray(data.image)) {
            // Varias imágenes: mostrar carrusel
            data.image.forEach((img, idx) => {
              const item = document.createElement('div');
              item.className = 'carousel-item' + (idx === 0 ? ' active' : '');
              const imgTag = document.createElement('img');
              imgTag.src = img;
              imgTag.className = 'd-block w-100 galeria-modal-image';
              imgTag.alt = title + ' ' + (idx + 1);
              item.appendChild(imgTag);
              carouselInner.appendChild(item);
            });
            carousel.classList.remove('d-none');
          } else {
            // Una sola imagen
            document.getElementById('projectImage').src = data.image;
            document.getElementById('projectImage').classList.remove('d-none');
          }
        } else {
          document.getElementById('projectImage').src = './img/ejemplo.png';
          document.getElementById('projectImage').classList.remove('d-none');
        }
        modal.show();
      });
    }
  });

});