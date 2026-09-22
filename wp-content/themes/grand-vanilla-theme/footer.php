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
                            <?php
                            $footer_logo_url = has_custom_logo() 
                                ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) 
                                : gv_asset_img( 'Logo with text.png' );
                            ?>
                            <img src="<?php echo esc_url( $footer_logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="gv-footer-logo-img" style="height: 38px; width: auto; object-fit: contain;">
                        </a>
                    </div>

                    <!-- Tagline (Italic) -->
                    <div class="gv-footer-tagline" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.0625rem; font-weight: 500; font-style: italic; color: #363E19; line-height: 1.35; margin-bottom: 1.25rem;">
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
                        <a href="<?php echo esc_url( $contact['facebook_url'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook" style="color: #363E19; display: flex; align-items: center; transition: opacity 0.2s ease;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                        <!-- YouTube Icon -->
                        <a href="<?php echo esc_url( $contact['youtube_url'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube" style="color: #363E19; display: flex; align-items: center; transition: opacity 0.2s ease;">
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
                    <h4 class="gv-footer-col-header" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.8125rem; font-weight: 500; color: #8C9286; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 1.25rem;">
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
                        <h4 class="gv-footer-col-header" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.8125rem; font-weight: 500; color: #8C9286; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 1.25rem;">
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
                        <h4 class="gv-footer-col-header" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.8125rem; font-weight: 500; color: #8C9286; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 1.25rem;">
                            <span class="gv-header-desktop">HELP</span>
                            <span class="gv-header-mobile">ABOUT US</span>
                        </h4>
                        <div class="gv-footer-nav-col" style="display: flex; flex-direction: column; gap: 0.65rem;">
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a>
                            <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">Privacy Policy</a>
                            <a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>">Terms of Supply</a>
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
        font-weight: 500;
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

    <!-- Global Floating WhatsApp Quick Contact Button -->
    <aside class="gv-floating-wa-wrap" aria-label="WhatsApp Contact">
        <a href="<?php echo esc_url( $contact['whatsapp_url'] ); ?>" 
           target="_blank" 
           rel="noopener noreferrer" 
           class="gv-floating-wa-btn" 
           aria-label="Chat via WhatsApp (+62 877-1775-2085)">
            <span class="gv-wa-pulse" aria-hidden="true"></span>
            <span class="gv-wa-icon" aria-hidden="true">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2ZM12.04 20.15C10.56 20.15 9.11 19.76 7.85 19.01L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 14.99 3.8 13.47 3.8 11.91C3.8 7.37 7.5 3.67 12.05 3.67C14.25 3.67 16.31 4.53 17.87 6.09C19.42 7.65 20.28 9.72 20.28 11.92C20.28 16.46 16.58 20.15 12.04 20.15ZM16.57 14.41C16.32 14.29 15.1 13.69 14.88 13.61C14.65 13.53 14.48 13.49 14.32 13.74C14.15 13.98 13.67 14.55 13.52 14.72C13.38 14.88 13.23 14.91 12.98 14.78C12.74 14.66 11.95 14.4 11.01 13.57C10.28 12.92 9.78 12.11 9.64 11.87C9.5 11.62 9.63 11.49 9.75 11.37C9.86 11.26 10 11.08 10.12 10.94C10.24 10.8 10.28 10.7 10.36 10.53C10.44 10.37 10.4 10.23 10.34 10.11C10.28 9.99 9.79 8.78 9.58 8.29C9.38 7.8 9.18 7.87 9.03 7.86C8.89 7.85 8.72 7.85 8.56 7.85C8.4 7.85 8.13 7.91 7.91 8.15C7.68 8.4 7.05 8.99 7.05 10.2C7.05 11.41 7.93 12.57 8.05 12.74C8.17 12.9 9.78 15.39 12.25 16.45C12.84 16.7 13.3 16.85 13.66 16.97C14.25 17.16 14.79 17.13 15.22 17.07C15.7 17 16.69 16.47 16.89 15.89C17.1 15.32 17.1 14.83 17.04 14.72C16.97 14.62 16.82 14.54 16.57 14.41Z" fill="white"/>
                </svg>
            </span>
            <span class="gv-wa-label">Chat with Us</span>
        </a>
    </aside>

    <style>
    /* Global Floating WhatsApp Button Styling */
    .gv-floating-wa-wrap {
        position: fixed !important;
        bottom: 28px !important;
        right: 28px !important;
        z-index: 99999 !important;
        display: flex !important;
        align-items: center !important;
        pointer-events: auto !important;
    }

    .gv-floating-wa-btn {
        display: inline-flex !important;
        align-items: center !important;
        background: linear-gradient(135deg, #25D366 0%, #1EBE5D 100%) !important;
        color: #FFFFFF !important;
        text-decoration: none !important;
        height: 52px !important;
        min-width: 52px !important;
        border-radius: 50px !important;
        padding: 0 18px 0 14px !important;
        box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4), 0 2px 6px rgba(0, 0, 0, 0.12) !important;
        position: relative !important;
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1) !important;
        box-sizing: border-box !important;
    }

    .gv-floating-wa-btn:hover {
        transform: translateY(-4px) scale(1.04) !important;
        box-shadow: 0 10px 28px rgba(37, 211, 102, 0.5), 0 4px 10px rgba(0, 0, 0, 0.15) !important;
        color: #FFFFFF !important;
    }

    .gv-wa-icon {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 28px !important;
        height: 28px !important;
        flex-shrink: 0 !important;
    }

    .gv-wa-icon svg {
        display: block !important;
        width: 26px !important;
        height: 26px !important;
        filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.15)) !important;
    }

    .gv-wa-label {
        font-family: var(--font-heading, 'Jost', sans-serif) !important;
        font-size: 0.875rem !important;
        font-weight: 600 !important;
        letter-spacing: 0.02em !important;
        color: #FFFFFF !important;
        white-space: nowrap !important;
        margin-left: 8px !important;
        display: inline-block !important;
    }

    .gv-wa-pulse {
        position: absolute !important;
        inset: -4px !important;
        border-radius: 50px !important;
        background: rgba(37, 211, 102, 0.45) !important;
        z-index: -1 !important;
        animation: gv-wa-pulse-anim 2.5s infinite ease-out !important;
        pointer-events: none !important;
    }

    @keyframes gv-wa-pulse-anim {
        0% {
            transform: scale(0.96);
            opacity: 0.8;
        }
        70% {
            transform: scale(1.22);
            opacity: 0;
        }
        100% {
            transform: scale(1.22);
            opacity: 0;
        }
    }

    /* Tablet & Mobile Responsive */
    @media (max-width: 719px) {
        .gv-floating-wa-wrap {
            bottom: 24px !important;
            right: 22px !important;
        }

        .gv-floating-wa-btn {
            height: 68px !important;
            min-width: 68px !important;
            width: 68px !important;
            padding: 0 !important;
            justify-content: center !important;
            border-radius: 50% !important;
            box-shadow: 0 10px 30px rgba(37, 211, 102, 0.48), 0 4px 12px rgba(0, 0, 0, 0.16) !important;
        }

        .gv-wa-label {
            display: none !important;
        }

        .gv-wa-pulse {
            border-radius: 50% !important;
            inset: -5px !important;
        }

        .gv-wa-icon {
            width: 40px !important;
            height: 40px !important;
        }

        .gv-wa-icon svg {
            width: 38px !important;
            height: 38px !important;
        }
    }

    @media (min-width: 720px) and (max-width: 1024px) {
        .gv-floating-wa-wrap {
            bottom: 32px !important;
            right: 32px !important;
        }

        .gv-floating-wa-btn {
            height: 68px !important;
            width: auto !important;
            min-width: 68px !important;
            border-radius: 50px !important;
            padding: 0 28px 0 20px !important;
            box-shadow: 0 10px 32px rgba(37, 211, 102, 0.48), 0 4px 12px rgba(0, 0, 0, 0.16) !important;
        }

        .gv-wa-icon {
            width: 42px !important;
            height: 42px !important;
        }

        .gv-wa-icon svg {
            width: 38px !important;
            height: 38px !important;
        }

        .gv-wa-label {
            display: inline-block !important;
            font-size: 1.15rem !important;
            font-weight: 600 !important;
            margin-left: 12px !important;
        }
    }
    </style>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
