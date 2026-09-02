<?php
/**
 * Template Part: CTA Banner with Corner Orchid Flower Watermarks
 *
 * @package GrandVanilla
 */

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();

$cta_title    = isset( $args['title'] ) ? $args['title'] : 'Looking For A Reliable<br>Indonesian Vanilla Supplier?';
$cta_btn_text = isset( $args['btn_text'] ) ? $args['btn_text'] : 'Request a Quote';
$cta_btn_url  = isset( $args['btn_url'] ) ? $args['btn_url'] : home_url( '/contact/' );
?>

<section class="gv-cta-banner" style="position: relative; background-color: #B9C1B4; padding: 5rem 1.5rem; text-align: center; overflow: hidden; width: 100%;">
    <!-- Top-Right Corner Orchid Flower -->
    <img src="<?php echo esc_url( $img_dir . 'Logo.png' ); ?>" 
         class="gv-cta-flower gv-cta-flower-tr" 
         alt="" 
         aria-hidden="true" 
         style="position: absolute; top: -50px; right: -40px; width: 220px; height: auto; pointer-events: none; user-select: none; z-index: 1; opacity: 0.8; transform: rotate(225deg);">
    
    <!-- Bottom-Left Corner Orchid Flower -->
    <img src="<?php echo esc_url( $img_dir . 'Logo.png' ); ?>" 
         class="gv-cta-flower gv-cta-flower-bl" 
         alt="" 
         aria-hidden="true" 
         style="position: absolute; bottom: -50px; left: -40px; width: 220px; height: auto; pointer-events: none; user-select: none; z-index: 1; opacity: 0.8; transform: rotate(45deg);">

    <div class="gv-container" style="position: relative; z-index: 2; max-width: 900px; margin: 0 auto;">
        <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 700; color: #363E19; line-height: 1.25; margin: 0 0 1.75rem; letter-spacing: -0.01em;">
            <?php echo wp_kses_post( $cta_title ); ?>
        </h2>
        <div style="display: flex; justify-content: center;">
            <a href="<?php echo esc_url( $cta_btn_url ); ?>" 
               class="gv-btn" 
               style="background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.875rem; font-weight: 600; padding: 0.75rem 2.25rem; border-radius: 4px; text-decoration: none; box-shadow: 0 4px 12px rgba(54, 62, 25, 0.15); display: inline-block;">
                <?php echo esc_html( $cta_btn_text ); ?>
            </a>
        </div>
    </div>
</section>
