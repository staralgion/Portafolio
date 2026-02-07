/**
 * Footer Component Logic
 * Maneja la interactividad del footer
 */

document.addEventListener('DOMContentLoaded', function() {
  (function(){
    const footerSocialLinks = document.querySelectorAll(".footer-social-link")

    footerSocialLinks.forEach((link) => {
      link.addEventListener("mouseenter", () => {
        const icon = link.querySelector("svg")
        if (icon) {
          icon.style.filter = "drop-shadow(0 0 5px currentColor)"
        }
      })

      link.addEventListener("mouseleave", () => {
        const icon = link.querySelector("svg")
        if (icon) {
          icon.style.filter = "none"
        }
      })
    })

    const ctaBtn = document.querySelector(".footer-cta-btn")
    if (ctaBtn) {
      ctaBtn.addEventListener("click", () => {
        console.log("NeonForge: Iniciando protocolo de contacto...")
      })
    }
  })()
});
