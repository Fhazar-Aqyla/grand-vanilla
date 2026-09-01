<?php
/**
 * The template for displaying the Front Page (Home)
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();
$hero_title = get_theme_mod( 'gv_hero_title', 'Premium Indonesian vanilla, sourced for the global market.' );
$hero_subtitle = get_theme_mod( 'gv_hero_subtitle', 'We deliver premium Indonesian vanilla with consistent quality, reliable supply, and tailored solutions for global B2B buyers.' );
?>

<!-- 1. Hero Section -->
<section style="position: relative; background: url('<?php echo esc_url( $img_dir . 'Hero Image.png' ); ?>') center/cover no-repeat; padding: 7rem 0 6rem; color: #FFFFFF; overflow: hidden;">
    <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(10, 8, 4, 0.72) 0%, rgba(10, 8, 4, 0.85) 100%); z-index: 1;"></div>
    <div class="gv-container" style="position: relative; z-index: 2;">
        <div style="max-width: 48rem;">
            <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 800; color: #FFFFFF; line-height: 1.15; margin-bottom: 1.5rem; letter-spacing: -0.02em;">
                <?php echo esc_html( $hero_title ); ?>
            </h1>
            <p style="font-size: 1.125rem; color: var(--color-nw-200); line-height: 1.7; margin-bottom: 2.5rem; max-width: 38rem;">
                <?php echo esc_html( $hero_subtitle ); ?>
            </p>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 3.5rem;">
                <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" class="gv-btn gv-btn-primary">
                    Explore Products
                </a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="gv-btn gv-btn-outline" style="color: #FFFFFF; border-color: rgba(255,255,255,0.4); background: rgba(255,255,255,0.08);">
                    Request a Quote
                </a>
            </div>

            <!-- Floating Badge: Trusted Customers -->
            <div style="display: inline-flex; align-items: center; gap: 1rem; background: rgba(255, 255, 255, 0.12); backdrop-filter: blur(8px); padding: 0.75rem 1.5rem; border-radius: var(--radius-full); border: 1px solid rgba(255,255,255,0.2);">
                <div style="font-size: 1.5rem; font-weight: 800; font-family: var(--font-heading); color: #FFFFFF;">12+</div>
                <div style="font-size: 0.75rem; color: var(--color-nw-200); font-family: var(--font-heading); text-transform: uppercase; letter-spacing: 0.05em;">
                    Trusted Customers Worldwide &bull; 8+ Countries
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. About Us Teaser Section -->
<section class="gv-section">
    <div class="gv-container">
        <div style="display: grid; grid-template-columns: 1fr; gap: 3.5rem; align-items: center;" class="gv-about-split">
            <!-- Left: Image -->
            <div style="border-radius: var(--radius-16); overflow: hidden; box-shadow: var(--shadow-md);">
                <img src="<?php echo esc_url( $img_dir . 'About Us Image.png' ); ?>" alt="Grand Vanilla Indonesian Vanilla Beans" style="width: 100%; height: auto; object-fit: cover;">
            </div>

            <!-- Right: Content -->
            <div>
                <span class="gv-section-tag">About Us</span>
                <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 1.25rem;">Grand Vanilla Indonesia</h2>
                
                <p style="color: var(--color-nw-500); line-height: 1.7; margin-bottom: 1.25rem; font-size: 0.9375rem;">
                    Grand Vanilla Indonesia is an Indonesian vanilla supplier and exporter providing high-quality vanilla products for international buyers. We connect buyers with trusted sources of Indonesian vanilla, with a strong focus on product quality, consistent supply, and reliable service for wholesale and export needs.
                </p>
                <p style="color: var(--color-nw-500); line-height: 1.7; margin-bottom: 2rem; font-size: 0.9375rem;">
                    Operating from Java and sourcing across Indonesian growing hubs, we specialize in high-vanillin Planifolia and aromatic Tahitensis beans, carefully graded for luxury pastry, extract houses, and industrial flavor manufacturing.
                </p>

                <!-- 4 Value Pills -->
                <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 0.75rem; margin-bottom: 2rem;">
                    <div class="gv-pill gv-pill-khaki" style="justify-content: center; font-size: 0.75rem;">Premium Product Quality</div>
                    <div class="gv-pill gv-pill-khaki" style="justify-content: center; font-size: 0.75rem;">Consistent Global Supply</div>
                    <div class="gv-pill gv-pill-khaki" style="justify-content: center; font-size: 0.75rem;">Reliable Business Service</div>
                    <div class="gv-pill gv-pill-khaki" style="justify-content: center; font-size: 0.75rem;">Flexible Custom Solutions</div>
                </div>

                <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="gv-btn gv-btn-outline gv-btn-sm">
                    Learn More &rarr;
                </a>
            </div>
        </div>
    </div>
</section>

<style>
@media (min-width: 900px) {
    .gv-about-split { grid-template-columns: 1fr 1.15fr !important; }
}
</style>

<!-- 3. Products Showcase Section (#1, #2, #3) -->
<section class="gv-section" style="background-color: var(--color-warm-sand); border-top: 1px solid var(--color-nb-100); border-bottom: 1px solid var(--color-nb-100);">
    <div class="gv-container">
        
        <div style="display: flex; flex-direction: column; justify-content: space-between; align-items: flex-start; margin-bottom: 3rem; gap: 1rem;">
            <div>
                <span class="gv-section-tag">Products</span>
                <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.5rem;">Premium Indonesian Vanilla Products</h2>
                <p style="color: var(--color-nw-500); font-size: 0.9375rem; max-width: 40rem;">
                    Explore our range of quality Indonesian vanilla products, carefully sourced and prepared to meet the needs of global B2B buyers.
                </p>
            </div>
        </div>

        <div class="gv-grid-3" style="margin-bottom: 3rem;">
            
            <!-- #1 Vanilla Beans -->
            <div class="gv-card">
                <div style="position: relative; height: 260px; overflow: hidden; background: var(--color-warm-sand-alt);">
                    <img src="<?php echo esc_url( $img_dir . 'Product Unggulan 1.png' ); ?>" alt="Vanilla Beans" style="width: 100%; height: 100%; object-fit: cover;">
                    <span style="position: absolute; top: 1rem; left: 1rem; background: var(--color-dark-khaki); color: #fff; font-family: var(--font-heading); font-weight: 700; font-size: 0.8125rem; padding: 0.25rem 0.65rem; border-radius: var(--radius-4);">#1</span>
                </div>
                <div style="padding: 1.5rem; display: flex; flex-direction: column; justify-content: space-between; min-height: 180px;">
                    <div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;">Vanilla Beans</h3>
                        <p style="font-size: 0.875rem; color: var(--color-nw-500); line-height: 1.6;">
                            Premium vanilla beans with a rich aroma, high vanillin concentration, and distinctive floral-bourbon flavor.
                        </p>
                    </div>
                    <div style="display: flex; justify-content: flex-end; margin-top: 1rem;">
                        <a href="<?php echo esc_url( home_url( '/products/indonesian-planifolia-gourmet-vanilla-beans-grade-a/' ) ); ?>" class="gv-btn gv-btn-outline gv-btn-sm">
                            Detail &rarr;
                        </a>
                    </div>
                </div>
            </div>

            <!-- #2 Vanilla Powder -->
            <div class="gv-card">
                <div style="position: relative; height: 260px; overflow: hidden; background: var(--color-warm-sand-alt);">
                    <img src="<?php echo esc_url( $img_dir . 'Product Unggulan 2.png' ); ?>" alt="Vanilla Powder" style="width: 100%; height: 100%; object-fit: cover;">
                    <span style="position: absolute; top: 1rem; left: 1rem; background: var(--color-dark-khaki); color: #fff; font-family: var(--font-heading); font-weight: 700; font-size: 0.8125rem; padding: 0.25rem 0.65rem; border-radius: var(--radius-4);">#2</span>
                </div>
                <div style="padding: 1.5rem; display: flex; flex-direction: column; justify-content: space-between; min-height: 180px;">
                    <div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;">Vanilla Powder</h3>
                        <p style="font-size: 0.875rem; color: var(--color-nw-500); line-height: 1.6;">
                            Finely ground vanilla made from pure cured pods for versatile food and beverage formulations.
                        </p>
                    </div>
                    <div style="display: flex; justify-content: flex-end; margin-top: 1rem;">
                        <a href="<?php echo esc_url( home_url( '/products/indonesian-tahitensis-vanilla-beans-floral-gourmet/' ) ); ?>" class="gv-btn gv-btn-outline gv-btn-sm">
                            Detail &rarr;
                        </a>
                    </div>
                </div>
            </div>

            <!-- #3 Vanilla Extract -->
            <div class="gv-card">
                <div style="position: relative; height: 260px; overflow: hidden; background: var(--color-warm-sand-alt);">
                    <img src="<?php echo esc_url( $img_dir . 'Product Unggulan 3.png' ); ?>" alt="Vanilla Extract" style="width: 100%; height: 100%; object-fit: cover;">
                    <span style="position: absolute; top: 1rem; left: 1rem; background: var(--color-dark-khaki); color: #fff; font-family: var(--font-heading); font-weight: 700; font-size: 0.8125rem; padding: 0.25rem 0.65rem; border-radius: var(--radius-4);">#3</span>
                </div>
                <div style="padding: 1.5rem; display: flex; flex-direction: column; justify-content: space-between; min-height: 180px;">
                    <div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;">Vanilla Extract</h3>
                        <p style="font-size: 0.875rem; color: var(--color-nw-500); line-height: 1.6;">
                            Rich, concentrated vanilla extract crafted with meticulous extraction for consistent flavor and fragrance.
                        </p>
                    </div>
                    <div style="display: flex; justify-content: flex-end; margin-top: 1rem;">
                        <a href="<?php echo esc_url( home_url( '/products/indonesian-extraction-grade-vanilla-beans-grade-b/' ) ); ?>" class="gv-btn gv-btn-outline gv-btn-sm">
                            Detail &rarr;
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div style="text-align: center;">
            <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" class="gv-btn gv-btn-primary">
                View All Products &rarr;
            </a>
        </div>

    </div>
</section>

<!-- 4. Value Propositions (Your Trusted Partner) -->
<section class="gv-section">
    <div class="gv-container">
        
        <div style="text-align: center; max-width: 44rem; margin: 0 auto 3.5rem;">
            <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.75rem;">
                Your Trusted Partner For Quality Indonesian Vanilla
            </h2>
            <p style="color: var(--color-nw-500); font-size: 0.9375rem;">
                At Grand Vanilla Indonesia, we go beyond supplying vanilla. We connect international B2B buyers with quality Indonesian vanilla.
            </p>
        </div>

        <div class="gv-grid-4">
            
            <div class="gv-card" style="padding: 2rem 1.5rem; text-align: center;">
                <div style="font-size: 2rem; margin-bottom: 1rem;">🛡️</div>
                <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem;">Quality Focused</h3>
                <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">
                    We maintain product quality to meet international standards and diverse industry requirements.
                </p>
            </div>

            <div class="gv-card" style="padding: 2rem 1.5rem; text-align: center;">
                <div style="font-size: 2rem; margin-bottom: 1rem;">📦</div>
                <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem;">Consistent Supply</h3>
                <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">
                    We provide reliable vanilla supply for wholesale, bulk, and ongoing business needs.
                </p>
            </div>

            <div class="gv-card" style="padding: 2rem 1.5rem; text-align: center;">
                <div style="font-size: 2rem; margin-bottom: 1rem;">🇮🇩</div>
                <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem;">Indonesian Origin</h3>
                <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">
                    We connect global buyers with quality Indonesian vanilla known for its rich aroma and flavor.
                </p>
            </div>

            <div class="gv-card" style="padding: 2rem 1.5rem; text-align: center;">
                <div style="font-size: 2rem; margin-bottom: 1rem;">🎧</div>
                <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem;">Reliable Service</h3>
                <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">
                    We provide responsive support for international buyers and their sourcing needs.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- 5. Flexible Vanilla Supply & Special OEM -->
<section class="gv-section" style="background-color: var(--color-warm-sand); border-top: 1px solid var(--color-nb-100); border-bottom: 1px solid var(--color-nb-100);">
    <div class="gv-container">
        
        <div style="display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: center;" class="gv-oem-split">
            
            <div>
                <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 1rem; line-height: 1.2;">
                    Flexible Vanilla Supply<br>For Your Business
                </h2>
                <p style="color: var(--color-nw-500); font-size: 0.9375rem; margin-bottom: 2rem; line-height: 1.7;">
                    From high volume wholesale supply to customized vanilla solutions, we provide flexible products and services designed to meet the needs of international buyers and business partners.
                </p>

                <div class="gv-card" style="padding: 2rem; background: var(--color-parchment);">
                    <h3 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--color-dark-khaki);">Special OEM & Bulk Vanilla</h3>
                    <p style="font-size: 0.8125rem; color: var(--color-nw-500); margin-bottom: 1.5rem;">
                        Vanilla products supplied in larger quantities to support wholesalers, distributors, manufacturers, and businesses with ongoing or high volume requirements.
                    </p>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
                        <div>
                            <strong style="font-size: 0.875rem; display: block; margin-bottom: 0.25rem;">High-Volume Supply</strong>
                            <p style="font-size: 0.75rem; color: var(--color-nw-500);">Supporting larger orders for wholesalers, distributors, and manufacturers.</p>
                        </div>
                        <div>
                            <strong style="font-size: 0.875rem; display: block; margin-bottom: 0.25rem;">Consistent Quality</strong>
                            <p style="font-size: 0.75rem; color: var(--color-nw-500);">Carefully sourced vanilla with quality standards maintained across orders.</p>
                        </div>
                        <div>
                            <strong style="font-size: 0.875rem; display: block; margin-bottom: 0.25rem;">Custom Packaging</strong>
                            <p style="font-size: 0.75rem; color: var(--color-nw-500);">Packaging options can be adapted to your branding and requirements.</p>
                        </div>
                        <div>
                            <strong style="font-size: 0.875rem; display: block; margin-bottom: 0.25rem;">Flexible Quantities</strong>
                            <p style="font-size: 0.75rem; color: var(--color-nw-500);">Order volumes can be adjusted based on production needs.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div style="border-radius: var(--radius-16); overflow: hidden; box-shadow: var(--shadow-md);">
                <img src="<?php echo esc_url( $img_dir . 'Bulk  Wholesale Vanilla 1.png' ); ?>" alt="Special OEM and Bulk Vanilla" style="width: 100%; height: auto; object-fit: cover;">
            </div>

        </div>

    </div>
</section>

<style>
@media (min-width: 900px) {
    .gv-oem-split { grid-template-columns: 1.2fr 1fr !important; }
}
</style>

<!-- 6. From Indonesia To Global Markets (Peta Dunia & Buyer B2B) -->
<section class="gv-section" style="background-color: var(--color-pitch-black); color: #FFFFFF;">
    <div class="gv-container" style="text-align: center;">
        
        <div style="max-width: 44rem; margin: 0 auto 3rem;">
            <h2 style="font-size: 2.25rem; font-weight: 800; color: #FFFFFF; margin-bottom: 0.75rem;">
                From Indonesia To Global Markets
            </h2>
            <p style="color: var(--color-nw-200); font-size: 0.9375rem; line-height: 1.7;">
                We connect international B2B buyers with quality Indonesian vanilla, providing reliable wholesale and export solutions for businesses across global markets.
            </p>
        </div>

        <!-- World Map Visual -->
        <div style="margin-bottom: 3.5rem; border-radius: var(--radius-16); overflow: hidden; background: rgba(255,255,255,0.03); padding: 1.5rem; border: 1px solid rgba(255,255,255,0.1);">
            <div style="font-size: 0.8125rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--color-nw-400); margin-bottom: 1rem; font-family: var(--font-heading);">
                Connecting Indonesia To The World
            </div>
            <img src="<?php echo esc_url( $img_dir . 'Worldwide maps.png' ); ?>" alt="Global Vanilla Export Map" style="width: 100%; max-width: 860px; margin: 0 auto; height: auto;">
        </div>

        <!-- Who We Serve in Global B2B Markets -->
        <div>
            <h3 style="font-size: 1.125rem; font-weight: 700; color: #FFFFFF; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 1.5rem;">
                Who We Serve In Global B2B Markets
            </h3>

            <div style="display: flex; justify-content: center; gap: 0.75rem; flex-wrap: wrap;">
                <span class="gv-pill" style="background: transparent; color: #FFFFFF; border-color: rgba(255,255,255,0.3);">🌐 IMPORTERS</span>
                <span class="gv-pill" style="background: transparent; color: #FFFFFF; border-color: rgba(255,255,255,0.3);">📦 DISTRIBUTORS</span>
                <span class="gv-pill" style="background: transparent; color: #FFFFFF; border-color: rgba(255,255,255,0.3);">🏭 FOOD MANUFACTURERS</span>
                <span class="gv-pill" style="background: transparent; color: #FFFFFF; border-color: rgba(255,255,255,0.3);">🌿 SPICE TRADERS</span>
                <span class="gv-pill" style="background: transparent; color: #FFFFFF; border-color: rgba(255,255,255,0.3);">🥐 BAKERIES</span>
                <span class="gv-pill" style="background: transparent; color: #FFFFFF; border-color: rgba(255,255,255,0.3);">🍫 CONFECTIONERY COMPANIES</span>
            </div>
        </div>

    </div>
</section>

<!-- 7. Gallery Teaser (A Closer Look At Grand Vanilla) -->
<section class="gv-section">
    <div class="gv-container">
        
        <div style="display: flex; flex-direction: column; justify-content: space-between; align-items: flex-start; margin-bottom: 2.5rem; gap: 1rem;">
            <div>
                <span class="gv-section-tag">Gallery</span>
                <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.5rem;">A Closer Look At Grand Vanilla</h2>
                <p style="color: var(--color-nw-500); font-size: 0.9375rem;">
                    Explore the people, products, sourcing, and processes behind our Indonesian vanilla.
                </p>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.25rem; margin-bottom: 2.5rem;">
            <div class="gv-card">
                <img src="<?php echo esc_url( $img_dir . 'Gallery Example Carroussel 1.png' ); ?>" alt="Fresh Vanilla Pods" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1rem;"><strong style="font-size: 0.875rem;">Fresh Vanilla Pods</strong></div>
            </div>
            <div class="gv-card">
                <img src="<?php echo esc_url( $img_dir . 'Gallery Example Carroussel 2.png' ); ?>" alt="Premium Vanilla Beans" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1rem;"><strong style="font-size: 0.875rem;">Premium Vanilla Beans</strong></div>
            </div>
            <div class="gv-card">
                <img src="<?php echo esc_url( $img_dir . 'Gallery Example Carroussel 3.png' ); ?>" alt="Vanilla in Bloom" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1rem;"><strong style="font-size: 0.875rem;">Vanilla in Bloom</strong></div>
            </div>
            <div class="gv-card">
                <img src="<?php echo esc_url( $img_dir . 'Gallery Example Carroussel 4.png' ); ?>" alt="Indonesian Vanilla Selection" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1rem;"><strong style="font-size: 0.875rem;">Indonesian Vanilla Selection</strong></div>
            </div>
            <div class="gv-card">
                <img src="<?php echo esc_url( $img_dir . 'Gallery Example Carroussel 5.png' ); ?>" alt="Handcrafted Curing" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1rem;"><strong style="font-size: 0.875rem;">Handcrafted Curing</strong></div>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" class="gv-btn gv-btn-primary">
                View All Gallery &rarr;
            </a>
        </div>

    </div>
</section>

<!-- 8. Blog Insights Teaser -->
<section class="gv-section" style="background-color: var(--color-warm-sand); border-top: 1px solid var(--color-nb-100); border-bottom: 1px solid var(--color-nb-100);">
    <div class="gv-container">
        
        <div style="display: flex; flex-direction: column; justify-content: space-between; align-items: flex-start; margin-bottom: 3rem; gap: 1rem;">
            <div>
                <span class="gv-section-tag">Blog</span>
                <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.5rem;">Insights From The World Of Vanilla</h2>
                <p style="color: var(--color-nw-500); font-size: 0.9375rem;">
                    Discover insights on Indonesian vanilla, sourcing, quality, industry trends, and applications.
                </p>
            </div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 2rem; margin-bottom: 3rem;">
            
            <!-- Article 1 -->
            <div class="gv-card" style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; padding: 1.5rem; align-items: center;" class="gv-blog-card-split">
                <div style="position: relative; border-radius: var(--radius-12); overflow: hidden; height: 220px;">
                    <img src="<?php echo esc_url( $img_dir . 'Buat Blog Example 1.png' ); ?>" alt="What Makes Indonesian Vanilla Exceptional" style="width: 100%; height: 100%; object-fit: cover;">
                    <span style="position: absolute; top: 1rem; left: 1rem; font-size: 2.25rem; font-weight: 800; font-family: var(--font-heading); color: rgba(255,255,255,0.9); text-shadow: 0 2px 8px rgba(0,0,0,0.6);">12/12</span>
                </div>
                <div>
                    <span style="font-size: 0.8125rem; color: var(--color-dark-khaki); font-weight: 700; text-transform: uppercase; font-family: var(--font-heading); display: block; margin-bottom: 0.5rem;">Vanilla Guide</span>
                    <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 0.75rem;">What Makes Indonesian Vanilla Exceptional?</h3>
                    <p style="color: var(--color-nw-500); font-size: 0.9375rem; line-height: 1.6; margin-bottom: 1.25rem;">
                        Discover the unique aroma, flavor, and characteristics that make Indonesian vanilla a valued ingredient for global food industries.
                    </p>
                    <a href="<?php echo esc_url( home_url( '/articles/what-makes-indonesian-vanilla-exceptional/' ) ); ?>" class="gv-btn gv-btn-outline gv-btn-sm">
                        Continue Reading &rarr;
                    </a>
                </div>
            </div>

            <!-- Article 2 -->
            <div class="gv-card" style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; padding: 1.5rem; align-items: center;" class="gv-blog-card-split">
                <div style="position: relative; border-radius: var(--radius-12); overflow: hidden; height: 220px;">
                    <img src="<?php echo esc_url( $img_dir . 'Buat blog example 2.png' ); ?>" alt="From Vanilla Bean to Global Ingredient" style="width: 100%; height: 100%; object-fit: cover;">
                    <span style="position: absolute; top: 1rem; left: 1rem; font-size: 2.25rem; font-weight: 800; font-family: var(--font-heading); color: rgba(255,255,255,0.9); text-shadow: 0 2px 8px rgba(0,0,0,0.6);">11/12</span>
                </div>
                <div>
                    <span style="font-size: 0.8125rem; color: var(--color-dark-khaki); font-weight: 700; text-transform: uppercase; font-family: var(--font-heading); display: block; margin-bottom: 0.5rem;">Vanilla Insight</span>
                    <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 0.75rem;">From Vanilla Bean to Global Ingredient</h3>
                    <p style="color: var(--color-nw-500); font-size: 0.9375rem; line-height: 1.6; margin-bottom: 1.25rem;">
                        Explore how quality vanilla is sourced, processed, and prepared to meet the needs of international B2B buyers.
                    </p>
                    <a href="<?php echo esc_url( home_url( '/articles/from-vanilla-bean-to-global-ingredient/' ) ); ?>" class="gv-btn gv-btn-outline gv-btn-sm">
                        Continue Reading &rarr;
                    </a>
                </div>
            </div>

        </div>

        <div style="text-align: center;">
            <a href="<?php echo esc_url( home_url( '/articles/' ) ); ?>" class="gv-btn gv-btn-primary">
                View All Blog &rarr;
            </a>
        </div>

    </div>
</section>

<style>
@media (min-width: 800px) {
    .gv-blog-card-split { grid-template-columns: 320px 1fr !important; }
}
</style>

<!-- 9. CTA Banner -->
<section class="gv-cta-banner">
    <div class="gv-container">
        <h2>Ready To Get Your Vanilla<br>Supply Started?</h2>
        <div style="display: flex; justify-content: center; gap: 1rem;">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="gv-btn gv-btn-primary">
                Get a Sample
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
