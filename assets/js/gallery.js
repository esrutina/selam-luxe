/**
 * Selam Luxe — Product Gallery & Interactions
 */

document.addEventListener('DOMContentLoaded', () => {
    
    // Product card hover effects enhancement
    const productCards = document.querySelectorAll('.product-card');
    
    productCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-5px)';
            card.style.boxShadow = '0 20px 40px rgba(0,0,0,0.15)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
            card.style.boxShadow = 'none';
        });
    });
    
    // Simple lightbox for product images
    const lightboxImages = document.querySelectorAll('.product-card img, .featured-image img');
    
    lightboxImages.forEach(img => {
        img.style.cursor = 'pointer';
        img.addEventListener('click', () => {
            // Create lightbox overlay
            const overlay = document.createElement('div');
            overlay.className = 'lightbox-overlay';
            overlay.innerHTML = `
                <div class="lightbox-content">
                    <img src="${img.src}" alt="${img.alt}">
                    <button class="lightbox-close">&times;</button>
                </div>
            `;
            
            document.body.appendChild(overlay);
            document.body.style.overflow = 'hidden';
            
            // Animate in
            requestAnimationFrame(() => {
                overlay.style.opacity = '1';
            });
            
            // Close handlers
            const closeLightbox = () => {
                overlay.style.opacity = '0';
                setTimeout(() => {
                    overlay.remove();
                    document.body.style.overflow = '';
                }, 300);
            };
            
            overlay.querySelector('.lightbox-close').addEventListener('click', closeLightbox);
            overlay.addEventListener('click', (e) => {
                if (e.target === overlay) closeLightbox();
            });
            
            // Escape key
            const escHandler = (e) => {
                if (e.key === 'Escape') {
                    closeLightbox();
                    document.removeEventListener('keydown', escHandler);
                }
            };
            document.addEventListener('keydown', escHandler);
        });
    });
});