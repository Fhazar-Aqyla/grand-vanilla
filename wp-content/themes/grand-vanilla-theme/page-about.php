<?php
/**
 * Template Name: About Us Page
 * High-Fidelity Implementation based on Figma Desktop/About Us.pdf
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();
?>

<!-- 1. Hero Section -->
<section class="gv-hero-page" style="position: relative; min-height: 420px; background: url('<?php echo esc_url( $img_dir . 'About Us Hero Section.png' ); ?>') center center / cover no-repeat; display: flex; align-items: center; justify-content: center; text-align: center; padding: 5rem 1.5rem;">
    <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.45); pointer-events: none;"></div>
    <div class="gv-container" style="position: relative; z-index: 2;">
        <h1 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2.5rem, 5vw, 3.5rem); font-weight: 800; color: #FFFFFF; margin-bottom: 0.75rem; letter-spacing: -0.01em;">
            #knowUs
        </h1>
        <p style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(1rem, 2vw, 1.25rem); color: rgba(255,255,255,0.9); max-width: 600px; margin: 0 auto;">
            Connecting Indonesian vanilla with global markets.
        </p>
    </div>
</section>

<!-- 2. About Overview (Side-by-Side 2 Columns on Desktop) -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 6rem 0;">
    <div class="gv-container">
        <div style="display: grid; grid-template-columns: 1fr; gap: 3.5rem; align-items: center;" class="gv-grid-split-about">
            
            <!-- Left Column: Rustic Vanilla Photo -->
            <div>
                <img src="<?php echo esc_url( $img_dir . 'About Us Image.png' ); ?>" 
                     alt="Grand Vanilla Indonesia Rustic Vanilla Curing" 
                     style="width: 100%; height: auto; max-height: 560px; object-fit: cover; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.06); display: block;">
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
                        We work closely with local smallholders and farming cooperatives to preserve traditional hand-pollination and natural sun-curing traditions, ensuring every shipment meets international food safety and vanillin concentration benchmarks.
                    </p>

                    <!-- 4 Solid Dark Khaki Feature Boxes (2x2 Grid) -->
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.85rem; margin-bottom: 2rem;">
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
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 3. Our Journey And Purpose (Story, Vision, Mission) -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 6rem 0; border-top: 1px solid rgba(0,0,0,0.04);">
    <div class="gv-container">
        
        <div style="max-width: 44rem; margin-bottom: 3.5rem;">
            <div style="display: flex; align-items: center; gap: 0.75rem; color: #363E19; font-size: 0.9375rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.5rem;">
                <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                Our History
            </div>
            <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 700; color: #363E19; line-height: 1.2; margin-bottom: 0.5rem;">
                Our Journey And Purpose
            </h2>
            <p style="font-size: 0.9375rem; color: #4A5239; line-height: 1.6; margin: 0;">
                Explore our background, long-term vision, and commitment to delivering exceptional Indonesian vanilla to global partners.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: 1fr; gap: 2.5rem; align-items: center;" class="gv-grid-split-story">
            <div>
                <img src="<?php echo esc_url( $img_dir . 'Our Story.png' ); ?>" 
                     alt="Our Story Jember East Java" 
                     style="width: 100%; height: auto; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.06); display: block;">
            </div>

            <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                <!-- Card 1: Our Story -->
                <div style="background: #FAF8F5; border-radius: 12px; padding: 1.75rem 2rem; box-shadow: 0 4px 16px rgba(0,0,0,0.02);">
                    <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.25rem; font-weight: 700; color: #363E19; margin-bottom: 0.5rem;">
                        Our Story
                    </h3>
                    <p style="font-size: 0.875rem; color: #4A5239; line-height: 1.7; margin: 0;">
                        Grand Vanilla Indonesia was founded in 2019 in Jember, East Java, with a simple goal: to bring Indonesia's rich vanilla resources to a wider global market. Starting from local vanilla sourcing and small-scale supply, the company gradually expanded its network and began serving wholesale and international B2B buyers.
                    </p>
                </div>

                <!-- Card 2: Our Vision -->
                <div style="background: #FAF8F5; border-radius: 12px; padding: 1.75rem 2rem; box-shadow: 0 4px 16px rgba(0,0,0,0.02);">
                    <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.25rem; font-weight: 700; color: #363E19; margin-bottom: 0.5rem;">
                        Our Vision
                    </h3>
                    <p style="font-size: 0.875rem; color: #4A5239; line-height: 1.7; margin: 0;">
                        To grow as a trusted Indonesian vanilla supplier and export partner, connecting quality products with international buyers while creating long-term value across global markets.
                    </p>
                </div>

                <!-- Card 3: Our Mission -->
                <div style="background: #FAF8F5; border-radius: 12px; padding: 1.75rem 2rem; box-shadow: 0 4px 16px rgba(0,0,0,0.02);">
                    <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.25rem; font-weight: 700; color: #363E19; margin-bottom: 0.5rem;">
                        Our Mission
                    </h3>
                    <p style="font-size: 0.875rem; color: #4A5239; line-height: 1.7; margin: 0;">
                        To provide quality Indonesian vanilla with consistent supply and reliable service, while supporting international buyers with solutions that meet their product and business requirements.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- 4. Sourced From Local Indonesia -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 6rem 0; border-top: 1px solid rgba(0,0,0,0.04);">
    <div class="gv-container">
        
        <div style="display: grid; grid-template-columns: 1fr; gap: 3.5rem; align-items: center;" class="gv-grid-split-sourcing">
            <div>
                <div style="display: flex; align-items: center; gap: 0.75rem; color: #363E19; font-size: 0.9375rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.5rem;">
                    <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                    Our Sourcing
                </div>
                <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 700; color: #363E19; line-height: 1.2; margin-bottom: 1rem;">
                    Sourced From Local Indonesia,<br>Built Around Quality
                </h2>
                <p style="font-size: 0.9375rem; color: #4A5239; line-height: 1.6; margin-bottom: 2.25rem;">
                    We work with trusted local sources to connect international buyers with quality Indonesian vanilla.
                </p>

                <div style="display: flex; flex-direction: column; gap: 1.75rem;">
                    <div style="display: flex; gap: 1.25rem;">
                        <div style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.5rem; font-weight: 800; color: #363E19;">1.</div>
                        <div>
                            <strong style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.0625rem; font-weight: 700; color: #363E19; display: block; margin-bottom: 0.25rem;">Local Product</strong>
                            <p style="font-size: 0.875rem; color: #4A5239; margin: 0; line-height: 1.5;">Vanilla sourced directly from Indonesia and connected to local growing regions.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 1.25rem;">
                        <div style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.5rem; font-weight: 800; color: #363E19;">2.</div>
                        <div>
                            <strong style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.0625rem; font-weight: 700; color: #363E19; display: block; margin-bottom: 0.25rem;">Trusted Sourcing</strong>
                            <p style="font-size: 0.875rem; color: #4A5239; margin: 0; line-height: 1.5;">Working with selected local farmer groups to maintain product quality and consistency.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 1.25rem;">
                        <div style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.5rem; font-weight: 800; color: #363E19;">3.</div>
                        <div>
                            <strong style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.0625rem; font-weight: 700; color: #363E19; display: block; margin-bottom: 0.25rem;">Quality Selection</strong>
                            <p style="font-size: 0.875rem; color: #4A5239; margin: 0; line-height: 1.5;">Products are selected according to buyer requirements and intended applications.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <img src="<?php echo esc_url( $img_dir . 'Sourcing.png' ); ?>" 
                     alt="Local Sourcing Indonesia" 
                     style="width: 100%; height: auto; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.06); display: block;">
            </div>
        </div>

    </div>
</section>

<!-- 5. Export Capability (4 Clean White Cards with SVG Vector Icons - NO EMOJIS) -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 6rem 0; border-top: 1px solid rgba(0,0,0,0.04);">
    <div class="gv-container">
        
        <div style="text-align: center; max-width: 700px; margin: 0 auto 3.5rem;">
            <div style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; color: #363E19; font-size: 0.9375rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.5rem;">
                <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                Export Capability
            </div>
            <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 700; color: #363E19; line-height: 1.2; margin: 0;">
                What Is Our Export Capability?
            </h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem;">
            
            <!-- Card 1: Wholesale Supply -->
            <div style="background: #FAF8F5; border-radius: 12px; padding: 2.5rem 1.5rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Plane / Global Transport Icon -->
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 2L11 13"></path>
                        <path d="M22 2L15 22L11 13L2 9L22 2Z"></path>
                    </svg>
                </div>
                <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                    Wholesale Supply
                </h3>
                <p style="font-size: 0.8125rem; line-height: 1.6; color: #4A5239; margin: 0;">
                    Vanilla products available for wholesale and recurring international business requirements.
                </p>
            </div>

            <!-- Card 2: Bulk Orders -->
            <div style="background: #FAF8F5; border-radius: 12px; padding: 2.5rem 1.5rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Box Icon -->
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M21 16.5l-9 5.2-9-5.2V7.5L12 2.3l9 5.2v9zM12 4.1L5.3 8 12 11.9 18.7 8 12 4.1zm-7 5.6v7.4l6.5 3.7v-7.4L5 9.7zm8 11.1l6.5-3.7V9.7L13 13.4v7.4z"/>
                    </svg>
                </div>
                <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 700; color: #363E19; margin-bottom: 0.75rem;">
                    Bulk Orders
                </h3>
                <p style="font-size: 0.8125rem; line-height: 1.6; color: #4A5239; margin: 0;">
                    Supporting larger volume orders for distributors, extract manufacturers, and buyers.
                </p>
            </div>

            <!-- Card 3: International Buyers -->
            <div style="background: #FAF8F5; border-radius: 12px; padding: 2.5rem 1.5rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Globe Icon -->
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
            <div style="background: #FAF8F5; border-radius: 12px; padding: 2.5rem 1.5rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.02); display: flex; flex-direction: column; align-items: center;">
                <div style="width: 48px; height: 48px; background-color: #363E19; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 1.5rem;">
                    <!-- Custom Sliders / Requirements Icon -->
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" y1="21" x2="4" y2="14"></line>
                        <line x1="4" y1="10" x2="4" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12" y2="3"></line>
                        <line x1="20" y1="21" x2="20" y2="16"></line>
                        <line x1="20" y1="12" x2="20" y2="3"></line>
                        <line x1="1" y1="14" x2="7" y2="14"></line>
                        <line x1="9" y1="8" x2="15" y2="8"></line>
                        <line x1="17" y1="16" x2="23" y2="16"></line>
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

<!-- 6. Facilities (Warehouse & Processing) -->
<section class="gv-section" style="background-color: #DDE2D9; padding: 6rem 0; border-top: 1px solid rgba(0,0,0,0.04);">
    <div class="gv-container">
        
        <div style="max-width: 44rem; margin-bottom: 3.5rem;">
            <div style="display: flex; align-items: center; gap: 0.75rem; color: #363E19; font-size: 0.9375rem; font-weight: 600; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.5rem;">
                <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                Our Facilities
            </div>
            <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 700; color: #363E19; line-height: 1.2; margin-bottom: 0.5rem;">
                Built To Support Reliable Operations.
            </h2>
            <p style="font-size: 0.9375rem; color: #4A5239; line-height: 1.6; margin: 0;">
                Our facilities support the handling, processing, storage, and preparation of Indonesian vanilla for international orders.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem;">
            
            <!-- Facility 1: Warehouse & Storage -->
            <div style="background: #FAF8F5; border-radius: 12px; overflow: hidden; box-shadow: 0 6px 20px rgba(0,0,0,0.04);">
                <div style="height: 280px; overflow: hidden;">
                    <img src="<?php echo esc_url( $img_dir . 'Warehouse.png' ); ?>" alt="Warehouse and Storage" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 2rem;">
                    <span style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.75rem; color: #363E19; font-weight: 700; text-transform: uppercase; display: block; margin-bottom: 0.35rem;">
                        Warehouse
                    </span>
                    <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.375rem; font-weight: 700; color: #363E19; margin-bottom: 0.5rem;">
                        Warehouse & Storage
                    </h3>
                    <p style="font-size: 0.875rem; color: #4A5239; line-height: 1.6; margin: 0;">
                        A dedicated space for storing and handling vanilla products while supporting wholesale and bulk order requirements.
                    </p>
                </div>
            </div>

            <!-- Facility 2: Processing Facility -->
            <div style="background: #FAF8F5; border-radius: 12px; overflow: hidden; box-shadow: 0 6px 20px rgba(0,0,0,0.04);">
                <div style="height: 280px; overflow: hidden;">
                    <img src="<?php echo esc_url( $img_dir . 'Processing.png' ); ?>" alt="Processing Facility" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 2rem;">
                    <span style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.75rem; color: #363E19; font-weight: 700; text-transform: uppercase; display: block; margin-bottom: 0.35rem;">
                        Processing
                    </span>
                    <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.375rem; font-weight: 700; color: #363E19; margin-bottom: 0.5rem;">
                        Processing Facility
                    </h3>
                    <p style="font-size: 0.875rem; color: #4A5239; line-height: 1.6; margin: 0;">
                        A dedicated facility for handling and preparing vanilla products according to product and buyer requirements.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- 7. CTA Banner (High-Fidelity Figma Component) -->
<?php
get_template_part( 'template-parts/cta-banner', null, array(
    'title'    => 'Looking For A Reliable<br>Indonesian Vanilla Supplier?',
    'btn_text' => 'Request a Quote',
    'btn_url'  => home_url( '/contact/' ),
) );
?>

<style>
@media (min-width: 900px) {
    .gv-grid-split-about { grid-template-columns: 1fr 1.15fr !important; }
    .gv-grid-split-story { grid-template-columns: 1fr 1.2fr !important; }
    .gv-grid-split-sourcing { grid-template-columns: 1.15fr 1fr !important; }
}
</style>

<?php
get_footer();
