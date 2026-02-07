<?php
headerprincipal($data);
?>
<!-- ============================================ HERO SECTION ============================================ -->
       

<section class="hero-neon">
          <div class="projects-hero-neon-bg1">
            <!-- Video para PC -->
            <video
              src="https://videos.pexels.com/video-files/11805191/11805191-hd_1274_720_24fps.mp4"
              loop="true"
              muted="true"
             
              autoplay="true"
              playsinline
              preload="none"
              class="thq-hero-video-bg-elm d-none d-md-block"
            ></video>
            <!-- Video optimizado solo para móviles -->
            <video
              src="Assets/archivosprincipal/video/fondo.webm"
              loop="true"
              muted="true"
    
              autoplay="true"
              playsinline
              preload="none"
              class="thq-hero-video-bg-elm d-block d-md-none"
            ></video>
            <div class="thq-hero-neon-wave-container-elm">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1440 320"
                preserveAspectRatio="none"
                class="thq-hero-neon-wave-elm"
              >
                <path
                  d="M0,160L48,176C96,192,192,224,288,224C384,224,480,192,576,165.3C672,139,768,117,864,128C960,139,1056,181,1152,197.3C1248,213,1344,203,1392,197.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
                  fill="var(--color-accent)"
                  fill-opacity="0.4"
                ></path>
                <path
                  d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,106.7C672,117,768,139,864,149.3C960,160,1056,160,1152,144C1248,128,1344,96,1392,80L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
                  fill="var(--color-primary)"
                  fill-opacity="0.3"
                ></path>
              </svg>
            </div>
            <div class="hero-neon-overlay"></div>
          </div>
          <div class="projects-hero-neon-content1">
            <div class="hero-neon-text-wrapper">
              <h1
                class="projects-projects-hero-title1 projects-hero-title2 hero-title projects-hero-neon-glow1"
              >
                NeonForge
              </h1>
              <p
                class="hero-subtitle projects-hero-subtitle1 projects-hero-neon-description1"
              >
                Experiencias web modernas, funcionales y visualmente
                impactantes. Diseño oscuro con acentos azul neón que evocan
                tecnología de alto nivel.
              </p>
              <div class="projects-hero-neon-actions1">
                <a href="#featured">
                  <div>
                    <div
                      class="projects-btn1 projects-btn-lg1 btn btn-lg btn-primary"
                    >
                      <span>Ver Destacados</span>
                    </div>
                  </div>
                </a>
                <div>
                  <div
                    class="projects-btn1 projects-btn-lg1 btn-outline btn btn-lg explorar-galeria-btn"
                  >
                    <span>Explorar Galería</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


         <!-- INICIO: Galería de tarjetas (añadido) -->
        <section class="galeria-added-section">
          <div class="container">
            <!-- filtros -->
            <div class="row mb-4 justify-content-end">
              <div class="col-auto">
                <div class="btn-group" role="group" aria-label="filtros">
                  <button type="button" class="btn btn-primary btn-filter btn-sm active" data-filter="all">Todos</button>
                  <button type="button" class="btn btn-outline-light btn-filter btn-sm" data-filter="web">Web</button>
                  <button type="button" class="btn btn-outline-light btn-filter btn-sm" data-filter="mobile">Mobile</button>
                  <button type="button" class="btn btn-outline-light btn-filter btn-sm" data-filter="ui">UI/UX</button>
                </div>
              </div>
            </div>

            <div class="row gy-4" id="galeria-grid">
            <div class="col-sm-6 col-lg-4 galeria-item" data-category="web">
              <div class="galeria-card-inline">
                <img class="galeria-img" src="https://images.unsplash.com/photo-1561070791-2526d30994b5?w=1200&h=800&fit=crop" alt="Proyecto 1">
                <div class="galeria-card-body">
                  <h5 class="mb-2">E-Commerce Moderno</h5>
                  <p class="mb-2">Plataforma de compras con React y Node.js, optimizada para conversiones.</p>
                  <div class="galeria-badges">
                    <span class="badge bg-primary">React</span>
                    <span class="badge bg-secondary">Node.js</span>
                  </div>
                  <button class="btn btn-sm btn-primary mt-3" type="button" data-project="web-1">Ver Proyecto</button>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 galeria-item" data-category="web">
              <div class="galeria-card-inline">
                <img class="galeria-img" src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=1200&h=800&fit=crop" alt="Proyecto 2">
                <div class="galeria-card-body">
                  <h5 class="mb-2">App de Fitness</h5>
                  <p class="mb-2">Aplicación móvil multiplataforma con seguimiento en tiempo real.</p>
                  <div class="galeria-badges">
                    <span class="badge bg-primary">Flutter</span>
                    <span class="badge bg-secondary">Firebase</span>
                  </div>
                  <button class="btn btn-sm btn-primary mt-3" type="button" data-project="mobile-1">Ver Proyecto</button>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 galeria-item" data-category="ui">
              <div class="galeria-card-inline">
                <img class="galeria-img" src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=1200&h=800&fit=crop" alt="Proyecto 3">
                <div class="galeria-card-body">
                  <h5 class="mb-2">Diseño de Sistema UI</h5>
                  <p class="mb-2">Sistema de diseño para plataforma SaaS con tokens y componentes reutilizables.</p>
                  <div class="galeria-badges">
                    <span class="badge bg-primary">Figma</span>
                    <span class="badge bg-secondary">Design System</span>
                  </div>
                  <button class="btn btn-sm btn-primary mt-3" type="button" data-project="ui-1">Ver Proyecto</button>
                </div>
              </div>
            </div>
            </div>
          </div>
        </section>
        <!-- FIN: Galería de tarjetas -->

<?php

footerprincipal($data);
getmodal('modalgaleria', $data);
?>