   <script>
     const baseurl = "<?= base_url(); ?>";
     localStorage.setItem('redirectUrl', window.location.href);
   </script>
   <div class="projects-container18">
     <div class="projects-container19">
       <style>
         section {
           position: relative;
           overflow: hidden;
           background-color: var(--color-surface);
           color: var(--color-on-surface);
           padding: var(--spacing-4xl) 0;
         }
       </style>
     </div>
   </div>
   <div class="projects-container20">
     <div class="projects-container21">
       <script defer="" data-name="neonforge-logic">
         document.addEventListener('DOMContentLoaded', function() {
           (function() {
             // Scrollytelling Logic
             const scrollySteps = document.querySelectorAll(".scrolly-step")
             const visualLayers = document.querySelectorAll(".visual-layer")

             const observerOptions = {
               root: null,
               threshold: 0.6,
             }

             const scrollyObserver = new IntersectionObserver((entries) => {
               entries.forEach((entry) => {
                 if (entry.isIntersecting) {
                   const step = entry.target.getAttribute("data-step")

                   visualLayers.forEach((layer) => {
                     layer.classList.remove("active")
                     if (layer.getAttribute("data-step") === step) {
                       layer.classList.add("active")
                     }
                   })
                 }
               })
             }, observerOptions)

             scrollySteps.forEach((step) => scrollyObserver.observe(step))

             // Horizontal Scroll with Mouse Wheel for Carousels
             const tracks = document.querySelectorAll(".showcase-track-container, .testimonials-carousel")

             tracks.forEach((track) => {
               track.addEventListener("wheel", (e) => {
                 if (e.deltaY !== 0) {
                   e.preventDefault()
                   track.scrollLeft += e.deltaY
                 }
               })
             })
           })()
         });
       </script>
     </div>
   </div>

   <footer-wrapper class="footer-wrapper">
     <!--Footer component-->
     <div class="footer-container1">
       <footer class="footer-root">
         <div class="footer-wave-divider">
           <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
             <path d="M0,50 Q300,0 600,50 T1200,50 L1200,0 L0,0 Z" class="footer-wave-fill" />
           </svg>
         </div>
         <div class="footer-container">
           <div class="footer-grid">
             <div class="footer-brand-column">
               <div class="footer-logo-wrapper">
                 <i class="fas fa-chevron-right footer-brand-icon"></i>
                 <span class="footer-brand-name">NeonForge</span>
               </div>
               <p class="footer-brand-description section-content">
                 Experiencias web modernas, funcionales y visualmente
                 impactantes. Diseño con la energía digital.
               </p>
               <div class="footer-social-group">
                 <!-- Redes sociales comentadas temporalmente -->
                 <!--
                      <a href="#" aria-label="Github">
                        <div class="footer-social-link">
                          <i class="fab fa-github"></i>
                        </div>
                      </a>
                      <a href="#" aria-label="LinkedIn">
                        <div class="footer-social-link">
                          <i class="fab fa-linkedin"></i>
                        </div>
                      </a>
                      <a href="#" aria-label="Twitter">
                        <div class="footer-social-link">
                          <i class="fab fa-twitter"></i>
                        </div>
                      </a>
                      -->
               </div>
             </div>
             <div class="footer-nav-column">
               <h3 class="section-subtitle footer-column-title">
                 Navegación
               </h3>
               <ul class="footer-nav-list">
                 <li class="footer-nav-item">
                   <a href="#">
                     <div class="footer-nav-link"><span>Inicio</span></div>
                   </a>
                 </li>
                 <li class="footer-nav-item">
                   <a href="Projects">
                     <div class="footer-nav-link">
                       <span>Proyectos</span>
                     </div>
                   </a>
                 </li>
                 <li class="footer-nav-item">
                   <a href="#">
                     <div class="footer-nav-link">
                       <span>Servicios</span>
                     </div>
                   </a>
                 </li>
                 <li class="footer-nav-item">
                   <a href="#">
                     <div class="footer-nav-link">
                       <span>Sobre Mí</span>
                     </div>
                   </a>
                 </li>
               </ul>
             </div>

             <div class="footer-contact-column">
               <h3 class="section-subtitle footer-column-title">
                 Hablemos
               </h3>
               <p class="footer-contact-text section-content">
                 ¿Tienes un proyecto en mente? Empecemos a forjar el
                 futuro.
               </p>
               <div class="footer-contact-info">
                 <div class="footer-contact-item">
                   <i class="fas fa-envelope"></i>
                   <span class="footer-contact-value">
                     hello@neonforge.dev
                   </span>
                 </div>
               </div>
             </div>
           </div>
           <div class="footer-bottom">
           </div>
         </div>
         <div class="footer-wave-bottom">
           <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
             <path d="M0,50 Q300,100 600,50 T1200,50 L1200,120 L0,120 Z" />
           </svg>
         </div>
       </footer>
       <div class="footer-container2">
         <div class="footer-container3">
           <style>
             @media (prefers-reduced-motion: reduce) {

               .footer-social-link,
               .footer-nav-link {
                 transition: none;
               }

               .footer-social-link:hover {
                 transform: none;
               }
             }
           </style>
         </div>
       </div>
       <div class="footer-container4">
         <div class="footer-container5">
           <script src="Assets/archivosprincipal/js/footer.js" defer></script>
         </div>
       </div>
     </div>
   </footer-wrapper>

   </div>
   <link
     rel="canonical"
     href="https://substantial-linear-goshawk-hctv49.teleporthq.app/projects" />
   </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
   <script src="Assets/archivosprincipal/js/galeria.js" defer></script>
   <script src="Assets/archivosprincipal/js/timeline.js" defer></script>
   </body>

   </html>