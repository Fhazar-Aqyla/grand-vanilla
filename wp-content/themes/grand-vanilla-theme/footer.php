<?php
/**
 * The footer template for Grand Vanilla ID theme
 * Matches Desktop, Tablet, and Mobile Figma designs with exact responsive layouts
 *
 * @package GrandVanilla
 */

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();
?>
    </main><!-- #primary -->

    <!-- Main Footer -->
    <footer id="colophon" class="gv-footer" style="background-color: #FAF8F5; border-top: 1px solid rgba(0,0,0,0.06); padding-top: 4rem; padding-bottom: 0 !important; margin-bottom: 0 !important; color: #363E19;">
        <div class="gv-container">
            
            <div class="gv-footer-main-wrap">
                
                <!-- Brand Block: Logo, Italic Tagline, Social Icons, Phone & Email -->
                <div class="gv-footer-brand-col">
                    <!-- Logo -->
                    <div class="gv-footer-logo-wrap" style="margin-bottom: 1.25rem;">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: inline-block; text-decoration: none;">
                            <img src="<?php echo esc_url( $img_dir . 'Logo with text.png' ); ?>" alt="Grand Vanilla Indonesia" class="gv-footer-logo-img" style="height: 38px; width: auto; object-fit: contain;">
                        </a>
                    </div>

                    <!-- Tagline (Italic) -->
                    <div class="gv-footer-tagline" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.0625rem; font-weight: 600; font-style: italic; color: #363E19; line-height: 1.35; margin-bottom: 1.25rem;">
                        Pure Indonesian Vanilla.<br>Global Quality.
                    </div>

                    <!-- Social Icons (Clean Line-Art SVG Icons - Instagram, Facebook, YouTube) -->
                    <div class="gv-footer-social-wrap" style="display: flex; gap: 0.85rem; align-items: center; margin-bottom: 1.25rem;">
                        <!-- Instagram Icon -->
                        <a href="<?php echo esc_url( $contact['instagram_url'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram" style="color: #363E19; display: flex; align-items: center; transition: opacity 0.2s ease;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                        <!-- Facebook Icon -->
                        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook" style="color: #363E19; display: flex; align-items: center; transition: opacity 0.2s ease;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                        <!-- YouTube Icon -->
                        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" aria-label="YouTube" style="color: #363E19; display: flex; align-items: center; transition: opacity 0.2s ease;">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
                                <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" fill="currentColor"></polygon>
                            </svg>
                        </a>
                    </div>

                    <!-- Contact Numbers & Email (Dynamic from Customizer) -->
                    <div class="gv-footer-contact-info" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.875rem; color: #363E19; line-height: 1.6;">
                        <div><?php echo esc_html( $contact['whatsapp'] ); ?></div>
                        <div><?php echo esc_html( $contact['email'] ); ?></div>
                    </div>
                </div>

                <!-- Col 2: Products Links (Dynamic from vanilla_product CPT) -->
                <div class="gv-footer-products-col">
                    <h4 class="gv-footer-col-header" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.8125rem; font-weight: 700; color: #8C9286; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 1.25rem;">
                        PRODUCTS
                    </h4>
                    <div class="gv-footer-nav-col" style="display: flex; flex-direction: column; gap: 0.65rem;">
                        <?php
                        $footer_prods = get_posts( array(
                            'post_type'      => 'vanilla_product',
                            'posts_per_page' => 5,
                            'post_status'    => 'publish',
                            'orderby'        => 'menu_order date',
                            'order'          => 'ASC',
                        ) );
                        foreach ( $footer_prods as $fp ) :
                        ?>
                            <a href="<?php echo esc_url( get_permalink( $fp->ID ) ); ?>"><?php echo esc_html( $fp->post_title ); ?></a>
                        <?php endforeach; ?>
                        <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Bulk / Wholesale</a>
                        <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Custom / OEM</a>
                    </div>
                </div>

                <!-- Nav Split Group for Mobile (Navigation & About Us/Help) -->
                <div class="gv-footer-secondary-group">
                    <!-- Col 3: Company / Navigation Links (Dynamic wp_nav_menu) -->
                    <div class="gv-footer-nav-section">
                        <h4 class="gv-footer-col-header" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.8125rem; font-weight: 700; color: #8C9286; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 1.25rem;">
                            <span class="gv-header-desktop">COMPANY</span>
                            <span class="gv-header-mobile">NAVIGATION</span>
                        </h4>
                        <div class="gv-footer-nav-col" style="display: flex; flex-direction: column; gap: 0.65rem;">
                            <?php
                            if ( has_nav_menu( 'primary' ) ) {
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'container'      => false,
                                    'items_wrap'     => '%3$s',
                                    'walker'         => new Grand_Vanilla_Footer_Walker(),
                                ) );
                            } else {
                                ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                                <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Us</a>
                                <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Products</a>
                                <a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">Gallery</a>
                                <a href="<?php echo esc_url( home_url( '/articles/' ) ); ?>">Blog</a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Col 4: Help / About Us Links -->
                    <div class="gv-footer-help-section">
                        <h4 class="gv-footer-col-header" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.8125rem; font-weight: 700; color: #8C9286; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 1.25rem;">
                            <span class="gv-header-desktop">HELP</span>
                            <span class="gv-header-mobile">ABOUT US</span>
                        </h4>
                        <div class="gv-footer-nav-col" style="display: flex; flex-direction: column; gap: 0.65rem;">
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a>
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Privacy</a>
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Terms</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom Full-Width Copyright Bar -->
        <div style="background-color: #CCD2C7; padding: 1.25rem 1rem; text-align: center;">
            <p class="gv-footer-copyright" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.875rem; color: #4A5239; margin: 0; font-weight: 500;">
                <span class="gv-copy-desktop">Copyright &copy; 2026 All Rights Reserved Grand Vanilla Indonesia</span>
                <span class="gv-copy-mobile">COPYRIGHT &copy; 2026 ALL RIGHTS RESERVED<br>GRAND VANILLA INDONESIA</span>
            </p>
        </div>
    </footer>

    <style>
    /* Default Desktop View (> 1024px) */
    .gv-footer-main-wrap {
        display: grid;
        grid-template-columns: 1.4fr 1.1fr 1.8fr;
        gap: 2.5rem;
        margin-bottom: 3.5rem;
        align-items: flex-start;
    }
    .gv-footer-secondary-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2.5rem;
    }
    .gv-footer-nav-col a {
        font-family: var(--font-heading, 'Jost', sans-serif);
        font-size: 0.875rem;
        font-weight: 600;
        color: #363E19;
        text-decoration: none;
    }
    .gv-header-mobile { display: none !important; }
    .gv-copy-mobile { display: none !important; }

    /* Tablet View (650px - 1024px) - ALL CAPS Links, 4 Columns Horizontal */
    @media (max-width: 1024px) and (min-width: 650px) {
        .gv-footer-main-wrap {
            grid-template-columns: 1.35fr 1.05fr 1.6fr !important;
            gap: 1.5rem !important;
        }
        .gv-footer-secondary-group {
            grid-template-columns: 1fr 1fr !important;
            gap: 1.5rem !important;
        }
        .gv-footer-tagline {
            text-transform: uppercase !important;
            font-size: 0.9375rem !important;
        }
        .gv-footer-nav-col a {
            text-transform: uppercase !important;
            font-size: 0.8125rem !important;
        }
        .gv-footer-copyright {
            text-transform: uppercase !important;
            font-size: 0.75rem !important;
            letter-spacing: 0.04em !important;
        }
    }

    /* Mobile View (< 650px) - Exact match to Figma Mobile Screenshot */
    @media (max-width: 649px) {
        .gv-footer-main-wrap {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            text-align: center !important;
            gap: 3rem !important;
            margin-bottom: 3.5rem !important;
        }
        .gv-footer-brand-col {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            text-align: center !important;
        }
        .gv-footer-logo-wrap {
            display: flex !important;
            justify-content: center !important;
        }
        .gv-footer-social-wrap {
            justify-content: center !important;
        }
        .gv-footer-tagline {
            text-transform: uppercase !important;
            font-size: 1rem !important;
        }
        .gv-footer-products-col {
            width: 100% !important;
            text-align: center !important;
        }
        .gv-footer-products-col .gv-footer-nav-col {
            align-items: center !important;
        }
        .gv-footer-secondary-group {
            display: grid !important;
            grid-template-columns: 1fr 1fr !important;
            width: 100% !important;
            gap: 1.5rem !important;
            text-align: center !important;
        }
        .gv-footer-secondary-group .gv-footer-nav-col {
            align-items: center !important;
        }
        .gv-footer-nav-col a {
            text-transform: uppercase !important;
            font-size: 0.8125rem !important;
        }
        .gv-header-desktop { display: none !important; }
        .gv-header-mobile { display: inline !important; }
        .gv-copy-desktop { display: none !important; }
        .gv-copy-mobile { display: inline !important; font-size: 0.75rem !important; line-height: 1.5 !important; }
    }
    </style>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
