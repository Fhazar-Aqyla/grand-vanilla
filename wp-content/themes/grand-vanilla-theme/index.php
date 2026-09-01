<?php
/**
 * The main template file (Blog Archive)
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
?>

<!-- 1. Hero Section -->
<section class="gv-hero-page" style="background-image: url('<?php echo esc_url( $img_dir . 'Blog Hero Section.png' ); ?>');">
    <div class="gv-container">
        <h1 class="gv-hero-tag">#readmore</h1>
        <p class="gv-hero-subtag">Discover the latest trends on our blog!</p>
    </div>
</section>

<!-- 2. Insights List Section -->
<section class="gv-section">
    <div class="gv-container">
        
        <div style="display: flex; flex-direction: column; justify-content: space-between; margin-bottom: 3rem; gap: 1.5rem;">
            <div>
                <span class="gv-section-tag">Blog</span>
                <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.5rem;">Insights From The World Of Vanilla</h2>
                <p style="color: var(--color-nw-500); font-size: 0.9375rem;">
                    Discover insights on Indonesian vanilla, sourcing, quality, industry trends, and applications.
                </p>
            </div>

            <!-- Filter Tabs -->
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <button type="button" class="gv-pill gv-pill-khaki" style="cursor: pointer;">All Blogs</button>
                <button type="button" class="gv-pill" style="cursor: pointer;">Vanilla Guide</button>
                <button type="button" class="gv-pill" style="cursor: pointer;">Vanilla Insight</button>
                <button type="button" class="gv-pill" style="cursor: pointer;">Global Market</button>
            </div>
        </div>

        <!-- Blog Articles List -->
        <div style="display: flex; flex-direction: column; gap: 2rem; margin-bottom: 4rem;">
            
            <?php
            $articles_list = array(
                array(
                    'badge' => '12/12',
                    'cat'   => 'Vanilla Guide',
                    'title' => 'What Makes Indonesian Vanilla Exceptional?',
                    'desc'  => 'Discover the unique aroma, flavor, and characteristics that make Indonesian vanilla a valued ingredient for global food industries.',
                    'img'   => 'Buat Blog Example 1.png',
                    'slug'  => 'what-makes-indonesian-vanilla-exceptional',
                ),
                array(
                    'badge' => '11/12',
                    'cat'   => 'Vanilla Insight',
                    'title' => 'From Vanilla Bean to Global Ingredient',
                    'desc'  => 'Explore how quality vanilla is sourced, processed, and prepared to meet the needs of international B2B buyers.',
                    'img'   => 'Buat blog example 2.png',
                    'slug'  => 'from-vanilla-bean-to-global-ingredient',
                ),
                array(
                    'badge' => '10/12',
                    'cat'   => 'Vanilla Guide',
                    'title' => 'The Science of Traditional Sun Curing in Indonesian Agroforestry',
                    'desc'  => 'How temperature-controlled wooden sweat boxes and natural sun drying optimize natural vanillin hydrolyzation without chemical accelerators.',
                    'img'   => 'Buat Blog Example 1.png',
                    'slug'  => 'the-science-of-traditional-sun-curing-in-indonesian-agroforestry',
                ),
                array(
                    'badge' => '09/12',
                    'cat'   => 'Global Market',
                    'title' => 'FOB vs. CIF Shipping: Sourcing Vanilla Beans Directly from Indonesia',
                    'desc'  => 'A complete logistical guide for spice importers navigating phytosanitary quarantine clearance, airway bills, and vacuum packaging standards.',
                    'img'   => 'Buat blog example 2.png',
                    'slug'  => 'fob-vs-cif-shipping-sourcing-vanilla-beans-directly-from-indonesia',
                ),
            );

            foreach ( $articles_list as $art ) :
                ?>
                <div class="gv-card" style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; padding: 1.5rem; align-items: center;" class="gv-blog-card-split">
                    <div style="position: relative; border-radius: var(--radius-12); overflow: hidden; height: 220px; background: var(--color-warm-sand-alt);">
                        <img src="<?php echo esc_url( $img_dir . $art['img'] ); ?>" alt="<?php echo esc_attr( $art['title'] ); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <span style="position: absolute; top: 1rem; left: 1rem; font-size: 2.25rem; font-weight: 800; font-family: var(--font-heading); color: rgba(255,255,255,0.9); text-shadow: 0 2px 8px rgba(0,0,0,0.6);"><?php echo esc_html( $art['badge'] ); ?></span>
                    </div>
                    <div>
                        <span style="font-size: 0.8125rem; color: var(--color-dark-khaki); font-weight: 700; text-transform: uppercase; font-family: var(--font-heading); display: block; margin-bottom: 0.5rem;"><?php echo esc_html( $art['cat'] ); ?></span>
                        <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 0.75rem;">
                            <a href="<?php echo esc_url( home_url( '/articles/' . $art['slug'] . '/' ) ); ?>"><?php echo esc_html( $art['title'] ); ?></a>
                        </h3>
                        <p style="color: var(--color-nw-500); font-size: 0.9375rem; line-height: 1.6; margin-bottom: 1.25rem;">
                            <?php echo esc_html( $art['desc'] ); ?>
                        </p>
                        <a href="<?php echo esc_url( home_url( '/articles/' . $art['slug'] . '/' ) ); ?>" class="gv-btn gv-btn-outline gv-btn-sm">
                            Continue Reading &rarr;
                        </a>
                    </div>
                </div>
                <?php
            endforeach;
            ?>

        </div>

    </div>
</section>

<!-- 3. CTA Banner -->
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
