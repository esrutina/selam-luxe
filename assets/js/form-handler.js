/**
 * Selam Luxe — Contact Form Handler
 */

document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contactForm');
    const formResponse = document.getElementById('formResponse');
    
    if (!contactForm) return;
    
    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const submitBtn = contactForm.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Sending...';
        submitBtn.disabled = true;
        
        const formData = {
            name: contactForm.querySelector('#name').value.trim(),
            email: contactForm.querySelector('#email').value.trim(),
            message: contactForm.querySelector('#message').value.trim()
        };
        
        try {
            const response = await fetch('/contact', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify(formData)
            });
            
            const result = await response.json();
            
            formResponse.textContent = result.message;
            formResponse.className = 'form-response ' + (result.success ? 'success' : 'error');
            
            if (result.success) {
                contactForm.reset();
            }
            
        } catch (error) {
            formResponse.textContent = 'An error occurred. Please try again.';
            formResponse.className = 'form-response error';
            console.error('Form submission error:', error);
        } finally {
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }
    });
});