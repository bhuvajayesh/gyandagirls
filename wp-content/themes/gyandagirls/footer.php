</div>
<footer class="footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-links-grid">
                <!-- Column 1 -->
                <div class="footer-about">
                    <a href="<?php echo site_url(); ?>" class="d-inline-block">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Logo"
                            class="logo-icon">
                    </a>
                    <p class="my-2">
                        Welcome to Gyanda Girls' High School - “A school which enlighten your imagination !”In life a
                        few decisions are as important- and potentially life-changing as choosing a school for your
                        child.
                    </p>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/gyandagirls/" target="_blank"><i
                                class="fa-brands fa-facebook"></i></a>
                    </div>
                </div>
                <!-- Column 2 -->
                <div class="footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Activities</a></li>
                        <li><a href="#">Facilities</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Faculties</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">Award of Appreciation</a></li>
                        <li><a href="#">Results</a></li>
                    </ul>
                </div>
                <!-- Column 3 -->
                <div class="footer-links">
                    <h4>The School</h4>
                    <ul>
                        <li><a href="#">About School</a></li>
                        <li><a href="#">Chairman Message</a></li>
                        <li><a href="#">Admission Process</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Timing</a></li>
                    </ul>
                </div>
                <!-- Column 4 -->
                <div class="footer-links footer-contact-info">
                    <h4>Contact Us</h4>
                    <ul class="ps-0">
                        <li class="f-contact-list mb-1">
                            <div class="icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <span>Gyanda Girls' Higher Secondary School Opp. Vidhata Society, Rannapark, K K Nagar
                                Road, Ghatlodia, Ahmedabad - 380061</span>
                        </li>
                        <li class="f-contact-list mb-1">
                            <div class="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <a href="mailto:gyanda_girls@yahoo.com">gyanda_girls@yahoo.com</a>
                        </li>
                        <li class="f-contact-list">
                            <div class="icon">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <a href="tel:+(91)-79-27602565">+(91)-79-27602565</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">Copyright © <?php echo date('Y'); ?> <strong>Gyanda Girls' Higher Secondary School</strong>. All
                    Rights Reserved. Design and Developed By <strong><a href="https://www.tristatetechnology.com/"
                            target="_blank">TriState Technology</a></strong>.</p>
            </div>
        </div>
    </div>
</footer>

<div class="scroll-top-arrow">
    <i class="fa-solid fa-angle-up"></i>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.5.3/build/js/intlTelInput.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>

<?php wp_footer(); ?>
<!-- Mobile menu arrow -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.menu-item-has-children').forEach(function(item) {
            let link = item.querySelector('a');
            if (link) {
                let toggle = document.createElement('button');
                toggle.className = 'dropdown-toggle-icon';
                toggle.type = 'button';
                toggle.innerHTML = '<i class="fa-solid fa-angle-down"></i>';

                // Insert button after <a>
                link.insertAdjacentElement('afterend', toggle);

                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    item.classList.toggle('open');
                });
            }
        });
    });
</script>

</body>

</html>