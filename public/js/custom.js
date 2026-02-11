document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('tech-scroll-container');
    const track = document.getElementById('tech-track');
    
    // Clone content enough times to fill screen and create scroll illusion
    const items = track.innerHTML;
    track.innerHTML = items + items + items + items; // 4x duplication for safety

    let scrollAmount = 0;
    const speed = 0.5; // Slightly increased for reliability
    let isHovered = false;
    let isDragging = false;
    let startX;
    let scrollLeft;
    
    // Independent accumulator for sub-pixel scrolling
    let outputScroll = 0; 

    // Auto Scroll Function
    function step() {
        // Run even if isHovered is true, only stops when strictly dragging
        if (!isDragging) {
            outputScroll += speed;
            
            // Apply to DOM
            container.scrollLeft = outputScroll;
            
            // Infinite Loop Check
            // We check if we've scrolled past 1/4 of total width (since we have 4 copies)
            // Use Math.ceil or a tolerance to ensure we don't shudder
            if (outputScroll >= track.scrollWidth / 4) {
                 outputScroll = 0;
                 container.scrollLeft = 0;
            }
        } else {
            // When dragging, sync our accumulator to the actual DOM position
            // so when we release, it continues seamlessly from there
            outputScroll = container.scrollLeft;
        }
        requestAnimationFrame(step);
    }
    
    // Start Animation
    requestAnimationFrame(step);

    // Drag to Scroll Logic
    container.addEventListener('mousedown', (e) => {
        isDragging = true;
        container.classList.add('cursor-grabbing'); // Visual feedback
        container.classList.remove('cursor-grab');
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
    });

    container.addEventListener('mouseleave', () => {
        isDragging = false;
        container.classList.remove('cursor-grabbing');
        container.classList.add('cursor-grab');
    });

    container.addEventListener('mouseup', () => {
        isDragging = false;
        container.classList.remove('cursor-grabbing');
        container.classList.add('cursor-grab');
    });

    container.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX - container.offsetLeft;
        const walk = (x - startX) * 2; // Scroll-fast factor
        container.scrollLeft = scrollLeft - walk;
    });
    
    // Touch Events for Mobile
    container.addEventListener('touchstart', () => { isDragging = true; });
    container.addEventListener('touchend', () => { isDragging = false; });
});