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
            <span style="color: var(--color-pitch-black); font-weight: 500;"><?php the_title(); ?></span>
        </div>

        <!-- Product Sub-tabs (Dynamic from vanilla_product CPT) -->
        <div class="gv-product-pills-nav" style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <?php
            $tab_products = get_posts( array(
                'post_type'      => 'vanilla_product',
                'posts_per_page' => 5,
                'post_status'    => 'publish',
                'orderby'        => 'menu_order date',
                'order'          => 'ASC',
            ) );
            foreach ( $tab_products as $t_prod ) :
                $is_current = ( $t_prod->ID === get_the_ID() );
            ?>
                <a href="<?php echo esc_url( get_permalink( $t_prod->ID ) ); ?>" class="gv-pill <?php echo $is_current ? 'gv-pill-khaki' : ''; ?>">
                    <?php echo esc_html( $t_prod->post_title ); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="gv-section">
    <div class="gv-container">
        
        <!-- Product Showcase & Overview Grid -->
        <div style="margin-bottom: 4rem;">
            <!-- Main Product Image (Dynamic Thumbnail) -->
            <?php
            $main_img = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : $img_dir . 'Planifolia Carroussel 1.png';
            ?>
            <div style="border-radius: var(--radius-16); overflow: hidden; box-shadow: var(--shadow-md); margin-bottom: 3rem; background: var(--color-warm-sand-alt); max-height: 480px;">
                <img src="<?php echo esc_url( $main_img ); ?>" alt="<?php the_title(); ?>" style="width: 100%; height: 100%; object-fit: cover;">
            </div>

            <!-- Overview & Characteristics Grid -->
            <div style="display: grid; grid-template-columns: 1fr; gap: 3rem;" class="gv-specs-split">
                
                <!-- Left: Product Overview -->
                <div class="gv-card" style="padding: 2rem; background: var(--color-parchment);">
                    <span style="font-size: 0.75rem; color: var(--color-dark-khaki); font-weight: 500; text-transform: uppercase; font-family: var(--font-heading); display: block; margin-bottom: 0.5rem;">PRODUCT OVERVIEW</span>
                    <h2 style="font-size: 1.75rem; font-weight: 500; margin-bottom: 1rem;"><?php the_title(); ?></h2>
                    <div style="color: var(--color-nw-500); font-size: 0.9375rem; line-height: 1.7; margin-bottom: 1.5rem;">
                        <?php
                        $prod_desc = get_the_content();
                        if ( empty( $prod_desc ) ) {
                            $prod_desc = get_the_excerpt();
                        }
                        echo wp_kses_post( wpautop( $prod_desc ) );
                        ?>
                    </div>
                    <div>
                        <strong style="font-size: 0.875rem; display: block; margin-bottom: 0.25rem;">Product Variety:</strong>
                        <span style="font-size: 0.875rem; color: var(--color-nw-500);">&bull; <?php the_title(); ?></span>
                    </div>
                </div>

                <!-- Right: Product Characteristics (Dynamic postmeta _gv_*) -->
                <?php
                $grade    = get_post_meta( get_the_ID(), '_gv_grade', true );
                $vanillin = get_post_meta( get_the_ID(), '_gv_vanillin', true );
                $moisture = get_post_meta( get_the_ID(), '_gv_moisture', true );
                $length   = get_post_meta( get_the_ID(), '_gv_length', true );
                $origin   = get_post_meta( get_the_ID(), '_gv_origin', true );

                if ( empty( $grade ) )    $grade    = 'Gourmet Export Grade';
                if ( empty( $vanillin ) ) $vanillin = '2.0% - 2.4%';
                if ( empty( $moisture ) ) $moisture = '30% - 35%';
                if ( empty( $length ) )   $length   = '16 - 20 cm';
                if ( empty( $origin ) )   $origin   = 'East Java, Indonesia';
                ?>
                <div class="gv-card" style="padding: 2rem; background: var(--color-parchment);">
                    <span style="font-size: 0.75rem; color: var(--color-dark-khaki); font-weight: 500; text-transform: uppercase; font-family: var(--font-heading); display: block; margin-bottom: 1rem;">PRODUCT CHARACTERISTICS</span>
                    
                    <div style="display: flex; flex-direction: column; gap: 0.85rem; font-size: 0.875rem;">
                        <div><strong style="color: var(--color-pitch-black);">Grade / Quality :</strong> <span style="color: var(--color-nw-500);"><?php echo esc_html( $grade ); ?></span></div>
                        <div><strong style="color: var(--color-pitch-black);">Vanillin Content :</strong> <span style="color: var(--color-nw-500);"><?php echo esc_html( $vanillin ); ?></span></div>
                        <div><strong style="color: var(--color-pitch-black);">Moisture Level :</strong> <span style="color: var(--color-nw-500);"><?php echo esc_html( $moisture ); ?></span></div>
                        <div><strong style="color: var(--color-pitch-black);">Length / Size :</strong> <span style="color: var(--color-nw-500);"><?php echo esc_html( $length ); ?></span></div>
                        <div><strong style="color: var(--color-pitch-black);">Origin / Terroir :</strong> <span style="color: var(--color-nw-500);"><?php echo esc_html( $origin ); ?></span></div>
                        <div><strong style="color: var(--color-pitch-black);">Cultivation :</strong> <span style="color: var(--color-nw-500);">Sustainable Agroforestry Sun Cured</span></div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Applications Section (What Can It Be Used For?) -->
        <div class="gv-applications-section" style="margin-bottom: 5rem;">
            <div class="gv-applications-header" style="text-align: center; margin-bottom: 3rem;">
                <span class="gv-section-tag" style="justify-content: center;">Applications</span>
                <h2 style="font-size: 2.25rem; font-weight: 500;">What Can It Be Used For?</h2>
            </div>

            <div class="gv-grid-3 gv-applications-grid">
                <div class="gv-card gv-app-card" style="padding: 1.75rem; text-align: center;">
                    <div class="gv-app-num" style="font-size: 1.5rem; font-weight: 500; color: var(--color-dark-khaki); font-family: var(--font-heading); margin-bottom: 0.5rem;">1</div>
                    <h3 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Bakery</h3>
                    <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">Adds rich vanilla aroma and flavor to cakes, pastries, and baked goods.</p>
                </div>
                <div class="gv-card gv-app-card" style="padding: 1.75rem; text-align: center;">
                    <div class="gv-app-num" style="font-size: 1.5rem; font-weight: 500; color: var(--color-dark-khaki); font-family: var(--font-heading); margin-bottom: 0.5rem;">2</div>
                    <h3 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Beverage</h3>
                    <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">Used to enhance the aroma and flavor of coffee, drinks, and specialty beverages.</p>
                </div>
                <div class="gv-card gv-app-card" style="padding: 1.75rem; text-align: center;">
                    <div class="gv-app-num" style="font-size: 1.5rem; font-weight: 500; color: var(--color-dark-khaki); font-family: var(--font-heading); margin-bottom: 0.5rem;">3</div>
                    <h3 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Confectionery</h3>
                    <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">Suitable for chocolates, candies, and other sweet confectionery products.</p>
                </div>
                <div class="gv-card gv-app-card" style="padding: 1.75rem; text-align: center;">
                    <div class="gv-app-num" style="font-size: 1.5rem; font-weight: 500; color: var(--color-dark-khaki); font-family: var(--font-heading); margin-bottom: 0.5rem;">4</div>
                    <h3 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Dairy</h3>
                    <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">Provides a natural vanilla profile for ice cream, yogurt, milk, and dairy-based products.</p>
                </div>
                <div class="gv-card gv-app-card" style="padding: 1.75rem; text-align: center;">
                    <div class="gv-app-num" style="font-size: 1.5rem; font-weight: 500; color: var(--color-dark-khaki); font-family: var(--font-heading); margin-bottom: 0.5rem;">5</div>
                    <h3 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Food Manufacturing</h3>
                    <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">Suitable as a natural vanilla ingredient for various processed food applications.</p>
                </div>
                <div class="gv-card gv-app-card" style="padding: 1.75rem; text-align: center;">
                    <div class="gv-app-num" style="font-size: 1.5rem; font-weight: 500; color: var(--color-dark-khaki); font-family: var(--font-heading); margin-bottom: 0.5rem;">6</div>
                    <h3 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Perfume & Fragrance</h3>
                    <p style="font-size: 0.8125rem; color: var(--color-nw-500); line-height: 1.6;">Used to add warm, sweet, and distinctive vanilla notes to perfumes and fragrance.</p>
                </div>
            </div>
        </div>

        <!-- Explore More Products Section (Dynamic WP_Query) -->
        <?php
        $other_products_query = new WP_Query( array(
            'post_type'      => 'vanilla_product',
            'posts_per_page' => 2,
            'post__not_in'   => array( get_the_ID() ),
            'post_status'    => 'publish',
            'orderby'        => 'rand',
        ) );

        if ( $other_products_query->have_posts() ) :
        ?>
        <div class="gv-explore-more-section" style="margin-bottom: 3.5rem;">
            <h2 class="gv-explore-title" style="font-size: 2rem; font-weight: 500; margin-bottom: 2.5rem;">Explore More Products</h2>

            <div class="gv-explore-rows" style="display: flex; flex-direction: column; gap: 3rem; margin-bottom: 3rem;">
                <?php
                $o_idx = 0;
                while ( $other_products_query->have_posts() ) :
                    $other_products_query->the_post();
                    $o_idx++;
                    $is_rev    = ( $o_idx % 2 === 0 );
                    $row_class = $is_rev ? 'gv-explore-row gv-explore-row-reverse' : 'gv-explore-row';
                    $o_img     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : $img_dir . 'Product Unggulan 1.png';
                ?>
                    <div style="display: grid; grid-template-columns: 1fr; gap: 2.5rem; align-items: center;" class="<?php echo esc_attr( $row_class ); ?>">
                        <?php if ( $is_rev ) : ?>
                            <div class="gv-explore-img-card">
                                <img src="<?php echo esc_url( $o_img ); ?>" alt="<?php the_title(); ?>" class="gv-explore-img" style="width: 100%; height: auto; object-fit: cover;">
                            </div>
                            <div class="gv-explore-text-col">
                                <h3 class="gv-explore-item-title" style="font-size: 1.75rem; font-weight: 500; margin-bottom: 0.75rem;"><?php the_title(); ?></h3>
                                <p class="gv-explore-item-desc" style="color: var(--color-nw-500); font-size: 0.9375rem; line-height: 1.7; margin-bottom: 1.5rem; max-width: 32rem;">
                                    <?php echo esc_html( get_the_excerpt() ); ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="gv-btn gv-btn-outline gv-btn-sm gv-explore-btn">Detail &rarr;</a>
                            </div>
                        <?php else : ?>
                            <div class="gv-explore-text-col">
                                <h3 class="gv-explore-item-title" style="font-size: 1.75rem; font-weight: 500; margin-bottom: 0.75rem;"><?php the_title(); ?></h3>
                                <p class="gv-explore-item-desc" style="color: var(--color-nw-500); font-size: 0.9375rem; line-height: 1.7; margin-bottom: 1.5rem; max-width: 32rem;">
                                    <?php echo esc_html( get_the_excerpt() ); ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="gv-btn gv-btn-outline gv-btn-sm gv-explore-btn">Detail &rarr;</a>
                            </div>
                            <div class="gv-explore-img-card">
                                <img src="<?php echo esc_url( $o_img ); ?>" alt="<?php the_title(); ?>" class="gv-explore-img" style="width: 100%; height: auto; object-fit: cover;">
                            </div>
                        <?php endif; ?>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <div style="text-align: center;">
                <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" class="gv-btn gv-btn-primary">
                    View All Products &rarr;
                </a>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>

<style>
@media (min-width: 900px) {
    .gv-specs-split { grid-template-columns: 1fr 1fr !important; }
}
</style>

<!-- CTA Banner (High-Fidelity Figma Component) -->
<?php
get_template_part( 'template-parts/cta-banner', null, array(
    'title'    => 'Ready To Source Premium<br>Indonesian Vanilla?',
    'btn_text' => 'Request a Quote',
    'btn_url'  => home_url( '/contact/' ),
) );
?>

<?php
get_footer();
