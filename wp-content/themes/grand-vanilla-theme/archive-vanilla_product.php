<?php
/**
 * The template for displaying vanilla product catalog
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
?>

<!-- 1. Hero Section -->
<section class="gv-hero-page" style="background-image: url('<?php echo esc_url( $img_dir . 'Products Hero Section.png' ); ?>');">
    <div class="gv-container">
        <h1 class="gv-hero-tag">#ourProducts</h1>
        <p class="gv-hero-subtag">Quality vanilla products for diverse applications.</p>
    </div>
</section>

<!-- 2. Premium Products Showcase -->
<section class="gv-section">
    <div class="gv-container">
        
        <div style="max-width: 44rem; margin-bottom: 3.5rem;">
            <span class="gv-section-tag">Products</span>
            <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.5rem;">Premium Indonesian Vanilla Products</h2>
            <p style="color: var(--color-nw-500); font-size: 0.9375rem;">
                Explore our range of quality Indonesian vanilla products, carefully sourced and prepared to meet the needs of global B2B buyers.
            </p>
        </div>

        <!-- 3 Main Products (#1, #2, #3) -->
        <div class="gv-grid-3" style="margin-bottom: 5rem;">
            
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
                            Premium vanilla beans with a rich aroma and distinctive flavor.
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
                            Finely ground vanilla for versatile food and beverage applications.
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
                            Rich vanilla extract crafted for consistent flavor and aroma.
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

        <!-- 3. Explore More Products (Seeds, Paste, Bulk) -->
        <div style="margin-bottom: 3.5rem;">
            <h2 style="font-size: 2rem; font-weight: 800; margin-bottom: 2.5rem;">Explore More Products</h2>

            <div style="display: flex; flex-direction: column; gap: 3rem;">
                
                <!-- Vanilla Seeds -->
                <div style="display: grid; grid-template-columns: 1fr; gap: 2.5rem; align-items: center;" class="gv-product-row">
                    <div style="order: 2;">
                        <h3 style="font-size: 1.75rem; font-weight: 800; margin-bottom: 0.75rem;">Vanilla Seeds</h3>
                        <p style="color: var(--color-nw-500); font-size: 0.9375rem; line-height: 1.7; margin-bottom: 1.5rem; max-width: 32rem;">
                            Finely sourced vanilla seeds offering concentrated natural aroma and flavor, ideal for products that require authentic vanilla characteristics and visual appeal.
                        </p>
                        <a href="<?php echo esc_url( home_url( '/contact/?product=Vanilla+Seeds' ) ); ?>" class="gv-btn gv-btn-outline gv-btn-sm">
                            Detail &rarr;
                        </a>
                    </div>
                    <div style="order: 1; border-radius: var(--radius-16); overflow: hidden; box-shadow: var(--shadow-md);">
                        <img src="<?php echo esc_url( $img_dir . 'Seeds Vanilla.png' ); ?>" alt="Vanilla Seeds" style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                </div>

                <!-- Vanilla Paste -->
                <div style="display: grid; grid-template-columns: 1fr; gap: 2.5rem; align-items: center;" class="gv-product-row-reverse">
                    <div style="border-radius: var(--radius-16); overflow: hidden; box-shadow: var(--shadow-md);">
                        <img src="<?php echo esc_url( $img_dir . 'Paste Vanilla.png' ); ?>" alt="Vanilla Paste" style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                    <div>
                        <h3 style="font-size: 1.75rem; font-weight: 800; margin-bottom: 0.75rem;">Vanilla Paste</h3>
                        <p style="color: var(--color-nw-500); font-size: 0.9375rem; line-height: 1.7; margin-bottom: 1.5rem; max-width: 32rem;">
                            A rich and concentrated vanilla product with natural seeds, offering an intense aroma and authentic flavor for food and beverage applications.
                        </p>
                        <a href="<?php echo esc_url( home_url( '/contact/?product=Vanilla+Paste' ) ); ?>" class="gv-btn gv-btn-outline gv-btn-sm">
                            Detail &rarr;
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<style>
@media (min-width: 800px) {
    .gv-product-row { grid-template-columns: 1.2fr 1fr !important; }
    .gv-product-row > div:nth-child(1) { order: 1 !important; }
    .gv-product-row > div:nth-child(2) { order: 2 !important; }
    .gv-product-row-reverse { grid-template-columns: 1fr 1.2fr !important; }
}
</style>

<!-- 4. CTA Banner -->
<section class="gv-cta-banner">
    <div class="gv-container">
        <h2>Looking For A Reliable<br>Indonesian Vanilla Supplier?</h2>
        <div style="display: flex; justify-content: center; gap: 1rem;">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="gv-btn gv-btn-primary">
                Request a Quote
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
