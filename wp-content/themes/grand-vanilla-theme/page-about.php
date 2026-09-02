<?php
/**
 * Template Name: About Us Page
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
?>

<!-- 1. Hero Section -->
<section class="gv-hero-page" style="background-image: url('<?php echo esc_url( $img_dir . 'About Us Hero Section.png' ); ?>');">
    <div class="gv-container">
        <h1 class="gv-hero-tag">#knowUs</h1>
        <p class="gv-hero-subtag">Connecting Indonesian vanilla with global markets.</p>
    </div>
</section>

<!-- 2. About Overview -->
<section class="gv-section">
    <div class="gv-container">
        <div style="display: grid; grid-template-columns: 1fr; gap: 3.5rem; align-items: center;" class="gv-about-split">
            <div style="border-radius: var(--radius-16); overflow: hidden; box-shadow: var(--shadow-md);">
                <img src="<?php echo esc_url( $img_dir . 'About Us Image.png' ); ?>" alt="Grand Vanilla Indonesia" style="width: 100%; height: auto; object-fit: cover;">
            </div>
            <div>
                <span class="gv-section-tag">About Us</span>
                <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 1.25rem;">Grand Vanilla Indonesia</h2>
                <p style="color: var(--color-nw-500); line-height: 1.7; margin-bottom: 1.25rem; font-size: 0.9375rem;">
                    Grand Vanilla Indonesia is an Indonesian vanilla supplier and exporter providing high-quality vanilla products for international buyers. We connect buyers with trusted sources of Indonesian vanilla, with a strong focus on product quality, consistent supply, and reliable service for wholesale and export needs.
                </p>
                <p style="color: var(--color-nw-500); line-height: 1.7; margin-bottom: 2rem; font-size: 0.9375rem;">
                    We work closely with local smallholders and farming cooperatives to preserve traditional hand-pollination and natural sun-curing traditions, ensuring every shipment meets international food safety and vanillin concentration benchmarks.
                </p>
                <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 0.75rem;">
                    <div class="gv-pill gv-pill-khaki" style="justify-content: center; font-size: 0.75rem;">Premium Product Quality</div>
                    <div class="gv-pill gv-pill-khaki" style="justify-content: center; font-size: 0.75rem;">Consistent Global Supply</div>
                    <div class="gv-pill gv-pill-khaki" style="justify-content: center; font-size: 0.75rem;">Reliable Business Service</div>
                    <div class="gv-pill gv-pill-khaki" style="justify-content: center; font-size: 0.75rem;">Flexible Custom Solutions</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Our Journey And Purpose (Story, Vision, Mission) -->
<section class="gv-section" style="background-color: var(--color-warm-sand); border-top: 1px solid var(--color-nb-100); border-bottom: 1px solid var(--color-nb-100);">
    <div class="gv-container">
        
        <div style="max-width: 44rem; margin-bottom: 3.5rem;">
            <span class="gv-section-tag">Our History</span>
            <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.5rem;">Our Journey And Purpose</h2>
            <p style="color: var(--color-nw-500); font-size: 0.9375rem;">
                Explore our range of quality Indonesian vanilla products, carefully sourced and prepared to meet the needs of global B2B buyers.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: 1fr; gap: 2.5rem;" class="gv-story-grid">
            <div style="border-radius: var(--radius-16); overflow: hidden; box-shadow: var(--shadow-md);">
                <img src="<?php echo esc_url( $img_dir . 'Our Story.png' ); ?>" alt="Our Story Jember East Java" style="width: 100%; height: auto; object-fit: cover;">
            </div>

            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                <div class="gv-card" style="padding: 1.75rem; background: var(--color-parchment);">
                    <h3 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--color-dark-khaki);">Our Story</h3>
                    <p style="font-size: 0.875rem; color: var(--color-nw-500); line-height: 1.7;">
                        Grand Vanilla Indonesia was founded in 2019 in Jember, East Java, with a simple goal: to bring Indonesia's rich vanilla resources to a wider global market. Starting from local vanilla sourcing and small-scale supply, the company gradually expanded its network and began serving wholesale and international B2B buyers.
                    </p>
                </div>

                <div class="gv-card" style="padding: 1.75rem; background: var(--color-parchment);">
                    <h3 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--color-dark-khaki);">Our Vision</h3>
                    <p style="font-size: 0.875rem; color: var(--color-nw-500); line-height: 1.7;">
                        To grow as a trusted Indonesian vanilla supplier and export partner, connecting quality products with international buyers while creating long-term value across global markets.
                    </p>
                </div>

                <div class="gv-card" style="padding: 1.75rem; background: var(--color-parchment);">
                    <h3 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--color-dark-khaki);">Our Mission</h3>
                    <p style="font-size: 0.875rem; color: var(--color-nw-500); line-height: 1.7;">
                        To provide quality Indonesian vanilla with consistent supply and reliable service, while supporting international buyers with solutions that meet their product and business requirements.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
@media (min-width: 900px) {
    .gv-story-grid { grid-template-columns: 1fr 1.2fr !important; }
}
</style>

<!-- 4. Sourced From Local Indonesia -->
<section class="gv-section">
    <div class="gv-container">
        
        <div style="display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: center;" class="gv-sourcing-split">
            <div>
                <span class="gv-section-tag">Our Sourcing</span>
                <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 1rem; line-height: 1.2;">
                    Sourced From Local Indonesia,<br>Built Around Quality
                </h2>
                <p style="color: var(--color-nw-500); font-size: 0.9375rem; margin-bottom: 2rem;">
                    We work with trusted local sources to connect international buyers with quality Indonesian vanilla.
                </p>

                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <div style="display: flex; gap: 1.25rem;">
                        <div style="font-size: 1.5rem; font-weight: 800; color: var(--color-dark-khaki); font-family: var(--font-heading);">1.</div>
                        <div>
                            <strong style="font-size: 1rem; display: block; margin-bottom: 0.25rem;">Local Product</strong>
                            <p style="font-size: 0.8125rem; color: var(--color-nw-500);">Vanilla sourced directly from Indonesia and connected to local growing regions.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 1.25rem;">
                        <div style="font-size: 1.5rem; font-weight: 800; color: var(--color-dark-khaki); font-family: var(--font-heading);">2.</div>
                        <div>
                            <strong style="font-size: 1rem; display: block; margin-bottom: 0.25rem;">Trusted Sourcing</strong>
                            <p style="font-size: 0.8125rem; color: var(--color-nw-500);">Working with selected local farmer groups to maintain product quality and consistency.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 1.25rem;">
                        <div style="font-size: 1.5rem; font-weight: 800; color: var(--color-dark-khaki); font-family: var(--font-heading);">3.</div>
                        <div>
                            <strong style="font-size: 1rem; display: block; margin-bottom: 0.25rem;">Quality Selection</strong>
                            <p style="font-size: 0.8125rem; color: var(--color-nw-500);">Products are selected according to buyer requirements and intended applications.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div style="border-radius: var(--radius-16); overflow: hidden; box-shadow: var(--shadow-md);">
                <img src="<?php echo esc_url( $img_dir . 'Sourcing.png' ); ?>" alt="Local Sourcing Indonesia" style="width: 100%; height: auto; object-fit: cover;">
            </div>
        </div>

    </div>
</section>

<style>
@media (min-width: 900px) {
    .gv-sourcing-split { grid-template-columns: 1.15fr 1fr !important; }
}
</style>

<!-- 5. Export Capability -->
<section class="gv-section" style="background-color: var(--color-warm-sand); border-top: 1px solid var(--color-nb-100); border-bottom: 1px solid var(--color-nb-100);">
    <div class="gv-container">
        
        <div style="text-align: center; max-width: 40rem; margin: 0 auto 3rem;">
            <span class="gv-section-tag" style="justify-content: center;">Export Capability</span>
            <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.5rem;">What Is Our Export Capability?</h2>
        </div>

        <div class="gv-grid-4">
            <div class="gv-card" style="padding: 2rem 1.5rem; text-align: center; background: var(--color-parchment);">
                <div style="font-size: 2rem; margin-bottom: 1rem;">✈️</div>
                <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem;">Wholesale Supply</h3>
                <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">
                    Vanilla products available for wholesale and recurring international business requirements.
                </p>
            </div>
            <div class="gv-card" style="padding: 2rem 1.5rem; text-align: center; background: var(--color-parchment);">
                <div style="font-size: 2rem; margin-bottom: 1rem;">📦</div>
                <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem;">Bulk Orders</h3>
                <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">
                    Supporting larger volume orders for distributors, extract manufacturers, and buyers.
                </p>
            </div>
            <div class="gv-card" style="padding: 2rem 1.5rem; text-align: center; background: var(--color-parchment);">
                <div style="font-size: 2rem; margin-bottom: 1rem;">🌐</div>
                <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem;">International Buyers</h3>
                <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">
                    Serving importers, distributors, manufacturers, and businesses across global markets.
                </p>
            </div>
            <div class="gv-card" style="padding: 2rem 1.5rem; text-align: center; background: var(--color-parchment);">
                <div style="font-size: 2rem; margin-bottom: 1rem;">⚙️</div>
                <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem;">Custom Requirement</h3>
                <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">
                    Product options can be discussed based on specific buyer requirements and applications.
                </p>
            </div>
        </div>

    </div>
</section>

<!-- 6. Facilities (Warehouse & Processing) -->
<section class="gv-section">
    <div class="gv-container">
        
        <div style="max-width: 44rem; margin-bottom: 3.5rem;">
            <span class="gv-section-tag">Our Facilities</span>
            <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.5rem;">Built To Support Reliable Operations.</h2>
            <p style="color: var(--color-nw-500); font-size: 0.9375rem;">
                Our facilities support the handling, processing, storage, and preparation of Indonesian vanilla for international orders.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;" class="gv-facilities-grid">
            
            <div class="gv-card">
                <div style="height: 280px; overflow: hidden;">
                    <img src="<?php echo esc_url( $img_dir . 'Warehouse.png' ); ?>" alt="Warehouse and Storage" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 1.75rem;">
                    <span style="font-size: 0.75rem; color: var(--color-dark-khaki); font-weight: 700; text-transform: uppercase; font-family: var(--font-heading); display: block; margin-bottom: 0.25rem;">Warehouse</span>
                    <h3 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 0.5rem;">Warehouse & Storage</h3>
                    <p style="font-size: 0.875rem; color: var(--color-nw-500); line-height: 1.6;">
                        A dedicated space for storing and handling vanilla products while supporting wholesale and bulk order requirements.
                    </p>
                </div>
            </div>

            <div class="gv-card">
                <div style="height: 280px; overflow: hidden;">
                    <img src="<?php echo esc_url( $img_dir . 'Processing.png' ); ?>" alt="Processing Facility" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 1.75rem;">
                    <span style="font-size: 0.75rem; color: var(--color-dark-khaki); font-weight: 700; text-transform: uppercase; font-family: var(--font-heading); display: block; margin-bottom: 0.25rem;">Processing</span>
                    <h3 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 0.5rem;">Processing Facility</h3>
                    <p style="font-size: 0.875rem; color: var(--color-nw-500); line-height: 1.6;">
                        A dedicated facility for handling and preparing vanilla products according to product and buyer requirements.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<style>
@media (max-width: 767px) {
    .gv-facilities-grid { grid-template-columns: 1fr !important; }
}
</style>

<!-- 7. CTA Banner (High-Fidelity Figma Component) -->
<?php
get_template_part( 'template-parts/cta-banner', null, array(
    'title'    => 'Ready To Source Premium<br>Indonesian Vanilla?',
    'btn_text' => 'Get a Sample',
    'btn_url'  => home_url( '/contact/' ),
) );
?>

<?php
get_footer();
