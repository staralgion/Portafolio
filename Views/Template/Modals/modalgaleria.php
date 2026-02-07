<!-- MODAL: Previsualización de páginas web en vertical o carrusel -->
<div class="modal fade" id="projectModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered galeria-modal-dialog">
    <div class="modal-content bg-dark border border-secondary">
      <div class="modal-header border-secondary">
        <h5 class="modal-title" id="projectTitle">Proyecto</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body p-2 galeria-modal-body">
        <!-- Carrusel para varias imágenes -->
        <div id="projectCarousel" class="carousel slide d-none">
          <div class="carousel-inner" id="carouselInner">
            <!-- Las imágenes se insertan por JS -->
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
        </div>
        <!-- Imagen única -->
        <img id="projectImage" src="" alt="Página web" class="w-100 galeria-modal-image d-block" />
      </div>
      <div class="modal-footer border-secondary">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
