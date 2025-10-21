<footer id="contacto" class="site-footer" role="contentinfo">
    <div class="site-footer__top container">
        <!-- Contacto -->
        <section class="footer-block">
            <h4 class="footer-block__title">Contacto</h4>
            <ul class="contact-list" itemscope itemtype="https://schema.org/Organization">
                <li class="contact-list__item">
                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    <span itemprop="address">Calle 15 de Septiembre Av. San José No. 286, San Marcos, San Salvador</span>
                </li>
                <li class="contact-list__item">
                    <i class="fas fa-phone" aria-hidden="true"></i>
                    <a href="tel:+50325031970" class="contact-link">2503-1970</a>
                    <span class="sep"> / </span>
                    <a href="tel:+50322206927" class="contact-link">2220-6927</a>
                </li>
                <li class="contact-list__item">
                    <i class="fas fa-envelope" aria-hidden="true"></i>
                    <a href="mailto:cecnsrosario@hotmail.com" class="contact-link">cecnsrosario@hotmail.com</a>
                </li>
            </ul>
        </section>

        <!-- Horario -->
        <section class="footer-block">
            <h4 class="footer-block__title">Horario de atención</h4>
            <p class="footer-text">
                Lunes a Viernes:<br>
                <strong>7:00 a.m. – 1:00 p.m.</strong> y <strong>2:00 p.m. – 4:00 p.m.</strong>
            </p>
        </section>

        <!-- Enlaces -->
        <nav class="footer-block" aria-label="Enlaces rápidos">
            <h4 class="footer-block__title">Enlaces</h4>
            <ul class="footer-links">
                <li><a href="<?= BASE_URL ?>index.php#hero">Inicio</a></li>
                <li><a href="<?= BASE_URL ?>pastoral-educativa.php">Pastoral educativa</href=>
                </li>
                <li><a href="<?= BASE_URL ?>historia.php">Nuestra historia</a></li>
                <li><a href="<?= BASE_URL ?>proceso-admision.php">Contáctanos</a></li>
            </ul>
        </nav>

        <!-- Redes -->
        <section class="footer-block">
            <h4 class="footer-block__title">Síguenos</h4>
            <ul class="social-list">
                <li><a href="#" class="social-btn" aria-label="Facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                <li><a href="#" class="social-btn" aria-label="Instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#" class="social-btn" aria-label="YouTube"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
        </section>
    </div>

    <div class="site-footer__bottom">
        <div class="container bottom-grid">
            <p class="copyright">
                &copy; 2025 CECNSR. Todos los derechos reservados
            </p>

            <nav class="legal-nav" aria-label="Legal">
                <a href="<?= BASE_URL ?>aviso-legal.php">Aviso legal</a>
                <span aria-hidden="true">·</span>
                <a href="<?= BASE_URL ?>privacidad.php">Privacidad</a>
                <span aria-hidden="true">·</span>
                <a href="<?= BASE_URL ?>mapa-del-sitio.php">Mapa del sitio</a>
            </nav>

            <a href="#top" class="to-top" aria-label="Volver arriba">
                <i class="fas fa-arrow-up" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</footer>

<!-- Ideal: carga el CSS del footer en el <head> vía $PAGE_HEAD. 
     Si prefieres aquí, también funciona: -->
<link rel="stylesheet" href="<?= asset('assets/partials/style-partials/footer.css'); ?>">