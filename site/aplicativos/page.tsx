"use client"

import { useState, useEffect, useCallback } from "react"
import Image from "next/image"
import Link from "next/link"
import { Github, Linkedin, Mail, ExternalLink, Menu, X, ArrowRight } from "lucide-react"

export default function Home() {
  const [activeSection, setActiveSection] = useState<string>("home")
  const [menuOpen, setMenuOpen] = useState<boolean>(false)
  const [scrolled, setScrolled] = useState<boolean>(false)
  const [animateElements, setAnimateElements] = useState<boolean>(false)

  // Otimizado com useCallback para melhor performance
  const handleScroll = useCallback(() => {
    const sections = ["home", "sobre", "habilidades", "projetos", "contato"]
    
    // Check if page is scrolled for navbar styling
    if (window.scrollY > 50) {
      setScrolled(true)
    } else {
      setScrolled(false)
    }
    
    // Determine active section
    for (const section of sections) {
      const element = document.getElementById(section)
      if (element) {
        const rect = element.getBoundingClientRect()
        if (rect.top <= 100 && rect.bottom >= 100) {
          setActiveSection(section)
          break
        }
      }
    }
  }, [])

  useEffect(() => {
    // Adiciona debounce para melhorar performance
    let timeoutId: NodeJS.Timeout | null = null;
    
    const debouncedHandleScroll = () => {
      if (timeoutId) {
        clearTimeout(timeoutId);
      }
      
      timeoutId = setTimeout(() => {
        handleScroll();
      }, 100);
    };
    
    window.addEventListener("scroll", debouncedHandleScroll)
    
    // Executa uma vez para definir o estado inicial
    handleScroll()
    
    // Ativa animações após carregamento da página
    setTimeout(() => {
      setAnimateElements(true);
    }, 300);
    
    return () => {
      window.removeEventListener("scroll", debouncedHandleScroll)
      if (timeoutId) {
        clearTimeout(timeoutId)
      }
    }
  }, [handleScroll])

  // Função para animar elementos quando entram na viewport
  const checkElementsInView = useCallback(() => {
    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    
    animatedElements.forEach(element => {
      const elementTop = element.getBoundingClientRect().top;
      const elementBottom = element.getBoundingClientRect().bottom;
      
      // Se o elemento estiver visível na viewport
      if (elementTop < window.innerHeight - 100 && elementBottom > 0) {
        element.classList.add('animate-visible');
      }
    });
  }, []);

  useEffect(() => {
    window.addEventListener('scroll', checkElementsInView);
    // Verificar elementos visíveis no carregamento inicial
    checkElementsInView();
    
    return () => {
      window.removeEventListener('scroll', checkElementsInView);
    };
  }, [checkElementsInView]);

  return (
    <div className="bg-black text-white min-h-screen">
      {/* Navigation */}
      <header
        className={`fixed top-0 left-0 w-full z-50 transition-all duration-300 ${scrolled ? "bg-black/80 backdrop-blur-md" : "bg-transparent"}`}
      >
        <div className="container mx-auto px-6 py-4 flex justify-between items-center">
          <Link href="/" className="text-xl font-light tracking-widest">
            PORTFOLIO<span className="text-blue-500">.</span>
          </Link>

          <nav className="hidden md:block">
            <ul className="flex space-x-8">
              {[
                { id: "home", label: "Início" },
                { id: "sobre", label: "Sobre" },
                { id: "habilidades", label: "Habilidades" },
                { id: "projetos", label: "Projetos" },
                { id: "contato", label: "Contato" },
              ].map((item) => (
                <li key={item.id}>
                  <a
                    href={`#${item.id}`}
                    className={`relative py-2 px-1 text-sm uppercase tracking-wider transition-colors duration-300 ${activeSection === item.id ? "text-blue-500" : "text-white/70 hover:text-white"}`}
                    onClick={() => setActiveSection(item.id)}
                    aria-current={activeSection === item.id ? "page" : undefined}
                  >
                    {item.label}
                    {activeSection === item.id && (
                      <span className="absolute bottom-0 left-0 w-full h-px bg-blue-500"></span>
                    )}
                  </a>
                </li>
              ))}
            </ul>
          </nav>

          <button
            onClick={() => setMenuOpen(!menuOpen)}
            className="md:hidden text-white/70 hover:text-white transition-colors duration-300"
            aria-label={menuOpen ? "Fechar menu" : "Abrir menu"}
            aria-expanded={menuOpen}
          >
            {menuOpen ? <X size={24} /> : <Menu size={24} />}
          </button>
        </div>

        {/* Mobile Menu */}
        {menuOpen && (
          <div className="fixed inset-0 bg-black z-40 md:hidden pt-20">
            <div className="container mx-auto px-6 py-8">
              <ul className="space-y-6">
                {[
                  { id: "home", label: "Início" },
                  { id: "sobre", label: "Sobre" },
                  { id: "habilidades", label: "Habilidades" },
                  { id: "projetos", label: "Projetos" },
                  { id: "contato", label: "Contato" },
                ].map((item) => (
                  <li key={item.id}>
                    <a
                      href={`#${item.id}`}
                      className={`block text-2xl font-light tracking-wider transition-colors duration-300 ${activeSection === item.id ? "text-blue-500" : "text-white/70"}`}
                      onClick={() => {
                        setActiveSection(item.id)
                        setMenuOpen(false)
                      }}
                      aria-current={activeSection === item.id ? "page" : undefined}
                    >
                      {item.label}
                    </a>
                  </li>
                ))}
              </ul>

              <div className="flex space-x-6 mt-12 pt-12 border-t border-white/10">
                <a 
                  href="#" 
                  className="text-white/50 hover:text-white transition-colors duration-300"
                  aria-label="GitHub"
                >
                  <Github size={20} />
                </a>
                <a 
                  href="#" 
                  className="text-white/50 hover:text-white transition-colors duration-300"
                  aria-label="LinkedIn"
                >
                  <Linkedin size={20} />
                </a>
                <a 
                  href="#" 
                  className="text-white/50 hover:text-white transition-colors duration-300"
                  aria-label="Email"
                >
                  <Mail size={20} />
                </a>
              </div>
            </div>
          </div>
        )}
      </header>

      {/* Hero Section */}
      <section id="home" className="min-h-screen flex items-center relative overflow-hidden">
        <div className="absolute top-0 left-0 w-full h-full">
          <div className="absolute top-1/4 left-1/4 w-64 h-64 rounded-full bg-blue-500/10 blur-3xl animate-pulse"></div>
          <div className="absolute bottom-1/3 right-1/4 w-80 h-80 rounded-full bg-indigo-500/10 blur-3xl animate-pulse" style={{ animationDelay: '1s' }}></div>
        </div>

        <div className="container mx-auto px-6 pt-20 relative z-10">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div className={`transition-all duration-1000 transform ${animateElements ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'}`}>
              <h1 className="text-5xl md:text-7xl font-light tracking-tight mb-6">
                <span className="block">Olá, meu nome é</span>
                <span className="text-blue-500 font-normal">Thales Santos</span>
              </h1>
              <p className="text-white/70 text-lg md:text-xl mb-8 max-w-lg">Desenvolvedor web</p>
              <div className="flex flex-wrap gap-4">
                <a
                  href="#projetos"
                  className="px-8 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-full transition-all duration-300 inline-flex items-center focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-black hover:scale-105"
                >
                  Ver Projetos
                  <ArrowRight size={16} className="ml-2" />
                </a>
                <a
                  href="#contato"
                  className="px-8 py-3 bg-transparent border border-white/20 hover:border-white/50 text-white rounded-full transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white/50 focus:ring-offset-2 focus:ring-offset-black hover:scale-105"
                >
                  Contato
                </a>
              </div>
            </div>
            <div className={`hidden lg:block transition-all duration-1000 delay-300 transform ${animateElements ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'}`}>
              <div className="relative">
                <div className="absolute inset-0 bg-gradient-to-tr from-blue-500/20 to-indigo-500/20 rounded-2xl blur-md"></div>
                <div className="relative bg-black/40 backdrop-blur-sm border border-white/10 p-8 rounded-2xl hover:border-blue-500/50 transition-all duration-500 transform hover:-translate-y-1">
                  <div className="flex items-center mb-6">
                    <div className="w-3 h-3 rounded-full bg-red-500 mr-2"></div>
                    <div className="w-3 h-3 rounded-full bg-yellow-500 mr-2"></div>
                    <div className="w-3 h-3 rounded-full bg-green-500"></div>
                  </div>
                  <pre className="font-mono text-sm text-white/80">
                    <code>
                      <span className="text-blue-400">const</span> <span className="text-green-400">developer</span> ={" "}
                      {"{"}
                      <br />
                      {"  "}name: <span className="text-yellow-300">'Thales Santos'</span>,
                      <br />
                      {"  "}skills: [<span className="text-yellow-300">'HTML'</span>,{" "}
                      <span className="text-yellow-300">'CSS'</span>,{" "}
                      <span className="text-yellow-300">'JavaScript'</span>,{" "}
                      <span className="text-yellow-300">'Java'</span>],
                      <br />
                      {"  "}passion: <span className="text-yellow-300">'Criar experiências web incríveis'</span>
                      <br />
                      {"}"};
                    </code>
                  </pre>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div className="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex flex-col items-center">
          <span className="text-white/50 text-sm mb-2">Role para baixo</span>
          <div className="w-5 h-9 border border-white/20 rounded-full flex justify-center">
            <span className="w-1 h-2 bg-white/50 rounded-full mt-1 animate-bounce"></span>
          </div>
        </div>
      </section>

      {/* About Section */}
      <section id="sobre" className="py-24 relative">
        <div className="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
        <div className="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>

        <div className="container mx-auto px-6">
          <div className="max-w-3xl mx-auto">
            <h2 className="text-3xl font-light tracking-tight mb-12 text-center animate-on-scroll">
              Sobre <span className="text-blue-500">Mim</span>
            </h2>

            <div className="grid grid-cols-1 md:grid-cols-3 gap-8 items-center mb-12">
              <div className="md:col-span-1 animate-on-scroll">
                <div className="relative">
                  <div className="absolute inset-0 bg-blue-500/20 rounded-xl blur-md"></div>
                  <div className="relative overflow-hidden rounded-xl border border-white/10 transition-all duration-500 hover:border-blue-500/50 transform hover:scale-105">
                    <Image
                      src="/placeholder.svg?height=400&width=300"
                      alt="Perfil"
                      width={300}
                      height={400}
                      className="w-full h-auto object-cover"
                      priority
                    />
                  </div>
                </div>
              </div>

              <div className="md:col-span-2 animate-on-scroll">
                <p className="text-white/70 mb-6">
                  Sou um desenvolvedor web iniciante, apaixonado por esse mundo tecnológico e futurista.
                </p>

                <div className="grid grid-cols-2 gap-4 text-sm">
                  <div className="transition-all duration-300 hover:bg-white/5 p-2 rounded-lg">
                    <p className="text-white/50 mb-1">Nome:</p>
                    <p className="text-white">Thales Ligoski dos Santos</p>
                  </div>
                  <div className="transition-all duration-300 hover:bg-white/5 p-2 rounded-lg">
                    <p className="text-white/50 mb-1">Email:</p>
                    <p className="text-white">tp.ligoskitls@gmail.com</p>
                  </div>
                  <div className="transition-all duration-300 hover:bg-white/5 p-2 rounded-lg">
                    <p className="text-white/50 mb-1">Localização:</p>
                    <p className="text-white">Curitiba - PR</p>
                  </div>
                  <div className="transition-all duration-300 hover:bg-white/5 p-2 rounded-lg">
                    <p className="text-white/50 mb-1">Disponibilidade:</p>
                    <p className="text-white">Disponível para Freelance</p>
                  </div>
                </div>
              </div>
            </div>

            <div className="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
              {[
                { value: "6+", label: "Meses de Experiência" },
                { value: "0", label: "Projetos Completos" },
                { value: "0", label: "Clientes Satisfeitos" },
                { value: "0", label: "Prêmios Recebidos" }
              ].map((stat, index) => (
                <div 
                  key={index} 
                  className="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-xl animate-on-scroll transition-all duration-500 hover:bg-white/10 hover:border-blue-500/30 transform hover:-translate-y-1"
                  style={{ animationDelay: `${index * 100}ms` }}
                >
                  <h3 className="text-3xl font-light text-blue-500 mb-2">{stat.value}</h3>
                  <p className="text-white/70 text-sm">{stat.label}</p>
                </div>
              ))}
            </div>
          </div>
        </div>
      </section>

      {/* Skills Section */}
      <section id="habilidades" className="py-24 relative">
        <div className="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
        <div className="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>

        <div className="container mx-auto px-6">
          <h2 className="text-3xl font-light tracking-tight mb-12 text-center animate-on-scroll">
            Minhas <span className="text-blue-500">Habilidades</span>
          </h2>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
            {[
              { name: "Desenvolvimento Frontend", skills: ["HTML5", "CSS3", "JavaScript", "Java"] },
              { name: "Desenvolvimento Backend", skills: ["SQL"] },
              { name: "Ferramentas", skills: ["GitHub", "VS Code"] },
              {
                name: "Soft Skills",
                skills: ["Comunicação", "Trabalho em Equipe", "Resolução de Problemas", "Adaptabilidade"],
              },
            ].map((category, index) => (
              <div
                key={index}
                className="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-xl hover:bg-white/10 transition-all duration-500 animate-on-scroll transform hover:-translate-y-1 hover:border-blue-500/30"
                style={{ animationDelay: `${index * 150}ms` }}
              >
                <h3 className="text-xl font-light mb-4 text-blue-500">{category.name}</h3>
                <div className="flex flex-wrap gap-2">
                  {category.skills.map((skill, skillIndex) => (
                    <span 
                      key={skillIndex} 
                      className="px-3 py-1 bg-white/10 rounded-full text-xs text-white/70 transition-all duration-300 hover:bg-blue-500/20 hover:text-white"
                    >
                      {skill}
                    </span>
                  ))}
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Projects Section */}
      <section id="projetos" className="py-24 relative">
        <div className="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
        <div className="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>

        <div className="container mx-auto px-6">
          <h2 className="text-3xl font-light tracking-tight mb-12 text-center animate-on-scroll">
            Meus <span className="text-blue-500">Projetos</span>
          </h2>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
            {[1, 2, 3, 4, 5, 6].map((project, index) => (
              <div
                key={project}
                className="group relative bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl overflow-hidden animate-on-scroll transition-all duration-500 hover:border-blue-500/30 transform hover:-translate-y-2"
                style={{ animationDelay: `${index * 100}ms` }}
              >
                <div className="relative h-48 overflow-hidden">
                  <Image
                    src={`/placeholder.svg?height=300&width=500`}
                    alt={`Projeto ${project}`}
                    fill
                    className="object-cover transition-transform duration-500 group-hover:scale-110"
                  />
                  <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                    <div className="flex space-x-3">
                      <a
                        href="#"
                        className="w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center hover:bg-blue-600 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-black transform hover:scale-110"
                        aria-label="Ver projeto"
                      >
                        <ExternalLink size={16} />
                      </a>
                      <a
                        href="#"
                        className="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm text-white flex items-center justify-center hover:bg-white/20 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white/50 focus:ring-offset-2 focus:ring-offset-black transform hover:scale-110"
                        aria-label="Ver código no GitHub"
                      >
                        <Github size={16} />
                      </a>
                    </div>
                  </div>
                </div>

                <div className="p-6">
                  <h3 className="text-lg font-light text-white mb-2">Projeto {project}</h3>
                  <p className="text-white/50 text-sm mb-4 line-clamp-2">
                    Uma breve descrição deste projeto. Isso explica o que o projeto faz e as tecnologias utilizadas.
                  </p>
                  <div className="flex flex-wrap gap-2">
                    <span className="px-2 py-1 bg-white/10 rounded-full text-xs text-white/70 transition-colors duration-300 hover:bg-blue-500/20 hover:text-white">HTML</span>
                    <span className="px-2 py-1 bg-white/10 rounded-full text-xs text-white/70 transition-colors duration-300 hover:bg-blue-500/20 hover:text-white">CSS</span>
                    <span className="px-2 py-1 bg-white/10 rounded-full text-xs text-white/70 transition-colors duration-300 hover:bg-blue-500/20 hover:text-white">JavaScript</span>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Contact Section */}
      <section id="contato" className="py-24 relative">
        <div className="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>

        <div className="container mx-auto px-6">
          <h2 className="text-3xl font-light tracking-tight mb-12 text-center animate-on-scroll">
            Entre em <span className="text-blue-500">Contato</span>
          </h2>

          <div className="max-w-xl mx-auto bg-white/5 backdrop-blur-sm border border-white/10 p-8 rounded-xl animate-on-scroll transition-all duration-500 hover:border-blue-500/30">
            <h3 className="text-xl font-light mb-6 text-blue-500">Informações de Contato</h3>

            <div className="space-y-6">
              <div className="flex items-start transition-all duration-300 hover:bg-white/5 p-2 rounded-lg">
                <div className="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-blue-500 mr-4 flex-shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fillRule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clipRule="evenodd" />
                  </svg>
                </div>
                <div>
                  <h4 className="text-sm font-medium text-white/70 mb-1">Localização</h4>
                  <p className="text-white">Curitiba, PR - Brasil</p>
                </div>
              </div>

              <div className="flex items-start transition-all duration-300 hover:bg-white/5 p-2 rounded-lg">
                <div className="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-blue-500 mr-4 flex-shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                  </svg>
                </div>
                <div>
                  <h4 className="text-sm font-medium text-white/70 mb-1">Email</h4>
                  <p className="text-white">tp.ligoskitls@gmail.com</p>
                </div>
              </div>

              <div className="flex items-start transition-all duration-300 hover:bg-white/5 p-2 rounded-lg">
                <div className="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-blue-500 mr-4 flex-shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                  </svg>
                </div>
                <div>
                  <h4 className="text-sm font-medium text-white/70 mb-1">Telefone</h4>
                  <p className="text-white">(41) 99784-0155</p>
                </div>
              </div>

              {/* WhatsApp Button */}
              <div className="pt-6 mt-6 border-t border-white/10">
                <a
                  href="https://wa.me/5541997840155"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full transition-all duration-300 w-full text-center font-light flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-black transform hover:scale-105"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    className="h-5 w-5 mr-2"
                    viewBox="0 0 24 24"
                    fill="white"
                    aria-hidden="true"
                  >
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.\

