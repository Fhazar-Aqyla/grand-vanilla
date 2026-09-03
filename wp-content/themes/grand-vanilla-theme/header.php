<?php
/**
 * The header template for Grand Vanilla ID theme
 *
 * @package GrandVanilla
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Logo.png' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

    <!-- Main Navigation Header (Clean Figma Layout) -->
    <header id="masthead" class="gv-header" style="background-color: #FAF8F5; border-bottom: 1px solid rgba(0,0,0,0.06); padding: 1.25rem 0;">
        <div class="gv-container">
            <div style="display: flex; align-items: center; justify-content: space-between; gap: 2rem;">
                
                <!-- Brand Logo -->
                <div class="gv-brand-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="display: flex; align-items: center; text-decoration: none;">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Logo with text.png' ); ?>" alt="Grand Vanilla Indonesia" style="height: 38px; width: auto; object-fit: contain;">
                    </a>
                </div>

                <!-- Desktop Navigation Menu (Centered - Dynamic wp_nav_menu) -->
                <nav id="site-navigation" class="gv-nav-menu" style="display: flex; align-items: center; gap: 2.25rem;">
                    <?php
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'container'      => false,
                            'items_wrap'     => '%3$s',
                            'walker'         => new Grand_Vanilla_Nav_Walker(),
                        ) );
                    } else {
                        // Fallback
                        ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 600; color: #363E19; text-decoration: none; position: relative; padding-bottom: 4px; <?php echo is_front_page() ? 'border-bottom: 2px solid #363E19;' : ''; ?>">Home</a>
                        <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 600; color: #363E19; text-decoration: none; position: relative; padding-bottom: 4px; <?php echo is_page('about') ? 'border-bottom: 2px solid #363E19;' : ''; ?>">About Us</a>
                        <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 600; color: #363E19; text-decoration: none; position: relative; padding-bottom: 4px; <?php echo (is_post_type_archive('vanilla_product') || is_singular('vanilla_product') || is_page('products')) ? 'border-bottom: 2px solid #363E19;' : ''; ?>">Products</a>
                        <a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 600; color: #363E19; text-decoration: none; position: relative; padding-bottom: 4px; <?php echo is_page('gallery') ? 'border-bottom: 2px solid #363E19;' : ''; ?>">Gallery</a>
                        <a href="<?php echo esc_url( home_url( '/articles/' ) ); ?>" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 600; color: #363E19; text-decoration: none; position: relative; padding-bottom: 4px; <?php echo (is_home() || is_singular('post')) ? 'border-bottom: 2px solid #363E19;' : ''; ?>">Blog</a>
                        <?php
                    }
                    ?>
                </nav>

                <!-- Contact CTA Button -->
                <div class="gv-nav-cta-wrap" style="display: flex; align-items: center;">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" 
                       style="display: inline-block; background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.875rem; font-weight: 600; padding: 0.65rem 1.65rem; border-radius: 4px; text-decoration: none; transition: all 0.2s ease;">
                        Contact Us
                    </a>
                </div>

                <!-- Mobile Menu Toggle Button -->
                <button type="button" class="gv-mobile-toggle" id="gv-mobile-btn" aria-label="Toggle Navigation" style="display: none; background: none; border: none; cursor: pointer; color: #363E19;">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>

            </div>
        </div>

        <!-- Mobile Drawer -->
        <div class="gv-mobile-drawer" id="gv-mobile-drawer" style="display: none; padding: 1.5rem; background: #FAF8F5; border-top: 1px solid rgba(0,0,0,0.06);">
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <?php
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'walker'         => new Grand_Vanilla_Mobile_Walker(),
                    ) );
                } else {
                    ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1rem; font-weight: 600; color: #363E19; text-decoration: none;">Home</a>
                    <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1rem; font-weight: 600; color: #363E19; text-decoration: none;">About Us</a>
                    <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1rem; font-weight: 600; color: #363E19; text-decoration: none;">Products</a>
                    <a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1rem; font-weight: 600; color: #363E19; text-decoration: none;">Gallery</a>
                    <a href="<?php echo esc_url( home_url( '/articles/' ) ); ?>" style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1rem; font-weight: 600; color: #363E19; text-decoration: none;">Blog</a>
                    <?php
                }
                ?>
                <div style="padding-top: 0.5rem;">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="display: block; text-align: center; background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.875rem; font-weight: 600; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none;">
                        Contact Us &rarr;
                    </a>
                </div>
            </div>
        </div>
    </header>

    <style>
    @media (max-width: 899px) {
        #site-navigation { display: none !important; }
        .gv-nav-cta-wrap { display: none !important; }
        #gv-mobile-btn { display: block !important; }
        #gv-mobile-drawer.is-open { display: block !important; }
    }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('gv-mobile-btn');
        const drawer = document.getElementById('gv-mobile-drawer');
        if (toggleBtn && drawer) {
            toggleBtn.addEventListener('click', function() {
                drawer.classList.toggle('is-open');
            });
        }
    });
    </script>

    <main id="primary" class="site-main">
