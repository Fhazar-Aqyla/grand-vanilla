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
<section class="gv-hero" style="position: relative; min-height: 85vh; background: url('<?php echo esc_url( $img_dir . 'Hero Image.png' ); ?>') center center / cover no-repeat; display: flex; align-items: center; padding: 6rem 0 5rem;">
    <!-- Dark Gradient Overlay for optimal readability -->
    <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0.15) 100%); pointer-events: none;"></div>

    <div class="gv-container" style="position: relative; z-index: 2; width: 100%;">
        <div style="max-width: 680px;">
            
            <!-- Main Hero Headline -->
            <h1 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2.5rem, 5vw, 3.85rem); font-weight: 700; color: #FFFFFF; line-height: 1.15; margin-bottom: 1.5rem; letter-spacing: -0.01em;">
                <?php echo esc_html( get_theme_mod( 'grand_vanilla_hero_title', 'Premium Indonesian vanilla, sourced for the global market.' ) ); ?>
            </h1>

            <!-- Subtitle -->
            <p style="font-size: clamp(1rem, 1.5vw, 1.125rem); color: rgba(255,255,255,0.92); line-height: 1.6; margin-bottom: 2.25rem; max-width: 580px;">
                <?php echo esc_html( get_theme_mod( 'grand_vanilla_hero_subtitle', 'We deliver premium Indonesian vanilla with consistent quality, reliable supply, and tailored solutions for global B2B buyers.' ) ); ?>
            </p>

            <!-- Dual Action Buttons -->
            <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 4rem;">
                <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" 
                   style="display: inline-block; background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 600; padding: 0.85rem 2rem; border-radius: 4px; text-decoration: none; box-shadow: 0 4px 14px rgba(0,0,0,0.25); transition: all 0.2s ease;">
                    Explore Products
                </a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" 
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
                                <rect width="32" height="32" fill="#bf0a30"/>
                                <rect y="4.6" width="32" height="4.6" fill="#fff"/>
                                <rect y="13.8" width="32" height="4.6" fill="#fff"/>
                                <rect y="23" width="32" height="4.6" fill="#fff"/>
                                <rect width="14" height="17" fill="#002868"/>
                                <circle cx="4" cy="4" r="1" fill="#fff"/>
                                <circle cx="10" cy="4" r="1" fill="#fff"/>
                                <circle cx="7" cy="8" r="1" fill="#fff"/>
                                <circle cx="4" cy="12" r="1" fill="#fff"/>
                                <circle cx="10" cy="12" r="1" fill="#fff"/>
                            </svg>
                        </div>
                        <!-- France Flag Circle -->
                        <div style="width: 28px; height: 28px; border-radius: 50%; border: 2px solid #0E110A; overflow: hidden; margin-left: -8px; z-index: 4;">
                            <svg viewBox="0 0 32 32" width="28" height="28">
                                <rect width="10.6" height="32" fill="#002395"/>
                                <rect x="10.6" width="10.6" height="32" fill="#fff"/>
                                <rect x="21.2" width="10.8" height="32" fill="#ed2939"/>
                            </svg>
                        </div>
                        <!-- Germany Flag Circle -->
                        <div style="width: 28px; height: 28px; border-radius: 50%; border: 2px solid #0E110A; overflow: hidden; margin-left: -8px; z-index: 3;">
                            <svg viewBox="0 0 32 32" width="28" height="28">
                                <rect width="32" height="10.6" fill="#000"/>
                                <rect y="10.6" width="32" height="10.6" fill="#dd0000"/>
                                <rect y="21.2" width="32" height="10.8" fill="#ffce00"/>
                            </svg>
                        </div>
                        <!-- Netherlands Flag Circle -->
                        <div style="width: 28px; height: 28px; border-radius: 50%; border: 2px solid #0E110A; overflow: hidden; margin-left: -8px; z-index: 2;">
                            <svg viewBox="0 0 32 32" width="28" height="28">
                                <rect width="32" height="10.6" fill="#ae1c28"/>
                                <rect y="10.6" width="32" height="10.6" fill="#fff"/>
                                <rect y="21.2" width="32" height="10.8" fill="#21468b"/>
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
                <img src="<?php echo esc_url( $img_dir . 'About Us Image.png' ); ?>" 
                     alt="Grand Vanilla Indonesia Rustic Vanilla Curing" 
                     style="width: 100%; height: auto; max-height: 540px; object-fit: cover; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.06); display: block;">
            </div>

            <!-- Right Column: Content + Watermark + 2x2 Feature Boxes -->
            <div style="position: relative;">
                <!-- Subtle Orchid Flower Watermark -->
                <img src="<?php echo esc_url( $img_dir . 'Logo.png' ); ?>" 
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
                    <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" 
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

        <!-- 3 Product Cards Grid (Card 1 is wider: 1.8fr 1fr 1fr) -->
        <div class="gv-products-cards-grid" style="display: grid; grid-template-columns: 1.8fr 1fr 1fr; gap: 1.75rem; margin-bottom: 3.5rem; align-items: stretch;">
            
            <!-- Card 1: Vanilla Beans (Wider Card) -->
            <div style="background-color: #BDC4B8; border-radius: 12px; padding: 2rem 2rem 2.25rem; display: flex; flex-direction: column; justify-content: space-between; position: relative;">
                <!-- Badge #1 -->
                <div style="position: absolute; top: 1.5rem; left: 1.5rem; background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.875rem; font-weight: 700; width: 34px; height: 34px; border-radius: 4px; display: flex; align-items: center; justify-content: center; z-index: 2;">
                    #1
                </div>

                <!-- Product Image -->
                <div style="height: 270px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                    <img src="<?php echo esc_url( $img_dir . 'Product Unggulan 1.png' ); ?>" 
                         alt="Vanilla Beans" 
                         style="max-height: 100%; max-width: 100%; width: auto; object-fit: contain; filter: drop-shadow(0 8px 16px rgba(0,0,0,0.06));">
                </div>

                <!-- Product Content & Detail Button -->
                <div style="display: flex; justify-content: space-between; align-items: flex-end; gap: 1.25rem;">
                    <div>
                        <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.5rem; font-weight: 700; color: #363E19; margin: 0 0 0.4rem 0;">
                            Vanilla Beans
                        </h3>
                        <p style="font-size: 0.8125rem; color: #4A5239; margin: 0; line-height: 1.5; max-width: 290px;">
                            Premium vanilla beans with a rich aroma and distinctive flavor.
                        </p>
                    </div>
                    <a href="<?php echo esc_url( home_url( '/products/indonesian-planifolia-vanilla-beans/' ) ); ?>" 
                       style="display: inline-flex; align-items: center; gap: 0.6rem; border: 1px solid #363E19; color: #363E19; background: transparent; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.8125rem; font-weight: 600; padding: 0.65rem 1.35rem; border-radius: 2px; text-decoration: none; white-space: nowrap; transition: all 0.2s ease;">
                        Detail &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 2: Vanilla Powder -->
            <div style="background-color: #BDC4B8; border-radius: 12px; padding: 2rem 1.75rem 2.25rem; display: flex; flex-direction: column; justify-content: space-between; position: relative;">
                <!-- Badge #2 -->
                <div style="position: absolute; top: 1.5rem; left: 1.5rem; background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.875rem; font-weight: 700; width: 34px; height: 34px; border-radius: 4px; display: flex; align-items: center; justify-content: center; z-index: 2;">
                    #2
                </div>

                <!-- Product Image -->
                <div style="height: 270px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                    <img src="<?php echo esc_url( $img_dir . 'Product Unggulan 2.png' ); ?>" 
                         alt="Vanilla Powder" 
                         style="max-height: 100%; max-width: 100%; width: auto; object-fit: contain; filter: drop-shadow(0 8px 16px rgba(0,0,0,0.06));">
                </div>

                <!-- Product Content & Arrow Button -->
                <div style="display: flex; justify-content: space-between; align-items: flex-end; gap: 1rem;">
                    <div>
                        <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.375rem; font-weight: 700; color: #363E19; margin: 0 0 0.4rem 0;">
                            Vanilla Powder
                        </h3>
                        <p style="font-size: 0.8125rem; color: #4A5239; margin: 0; line-height: 1.5;">
                            Finely ground vanilla for versatile food and beverage applications.
                        </p>
                    </div>
                    <a href="<?php echo esc_url( home_url( '/products/indonesian-tahitensis-vanilla-beans/' ) ); ?>" 
                       style="display: inline-flex; align-items: center; justify-content: center; width: 38px; height: 38px; border: 1px solid #363E19; color: #363E19; background: transparent; border-radius: 2px; text-decoration: none; flex-shrink: 0; transition: all 0.2s ease;">
                        &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 3: Vanilla Extract -->
            <div style="background-color: #BDC4B8; border-radius: 12px; padding: 2rem 1.75rem 2.25rem; display: flex; flex-direction: column; justify-content: space-between; position: relative;">
                <!-- Badge #3 -->
                <div style="position: absolute; top: 1.5rem; left: 1.5rem; background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.875rem; font-weight: 700; width: 34px; height: 34px; border-radius: 4px; display: flex; align-items: center; justify-content: center; z-index: 2;">
                    #3
                </div>

                <!-- Product Image -->
                <div style="height: 270px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                    <img src="<?php echo esc_url( $img_dir . 'Product Unggulan 3.png' ); ?>" 
                         alt="Vanilla Extract" 
                         style="max-height: 100%; max-width: 100%; width: auto; object-fit: contain; filter: drop-shadow(0 8px 16px rgba(0,0,0,0.06));">
                </div>

                <!-- Product Content & Arrow Button -->
                <div style="display: flex; justify-content: space-between; align-items: flex-end; gap: 1rem;">
                    <div>
                        <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.375rem; font-weight: 700; color: #363E19; margin: 0 0 0.4rem 0;">
                            Vanilla Extract
                        </h3>
                        <p style="font-size: 0.8125rem; color: #4A5239; margin: 0; line-height: 1.5;">
                            Rich vanilla extract crafted for consistent flavor and aroma.
                        </p>
                    </div>
                    <a href="<?php echo esc_url( home_url( '/products/gourmet-vanilla-extract-paste/' ) ); ?>" 
                       style="display: inline-flex; align-items: center; justify-content: center; width: 38px; height: 38px; border: 1px solid #363E19; color: #363E19; background: transparent; border-radius: 2px; text-decoration: none; flex-shrink: 0; transition: all 0.2s ease;">
                        &rarr;
                    </a>
                </div>
            </div>

        </div>

        <!-- View All Products CTA Button -->
        <div style="text-align: center;">
            <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" 
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
                        <path d="M12 2L4 5v6.09c0 5.05 3.41 9.76 8 10.91 4.59-1.15 8-5.86 8-10.91V5l-8-3z"/>
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
                        <path d="M21 16.5l-9 5.2-9-5.2V7.5L12 2.3l9 5.2v9zM12 4.1L5.3 8 12 11.9 18.7 8 12 4.1zm-7 5.6v7.4l6.5 3.7v-7.4L5 9.7zm8 11.1l6.5-3.7V9.7L13 13.4v7.4z"/>
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
                        <path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM15 19l-6-2.11V5l6 2.11V19z"/>
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
                        <path d="M12 1a9 9 0 0 0-9 9v7c0 1.66 1.34 3 3 3h3v-8H5v-2c0-3.87 3.13-7 7-7s7 3.13 7 7v2h-4v8h3c1.66 0 3-1.34 3-3v-7a9 9 0 0 0-9-9z"/>
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
                <img src="<?php echo esc_url( $img_dir . 'Bulk  Wholesale Vanilla 1.png' ); ?>" 
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
                <img src="<?php echo esc_url( $img_dir . 'Worldwide maps.png' ); ?>" 
                     alt="Grand Vanilla Indonesia Worldwide Export Routes Map" 
                     style="width: 100%; height: auto; display: block; filter: drop-shadow(0 10px 25px rgba(0,0,0,0.3));">
            </div>
        </div>

        <!-- Who We Serve In Global B2B Markets -->
        <div>
            <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(1.5rem, 2.5vw, 1.875rem); font-weight: 400; font-style: italic; color: #FFFFFF; text-align: center; margin-bottom: 2.5rem; letter-spacing: 0.02em;">
                Who We Serve In Global B2B Markets
            </h3>

            <!-- 6 Grid Cards (3 Columns x 2 Rows) -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem;">
                
                <!-- Card 1: IMPORTERS -->
                <div style="border: 1px solid rgba(255,255,255,0.35); border-radius: 8px; padding: 1.15rem 1.5rem; display: flex; align-items: center; gap: 1.25rem; background: rgba(0,0,0,0.04);">
                    <div style="width: 42px; height: 42px; border: 1px solid rgba(255,255,255,0.45); border-radius: 6px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #FFFFFF;">
                        <!-- Globe Icon -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                    </div>
                    <span style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 700; color: #FFFFFF; letter-spacing: 0.06em; text-transform: uppercase;">
                        IMPORTERS
                    </span>
                </div>

                <!-- Card 2: DISTRIBUTORS -->
                <div style="border: 1px solid rgba(255,255,255,0.35); border-radius: 8px; padding: 1.15rem 1.5rem; display: flex; align-items: center; gap: 1.25rem; background: rgba(0,0,0,0.04);">
                    <div style="width: 42px; height: 42px; border: 1px solid rgba(255,255,255,0.45); border-radius: 6px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #FFFFFF;">
                        <!-- Truck Icon -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="1" y="3" width="15" height="13" rx="2"></rect>
                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                        </svg>
                    </div>
                    <span style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 700; color: #FFFFFF; letter-spacing: 0.06em; text-transform: uppercase;">
                        DISTRIBUTORS
                    </span>
                </div>

                <!-- Card 3: FOOD MANUFACTURERS -->
                <div style="border: 1px solid rgba(255,255,255,0.35); border-radius: 8px; padding: 1.15rem 1.5rem; display: flex; align-items: center; gap: 1.25rem; background: rgba(0,0,0,0.04);">
                    <div style="width: 42px; height: 42px; border: 1px solid rgba(255,255,255,0.45); border-radius: 6px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #FFFFFF;">
                        <!-- Factory Icon -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 20h20M5 20V9l5 4V9l5 4V5l5 4v11"></path>
                        </svg>
                    </div>
                    <span style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 700; color: #FFFFFF; letter-spacing: 0.06em; text-transform: uppercase;">
                        FOOD MANUFACTURERS
                    </span>
                </div>

                <!-- Card 4: SPICE TRADERS -->
                <div style="border: 1px solid rgba(255,255,255,0.35); border-radius: 8px; padding: 1.15rem 1.5rem; display: flex; align-items: center; gap: 1.25rem; background: rgba(0,0,0,0.04);">
                    <div style="width: 42px; height: 42px; border: 1px solid rgba(255,255,255,0.45); border-radius: 6px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #FFFFFF;">
                        <!-- Chili / Spice Icon -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 3c-1.5 1-2.5 3-2.5 4.5 0 0-4 1-7 4s-4 7-4 7 4 0 7-3 4-7 4-7c1.5 0 3.5-1 4.5-2.5-1-1-2-2-2-3z"></path>
                        </svg>
                    </div>
                    <span style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 700; color: #FFFFFF; letter-spacing: 0.06em; text-transform: uppercase;">
                        SPICE TRADERS
                    </span>
                </div>

                <!-- Card 5: BAKERIES -->
                <div style="border: 1px solid rgba(255,255,255,0.35); border-radius: 8px; padding: 1.15rem 1.5rem; display: flex; align-items: center; gap: 1.25rem; background: rgba(0,0,0,0.04);">
                    <div style="width: 42px; height: 42px; border: 1px solid rgba(255,255,255,0.45); border-radius: 6px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #FFFFFF;">
                        <!-- Croissant / Bakery Icon -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 14c2-4 7-6 9-6s7 2 9 6c-2 2-5 3-9 3s-7-1-9-3z"></path>
                            <path d="M7 11c1-2 3-3 5-3s4 1 5 3"></path>
                            <path d="M5 14c1 1 2 2 4 2"></path>
                            <path d="M19 14c-1 1-2 2-4 2"></path>
                        </svg>
                    </div>
                    <span style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 700; color: #FFFFFF; letter-spacing: 0.06em; text-transform: uppercase;">
                        BAKERIES
                    </span>
                </div>

                <!-- Card 6: CONFECTIONERY COMPANIES -->
                <div style="border: 1px solid rgba(255,255,255,0.35); border-radius: 8px; padding: 1.15rem 1.5rem; display: flex; align-items: center; gap: 1.25rem; background: rgba(0,0,0,0.04);">
                    <div style="width: 42px; height: 42px; border: 1px solid rgba(255,255,255,0.45); border-radius: 6px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #FFFFFF;">
                        <!-- Cookie Icon -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2a10 10 0 1 0 10 10 3.5 3.5 0 0 1-3.5-3.5 3.5 3.5 0 0 1-3.5-3.5A3.5 3.5 0 0 1 12 2z"></path>
                            <circle cx="8.5" cy="8.5" r="1" fill="currentColor"></circle>
                            <circle cx="7.5" cy="14.5" r="1" fill="currentColor"></circle>
                            <circle cx="14.5" cy="14.5" r="1" fill="currentColor"></circle>
                            <circle cx="11.5" cy="11.5" r="1" fill="currentColor"></circle>
                            <circle cx="16.5" cy="9.5" r="1" fill="currentColor"></circle>
                        </svg>
                    </div>
                    <span style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 700; color: #FFFFFF; letter-spacing: 0.06em; text-transform: uppercase;">
                        CONFECTIONERY COMPANIES
                    </span>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- 7. Gallery Section Teaser -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 6rem 0; border-top: 1px solid rgba(0,0,0,0.04);">
    <div class="gv-container">
        
        <div style="text-align: center; max-width: 680px; margin: 0 auto 3.5rem;">
            <div style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; color: #363E19; font-size: 0.9375rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.5rem;">
                <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                Gallery
            </div>
            <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 700; color: #363E19; line-height: 1.2; margin-bottom: 0.75rem;">
                A Closer Look At Grand Vanilla
            </h2>
            <p style="font-size: 0.9375rem; color: #4A5239; line-height: 1.6; margin: 0;">
                Explore our cultivation, curing, and warehouse operations in Indonesia.
            </p>
        </div>

        <!-- 5 Gallery Cards Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.25rem; margin-bottom: 3.5rem;">
            <div style="border-radius: 12px; overflow: hidden; height: 260px; box-shadow: 0 6px 18px rgba(0,0,0,0.06);">
                <img src="<?php echo esc_url( $img_dir . 'Gallery Example Carroussel 1.png' ); ?>" alt="Vanilla Greenhouse Operations" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div style="border-radius: 12px; overflow: hidden; height: 260px; box-shadow: 0 6px 18px rgba(0,0,0,0.06);">
                <img src="<?php echo esc_url( $img_dir . 'Gallery Example Carroussel 2.png' ); ?>" alt="Hand Pollination in East Java" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div style="border-radius: 12px; overflow: hidden; height: 260px; box-shadow: 0 6px 18px rgba(0,0,0,0.06);">
                <img src="<?php echo esc_url( $img_dir . 'Gallery Example Carroussel 3.png' ); ?>" alt="Sun Curing Decks" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div style="border-radius: 12px; overflow: hidden; height: 260px; box-shadow: 0 6px 18px rgba(0,0,0,0.06);">
                <img src="<?php echo esc_url( $img_dir . 'Gallery Example Carroussel 4.png' ); ?>" alt="Sweating Process in Wooden Boxes" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div style="border-radius: 12px; overflow: hidden; height: 260px; box-shadow: 0 6px 18px rgba(0,0,0,0.06);">
                <img src="<?php echo esc_url( $img_dir . 'Gallery Example Carroussel 5.png' ); ?>" alt="Aroma Conditioning Warehouse" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>

        <div style="text-align: center;">
            <a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" 
               style="display: inline-flex; align-items: center; gap: 0.5rem; background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 600; padding: 0.85rem 2.25rem; border-radius: 4px; text-decoration: none; box-shadow: 0 4px 12px rgba(54,62,25,0.15); transition: all 0.2s ease;">
                View All Gallery &rarr;
            </a>
        </div>

    </div>
</section>

<!-- 8. Insights Section (Blog Teaser) -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 6rem 0; border-top: 1px solid rgba(0,0,0,0.04);">
    <div class="gv-container">
        
        <div style="text-align: center; max-width: 680px; margin: 0 auto 3.5rem;">
            <div style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; color: #363E19; font-size: 0.9375rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.5rem;">
                <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                Blog
            </div>
            <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 700; color: #363E19; line-height: 1.2; margin-bottom: 0.75rem;">
                Insights From The World Of Vanilla
            </h2>
            <p style="font-size: 0.9375rem; color: #4A5239; line-height: 1.6; margin: 0;">
                Discover insights on Indonesian vanilla, sourcing, quality, industry trends, and applications.
            </p>
        </div>

        <!-- 2 Big Article Cards -->
        <div style="display: flex; flex-direction: column; gap: 1.75rem; margin-bottom: 3.5rem;">
            
            <!-- Article Card 1 -->
            <div style="background: #CCD2C7; border-radius: 12px; padding: 1.75rem; display: grid; grid-template-columns: 1fr; gap: 1.75rem; align-items: center;" class="gv-blog-card-split">
                <div style="position: relative; border-radius: 10px; overflow: hidden; height: 220px;">
                    <img src="<?php echo esc_url( $img_dir . 'Buat Blog Example 1.png' ); ?>" alt="What Makes Indonesian Vanilla Exceptional?" style="width: 100%; height: 100%; object-fit: cover;">
                    <span style="position: absolute; top: 1rem; left: 1rem; font-size: 2.25rem; font-weight: 800; font-family: var(--font-heading, 'Jost', sans-serif); color: #fff; text-shadow: 0 2px 8px rgba(0,0,0,0.6);">12/12</span>
                </div>
                <div>
                    <span style="font-size: 0.75rem; color: #363E19; font-weight: 700; text-transform: uppercase; font-family: var(--font-heading, 'Jost', sans-serif); display: block; margin-bottom: 0.5rem;">Vanilla Guide</span>
                    <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.5rem; font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                        <a href="<?php echo esc_url( home_url( '/what-makes-indonesian-vanilla-exceptional/' ) ); ?>" style="color: #363E19; text-decoration: none;">
                            What Makes Indonesian Vanilla Exceptional?
                        </a>
                    </h3>
                    <p style="font-size: 0.9375rem; color: #4A5239; line-height: 1.6; margin-bottom: 1.25rem;">
                        Discover the unique aroma, flavor, and characteristics that make Indonesian vanilla a valued ingredient for global food industries.
                    </p>
                    <a href="<?php echo esc_url( home_url( '/what-makes-indonesian-vanilla-exceptional/' ) ); ?>" 
                       style="display: inline-flex; align-items: center; gap: 0.4rem; border: 1px solid #363E19; color: #363E19; background: transparent; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.8125rem; font-weight: 600; padding: 0.5rem 1.25rem; border-radius: 4px; text-decoration: none;">
                        Continue Reading &rarr;
                    </a>
                </div>
            </div>

            <!-- Article Card 2 -->
            <div style="background: #CCD2C7; border-radius: 12px; padding: 1.75rem; display: grid; grid-template-columns: 1fr; gap: 1.75rem; align-items: center;" class="gv-blog-card-split">
                <div style="position: relative; border-radius: 10px; overflow: hidden; height: 220px;">
                    <img src="<?php echo esc_url( $img_dir . 'Buat blog example 2.png' ); ?>" alt="From Vanilla Bean to Global Ingredient" style="width: 100%; height: 100%; object-fit: cover;">
                    <span style="position: absolute; top: 1rem; left: 1rem; font-size: 2.25rem; font-weight: 800; font-family: var(--font-heading, 'Jost', sans-serif); color: #fff; text-shadow: 0 2px 8px rgba(0,0,0,0.6);">11/12</span>
                </div>
                <div>
                    <span style="font-size: 0.75rem; color: #363E19; font-weight: 700; text-transform: uppercase; font-family: var(--font-heading, 'Jost', sans-serif); display: block; margin-bottom: 0.5rem;">Vanilla Insight</span>
                    <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.5rem; font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                        <a href="<?php echo esc_url( home_url( '/from-vanilla-bean-to-global-ingredient/' ) ); ?>" style="color: #363E19; text-decoration: none;">
                            From Vanilla Bean to Global Ingredient
                        </a>
                    </h3>
                    <p style="font-size: 0.9375rem; color: #4A5239; line-height: 1.6; margin-bottom: 1.25rem;">
                        Explore how quality vanilla is sourced, processed, and prepared to meet the needs of international B2B buyers.
                    </p>
                    <a href="<?php echo esc_url( home_url( '/from-vanilla-bean-to-global-ingredient/' ) ); ?>" 
                       style="display: inline-flex; align-items: center; gap: 0.4rem; border: 1px solid #363E19; color: #363E19; background: transparent; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.8125rem; font-weight: 600; padding: 0.5rem 1.25rem; border-radius: 4px; text-decoration: none;">
                        Continue Reading &rarr;
                    </a>
                </div>
            </div>

        </div>

        <div style="text-align: center;">
            <a href="<?php echo esc_url( home_url( '/articles/' ) ); ?>" 
               style="display: inline-flex; align-items: center; gap: 0.5rem; background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 600; padding: 0.85rem 2.25rem; border-radius: 4px; text-decoration: none; box-shadow: 0 4px 12px rgba(54,62,25,0.15); transition: all 0.2s ease;">
                View All Blog &rarr;
            </a>
        </div>

    </div>
</section>

<!-- 9. CTA Banner (High-Fidelity Figma Component) -->
<?php
get_template_part( 'template-parts/cta-banner', null, array(
    'title'    => 'Ready To Get Your Vanilla<br>Supply Started?',
    'btn_text' => 'Get a Sample',
    'btn_url'  => home_url( '/contact/' ),
) );
?>

<style>
@media (min-width: 900px) {
    .gv-grid-split-about { grid-template-columns: 1fr 1.15fr !important; }
    .gv-grid-split-oem { grid-template-columns: 1fr 1.25fr !important; }
    .gv-blog-card-split { grid-template-columns: 320px 1fr !important; }
}
@media (max-width: 991px) {
    .gv-products-cards-grid {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
    }
}
</style>

<?php
get_footer();
