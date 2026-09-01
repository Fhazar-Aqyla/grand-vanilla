<?php
/**
 * The main template file
 *
 * @package GrandVanilla
 */

get_header();
?>

<div class="gv-section-sm" style="background: linear-gradient(180deg, #f7efe4 0%, var(--color-cream) 100%); border-bottom: 1px solid var(--color-stone-200); text-align: center;">
    <div class="gv-container">
        <span class="gv-badge gv-badge-primary" style="margin-bottom: 0.75rem;">Export Market Insights</span>
        <h1 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.75rem;">
            <?php
            if ( is_home() && ! is_front_page() ) {
                single_post_title();
            } elseif ( is_archive() ) {
                the_archive_title();
            } elseif ( is_search() ) {
                printf( esc_html__( 'Search Results for: %s', 'grand-vanilla' ), '<span>' . get_search_query() . '</span>' );
            } else {
                esc_html_e( 'Latest Vanilla Industry News & Insights', 'grand-vanilla' );
            }
            ?>
        </h1>
        <p style="color: var(--color-stone-600); max-width: 36rem; margin: 0 auto; font-size: 0.9375rem;">
            Stay updated with vanilla harvest seasons, curing techniques, market pricing, and international export guidelines.
        </p>
    </div>
</div>

<div class="gv-section">
    <div class="gv-container">
        <?php if ( have_posts() ) : ?>
            <div class="gv-grid-3">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'gv-card' ); ?> style="padding: 1.5rem; display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div style="margin: -1.5rem -1.5rem 1.25rem -1.5rem; height: 200px; overflow: hidden; border-radius: var(--radius-md) var(--radius-md) 0 0;">
                                    <?php the_post_thumbnail( 'medium_large', array( 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
                                </div>
                            <?php endif; ?>

                            <div style="font-size: 0.75rem; color: var(--color-primary); font-weight: 700; text-transform: uppercase; margin-bottom: 0.5rem;">
                                <?php echo get_the_date(); ?>
                            </div>

                            <h2 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.75rem;">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <div style="font-size: 0.875rem; color: var(--color-stone-600); line-height: 1.6; margin-bottom: 1.25rem;">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>

                        <div style="padding-top: 1rem; border-top: 1px solid var(--color-stone-100);">
                            <a href="<?php the_permalink(); ?>" class="gv-btn gv-btn-outline gv-btn-sm" style="width: 100%;">
                                Read Full Article &rarr;
                            </a>
                        </div>
                    </article>
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
                <h2>No articles found</h2>
                <p style="color: var(--color-stone-600); margin-top: 0.5rem;">Check back soon for new harvest reports and vanilla export news.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
