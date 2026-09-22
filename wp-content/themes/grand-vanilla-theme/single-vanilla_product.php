<?php
/**
 * The template for displaying single vanilla product details & specifications
 * Perfectly aligned with the Figma Design Specification.
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();
$current_id = get_the_ID();
$current_slug = get_post_field( 'post_name', $current_id );
$current_title = get_the_title();

// Check if this product is specifically Vanilla Beans or has varieties configured
$saved_varieties = get_post_meta( $current_id, '_gv_varieties', true );

$is_beans = ( 
    $current_slug === 'vanilla-beans' || 
    strtolower( trim( $current_title ) ) === 'vanilla beans' ||
    ! empty( $saved_varieties )
);

// Default variety definitions for Vanilla Beans
$default_varieties = array(
    'planifolia' => array(
        'name'          => 'Vanilla Planifolia Beans',
        'short_name'    => 'Vanilla Planifolia',
        'overview'      => 'Premium Indonesian vanilla Planifolia beans with a rich aroma, naturally sweet flavor, and distinctive characteristics, suitable for various food and beverage applications.',
        'carousel'      => array(
            gv_asset_img( 'Planifolia Carroussel 1.png' ),
            gv_asset_img( 'Planifolia Carroussel 2.png' ),
            gv_asset_img( 'Planifolia Carroussel 3.png' ),
        ),
        'specs'         => array(
            'Aroma'                 => 'Rich, sweet, warm, and naturally aromatic',
            'Flavor Profile'        => 'Smooth, sweet, creamy, with distinctive vanilla notes',
            'Appearance / Color'    => 'Dark brown to deep black with a naturally glossy surface',
            'Texture / Consistency' => 'Soft, pliable, moist, and slightly oily',
            'Bean Form'             => 'Whole vanilla beans / pods',
            'Origin'                => 'Jember, Indonesia',
        ),
    ),
    'tahitensis' => array(
        'name'          => 'Vanilla Tahitensis Beans',
        'short_name'    => 'Vanilla Tahitensis',
        'overview'      => 'Vanilla Tahitensis is celebrated for its delicate, floral, and fruity aroma with subtle cherry-like undertones. Highly prized by pastry chefs and fine fragrance creators worldwide.',
        'carousel'      => array(
            gv_asset_img( 'Tahitensis Carroussel 1.png' ),
            gv_asset_img( 'Tahitensis Carroussel 2.png' ),
            gv_asset_img( 'Tahitensis Carroussel 3.png' ),
        ),
        'specs'         => array(
            'Aroma'                 => 'Floral, fruity, with delicate anise and cherry undertones',
            'Flavor Profile'        => 'Delicate, sweet, floral with stone fruit notes',
            'Appearance / Color'    => 'Dark reddish-brown to black, plumper pod structure',
            'Texture / Consistency' => 'Thick, supple, highly aromatic and moist',
            'Bean Form'             => 'Whole vanilla beans / pods',
            'Origin'                => 'Bali & Papua, Indonesia',
        ),
    ),
);

// Merge with saved postmeta varieties if present
$varieties = array();
if ( ! empty( $saved_varieties ) && is_array( $saved_varieties ) ) {
    foreach ( $saved_varieties as $k => $v ) {
        $slug_key = ! empty( $v['short_name'] ) ? sanitize_title( $v['short_name'] ) : 'variety-' . $k;
        $varieties[ $slug_key ] = $v;
    }
}

if ( empty( $varieties ) && $is_beans ) {
    $varieties = $default_varieties;
}

$first_variety_key = ! empty( $varieties ) ? array_key_first( $varieties ) : '';
$active_variety    = ! empty( $first_variety_key ) ? $varieties[ $first_variety_key ] : null;

// Product-specific non-bean carousel images
$product_carousels = array(
    'vanilla-powder' => array(
        gv_asset_img( 'Powder Carroussel 1.jpg' ),
        gv_asset_img( 'Powder Carroussel 2.jpg' ),
        gv_asset_img( 'Powder Carroussel 3.jpg' ),
    ),
    'vanilla-extract' => array(
        gv_asset_img( 'Extract Carroussel 1.jpg' ),
        gv_asset_img( 'Extract Carroussel 2.jpg' ),
        gv_asset_img( 'Extract Carroussel 3.jpg' ),
    ),
    'vanilla-paste' => array(
        gv_asset_img( 'Paste Carroussel 1.jpg' ),
    ),
    'vanilla-seeds' => array(
        gv_asset_img( 'Seeds Carroussel 1.jpg' ),
    ),
);

// Determine carousel slides for this product
if ( $is_beans && ! empty( $active_variety['carousel'] ) ) {
    $current_carousel = $active_variety['carousel'];
} elseif ( isset( $product_carousels[ $current_slug ] ) ) {
    $current_carousel = $product_carousels[ $current_slug ];
} elseif ( has_post_thumbnail() ) {
    $current_carousel = array( get_the_post_thumbnail_url( $current_id, 'full' ) );
} else {
    $current_carousel = array( gv_asset_img( 'Planifolia Carroussel 1.png' ) );
}

// Fallback for overview & description
$fallback_overview = get_the_content();
if ( empty( $fallback_overview ) ) {
    $fallback_overview = get_the_excerpt();
}
if ( empty( $fallback_overview ) ) {
    if ( $current_slug === 'vanilla-powder' ) {
        $fallback_overview = 'Our Indonesian Vanilla Powder is made exclusively from 100% pure, premium cured vanilla beans. Milled to a fine texture without carriers, anti-caking agents, or added sugar, it delivers an authentic, deep vanilla aroma and robust flavor that stands up to high-heat baking and dry culinary mixes.';
    } elseif ( $current_slug === 'vanilla-extract' ) {
        $fallback_overview = 'Grand Vanilla Indonesia Pure Vanilla Extract is crafted through slow cold percolation of our finest cured vanilla beans. Providing a rich, well-rounded bouquet with sweet bourbon notes, it ensures maximum aromatic stability in dairy, beverages, and confectionery production.';
    } elseif ( $current_slug === 'vanilla-paste' ) {
        $fallback_overview = 'Grand Vanilla Indonesia Bean Paste combines pure vanilla extract with concentrated vanilla caviar seeds in a smooth, viscous base. It offers chefs and manufacturers the convenience of an extract with the visual allure and deep flavor of whole vanilla pods.';
    } elseif ( $current_slug === 'vanilla-seeds' ) {
        $fallback_overview = 'Our pure Vanilla Seeds (Vanilla Caviar) are meticulously separated from cured gourmet vanilla pods. Perfect for imparting the iconic natural vanilla speckles and delicate aroma to yogurts, gelato, custards, and artisan chocolates.';
    } else {
        $fallback_overview = 'Grown and harvested under strict quality controls, our vanilla products are ideal for culinary creation and industrial use.';
    }
}

// Product Variety / Bullet text
$variety_bullet_text = $active_variety ? $active_variety['short_name'] : $current_title;
if ( ! $is_beans ) {
    if ( $current_slug === 'vanilla-powder' ) {
        $variety_bullet_text = '100% Pure Fine Ground Powder';
    } elseif ( $current_slug === 'vanilla-extract' ) {
        $variety_bullet_text = 'Single-Fold & Multi-Fold Pure Extract';
    } elseif ( $current_slug === 'vanilla-paste' ) {
        $variety_bullet_text = 'Concentrated Gourmet Bean Paste with Seeds';
    } elseif ( $current_slug === 'vanilla-seeds' ) {
        $variety_bullet_text = '100% Pure Vanilla Caviar / Seeds';
    }
}

// Product Characteristics Specs Table
$custom_specs = array();
if ( $is_beans && ! empty( $active_variety['specs'] ) ) {
    $custom_specs = $active_variety['specs'];
} elseif ( $current_slug === 'vanilla-powder' ) {
    $custom_specs = array(
        'Grade / Quality'    => get_post_meta( $current_id, '_gv_grade', true ) ?: '100% Pure Fine Ground Powder',
        'Mesh Size'          => get_post_meta( $current_id, '_gv_length', true ) ?: '60 - 80 Mesh Size',
        'Vanillin Content'   => get_post_meta( $current_id, '_gv_vanillin', true ) ?: '1.5% - 2.2%',
        'Moisture Level'     => get_post_meta( $current_id, '_gv_moisture', true ) ?: '≤ 10% (Low Moisture)',
        'Ingredients'        => '100% Pure Indonesian Vanilla Beans (No Additives)',
        'Origin / Terroir'   => get_post_meta( $current_id, '_gv_origin', true ) ?: 'Indonesia (East Java & Papua)',
        'Usage'              => get_post_meta( $current_id, '_gv_usage', true ) ?: 'Bakery, Dry Mixes, Dairy & Confectionery',
    );
} elseif ( $current_slug === 'vanilla-extract' ) {
    $custom_specs = array(
        'Concentration'      => get_post_meta( $current_id, '_gv_grade', true ) ?: 'Single-Fold (1x) & Multi-Fold (2x, 3x)',
        'Alcohol Content'    => get_post_meta( $current_id, '_gv_vanillin', true ) ?: '35% Pure Grain Alcohol (or Glycerin base)',
        'Appearance / Color' => get_post_meta( $current_id, '_gv_moisture', true ) ?: 'Clear Dark Amber Brown',
        'Standard'           => 'Gourmet & Industrial Extraction Grade',
        'Origin / Terroir'   => get_post_meta( $current_id, '_gv_origin', true ) ?: 'Indonesia (East Java & Papua)',
        'Packaging'          => '1L Bottles, 5L Jugs, 25L Drums, IBC Totes',
        'Usage'              => get_post_meta( $current_id, '_gv_usage', true ) ?: 'Beverages, Dairy, Pastry, Industrial Food Service',
    );
} elseif ( $current_slug === 'vanilla-paste' ) {
    $custom_specs = array(
        'Grade / Quality'    => get_post_meta( $current_id, '_gv_grade', true ) ?: 'Gourmet Concentrated Paste with Seeds',
        'Consistency'        => get_post_meta( $current_id, '_gv_moisture', true ) ?: 'Smooth Viscous Texture',
        'Seed Specks'        => 'Abundant Real Vanilla Seeds (Caviar)',
        'Vanillin Content'   => get_post_meta( $current_id, '_gv_vanillin', true ) ?: 'High Concentration + Natural Caviar',
        'Origin / Terroir'   => get_post_meta( $current_id, '_gv_origin', true ) ?: 'Indonesia',
        'Packaging'          => '1kg Jars, 5kg Pails, 20kg Bulk',
        'Usage'              => get_post_meta( $current_id, '_gv_usage', true ) ?: 'Gourmet Pastry, Gelato, Frostings, Specialty Baking',
    );
} elseif ( $current_slug === 'vanilla-seeds' ) {
    $custom_specs = array(
        'Product Type'       => get_post_meta( $current_id, '_gv_grade', true ) ?: '100% Pure Vanilla Caviar / Seeds',
        'Appearance'         => get_post_meta( $current_id, '_gv_length', true ) ?: 'Tiny Glossy Black Seeds',
        'Moisture Level'     => get_post_meta( $current_id, '_gv_moisture', true ) ?: '15% - 20%',
        'Purity'             => '100% Extracted Pure Seeds (No carriers)',
        'Origin / Terroir'   => get_post_meta( $current_id, '_gv_origin', true ) ?: 'Indonesia',
        'Packaging'          => '500g / 1kg Vacuum Sealed',
        'Usage'              => get_post_meta( $current_id, '_gv_usage', true ) ?: 'Gelato, Custard, Yogurt, Luxury Chocolates',
    );
} else {
    $custom_specs = array(
        'Grade / Quality'    => get_post_meta( $current_id, '_gv_grade', true ) ?: 'Gourmet Export Grade',
        'Vanillin Content'   => get_post_meta( $current_id, '_gv_vanillin', true ) ?: '2.0% - 2.4%',
        'Moisture Level'     => get_post_meta( $current_id, '_gv_moisture', true ) ?: '30% - 35%',
        'Length / Size'      => get_post_meta( $current_id, '_gv_length', true ) ?: '16 - 20 cm',
        'Origin / Terroir'   => get_post_meta( $current_id, '_gv_origin', true ) ?: 'East Java, Indonesia',
        'Usage'              => get_post_meta( $current_id, '_gv_usage', true ) ?: 'Industrial, Gourmet Formulation',
    );
}
?>

<!-- 1. Header Navigation: Breadcrumbs & Variety Sub-Tabs -->
<div class="gv-detail-nav-section">
    <div class="gv-container">
        <!-- Breadcrumbs -->
        <nav class="gv-breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> // 
            <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Products</a> // 
            <span class="gv-crumb-current"><?php echo esc_html( $current_title ); ?></span>
        </nav>

        <!-- Divider Line -->
        <div class="gv-detail-divider"></div>

        <!-- Variety Sub-tabs -->
        <?php if ( $is_beans && ! empty( $varieties ) ) : ?>
        <div class="gv-variety-tabs" role="tablist" aria-label="Vanilla Varieties">
            <?php 
            $tab_idx = 0;
            foreach ( $varieties as $v_key => $v_data ) : 
                $is_active_tab = ( $tab_idx === 0 );
                $tab_idx++;
            ?>
                <button type="button" 
                        class="gv-variety-tab <?php echo $is_active_tab ? 'is-active' : ''; ?>" 
                        data-variety="<?php echo esc_attr( $v_key ); ?>" 
                        role="tab" 
                        aria-selected="<?php echo $is_active_tab ? 'true' : 'false'; ?>" 
                        id="tab-<?php echo esc_attr( $v_key ); ?>">
                    <?php echo esc_html( $v_data['name'] ); ?>
                </button>
            <?php endforeach; ?>
        </div>
        <?php else : ?>
        <div class="gv-variety-tabs">
            <span class="gv-variety-tab is-active" style="cursor: default;">
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
                    <?php foreach ( $current_carousel as $idx => $img_url ) : ?>
                        <div class="gv-carousel-slide <?php echo $idx === 0 ? 'is-active' : ''; ?>">
                            <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $current_title ); ?> - Image <?php echo $idx + 1; ?>">
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Left Navigation Arrow (Only displayed if multiple photos exist) -->
                <button type="button" class="gv-carousel-arrow gv-arrow-prev" id="gvCarouselPrev" aria-label="Previous image" style="<?php echo count( $current_carousel ) > 1 ? '' : 'display: none;'; ?>">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <!-- Right Navigation Arrow (Only displayed if multiple photos exist) -->
                <button type="button" class="gv-carousel-arrow gv-arrow-next" id="gvCarouselNext" aria-label="Next image" style="<?php echo count( $current_carousel ) > 1 ? '' : 'display: none;'; ?>">
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
                        <?php echo esc_html( $is_beans && $active_variety ? $active_variety['name'] : $current_title ); ?>
                    </h1>
                    <div class="gv-overview-body" id="gvOverviewBody">
                        <p><?php echo esc_html( $is_beans && $active_variety ? $active_variety['overview'] : $fallback_overview ); ?></p>
                    </div>
                    <div class="gv-overview-divider"></div>
                    <div class="gv-variety-block">
                        <strong class="gv-variety-heading">Product Variety:</strong>
                        <div class="gv-variety-bullet" id="gvVarietyBullet">
                            &bull; <?php echo esc_html( $variety_bullet_text ); ?>
                        </div>
                    </div>
                </div>

                <!-- Right: Product Characteristics -->
                <div class="gv-characteristics-col">
                    <span class="gv-specs-eyebrow">PRODUCT CHARACTERISTICS</span>
                    <div class="gv-specs-table" id="gvSpecsTable">
                        <?php foreach ( $custom_specs as $key => $val ) : ?>
                            <div class="gv-specs-row">
                                <span class="gv-specs-key"><?php echo esc_html( $key ); ?> :</span>
                                <span class="gv-specs-val"><?php echo esc_html( $val ); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
            <!-- Bottom Section Divider spanning full container as in Reference Design -->
            <div class="gv-specs-bottom-divider"></div>
        </div>

        <!-- C. Applications Section (What Can It Be Used For?) -->
        <div class="gv-applications-section">
            <div class="gv-applications-header">
                <span class="gv-applications-tag">Applications</span>
                <h2 class="gv-applications-title">What Can It Be Used For?</h2>
            </div>

            <div class="gv-applications-grid">
                <!-- Card 1: Bakery -->
                <div class="gv-app-card">
                    <div class="gv-app-num">1</div>
                    <h3 class="gv-app-card-title">Bakery</h3>
                    <p class="gv-app-card-desc">Adds rich vanilla aroma and flavor to cakes, pastries, and baked goods.</p>
                </div>

                <!-- Card 2: Beverage -->
                <div class="gv-app-card">
                    <div class="gv-app-num">2</div>
                    <h3 class="gv-app-card-title">Beverage</h3>
                    <p class="gv-app-card-desc">Used to enhance the aroma and flavor of coffee, drinks, and specialty beverages.</p>
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
                    <p class="gv-app-card-desc">Suitable as a natural vanilla ingredient for various processed food applications.</p>
                </div>

                <!-- Card 6: Perfume & Fragrance -->
                <div class="gv-app-card">
                    <div class="gv-app-num">6</div>
                    <h3 class="gv-app-card-title">Perfume & Fragrance</h3>
                    <p class="gv-app-card-desc">Used to add warm, sweet, and distinctive vanilla notes to perfumes and fragrance</p>
                </div>
            </div>
        </div>

        <!-- D. Explore More Products Section (Dynamic WP_Query with Alternating Layout & Randomized) -->
        <?php
        $explore_query = new WP_Query( array(
            'post_type'      => 'vanilla_product',
            'posts_per_page' => 2,
            'post__not_in'   => array( $current_id ),
            'post_status'    => 'publish',
            'orderby'        => 'rand',
        ) );

        if ( $explore_query->have_posts() ) :
        ?>
        <div class="gv-explore-more-section">
            <h2 class="gv-explore-title">Explore More Products</h2>

            <div class="gv-explore-rows">
                <?php
                $exp_idx = 0;
                while ( $explore_query->have_posts() ) :
                    $explore_query->the_post();
                    $exp_idx++;
                    // Alternating layout: Odd (1,3...) = Text Left, Image Right; Even (2,4...) = Image Left, Text Right
                    $is_reverse = ( $exp_idx % 2 === 0 );
                    $row_class  = $is_reverse ? 'gv-explore-row gv-explore-row-reverse' : 'gv-explore-row';
                    
                    $exp_slug = get_post_field( 'post_name', get_the_ID() );
                    if ( has_post_thumbnail() ) {
                        $exp_img = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                    } elseif ( $exp_slug === 'vanilla-seeds' ) {
                        $exp_img = gv_asset_img( 'Seeds Vanilla.png' );
                    } elseif ( $exp_slug === 'vanilla-paste' ) {
                        $exp_img = gv_asset_img( 'Paste Vanilla.png' );
                    } elseif ( $exp_slug === 'vanilla-powder' ) {
                        $exp_img = gv_asset_img( 'Product Unggulan 2.png' );
                    } elseif ( $exp_slug === 'vanilla-extract' ) {
                        $exp_img = gv_asset_img( 'Product Unggulan 3.png' );
                    } elseif ( $exp_slug === 'vanilla-beans' ) {
                        $exp_img = gv_asset_img( 'Product Unggulan 1.png' );
                    } else {
                        $exp_img = gv_asset_img( 'Seeds Vanilla.png' );
                    }
                ?>
                <div class="<?php echo esc_attr( $row_class ); ?>">
                    <?php if ( $is_reverse ) : ?>
                        <!-- Even: Image Left, Text Right -->
                        <div class="gv-explore-img-card">
                            <img src="<?php echo esc_url( $exp_img ); ?>" 
                                 alt="<?php echo esc_attr( get_the_title() ); ?>" 
                                 class="gv-explore-img">
                        </div>
                        <div class="gv-explore-text-col">
                            <h3 class="gv-explore-item-title"><?php the_title(); ?></h3>
                            <p class="gv-explore-item-desc">
                                <?php echo esc_html( get_the_excerpt() ); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="gv-explore-btn">
                                Detail &rarr;
                            </a>
                        </div>
                    <?php else : ?>
                        <!-- Odd: Text Left, Image Right -->
                        <div class="gv-explore-text-col">
                            <h3 class="gv-explore-item-title"><?php the_title(); ?></h3>
                            <p class="gv-explore-item-desc">
                                <?php echo esc_html( get_the_excerpt() ); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="gv-explore-btn">
                                Detail &rarr;
                            </a>
                        </div>
                        <div class="gv-explore-img-card">
                            <img src="<?php echo esc_url( $exp_img ); ?>" 
                                 alt="<?php echo esc_attr( get_the_title() ); ?>" 
                                 class="gv-explore-img">
                        </div>
                    <?php endif; ?>
                </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <div class="gv-explore-all-wrap">
                <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" class="gv-explore-all-btn">
                    View All Products &rarr;
                </a>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>

<!-- Variety Switcher & Interactive Carousel JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const isBeans = <?php echo $is_beans ? 'true' : 'false'; ?>;
    const varietiesData = <?php echo json_encode( $varieties ); ?>;
    let currentVariety = '<?php echo esc_js( $first_variety_key ); ?>';
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

    function updateArrowVisibility() {
        const hasMultiple = carouselSlides && carouselSlides.length > 1;
        if (prevBtn) prevBtn.style.display = hasMultiple ? 'flex' : 'none';
        if (nextBtn) nextBtn.style.display = hasMultiple ? 'flex' : 'none';
    }

    function initSlides() {
        if (!track) return;
        carouselSlides = track.querySelectorAll('.gv-carousel-slide');
        updateArrowVisibility();
    }
    initSlides();

    function updateCarouselSlides() {
        if (!isBeans || !varietiesData[currentVariety] || !track) return;
        const images = varietiesData[currentVariety].carousel || [];
        track.innerHTML = '';
        images.forEach((imgUrl, idx) => {
            const slide = document.createElement('div');
            slide.className = 'gv-carousel-slide' + (idx === 0 ? ' is-active' : '');
            slide.innerHTML = `<img src="${imgUrl}" alt="${varietiesData[currentVariety].name} - Slide ${idx + 1}">`;
            track.appendChild(slide);
        });
        currentSlideIdx = 0;
        carouselSlides = track.querySelectorAll('.gv-carousel-slide');
        updateArrowVisibility();
    }

    function goToSlide(newIdx) {
        if (!carouselSlides || carouselSlides.length === 0) {
            initSlides();
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

    // Variety tab switching (only active when tabs with data-variety exist)
    if (tabs.length > 0) {
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
    }
});
</script>

<style>
/* CSS Styles for High-Fidelity Product Detail & Carousel */
.gv-detail-nav-section {
    background-color: #E1E2DD;
    padding-top: 2rem;
    padding-bottom: 0;
}

.gv-breadcrumbs {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.8125rem;
    color: #4A5239;
    margin-bottom: 1.5rem;
}

.gv-breadcrumbs a {
    color: #4A5239;
    text-decoration: none;
    transition: color 0.2s ease;
}

.gv-breadcrumbs a:hover {
    color: #363E19;
    text-decoration: underline;
}

.gv-crumb-current {
    color: #1C230C;
    font-weight: 500;
}

.gv-detail-divider {
    height: 1px;
    background-color: rgba(54, 62, 25, 0.15);
    width: 100%;
    margin-bottom: 1.75rem;
}

.gv-variety-tabs {
    display: flex;
    gap: 2.5rem;
    margin-bottom: -1px;
}

.gv-variety-tab {
    background: none;
    border: none;
    padding: 0 0 1rem 0;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 1.125rem;
    font-weight: 500;
    color: #727A67;
    cursor: pointer;
    position: relative;
    transition: color 0.2s ease;
    text-decoration: none;
}

.gv-variety-tab:hover {
    color: #1C230C;
}

.gv-variety-tab.is-active {
    color: #1C230C;
}

.gv-variety-tab.is-active::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2.5px;
    background-color: #1C230C;
    border-radius: 2px;
}

.gv-detail-main-section {
    background-color: #E1E2DD;
    padding: 2.5rem 0 6rem;
}

/* Interactive Carousel & Showcase */
.gv-showcase-container {
    width: 100%;
    margin-bottom: 4.5rem;
}

.gv-carousel-wrap {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    background-color: #1A1D16;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    aspect-ratio: 16 / 8.5;
    max-height: 540px;
    width: 100%;
}

.gv-carousel-track {
    width: 100%;
    height: 100%;
    position: relative;
}

.gv-carousel-slide {
    position: absolute;
    inset: 0;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.5s ease-in-out, visibility 0.5s;
    display: flex;
    align-items: center;
    justify-content: center;
}

.gv-carousel-slide.is-active {
    opacity: 1;
    visibility: visible;
    z-index: 1;
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
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background-color: rgba(18, 22, 12, 0.65);
    color: #FFFFFF;
    border: 1px solid rgba(255, 255, 255, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    backdrop-filter: blur(4px);
    transition: all 0.25s ease;
}

.gv-carousel-arrow:hover {
    background-color: rgba(18, 22, 12, 0.95);
    transform: translateY(-50%) scale(1.08);
}

.gv-arrow-prev {
    left: 1.5rem;
}

.gv-arrow-next {
    right: 1.5rem;
}

/* Product Specifications Split (2-Column Desktop) */
.gv-specs-section {
    margin-bottom: 5.5rem;
}

.gv-specs-split {
    display: grid;
    grid-template-columns: 1fr 1.05fr;
    gap: 4rem;
    align-items: flex-start;
}

.gv-specs-eyebrow {
    display: block;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.8125rem;
    font-weight: 600;
    color: #4A5638;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin-bottom: 1.25rem;
}

.gv-overview-heading {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(2rem, 3.2vw, 2.5rem);
    font-weight: 700;
    color: #2D3A1B;
    line-height: 1.2;
    margin: 0 0 1.25rem 0;
}

.gv-overview-body {
    font-size: 0.9375rem;
    line-height: 1.65;
    color: #5D664E;
    margin-bottom: 1.75rem;
}

.gv-overview-body p {
    margin: 0;
}

.gv-overview-divider {
    height: 1px;
    background-color: rgba(54, 62, 25, 0.2);
    width: 100%;
    margin-bottom: 1.75rem;
}

.gv-variety-block {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.gv-variety-heading {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 1.125rem;
    font-weight: 700;
    color: #2D3A1B;
}

.gv-variety-bullet {
    font-size: 0.9375rem;
    color: #2D3A1B;
    font-weight: 500;
}

/* Characteristics Table */
.gv-specs-table {
    display: flex;
    flex-direction: column;
}

.gv-specs-row {
    padding: 0.8rem 0;
    border-bottom: 1px solid rgba(54, 62, 25, 0.22);
    font-size: 0.9375rem;
    line-height: 1.5;
    color: #5E6652;
}

.gv-specs-row:first-child {
    padding-top: 0.25rem;
}

.gv-specs-key {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-weight: 500;
    color: #3F4734;
    margin-right: 0.35rem;
}

.gv-specs-val {
    color: #5E6652;
}

.gv-specs-bottom-divider {
    height: 1px;
    background-color: rgba(54, 62, 25, 0.25);
    width: 100%;
    margin-top: 3.5rem;
}

/* Applications Section (6 White Cards Grid) */
.gv-applications-section {
    margin-bottom: 6rem;
}

.gv-applications-header {
    text-align: center;
    margin-bottom: 3.5rem;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.gv-applications-tag {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.9375rem;
    font-weight: 500;
    color: #2F3E1E;
    margin-bottom: 0.65rem;
}

.gv-applications-tag::before {
    content: '';
    display: inline-block;
    width: 38px;
    height: 1.5px;
    background-color: #2F3E1E;
}

.gv-applications-title {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(2rem, 3.2vw, 2.75rem);
    font-weight: 600;
    color: #232E14;
    margin: 0;
    line-height: 1.2;
}

.gv-applications-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.75rem;
}

.gv-app-card {
    background-color: #FFFFFF;
    color: #232E14;
    border-radius: 12px;
    padding: 2.5rem 2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
    border: 1px solid rgba(54, 62, 25, 0.05);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.gv-app-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
}

.gv-app-num {
    width: 44px;
    height: 44px;
    background-color: #2F3E1E;
    color: #FFFFFF;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 1.25rem;
    font-weight: 600;
    line-height: 1;
    margin-bottom: 1.5rem;
}

.gv-app-card-title {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 1.25rem;
    font-weight: 600;
    color: #232E14;
    margin: 0 0 0.85rem 0;
    line-height: 1.3;
}

.gv-app-card-desc {
    font-size: 0.875rem;
    line-height: 1.6;
    color: #6E7564;
    margin: 0;
    max-width: 280px;
}

/* Explore More Products Rows (Matching Products Archive & Reference Design) */
.gv-explore-more-section {
    padding-top: 1rem;
    margin-bottom: 5rem;
}

.gv-explore-title {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(2rem, 3.2vw, 2.6rem);
    font-weight: 500;
    color: #1C230C;
    margin: 0 0 3.5rem 0;
}

.gv-explore-rows {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.gv-explore-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
    align-items: center;
}

.gv-explore-row.gv-explore-row-reverse {
    grid-template-columns: 1fr 1fr;
}

.gv-explore-row:not(.gv-explore-row-reverse) .gv-explore-text-col {
    padding-left: 2rem;
    padding-right: 2rem;
}

.gv-explore-row.gv-explore-row-reverse .gv-explore-text-col {
    padding-left: 3rem;
    padding-right: 1rem;
}

.gv-explore-text-col {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
}

.gv-explore-item-title {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(1.85rem, 2.5vw, 2.35rem);
    font-weight: 500;
    color: #363E19;
    margin: 0 0 1rem 0;
    line-height: 1.2;
}

.gv-explore-item-desc {
    color: #4A5239;
    font-size: 0.9375rem;
    line-height: 1.65;
    margin: 0 0 2rem 0;
    max-width: 380px;
}

.gv-explore-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    border: 1px solid #363E19;
    color: #363E19;
    background: transparent;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.875rem;
    font-weight: 500;
    padding: 0.65rem 1.6rem;
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
    aspect-ratio: 1 / 1 !important;
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
    margin-top: 3.5rem;
}

.gv-explore-all-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
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
    background-color: #242A11;
    color: #FFFFFF;
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.12);
}

/* Tablet & Mobile Responsiveness */
@media (max-width: 1024px) {
    .gv-specs-split {
        grid-template-columns: 1fr;
        gap: 3rem;
    }
    
    .gv-explore-row {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .gv-explore-row.gv-explore-row-reverse .gv-explore-img-card {
        order: 2;
    }
    
    .gv-explore-row.gv-explore-row-reverse .gv-explore-text-col {
        order: 1;
    }
}

@media (max-width: 719px) {
    .gv-variety-tabs {
        gap: 1.5rem;
        overflow-x: auto;
        padding-bottom: 0.5rem;
    }
    
    .gv-carousel-wrap {
        aspect-ratio: 16 / 10;
    }
    
    .gv-specs-row {
        grid-template-columns: 130px 1fr;
    }
    
    .gv-applications-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php
get_footer();
