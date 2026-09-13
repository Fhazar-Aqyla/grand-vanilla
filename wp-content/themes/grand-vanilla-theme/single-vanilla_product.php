<?php
/**
 * The template for displaying single vanilla product details & specifications
 * Perfectly aligned with the Figma Design Specification.
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
$current_id = get_the_ID();
$current_slug = get_post_field( 'post_name', $current_id );
$current_title = get_the_title();

// Check if this product is Vanilla Beans or has varieties
$is_beans = ( 
    strpos( $current_slug, 'bean' ) !== false || 
    strpos( strtolower( $current_title ), 'bean' ) !== false || 
    $current_slug === 'vanilla-beans' || 
    $current_id === 11 
);

// High-fidelity variety definitions for Vanilla Beans
$varieties = array(
    'planifolia' => array(
        'name'          => 'Vanilla Planifolia Beans',
        'short_name'    => 'Vanilla Planifolia',
        'overview'      => 'Vanilla Planifolia is known for its rich, creamy, and traditional flavor profile. Grown and harvested under strict quality controls, our beans are ideal for both gourmet culinary creation and large-scale industrial use.',
        'carousel'      => array(
            $img_dir . 'Planifolia Carroussel 1.png',
            $img_dir . 'Planifolia Carroussel 2.png',
            $img_dir . 'Planifolia Carroussel 3.png',
        ),
        'specs'         => array(
            'Aroma / Profile'    => 'Sweet, warm, and distinctly vanilla',
            'Moisture Level'     => '30-35% (Plump, oily, and flexible for maximum flavor)',
            'Appearance / Color' => 'Dark brown to black, lustrous, naturally glossy surface',
            'Terroir / Origin'   => 'East Java, Indonesia',
            'Length'             => '16 - 20 cm (Gourmet / Grade A)',
            'Usage'              => 'Industrial, Gourmet',
        ),
    ),
    'tahitensis' => array(
        'name'          => 'Vanilla Tahitensis Beans',
        'short_name'    => 'Vanilla Tahitensis',
        'overview'      => 'Vanilla Tahitensis is celebrated for its delicate, floral, and fruity aroma with subtle cherry-like undertones. Highly prized by pastry chefs and fine fragrance creators worldwide.',
        'carousel'      => array(
            $img_dir . 'Tahitensis Carroussel 1.png',
            $img_dir . 'Tahitensis Carroussel 2.png',
            $img_dir . 'Tahitensis Carroussel 3.png',
        ),
        'specs'         => array(
            'Aroma / Profile'    => 'Floral, fruity, with delicate anise and cherry undertones',
            'Moisture Level'     => '32-38% (Thick, supple, and highly aromatic)',
            'Appearance / Color' => 'Dark reddish-brown to black, plumper pod structure',
            'Terroir / Origin'   => 'Bali & Papua, Indonesia',
            'Length'             => '14 - 18 cm (Floral Gourmet Grade)',
            'Usage'              => 'Artisanal Pastry, Perfume, Gourmet Cuisine',
        ),
    ),
);

// Fallback for Seeds, Paste, or dynamic CPT data
$fallback_overview = get_the_content();
if ( empty( $fallback_overview ) ) {
    $fallback_overview = get_the_excerpt();
}
if ( empty( $fallback_overview ) ) {
    $fallback_overview = 'Grown and harvested under strict quality controls, our vanilla products are ideal for culinary creation and industrial use.';
}

$main_img = has_post_thumbnail() ? get_the_post_thumbnail_url( $current_id, 'full' ) : $img_dir . 'Planifolia Carroussel 1.png';
?>

<!-- 1. Header Navigation: Breadcrumbs & Variety Sub-Tabs -->
<div class="gv-detail-nav-section">
    <div class="gv-container">
        <!-- Breadcrumbs -->
        <nav class="gv-breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> // 
            <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Products</a> // 
            <span class="gv-crumb-current"><?php echo esc_html( $is_beans ? 'Vanilla Beans' : $current_title ); ?></span>
        </nav>

        <!-- Divider Line -->
        <div class="gv-detail-divider"></div>

        <!-- Variety Sub-tabs (Clean underline text tabs) -->
        <?php if ( $is_beans ) : ?>
        <div class="gv-variety-tabs" role="tablist" aria-label="Vanilla Bean Varieties">
            <button type="button" class="gv-variety-tab is-active" data-variety="planifolia" role="tab" aria-selected="true" id="tabPlanifolia">
                Vanilla Planifolia Beans
            </button>
            <button type="button" class="gv-variety-tab" data-variety="tahitensis" role="tab" aria-selected="false" id="tabTahitensis">
                Vanilla Tahitensis Beans
            </button>
        </div>
        <?php else : ?>
        <div class="gv-variety-tabs">
            <span class="gv-variety-tab is-active">
                <?php echo esc_html( $current_title ); ?>
            </span>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- 2. Main Content Section -->
<div class="gv-detail-main-section">
    <div class="gv-container">

        <!-- A. Product Image Showcase & Interactive Carousel -->
        <div class="gv-showcase-container">
            <div class="gv-carousel-wrap" id="gvProductCarousel">
                <div class="gv-carousel-track" id="gvCarouselTrack">
                    <?php if ( $is_beans ) : ?>
                        <?php foreach ( $varieties['planifolia']['carousel'] as $idx => $img_url ) : ?>
                            <div class="gv-carousel-slide <?php echo $idx === 0 ? 'is-active' : ''; ?>">
                                <img src="<?php echo esc_url( $img_url ); ?>" alt="Vanilla Planifolia Beans - Slide <?php echo $idx + 1; ?>">
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="gv-carousel-slide is-active">
                            <img src="<?php echo esc_url( $main_img ); ?>" alt="<?php echo esc_attr( $current_title ); ?>">
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Left Navigation Arrow -->
                <button type="button" class="gv-carousel-arrow gv-arrow-prev" id="gvCarouselPrev" aria-label="Previous image">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <!-- Right Navigation Arrow -->
                <button type="button" class="gv-carousel-arrow gv-arrow-next" id="gvCarouselNext" aria-label="Next image">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>

        <!-- B. Product Overview & Characteristics (Desktop 2-Column Grid) -->
        <div class="gv-specs-section">
            <div class="gv-specs-split">
                
                <!-- Left: Product Overview -->
                <div class="gv-overview-col">
                    <span class="gv-specs-eyebrow">PRODUCT OVERVIEW</span>
                    <h1 class="gv-overview-heading" id="gvOverviewHeading">
                        <?php echo esc_html( $is_beans ? $varieties['planifolia']['name'] : $current_title ); ?>
                    </h1>
                    <div class="gv-overview-body" id="gvOverviewBody">
                        <p><?php echo esc_html( $is_beans ? $varieties['planifolia']['overview'] : $fallback_overview ); ?></p>
                    </div>
                    <div class="gv-variety-block">
                        <strong class="gv-variety-heading">Product Variety:</strong>
                        <div class="gv-variety-bullet" id="gvVarietyBullet">
                            &bull; <?php echo esc_html( $is_beans ? $varieties['planifolia']['short_name'] : $current_title ); ?>
                        </div>
                    </div>
                </div>

                <!-- Right: Product Characteristics -->
                <div class="gv-characteristics-col">
                    <span class="gv-specs-eyebrow">PRODUCT CHARACTERISTICS</span>
                    <div class="gv-specs-table" id="gvSpecsTable">
                        <?php if ( $is_beans ) : ?>
                            <?php foreach ( $varieties['planifolia']['specs'] as $key => $val ) : ?>
                                <div class="gv-specs-row">
                                    <span class="gv-specs-key"><?php echo esc_html( $key ); ?> :</span>
                                    <span class="gv-specs-val"><?php echo esc_html( $val ); ?></span>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?php
                            $grade    = get_post_meta( $current_id, '_gv_grade', true ) ?: 'Gourmet Export Grade';
                            $vanillin = get_post_meta( $current_id, '_gv_vanillin', true ) ?: '2.0% - 2.4%';
                            $moisture = get_post_meta( $current_id, '_gv_moisture', true ) ?: '30% - 35%';
                            $length   = get_post_meta( $current_id, '_gv_length', true ) ?: '16 - 20 cm';
                            $origin   = get_post_meta( $current_id, '_gv_origin', true ) ?: 'East Java, Indonesia';
                            ?>
                            <div class="gv-specs-row">
                                <span class="gv-specs-key">Grade / Quality :</span>
                                <span class="gv-specs-val"><?php echo esc_html( $grade ); ?></span>
                            </div>
                            <div class="gv-specs-row">
                                <span class="gv-specs-key">Vanillin Content :</span>
                                <span class="gv-specs-val"><?php echo esc_html( $vanillin ); ?></span>
                            </div>
                            <div class="gv-specs-row">
                                <span class="gv-specs-key">Moisture Level :</span>
                                <span class="gv-specs-val"><?php echo esc_html( $moisture ); ?></span>
                            </div>
                            <div class="gv-specs-row">
                                <span class="gv-specs-key">Length / Size :</span>
                                <span class="gv-specs-val"><?php echo esc_html( $length ); ?></span>
                            </div>
                            <div class="gv-specs-row">
                                <span class="gv-specs-key">Origin / Terroir :</span>
                                <span class="gv-specs-val"><?php echo esc_html( $origin ); ?></span>
                            </div>
                            <div class="gv-specs-row">
                                <span class="gv-specs-key">Usage :</span>
                                <span class="gv-specs-val">Industrial, Gourmet Formulation</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>

        <!-- C. Applications Section (What Can It Be Used For?) -->
        <div class="gv-applications-section">
            <div class="gv-applications-header">
                <span class="gv-applications-tag">— Applications</span>
                <h2 class="gv-applications-title">What Can It Be Used For?</h2>
            </div>

            <div class="gv-applications-grid">
                <!-- Card 1: Bakery -->
                <div class="gv-app-card">
                    <div class="gv-app-num">1</div>
                    <h3 class="gv-app-card-title">Bakery</h3>
                    <p class="gv-app-card-desc">Adds rich vanilla flavor and aroma to cakes, pastries, and baked goods.</p>
                </div>

                <!-- Card 2: Beverage -->
                <div class="gv-app-card">
                    <div class="gv-app-num">2</div>
                    <h3 class="gv-app-card-title">Beverage</h3>
                    <p class="gv-app-card-desc">Enhances hot and cold beverages with authentic vanilla taste, from coffees to craft drinks.</p>
                </div>

                <!-- Card 3: Confectionery -->
                <div class="gv-app-card">
                    <div class="gv-app-num">3</div>
                    <h3 class="gv-app-card-title">Confectionery</h3>
                    <p class="gv-app-card-desc">Suitable for chocolates, candies, and other sweet confectionery products.</p>
                </div>

                <!-- Card 4: Dairy -->
                <div class="gv-app-card">
                    <div class="gv-app-num">4</div>
                    <h3 class="gv-app-card-title">Dairy</h3>
                    <p class="gv-app-card-desc">Provides a natural vanilla profile for ice cream, yogurt, milk, and dairy-based products.</p>
                </div>

                <!-- Card 5: Food Manufacturing -->
                <div class="gv-app-card">
                    <div class="gv-app-num">5</div>
                    <h3 class="gv-app-card-title">Food Manufacturing</h3>
                    <p class="gv-app-card-desc">Ideal for bulk production of vanilla-infused items, sauces, syrups, and packaged goods.</p>
                </div>

                <!-- Card 6: Perfume & Fragrance -->
                <div class="gv-app-card">
                    <div class="gv-app-num">6</div>
                    <h3 class="gv-app-card-title">Perfume & Fragrance</h3>
                    <p class="gv-app-card-desc">Used to add warm, sweet, and distinctive vanilla notes to perfumes and fragrances.</p>
                </div>
            </div>
        </div>

        <!-- D. Explore More Products Section -->
        <div class="gv-explore-more-section">
            <h2 class="gv-explore-title">Explore More Products</h2>

            <div class="gv-explore-rows">
                <!-- Row 1: Vanilla Seeds (Text Left, Image Right) -->
                <div class="gv-explore-row">
                    <div class="gv-explore-text-col">
                        <h3 class="gv-explore-item-title">Vanilla Seeds</h3>
                        <p class="gv-explore-item-desc">
                            Our premium vanilla seeds offer concentrated natural flavor and visual appeal for products that require genuine bean specks, like ice creams and premium baked items.
                        </p>
                        <?php
                        $seeds_post = get_page_by_path( 'vanilla-seeds', OBJECT, 'vanilla_product' );
                        $seeds_url  = $seeds_post ? get_permalink( $seeds_post->ID ) : home_url( '/products/' );
                        ?>
                        <a href="<?php echo esc_url( $seeds_url ); ?>" class="gv-explore-btn">
                            Detail &rarr;
                        </a>
                    </div>
                    <div class="gv-explore-img-card">
                        <img src="<?php echo esc_url( $img_dir . 'Seeds Vanilla.png' ); ?>" 
                             alt="Vanilla Seeds" 
                             class="gv-explore-img">
                    </div>
                </div>

                <!-- Row 2: Vanilla Paste (Image Left, Text Right) -->
                <div class="gv-explore-row gv-explore-row-reverse">
                    <div class="gv-explore-img-card">
                        <img src="<?php echo esc_url( $img_dir . 'Paste Vanilla.png' ); ?>" 
                             alt="Vanilla Paste" 
                             class="gv-explore-img">
                    </div>
                    <div class="gv-explore-text-col">
                        <h3 class="gv-explore-item-title">Vanilla Paste</h3>
                        <p class="gv-explore-item-desc">
                            A rich and convenient alternative to whole beans, crafting genuine vanilla flavor and authentic bean specks for easy everyday application.
                        </p>
                        <?php
                        $paste_post = get_page_by_path( 'vanilla-paste', OBJECT, 'vanilla_product' );
                        $paste_url  = $paste_post ? get_permalink( $paste_post->ID ) : home_url( '/products/' );
                        ?>
                        <a href="<?php echo esc_url( $paste_url ); ?>" class="gv-explore-btn">
                            Detail &rarr;
                        </a>
                    </div>
                </div>
            </div>

            <div class="gv-explore-all-wrap">
                <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" class="gv-explore-all-btn">
                    View All Products &rarr;
                </a>
            </div>
        </div>

    </div>
</div>

<!-- Variety Switcher & Interactive Carousel JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Data definition for Vanilla Beans varieties
    const varietiesData = <?php echo json_encode( $varieties ); ?>;
    let currentVariety = 'planifolia';
    let currentSlideIdx = 0;
    let carouselSlides = [];

    const tabs = document.querySelectorAll('.gv-variety-tab[data-variety]');
    const heading = document.getElementById('gvOverviewHeading');
    const body = document.getElementById('gvOverviewBody');
    const bullet = document.getElementById('gvVarietyBullet');
    const table = document.getElementById('gvSpecsTable');
    const track = document.getElementById('gvCarouselTrack');
    const prevBtn = document.getElementById('gvCarouselPrev');
    const nextBtn = document.getElementById('gvCarouselNext');

    function updateCarouselSlides() {
        if (!varietiesData[currentVariety] || !track) return;
        const images = varietiesData[currentVariety].carousel;
        track.innerHTML = '';
        images.forEach((imgUrl, idx) => {
            const slide = document.createElement('div');
            slide.className = 'gv-carousel-slide' + (idx === 0 ? ' is-active' : '');
            slide.innerHTML = `<img src="${imgUrl}" alt="${varietiesData[currentVariety].name} - Slide ${idx + 1}">`;
            track.appendChild(slide);
        });
        currentSlideIdx = 0;
        carouselSlides = track.querySelectorAll('.gv-carousel-slide');
    }

    function goToSlide(newIdx) {
        if (!carouselSlides || carouselSlides.length === 0) {
            carouselSlides = track ? track.querySelectorAll('.gv-carousel-slide') : [];
        }
        if (carouselSlides.length === 0) return;

        carouselSlides[currentSlideIdx].classList.remove('is-active');
        if (newIdx < 0) {
            currentSlideIdx = carouselSlides.length - 1;
        } else if (newIdx >= carouselSlides.length) {
            currentSlideIdx = 0;
        } else {
            currentSlideIdx = newIdx;
        }
        carouselSlides[currentSlideIdx].classList.add('is-active');
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', function(e) {
            e.preventDefault();
            goToSlide(currentSlideIdx - 1);
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            goToSlide(currentSlideIdx + 1);
        });
    }

    // Variety tab switching
    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            const varietyKey = this.getAttribute('data-variety');
            if (!varietyKey || !varietiesData[varietyKey] || varietyKey === currentVariety) return;

            currentVariety = varietyKey;

            // Update Tab active states
            tabs.forEach(t => {
                const isActive = (t === tab);
                t.classList.toggle('is-active', isActive);
                t.setAttribute('aria-selected', isActive ? 'true' : 'false');
            });

            const data = varietiesData[varietyKey];

            // Update Text Content
            if (heading) heading.textContent = data.name;
            if (body) body.innerHTML = `<p>${data.overview}</p>`;
            if (bullet) bullet.innerHTML = `&bull; ${data.short_name}`;

            // Update Characteristics Table
            if (table) {
                let tableHtml = '';
                for (const [k, v] of Object.entries(data.specs)) {
                    tableHtml += `
                        <div class="gv-specs-row">
                            <span class="gv-specs-key">${k} :</span>
                            <span class="gv-specs-val">${v}</span>
                        </div>
                    `;
                }
                table.innerHTML = tableHtml;
            }

            // Update Carousel Images
            updateCarouselSlides();
        });
    });

    // Initial setup for slides
    if (track) {
        carouselSlides = track.querySelectorAll('.gv-carousel-slide');
    }
});
</script>

<!-- High-Fidelity Styles matching the reference image perfectly -->
<style>
/* -------------------------------------------------------------
 * Top Navigation & Breadcrumbs
 * ----------------------------------------------------------- */
.gv-detail-nav-section {
    padding-top: 2rem;
    padding-bottom: 0;
    background-color: var(--color-parchment, #E1E2DD);
}

.gv-breadcrumbs {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.8125rem;
    color: #716F6E;
    margin-bottom: 1.25rem;
}

.gv-breadcrumbs a {
    color: #716F6E;
    text-decoration: none;
    transition: color 0.2s ease;
}

.gv-breadcrumbs a:hover {
    color: #363E19;
}

.gv-breadcrumbs .gv-crumb-current {
    color: #0A0804;
    font-weight: 500;
}

.gv-detail-divider {
    width: 100%;
    height: 1px;
    background-color: #C9C6C3;
    margin-bottom: 1.25rem;
}

.gv-variety-tabs {
    display: flex;
    gap: 2.25rem;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 2rem;
}

.gv-variety-tab {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.9375rem;
    font-weight: 400;
    color: #716F6E;
    background: transparent;
    border: none;
    padding: 0 0 0.35rem 0;
    cursor: pointer;
    position: relative;
    transition: color 0.2s ease;
    border-bottom: 2px solid transparent;
}

.gv-variety-tab:hover {
    color: #0A0804;
}

.gv-variety-tab.is-active {
    color: #0A0804;
    font-weight: 600;
    border-bottom: 2px solid #0A0804;
}

/* -------------------------------------------------------------
 * Main Section Layout
 * ----------------------------------------------------------- */
.gv-detail-main-section {
    background-color: var(--color-parchment, #E1E2DD);
    padding-top: 0;
    padding-bottom: 4rem;
}

/* -------------------------------------------------------------
 * Showcase & Interactive Carousel
 * ----------------------------------------------------------- */
.gv-showcase-container {
    margin-bottom: 3.5rem;
    width: 100%;
}

.gv-carousel-wrap {
    position: relative;
    width: 100%;
    height: 440px;
    border-radius: 12px;
    overflow: hidden;
    background-color: #1a1612;
    box-shadow: 0 4px 16px rgba(10, 8, 4, 0.08);
}

.gv-carousel-track {
    position: relative;
    width: 100%;
    height: 100%;
}

.gv-carousel-slide {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.4s;
    z-index: 1;
}

.gv-carousel-slide.is-active {
    opacity: 1;
    visibility: visible;
    z-index: 2;
}

.gv-carousel-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
}

.gv-carousel-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background-color: rgba(10, 8, 4, 0.65);
    color: #FFFFFF;
    border: 1px solid rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: all 0.2s ease;
    backdrop-filter: blur(4px);
}

.gv-carousel-arrow:hover {
    background-color: rgba(10, 8, 4, 0.9);
    transform: translateY(-50%) scale(1.05);
    border-color: rgba(255, 255, 255, 0.4);
}

.gv-arrow-prev {
    left: 1.5rem;
}

.gv-arrow-next {
    right: 1.5rem;
}

/* -------------------------------------------------------------
 * Product Overview & Characteristics (Desktop 2-Column Grid)
 * ----------------------------------------------------------- */
.gv-specs-section {
    margin-bottom: 5.5rem;
}

.gv-specs-split {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4.5rem;
    align-items: start;
}

.gv-specs-eyebrow {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.08em;
    color: #363E19;
    text-transform: uppercase;
    display: block;
    margin-bottom: 0.85rem;
}

.gv-overview-heading {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(1.65rem, 2.2vw, 1.95rem);
    font-weight: 500;
    color: #0A0804;
    line-height: 1.2;
    margin: 0 0 1.15rem 0;
}

.gv-overview-body {
    color: #595856;
    font-size: 0.9375rem;
    line-height: 1.7;
    margin-bottom: 1.75rem;
    max-width: 520px;
}

.gv-overview-body p {
    margin: 0;
}

.gv-variety-block {
    margin-top: 1.5rem;
}

.gv-variety-heading {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.875rem;
    font-weight: 600;
    color: #0A0804;
    display: block;
    margin-bottom: 0.35rem;
}

.gv-variety-bullet {
    font-size: 0.875rem;
    color: #595856;
}

.gv-specs-table {
    display: flex;
    flex-direction: column;
    width: 100%;
    border-top: 1px solid rgba(10, 8, 4, 0.15);
}

.gv-specs-row {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    gap: 1rem;
    padding: 0.85rem 0;
    border-bottom: 1px solid rgba(10, 8, 4, 0.15);
    font-size: 0.875rem;
}

.gv-specs-key {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-weight: 600;
    color: #0A0804;
    flex-shrink: 0;
    min-width: 155px;
}

.gv-specs-val {
    font-family: var(--font-body, 'Lato', sans-serif);
    color: #595856;
    text-align: left;
    flex: 1;
}

/* -------------------------------------------------------------
 * Applications Section (What Can It Be Used For?)
 * ----------------------------------------------------------- */
.gv-applications-section {
    margin-bottom: 6rem;
}

.gv-applications-header {
    text-align: center;
    margin-bottom: 3.5rem;
}

.gv-applications-tag {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.875rem;
    font-weight: 500;
    color: #716F6E;
    display: inline-block;
    margin-bottom: 0.5rem;
}

.gv-applications-title {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(2rem, 3.2vw, 2.5rem);
    font-weight: 500;
    color: #0A0804;
    margin: 0;
}

.gv-applications-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
}

.gv-app-card {
    background-color: #FFFFFF;
    border-radius: 12px;
    padding: 2.25rem 1.75rem 2rem;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 0 4px 16px rgba(10, 8, 4, 0.03);
    border: none;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.gv-app-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(10, 8, 4, 0.06);
}

.gv-app-num {
    background-color: #363E19;
    color: #FFFFFF;
    width: 34px;
    height: 34px;
    border-radius: 4px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 1.25rem;
}

.gv-app-card-title {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 1.15rem;
    font-weight: 500;
    color: #0A0804;
    margin: 0 0 0.65rem 0;
}

.gv-app-card-desc {
    font-family: var(--font-body, 'Lato', sans-serif);
    font-size: 0.8125rem;
    color: #716F6E;
    line-height: 1.6;
    max-width: 280px;
    margin: 0 auto;
}

/* -------------------------------------------------------------
 * Explore More Products Section
 * ----------------------------------------------------------- */
.gv-explore-more-section {
    margin-bottom: 4rem;
}

.gv-explore-title {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(2rem, 3vw, 2.35rem);
    font-weight: 500;
    color: #0A0804;
    margin: 0 0 3.5rem 0;
    text-align: left;
}

.gv-explore-rows {
    display: flex;
    flex-direction: column;
    gap: 2.5rem;
    margin-bottom: 3.5rem;
}

.gv-explore-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2.5rem;
    align-items: center;
}

.gv-explore-text-col {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    padding: 1rem 0;
}

.gv-explore-item-title {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(1.85rem, 2.5vw, 2.25rem);
    font-weight: 500;
    color: #0A0804;
    margin: 0 0 1rem 0;
    line-height: 1.2;
}

.gv-explore-item-desc {
    color: #595856;
    font-size: 0.9375rem;
    line-height: 1.65;
    margin: 0 0 2rem 0;
    max-width: 420px;
}

.gv-explore-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    border: 1px solid #363E19;
    color: #363E19;
    background: transparent;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.8125rem;
    font-weight: 500;
    padding: 0.55rem 1.4rem;
    border-radius: 2px;
    text-decoration: none;
    transition: all 0.2s ease;
}

.gv-explore-btn:hover {
    background-color: #363E19;
    color: #FFFFFF;
}

.gv-explore-img-card {
    background-color: #BDC4B8;
    border-radius: 12px;
    padding: 2.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    aspect-ratio: 1.15 / 1;
    box-sizing: border-box;
    overflow: hidden;
}

.gv-explore-img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    filter: drop-shadow(0 12px 24px rgba(0,0,0,0.07));
    transition: transform 0.4s ease;
}

.gv-explore-img-card:hover .gv-explore-img {
    transform: scale(1.03);
}

.gv-explore-all-wrap {
    text-align: center;
    margin-top: 2rem;
}

.gv-explore-all-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background-color: #363E19;
    color: #FFFFFF;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.875rem;
    font-weight: 500;
    padding: 0.75rem 2rem;
    border-radius: 2px;
    text-decoration: none;
    transition: all 0.2s ease;
}

.gv-explore-all-btn:hover {
    background-color: #272F12;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(54, 62, 25, 0.2);
}

/* -------------------------------------------------------------
 * Responsive Refinements (< 1025px)
 * ----------------------------------------------------------- */
@media (max-width: 1024px) {
    .gv-carousel-wrap {
        height: 360px;
    }
    .gv-specs-split {
        grid-template-columns: 1fr;
        gap: 2.5rem;
    }
    .gv-applications-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 767px) {
    .gv-carousel-wrap {
        height: 260px;
    }
    .gv-carousel-arrow {
        width: 36px;
        height: 36px;
    }
    .gv-arrow-prev { left: 0.75rem; }
    .gv-arrow-next { right: 0.75rem; }
    
    .gv-applications-grid {
        grid-template-columns: 1fr;
    }
    
    .gv-explore-row,
    .gv-explore-row.gv-explore-row-reverse {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .gv-explore-img-card {
        aspect-ratio: 1 / 1;
        padding: 2rem;
    }
}
</style>

<!-- CTA Banner Component -->
<?php
get_template_part( 'template-parts/cta-banner', null, array(
    'title'    => 'Ready To Source Premium<br>Indonesian Vanilla?',
    'btn_text' => 'Request a Quote',
    'btn_url'  => home_url( '/contact/' ),
) );
?>

<?php
get_footer();
