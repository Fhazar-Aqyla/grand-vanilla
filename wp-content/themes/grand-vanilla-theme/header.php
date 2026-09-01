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
    <link rel="icon" type="image/svg+xml" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicon.svg' ); ?>">
    <link rel="alternate icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicon.ico' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

    <!-- Top Announcement Bar -->
    <div class="gv-topbar">
        <span>🌱 Direct Indonesian Farm-Gate Vanilla Exporter &bull; Wholesale Inquiries & Worldwide FOB / CIF Shipping</span>
    </div>

    <!-- Main Navigation Header -->
    <header id="masthead" class="gv-header">
        <div class="gv-container">
            <div class="gv-nav-wrap">
                
                <!-- Brand Logo -->
                <div class="gv-brand-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        GRAND<span>VANILLA</span>
                    </a>
                </div>

                <!-- Desktop Navigation Menu -->
                <nav id="site-navigation" class="gv-nav-menu">
                    <?php
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'gv-nav-menu',
                            'container'      => false,
                            'fallback_cb'    => false,
                        ) );
                    } else {
                        // Fallback default navigation links matching 6 PRD pages
                        $current_uri = $_SERVER['REQUEST_URI'] ?? '';
                        ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="gv-nav-link <?php echo is_front_page() ? 'active' : ''; ?>">Home</a>
                        <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="gv-nav-link <?php echo is_page( 'about' ) ? 'active' : ''; ?>">About Us</a>
                        <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" class="gv-nav-link <?php echo ( is_post_type_archive('vanilla_product') || is_singular('vanilla_product') || is_page('products') ) ? 'active' : ''; ?>">Products</a>
                        <a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" class="gv-nav-link <?php echo is_page( 'gallery' ) ? 'active' : ''; ?>">Gallery</a>
                        <a href="<?php echo esc_url( home_url( '/articles/' ) ); ?>" class="gv-nav-link <?php echo ( is_home() || is_singular('post') ) ? 'active' : ''; ?>">Articles</a>
                        <?php
                    }
                    ?>
                </nav>

                <!-- Contact CTA Button -->
                <div class="gv-nav-cta">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="gv-btn gv-btn-primary gv-btn-sm">
                        Contact Us &rarr;
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button type="button" class="gv-mobile-toggle" id="gv-mobile-btn" aria-label="Toggle Navigation">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>

            </div>
        </div>

        <!-- Mobile Dropdown Drawer -->
        <div class="gv-mobile-drawer" id="gv-mobile-drawer">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="gv-nav-link">Home</a>
            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="gv-nav-link">About Us</a>
            <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" class="gv-nav-link">Products</a>
            <a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" class="gv-nav-link">Gallery</a>
            <a href="<?php echo esc_url( home_url( '/articles/' ) ); ?>" class="gv-nav-link">Articles</a>
            <div style="padding-top: 1rem;">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="gv-btn gv-btn-primary" style="width: 100%;">
                    Contact Us &rarr;
                </a>
            </div>
        </div>
    </header>

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

    <main id="primary" class="gv-main">
