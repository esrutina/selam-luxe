<section class="section-padding contact" id="contact">
    <div class="container">
        <div class="contact-grid grid-2">
            <div class="contact-info reveal">
                <span class="section-label">Get in Touch</span>
                <h2>Begin Your<br>Heritage Journey</h2>
                <div class="gold-divider" style="margin-left: 0;"></div>
                <p>
                    Whether you seek a custom piece for a special occasion or wish to 
                    learn more about our collections, we invite you to reach out. 
                    Every conversation begins with respect.
                </p>
                
                <div class="contact-details">
                    <div class="contact-item">
                        <strong>Location</strong>
                        <span>Bole Road, Addis Ababa, Ethiopia</span>
                    </div>
                    <div class="contact-item">
                        <strong>Email</strong>
                        <span>hello@selamluxe.com</span>
                    </div>
                    <div class="contact-item">
                        <strong>Hours</strong>
                        <span>Mon–Sat: 9:00 AM – 6:00 PM</span>
                    </div>
                </div>
            </div>
            
            <div class="contact-form-wrapper reveal">
                <form id="contactForm" class="contact-form">
                    <input type="hidden" name="csrf_token" value="<?= csrfToken() ?>">
                    
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" required placeholder="Enter your name">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="your@email.com">
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Tell us about your vision..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn-primary">Send Message</button>
                    
                    <div id="formResponse" class="form-response"></div>
                </form>
            </div>
        </div>
    </div>
</section>