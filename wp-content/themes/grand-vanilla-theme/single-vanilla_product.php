<?php
/**
 * The template for displaying single vanilla product details & specifications
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
?>

<div class="gv-section-sm" style="border-bottom: 1px solid var(--color-nb-100); padding-bottom: 1.5rem;">
    <div class="gv-container">
        <!-- Breadcrumbs -->
        <div style="font-size: 0.8125rem; color: var(--color-nw-500); font-family: var(--font-heading); margin-bottom: 1.5rem;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: var(--color-nw-500);">Home</a> // 
            <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" style="color: var(--color-nw-500);">Products</a> // 
            <span style="color: var(--color-pitch-black); font-weight: 700;"><?php the_title(); ?></span>
        </div>

        <!-- Product Sub-tabs -->
        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <a href="<?php echo esc_url( home_url( '/products/indonesian-planifolia-gourmet-vanilla-beans-grade-a/' ) ); ?>" class="gv-pill <?php echo is_single('indonesian-planifolia-gourmet-vanilla-beans-grade-a') ? 'gv-pill-khaki' : ''; ?>">
                Vanilla Planifolia Beans
            </a>
            <a href="<?php echo esc_url( home_url( '/products/indonesian-tahitensis-vanilla-beans-floral-gourmet/' ) ); ?>" class="gv-pill <?php echo is_single('indonesian-tahitensis-vanilla-beans-floral-gourmet') ? 'gv-pill-khaki' : ''; ?>">
                Vanilla Tahitensis Beans
            </a>
        </div>
    </div>
</div>

<div class="gv-section">
    <div class="gv-container">
        
        <!-- Product Carousel & Overview Grid -->
        <div style="margin-bottom: 4rem;">
            <!-- Main Product Image -->
            <div style="border-radius: var(--radius-16); overflow: hidden; box-shadow: var(--shadow-md); margin-bottom: 3rem; background: var(--color-warm-sand-alt); max-height: 480px;">
                <img src="<?php echo esc_url( $img_dir . 'Planifolia Carroussel 1.png' ); ?>" alt="<?php the_title(); ?>" style="width: 100%; height: 100%; object-fit: cover;">
            </div>

            <!-- Overview & Characteristics Grid -->
            <div style="display: grid; grid-template-columns: 1fr; gap: 3rem;" class="gv-specs-split">
                
                <!-- Left: Product Overview -->
                <div class="gv-card" style="padding: 2rem; background: var(--color-parchment);">
                    <span style="font-size: 0.75rem; color: var(--color-dark-khaki); font-weight: 700; text-transform: uppercase; font-family: var(--font-heading); display: block; margin-bottom: 0.5rem;">PRODUCT OVERVIEW</span>
                    <h2 style="font-size: 1.75rem; font-weight: 800; margin-bottom: 1rem;"><?php the_title(); ?></h2>
                    <p style="color: var(--color-nw-500); font-size: 0.9375rem; line-height: 1.7; margin-bottom: 1.5rem;">
                        Premium Indonesian vanilla Planifolia beans with a rich aroma, naturally sweet flavor, and distinctive characteristics, suitable for various food and beverage applications.
                    </p>
                    <div>
                        <strong style="font-size: 0.875rem; display: block; margin-bottom: 0.25rem;">Product Variety:</strong>
                        <span style="font-size: 0.875rem; color: var(--color-nw-500);">&bull; Vanilla Planifolia</span>
                    </div>
                </div>

                <!-- Right: Product Characteristics -->
                <div class="gv-card" style="padding: 2rem; background: var(--color-parchment);">
                    <span style="font-size: 0.75rem; color: var(--color-dark-khaki); font-weight: 700; text-transform: uppercase; font-family: var(--font-heading); display: block; margin-bottom: 1rem;">PRODUCT CHARACTERISTICS</span>
                    
                    <div style="display: flex; flex-direction: column; gap: 0.85rem; font-size: 0.875rem;">
                        <div><strong style="color: var(--color-pitch-black);">Aroma :</strong> <span style="color: var(--color-nw-500);">Rich, sweet, warm, and naturally aromatic</span></div>
                        <div><strong style="color: var(--color-pitch-black);">Flavor Profile :</strong> <span style="color: var(--color-nw-500);">Smooth, sweet, creamy, with distinctive vanilla notes</span></div>
                        <div><strong style="color: var(--color-pitch-black);">Appearance / Color :</strong> <span style="color: var(--color-nw-500);">Dark brown to deep black with a naturally glossy surface</span></div>
                        <div><strong style="color: var(--color-pitch-black);">Texture / Consistency :</strong> <span style="color: var(--color-nw-500);">Soft, pliable, moist, and slightly oily</span></div>
                        <div><strong style="color: var(--color-pitch-black);">Bean Form :</strong> <span style="color: var(--color-nw-500);">Whole vanilla beans / pods</span></div>
                        <div><strong style="color: var(--color-pitch-black);">Origin :</strong> <span style="color: var(--color-nw-500);">Jember, Indonesia</span></div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Applications Section (What Can It Be Used For?) -->
        <div style="margin-bottom: 5rem;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <span class="gv-section-tag" style="justify-content: center;">Applications</span>
                <h2 style="font-size: 2.25rem; font-weight: 800;">What Can It Be Used For?</h2>
            </div>

            <div class="gv-grid-3">
                <div class="gv-card" style="padding: 1.75rem; text-align: center;">
                    <div style="font-size: 1.5rem; font-weight: 800; color: var(--color-dark-khaki); font-family: var(--font-heading); margin-bottom: 0.5rem;">1</div>
                    <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem;">Bakery</h3>
                    <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">Adds rich vanilla aroma and flavor to cakes, pastries, and baked goods.</p>
                </div>
                <div class="gv-card" style="padding: 1.75rem; text-align: center;">
                    <div style="font-size: 1.5rem; font-weight: 800; color: var(--color-dark-khaki); font-family: var(--font-heading); margin-bottom: 0.5rem;">2</div>
                    <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem;">Beverage</h3>
                    <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">Used to enhance the aroma and flavor of coffee, drinks, and specialty beverages.</p>
                </div>
                <div class="gv-card" style="padding: 1.75rem; text-align: center;">
                    <div style="font-size: 1.5rem; font-weight: 800; color: var(--color-dark-khaki); font-family: var(--font-heading); margin-bottom: 0.5rem;">3</div>
                    <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem;">Confectionery</h3>
                    <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">Suitable for chocolates, candies, and other sweet confectionery products.</p>
                </div>
                <div class="gv-card" style="padding: 1.75rem; text-align: center;">
                    <div style="font-size: 1.5rem; font-weight: 800; color: var(--color-dark-khaki); font-family: var(--font-heading); margin-bottom: 0.5rem;">4</div>
                    <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem;">Dairy</h3>
                    <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">Provides a natural vanilla profile for ice cream, yogurt, milk, and dairy-based products.</p>
                </div>
                <div class="gv-card" style="padding: 1.75rem; text-align: center;">
                    <div style="font-size: 1.5rem; font-weight: 800; color: var(--color-dark-khaki); font-family: var(--font-heading); margin-bottom: 0.5rem;">5</div>
                    <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem;">Food Manufacturing</h3>
                    <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">Suitable as a natural vanilla ingredient for various processed food applications.</p>
                </div>
                <div class="gv-card" style="padding: 1.75rem; text-align: center;">
                    <div style="font-size: 1.5rem; font-weight: 800; color: var(--color-dark-khaki); font-family: var(--font-heading); margin-bottom: 0.5rem;">6</div>
                    <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem;">Perfume & Fragrance</h3>
                    <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">Used to add warm, sweet, and distinctive vanilla notes to perfumes and fragrance.</p>
                </div>
            </div>
        </div>

        <!-- Explore More Products Section -->
        <div style="margin-bottom: 3.5rem;">
            <h2 style="font-size: 2rem; font-weight: 800; margin-bottom: 2.5rem;">Explore More Products</h2>

            <div style="display: flex; flex-direction: column; gap: 3rem; margin-bottom: 3rem;">
                <div style="display: grid; grid-template-columns: 1fr; gap: 2.5rem; align-items: center;" class="gv-product-row">
                    <div>
                        <h3 style="font-size: 1.75rem; font-weight: 800; margin-bottom: 0.75rem;">Vanilla Seeds</h3>
                        <p style="color: var(--color-nw-500); font-size: 0.9375rem; line-height: 1.7; margin-bottom: 1.5rem; max-width: 32rem;">
                            Finely sourced vanilla seeds offering concentrated natural aroma and flavor, ideal for products that require authentic vanilla characteristics and visual appeal.
                        </p>
                        <a href="<?php echo esc_url( home_url( '/contact/?product=Vanilla+Seeds' ) ); ?>" class="gv-btn gv-btn-outline gv-btn-sm">Detail &rarr;</a>
                    </div>
                    <div style="border-radius: var(--radius-16); overflow: hidden; box-shadow: var(--shadow-md);">
                        <img src="<?php echo esc_url( $img_dir . 'Seeds Vanilla.png' ); ?>" alt="Vanilla Seeds" style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr; gap: 2.5rem; align-items: center;" class="gv-product-row-reverse">
                    <div style="border-radius: var(--radius-16); overflow: hidden; box-shadow: var(--shadow-md);">
                        <img src="<?php echo esc_url( $img_dir . 'Paste Vanilla.png' ); ?>" alt="Vanilla Paste" style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                    <div>
                        <h3 style="font-size: 1.75rem; font-weight: 800; margin-bottom: 0.75rem;">Vanilla Paste</h3>
                        <p style="color: var(--color-nw-500); font-size: 0.9375rem; line-height: 1.7; margin-bottom: 1.5rem; max-width: 32rem;">
                            A rich and concentrated vanilla product with natural seeds, offering an intense aroma and authentic flavor for food and beverage applications.
                        </p>
                        <a href="<?php echo esc_url( home_url( '/contact/?product=Vanilla+Paste' ) ); ?>" class="gv-btn gv-btn-outline gv-btn-sm">Detail &rarr;</a>
                    </div>
                </div>
            </div>

            <div style="text-align: center;">
                <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" class="gv-btn gv-btn-primary">
                    View All Products &rarr;
                </a>
            </div>
        </div>

    </div>
</div>

<style>
@media (min-width: 900px) {
    .gv-specs-split { grid-template-columns: 1fr 1fr !important; }
}
</style>

<!-- CTA Banner -->
<section class="gv-cta-banner">
    <div class="gv-container">
        <h2>Ready To Source Premium<br>Indonesian Vanilla?</h2>
        <div style="display: flex; justify-content: center; gap: 1rem;">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="gv-btn gv-btn-primary">
                Request a Quote
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
