<?php
/**
 * The main template file (Blog Archive)
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();
?>

<!-- 1. Hero Section -->
<section class="gv-hero-page" style="background-image: url('<?php echo esc_url( $img_dir . 'Blog Hero Section.png' ); ?>');">
    <div class="gv-container">
        <h1 class="gv-hero-tag">#readmore</h1>
        <p class="gv-hero-subtag">Discover the latest trends on our blog!</p>
    </div>
</section>

<!-- 2. Insights List Section -->
<section class="gv-blog-archive-section">
    <div class="gv-container">

        <!-- Section Header: 2 columns -->
        <div class="gv-blog-header">
            <div class="gv-blog-header-left">
                <span class="gv-blog-tag">
                    <span class="gv-blog-tag-line"></span>
                    Blog
                </span>
                <h2 class="gv-blog-heading">Insights From The World<br>Of Vanilla</h2>
            </div>
            <div class="gv-blog-header-right">
                <p class="gv-blog-header-desc">Discover insights on Indonesian vanilla, sourcing, quality, industry trends, and applications.</p>
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="gv-blog-tabs" id="gv-blog-tabs">
            <button type="button" class="gv-blog-tab active" data-filter="all">All Blogs</button>
            <button type="button" class="gv-blog-tab" data-filter="guide">Vanilla Guide</button>
            <button type="button" class="gv-blog-tab" data-filter="insight">Vanilla Insight</button>
            <button type="button" class="gv-blog-tab" data-filter="market">Global Market</button>
        </div>

        <!-- Blog Articles List -->
        <div class="gv-blog-list" id="gv-blog-list">

            <?php
            $articles_list = array(
                array(
                    'badge'  => '12/12',
                    'cat'    => 'Vanilla Guide',
                    'filter' => 'guide',
                    'title'  => 'What Makes Indonesian Vanilla Exceptional?',
                    'desc'   => 'Discover the unique aroma, flavor, and characteristics that make Indonesian vanilla a valued ingredient for global food industries.',
                    'img'    => 'Buat Blog Example 1.png',
                    'slug'   => 'what-makes-indonesian-vanilla-exceptional',
                ),
                array(
                    'badge'  => '11/12',
                    'cat'    => 'Vanilla Insight',
                    'filter' => 'insight',
                    'title'  => 'From Vanilla Bean to Global Ingredient',
                    'desc'   => 'Explore how quality vanilla is sourced, processed, and prepared to meet the needs of international B2B buyers.',
                    'img'    => 'Buat blog example 2.png',
                    'slug'   => 'from-vanilla-bean-to-global-ingredient',
                ),
                array(
                    'badge'  => '10/12',
                    'cat'    => 'Vanilla Guide',
                    'filter' => 'guide',
                    'title'  => 'The Science of Traditional Sun Curing in Indonesian Agroforestry',
                    'desc'   => 'How temperature-controlled wooden sweat boxes and natural sun drying optimize natural vanillin hydrolyzation without chemical accelerators.',
                    'img'    => 'Buat Blog Example 1.png',
                    'slug'   => 'the-science-of-traditional-sun-curing-in-indonesian-agroforestry',
                ),
                array(
                    'badge'  => '09/12',
                    'cat'    => 'Global Market',
                    'filter' => 'market',
                    'title'  => 'FOB vs. CIF Shipping: Sourcing Vanilla Beans Directly from Indonesia',
                    'desc'   => 'A complete logistical guide for spice importers navigating phytosanitary quarantine clearance, airway bills, and vacuum packaging standards.',
                    'img'    => 'Buat blog example 2.png',
                    'slug'   => 'fob-vs-cif-shipping-sourcing-vanilla-beans-directly-from-indonesia',
                ),
            );

            foreach ( $articles_list as $i => $art ) :
                ?>
                <div class="gv-blog-item" data-cat="<?php echo esc_attr( $art['filter'] ); ?>">
                    <!-- Badge number above the image row -->
                    <span class="gv-blog-badge"><?php echo esc_html( $art['badge'] ); ?></span>

                    <!-- Image + Content row -->
                    <div class="gv-blog-row">
                        <div class="gv-blog-img-wrap">
                            <img
                                src="<?php echo esc_url( $img_dir . $art['img'] ); ?>"
                                alt="<?php echo esc_attr( $art['title'] ); ?>"
                                class="gv-blog-img"
                                loading="lazy"
                            >
                        </div>

                        <div class="gv-blog-content">
                            <span class="gv-blog-cat-tag">
                                <span class="gv-blog-cat-line"></span>
                                <?php echo esc_html( $art['cat'] ); ?>
                            </span>
                            <h3 class="gv-blog-title">
                                <a href="<?php echo esc_url( home_url( '/' . $art['slug'] . '/' ) ); ?>">
                                    <?php echo esc_html( $art['title'] ); ?>
                                </a>
                            </h3>
                            <p class="gv-blog-excerpt">
                                <?php echo esc_html( $art['desc'] ); ?>
                            </p>
                            <a href="<?php echo esc_url( home_url( '/' . $art['slug'] . '/' ) ); ?>" class="gv-blog-readmore">
                                Continue Reading &nbsp;&rarr;
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
            ?>

        </div><!-- /.gv-blog-list -->

    </div><!-- /.gv-container -->
</section>

<style>
/* ── Blog Archive Section ─────────────────────────────── */
.gv-blog-archive-section {
    background: #e8e8df;
    padding: 5rem 0 6rem;
}

/* Header */
.gv-blog-header {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
    margin-bottom: 2.5rem;
}

@media (min-width: 768px) {
    .gv-blog-header {
        grid-template-columns: 1fr 1fr;
        align-items: end;
        gap: 2rem;
        margin-bottom: 3rem;
    }
}

.gv-blog-tag {
    display: flex;
    align-items: center;
    gap: 0.625rem;
    font-size: 0.8125rem;
    font-family: var(--font-heading);
    color: var(--color-nw-500);
    letter-spacing: 0.03em;
    margin-bottom: 0.875rem;
}

.gv-blog-tag-line {
    display: inline-block;
    width: 2rem;
    height: 1px;
    background: var(--color-nw-500);
}

.gv-blog-heading {
    font-family: var(--font-heading);
    font-size: clamp(1.75rem, 3.5vw, 2.5rem);
    font-weight: 800;
    color: var(--color-dark-khaki);
    line-height: 1.2;
    margin: 0;
}

.gv-blog-header-right {
    display: flex;
    align-items: flex-end;
    justify-content: flex-end;
}

.gv-blog-header-desc {
    font-size: 0.9rem;
    color: var(--color-nw-500);
    line-height: 1.7;
    text-align: right;
    max-width: 26rem;
    margin: 0;
}

/* Filter Tabs */
.gv-blog-tabs {
    display: flex;
    gap: 0.625rem;
    flex-wrap: wrap;
    margin-bottom: 3rem;
}

.gv-blog-tab {
    padding: 0.45rem 1.125rem;
    border: 1.5px solid var(--color-dark-khaki);
    border-radius: var(--radius-4);
    background: transparent;
    font-family: var(--font-heading);
    font-size: 0.8125rem;
    font-weight: 600;
    color: var(--color-dark-khaki);
    cursor: pointer;
    transition: background 0.2s, color 0.2s;
}

.gv-blog-tab:hover,
.gv-blog-tab.active {
    background: var(--color-dark-khaki);
    color: #fff;
}

/* Blog list */
.gv-blog-list {
    display: flex;
    flex-direction: column;
    gap: 0;
}

/* Individual item */
.gv-blog-item {
    padding-bottom: 0.5rem;
    margin-bottom: 1rem;
}

/* Badge number */
.gv-blog-badge {
    display: block;
    font-family: var(--font-heading);
    font-size: clamp(3rem, 7vw, 5.5rem);
    font-weight: 800;
    color: rgba(54, 62, 25, 0.13);
    line-height: 1;
    margin-bottom: -1rem;
    letter-spacing: -0.02em;
    pointer-events: none;
    user-select: none;
}

/* Row: image + content */
.gv-blog-row {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
    align-items: center;
    margin-bottom: 3rem;
}

@media (min-width: 700px) {
    .gv-blog-row {
        grid-template-columns: 2fr 3fr;
        gap: 3rem;
    }
}

/* Image */
.gv-blog-img-wrap {
    border-radius: var(--radius-8);
    overflow: hidden;
    aspect-ratio: 4 / 3;
}

.gv-blog-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}

.gv-blog-img-wrap:hover .gv-blog-img {
    transform: scale(1.03);
}

/* Content */
.gv-blog-content {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.gv-blog-cat-tag {
    display: flex;
    align-items: center;
    gap: 0.625rem;
    font-size: 0.8125rem;
    font-family: var(--font-heading);
    color: var(--color-nw-500);
    letter-spacing: 0.03em;
}

.gv-blog-cat-line {
    display: inline-block;
    width: 1.75rem;
    height: 1px;
    background: var(--color-nw-500);
    flex-shrink: 0;
}

.gv-blog-title {
    font-family: var(--font-heading);
    font-size: clamp(1.25rem, 2.5vw, 1.75rem);
    font-weight: 800;
    color: var(--color-dark-khaki);
    line-height: 1.25;
    margin: 0;
}

.gv-blog-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.2s;
}

.gv-blog-title a:hover {
    color: var(--color-dark-khaki-hover);
}

.gv-blog-excerpt {
    font-size: 0.9rem;
    color: var(--color-nw-500);
    line-height: 1.7;
    margin: 0;
}

.gv-blog-readmore {
    display: inline-flex;
    align-items: center;
    font-size: 0.875rem;
    font-weight: 600;
    font-family: var(--font-heading);
    color: var(--color-dark-khaki);
    text-decoration: underline;
    text-underline-offset: 3px;
    transition: color 0.2s;
    margin-top: 0.25rem;
}

.gv-blog-readmore:hover {
    color: var(--color-dark-khaki-hover);
}
</style>

<script>
document.querySelectorAll('#gv-blog-tabs .gv-blog-tab').forEach(function(btn) {
    btn.addEventListener('click', function() {
        document.querySelectorAll('#gv-blog-tabs .gv-blog-tab').forEach(function(b) {
            b.classList.remove('active');
        });
        btn.classList.add('active');

        var filter = btn.getAttribute('data-filter');
        document.querySelectorAll('#gv-blog-list .gv-blog-item').forEach(function(card) {
            if (filter === 'all' || card.getAttribute('data-cat') === filter) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
</script>

<!-- 3. CTA Banner -->
<?php
get_template_part( 'template-parts/cta-banner', null, array(
    'title'    => 'Looking For A Reliable<br>Indonesian Vanilla Supplier?',
    'btn_text' => 'Request a Quote',
    'btn_url'  => home_url( '/contact/' ),
) );
?>

<?php
get_footer();
