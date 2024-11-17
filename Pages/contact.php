<div class="container py-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <h2>Get in Touch</h2>
            <p class="lead">We'd love to hear from you! Send us a message and we'll respond as soon as possible.</p>
            
            <div class="contact-info mt-4">
                <div class="mb-3">
                    <h5><i class="fas fa-map-marker-alt text-primary me-2"></i>Visit Us</h5>
                    <p>123 Coffee Street<br>Cityville, ST 12345</p>
                </div>
                
                <div class="mb-3">
                    <h5><i class="fas fa-phone text-primary me-2"></i>Call Us</h5>
                    <p>(123) 456-7890</p>
                </div>
                
                <div class="mb-3">
                    <h5><i class="fas fa-envelope text-primary me-2"></i>Email Us</h5>
                    <p>info@coffeehouse.com</p>
                </div>
                
                <div class="mb-3">
                    <h5><i class="fas fa-clock text-primary me-2"></i>Opening Hours</h5>
                    <p>Monday - Friday: 7:00 AM - 8:00 PM<br>
                    Saturday - Sunday: 8:00 AM - 9:00 PM</p>
                </div>
            </div>

            <div class="social-links mt-4">
                <h5>Follow Us</h5>
                <a href="#" class="btn btn-outline-primary me-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="btn btn-outline-primary me-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="btn btn-outline-primary me-2"><i class="fab fa-instagram"></i></a>
                <a href="#" class="btn btn-outline-primary"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4">Send Us a Message</h3>
                    <form id="contactForm" action="process_contact.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                        
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <select class="form-select" id="subject" name="subject" required>
                                <option value="">Choose a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="reservation">Table Reservation</option>
                                <option value="feedback">Feedback</option>
                                <option value="career">Career Opportunity</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-4">Find Us on the Map</h3>
            <div class="map-container">
                <!-- Replace with your actual map embed code -->
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1234.5678!2d-123.4567!3d12.3456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjDCsDI4JzE4LjgiTiAxMDPCsDU4JzIzLjIiVw!5e0!3m2!1sen!2sus!4v1234567890" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo '<div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3" role="alert">
            Thank you for your message! We will get back to you soon.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
?>