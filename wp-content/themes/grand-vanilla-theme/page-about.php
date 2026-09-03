<?php
/**
 * Template Name: About Us Page
 * High-Fidelity Implementation based on Figma Desktop About Us Screenshots
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();
?>

<!-- 1. Hero Section -->
<section class="gv-hero-page" style="background-image: url('<?php echo esc_url( $img_dir . 'About Us Hero Section.png' ); ?>');">
    <div class="gv-container">
        <h1 class="gv-hero-tag">#knowUs</h1>
        <p class="gv-hero-subtag">Connecting Indonesian vanilla with global markets.</p>
    </div>
</section>

<!-- 2. Section: About Overview (Grand Vanilla Indonesia) -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 5.5rem 0;">
    <div class="gv-container">
        <div class="gv-about-overview-grid" style="display: grid; grid-template-columns: 1fr 1.15fr; gap: 3.5rem; align-items: stretch;">
            
            <!-- Left Column: Rustic Vanilla Beans Photo -->
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.06); display: flex;">
                <img src="<?php echo esc_url( $img_dir . 'About Us Image.png' ); ?>" 
                     alt="Grand Vanilla Indonesia Premium Curing" 
                     style="width: 100%; height: 100%; object-fit: cover; display: block; border-radius: 12px;">
            </div>

            <!-- Right Column: Content + Orchid Watermark + 2x2 Feature Boxes + Learn More Button -->
            <div style="position: relative; display: flex; flex-direction: column; justify-content: center;">
                <!-- Subtle Orchid Flower Watermark -->
                <img src="<?php echo esc_url( $img_dir . 'Logo.png' ); ?>" 
                     alt="" 
                     aria-hidden="true" 
                     style="position: absolute; top: -20px; right: -10px; width: 170px; height: auto; opacity: 0.18; pointer-events: none; z-index: 0; transform: rotate(15deg);">

                <div style="position: relative; z-index: 1;">
                    <!-- Tagline Indicator -->
                    <div style="display: flex; align-items: center; gap: 0.75rem; color: #363E19; font-size: 0.875rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.65rem;">
                        <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                        About Us
                    </div>

                    <!-- Heading -->
                    <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2rem, 3.2vw, 2.75rem); font-weight: 700; color: #363E19; line-height: 1.2; margin-bottom: 1.25rem;">
                        Grand Vanilla Indonesia
                    </h2>

                    <!-- 2 Paragraphs -->
                    <p style="font-size: 0.9375rem; line-height: 1.7; color: #4A5239; margin-bottom: 1rem;">
                        Grand Vanilla Indonesia is an Indonesian vanilla supplier and exporter providing high-quality vanilla products for international buyers. We connect buyers with trusted sources of Indonesian vanilla, with a strong focus on product quality, consistent supply, and reliable service for wholesale and export needs.
                    </p>
                    <p style="font-size: 0.9375rem; line-height: 1.7; color: #4A5239; margin-bottom: 1.75rem;">
                        Grand Vanilla Indonesia is an Indonesian vanilla supplier and exporter providing high-quality vanilla products for international buyers. We connect buyers with trusted sources of Indonesian vanilla, with a strong focus on product quality, consistent supply, and reliable service for wholesale and export needs.
                    </p>

                    <!-- 4 Solid Dark Khaki Feature Boxes (2x2 Grid) -->
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.75rem; margin-bottom: 2rem;">
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

                    <!-- Learn More Button -->
                    <div>
                        <a href="#journey" 
                           style="display: inline-flex; align-items: center; gap: 0.6rem; border: 1px solid #363E19; color: #363E19; background: transparent; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.875rem; font-weight: 600; padding: 0.65rem 1.75rem; border-radius: 4px; text-decoration: none; transition: all 0.2s ease;">
                            Learn More &rarr;
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 3. Section: Our Journey And Purpose -->
<section id="journey" class="gv-section" style="background-color: #DDE2D9; padding: 5.5rem 0; border-top: 1px solid rgba(0,0,0,0.04);">
    <div class="gv-container">
        
        <!-- Header Split (Title on Left, Description on Right) -->
        <div class="gv-journey-header-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: flex-end; margin-bottom: 3.5rem;">
            <div>
                <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 700; color: #363E19; line-height: 1.2; margin: 0;">
                    Our Journey And<br>Purpose
                </h2>
            </div>
            <div>
                <p style="font-size: 0.9375rem; color: #4A5239; line-height: 1.6; margin: 0;">
                    Explore our range of quality Indonesian vanilla products, carefully sourced and prepared to meet the needs of global B2B buyers.
                </p>
            </div>
        </div>

        <!-- Main Content Split (Left: Image with Floating Story Card, Right: Vision & Mission Cards) -->
        <div class="gv-journey-body-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; align-items: stretch;">
            
            <!-- Left: Facility Photo with Overlay Box at Bottom -->
            <div style="position: relative; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.06); min-height: 460px; display: flex; flex-direction: column; justify-content: flex-end;">
                <img src="<?php echo esc_url( $img_dir . 'Our Story.png' ); ?>" 
                     alt="Our Story Jember Facility" 
                     style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0;">
                
                <!-- Bottom Floating Dark Text Box -->
                <div style="position: relative; z-index: 1; background: rgba(10, 8, 4, 0.78); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); padding: 1.75rem 2rem; border-top: 1px solid rgba(255,255,255,0.12);">
                    <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.25rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">
                        Our Story
                    </h3>
                    <p style="font-size: 0.8125rem; color: rgba(255,255,255,0.88); line-height: 1.6; margin: 0;">
                        Grand Vanilla Indonesia was founded in 2019 in Jember, East Java, with a simple goal: to bring Indonesia's rich vanilla resources to a wider global market. Starting from local vanilla sourcing and small-scale supply, the company gradually expanded its network and began serving wholesale and international B2B buyers.
                    </p>
                </div>
            </div>

            <!-- Right Column: 2 Cards (Our Vision on Light Sage, Our Mision on Dark Olive) -->
            <div style="display: flex; flex-direction: column; gap: 1.5rem; justify-content: space-between;">
                
                <!-- Card 1: Our Vision (Light Sage Card #B9C1B4) -->
                <div style="background-color: #B9C1B4; border-radius: 12px; padding: 2.5rem 2.25rem; flex: 1; display: flex; flex-direction: column; justify-content: center; box-shadow: 0 4px 16px rgba(0,0,0,0.03);">
                    <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.375rem; font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                        Our Vision
                    </h3>
                    <p style="font-size: 0.875rem; color: #363E19; line-height: 1.7; margin: 0;">
                        To grow as a trusted Indonesian vanilla supplier and export partner, connecting quality products with international buyers while creating long-term value across global markets.
                    </p>
                </div>

                <!-- Card 2: Our Mision (Dark Olive Card #363E19) -->
                <div style="background-color: #363E19; border-radius: 12px; padding: 2.5rem 2.25rem; flex: 1; display: flex; flex-direction: column; justify-content: center; box-shadow: 0 4px 16px rgba(0,0,0,0.05);">
                    <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.375rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.75rem;">
                        Our Mision
                    </h3>
                    <p style="font-size: 0.875rem; color: rgba(255,255,255,0.9); line-height: 1.7; margin: 0;">
                        To provide quality Indonesian vanilla with consistent supply and reliable service, while supporting international buyers with solutions that meet their product and business requirements.
                    </p>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- 4. Section: Your Trusted Partner For Quality Indonesian Vanilla (Value Propositions) -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 5.5rem 0; border-top: 1px solid rgba(0,0,0,0.04);">
    <div class="gv-container">
        
        <!-- Header Centered -->
        <div style="text-align: center; max-width: 750px; margin: 0 auto 3.5rem;">
            <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 700; color: #363E19; line-height: 1.25; margin-bottom: 1rem;">
                Your Trusted Partner For Quality<br>Indonesian Vanilla
            </h2>
            <p style="font-size: 0.9375rem; color: #4A5239; line-height: 1.6; margin: 0;">
                At Grand Vanilla Indonesia, we go beyond supplying vanilla. We connect international B2B buyers with quality Indonesian vanilla.
            </p>
        </div>

        <!-- 4 White Cards Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem;">
            
            <!-- Card 1: Quality Focused -->
            <div style="background: #FFFFFF; border-radius: 12px; padding: 2.75rem 1.75rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Shield Icon -->
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-3z"/>
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
            <div style="background: #FFFFFF; border-radius: 12px; padding: 2.75rem 1.75rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Box Icon -->
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
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

            <!-- Card 3: Quality Assurance -->
            <div style="background: #FFFFFF; border-radius: 12px; padding: 2.75rem 1.75rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Map / Certificate Icon -->
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM15 19l-6-2.11V5l6 2.11V19z"/>
                    </svg>
                </div>
                <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                    Quality Assurance
                </h3>
                <p style="font-size: 0.8125rem; line-height: 1.6; color: #4A5239; margin: 0;">
                    We ensure consistent quality through careful inspection and control.
                </p>
            </div>

            <!-- Card 4: Full Traceability -->
            <div style="background: #FFFFFF; border-radius: 12px; padding: 2.75rem 1.75rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Headset / Support Icon -->
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 1a9 9 0 0 0-9 9v7c0 1.66 1.34 3 3 3h3v-8H5v-2a7 7 0 0 1 14 0v2h-4v8h3c1.66 0 3-1.34 3-3v-7a9 9 0 0 0-9-9z"/>
                    </svg>
                </div>
                <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                    Full Traceability
                </h3>
                <p style="font-size: 0.8125rem; line-height: 1.6; color: #4A5239; margin: 0;">
                    We provide transparent sourcing with traceability from origin through the supply chain.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- 5. Section: Sourced From Local Indonesia, Built Around Quality (Deep Dark Background #14180C) -->
<section class="gv-section" style="background-color: #14180C; color: #FFFFFF; padding: 6rem 0;">
    <div class="gv-container">
        
        <div class="gv-sourcing-dark-grid" style="display: grid; grid-template-columns: 1fr 1.25fr; gap: 4rem; align-items: flex-start;">
            
            <!-- Left Column: Tagline + Heading + Subtitle -->
            <div>
                <div style="display: flex; align-items: center; gap: 0.75rem; color: #A4B29A; font-size: 0.875rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 1.5rem;">
                    <span style="display: inline-block; width: 28px; height: 2px; background: #A4B29A;"></span>
                    Our Sourcing
                </div>

                <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2.25rem, 4vw, 3.25rem); font-weight: 700; color: #FFFFFF; line-height: 1.18; margin-bottom: 1.75rem;">
                    Sourced From Local<br>Indonesia, Built Around<br>Quality
                </h2>

                <p style="font-size: 0.9375rem; color: #BAC4B2; line-height: 1.7; margin: 0; max-width: 440px;">
                    We work with trusted local sources to connect international buyers with quality Indonesian vanilla.
                </p>
            </div>

            <!-- Right Column: 3 Numbered Steps & Farm Photo -->
            <div style="display: flex; flex-direction: column; gap: 2.5rem;">
                
                <!-- Steps 1 & 2 in 2-Column Grid -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <div>
                        <div style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.75rem; font-weight: 800; color: #FFFFFF; margin-bottom: 0.25rem;">1.</div>
                        <h4 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">Local Product</h4>
                        <p style="font-size: 0.8125rem; color: #BAC4B2; line-height: 1.6; margin: 0;">Vanilla sourced from Indonesia and connected to local growing regions.</p>
                    </div>
                    <div>
                        <div style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.75rem; font-weight: 800; color: #FFFFFF; margin-bottom: 0.25rem;">2.</div>
                        <h4 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">Trusted Sourcing</h4>
                        <p style="font-size: 0.8125rem; color: #BAC4B2; line-height: 1.6; margin: 0;">Working with selected local sources to maintain product quality and consistency.</p>
                    </div>
                </div>

                <!-- Step 3 Full Width -->
                <div>
                    <div style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.75rem; font-weight: 800; color: #FFFFFF; margin-bottom: 0.25rem;">3.</div>
                    <h4 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">Quality Selection</h4>
                    <p style="font-size: 0.8125rem; color: #BAC4B2; line-height: 1.6; margin: 0;">Products are selected according to buyer requirements and intended applications, ensuring the right quality and specifications for every order.</p>
                </div>

                <!-- Farm Photo -->
                <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.35);">
                    <img src="<?php echo esc_url( $img_dir . 'Sourcing.png' ); ?>" 
                         alt="Indonesian Local Vanilla Sourcing Plantation" 
                         style="width: 100%; height: auto; max-height: 280px; object-fit: cover; display: block; border-radius: 12px;">
                </div>

            </div>

        </div>

    </div>
</section>

<!-- 6. Section: What Is Our Export Capability? (4 Clean White Cards with SVG Vector Icons) -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 6rem 0;">
    <div class="gv-container">
        
        <!-- Header Centered -->
        <div style="text-align: center; max-width: 700px; margin: 0 auto 3.5rem;">
            <div style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; color: #363E19; font-size: 0.875rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.65rem;">
                <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                Export Capability
            </div>
            <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 700; color: #363E19; line-height: 1.2; margin: 0;">
                What Is Our Export Capability?
            </h2>
        </div>

        <!-- 4 White Cards Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem;">
            
            <!-- Card 1: Wholesale Supply -->
            <div style="background: #FFFFFF; border-radius: 12px; padding: 2.75rem 1.75rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Plane Icon -->
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                    </svg>
                </div>
                <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                    Wholesale Supply
                </h3>
                <p style="font-size: 0.8125rem; line-height: 1.6; color: #4A5239; margin: 0;">
                    Vanilla products available for wholesale and recurring business requirements.
                </p>
            </div>

            <!-- Card 2: Bulk Orders -->
            <div style="background: #FFFFFF; border-radius: 12px; padding: 2.75rem 1.75rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Layered Stacks Icon -->
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                </div>
                <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                    Bulk Orders
                </h3>
                <p style="font-size: 0.8125rem; line-height: 1.6; color: #4A5239; margin: 0;">
                    Supporting larger-volume orders for distributors, manufacturers, and other B2B buyers.
                </p>
            </div>

            <!-- Card 3: International Buyers -->
            <div style="background: #FFFFFF; border-radius: 12px; padding: 2.75rem 1.75rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Globe Icon -->
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                    </svg>
                </div>
                <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                    International Buyers
                </h3>
                <p style="font-size: 0.8125rem; line-height: 1.6; color: #4A5239; margin: 0;">
                    Serving importers, distributors, manufacturers, and businesses across global markets.
                </p>
            </div>

            <!-- Card 4: Custom Requirement -->
            <div style="background: #FFFFFF; border-radius: 12px; padding: 2.75rem 1.75rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Custom Bottle / Requirement Icon -->
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M6 3h12v2H6V3zm2 4h8v2H8V7zm-2 4h12c1.1 0 2 .9 2 2v7c0 1.1-.9 2-2 2H6c-1.1 0-2-.9-2-2v-7c0-1.1.9-2 2-2zm4 4v4h4v-4h-4z"/>
                    </svg>
                </div>
                <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                    Custom Requirement
                </h3>
                <p style="font-size: 0.8125rem; line-height: 1.6; color: #4A5239; margin: 0;">
                    Product options can be discussed based on specific buyer requirements and applications.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- 7. Section: Our Facilities (Zig-Zag Alternating 2-Column Layout) -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 6rem 0; border-top: 1px solid rgba(0,0,0,0.04);">
    <div class="gv-container">
        
        <!-- Header Split (Title on Left, Description on Right) -->
        <div class="gv-facilities-header-grid" style="display: grid; grid-template-columns: 1.15fr 1fr; gap: 3rem; align-items: flex-end; margin-bottom: 4.5rem;">
            <div>
                <div style="display: flex; align-items: center; gap: 0.75rem; color: #363E19; font-size: 0.875rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.75rem;">
                    <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                    Our Facilities
                </div>
                <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2.25rem, 3.8vw, 3rem); font-weight: 700; color: #363E19; line-height: 1.18; margin: 0;">
                    Built To Support Reliable<br>Operations.
                </h2>
            </div>
            <div>
                <p style="font-size: 0.9375rem; color: #4A5239; line-height: 1.6; margin: 0;">
                    Our facilities support the handling, processing, storage, and preparation of Indonesian vanilla for international orders.
                </p>
            </div>
        </div>

        <!-- Facility Items (Equal 1:1 Grid Split - Exact Match to Figma UI/UX) -->
        <div style="display: flex; flex-direction: column; gap: 4.5rem;">
            
            <!-- Facility Row 1: Warehouse (Text Left 50%, Image Right 50%) -->
            <div class="gv-facility-row-1" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
                <div style="display: flex; flex-direction: column; justify-content: center;">
                    <div style="display: flex; align-items: center; gap: 0.75rem; color: #363E19; font-size: 0.875rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.65rem;">
                        <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                        Warehouse
                    </div>
                    <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(1.75rem, 2.5vw, 2.25rem); font-weight: 700; color: #363E19; margin-bottom: 1rem; line-height: 1.25;">
                        Warehouse & Storage
                    </h3>
                    <p style="font-size: 0.9375rem; color: #4A5239; line-height: 1.7; margin: 0; max-width: 440px;">
                        A dedicated space for storing and handling vanilla products while supporting wholesale and bulk order requirements.
                    </p>
                </div>

                <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.06); aspect-ratio: 16 / 11; width: 100%;">
                    <img src="<?php echo esc_url( $img_dir . 'Warehouse.png' ); ?>" 
                         alt="Grand Vanilla Indonesia Warehouse & Storage Facility" 
                         style="width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; border-radius: 12px;">
                </div>
            </div>

            <!-- Facility Row 2: Processing (Image Left 50%, Text Right 50%) -->
            <div class="gv-facility-row-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
                <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.06); aspect-ratio: 16 / 11; width: 100%;">
                    <img src="<?php echo esc_url( $img_dir . 'Processing.png' ); ?>" 
                         alt="Grand Vanilla Indonesia Vanilla Processing Facility" 
                         style="width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; border-radius: 12px;">
                </div>

                <div style="display: flex; flex-direction: column; justify-content: center;">
                    <div style="display: flex; align-items: center; gap: 0.75rem; color: #363E19; font-size: 0.875rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.65rem;">
                        <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                        Processing
                    </div>
                    <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(1.75rem, 2.5vw, 2.25rem); font-weight: 700; color: #363E19; margin-bottom: 1rem; line-height: 1.25;">
                        Processing Facility
                    </h3>
                    <p style="font-size: 0.9375rem; color: #4A5239; line-height: 1.7; margin: 0; max-width: 440px;">
                        A dedicated facility for handling and preparing vanilla products according to product and buyer requirements.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- 8. CTA Banner (High-Fidelity Figma Component) -->
<?php
get_template_part( 'template-parts/cta-banner', null, array(
    'title'    => 'Looking For A Reliable<br>Indonesian Vanilla Supplier?',
    'btn_text' => 'Request a Quote',
    'btn_url'  => home_url( '/contact/' ),
) );
?>

<style>
@media (max-width: 991px) {
    .gv-about-overview-grid { grid-template-columns: 1fr !important; }
    .gv-journey-header-grid { grid-template-columns: 1fr !important; gap: 1rem !important; }
    .gv-journey-body-grid { grid-template-columns: 1fr !important; }
    .gv-sourcing-dark-grid { grid-template-columns: 1fr !important; }
    .gv-facilities-header-grid { grid-template-columns: 1fr !important; gap: 1rem !important; }
    .gv-facility-row-1 { grid-template-columns: 1fr !important; }
    .gv-facility-row-2 { grid-template-columns: 1fr !important; }
    .gv-facility-row-2 > div:first-child { order: 2; }
    .gv-facility-row-2 > div:last-child { order: 1; }
}
</style>

<?php
get_footer();

