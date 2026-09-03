<?php

/**
 * The template for displaying the Landing Page (Homepage)
 * High-Fidelity Implementation based on Figma Desktop/Landing Page.pdf
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();
?>

<!-- 1. Hero Section -->
<section class="gv-hero" style="position: relative; min-height: 85vh; background: url('<?php echo esc_url($img_dir . 'Hero Image.png'); ?>') center center / cover no-repeat; display: flex; align-items: center; padding: 6rem 0 5rem;">
    <!-- Dark Gradient Overlay for optimal readability -->
    <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0.15) 100%); pointer-events: none;"></div>

    <div class="gv-container" style="position: relative; z-index: 2; width: 100%;">
        <div style="max-width: 680px;">

            <!-- Main Hero Headline -->
            <h1 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2.5rem, 5vw, 3.85rem); font-weight: 700; color: #FFFFFF; line-height: 1.15; margin-bottom: 1.5rem; letter-spacing: -0.01em;">
                <?php echo esc_html(get_theme_mod('grand_vanilla_hero_title', 'Premium Indonesian vanilla, sourced for the global market.')); ?>
            </h1>

            <!-- Subtitle -->
            <p style="font-size: clamp(1rem, 1.5vw, 1.125rem); color: rgba(255,255,255,0.92); line-height: 1.6; margin-bottom: 2.25rem; max-width: 580px;">
                <?php echo esc_html(get_theme_mod('grand_vanilla_hero_subtitle', 'We deliver premium Indonesian vanilla with consistent quality, reliable supply, and tailored solutions for global B2B buyers.')); ?>
            </p>

            <!-- Dual Action Buttons -->
            <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 4rem;">
                <a href="<?php echo esc_url(home_url('/products/')); ?>"
                    style="display: inline-block; background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 600; padding: 0.85rem 2rem; border-radius: 4px; text-decoration: none; box-shadow: 0 4px 14px rgba(0,0,0,0.25); transition: all 0.2s ease;">
                    Explore Products
                </a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>"
                    style="display: inline-block; background: rgba(255,255,255,0.15); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.7); color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 600; padding: 0.85rem 2rem; border-radius: 4px; text-decoration: none; transition: all 0.2s ease;">
                    Request a Quote
                </a>
            </div>

            <!-- Floating Badge: Trusted Customers Worldwide -->
            <div style="display: inline-flex; flex-direction: column; background: #0E110A; border-radius: 10px; padding: 1rem 1.5rem; box-shadow: 0 10px 30px rgba(0,0,0,0.45); border: 1px solid rgba(255,255,255,0.08);">
                <span style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.75rem; color: #D1D5DB; font-weight: 500; margin-bottom: 0.35rem;">
                    Trusted Customers Worldwide
                </span>
                <div style="display: flex; align-items: center; gap: 1.25rem;">
                    <span style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 2.25rem; font-weight: 800; color: #FFFFFF; line-height: 1;">
                        12+
                    </span>
                    <!-- Overlapping Flag Circles (US, FR, DE, NL, +8) -->
                    <div style="display: flex; align-items: center;">
                        <!-- USA Flag Circle -->
                        <div style="width: 28px; height: 28px; border-radius: 50%; border: 2px solid #0E110A; overflow: hidden; background: #002868; display: flex; align-items: center; justify-content: center; z-index: 5;">
                            <svg viewBox="0 0 32 32" width="28" height="28">
                                <rect width="32" height="32" fill="#bf0a30" />
                                <rect y="4.6" width="32" height="4.6" fill="#fff" />
                                <rect y="13.8" width="32" height="4.6" fill="#fff" />
                                <rect y="23" width="32" height="4.6" fill="#fff" />
                                <rect width="14" height="17" fill="#002868" />
                                <circle cx="4" cy="4" r="1" fill="#fff" />
                                <circle cx="10" cy="4" r="1" fill="#fff" />
                                <circle cx="7" cy="8" r="1" fill="#fff" />
                                <circle cx="4" cy="12" r="1" fill="#fff" />
                                <circle cx="10" cy="12" r="1" fill="#fff" />
                            </svg>
                        </div>
                        <!-- France Flag Circle -->
                        <div style="width: 28px; height: 28px; border-radius: 50%; border: 2px solid #0E110A; overflow: hidden; margin-left: -8px; z-index: 4;">
                            <svg viewBox="0 0 32 32" width="28" height="28">
                                <rect width="10.6" height="32" fill="#002395" />
                                <rect x="10.6" width="10.6" height="32" fill="#fff" />
                                <rect x="21.2" width="10.8" height="32" fill="#ed2939" />
                            </svg>
                        </div>
                        <!-- Germany Flag Circle -->
                        <div style="width: 28px; height: 28px; border-radius: 50%; border: 2px solid #0E110A; overflow: hidden; margin-left: -8px; z-index: 3;">
                            <svg viewBox="0 0 32 32" width="28" height="28">
                                <rect width="32" height="10.6" fill="#000" />
                                <rect y="10.6" width="32" height="10.6" fill="#dd0000" />
                                <rect y="21.2" width="32" height="10.8" fill="#ffce00" />
                            </svg>
                        </div>
                        <!-- Netherlands Flag Circle -->
                        <div style="width: 28px; height: 28px; border-radius: 50%; border: 2px solid #0E110A; overflow: hidden; margin-left: -8px; z-index: 2;">
                            <svg viewBox="0 0 32 32" width="28" height="28">
                                <rect width="32" height="10.6" fill="#ae1c28" />
                                <rect y="10.6" width="32" height="10.6" fill="#fff" />
                                <rect y="21.2" width="32" height="10.8" fill="#21468b" />
                            </svg>
                        </div>
                        <!-- +8 Pill -->
                        <div style="width: 28px; height: 28px; border-radius: 50%; border: 2px solid #0E110A; background: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.6875rem; font-weight: 700; display: flex; align-items: center; justify-content: center; margin-left: -8px; z-index: 1;">
                            8+
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 2. About Us Section (Sage Green Canvas with Orchid Watermark) -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 6rem 0;">
    <div class="gv-container">
        <div style="display: grid; grid-template-columns: 1fr; gap: 3.5rem; align-items: center;" class="gv-grid-split-about">

            <!-- Left Column: High-Res Rustic Photo -->
            <div>
                <img src="<?php echo esc_url($img_dir . 'About Us Image.png'); ?>"
                    alt="Grand Vanilla Indonesia Rustic Vanilla Curing"
                    style="width: 100%; height: auto; max-height: 540px; object-fit: cover; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.06); display: block;">
            </div>

            <!-- Right Column: Content + Watermark + 2x2 Feature Boxes -->
            <div style="position: relative;">
                <!-- Subtle Orchid Flower Watermark -->
                <img src="<?php echo esc_url($img_dir . 'Logo.png'); ?>"
                    alt=""
                    aria-hidden="true"
                    style="position: absolute; top: -30px; right: -15px; width: 190px; height: auto; opacity: 0.15; pointer-events: none; z-index: 0; transform: rotate(15deg);">

                <div style="position: relative; z-index: 1;">
                    <!-- Section Tag -->
                    <div style="display: flex; align-items: center; gap: 0.75rem; color: #363E19; font-size: 0.9375rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.75rem;">
                        <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                        About Us
                    </div>

                    <!-- Heading -->
                    <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 700; color: #363E19; line-height: 1.2; margin-bottom: 1.5rem;">
                        Grand Vanilla Indonesia
                    </h2>

                    <!-- Paragraphs -->
                    <p style="font-size: 0.9375rem; line-height: 1.7; color: #4A5239; margin-bottom: 1rem;">
                        Grand Vanilla Indonesia is an Indonesian vanilla supplier and exporter providing high-quality vanilla products for international buyers. We connect buyers with trusted sources of Indonesian vanilla, with a strong focus on product quality, consistent supply, and reliable service for wholesale and export needs.
                    </p>
                    <p style="font-size: 0.9375rem; line-height: 1.7; color: #4A5239; margin-bottom: 2rem;">
                        Grand Vanilla Indonesia is an Indonesian vanilla supplier and exporter providing high-quality vanilla products for international buyers. We connect buyers with trusted sources of Indonesian vanilla, with a strong focus on product quality, consistent supply, and reliable service for wholesale and export needs.
                    </p>

                    <!-- 4 Solid Dark Khaki Feature Boxes (2x2 Grid) -->
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.85rem; margin-bottom: 2.25rem;">
                        <div style="background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.8125rem; font-weight: 600; padding: 0.85rem 1rem; border-radius: 4px; text-align: center;">
                            Premium Product Quality
                        </div>
                        <div style="background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.8125rem; font-weight: 600; padding: 0.85rem 1rem; border-radius: 4px; text-align: center;">
                            Consistent Global Supply
                        </div>
                        <div style="background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.8125rem; font-weight: 600; padding: 0.85rem 1rem; border-radius: 4px; text-align: center;">
                            Reliable Business Service
                        </div>
                        <div style="background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.8125rem; font-weight: 600; padding: 0.85rem 1rem; border-radius: 4px; text-align: center;">
                            Flexible Custom Solutions
                        </div>
                    </div>

                    <!-- Learn More CTA -->
                    <a href="<?php echo esc_url(home_url('/about/')); ?>"
                        style="display: inline-flex; align-items: center; gap: 0.5rem; border: 1px solid #363E19; color: #363E19; background: transparent; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.875rem; font-weight: 600; padding: 0.75rem 2rem; border-radius: 4px; text-decoration: none; transition: all 0.2s ease;">
                        Learn More &rarr;
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 3. Premium Products Section (Exact Figma UI/UX Alignment) -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 6rem 0; border-top: 1px solid rgba(0,0,0,0.04);">
    <div class="gv-container">

        <!-- Header Split -->
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 3.5rem; gap: 2rem; flex-wrap: wrap;">
            <div>
                <div style="display: flex; align-items: center; gap: 0.75rem; color: #363E19; font-size: 0.875rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.5rem;">
                    <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                    Products
                </div>
                <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2.25rem, 3.8vw, 3rem); font-weight: 700; color: #363E19; line-height: 1.15; margin: 0;">
                    Premium Indonesian<br>Vanilla Products
                </h2>
            </div>
            <div style="max-width: 440px;">
                <p style="font-size: 0.9375rem; line-height: 1.6; color: #716F6E; margin: 0;">
                    Explore our range of quality Indonesian vanilla products, carefully sourced and prepared to meet the needs of global B2B buyers.
                </p>
            </div>
        </div>

        <!-- 3 Product Cards Grid (Dynamic WP_Query) -->
        <div class="gv-products-cards-grid active-1" id="gvProductsCardsGrid">
            <?php
            $featured_products_query = new WP_Query( array(
                'post_type'      => 'vanilla_product',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
                'orderby'        => 'menu_order date',
                'order'          => 'ASC',
            ) );

            if ( $featured_products_query->have_posts() ) :
                $prod_idx = 0;
                while ( $featured_products_query->have_posts() ) :
                    $featured_products_query->the_post();
                    $prod_idx++;
                    $is_active  = ( $prod_idx === 1 );
                    $card_class = $is_active ? 'is-active' : 'is-collapsed';
                    $prod_img   = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : $img_dir . 'Product Unggulan ' . $prod_idx . '.png';
                    ?>
                    <!-- Card <?php echo esc_attr( $prod_idx ); ?>: <?php the_title(); ?> -->
                    <div class="gv-product-card <?php echo esc_attr( $card_class ); ?>" data-card-index="<?php echo esc_attr( $prod_idx ); ?>">
                        <!-- Badge #<?php echo esc_attr( $prod_idx ); ?> -->
                        <div class="gv-card-badge">
                            #<?php echo esc_html( $prod_idx ); ?>
                        </div>

                        <!-- Product Image -->
                        <div class="gv-card-img-wrap">
                            <img src="<?php echo esc_url( $prod_img ); ?>"
                                alt="<?php echo esc_attr( get_the_title() ); ?>"
                                class="gv-card-img">
                        </div>

                        <!-- Product Content & Actions -->
                        <div class="gv-card-bottom">
                            <div class="gv-card-text">
                                <h3 class="gv-card-title">
                                    <?php the_title(); ?>
                                </h3>
                                <p class="gv-card-desc">
                                    <?php echo esc_html( get_the_excerpt() ); ?>
                                </p>
                            </div>
                            <!-- Actions Slot (Cross-fade between Detail and Arrow) -->
                            <div class="gv-card-actions-slot">
                                <a href="<?php the_permalink(); ?>"
                                    class="gv-card-btn-detail">
                                    Detail &rarr;
                                </a>
                                <button type="button"
                                    class="gv-card-btn-arrow"
                                    aria-label="Expand <?php echo esc_attr( get_the_title() ); ?>">
                                    &rarr;
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <!-- Script for Interactive Products Carousel / Card Expansion & Dynamic Auto-Shift -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const grid = document.getElementById('gvProductsCardsGrid');
                if (!grid) return;
                const cards = grid.querySelectorAll('.gv-product-card');

                function activateCard(card) {
                    const idx = card.getAttribute('data-card-index');
                    if (!idx) return;

                    if (grid.classList.contains('active-' + idx)) {
                        return;
                    }

                    // Switch active class on grid dynamically
                    grid.className = grid.className.replace(/\bactive-\d+\b/g, '').trim() + ' active-' + idx;

                    // Switch active and collapsed states on cards
                    cards.forEach(function(c) {
                        if (c === card) {
                            c.classList.add('is-active');
                            c.classList.remove('is-collapsed');
                        } else {
                            c.classList.remove('is-active');
                            c.classList.add('is-collapsed');
                        }
                    });
                }

                cards.forEach(function(card) {
                    card.addEventListener('click', function(e) {
                        // If clicking the active 'Detail →' link, allow normal navigation
                        if (e.target.closest('.gv-card-btn-detail')) {
                            return;
                        }

                        activateCard(card);
                    });
                });
            });
        </script>

        <!-- View All Products CTA Button -->
        <div style="text-align: center;">
            <a href="<?php echo esc_url(home_url('/products/')); ?>"
                style="display: inline-flex; align-items: center; gap: 0.65rem; background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.875rem; font-weight: 600; padding: 0.85rem 2.25rem; border-radius: 2px; text-decoration: none; box-shadow: 0 4px 12px rgba(54,62,25,0.15); transition: all 0.2s ease;">
                View All Products &rarr;
            </a>
        </div>

    </div>
</section>

<!-- 4. Value Propositions (4 White Cards with Exact SVG Icons - NO EMOJIS) -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 6rem 0; border-top: 1px solid rgba(0,0,0,0.04);">
    <div class="gv-container">

        <div style="text-align: center; max-width: 700px; margin: 0 auto 4rem;">
            <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 700; color: #363E19; line-height: 1.2; margin-bottom: 0.75rem;">
                Your Trusted Partner For Quality<br>Indonesian Vanilla
            </h2>
            <p style="font-size: 0.9375rem; color: #4A5239; line-height: 1.6; margin: 0;">
                At Grand Vanilla Indonesia, we go beyond supplying vanilla. We connect international B2B buyers with quality Indonesian vanilla.
            </p>
        </div>

        <!-- 4 White Cards Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem;">

            <!-- Card 1: Quality Focused -->
            <div style="background: #FAF8F5; border-radius: 12px; padding: 2.5rem 1.5rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Shield SVG Icon -->
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2L4 5v6.09c0 5.05 3.41 9.76 8 10.91 4.59-1.15 8-5.86 8-10.91V5l-8-3z" />
                    </svg>
                </div>
                <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                    Quality Focused
                </h3>
                <p style="font-size: 0.8125rem; line-height: 1.6; color: #4A5239; margin: 0;">
                    We maintain product quality to meet international standards and diverse industry requirements.
                </p>
            </div>

            <!-- Card 2: Consistent Supply -->
            <div style="background: #FAF8F5; border-radius: 12px; padding: 2.5rem 1.5rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Package / Box SVG Icon -->
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M21 16.5l-9 5.2-9-5.2V7.5L12 2.3l9 5.2v9zM12 4.1L5.3 8 12 11.9 18.7 8 12 4.1zm-7 5.6v7.4l6.5 3.7v-7.4L5 9.7zm8 11.1l6.5-3.7V9.7L13 13.4v7.4z" />
                    </svg>
                </div>
                <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                    Consistent Supply
                </h3>
                <p style="font-size: 0.8125rem; line-height: 1.6; color: #4A5239; margin: 0;">
                    We provide reliable vanilla supply for wholesale, bulk, and ongoing business needs.
                </p>
            </div>

            <!-- Card 3: Indonesian Origin -->
            <div style="background: #FAF8F5; border-radius: 12px; padding: 2.5rem 1.5rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Folded Map SVG Icon -->
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM15 19l-6-2.11V5l6 2.11V19z" />
                    </svg>
                </div>
                <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                    Indonesian Origin
                </h3>
                <p style="font-size: 0.8125rem; line-height: 1.6; color: #4A5239; margin: 0;">
                    We connect global buyers with quality Indonesian vanilla known for its rich aroma and flavor.
                </p>
            </div>

            <!-- Card 4: Reliable Service -->
            <div style="background: #FAF8F5; border-radius: 12px; padding: 2.5rem 1.5rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Headset Support SVG Icon -->
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 1a9 9 0 0 0-9 9v7c0 1.66 1.34 3 3 3h3v-8H5v-2c0-3.87 3.13-7 7-7s7 3.13 7 7v2h-4v8h3c1.66 0 3-1.34 3-3v-7a9 9 0 0 0-9-9z" />
                    </svg>
                </div>
                <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                    Reliable Service
                </h3>
                <p style="font-size: 0.8125rem; line-height: 1.6; color: #4A5239; margin: 0;">
                    We provide responsive support for international buyers and their sourcing needs.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- 5. Flexible Vanilla Supply & Special OEM Section -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 6rem 0; border-top: 1px solid rgba(0,0,0,0.04);">
    <div class="gv-container">

        <div style="display: grid; grid-template-columns: 1fr; gap: 4rem; align-items: center;" class="gv-grid-split-oem">

            <!-- Left Column: Title + Bulk Packaging Photo -->
            <div>
                <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 700; color: #363E19; line-height: 1.2; margin-bottom: 2rem;">
                    Flexible Vanilla Supply<br>For Your Business
                </h2>
                <img src="<?php echo esc_url($img_dir . 'Bulk  Wholesale Vanilla 1.png'); ?>"
                    alt="Grand Vanilla Indonesia Bulk Export Packaging"
                    style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 10px 30px rgba(0,0,0,0.06);">
            </div>

            <!-- Right Column: Subtitle + OEM Content Block -->
            <div>
                <p style="font-size: 0.9375rem; line-height: 1.6; color: #4A5239; margin-bottom: 2.5rem;">
                    From high-volume wholesale supply to customized vanilla solutions, we provide flexible products and services designed to meet the needs of international buyers and business partners.
                </p>

                <div>
                    <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(1.75rem, 2.5vw, 2.25rem); font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                        Special OEM & Bulk Vanilla
                    </h3>
                    <p style="font-size: 0.9375rem; line-height: 1.6; color: #4A5239; margin-bottom: 2rem;">
                        Vanilla products supplied in larger quantities to support wholesalers, distributors, manufacturers, and businesses with ongoing or high-volume requirements.
                    </p>

                    <!-- 4 Feature Points (2x2 Grid) -->
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.75rem 1.5rem;">
                        <div>
                            <h4 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.35rem;">
                                High-Volume Supply
                            </h4>
                            <p style="font-size: 0.8125rem; line-height: 1.5; color: #555; margin: 0;">
                                Supporting larger orders for wholesalers, distributors, and manufacturers.
                            </p>
                        </div>
                        <div>
                            <h4 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.35rem;">
                                Consistent Quality
                            </h4>
                            <p style="font-size: 0.8125rem; line-height: 1.5; color: #555; margin: 0;">
                                Carefully sourced vanilla with quality standards maintained across orders.
                            </p>
                        </div>
                        <div>
                            <h4 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.35rem;">
                                Custom Packaging
                            </h4>
                            <p style="font-size: 0.8125rem; line-height: 1.5; color: #555; margin: 0;">
                                Packaging options can be adapted to your product, branding, and requirements.
                            </p>
                        </div>
                        <div>
                            <h4 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.35rem;">
                                Flexible Quantities
                            </h4>
                            <p style="font-size: 0.8125rem; line-height: 1.5; color: #555; margin: 0;">
                                Order volumes can be adjusted based on your production and business needs.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- 6. From Indonesia To Global Markets (Exact Figma High-Fidelity Showcase) -->
<section class="gv-section" style="background-color: #363E19; color: #FFFFFF; padding: 6.5rem 0;">
    <div class="gv-container">

        <!-- Header Split: Left Title, Right Subtitle -->
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 4.5rem; gap: 2rem; flex-wrap: wrap;">
            <div>
                <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2.25rem, 4vw, 3rem); font-weight: 700; color: #FFFFFF; line-height: 1.15; margin: 0;">
                    From Indonesia To<br>Global Markets
                </h2>
            </div>
            <div style="max-width: 440px;">
                <p style="font-size: 0.9375rem; line-height: 1.6; color: rgba(255,255,255,0.85); margin: 0; text-align: left;">
                    We connect international B2B buyers with quality Indonesian vanilla, providing reliable wholesale and export solutions for businesses across global markets.
                </p>
            </div>
        </div>

        <!-- Connecting Indonesia To The World Map -->
        <div style="text-align: center; margin-bottom: 5rem;">
            <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(1.5rem, 2.5vw, 1.875rem); font-weight: 400; font-style: italic; color: #FFFFFF; margin-bottom: 2.5rem; letter-spacing: 0.02em;">
                Connecting Indonesia To The World
            </h3>

            <div style="max-width: 980px; margin: 0 auto;">
                <img src="<?php echo esc_url($img_dir . 'Worldwide maps.png'); ?>"
                    alt="Grand Vanilla Indonesia Worldwide Export Routes Map"
                    style="width: 100%; height: auto; display: block; filter: drop-shadow(0 10px 25px rgba(0,0,0,0.3));">
            </div>
        </div>
        <!-- Who We Serve In Global B2B Markets (Exact Figma 3x2 Grid) -->
        <div style="margin-top: 2.5rem;">
            <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(1.6rem, 2.6vw, 1.95rem); font-weight: 600; font-style: italic; color: #FFFFFF; text-align: center; margin-bottom: 2.5rem; letter-spacing: 0.02em;">
                Who We Serve In Global B2B Markets
            </h3>

            <!-- 6 Grid Cards (Strictly 3 Columns x 2 Rows on Desktop) -->
            <div class="gv-who-we-serve-grid">

                <!-- Card 1: IMPORTERS -->
                <div class="gv-who-we-serve-card">
                    <div class="gv-who-we-serve-icon">
                        <!-- Globe Icon -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                    </div>
                    <span class="gv-who-we-serve-label">
                        IMPORTERS
                    </span>
                </div>

                <!-- Card 2: DISTRIBUTORS -->
                <div class="gv-who-we-serve-card">
                    <div class="gv-who-we-serve-icon">
                        <!-- Truck Icon -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="1" y="3" width="15" height="13" rx="2"></rect>
                            <polygon points="16 8 20 8 23 11 23 16 16 16 8"></polygon>
                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                        </svg>
                    </div>
                    <span class="gv-who-we-serve-label">
                        DISTRIBUTORS
                    </span>
                </div>

                <!-- Card 3: FOOD MANUFACTURERS -->
                <div class="gv-who-we-serve-card">
                    <div class="gv-who-we-serve-icon">
                        <!-- Factory Icon -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 20h20"></path>
                            <path d="M5 20V10l5 3V9l5 3V5l5 3v12"></path>
                        </svg>
                    </div>
                    <span class="gv-who-we-serve-label">
                        FOOD MANUFACTURERS
                    </span>
                </div>

                <!-- Card 4: SPICE TRADERS -->
                <div class="gv-who-we-serve-card">
                    <div class="gv-who-we-serve-icon">
                        <!-- Spice / Bean Pod Icon -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 18l-3 3"></path>
                            <path d="M17.5 4.5c-3 0-6.5 3-8.5 7.5l-2.5 2.5 3 3 2.5-2.5c4.5-2 7.5-5.5 7.5-8.5a2 2 0 0 0-2-2z"></path>
                        </svg>
                    </div>
                    <span class="gv-who-we-serve-label">
                        SPICE TRADERS
                    </span>
                </div>

                <!-- Card 5: BAKERIES -->
                <div class="gv-who-we-serve-card">
                    <div class="gv-who-we-serve-icon">
                        <!-- Bakery Croissant / Bread Icon -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 14c2-4 7-6 9-6s7 2 9 6c-2 2-5 3-9 3s-7-1-9-3z"></path>
                            <path d="M8 12c1.5-1.5 6.5-1.5 8 0"></path>
                        </svg>
                    </div>
                    <span class="gv-who-we-serve-label">
                        BAKERIES
                    </span>
                </div>

                <!-- Card 6: CONFECTIONERY COMPANIES -->
                <div class="gv-who-we-serve-card">
                    <div class="gv-who-we-serve-icon">
                        <!-- Confectionery / Sweets Icon -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="9"></circle>
                            <circle cx="12" cy="8.5" r="1.5" fill="currentColor"></circle>
                            <circle cx="8.5" cy="14" r="1.5" fill="currentColor"></circle>
                            <circle cx="15.5" cy="14" r="1.5" fill="currentColor"></circle>
                            <circle cx="12" cy="12" r="1" fill="currentColor"></circle>
                        </svg>
                    </div>
                    <span class="gv-who-we-serve-label">
                        CONFECTIONERY COMPANIES
                    </span>
                </div>

            </div>
        </div>

        <style>
        .gv-who-we-serve-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.25rem;
            max-width: 1040px;
            margin: 0 auto;
        }
        .gv-who-we-serve-card {
            border: 1px solid rgba(255, 255, 255, 0.22);
            border-radius: 8px;
            padding: 1.2rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1.25rem;
            background: rgba(255, 255, 255, 0.02);
            transition: all 0.25s ease;
        }
        .gv-who-we-serve-card:hover {
            border-color: rgba(255, 255, 255, 0.45);
            background: rgba(255, 255, 255, 0.05);
            transform: translateY(-2px);
        }
        .gv-who-we-serve-icon {
            width: 44px;
            height: 44px;
            border: 1px solid rgba(255, 255, 255, 0.28);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #FFFFFF;
            transition: all 0.25s ease;
        }
        .gv-who-we-serve-card:hover .gv-who-we-serve-icon {
            border-color: rgba(255, 255, 255, 0.6);
            color: #E8D3A2;
        }
        .gv-who-we-serve-label {
            font-family: var(--font-heading, 'Jost', sans-serif);
            font-size: 0.875rem;
            font-weight: 700;
            color: #FFFFFF;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }
        @media (max-width: 991px) {
            .gv-who-we-serve-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 600px) {
            .gv-who-we-serve-grid {
                grid-template-columns: 1fr;
            }
        }
        </style>

    </div>
</section>

<!-- 7. Gallery Section (Exact Figma Carousel Slider) -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 6rem 0; border-top: 1px solid rgba(0,0,0,0.04); overflow: hidden;">
    <div class="gv-container">

        <!-- Header Split (Left Title, Right Description) -->
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 3.5rem; gap: 2rem; flex-wrap: wrap;">
            <div>
                <div style="display: flex; align-items: center; gap: 0.75rem; color: #363E19; font-size: 0.875rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.5rem;">
                    <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                    Gallery
                </div>
                <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2.25rem, 3.8vw, 3rem); font-weight: 700; color: #363E19; line-height: 1.15; margin: 0;">
                    A Closer Look At<br>Grand Vanilla
                </h2>
            </div>
            <div style="max-width: 440px;">
                <p style="font-size: 0.9375rem; line-height: 1.6; color: #716F6E; margin: 0;">
                    Explore the people, products, sourcing, and processes behind our Indonesian vanilla
                </p>
            </div>
        </div>

    </div><!-- .gv-container -->

    <!-- Infinite Seamless Horizontal Carousel Track (Dynamic WP_Query) -->
    <div class="gv-gallery-carousel-viewport" style="width: 100%; overflow: hidden; padding: 0.5rem 0 3.5rem; position: relative;">
        <div class="gv-gallery-carousel-track">
            <?php
            $gallery_query = new WP_Query( array(
                'post_type'      => 'vanilla_gallery',
                'posts_per_page' => 8,
                'post_status'    => 'publish',
                'orderby'        => 'menu_order date',
                'order'          => 'ASC',
            ) );

            $gallery_carousel_dynamic = array();
            if ( $gallery_query->have_posts() ) {
                while ( $gallery_query->have_posts() ) {
                    $gallery_query->the_post();
                    $terms = get_the_terms( get_the_ID(), 'gallery_category' );
                    $tag   = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'Vanilla';
                    $gallery_carousel_dynamic[] = array(
                        'img'      => has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : $img_dir . 'Gallery Example Carroussel 1.png',
                        'tag'      => $tag,
                        'title'    => 'Vanilla Collection',
                        'subtitle' => get_the_title(),
                    );
                }
                wp_reset_postdata();
            }

            // Output 2 identical sets of cards for seamless infinite looping
            for ($set = 0; $set < 2; $set++) :
                foreach ($gallery_carousel_dynamic as $item) :
            ?>
                    <div class="gv-gallery-card" style="flex: 0 0 290px; width: 290px; background: #FAF8F5; border-radius: 0; overflow: hidden; box-shadow: 0 4px 16px rgba(0,0,0,0.03); display: flex; flex-direction: column;">
                        <!-- Card Image -->
                        <div style="height: 310px; width: 100%; overflow: hidden;">
                            <img src="<?php echo esc_url($item['img']); ?>"
                                alt="<?php echo esc_attr($item['title'] . ' - ' . $item['subtitle']); ?>"
                                style="width: 100%; height: 100%; object-fit: cover; display: block;">
                        </div>
                        <!-- Card Content -->
                        <div style="padding: 1.35rem 1.5rem 1.5rem; background: #FAF8F5; display: flex; flex-direction: column;">
                            <div style="display: flex; align-items: center; gap: 0.6rem; color: #363E19; font-size: 0.75rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.35rem;">
                                <span style="display: inline-block; width: 18px; height: 1.5px; background: #363E19;"></span>
                                <?php echo esc_html($item['tag']); ?>
                            </div>
                            <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin: 0 0 0.25rem 0; line-height: 1.3;">
                                <?php echo esc_html($item['title']); ?>
                            </h3>
                            <p style="font-size: 0.8125rem; color: #716F6E; margin: 0; line-height: 1.4;">
                                <?php echo esc_html($item['subtitle']); ?>
                            </p>
                        </div>
                    </div>
            <?php
                endforeach;
            endfor;
            ?>
        </div>
    </div>

    <div class="gv-container">
        <!-- View All Gallery Button -->
        <div style="text-align: center;">
            <a href="<?php echo esc_url(home_url('/gallery/')); ?>"
                style="display: inline-flex; align-items: center; gap: 0.65rem; background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.875rem; font-weight: 600; padding: 0.85rem 2.25rem; border-radius: 2px; text-decoration: none; box-shadow: 0 4px 12px rgba(54,62,25,0.15); transition: all 0.2s ease;">
                View All Gallery &rarr;
            </a>
        </div>
    </div>
</section>

<!-- 8. Insights Section (Blog Teaser - Exact Figma UI/UX Static Layout) -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 6.5rem 0; border-top: 1px solid rgba(0,0,0,0.04);">
    <div class="gv-container">

        <!-- Header Split (Left Tag & Title, Right Description) -->
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 4rem; gap: 2rem; flex-wrap: wrap;">
            <div>
                <div style="display: flex; align-items: center; gap: 0.75rem; color: #363E19; font-size: 0.875rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.5rem;">
                    <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                    Blog
                </div>
                <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2.25rem, 3.8vw, 3rem); font-weight: 700; color: #363E19; line-height: 1.15; margin: 0;">
                    Insights From The World<br>Of Vanilla
                </h2>
            </div>
            <div style="max-width: 440px;">
                <p style="font-size: 0.9375rem; line-height: 1.6; color: #716F6E; margin: 0;">
                    Discover insights on Indonesian vanilla, sourcing, quality, industry trends, and applications.
                </p>
            </div>
        </div>

        <!-- 2 Clean Articles Stack (Dynamic WP_Query) -->
        <div style="display: flex; flex-direction: column; gap: 4.5rem; margin-bottom: 4rem;">
            <?php
            $hp_blog_query = new WP_Query( array(
                'post_type'      => 'post',
                'posts_per_page' => 2,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC',
            ) );
            $hp_total_posts = wp_count_posts( 'post' )->publish;

            if ( $hp_blog_query->have_posts() ) :
                $b_idx = 0;
                while ( $hp_blog_query->have_posts() ) :
                    $hp_blog_query->the_post();
                    $badge_num = str_pad( max( 1, $hp_total_posts - $b_idx ), 2, '0', STR_PAD_LEFT );
                    $badge_tot = str_pad( $hp_total_posts, 2, '0', STR_PAD_LEFT );
                    $badge_str = $badge_num . '/' . $badge_tot;

                    $post_thumb = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : $img_dir . 'Buat Blog Example 1.png';
                    $post_cats  = get_the_category();
                    $cat_label  = ! empty( $post_cats ) ? $post_cats[0]->name : 'Vanilla Guide';
                    $b_idx++;
                    ?>
                    <!-- Article <?php echo esc_attr( $b_idx ); ?>: <?php echo esc_html( $badge_str ); ?> -->
                    <div class="gv-blog-article-row" style="display: grid; grid-template-columns: 1fr 1.25fr; gap: 4rem; align-items: center;">
                        <!-- Left Column: Big Number & Photo -->
                        <div style="position: relative; width: 100%;">
                            <div style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(3.75rem, 5.5vw, 4.75rem); font-weight: 700; color: #BAC4B5; line-height: 0.9; margin-bottom: -1rem; position: relative; z-index: 1; letter-spacing: -0.02em; user-select: none;">
                                <?php echo esc_html( $badge_str ); ?>
                            </div>
                            <div style="position: relative; z-index: 2; border-radius: 0; overflow: hidden; aspect-ratio: 16 / 10; width: 100%; box-shadow: 0 4px 16px rgba(0,0,0,0.04);">
                                <img src="<?php echo esc_url( $post_thumb ); ?>"
                                    alt="<?php echo esc_attr( get_the_title() ); ?>"
                                    style="width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; border-radius: 0;">
                            </div>
                        </div>

                        <!-- Right Column: Details & Underline Link -->
                        <div style="display: flex; flex-direction: column; justify-content: center;">
                            <div style="display: flex; align-items: center; gap: 0.65rem; color: #363E19; font-size: 0.8125rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.65rem;">
                                <span style="display: inline-block; width: 22px; height: 1.5px; background: #363E19;"></span>
                                <?php echo esc_html( $cat_label ); ?>
                            </div>
                            <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(1.5rem, 2.2vw, 1.875rem); font-weight: 700; color: #363E19; margin: 0 0 0.85rem 0; line-height: 1.25;">
                                <a href="<?php the_permalink(); ?>" style="color: #363E19; text-decoration: none; transition: opacity 0.2s ease;">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <p style="font-size: 0.9375rem; color: #716F6E; line-height: 1.65; margin: 0 0 1.5rem 0; max-width: 520px;">
                                <?php echo esc_html( get_the_excerpt() ); ?>
                            </p>
                            <div>
                                <a href="<?php the_permalink(); ?>"
                                    style="display: inline-flex; align-items: center; gap: 0.4rem; color: #363E19; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.875rem; font-weight: 600; text-decoration: underline; text-underline-offset: 4px; transition: color 0.2s ease;">
                                    Continue Reading &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <!-- View All Blog Button -->
        <div style="text-align: center;">
            <a href="<?php echo esc_url(home_url('/articles/')); ?>"
                style="display: inline-flex; align-items: center; gap: 0.65rem; background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.875rem; font-weight: 600; padding: 0.85rem 2.25rem; border-radius: 2px; text-decoration: none; box-shadow: 0 4px 12px rgba(54,62,25,0.15); transition: all 0.2s ease;">
                View All Blog &rarr;
            </a>
        </div>

    </div>
</section>

<!-- 9. CTA Banner (High-Fidelity Figma Component) -->
<?php
get_template_part('template-parts/cta-banner', null, array(
    'title'    => 'Ready To Get Your Vanilla<br>Supply Started?',
    'btn_text' => 'Get a Sample',
    'btn_url'  => home_url('/contact/'),
));
?>

<style>
    /* Product Cards Layout (Exact UI/UX Reference Match: #1 Large, #2 & #3 Compact, 12px Radius, 480px Height) */
    .gv-products-cards-grid {
        display: flex;
        gap: 1rem;
        margin-bottom: 3.5rem;
        align-items: stretch;
        width: 100%;
    }

    .gv-product-card {
        background-color: #BDC4B8;
        border-radius: 12px;
        padding: 1.35rem 1.35rem 1.35rem;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        position: relative;
        overflow: hidden;
        min-width: 0;
        height: 400px;
        box-sizing: border-box;
        transition: flex 0.6s cubic-bezier(0.16, 1, 0.3, 1), background-color 0.35s ease, padding 0.4s ease;
        will-change: flex;
    }

    .gv-card-badge {
        position: absolute;
        top: 1.25rem;
        left: 1.25rem;
        background-color: #363E19;
        color: #FFFFFF;
        font-family: var(--font-heading, 'Jost', sans-serif);
        font-size: 0.8125rem;
        font-weight: 700;
        width: 32px;
        height: 32px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 3;
        line-height: 1;
        user-select: none;
    }

    @media (min-width: 992px) {
        .gv-product-card.is-active {
            flex: 1.95 1 0px !important;
            cursor: default;
            padding: 1.5rem 1.6rem 1.35rem;
        }

        .gv-product-card.is-collapsed {
            flex: 1 1 0px !important;
            cursor: pointer;
            padding: 1.4rem 1.25rem 1.35rem;
        }

        .gv-product-card.is-collapsed:hover {
            background-color: #B5BCB0;
        }
    }

    /* Product Image Containers */
    .gv-card-img-wrap {
        flex: 1 1 auto;
        min-height: 0;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        margin-top: auto;
        margin-bottom: 0.75rem;
        width: 100%;
        overflow: visible;
    }

    .gv-card-img {
        width: auto;
        height: auto;
        object-fit: contain;
        filter: drop-shadow(0 8px 18px rgba(0,0,0,0.07));
        transition: transform 0.4s ease;
    }

    .gv-product-card.is-active .gv-card-img {
        max-height: 225px;
        max-width: 95%;
    }

    .gv-product-card.is-collapsed .gv-card-img {
        max-height: 200px;
        max-width: 96%;
    }

    /* Bottom Content Area (Title, Desc & Buttons) */
    .gv-card-bottom {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 0.85rem;
        width: 100%;
        flex-shrink: 0;
    }

    .gv-card-text {
        flex: 1 1 auto;
        min-width: 0;
    }

    .gv-card-title {
        font-family: var(--font-heading, 'Jost', sans-serif);
        font-weight: 700;
        color: #363E19;
        margin: 0 0 0.35rem 0;
        line-height: 1.2;
    }

    .gv-product-card.is-active .gv-card-title {
        font-size: clamp(1.4rem, 1.7vw, 1.55rem);
    }

    .gv-product-card.is-collapsed .gv-card-title {
        font-size: 1.28rem;
        white-space: nowrap;
    }

    .gv-card-desc {
        color: #4A5239;
        margin: 0;
    }

    .gv-product-card.is-active .gv-card-desc {
        font-size: 0.8125rem;
        line-height: 1.45;
        max-width: 290px;
    }

    .gv-product-card.is-collapsed .gv-card-desc {
        font-size: 0.775rem;
        line-height: 1.38;
        max-width: 175px;
    }

    /* Cross-fade Action Buttons (Zero Layout Jumps) */
    .gv-card-actions-slot {
        position: relative;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        flex-shrink: 0;
        transition: width 0.35s cubic-bezier(0.16, 1, 0.3, 1), min-width 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .gv-product-card.is-collapsed .gv-card-actions-slot {
        min-width: 36px;
        width: 36px;
    }

    .gv-product-card.is-active .gv-card-actions-slot {
        min-width: 105px;
        width: 105px;
    }

    .gv-card-btn-detail {
        position: absolute;
        right: 0;
        opacity: 0;
        visibility: hidden;
        transform: translate3d(8px, 0, 0);
        transition: opacity 0.3s cubic-bezier(0.16, 1, 0.3, 1), transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.3s, background-color 0.2s ease, color 0.2s ease;
        pointer-events: none;
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        border: 1px solid #363E19;
        color: #363E19;
        background: transparent !important;
        font-family: var(--font-heading, 'Jost', sans-serif);
        font-size: 0.8125rem;
        font-weight: 600;
        padding: 0.55rem 1.25rem;
        border-radius: 2px;
        text-decoration: none;
        white-space: nowrap;
    }

    .gv-card-btn-arrow {
        position: absolute;
        right: 0;
        opacity: 1;
        visibility: visible;
        transform: translate3d(0, 0, 0);
        transition: opacity 0.3s cubic-bezier(0.16, 1, 0.3, 1), transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.3s, background-color 0.2s ease, color 0.2s ease;
        pointer-events: auto;
        width: 36px;
        height: 36px;
        border: 1px solid #363E19;
        color: #363E19;
        background: transparent !important;
        border-radius: 2px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.05rem;
        line-height: 1;
    }

    .gv-product-card.is-active .gv-card-btn-detail {
        opacity: 1;
        visibility: visible;
        transform: translate3d(0, 0, 0);
        pointer-events: auto;
    }

    .gv-product-card.is-active .gv-card-btn-arrow {
        opacity: 0;
        visibility: hidden;
        transform: translate3d(-8px, 0, 0);
        pointer-events: none;
    }

    .gv-card-btn-detail:hover {
        background-color: #363E19 !important;
        color: #FFFFFF !important;
    }

    .gv-card-btn-arrow:hover {
        background-color: #363E19 !important;
        color: #FFFFFF !important;
    }

    @media (min-width: 900px) {
        .gv-grid-split-about {
            grid-template-columns: 1fr 1.15fr !important;
        }

        .gv-grid-split-oem {
            grid-template-columns: 1fr 1.25fr !important;
        }

        .gv-blog-card-split {
            grid-template-columns: 320px 1fr !important;
        }
    }

    @media (max-width: 991px) {
        .gv-products-cards-grid {
            flex-direction: column !important;
            gap: 2rem !important;
        }

        .gv-product-card {
            height: auto !important;
            min-height: 380px !important;
            flex: 1 1 auto !important;
            padding: 2rem 1.5rem 2.25rem !important;
        }

        .gv-card-img-wrap {
            height: 200px !important;
        }

        .gv-product-card .gv-card-actions-slot {
            min-width: 110px !important;
            width: 110px !important;
        }

        .gv-product-card .gv-card-btn-detail {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translate3d(0, 0, 0) !important;
            pointer-events: auto !important;
        }

        .gv-product-card .gv-card-btn-arrow {
            opacity: 0 !important;
            visibility: hidden !important;
            pointer-events: none !important;
        }

        .gv-blog-article-row {
            grid-template-columns: 1fr !important;
            gap: 2rem !important;
        }
    }
</style>

<?php
get_footer();
