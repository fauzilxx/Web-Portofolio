document.addEventListener('DOMContentLoaded', function() {
    // Detect mobile device
    const isMobileDevice = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ||
                          window.innerWidth < 768;
    
    // Project Cards Scroll Animation
    const projectCards = document.querySelectorAll('.project-card');
    
    const projectObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                
                // On mobile, stop observing after animation to save resources
                if (isMobileDevice) {
                    projectObserver.unobserve(entry.target);
                }
            }
        });
    }, {
        threshold: isMobileDevice ? 0.1 : 0.2,
        rootMargin: '0px 0px -50px 0px'
    });
    
    projectCards.forEach(card => {
        projectObserver.observe(card);
    });

    // Experience Slide Animation - Always trigger on scroll
    const experienceSection = document.querySelector('.experience-slide');
    
    if (experienceSection) {
        // Detect mobile
        const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ||
                        window.innerWidth < 768;
        
        const experienceObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    
                    // On mobile, stop observing after first animation to save resources
                    if (isMobile) {
                        experienceObserver.unobserve(entry.target);
                    }
                } else if (!isMobile) {
                    // Only reset on desktop for re-trigger effect
                    entry.target.classList.remove('visible');
                }
            });
        }, {
            threshold: isMobile ? 0.1 : 0.2,
            rootMargin: '0px 0px -50px 0px'
        });
        
        experienceObserver.observe(experienceSection);
    }

    // Footer Fade Animation
    const footerElements = document.querySelectorAll('.footer-fade');
    
    const footerObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                
                // Stop observing after animation completes
                footerObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: isMobileDevice ? 0.05 : 0.1,
        rootMargin: '0px 0px -100px 0px'
    });
    
    footerElements.forEach(element => {
        footerObserver.observe(element);
    });

    // Tech Stack Scroll
    const container = document.getElementById('tech-scroll-container');
    const track = document.getElementById('tech-track');
    
    // Clone content enough times to fill screen and create scroll illusion
    const items = track.innerHTML;
    track.innerHTML = items + items + items + items; // 4x duplication for safety

    let scrollAmount = 0;
    const speed = isMobileDevice ? 0.3 : 0.5; // Slower on mobile for better performance
    let isHovered = false;
    let isDragging = false;
    let startX;
    let scrollLeft;
    
    // Independent accumulator for sub-pixel scrolling
    let outputScroll = 0; 
    let lastFrameTime = 0;
    const frameInterval = isMobileDevice ? 1000 / 30 : 1000 / 60; // 30fps on mobile, 60fps on desktop

    // Auto Scroll Function
    function step(currentTime) {
        // Throttle frame rate on mobile
        if (isMobileDevice) {
            if (currentTime - lastFrameTime < frameInterval) {
                requestAnimationFrame(step);
                return;
            }
            lastFrameTime = currentTime;
        }
        
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
    
    // Touch Events for Mobile (with passive listeners for better performance)
    let touchStartTime = 0;
    container.addEventListener('touchstart', (e) => { 
        isDragging = true; 
        touchStartTime = Date.now();
    }, { passive: true });
    
    container.addEventListener('touchend', (e) => { 
        const touchDuration = Date.now() - touchStartTime;
        isDragging = false; 
        
        // Resume auto-scroll after short delay
        if (touchDuration < 300) {
            setTimeout(() => { isDragging = false; }, 100);
        }
    }, { passive: true });
    
    // Prevent momentum scrolling from interfering on mobile
    container.addEventListener('touchmove', (e) => {
        if (isMobileDevice) {
            isDragging = true;
        }
    }, { passive: true });

    // ============================================
    // Pixel Transition Animation
    // ============================================
    class PixelTransition {
        constructor(containerId, options = {}) {
            this.container = document.getElementById(containerId);
            if (!this.container) return;

            this.firstContent = this.container.querySelector('#first-content');
            this.secondContent = this.container.querySelector('#second-content');
            this.pixelGrid = this.container.querySelector('#pixel-grid');
            
            this.gridSize = options.gridSize || 9;
            this.pixelColor = options.pixelColor || '#0A1014';
            this.animationStepDuration = options.animationStepDuration || 0.4;
            this.once = options.once || false;
            
            this.isActive = false;
            this.delayedCall = null;
            
            this.isTouchDevice = 'ontouchstart' in window || 
                                 navigator.maxTouchPoints > 0 || 
                                 window.matchMedia('(pointer: coarse)').matches;
            
            this.init();
        }
        
        init() {
            this.createPixelGrid();
            this.attachEventListeners();
        }
        
        createPixelGrid() {
            this.pixelGrid.innerHTML = '';
            
            // Use DocumentFragment for better performance
            const fragment = document.createDocumentFragment();
            
            for (let row = 0; row < this.gridSize; row++) {
                for (let col = 0; col < this.gridSize; col++) {
                    const pixel = document.createElement('div');
                    pixel.classList.add('pixel-transition__pixel');
                    pixel.style.backgroundColor = this.pixelColor;
                    
                    const size = 100 / this.gridSize;
                    pixel.style.width = `${size}%`;
                    pixel.style.height = `${size}%`;
                    pixel.style.left = `${col * size}%`;
                    pixel.style.top = `${row * size}%`;
                    pixel.style.position = 'absolute';
                    pixel.style.display = 'none';
                    
                    // Enable hardware acceleration
                    pixel.style.transform = 'translateZ(0)';
                    pixel.style.backfaceVisibility = 'hidden';
                    
                    fragment.appendChild(pixel);
                }
            }
            
            this.pixelGrid.appendChild(fragment);
        }
        
        animatePixels(activate) {
            this.isActive = activate;
            
            const pixels = this.pixelGrid.querySelectorAll('.pixel-transition__pixel');
            if (!pixels.length) return;
            
            gsap.killTweensOf(pixels);
            if (this.delayedCall) {
                this.delayedCall.kill();
            }
            
            gsap.set(pixels, { display: 'none' });
            
            const totalPixels = pixels.length;
            const staggerDuration = this.animationStepDuration / totalPixels;
            
            // First wave: pixels appear
            gsap.to(pixels, {
                display: 'block',
                duration: 0,
                stagger: {
                    each: staggerDuration,
                    from: 'random'
                }
            });
            
            // Switch content in the middle
            this.delayedCall = gsap.delayedCall(this.animationStepDuration, () => {
                if (this.secondContent) {
                    this.secondContent.style.display = activate ? 'flex' : 'none';
                }
            });
            
            // Second wave: pixels disappear
            gsap.to(pixels, {
                display: 'none',
                duration: 0,
                delay: this.animationStepDuration,
                stagger: {
                    each: staggerDuration,
                    from: 'random'
                }
            });
        }
        
        handleEnter() {
            if (!this.isActive) this.animatePixels(true);
        }
        
        handleLeave() {
            if (this.isActive && !this.once) this.animatePixels(false);
        }
        
        handleClick() {
            if (!this.isActive) {
                this.animatePixels(true);
            } else if (this.isActive && !this.once) {
                this.animatePixels(false);
            }
        }
        
        attachEventListeners() {
            if (!this.isTouchDevice) {
                this.container.addEventListener('mouseenter', () => this.handleEnter());
                this.container.addEventListener('mouseleave', () => this.handleLeave());
                this.container.addEventListener('focus', () => this.handleEnter());
                this.container.addEventListener('blur', () => this.handleLeave());
            } else {
                this.container.addEventListener('click', (e) => {
                    // Prevent navigation if clicking to toggle
                    if (!this.isActive) {
                        e.preventDefault();
                        this.handleClick();
                    }
                });
            }
        }
    }
    
    // Initialize Pixel Transition
    if (typeof gsap !== 'undefined') {
        new PixelTransition('pixel-transition-container', {
            gridSize: isMobileDevice ? 6 : 9, // Smaller grid on mobile for better performance
            pixelColor: '#0A1014',
            animationStepDuration: isMobileDevice ? 0.3 : 0.4, // Faster on mobile
            once: false
        });
    }

    // ============================================
    // Decrypted Text Animation
    // ============================================
    class DecryptedText {
        constructor(element) {
            this.element = element;
            this.originalText = element.textContent.trim();
            this.animateOn = element.dataset.decrypt || 'view';
            this.speed = parseInt(element.dataset.decryptSpeed) || 50;
            this.maxIterations = parseInt(element.dataset.decryptIterations) || 10;
            this.sequential = element.dataset.decryptSequential === 'true';
            this.useOriginalCharsOnly = element.dataset.decryptChars === 'original';
            this.characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!@#$%^&*()_+';
            
            // Detect mobile device
            this.isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ||
                           window.innerWidth < 768;
            
            this.isAnimating = false;
            this.hasAnimated = false;
            this.revealedIndices = new Set();
            this.interval = null;
            this.currentIteration = 0;
            this.animationFrame = null;
            
            // Store original text and set initial content
            this.element.textContent = this.originalText;
            
            // Add CSS optimization hint
            this.element.style.willChange = 'contents';
            
            this.init();
        }
        
        init() {
            // On mobile, skip animation entirely - just fade in
            if (this.isMobile && (this.animateOn === 'view' || this.animateOn === 'both')) {
                this.element.style.opacity = '0';
                this.element.style.transition = 'opacity 0.6s ease-out';
                
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !this.hasAnimated) {
                            setTimeout(() => {
                                this.element.style.opacity = '1';
                                this.hasAnimated = true;
                                // Remove will-change after animation
                                setTimeout(() => {
                                    this.element.style.willChange = 'auto';
                                }, 600);
                            }, 100);
                        }
                    });
                }, {
                    threshold: 0.2,
                    rootMargin: '0px'
                });
                
                observer.observe(this.element);
                return;
            }
            
            // Desktop: Setup for hover animation
            if (this.animateOn === 'hover' || this.animateOn === 'both') {
                this.element.addEventListener('mouseenter', () => this.startAnimation());
                this.element.addEventListener('mouseleave', () => this.stopAnimation());
            }
            
            // Desktop: Setup for view animation (Intersection Observer)
            if (this.animateOn === 'view' || this.animateOn === 'both') {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !this.hasAnimated) {
                            setTimeout(() => {
                                this.startAnimation();
                                this.hasAnimated = true;
                            }, 100);
                        }
                    });
                }, {
                    threshold: 0.2,
                    rootMargin: '0px'
                });
                
                observer.observe(this.element);
            }
        }
        
        getAvailableChars() {
            if (this.useOriginalCharsOnly) {
                return Array.from(new Set(this.originalText.split(''))).filter(char => char !== ' ');
            }
            return this.characters.split('');
        }
        
        shuffleText(currentRevealed) {
            const availableChars = this.getAvailableChars();
            
            if (this.useOriginalCharsOnly) {
                // Shuffle only unrevealed characters from original text
                const positions = this.originalText.split('').map((char, i) => ({
                    char,
                    isSpace: char === ' ',
                    index: i,
                    isRevealed: currentRevealed.has(i)
                }));
                
                const nonSpaceChars = positions
                    .filter(p => !p.isSpace && !p.isRevealed)
                    .map(p => p.char);
                
                // Fisher-Yates shuffle
                for (let i = nonSpaceChars.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [nonSpaceChars[i], nonSpaceChars[j]] = [nonSpaceChars[j], nonSpaceChars[i]];
                }
                
                let charIndex = 0;
                return positions.map(p => {
                    if (p.isSpace) return ' ';
                    if (p.isRevealed) return this.originalText[p.index];
                    return nonSpaceChars[charIndex++] || p.char;
                }).join('');
            } else {
                // Random characters
                return this.originalText.split('').map((char, i) => {
                    if (char === ' ') return ' ';
                    if (currentRevealed.has(i)) return this.originalText[i];
                    return availableChars[Math.floor(Math.random() * availableChars.length)];
                }).join('');
            }
        }
        
        startAnimation() {
            if (this.isAnimating) return;
            
            this.isAnimating = true;
            this.revealedIndices = new Set();
            this.currentIteration = 0;
            
            this.interval = setInterval(() => {
                if (this.sequential) {
                    // Sequential reveal - skip spaces
                    if (this.revealedIndices.size < this.originalText.length) {
                        let nextIndex = 0;
                        
                        // Find next unrevealed index
                        for (let i = 0; i < this.originalText.length; i++) {
                            if (!this.revealedIndices.has(i)) {
                                nextIndex = i;
                                break;
                            }
                        }
                        
                        // If it's a space, reveal it immediately and continue
                        while (nextIndex < this.originalText.length && 
                               this.originalText[nextIndex] === ' ') {
                            this.revealedIndices.add(nextIndex);
                            nextIndex++;
                        }
                        
                        if (nextIndex < this.originalText.length) {
                            this.revealedIndices.add(nextIndex);
                        }
                        
                        this.element.textContent = this.shuffleText(this.revealedIndices);
                        
                        // Check if we're done
                        if (this.revealedIndices.size >= this.originalText.length) {
                            this.stopAnimation(true);
                        }
                    } else {
                        this.stopAnimation(true);
                    }
                } else {
                    // Random scramble mode
                    this.element.textContent = this.shuffleText(this.revealedIndices);
                    this.currentIteration++;
                    
                    if (this.currentIteration >= this.maxIterations) {
                        this.stopAnimation(true);
                    }
                }
            }, this.speed);
        }
        
        stopAnimation(complete = false) {
            if (this.interval) {
                clearInterval(this.interval);
                this.interval = null;
            }
            
            if (complete || this.animateOn === 'view') {
                this.element.textContent = this.originalText;
            }
            
            if (this.animateOn === 'hover' && !complete) {
                // Reset for hover mode
                this.element.textContent = this.originalText;
                this.revealedIndices = new Set();
                this.currentIteration = 0;
            }
            
            this.isAnimating = false;
        }
    }
    
    // Initialize all decrypted text elements
    document.querySelectorAll('[data-decrypt]').forEach(element => {
        new DecryptedText(element);
    });
});
