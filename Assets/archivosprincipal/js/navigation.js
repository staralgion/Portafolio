/**
 * Navigation Component Logic
 * Maneja la lógica del menú móvil y comportamiento de la navegación
 */

document.addEventListener('DOMContentLoaded', function() {
  (function(){
    const mobileToggle = document.getElementById("mobile-toggle")
    const mobileClose = document.getElementById("mobile-close")
    const mobileMenu = document.getElementById("mobile-menu")
    const mobileLinks = document.querySelectorAll(".navigation-mobile-link")

    if (!mobileToggle) return; // Evitar errores si no existe el elemento

    const openMenu = () => {
      mobileMenu.classList.add("is-active")
      mobileToggle.setAttribute("aria-expanded", "true")
      mobileToggle.innerHTML = '<svg width="24" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6L18 18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>'
      document.body.style.overflow = "hidden"
    }

    const closeMenu = () => {
      mobileMenu.classList.remove("is-active")
      mobileToggle.setAttribute("aria-expanded", "false")
      mobileToggle.innerHTML = '<svg width="24" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>'
      document.body.style.overflow = ""
    }

    const toggleMenu = () => {
      if (mobileMenu.classList.contains("is-active")) {
        closeMenu()
      } else {
        openMenu()
      }
    }

    mobileToggle.addEventListener("click", toggleMenu)
    if (mobileClose) mobileClose.addEventListener("click", closeMenu)

    mobileLinks.forEach((link) => {
      link.addEventListener("click", closeMenu)
    })

    // Cerrar menú al cambiar tamaño de ventana
    window.addEventListener("resize", () => {
      if (window.innerWidth > 767 && mobileMenu.classList.contains("is-active")) {
        closeMenu()
      }
    })

    // Lógica de navegación con hide/show en scroll
    let lastScroll = 0
    const navRoot = document.querySelector(".navigation-root")

    window.addEventListener("scroll", () => {
      const currentScroll = window.pageYOffset

      if (currentScroll <= 0) {
        navRoot.style.boxShadow = "none"
        navRoot.style.height = "80px"
        return
      }

      if (currentScroll > lastScroll) {
        navRoot.style.transform = "translateY(-100%)"
      } else {
        navRoot.style.transform = "translateY(0)"
        navRoot.style.boxShadow = "0 10px 30px rgba(0, 0, 0, 0.5)"
        navRoot.style.height = "70px"
      }

      lastScroll = currentScroll
    })
  })()
});
