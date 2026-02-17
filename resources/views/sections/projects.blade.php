<!-- Selected Works -->
<section id="work" class="py-32 bg-[#0A1014]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-end mb-16">
            <div>
                <h2 class="text-4xl md:text-5xl font-serif text-white mb-4">My Projects</h2>
                <p class="text-gray-400 max-w-sm">A collection of my recent work</p>
            </div>
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
                        <img src="{{ $imagePath }}" 
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
