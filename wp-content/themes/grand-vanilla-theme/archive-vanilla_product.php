<?php
/**
 * The template for displaying vanilla product catalog
 *
 * @package GrandVanilla
 */

get_header();
?>

<div class="gv-section-sm" style="background: linear-gradient(180deg, #f7efe4 0%, var(--color-cream) 100%); border-bottom: 1px solid var(--color-stone-200); text-align: center;">
    <div class="gv-container">
        <span class="gv-badge gv-badge-primary" style="margin-bottom: 0.75rem;">Wholesale & Bulk Export Catalog</span>
        <h1 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.75rem;">Indonesian Vanilla Products</h1>
        <p style="color: var(--color-stone-600); max-width: 38rem; margin: 0 auto; font-size: 0.9375rem;">
            Explore our sustainably cultivated vanilla bean varieties, extraction cuts, vanilla powder, and customized private-label export packaging.
        </p>
    </div>
</div>

<div class="gv-section">
    <div class="gv-container">
        
        <?php if ( have_posts() ) : ?>
            <div class="gv-grid-3">
                <?php while ( have_posts() ) : the_post();
                    $vanillin = get_post_meta( get_the_ID(), '_gv_vanillin', true ) ?: '1.8% - 2.4%';
                    $moisture = get_post_meta( get_the_ID(), '_gv_moisture', true ) ?: '28% - 33%';
                    $length   = get_post_meta( get_the_ID(), '_gv_length', true ) ?: '16 - 20 cm';
                    $grade    = get_post_meta( get_the_ID(), '_gv_grade', true ) ?: 'Gourmet Grade';
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
                                    Full Specs &rarr;
                                </a>
                                <a href="<?php echo esc_url( home_url( '/contact/?product=' . urlencode( get_the_title() ) ) ); ?>" class="gv-btn gv-btn-primary gv-btn-sm">
                                    Inquire Quote
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div style="margin-top: 3rem; text-align: center;">
                <?php
                the_posts_pagination( array(
                    'prev_text' => '&larr; Previous',
                    'next_text' => 'Next &rarr;',
                ) );
                ?>
            </div>

        <?php else : ?>
            <div class="gv-card" style="text-align: center; padding: 4rem 2rem;">
                <h2>Catalog is being updated</h2>
                <p style="color: var(--color-stone-600); margin-top: 0.5rem;">Contact our export desk directly for real-time stock and FOB pricing.</p>
            </div>
        <?php endif; ?>

    </div>
</div>

<?php
get_footer();
