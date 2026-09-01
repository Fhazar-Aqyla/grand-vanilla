<?php
/**
 * The template for displaying the Front Page (Home)
 *
 * @package GrandVanilla
 */

get_header();

$contact = grand_vanilla_get_contact_info();
?>

<!-- 1. Hero Section -->
<section class="gv-hero">
    <div class="gv-container">
        <span class="gv-badge gv-badge-primary">
            🌱 Direct Indonesian Agroforestry Export
        </span>

        <h1 class="gv-hero-title">
            Pure, High-Vanillin Indonesian <span style="color: var(--color-primary);">Vanilla Beans</span> For Global Markets
        </h1>

        <p class="gv-hero-subtitle">
            Hand-pollinated, harvested at peak maturity, and cured slowly under the tropical sun. We connect international buyers directly to sustainable Indonesian vanilla producers for wholesale and bulk export.
        </p>

        <div class="gv-hero-actions">
            <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" class="gv-btn gv-btn-primary">
                Explore Vanilla Catalog &rarr;
            </a>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="gv-btn gv-btn-outline">
                Request FOB / CIF Quote
            </a>
        </div>
    </div>
</section>

<!-- 2. Value Propositions / 4 Key Export Highlights -->
<section class="gv-section" style="background-color: var(--color-white); border-bottom: 1px solid var(--color-stone-200);">
    <div class="gv-container">
        <div class="gv-grid-4">
            
            <div class="gv-feature-card">
                <div class="gv-feature-icon">🌿</div>
                <h3 class="gv-feature-title">High Vanillin Content</h3>
                <p class="gv-feature-desc">
                    Naturally cured to achieve high vanillin concentrations (1.8% – 2.4%), ensuring rich, oily caviar and potent aroma.
                </p>
            </div>

            <div class="gv-feature-card">
                <div class="gv-feature-icon">☀️</div>
                <h3 class="gv-feature-title">Traditional Sun Curing</h3>
                <p class="gv-feature-desc">
                    3 to 4 months of patient wooden-box sweating and tropical sun drying without artificial chemical accelerators.
                </p>
            </div>

            <div class="gv-feature-card">
                <div class="gv-feature-icon">📦</div>
                <h3 class="gv-feature-title">Aroma-Sealed Packaging</h3>
                <p class="gv-feature-desc">
                    Food-grade wax paper bundles and multilayer vacuum packaging engineered for international air & sea freight.
                </p>
            </div>

            <div class="gv-feature-card">
                <div class="gv-feature-icon">🤝</div>
                <h3 class="gv-feature-title">Fair Trade Cooperatives</h3>
                <p class="gv-feature-desc">
                    Direct ethical partnerships with agroforestry smallholders across Bali, East Java, and Papua growing regions.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- 3. Featured Vanilla Products (Custom Post Type Query) -->
<section class="gv-section" style="background-color: var(--color-cream); border-bottom: 1px solid var(--color-stone-200);">
    <div class="gv-container">
        
        <div style="display: flex; flex-direction: column; justify-content: space-between; align-items: flex-start; margin-bottom: 3rem; gap: 1rem;">
            <div>
                <span class="gv-badge gv-badge-primary">Katalog Komoditas</span>
                <h2 style="font-size: 2rem; font-weight: 800; margin-top: 0.5rem;">Featured Vanilla Selections</h2>
            </div>
            <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" style="font-size: 0.875rem; font-weight: 700; color: var(--color-primary);">
                View All Products &rarr;
            </a>
        </div>

        <div class="gv-grid-3">
            <?php
            $products_query = new WP_Query( array(
                'post_type'      => 'vanilla_product',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ) );

            if ( $products_query->have_posts() ) :
                while ( $products_query->have_posts() ) : $products_query->the_post();
                    $vanillin = get_post_meta( get_the_ID(), '_gv_vanillin', true ) ?: '1.8% - 2.2%';
                    $moisture = get_post_meta( get_the_ID(), '_gv_moisture', true ) ?: '30% - 35%';
                    $length   = get_post_meta( get_the_ID(), '_gv_length', true ) ?: '16 - 20 cm';
                    $grade    = get_post_meta( get_the_ID(), '_gv_grade', true ) ?: 'Gourmet Grade A';
                    ?>
                    <div class="gv-product-card">
                        <div class="gv-product-thumb">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'product-card' ); ?>
                            <?php else : ?>
                                <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; color: var(--color-stone-500); font-weight: 600; font-size: 0.875rem;">
                                    <span style="font-size: 2.5rem; margin-bottom: 0.5rem;">🌱</span>
                                    <span>Indonesian Vanilla Pods</span>
                                </div>
                            <?php endif; ?>
                            <span class="gv-badge gv-badge-dark gv-product-badge"><?php echo esc_html( $grade ); ?></span>
                        </div>

                        <div class="gv-product-body">
                            <div>
                                <h3 class="gv-product-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="gv-product-desc">
                                    <?php echo wp_trim_words( get_the_excerpt() ?: get_the_content(), 18 ); ?>
                                </p>

                                <div class="gv-specs-list">
                                    <span class="gv-spec-pill">🔬 Vanillin: <?php echo esc_html( $vanillin ); ?></span>
                                    <span class="gv-spec-pill">💧 Moisture: <?php echo esc_html( $moisture ); ?></span>
                                    <span class="gv-spec-pill">📏 Length: <?php echo esc_html( $length ); ?></span>
                                </div>
                            </div>

                            <div class="gv-product-footer">
                                <a href="<?php the_permalink(); ?>" style="font-size: 0.8125rem; font-weight: 700; color: var(--color-primary);">
                                    View Full Specs &rarr;
                                </a>
                                <a href="<?php echo esc_url( home_url( '/contact/?product=' . urlencode( get_the_title() ) ) ); ?>" class="gv-btn gv-btn-primary gv-btn-sm">
                                    Inquire
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback realistic dummy products if not seeded yet
                $dummy_products = array(
                    array(
                        'title' => 'Indonesian Planifolia Gourmet Vanilla Beans (Grade A)',
                        'desc'  => 'Rich, dark, supple pods bursting with complex floral notes, buttery undertones, and high vanillin concentration for luxury culinary applications.',
                        'grade' => 'Gourmet Grade A',
                        'specs' => 'Vanillin: 2.0% - 2.4% | Moisture: 30% - 35% | Length: 16-20 cm',
                    ),
                    array(
                        'title' => 'Indonesian Tahitensis Vanilla Beans (Floral Grade)',
                        'desc'  => 'Subtle, sweet, anisic aroma profile with fruit notes. Ideal for artisanal gelato, premium perfumery, and high-end pastry creations.',
                        'grade' => 'Gourmet Floral',
                        'specs' => 'Vanillin: 1.6% - 1.9% | Moisture: 32% - 36% | Length: 15-18 cm',
                    ),
                    array(
                        'title' => 'Indonesian Extraction Grade Vanilla Beans (Grade B)',
                        'desc'  => 'High-yield, lower moisture vanilla pods tailored specifically for industrial pure vanilla extractors, flavor houses, and distillery brewing.',
                        'grade' => 'Extraction Grade B',
                        'specs' => 'Vanillin: 1.8% - 2.1% | Moisture: 20% - 25% | Length: 13-16 cm',
                    ),
                );

                foreach ( $dummy_products as $dp ) :
                    ?>
                    <div class="gv-product-card">
                        <div class="gv-product-thumb">
                            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; color: var(--color-stone-500); font-weight: 600; font-size: 0.875rem;">
                                <span style="font-size: 2.5rem; margin-bottom: 0.5rem;">🌱</span>
                                <span>Indonesian Vanilla Pods</span>
                            </div>
                            <span class="gv-badge gv-badge-dark gv-product-badge"><?php echo esc_html( $dp['grade'] ); ?></span>
                        </div>

                        <div class="gv-product-body">
                            <div>
                                <h3 class="gv-product-title">
                                    <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>"><?php echo esc_html( $dp['title'] ); ?></a>
                                </h3>
                                <p class="gv-product-desc">
                                    <?php echo esc_html( $dp['desc'] ); ?>
                                </p>
                                <div class="gv-specs-list">
                                    <span class="gv-spec-pill"><?php echo esc_html( $dp['specs'] ); ?></span>
                                </div>
                            </div>

                            <div class="gv-product-footer">
                                <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" style="font-size: 0.8125rem; font-weight: 700; color: var(--color-primary);">
                                    View Full Specs &rarr;
                                </a>
                                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="gv-btn gv-btn-primary gv-btn-sm">
                                    Inquire
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>

    </div>
</section>

<!-- 4. Quality & Curing Documentation Section -->
<section class="gv-section" style="background-color: var(--color-white); border-bottom: 1px solid var(--color-stone-200);">
    <div class="gv-container">
        <div style="display: grid; grid-template-columns: repeat(1, minmax(0, 1fr)); gap: 3rem; align-items: center;">
            <div class="gv-card" style="background: linear-gradient(135deg, #fdfbf7 0%, #f7efe4 100%);">
                <span class="gv-badge gv-badge-accent" style="margin-bottom: 1rem;">Export Quality Assurance</span>
                <h2 style="font-size: 2rem; font-weight: 800; margin-bottom: 1rem;">
                    From Indonesian Soil to Your Port of Destination
                </h2>
                <p style="color: var(--color-stone-600); margin-bottom: 1.5rem; line-height: 1.7;">
                    Every shipment from Grand Vanilla ID undergoes rigorous quality grading, moisture testing, and phytosanitary certification. Whether you require sample bundles via express air freight or multi-metric ton containerized sea shipments, we ensure full traceability back to our cooperative farms.
                </p>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
                    <div style="background: var(--color-white); padding: 1rem; border-radius: var(--radius-sm); border: 1px solid var(--color-stone-200);">
                        <strong style="color: var(--color-primary); font-size: 1.125rem; display: block;">100% Organic</strong>
                        <span style="font-size: 0.75rem; color: var(--color-stone-600);">Shade-grown agroforestry</span>
                    </div>
                    <div style="background: var(--color-white); padding: 1rem; border-radius: var(--radius-sm); border: 1px solid var(--color-stone-200);">
                        <strong style="color: var(--color-primary); font-size: 1.125rem; display: block;">Phytosanitary</strong>
                        <span style="font-size: 0.75rem; color: var(--color-stone-600);">Official quarantine certified</span>
                    </div>
                    <div style="background: var(--color-white); padding: 1rem; border-radius: var(--radius-sm); border: 1px solid var(--color-stone-200);">
                        <strong style="color: var(--color-primary); font-size: 1.125rem; display: block;">Custom OEM</strong>
                        <span style="font-size: 0.75rem; color: var(--color-stone-600);">Vacuum & private label packaging</span>
                    </div>
                </div>

                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="gv-btn gv-btn-outline">
                        Learn About Our Harvest &rarr;
                    </a>
                    <a href="<?php echo esc_url( $contact['whatsapp_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="gv-btn gv-btn-primary">
                        💬 Direct WhatsApp Inquiries
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. B2B Quotation CTA Banner (PRD Aligned) -->
<section class="gv-section-sm" style="background-color: var(--color-dark); color: var(--color-white); text-align: center;">
    <div class="gv-container">
        <h2 style="font-size: 2.25rem; font-weight: 800; color: #ffffff; margin-bottom: 1rem;">
            Ready to Source Premium Indonesian Vanilla?
        </h2>
        <p style="color: var(--color-stone-300); max-width: 36rem; margin: 0 auto 2rem; font-size: 1rem;">
            Request our comprehensive laboratory test certificates, FOB/CIF pricing schedule, and physical vanilla pod samples today.
        </p>
        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="gv-btn gv-btn-primary">
                Submit Inquiry Form &rarr;
            </a>
            <a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>" class="gv-btn gv-btn-outline" style="color: #ffffff; border-color: rgba(255,255,255,0.3); background: transparent;">
                Email: <?php echo esc_html( $contact['email'] ); ?>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
