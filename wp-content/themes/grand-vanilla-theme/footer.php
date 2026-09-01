<?php
/**
 * The footer template for Grand Vanilla ID theme
 *
 * @package GrandVanilla
 */

$contact = grand_vanilla_get_contact_info();
?>
    </main><!-- #primary -->

    <footer id="colophon" class="gv-footer">
        <div class="gv-container">
            <div class="gv-footer-grid">
                
                <!-- Col 1: Bio & Branding -->
                <div>
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Logo.png' ); ?>" alt="Grand Vanilla Logo" style="height: 38px; width: auto;">
                        <div style="font-family: var(--font-heading); line-height: 1.1;">
                            <div style="font-size: 1.0625rem; font-weight: 800; letter-spacing: 0.05em; color: var(--color-pitch-black);">GRAND<span style="color: var(--color-dark-khaki);">VANILLA</span></div>
                            <div style="font-size: 0.5rem; font-weight: 700; letter-spacing: 0.2em; color: var(--color-nw-500);">INDONESIA</div>
                        </div>
                    </div>
                    <p style="font-size: 0.875rem; font-family: var(--font-heading); font-weight: 600; color: var(--color-pitch-black); margin-bottom: 1rem;">
                        Pure Indonesian Vanilla.<br>Global Quality.
                    </p>
                    <div style="display: flex; gap: 0.75rem; margin-bottom: 1.25rem; font-size: 1.125rem;">
                        <a href="https://wa.me/6281226974731" target="_blank" rel="noopener noreferrer" style="color: var(--color-dark-khaki);">💬</a>
                        <a href="mailto:grandvanilla@gmail.com" style="color: var(--color-dark-khaki);">📧</a>
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="color: var(--color-dark-khaki);">📍</a>
                    </div>
                    <div style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">
                        <div>+62 812-2697-4731 / +123 (456) 789</div>
                        <div>grandvanilla@gmail.com</div>
                    </div>
                </div>

                <!-- Col 2: Products -->
                <div>
                    <h4>PRODUCTS</h4>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Vanilla Beans</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Vanilla Powder</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Vanilla Extract</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Vanilla Seed</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Vanilla Paste</a></li>
                    </ul>
                </div>

                <!-- Col 3: Company -->
                <div>
                    <h4>COMPANY</h4>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Us</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Products</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">Gallery</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/articles/' ) ); ?>">Blog</a></li>
                    </ul>
                </div>

                <!-- Col 4: Help -->
                <div>
                    <h4>HELP</h4>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Privacy Policy</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Terms & Conditions</a></li>
                    </ul>
                </div>

            </div>

            <!-- Bottom Copyright -->
            <div class="gv-footer-bottom">
                <p>Copyright &copy; 2026 All Rights Reserved Grand Vanilla Indonesia</p>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
