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
        
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 3.5rem; flex-wrap: wrap; gap: 1.5rem;">
            <div>
                <span class="gv-section-tag">Products</span>
                <h2 style="font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 800; line-height: 1.15; margin: 0.5rem 0 0; color: #1C230C;">Premium Indonesian<br>Vanilla Products</h2>
            </div>
            <div style="max-width: 440px;">
                <p style="color: var(--color-nw-500); font-size: 0.9375rem; line-height: 1.6; margin: 0;">
                    Explore our range of quality Indonesian vanilla products, carefully sourced and prepared to meet the needs of global B2B buyers.
                </p>
            </div>
        </div>

        <!-- 3 Product Cards Grid (Dynamic WP_Query) -->
        <div class="gv-products-cards-grid active-1" id="gvProductsCardsGrid" style="margin-bottom: 5rem;">
            <?php
            $catalog_products_query = new WP_Query( array(
                'post_type'      => 'vanilla_product',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
                'orderby'        => 'menu_order date',
                'order'          => 'ASC',
            ) );

            if ( $catalog_products_query->have_posts() ) :
                $prod_idx = 0;
                while ( $catalog_products_query->have_posts() ) :
                    $catalog_products_query->the_post();
                    $prod_idx++;
                    $is_active  = ( $prod_idx === 1 );
                    $card_class = $is_active ? 'is-active' : 'is-collapsed';
                    $prod_img   = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : $img_dir . 'Product Unggulan ' . $prod_idx . '.png';
                    ?>
                    <!-- Card <?php echo esc_attr( $prod_idx ); ?>: <?php the_title(); ?> -->
                    <div class="gv-product-card <?php echo esc_attr( $card_class ); ?>" data-card-index="<?php echo esc_attr( $prod_idx ); ?>">
                        <!-- Badge #<?php echo esc_attr( $prod_idx ); ?> -->
                        <div class="gv-card-badge">
                            #<?php echo esc_html( $prod_idx ); ?>
                        </div>

                        <!-- Product Image -->
                        <div class="gv-card-img-wrap">
                            <img src="<?php echo esc_url( $prod_img ); ?>"
                                alt="<?php echo esc_attr( get_the_title() ); ?>"
                                class="gv-card-img">
                        </div>

                        <!-- Product Content & Actions -->
                        <div class="gv-card-bottom">
                            <div class="gv-card-text">
                                <h3 class="gv-card-title">
                                    <?php the_title(); ?>
                                </h3>
                                <p class="gv-card-desc">
                                    <?php echo esc_html( get_the_excerpt() ); ?>
                                </p>
                            </div>
                            <!-- Actions Slot (Cross-fade between Detail and Arrow) -->
                            <div class="gv-card-actions-slot">
                                <a href="<?php the_permalink(); ?>"
                                    class="gv-card-btn-detail">
                                    Detail &rarr;
                                </a>
                                <button type="button"
                                    class="gv-card-btn-arrow"
                                    aria-label="Expand <?php echo esc_attr( get_the_title() ); ?>">
                                    &rarr;
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <!-- Script for Interactive Products Card Expansion (Dynamic click handler) -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const grid = document.getElementById('gvProductsCardsGrid');
                if (!grid) return;
                const cards = grid.querySelectorAll('.gv-product-card');

                function activateCard(card) {
                    const idx = card.getAttribute('data-card-index');
                    if (!idx) return;

                    if (grid.classList.contains('active-' + idx)) {
                        return;
                    }

                    // Switch active class on grid dynamically
                    grid.className = grid.className.replace(/\bactive-\d+\b/g, '').trim() + ' active-' + idx;

                    cards.forEach(function(c) {
                        if (c === card) {
                            c.classList.add('is-active');
                            c.classList.remove('is-collapsed');
                        } else {
                            c.classList.remove('is-active');
                            c.classList.add('is-collapsed');
                        }
                    });
                }

                cards.forEach(function(card) {
                    card.addEventListener('click', function(e) {
                        // If card is already active and user clicks arrow button or detail button, go to detail page
                        if (card.classList.contains('is-active')) {
                            const detailLink = card.querySelector('.gv-card-btn-detail');
                            if (e.target.closest('.gv-card-btn-arrow') && detailLink) {
                                window.location.href = detailLink.getAttribute('href');
                                return;
                            }
                            if (e.target.closest('.gv-card-btn-detail')) {
                                return;
                            }
                        }

                        activateCard(card);
                    });
                });
            });
        </script>

        <!-- 3. Explore More Products (Dynamic WP_Query) -->
        <?php
        $explore_products_query = new WP_Query( array(
            'post_type'      => 'vanilla_product',
            'posts_per_page' => 2,
            'offset'         => 3,
            'post_status'    => 'publish',
            'orderby'        => 'menu_order date',
            'order'          => 'ASC',
        ) );

        if ( $explore_products_query->have_posts() ) :
        ?>
        <div class="gv-explore-more-section">
            <h2 class="gv-explore-title">Explore More Products</h2>

            <div class="gv-explore-rows">
                <?php
                $exp_idx = 0;
                while ( $explore_products_query->have_posts() ) :
                    $explore_products_query->the_post();
                    $exp_idx++;
                    $is_reverse = ( $exp_idx % 2 === 0 );
                    $row_class  = $is_reverse ? 'gv-explore-row gv-explore-row-reverse' : 'gv-explore-row';
                    $exp_img    = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : $img_dir . 'Seeds Vanilla.png';
                ?>
                <div class="<?php echo esc_attr( $row_class ); ?>">
                    <?php if ( $is_reverse ) : ?>
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
        </div>
        <?php endif; ?>

    </div>
</section>

<style>
    /* Products Cards Grid (Flex Accordion Architecture) */
    .gv-products-cards-grid {
        display: flex;
        gap: 1rem;
        margin-bottom: 3.5rem;
        align-items: stretch;
        width: 100%;
    }

    .gv-product-card {
        background-color: #BDC4B8;
        border-radius: 12px;
        padding: 1.35rem 1.35rem 1.35rem;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        position: relative;
        overflow: hidden;
        min-width: 0;
        height: 400px;
        box-sizing: border-box;
        transition: flex 0.6s cubic-bezier(0.16, 1, 0.3, 1), background-color 0.35s ease, padding 0.4s ease;
        will-change: flex;
    }

    .gv-card-badge {
        position: absolute;
        top: 1.25rem;
        left: 1.25rem;
        background-color: #363E19;
        color: #FFFFFF;
        font-family: var(--font-heading, 'Jost', sans-serif);
        font-size: 0.8125rem;
        font-weight: 700;
        width: 32px;
        height: 32px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 3;
        line-height: 1;
        user-select: none;
    }

    @media (min-width: 992px) {
        .gv-product-card.is-active {
            flex: 1.95 1 0px !important;
            cursor: default;
            padding: 1.5rem 1.6rem 1.35rem;
        }

        .gv-product-card.is-collapsed {
            flex: 1 1 0px !important;
            cursor: pointer;
            padding: 1.4rem 1.25rem 1.35rem;
        }

        .gv-product-card.is-collapsed:hover {
            background-color: #B5BCB0;
        }
    }

    /* Product Image Containers */
    .gv-card-img-wrap {
        flex: 1 1 auto;
        min-height: 0;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        margin-top: auto;
        margin-bottom: 0.75rem;
        width: 100%;
        overflow: visible;
    }

    .gv-card-img {
        width: auto;
        height: auto;
        object-fit: contain;
        filter: drop-shadow(0 8px 18px rgba(0,0,0,0.07));
        transition: transform 0.4s ease;
    }

    .gv-product-card.is-active .gv-card-img {
        max-height: 225px;
        max-width: 95%;
    }

    .gv-product-card.is-collapsed .gv-card-img {
        max-height: 200px;
        max-width: 96%;
    }

    /* Bottom Content Area (Title, Desc & Buttons) */
    .gv-card-bottom {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 0.85rem;
        width: 100%;
        flex-shrink: 0;
    }

    .gv-card-text {
        flex: 1 1 auto;
        min-width: 0;
    }

    .gv-card-title {
        font-family: var(--font-heading, 'Jost', sans-serif);
        font-weight: 700;
        color: #363E19;
        margin: 0 0 0.35rem 0;
        line-height: 1.2;
    }

    .gv-product-card.is-active .gv-card-title {
        font-size: clamp(1.4rem, 1.7vw, 1.55rem);
    }

    .gv-product-card.is-collapsed .gv-card-title {
        font-size: 1.28rem;
        white-space: nowrap;
    }

    .gv-card-desc {
        color: #4A5239;
        margin: 0;
    }

    .gv-product-card.is-active .gv-card-desc {
        font-size: 0.8125rem;
        line-height: 1.45;
        max-width: 290px;
    }

    .gv-product-card.is-collapsed .gv-card-desc {
        font-size: 0.775rem;
        line-height: 1.38;
        max-width: 175px;
    }

    /* Cross-fade Action Buttons (Zero Layout Jumps) */
    .gv-card-actions-slot {
        position: relative;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        flex-shrink: 0;
        transition: width 0.35s cubic-bezier(0.16, 1, 0.3, 1), min-width 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .gv-product-card.is-collapsed .gv-card-actions-slot {
        min-width: 36px;
        width: 36px;
    }

    .gv-product-card.is-active .gv-card-actions-slot {
        min-width: 105px;
        width: 105px;
    }

    .gv-card-btn-detail {
        position: absolute;
        right: 0;
        opacity: 0;
        visibility: hidden;
        transform: translate3d(8px, 0, 0);
        transition: opacity 0.3s cubic-bezier(0.16, 1, 0.3, 1), transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.3s, background-color 0.2s ease, color 0.2s ease;
        pointer-events: none;
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        border: 1px solid #363E19;
        color: #363E19;
        background: transparent !important;
        font-family: var(--font-heading, 'Jost', sans-serif);
        font-size: 0.8125rem;
        font-weight: 600;
        padding: 0.55rem 1.25rem;
        border-radius: 2px;
        text-decoration: none;
        white-space: nowrap;
    }

    .gv-card-btn-arrow {
        position: absolute;
        right: 0;
        opacity: 1;
        visibility: visible;
        transform: translate3d(0, 0, 0);
        transition: opacity 0.3s cubic-bezier(0.16, 1, 0.3, 1), transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.3s, background-color 0.2s ease, color 0.2s ease;
        pointer-events: auto;
        width: 36px;
        height: 36px;
        border: 1px solid #363E19;
        color: #363E19;
        background: transparent !important;
        border-radius: 2px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.05rem;
        line-height: 1;
    }

    .gv-product-card.is-active .gv-card-btn-detail {
        opacity: 1;
        visibility: visible;
        transform: translate3d(0, 0, 0);
        pointer-events: auto;
    }

    .gv-product-card.is-active .gv-card-btn-arrow {
        opacity: 0;
        visibility: hidden;
        transform: translate3d(-8px, 0, 0);
        pointer-events: none;
    }

    .gv-card-btn-detail:hover {
        background-color: #363E19 !important;
        color: #FFFFFF !important;
    }

    .gv-card-btn-arrow:hover {
        background-color: #363E19 !important;
        color: #FFFFFF !important;
    }


    /* Explore More Products Section */
    .gv-explore-more-section {
        margin-bottom: 6rem;
    }

    .gv-explore-title {
        font-family: var(--font-heading, 'Jost', sans-serif);
        font-size: clamp(2rem, 3.5vw, 2.75rem);
        font-weight: 700;
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
        grid-template-columns: 1fr;
        gap: 2rem;
        align-items: center;
    }

    @media (min-width: 1025px) {
        .gv-explore-row {
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
        font-weight: 700;
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
        font-weight: 600;
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
</style>

<!-- 4. CTA Banner (High-Fidelity Figma Component) -->
<?php
get_template_part( 'template-parts/cta-banner', null, array(
    'title'    => 'Looking For A Reliable<br>Indonesian Vanilla Supplier?',
    'btn_text' => 'Request a Quote',
    'btn_url'  => home_url( '/contact/' ),
) );
?>

<?php
get_footer();
