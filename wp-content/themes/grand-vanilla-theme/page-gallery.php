<?php
/**
 * Template Name: Gallery Page
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();

// Fetch dynamic gallery items for carousel
$gallery_carousel_query = new WP_Query( array(
    'post_type'      => 'vanilla_gallery',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
) );

$gallery_carousel_items = array();
if ( $gallery_carousel_query->have_posts() ) {
    while ( $gallery_carousel_query->have_posts() ) {
        $gallery_carousel_query->the_post();
        $terms = get_the_terms( get_the_ID(), 'gallery_category' );
        $tag   = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'Vanilla';
        $gallery_carousel_items[] = array(
            'img'      => has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : $img_dir . 'Gallery Example Carroussel 1.png',
            'tag'      => $tag,
            'title'    => 'Vanilla Collection',
            'subtitle' => get_the_title(),
        );
    }
    wp_reset_postdata();
}
?>

<!-- 1. Hero Section -->
<section class="gv-hero-page" style="background-image: url('<?php echo esc_url( $img_dir . 'Gallery Hero Section.png' ); ?>');">
    <div class="gv-container">
        <h1 class="gv-hero-tag">#ourGallery</h1>
        <p class="gv-hero-subtag">See Our People, Products, And Operations</p>
    </div>
</section>

<!-- 2. A Closer Look — Carousel (Dynamic WP_Query) -->
<section class="gv-section" style="background-color: #E1E2DD; padding: 6rem 0; overflow: hidden;">
    <div class="gv-container">

        <!-- Header Split (Left Title, Right Description) — identical to homepage -->
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 3.5rem; gap: 2rem; flex-wrap: wrap;">
            <div>
                <div style="display: flex; align-items: center; gap: 0.75rem; color: #363E19; font-size: 0.875rem; font-weight: 500; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.5rem;">
                    <span style="display: inline-block; width: 28px; height: 2px; background: #363E19;"></span>
                    Gallery
                </div>
                <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2.25rem, 3.8vw, 3rem); font-weight: 500; color: #363E19; line-height: 1.15; margin: 0;">
                    A Closer Look At<br>Grand Vanilla
                </h2>
            </div>
            <div style="max-width: 440px;">
                <p style="font-size: 0.9375rem; line-height: 1.6; color: #716F6E; margin: 0;">
                    Explore the people, products, sourcing, and processes behind our Indonesian vanilla.
                </p>
            </div>
        </div>

    </div><!-- /.gv-container -->

    <!-- Infinite Seamless Horizontal Carousel Track — same markup & classes as homepage -->
    <div class="gv-gallery-carousel-viewport" style="width: 100%; overflow: hidden; padding: 0.5rem 0 3.5rem; position: relative;">
        <div class="gv-gallery-carousel-track">
            <?php
            // Output 2 identical sets for seamless infinite loop
            for ( $set = 0; $set < 2; $set++ ) :
                foreach ( $gallery_carousel_items as $item ) :
            ?>
                <div class="gv-gallery-card" style="flex: 0 0 290px; width: 290px; background: #FAF8F5; border-radius: 0; overflow: hidden; box-shadow: 0 4px 16px rgba(0,0,0,0.03); display: flex; flex-direction: column;">
                    <!-- Card Image -->
                    <div style="height: 310px; width: 100%; overflow: hidden;">
                        <img src="<?php echo esc_url( $item['img'] ); ?>"
                            alt="<?php echo esc_attr( $item['title'] . ' - ' . $item['subtitle'] ); ?>"
                            style="width: 100%; height: 100%; object-fit: cover; display: block;">
                    </div>
                    <!-- Card Content -->
                    <div style="padding: 1.35rem 1.5rem 1.5rem; background: #FAF8F5; display: flex; flex-direction: column;">
                        <div style="display: flex; align-items: center; gap: 0.6rem; color: #363E19; font-size: 0.75rem; font-weight: 500; font-family: var(--font-heading, 'Jost', sans-serif); margin-bottom: 0.35rem;">
                            <span style="display: inline-block; width: 18px; height: 1.5px; background: #363E19;"></span>
                            <?php echo esc_html( $item['tag'] ); ?>
                        </div>
                        <h3 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1.125rem; font-weight: 500; color: #363E19; margin: 0 0 0.25rem 0; line-height: 1.3;">
                            <?php echo esc_html( $item['title'] ); ?>
                        </h3>
                        <p style="font-size: 0.8125rem; color: #716F6E; margin: 0; line-height: 1.4;">
                            <?php echo esc_html( $item['subtitle'] ); ?>
                        </p>
                    </div>
                </div>
            <?php
                endforeach;
            endfor;
            ?>
        </div>
    </div>

</section>

<!-- 3. Explore More Gallery (Interactive Tabs & Grid - Dynamic WP_Query) -->
<section class="gv-section" style="background-color: #E1E2DD; padding: 4rem 0 6rem; border-top: 1px solid rgba(0,0,0,0.04);">
    <div class="gv-container">

        <div style="margin-bottom: 2rem;">
            <h2 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(1.75rem, 3vw, 2.25rem); font-weight: 500; color: #363E19; margin-bottom: 1.5rem;">Explore More Gallery</h2>

            <!-- Category Filter Tabs (Dynamic from gallery_category taxonomy) -->
            <div class="gv-gallery-filter-tabs" id="gv-gallery-tabs">
                <button type="button" class="gv-gallery-tab active" data-filter="all">All Gallery</button>
                <?php
                $gallery_terms = get_terms( array(
                    'taxonomy'   => 'gallery_category',
                    'hide_empty' => false,
                ) );
                if ( ! empty( $gallery_terms ) && ! is_wp_error( $gallery_terms ) ) :
                    foreach ( $gallery_terms as $gt ) :
                ?>
                    <button type="button" class="gv-gallery-tab" data-filter="<?php echo esc_attr( $gt->slug ); ?>">
                        <?php echo esc_html( $gt->name ); ?>
                    </button>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>

        <!-- Gallery Items Grid: 4 columns (Dynamic from vanilla_gallery CPT) -->
        <div class="gv-gallery-explore-grid" id="gv-gallery-grid">
            <?php
            $gallery_grid_query = new WP_Query( array(
                'post_type'      => 'vanilla_gallery',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => 'menu_order date',
                'order'          => 'ASC',
            ) );

            if ( $gallery_grid_query->have_posts() ) :
                while ( $gallery_grid_query->have_posts() ) :
                    $gallery_grid_query->the_post();
                    $terms     = get_the_terms( get_the_ID(), 'gallery_category' );
                    $cat_slug  = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->slug : 'vanilla';
                    $cat_name  = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'Vanilla';
                    $card_img  = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : $img_dir . 'Gallery Example Carroussel 1.png';
                    $card_desc = get_the_content();
                    if ( empty( $card_desc ) ) {
                        $card_desc = get_the_excerpt();
                    }
                ?>
                <div class="gv-gallery-explore-card gv-gallery-item" data-cat="<?php echo esc_attr( $cat_slug ); ?>">
                    <div class="gv-gallery-explore-img-wrap">
                        <img src="<?php echo esc_url( $card_img ); ?>" alt="<?php the_title_attribute(); ?>" class="gv-gallery-explore-img" loading="lazy">
                    </div>
                    <div class="gv-gallery-explore-body">
                        <div class="gv-gallery-explore-tag">
                            <span class="gv-gallery-explore-tag-line"></span>
                            <?php echo esc_html( $cat_name ); ?>
                        </div>
                        <h3 class="gv-gallery-explore-title"><?php the_title(); ?></h3>
                        <p class="gv-gallery-explore-desc"><?php echo esc_html( wp_strip_all_tags( $card_desc ) ); ?></p>
                    </div>
                </div>
                <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <script>
        document.querySelectorAll('#gv-gallery-tabs .gv-gallery-tab').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.querySelectorAll('#gv-gallery-tabs .gv-gallery-tab').forEach(function(b) {
                    b.classList.remove('active');
                });
                btn.classList.add('active');

                var filter = btn.getAttribute('data-filter');
                document.querySelectorAll('#gv-gallery-grid .gv-gallery-item').forEach(function(card) {
                    if (filter === 'all' || card.getAttribute('data-cat') === filter) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
        </script>

    </div>
</section>

<style>
/* ── Gallery Explore Grid ─────────────────────────────── */
.gv-gallery-filter-tabs {
    display: flex;
    gap: 0.625rem;
    flex-wrap: wrap;
}

.gv-gallery-tab {
    padding: 0.45rem 1.25rem;
    border: 1.5px solid #363E19;
    border-radius: 3px;
    background: transparent;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.8125rem;
    font-weight: 500;
    color: #363E19;
    cursor: pointer;
    transition: background 0.2s, color 0.2s;
}

.gv-gallery-tab:hover,
.gv-gallery-tab.active {
    background: #363E19;
    color: #fff;
}

.gv-gallery-explore-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.25rem;
    margin-bottom: 3.5rem;
}

@media (min-width: 700px) {
    .gv-gallery-explore-grid { grid-template-columns: repeat(3, 1fr); }
}

@media (min-width: 1024px) {
    .gv-gallery-explore-grid { grid-template-columns: repeat(4, 1fr); }
}

.gv-gallery-explore-card {
    background: #FAF8F5;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    display: flex;
    flex-direction: column;
}

.gv-gallery-explore-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.09);
}

.gv-gallery-explore-img-wrap {
    width: 100%;
    aspect-ratio: 4 / 3;
    overflow: hidden;
    background: #E1E2DD;
}

.gv-gallery-explore-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}

.gv-gallery-explore-card:hover .gv-gallery-explore-img {
    transform: scale(1.04);
}

.gv-gallery-explore-body {
    padding: 1.125rem 1.25rem 1.375rem;
    display: flex;
    flex-direction: column;
    gap: 0.4rem;
    flex: 1;
}

.gv-gallery-explore-tag {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.75rem;
    font-weight: 500;
    color: #363E19;
}

.gv-gallery-explore-tag-line {
    display: inline-block;
    width: 1.25rem;
    height: 1.5px;
    background: #363E19;
    flex-shrink: 0;
}

.gv-gallery-explore-title {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 1.0625rem;
    font-weight: 500;
    color: #363E19;
    margin: 0;
    line-height: 1.3;
}

.gv-gallery-explore-desc {
    font-size: 0.8rem;
    color: #716F6E;
    line-height: 1.55;
    margin: 0;
}
</style>

    </div>
</section>

<!-- 4. CTA Banner -->
<?php
get_template_part( 'template-parts/cta-banner', null, array(
    'title'    => 'Looking For A Reliable<br>Indonesian Vanilla Supplier?',
    'btn_text' => 'Request a Quote',
    'btn_url'  => home_url( '/contact/' ),
) );
?>

<?php
get_footer();
