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
              <!-- Imagen optimizada solo para móviles -->
              <img
              src="Assets/archivosprincipal/img/fondo.webp?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>"
                alt="Fondo hero móvil"
                class="thq-hero-video-bg-elm d-block d-md-none"
                style="width:100%;height:auto;object-fit:cover;"
              />
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
                Punto Digital
              </h1>
              <p
                class="hero-subtitle projects-hero-subtitle1 projects-hero-neon-description1"
              >
                Experiencias web modernas, funcionales y visualmente
                impactantes. Diseño que evocan
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

        <!-- ============================================ DESTACADOS / CAROUSEL ============================================ -->
        <section id="featured" class="showcase-carousel">
          <div class="showcase-header">
            <h2 class="section-title animate-slide-left">Proyectos Destacados</h2><br><br>
            <p class="section-subtitle animate-fade-up">
              Una selección de mis trabajos más innovadores con estética digital
              avanzada.
            </p>
          </div>
          <div class="carousel-container">
            <div class="carousel-wrapper">
              <div class="carousel-track" id="carouselTrack">
                <div class="carousel-slide showcase-card active">
                  <div class="showcase-card-media">
                    <img
                      alt="Quantum Dashboard"
                      src="Assets/archivosprincipal/img/2.webp?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>"
                
                    />
                  </div>
                  <div class="showcase-card-content">
                    <h3 class="showcase-title section-title">
                      SmartSupport
                    </h3>
                    <p class="section-content">
                      Plataforma de atención al cliente impulsada por IA para clasificación y priorización automática.
                    </p>
                  </div>
                </div>
                <div class="carousel-slide showcase-card">
                  <div class="showcase-card-media">
                    <img
                      alt="Nebula E-commerce"
                       src="Assets/archivosprincipal/img/7.webp?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>"
                
                    />
                  </div>
                  <div class="showcase-card-content">
                    <h3 class="showcase-title section-title">
                      Cursos en Línea
                    </h3>
                    <p class="section-content">
                      Plataforma educativa digital para creación, gestión y consumo de cursos en línea.
                    </p>
                  </div>
                </div>
                <div class="carousel-slide showcase-card">
                  <div class="showcase-card-media">
                    <img
                      alt="Aether Portfolio"
                   src="Assets/archivosprincipal/img/17.webp?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>"
                />
                  </div>
                  <div class="showcase-card-content">
                    <h3 class="showcase-title section-title">Comercio Electrónico</h3>
                    <p class="section-content">
                      Tienda virtual optimizada para conversiones con experiencia de compra fluida.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-dots">
              <button class="carousel-dot active" data-slide="0"></button>
              <button class="carousel-dot" data-slide="1"></button>
              <button class="carousel-dot" data-slide="2"></button>
            </div>
          </div>
          <div>
            <div class="projects-container17">
              <script src="Assets/archivosprincipal/js/carousel.js" defer></script>
            </div>
          </div>
        </section>
        <!-- ============================================ TIMELINE / CICLO DE VIDA ============================================ -->
        <section id="ciclo" class="timeline-neon">
          <div class="timeline-container">
            <h2 class="section-title timeline-header">
              Ciclo de Vida del Proyecto
            </h2>
            <div class="timeline-track">
              <div class="timeline-item left">
                <div class="timeline-marker"></div>
                <div class="timeline-content-box">
                  <span class="timeline-date">Fase 01</span>
                  <h3 class="section-title">Descubrimiento</h3>
                  <p class="section-content">
                    Análisis de requisitos y definición del stack tecnológico
                    óptimo para el impacto visual deseado.
                  </p>
                </div>
              </div>
              <div class="right timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content-box">
                  <span class="timeline-date">Fase 02</span>
                  <h3 class="section-title">Prototipado</h3>
                  <p class="section-content">
                    Diseño de interfaces de alta fidelidad centradas en la
                    estética digital y la experiencia de usuario.
                  </p>
                </div>
              </div>
              <div class="timeline-item left">
                <div class="timeline-marker"></div>
                <div class="timeline-content-box">
                  <span class="timeline-date">Fase 03</span>
                  <h3 class="section-title">Desarrollo Core</h3>
                  <p class="section-content">
                    Codificación limpia y eficiente, integrando animaciones
                    complejas y micro-interacciones.
                  </p>
                </div>
              </div>
              <div class="right timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content-box">
                  <span class="timeline-date">Fase 04</span>
                  <h3 class="section-title">Lanzamiento</h3>
                  <p class="section-content">
                    Optimización final, pruebas de rendimiento y despliegue en
                    entornos de alta disponibilidad.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- ============================================ CALL TO ACTION ============================================ -->
        <section id="propuesta" class="cta-neon">
          <div class="cta-wrapper">
            <div class="cta-content">
              <h2 class="section-title">¿Listo para forjar tu visión?</h2>
              <p class="section-content">
                Solicita una cotización personalizada o una
                propuesta para tu próximo proyecto de alto nivel.
              </p>
            </div>
            <div class="cta-feature">
              <div class="cta-box">
                <h3 class="section-title">Propuesta Digital</h3>
                <p class="section-content">
                  Analizamos tus objetivos y creamos un roadmap visual y técnico
                  sin compromiso.
                </p>
                <a href="#">
                  <div class="btn btn-sm btn-primary">
                    <span>Solicitar Revisión</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </section>
      

<?php
footerprincipal($data);
?>