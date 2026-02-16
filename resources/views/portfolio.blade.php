<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fauzil's Portfolio</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
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
                        Download CV
                    </a>

                </div>
            </div>

            <!-- Right Column: Image with Pixel Transition -->
            <div class="flex justify-center md:justify-end relative z-10 opacity-0 animate-spin-split-right">
                <div class="absolute inset-0 bg-gradient-to-tr from-[#32BAD6]/20 to-purple-500/20 blur-[80px] rounded-full scale-90"></div>
                
                <!-- Pixel Transition Container -->
                <div id="pixel-transition-container" 
                     class="relative w-full max-w-sm aspect-[4/5] rounded-3xl overflow-hidden border border-white/10 shadow-2xl bg-[#151C21] cursor-pointer transition-transform hover:scale-105 duration-500"
                     tabindex="0">
                    
                    <!-- Original Content: Profile Picture -->
                    <div id="first-content" class="absolute inset-0 w-full h-full">
                        <img src="images/Picture_Profile.png" alt="Profile Picture" class="w-full h-full object-cover">
                    </div>
                    
                    <a href="https://instagram.com/fauzil.azhimm" target="_blank" rel="noopener noreferrer"
                       id="second-content" 
                       class="absolute inset-0 w-full h-full z-[2] flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-black" 
                       style="display: none;">
                        <svg class="w-1/2 h-1/2 opacity-90 hover:opacity-100 transition-opacity" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C14.717 2 15.056 2.01 16.122 2.06C17.187 2.11 17.912 2.277 18.55 2.525C19.21 2.779 19.766 3.123 20.322 3.678C20.8305 4.1779 21.224 4.78259 21.475 5.45C21.722 6.087 21.89 6.813 21.94 7.878C21.987 8.944 22 9.283 22 12C22 14.717 21.99 15.056 21.94 16.122C21.89 17.187 21.722 17.912 21.475 18.55C21.2247 19.2178 20.8311 19.8226 20.322 20.322C19.822 20.8303 19.2173 21.2238 18.55 21.475C17.913 21.722 17.187 21.89 16.122 21.94C15.056 21.987 14.717 22 12 22C9.283 22 8.944 21.99 7.878 21.94C6.813 21.89 6.088 21.722 5.45 21.475C4.78233 21.2245 4.17753 20.8309 3.678 20.322C3.16941 19.8222 2.77593 19.2175 2.525 18.55C2.277 17.913 2.11 17.187 2.06 16.122C2.013 15.056 2 14.717 2 12C2 9.283 2.01 8.944 2.06 7.878C2.11 6.812 2.277 6.088 2.525 5.45C2.77524 4.78218 3.1688 4.17732 3.678 3.678C4.17767 3.16923 4.78243 2.77573 5.45 2.525C6.088 2.277 6.812 2.11 7.878 2.06C8.944 2.013 9.283 2 12 2ZM12 7C10.6739 7 9.40215 7.52678 8.46447 8.46447C7.52678 9.40215 7 10.6739 7 12C7 13.3261 7.52678 14.5979 8.46447 15.5355C9.40215 16.4732 10.6739 17 12 17C13.3261 17 14.5979 16.4732 15.5355 15.5355C16.4732 14.5979 17 13.3261 17 12C17 10.6739 16.4732 9.40215 15.5355 8.46447C14.5979 7.52678 13.3261 7 12 7ZM18.5 6.75C18.5 6.41848 18.3683 6.10054 18.1339 5.86612C17.8995 5.6317 17.5815 5.5 17.25 5.5C16.9185 5.5 16.6005 5.6317 16.3661 5.86612C16.1317 6.10054 16 6.41848 16 6.75C16 7.08152 16.1317 7.39946 16.3661 7.63388C16.6005 7.8683 16.9185 8 17.25 8C17.5815 8 17.8995 7.8683 18.1339 7.63388C18.3683 7.39946 18.5 7.08152 18.5 6.75ZM12 9C12.7956 9 13.5587 9.31607 14.1213 9.87868C14.6839 10.4413 15 11.2044 15 12C15 12.7956 14.6839 13.5587 14.1213 14.1213C13.5587 14.6839 12.7956 15 12 15C11.2044 15 10.4413 14.6839 9.87868 14.1213C9.31607 13.5587 9 12.7956 9 12C9 11.2044 9.31607 10.4413 9.87868 9.87868C10.4413 9.31607 11.2044 9 12 9Z" fill="white"/>
                        </svg>
                    </a>
                    
                    <!-- Pixel Grid Overlay -->
                    <div id="pixel-grid" class="absolute inset-0 w-full h-full pointer-events-none z-[3]"></div>
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
                @foreach($tools as $tool)
                <div class="tech-item flex items-center gap-3 shrink-0 select-none pointer-events-none">
                    <img src="{{ $tool['image'] }}" alt="Tech Stack" class="w-10 h-10 object-contain opacity-70 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Selected Works -->
    <section id="work" class="py-32 bg-[#0A1014]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-end mb-16">
                <div>
                    <h2 class="text-4xl md:text-5xl font-serif text-white mb-4">My Projects</h2>
                    <p class="text-gray-400 max-w-sm">A collection of my recent work</p>
                </div>
                <a href="#" class="hidden md:inline-block text-xs font-bold tracking-widest text-[#32BAD6] uppercase hover:underline">View Archive</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-20">
                @forelse($projects as $index => $project)
                <article class="project-card group cursor-pointer {{ $project['offset'] ?? false ? 'md:mt-24' : '' }}" data-direction="{{ $index % 2 == 0 ? 'left' : 'right' }}">
                   <div class="aspect-[4/3] bg-[#151C21] rounded-2xl overflow-hidden mb-6 relative">
                        @php
                            $imagePath = $project['image'] ?? '';
                            $fullPath = public_path($imagePath);
                            $imageExists = !empty($imagePath) && file_exists($fullPath);
                        @endphp
                        
                        @if($imageExists)
                            <img src="{{ asset($imagePath) }}" 
                                 alt="{{ $project['title'] }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-700"
                                 loading="lazy">
                        @else
                            <!-- Gradient placeholder jika gambar tidak ditemukan -->
                            <div class="absolute inset-0 bg-gradient-to-br {{ $project['gradient'] ?? 'from-gray-700 to-gray-900' }} flex items-center justify-center">
                                <p class="text-white/30 text-sm">{{ $imagePath }} not found</p>
                            </div>
                        @endif
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-serif text-white group-hover:text-[#32BAD6] transition">
                                {{ $project['title'] }}
                            </h3>
                            <p class="text-sm text-gray-500 mt-1">
                                {{ $project['description'] }} • {{ $project['year'] }}
                            </p>
                        </div>
                        <div class="flex gap-2">
                            @foreach($project['tech'] as $tech)
                            <span class="px-3 py-1 rounded-full border border-white/10 text-[10px] uppercase tracking-wider text-gray-400">
                                {{ $tech }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                </article>
                @empty
                <div class="col-span-2 text-center py-20">
                    <p class="text-gray-500">No projects available yet.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="about" class="py-32 bg-[#0D1318]">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-20">
            <!-- Philosophy -->
            <div>
                <span class="text-xs font-bold tracking-widest text-[#32BAD6] uppercase mb-6 block">Philosophy</span>
                <h3 class="text-3xl font-serif text-white leading-snug mb-8" 
                    data-decrypt="view" 
                    data-decrypt-speed="25"
                    data-decrypt-sequential="true"
                    data-decrypt-chars="original">My philosophy is simple: solve real problems with thoughtful design and clean engineering. I strive to create systems that are not only beautiful, but reliable, scalable, and built to last.</h3>
                <p class="text-gray-400 leading-relaxed" 
                   data-decrypt="view" 
                   data-decrypt-speed="20"
                   data-decrypt-sequential="true"
                   data-decrypt-chars="original">With growing experience in web development, I continuously refine my approach to building scalable systems and intuitive interfaces. I prioritize clean architecture, maintainable code, and thoughtful design decisions to ensure every solution remains efficient, reliable, and adaptable over time.</p>
            </div>

            <!-- Experience -->
            <div>
                <span class="text-xs font-bold tracking-widest text-[#32BAD6] uppercase mb-6 block">Experience</span>
                <div class="space-y-8">
                    <div class="pb-8 border-b border-white/5">
                        <div class="flex justify-between items-baseline mb-1">
                            <h4 class="text-xl font-bold text-white" 
                                data-decrypt="hover" 
                                data-decrypt-speed="20"
                                data-decrypt-sequential="true"
                                data-decrypt-chars="original">Staff of Technology and Business</h4>
                            <span class="text-sm text-gray-500 font-mono">2026 — Present</span>
                        </div>
                        <p class="text-gray-400 text-sm" 
                           data-decrypt="hover" 
                           data-decrypt-speed="15"
                           data-decrypt-sequential="true"
                           data-decrypt-chars="original">Bem Fatisda</p>
                    </div>
                    <div class="pb-8 border-b border-white/5">
                        <div class="flex justify-between items-baseline mb-1">
                            <h4 class="text-xl font-bold text-white" 
                                data-decrypt="hover" 
                                data-decrypt-speed="20"
                                data-decrypt-sequential="true"
                                data-decrypt-chars="original">Participant of Web3 Sui Devworkshop</h4>
                            <span class="text-sm text-gray-500 font-mono">2025</span>
                        </div>
                        <p class="text-gray-400 text-sm" 
                           data-decrypt="hover" 
                           data-decrypt-speed="15"
                           data-decrypt-sequential="true"
                           data-decrypt-chars="original">1st Project in Minihackathon</p>
                        <p class="text-gray-400 text-sm" 
                           data-decrypt="hover" 
                           data-decrypt-speed="15"
                           data-decrypt-sequential="true"
                           data-decrypt-chars="original">Sui Indonesia Community Workshop</p>
                    </div>
                    <div class="pb-8 border-b border-white/5">
                        <div class="flex justify-between items-baseline mb-1">
                            <h4 class="text-xl font-bold text-white" 
                                data-decrypt="hover" 
                                data-decrypt-speed="20"
                                data-decrypt-sequential="true"
                                data-decrypt-chars="original">Lecturer Assistant</h4>
                            <span class="text-sm text-gray-500 font-mono">2025 - Present</span>
                        </div>
                        <p class="text-gray-400 text-sm" 
                           data-decrypt="hover" 
                           data-decrypt-speed="15"
                           data-decrypt-sequential="true"
                           data-decrypt-chars="original">FATISDA UNS</p>
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
            <p>&copy; By Fauzil Azhim 2026</p>
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
