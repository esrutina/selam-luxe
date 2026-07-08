/**
 * Selam Luxe — Scroll-triggered animations (GSAP)
 */

document.addEventListener('DOMContentLoaded', () => {
    
    // Check if GSAP is loaded
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
        console.warn('GSAP not loaded. Animations disabled.');
        return;
    }
    
    // Register GSAP plugin
    gsap.registerPlugin(ScrollTrigger);
    
    // Reveal on scroll - single elements
    const reveals = document.querySelectorAll('.reveal');
    reveals.forEach(el => {
        gsap.fromTo(el, 
            { opacity: 0, y: 60 },
            {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 85%',
                    toggleActions: 'play none none none'
                }
            }
        );
    });
    
    // Stagger children animations
    const staggerContainers = document.querySelectorAll('.stagger-children');
    staggerContainers.forEach(container => {
        gsap.fromTo(container.children,
            { opacity: 0, y: 40 },
            {
                opacity: 1,
                y: 0,
                duration: 0.8,
                stagger: 0.15,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: container,
                    start: 'top 80%'
                }
            }
        );
    });
    
    // Hero parallax effect
    const heroBg = document.querySelector('.hero-bg img');
    if (heroBg) {
        gsap.to(heroBg, {
            yPercent: 30,
            ease: 'none',
            scrollTrigger: {
                trigger: '.hero',
                start: 'top top',
                end: 'bottom top',
                scrub: true
            }
        });
    }
    
    // Hero content fade in on load
    const heroContent = document.querySelector('.hero-content');
    if (heroContent) {
        gsap.fromTo(heroContent,
            { opacity: 0, y: 40 },
            { opacity: 1, y: 0, duration: 1.2, delay: 0.3, ease: 'power3.out' }
        );
    }
});