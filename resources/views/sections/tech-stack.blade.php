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
