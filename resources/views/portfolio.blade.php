<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fauzil's Portfolio</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">

    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <!-- Custom CSS with cache busting -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}?v={{ time() }}">
</head>
<body class="bg-[#0A1014] text-gray-300 font-sans antialiased selection:bg-[#32BAD6] selection:text-white">

    <!-- Navbar -->
    <div class="fixed top-6 left-0 right-0 flex justify-center z-50">
        <nav class="bg-[#151C21]/80 backdrop-blur-md px-6 py-3 rounded-full border border-white/5 shadow-lg flex gap-8 text-sm font-medium">
            <a href="#home" class="text-white hover:text-[#32BAD6] transition">Home</a>
            <a href="#work" class="text-gray-400 hover:text-[#32BAD6] transition">Work</a>
            <a href="#about" class="text-gray-400 hover:text-[#32BAD6] transition">About</a>
            <a href="#contact" class="text-[#32BAD6] hover:text-[#2aa0b9] transition">Let's Talk</a>
        </nav>
    </div>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen pt-32 pb-20 relative overflow-hidden flex items-center">
        <div class="max-w-7xl mx-auto px-6 w-full grid md:grid-cols-2 gap-12 items-center">
            
            <!-- Left Column: Text -->
            <div class="flex flex-col items-start text-left z-10 opacity-0 animate-spin-split-left">
                <!-- Badge -->
                <div class="mb-6 px-4 py-1.5 rounded-full border border-[#252C32] bg-[#10161A] flex items-center gap-2 w-fit">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    <span class="text-xs uppercase tracking-widest text-gray-400 font-semibold">Let's Build Together</span>
                </div>

                <!-- Name -->
                <h1 class="text-left text-5xl md:text-7xl lg:text-8xl font-serif tracking-tight mb-4">
                    <span class="text-white">Fauzil</span>
                    <span class="text-[#32BAD6] italic">Azhim.</span>
                </h1>

                <!-- Description -->
                <p class="mt-6 text-left max-w-lg text-lg text-gray-400 leading-relaxed">
                    Hi! I'm a Computer Science student at Sebelas Maret University. 
                    Aspiring Full Stack Web Developer passionate about building functional, user-friendly, and visually compelling web applications.
                </p>

                <!-- CTAs -->
                <div class="mt-8 flex flex-col sm:flex-row items-center gap-6 w-full sm:w-auto">
                    <a href="#work" class="px-8 py-3.5 bg-[#32BAD6] text-[#05090B] font-semibold rounded-full hover:bg-[#2aa0b9] transition duration-300 w-full sm:w-auto text-center">
                        View Selected Works
                    </a>
                    <a href="#" class="flex items-center gap-2 text-white hover:text-[#32BAD6] transition font-medium">
                        Download CV
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right Column: Image -->
            <div class="flex justify-center md:justify-end relative z-10 opacity-0 animate-spin-split-right">
                <!-- Abstract Glow Effect -->
                <div class="absolute inset-0 bg-gradient-to-tr from-[#32BAD6]/20 to-purple-500/20 blur-[80px] rounded-full scale-90"></div>
                
                <!-- Image Container -->
                <div class="relative w-full max-w-sm aspect-[4/5] rounded-3xl overflow-hidden border border-white/10 shadow-2xl bg-[#151C21]">
                     <img src="images/Picture_Profile.png" alt="Profile Picture" class="w-full h-full object-cover" style="object-fit: cover; width: 100%; height: 100%;">
                </div>
            </div>

        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-50 z-10">
            <span class="text-[10px] uppercase tracking-[0.2em]">Scroll</span>
            <div class="w-[1px] h-12 bg-gradient-to-b from-gray-500 to-transparent"></div>
        </div>
    </section>

    <!-- Tech Stack (Infinite Scroll & Draggable) -->
    <div class="w-full border-y border-white/5 bg-[#0D1318] py-8 relative group">
        <!-- Gradients for smooth fade edges -->
        <div class="absolute inset-y-0 left-0 w-20 bg-gradient-to-r from-[#0D1318] to-transparent z-10 pointer-events-none"></div>
        <div class="absolute inset-y-0 right-0 w-20 bg-gradient-to-l from-[#0D1318] to-transparent z-10 pointer-events-none"></div>

        <div id="tech-scroll-container" class="flex overflow-x-scroll no-scrollbar cursor-grab active:cursor-grabbing items-center" style="scroll-behavior: auto;">
            <div id="tech-track" class="flex items-center gap-16 px-10">
                <!-- Content will be duplicated by JS -->
                <!-- Original Set -->
                <div class="tech-item flex items-center gap-3 shrink-0 select-none">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" class="w-10 h-10 pointer-events-none" alt="Laravel">
                    <span class="font-bold text-xl text-white pointer-events-none"></span>
                </div>
                <div class="tech-item flex items-center gap-3 shrink-0 select-none">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" class="w-10 h-10 pointer-events-none" alt="Tailwind">
                    <span class="font-bold text-xl text-white pointer-events-none"></span>
                </div>
                <div class="tech-item flex items-center gap-3 shrink-0 select-none">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" class="w-10 h-10 pointer-events-none" alt="PHP">
                    <span class="font-bold text-xl text-white pointer-events-none"></span>
                </div>
                <div class="tech-item flex items-center gap-3 shrink-0 select-none">
                    <img src="https://labs.mysql.com/common/logos/mysql-logo.svg" class="w-10 h-10 pointer-events-none" alt="MySQL">
                    <span class="font-bold text-xl text-white pointer-events-none"></span>
                </div>
                <div class="tech-item flex items-center gap-3 shrink-0 select-none">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a7/React-icon.svg" class="w-10 h-10 pointer-events-none" alt="React">
                    <span class="font-bold text-xl text-white pointer-events-none"></span>
                </div>
                <div class="tech-item flex items-center gap-3 shrink-0 select-none">
                    <img src="https://nodejs.org/static/images/logo.svg" class="w-10 h-10 bg-white/10 rounded px-1 pointer-events-none" alt="Node.js">
                    <span class="font-bold text-xl text-white pointer-events-none"></span>
                </div>
                <div class="tech-item flex items-center gap-3 shrink-0 select-none">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/c3/Python-logo-notext.svg" class="w-10 h-10 pointer-events-none" alt="Python">
                    <span class="font-bold text-xl text-white pointer-events-none"></span>
                </div>
                <div class="tech-item flex items-center gap-3 shrink-0 select-none">
                    <img src="https://upload.wikimedia.org/wikipedia/en/3/30/Java_programming_language_logo.svg" class="w-10 h-10 pointer-events-none" alt="Java">
                    <span class="font-bold text-xl text-white pointer-events-none"></span>
                </div>
                <div class="tech-item flex items-center gap-3 shrink-0 select-none">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Git-logo.svg" class="w-13 h-13 pointer-events-none" alt="Git">
                    <span class="font-bold text-xl text-white pointer-events-none"></span>
                </div>
                <div class="tech-item flex items-center gap-3 shrink-0 select-none">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/C_Programming_Language.svg" class="w-10 h-10 pointer-events-none" alt="C">
                    <span class="font-bold text-xl text-white pointer-events-none"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Selected Works -->
    <section id="work" class="py-32 bg-[#0A1014]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-end mb-16">
                <div>
                    <h2 class="text-4xl md:text-5xl font-serif text-white mb-4">Selected Works</h2>
                    <p class="text-gray-400 max-w-sm">A curation of digital products designed and developed between 2021 and 2024.</p>
                </div>
                <a href="#" class="hidden md:inline-block text-xs font-bold tracking-widest text-[#32BAD6] uppercase hover:underline">View Archive</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-20">
                <!-- Project 1 -->
                <article class="group cursor-pointer">
                    <div class="aspect-[4/3] bg-[#151C21] rounded-2xl overflow-hidden mb-6 relative">
                         <!-- Abstract 3D shape placeholder similar to image -->
                        <div class="absolute inset-0 bg-gradient-to-br from-[#2a353c] to-[#121619] flex items-center justify-center group-hover:scale-105 transition duration-700">
                           <div class="w-32 h-32 md:w-48 md:h-48 bg-[#C8B6A6] rounded-full mix-blend-overlay blur-3xl opacity-20"></div>
                           <div class="w-32 h-64 bg-[#C8B6A6] rounded-t-full opacity-80 shadow-2xl mr-4 transform translate-y-12"></div>
                           <div class="w-32 h-32 bg-[#A8988A] rounded-t-full opacity-90 shadow-2xl transform translate-y-28"></div>
                        </div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-serif text-white group-hover:text-[#32BAD6] transition">Lumina Banking</h3>
                            <p class="text-sm text-gray-500 mt-1">Fintech Dashboard • 2023</p>
                        </div>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 rounded-full border border-white/10 text-[10px] uppercase tracking-wider text-gray-400">React</span>
                            <span class="px-3 py-1 rounded-full border border-white/10 text-[10px] uppercase tracking-wider text-gray-400">D3.js</span>
                        </div>
                    </div>
                </article>

                <!-- Project 2 -->
                <article class="group cursor-pointer md:mt-24">
                    <div class="aspect-[4/3] bg-[#151C21] rounded-2xl overflow-hidden mb-6 relative">
                         <div class="absolute inset-0 bg-[#000] flex items-center justify-center group-hover:scale-105 transition duration-700">
                             <!-- Linear wave pattern simulation -->
                             <div class="w-[200%] h-[200%] bg-[repeating-linear-gradient(45deg,transparent,transparent_10px,#333_10px,#333_11px)] opacity-30 transform rotate-12"></div>
                         </div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-serif text-white group-hover:text-[#32BAD6] transition">Aeon E-Commerce</h3>
                            <p class="text-sm text-gray-500 mt-1">Design System & Storefront • 2022</p>
                        </div>
                        <div class="flex gap-2">
                             <span class="px-3 py-1 rounded-full border border-white/10 text-[10px] uppercase tracking-wider text-gray-400">NextJs</span>
                             <span class="px-3 py-1 rounded-full border border-white/10 text-[10px] uppercase tracking-wider text-gray-400">Shopify</span>
                        </div>
                    </div>
                </article>

                <!-- Project 3 -->
                <article class="group cursor-pointer">
                    <div class="aspect-[4/3] bg-[#151C21] rounded-2xl overflow-hidden mb-6 relative">
                        <div class="absolute inset-0 flex items-center justify-center group-hover:scale-105 transition duration-700">
                             <div class="absolute inset-0 bg-blue-900/20"></div>
                             <!-- Bokeh effect -->
                             <div class="w-40 h-40 bg-blue-400 rounded-full blur-[80px] absolute top-10 left-10 opacity-40"></div>
                             <div class="w-40 h-40 bg-purple-400 rounded-full blur-[80px] absolute bottom-10 right-10 opacity-40"></div>
                        </div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-serif text-white group-hover:text-[#32BAD6] transition">Vessel Analytics</h3>
                            <p class="text-sm text-gray-500 mt-1">SaaS Application • 2024</p>
                        </div>
                        <div class="flex gap-2">
                             <span class="px-3 py-1 rounded-full border border-white/10 text-[10px] uppercase tracking-wider text-gray-400">Vue 3</span>
                             <span class="px-3 py-1 rounded-full border border-white/10 text-[10px] uppercase tracking-wider text-gray-400">Node</span>
                        </div>
                    </div>
                </article>

                <!-- Project 4 -->
                <article class="group cursor-pointer md:mt-24">
                    <div class="aspect-[4/3] bg-[#151C21] rounded-2xl overflow-hidden mb-6 relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-gray-800 to-black group-hover:scale-105 transition duration-700 flex items-center justify-center">
                            <div class="w-1/2 h-1/2 border border-white/20 relative shadow-[0_0_50px_rgba(255,255,255,0.1)]">
                                <div class="absolute inset-4 border border-white/10"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-serif text-white group-hover:text-[#32BAD6] transition">Mono Portfolio</h3>
                            <p class="text-sm text-gray-500 mt-1">Template Design • 2021</p>
                        </div>
                        <div class="flex gap-2">
                             <span class="px-3 py-1 rounded-full border border-white/10 text-[10px] uppercase tracking-wider text-gray-400">Webflow</span>
                             <span class="px-3 py-1 rounded-full border border-white/10 text-[10px] uppercase tracking-wider text-gray-400">GSAP</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Info Section (Philosophy & Experience) -->
    <section id="about" class="py-32 bg-[#0D1318]">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-20">
            <!-- Philosophy -->
            <div>
                <span class="text-xs font-bold tracking-widest text-[#32BAD6] uppercase mb-6 block">Philosophy</span>
                <h3 class="text-3xl font-serif text-white leading-snug mb-8">
                    "I build digital products that honor the raw materials of the web: semantic HTML, resilient CSS, and performant JavaScript."
                </h3>
                <p class="text-gray-400 leading-relaxed">
                    With over 8 years of experience in frontend engineering, I bridge the gap between design vision and technical implementation. I believe that the most sophisticated interfaces are often the most invisible, allowing users to achieve their goals without friction.
                </p>
            </div>

            <!-- Experience -->
            <div>
                <span class="text-xs font-bold tracking-widest text-[#32BAD6] uppercase mb-6 block">Experience</span>
                <div class="space-y-8">
                    <div class="pb-8 border-b border-white/5">
                        <div class="flex justify-between items-baseline mb-1">
                            <h4 class="text-xl font-bold text-white">Senior Frontend Engineer</h4>
                            <span class="text-sm text-gray-500 font-mono">2021 — Present</span>
                        </div>
                        <p class="text-gray-400 text-sm">TechCorp Inc.</p>
                    </div>
                    <div class="pb-8 border-b border-white/5">
                        <div class="flex justify-between items-baseline mb-1">
                            <h4 class="text-xl font-bold text-white">Frontend Developer</h4>
                            <span class="text-sm text-gray-500 font-mono">2018 — 2021</span>
                        </div>
                        <p class="text-gray-400 text-sm">Creative Agency Studio</p>
                    </div>
                    <div class="pb-8 border-b border-white/5">
                        <div class="flex justify-between items-baseline mb-1">
                            <h4 class="text-xl font-bold text-white">UI Engineer</h4>
                            <span class="text-sm text-gray-500 font-mono">2016 — 2018</span>
                        </div>
                        <p class="text-gray-400 text-sm">Startup X</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer / CTA -->
    <footer id="contact" class="py-32 pb-10 bg-[#0A1014] text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-5xl md:text-7xl font-serif text-white mb-4">Let's build something</h2>
            <h2 class="text-5xl md:text-7xl font-serif text-[#32BAD6] italic mb-12">remarkable.</h2>
            
            <a href="mailto:hello@elenavance.com" class="inline-block px-10 py-4 bg-white text-[#0A1014] font-bold rounded-full hover:bg-gray-200 transition duration-300">
                Start a Conversation
            </a>
        </div>

        <div class="max-w-7xl mx-auto px-6 mt-32 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center text-xs text-gray-500 uppercase tracking-wider font-medium">
            <p>&copy; 2024 Elena Vance. All Rights Reserved.</p>
            <div class="flex gap-8 my-4 md:my-0">
                <a href="#" class="hover:text-white transition">Twitter</a>
                <a href="#" class="hover:text-white transition">LinkedIn</a>
                <a href="#" class="hover:text-white transition">GitHub</a>
            </div>
            <p>Seattle, WA <span class="text-green-500 ml-1">•</span></p>
        </div>
    </footer>

    <!-- Custom JS with cache busting -->
    <script src="{{ asset('js/custom.js') }}?v={{ time() }}"></script>
</body>
</html>
