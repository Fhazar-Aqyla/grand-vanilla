<?php
/**
 * Template Part: CTA Banner with Corner Orchid Flower Watermarks
 * Matches Desktop (Title Case), Tablet (ALL CAPS), and Mobile (ALL CAPS) Figma Designs
 *
 * @package GrandVanilla
 */

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();

$cta_title    = isset( $args['title'] ) ? $args['title'] : 'Ready To Get Your Vanilla<br>Supply Started?';
$cta_btn_text = isset( $args['btn_text'] ) ? $args['btn_text'] : 'Get a Sample';
$cta_btn_url  = isset( $args['btn_url'] ) ? $args['btn_url'] : home_url( '/contact/' );
?>

<section class="gv-cta-banner">
    <!-- Top-Right Corner Orchid Flower -->
    <img src="<?php echo esc_url( gv_asset_img( 'Logo.png' ) ); ?>" 
         class="gv-cta-flower gv-cta-flower-tr" 
         alt="" 
         aria-hidden="true">
    
    <!-- Bottom-Left Corner Orchid Flower -->
    <img src="<?php echo esc_url( gv_asset_img( 'Logo.png' ) ); ?>" 
         class="gv-cta-flower gv-cta-flower-bl" 
         alt="" 
         aria-hidden="true">

    <div class="gv-container gv-cta-container">
        <h2 class="gv-cta-heading">
            <span class="gv-cta-heading-desktop"><?php echo wp_kses_post( $cta_title ); ?></span>
            <span class="gv-cta-heading-responsive">LOOKING FOR A RELIABLE<br>INDONESIAN VANILLA<br>SUPPLIER?</span>
        </h2>
        <div class="gv-cta-btn-wrap">
            <a href="<?php echo esc_url( $cta_btn_url ); ?>" class="gv-btn gv-cta-btn">
                <span class="gv-cta-btn-desktop"><?php echo esc_html( $cta_btn_text ); ?></span>
                <span class="gv-cta-btn-responsive">REQUEST A QUOTE</span>
            </a>
        </div>
    </div>
</section>

<style>
/* -------------------------------------------------------------
 * CTA Banner Responsive Styling (Desktop vs Tablet/Mobile Figma Alignment)
 * ----------------------------------------------------------- */
.gv-cta-banner {
    position: relative !important;
    background-color: #B9C1B4 !important;
    padding: 5.5rem 1.5rem !important;
    text-align: center !important;
    overflow: hidden !important;
    width: 100% !important;
    box-sizing: border-box !important;
}

.gv-cta-flower {
    position: absolute !important;
    width: 220px !important;
    height: auto !important;
    pointer-events: none !important;
    user-select: none !important;
    z-index: 1 !important;
    opacity: 0.8 !important;
}

.gv-cta-flower-tr {
    top: -45px !important;
    right: -40px !important;
    transform: rotate(225deg) !important;
}

.gv-cta-flower-bl {
    bottom: -45px !important;
    left: -40px !important;
    transform: rotate(45deg) !important;
}

.gv-cta-container {
    position: relative !important;
    z-index: 2 !important;
    max-width: 820px !important;
    margin: 0 auto !important;
    padding: 0 1rem !important;
}

.gv-cta-heading-responsive,
.gv-cta-btn-responsive {
    display: none !important;
}

/* Desktop View (> 1024px) */
.gv-cta-heading {
    font-family: var(--font-heading, 'Jost', sans-serif) !important;
    font-size: 2.5rem !important;
    font-weight: 500 !important;
    color: #363E19 !important;
    line-height: 1.25 !important;
    margin: 0 0 2rem 0 !important;
    letter-spacing: -0.01em !important;
    text-transform: none !important;
}

.gv-cta-btn-wrap {
    display: flex !important;
    justify-content: center !important;
}

.gv-cta-btn {
    display: inline-block !important;
    background-color: #363E19 !important;
    color: #FFFFFF !important;
    font-family: var(--font-heading, 'Jost', sans-serif) !important;
    font-size: 0.875rem !important;
    font-weight: 500 !important;
    letter-spacing: 0.02em !important;
    text-transform: none !important;
    padding: 0.8rem 2.25rem !important;
    border-radius: 4px !important;
    text-decoration: none !important;
    box-shadow: 0 4px 12px rgba(54, 62, 25, 0.15) !important;
    transition: all 0.2s ease !important;
}

.gv-cta-btn:hover {
    background-color: #0A0804 !important;
    color: #FFFFFF !important;
    transform: translateY(-2px) !important;
}

/* Tablet View (768px - 1024px) */
@media (max-width: 1024px) {
    .gv-cta-banner {
        padding: 5rem 1.5rem !important;
    }
    .gv-cta-heading-desktop,
    .gv-cta-btn-desktop {
        display: none !important;
    }
    .gv-cta-heading-responsive {
        display: inline !important;
    }
    .gv-cta-btn-responsive {
        display: inline !important;
    }
    .gv-cta-heading {
        font-size: 2.125rem !important;
        margin-bottom: 1.75rem !important;
        max-width: 650px !important;
        margin-left: auto !important;
        margin-right: auto !important;
        text-transform: uppercase !important;
    }
    .gv-cta-btn {
        text-transform: uppercase !important;
    }
    .gv-cta-flower {
        width: 180px !important;
    }
    .gv-cta-flower-tr {
        top: -35px !important;
        right: -30px !important;
    }
    .gv-cta-flower-bl {
        bottom: -35px !important;
        left: -30px !important;
    }
}

/* Mobile View (< 720px) */
@media (max-width: 719px) {
    .gv-cta-banner {
        padding: 4.5rem 1.25rem !important;
    }
    .gv-cta-heading-desktop,
    .gv-cta-btn-desktop {
        display: none !important;
    }
    .gv-cta-heading-responsive {
        display: inline !important;
    }
    .gv-cta-btn-responsive {
        display: inline !important;
    }
    .gv-cta-heading {
        font-size: 1.625rem !important;
        line-height: 1.28 !important;
        margin-bottom: 1.75rem !important;
        max-width: 320px !important;
        margin-left: auto !important;
        margin-right: auto !important;
        text-transform: uppercase !important;
    }
    .gv-cta-flower {
        width: 125px !important;
    }
    .gv-cta-flower-tr {
        top: -20px !important;
        right: -20px !important;
    }
    .gv-cta-flower-bl {
        bottom: -20px !important;
        left: -20px !important;
    }
    .gv-cta-btn {
        padding: 0.75rem 1.75rem !important;
        font-size: 0.8125rem !important;
        text-transform: uppercase !important;
    }
}
</style>
