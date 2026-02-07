// Neonforge Logic - Modal and Scrollytelling

document.addEventListener('DOMContentLoaded', function() {
  (function(){
    // Modal Logic
    const modal = document.getElementById("projectModal")
    const modalImg = document.getElementById("modalImg")
    const modalTitle = document.getElementById("modalTitle")
    const closeBtn = document.getElementById("closeModal")
    const openButtons = document.querySelectorAll(".open-modal-btn")

    openButtons.forEach((btn) => {
      btn.addEventListener("click", () => {
        const parent = btn.closest(".gallery-item")
        const imgSource = parent.querySelector("img").src
        const titleText = parent.querySelector("h4").textContent

        modalImg.src = imgSource
        modalTitle.textContent = titleText
        modal.showModal()
      })
    })

    closeBtn.addEventListener("click", () => {
      modal.close()
    })

    modal.addEventListener("click", (e) => {
      if (e.target === modal) modal.close()
    })

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
