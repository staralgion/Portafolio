<!DOCTYPE html>
<html lang="en">

<head>
  <title>Projects - Substantial Linear Goshawk</title>
  <meta property="og:title" content="Projects - Substantial Linear Goshawk" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
  <meta property="twitter:card" content="summary_large_image" />



  <!-- Agrupación de todos los estilos principales -->
  <link rel="stylesheet" href="Assets/archivosprincipal/css/reset.css?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>" />
  <link rel="stylesheet" href="Assets/archivosprincipal/css/style.css?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>" />
  <link rel="stylesheet" href="Assets/archivosprincipal/css/navigation.css?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>" />
  <link rel="stylesheet" href="Assets/archivosprincipal/css/carousel.css?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>" />
  <link rel="stylesheet" href="Assets/archivosprincipal/css/footer.css?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>" />
  <link href="Assets/archivosprincipal/css/projects.css?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>" rel="stylesheet" />
  <!-- Estilos externos y fuentes -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/animate.css@4.1.1/animate.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" data-tag="font" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=STIX+Two+Text:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap" data-tag="font" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;display=swap" data-tag="font" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700,1,800,1,900&amp;display=swap" data-tag="font" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap" data-tag="font" />
  <!-- Estilos condicionales para galería -->
  <?php if (isset($data['page_name']) && $data['page_name'] === 'galeria'): ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Assets/archivosprincipal/css/galeria-section.css?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>" />
  <?php endif; ?>

  <link rel="stylesheet" href="Assets/archivosprincipal/css/style.css?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>" />
  <link rel="stylesheet" href="Assets/archivosprincipal/css/navigation.css?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>" />
  <link rel="stylesheet" href="Assets/archivosprincipal/css/carousel.css?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>" />
  <link rel="stylesheet" href="Assets/archivosprincipal/css/footer.css?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>" />
  <link href="Assets/archivosprincipal/css/projects.css?v=<?php echo isset($data['page_version']) ? $data['page_version'] : '1'; ?>" rel="stylesheet" />

</head>

<body>

  <div>


    <div class="projects-container10">
      <navigation-wrapper class="navigation-wrapper">
        <!--Navigation component-->
        <div class="navigation-container1">
          <nav class="navigation-root">
            <div class="navigation-container">
              <div class="navigation-left">
                <a href="index.html">
                  <div aria-label="NeonForge Inicio" class="navigation-brand">
                    <div class="navigation-logo-icon">
                      <i class="fas fa-chevron-right"></i>
                    </div>
                    <span class="section-title navigation-brand-text">
                      Punto Digital
                    </span>
                  </div>
                </a>
              </div>
              <div class="navigation-right">
                <div class="navigation-desktop-menu">
                  <ul class="navigation-links">
                    <li>
                      <a href="index.html">
                        <div class="navigation-link">
                          <span>Inicio</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#featured">
                        <div class="navigation-link">
                          <span>Destacados</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#ciclo">
                        <div class="navigation-link">
                          <span>Ciclo</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#propuesta">
                        <div class="navigation-link">
                          <span>Contactos</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                  <div class="navigation-cta-wrapper">
                    <a href="galeria.html">
                      <div class="navigation-cta btn-sm btn btn-primary">
                        <span>Galeria</span>
                        <i class="fas fa-arrow-right"></i>
                      </div>
                    </a>
                  </div>
                </div>
                <button
                  id="mobile-toggle"
                  aria-label="Abrir menú"
                  aria-controls="mobile-menu"
                  aria-expanded="false"
                  class="navigation-mobile-toggle">
                  <i class="fas fa-bars"></i>
                </button>
              </div>
            </div>
          </nav>
          <div id="mobile-menu" class="navigation-mobile-overlay">
            <div class="navigation-mobile-header">
              <a href="index.html">
                <div class="navigation-brand">
                  <div class="navigation-logo-icon">
                    <i class="fas fa-chevron-right"></i>
                  </div>
                  <span class="section-title navigation-brand-text">
                    Punto Digital
                  </span>
                </div>
              </a>
              <button
                id="mobile-close"
                aria-label="Cerrar menú"
                class="navigation-mobile-close">
                ✕
              </button>
            </div>
            <div class="navigation-mobile-content">
              <ul class="navigation-mobile-links">
                <li>
                  <a href="index.html">
                    <div class="navigation-mobile-link">
                      <span>Inicio</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#featured">
                    <div class="navigation-mobile-link">
                      <span>Destacados</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#ciclo">
                    <div class="navigation-mobile-link">
                      <span>Ciclo</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#propuesta">
                    <div class="navigation-mobile-link">
                      <span>Contactos</span>
                    </div>
                  </a>
                </li>
              </ul>
              <div class="navigation-mobile-footer">
                <a href="galeria.html">
                  <div class="navigation-mobile-cta btn btn-lg btn-primary">
                    <span>Galeria</span>
                    <i class="fas fa-arrow-right"></i>
                  </div>
                </a>
                <p class="navigation-mobile-tagline section-content">
                  Construyendo el futuro digital, un pixel a la vez.
                </p>
              </div>
            </div>
          </div>
          <div class="navigation-container2">
            <div class="navigation-container3">
              <style>
                @media (prefers-reduced-motion: reduce) {
                  .navigation-mobile-overlay {
                    transition: none;
                  }

                  .navigation-link::after {
                    transition: none;
                  }

                  .navigation-cta:hover {
                    transform: none;
                  }
                }
              </style>
            </div>
          </div>
          <div class="navigation-container4">
            <div class="navigation-container5">
              <script src="Assets/archivosprincipal/js/navigation.js" defer></script>
            </div>
          </div>
        </div>
      </navigation-wrapper>