/*===========================
  Main JavaScript
============================*/

// Atualização do menu de navegação usando Intersection Observer
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav-link');
const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');

const observerOptions = {
  root: null,
  rootMargin: '-20% 0px -80% 0px',
  threshold: 0
};

const observerCallback = (entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const id = entry.target.getAttribute('id');
      
      // Atualiza links do menu principal
      navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${id}`) {
          link.classList.add('active');
        }
      });

      // Atualiza links do menu mobile
      mobileNavLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${id}`) {
          link.classList.add('active');
        }
      });
    }
  });
};

const observer = new IntersectionObserver(observerCallback, observerOptions);
sections.forEach(section => observer.observe(section));

// Header scroll effect
const header = document.getElementById("header")
if (header) {
  let lastScroll = 0
  window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset

    if (currentScroll <= 0) {
      header.classList.add("scrolled")
    } else {
      header.classList.remove("scrolled")
    }

    lastScroll = currentScroll
  })
}

document.addEventListener("DOMContentLoaded", () => {
  // Variables
  const menuToggle = document.getElementById("menu-toggle")
  const mobileMenu = document.getElementById("mobile-menu")
  const themeToggle = document.getElementById("theme-toggle")
  const scrollTopBtn = document.getElementById("scrollTopBtn")
  const tabBtns = document.querySelectorAll(".tab-btn")
  const tabPanels = document.querySelectorAll(".tab-panel")
  const filterBtns = document.querySelectorAll(".filter-btn")
  const projectItems = document.querySelectorAll(".project-item")
  const sliderContainer = document.querySelector(".slider-container")
  const prevBtn = document.querySelector(".prev-btn")
  const nextBtn = document.querySelector(".next-btn")
  const dots = document.querySelectorAll(".dot")
  const contactForm = document.getElementById("contactForm")
  const preloader = document.querySelector(".preloader")
  const revealElements = document.querySelectorAll(".reveal-left, .reveal-right, .reveal-up, .reveal-down")
  const animateElements = document.querySelectorAll(".animate-on-scroll")

  // Galáxia Effect
  const heroSection = document.querySelector('.hero')
  if (heroSection) {
    const galaxyContainer = document.createElement('div')
    galaxyContainer.className = 'galaxy-container'
    heroSection.appendChild(galaxyContainer)

    const canvas = document.createElement('canvas')
    canvas.className = 'galaxy-canvas'
    galaxyContainer.appendChild(canvas)

    const ctx = canvas.getContext('2d')
    let width = canvas.width = heroSection.offsetWidth
    let height = canvas.height = heroSection.offsetHeight

    // Ajusta o tamanho do canvas quando a janela é redimensionada
    window.addEventListener('resize', () => {
      width = canvas.width = heroSection.offsetWidth
      height = canvas.height = heroSection.offsetHeight
    })

    // Classe para os pontos
    class Point {
      constructor() {
        this.x = Math.random() * width
        this.y = Math.random() * height
        this.size = Math.random() * 3 + 1
        this.speedX = Math.random() * 0.8 - 0.4
        this.speedY = Math.random() * 0.8 - 0.4
        this.color = `rgba(77, 136, 255, ${Math.random() * 0.7 + 0.3})`
      }

      update() {
        this.x += this.speedX
        this.y += this.speedY

        // Mantém os pontos dentro da tela
        if (this.x < 0) this.x = width
        if (this.x > width) this.x = 0
        if (this.y < 0) this.y = height
        if (this.y > height) this.y = 0
      }

      draw() {
        ctx.beginPath()
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2)
        ctx.fillStyle = this.color
        ctx.fill()
      }
    }

    // Cria os pontos
    const points = []
    for (let i = 0; i < 150; i++) {
      points.push(new Point())
    }

    // Função para desenhar linhas entre pontos próximos
    function drawLines() {
      for (let i = 0; i < points.length; i++) {
        for (let j = i + 1; j < points.length; j++) {
          const dx = points[i].x - points[j].x
          const dy = points[i].y - points[j].y
          const distance = Math.sqrt(dx * dx + dy * dy)

          if (distance < 200) {
            ctx.beginPath()
            ctx.strokeStyle = `rgba(77, 136, 255, ${0.3 * (1 - distance / 200)})`
            ctx.lineWidth = 1
            ctx.moveTo(points[i].x, points[i].y)
            ctx.lineTo(points[j].x, points[j].y)
            ctx.stroke()
          }
        }
      }
    }

    // Função de animação
    function animate() {
      ctx.clearRect(0, 0, width, height)

      // Atualiza e desenha os pontos
      points.forEach(point => {
        point.update()
        point.draw()
      })

      // Desenha as linhas
      drawLines()

      requestAnimationFrame(animate)
    }

    // Inicia a animação
    animate()
  }

  // Loading Screen
  window.addEventListener("load", () => {
    setTimeout(() => {
      preloader.style.opacity = "0"
      preloader.style.visibility = "hidden"

      // Reveal animations after preloader
      setTimeout(() => {
        revealElements.forEach((el) => {
          el.classList.add("revealed")
        })
      }, 300)
    }, 1500)
  })

  // Check if elements are in viewport com IntersectionObserver
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("animate-visible")
          observer.unobserve(entry.target)
        }
      })
    },
    { threshold: 0.1 }
  )

  animateElements.forEach((element) => observer.observe(element))

  // Mobile menu toggle
  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener("click", function () {
      this.classList.toggle("active")
      mobileMenu.classList.toggle("active")
      document.body.classList.toggle("no-scroll")
    })

    // Close mobile menu when clicking on links
    document.querySelectorAll(".mobile-nav-link").forEach((link) => {
      link.addEventListener("click", () => {
        menuToggle.classList.remove("active")
        mobileMenu.classList.remove("active")
        document.body.classList.remove("no-scroll")
      })
    })
  }

  // Dark mode toggle
  if (themeToggle) {
    themeToggle.addEventListener("click", () => {
      document.body.classList.toggle("dark-mode")
      localStorage.setItem("dark-mode", document.body.classList.contains("dark-mode"))
    })

    // Check for saved theme preference
    if (localStorage.getItem("dark-mode") === "true") {
      document.body.classList.add("dark-mode")
    }
  }

  // Tabs functionality
  if (tabBtns.length > 0) {
    tabBtns.forEach((btn) => {
      btn.addEventListener("click", function () {
        const tabId = this.dataset.tab

        // Remove active class from all buttons and panels
        tabBtns.forEach((btn) => btn.classList.remove("active"))
        tabPanels.forEach((panel) => panel.classList.remove("active"))

        // Add active class to clicked button and corresponding panel
        this.classList.add("active")
        document.getElementById(tabId).classList.add("active")
      })
    })
  }

  // Project filtering
  filterBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      // Remove active class from all buttons
      filterBtns.forEach((btn) => btn.classList.remove("active"))

      // Add active class to clicked button
      this.classList.add("active")

      const filterValue = this.dataset.filter

      projectItems.forEach((item) => {
        if (filterValue === "all") {
          item.style.display = "block"
        } else {
          if (item.dataset.category.includes(filterValue)) {
            item.style.display = "block"
          } else {
            item.style.display = "none"
          }
        }
      })
    })
  })

  // Testimonial slider
  let currentSlide = 0
  const slideWidth = 100
  const slideCount = dots.length

  function goToSlide(index) {
    if (index < 0) {
      index = slideCount - 1
    } else if (index >= slideCount) {
      index = 0
    }

    sliderContainer.style.transform = `translateX(-${index * slideWidth}%)`

    // Update dots
    dots.forEach((dot) => dot.classList.remove("active"))
    dots[index].classList.add("active")

    currentSlide = index
  }

  // Initialize slider
  goToSlide(0)

  // Previous slide button
  prevBtn.addEventListener("click", () => {
    goToSlide(currentSlide - 1)
  })

  // Next slide button
  nextBtn.addEventListener("click", () => {
    goToSlide(currentSlide + 1)
  })

  // Dot navigation
  dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      goToSlide(index)
    })
  })

  // Auto slide
  let slideInterval = setInterval(() => {
    goToSlide(currentSlide + 1)
  }, 5000)

  // Pause auto slide on hover
  sliderContainer.addEventListener("mouseenter", () => {
    clearInterval(slideInterval)
  })

  sliderContainer.addEventListener("mouseleave", () => {
    slideInterval = setInterval(() => {
      goToSlide(currentSlide + 1)
    }, 5000)
  })

  // Scroll to top button
  if (scrollTopBtn) {
    scrollTopBtn.addEventListener("click", () => {
      window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
      })
    })

    // Mostrar/ocultar botão de voltar ao topo
    window.addEventListener("scroll", () => {
      if (window.scrollY > 300) {
        scrollTopBtn.classList.add("visible")
      } else {
        scrollTopBtn.classList.remove("visible")
      }
    })
  }

  // Stats counter animation
  function startCounter() {
    const counters = document.querySelectorAll(".counter")

    counters.forEach((counter) => {
      const target = +counter.dataset.target
      const count = +counter.innerText
      const increment = target / 100

      if (count < target) {
        counter.innerText = Math.ceil(count + increment)
        setTimeout(startCounter, 30)
      } else {
        counter.innerText = target
      }
    })
  }

  // Start counter when stats are in view
  const statsContainer = document.querySelector(".stats-container")
  if (statsContainer) {
    const statsObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            startCounter()
            statsObserver.unobserve(entry.target)
          }
        })
      },
      { threshold: 0.5 }
    )

    statsObserver.observe(statsContainer)
  }

  // Handle form submission
  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      e.preventDefault()

      // Form validation
      const name = document.getElementById("name").value
      const email = document.getElementById("email").value
      const message = document.getElementById("message").value

      if (!name || !email || !message) {
        alert("Por favor, preencha todos os campos obrigatórios.")
        return
      }

      // Simulate form submission
      const submitBtn = this.querySelector('button[type="submit"]')
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...'
      submitBtn.disabled = true

      setTimeout(() => {
        submitBtn.innerHTML = '<i class="fas fa-check"></i> Mensagem Enviada!'
        submitBtn.classList.add("btn-success")

        // Reset form
        contactForm.reset()

        // Reset button after delay
        setTimeout(() => {
          submitBtn.innerHTML = "Enviar Mensagem"
          submitBtn.disabled = false
          submitBtn.classList.remove("btn-success")
        }, 3000)
      }, 2000)
    })
  }
})

