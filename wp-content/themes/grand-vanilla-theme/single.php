<?php
/**
 * The template for displaying all single posts
 *
 * @package GrandVanilla
 */

get_header();
?>

<div class="gv-section-sm" style="background: linear-gradient(180deg, #f7efe4 0%, var(--color-cream) 100%); border-bottom: 1px solid var(--color-stone-200);">
    <div class="gv-container" style="max-width: 800px;">
        <div style="font-size: 0.8125rem; color: var(--color-primary); font-weight: 700; text-transform: uppercase; margin-bottom: 0.5rem;">
            Published on <?php echo get_the_date(); ?> &bull; By <?php the_author(); ?>
        </div>
        <h1 style="font-size: 2.25rem; font-weight: 800; line-height: 1.25; margin-bottom: 1rem;"><?php the_title(); ?></h1>
    </div>
</div>

<div class="gv-section">
    <div class="gv-container" style="max-width: 800px;">
        <article class="gv-card gv-content">
            <?php if ( has_post_thumbnail() ) : ?>
                <div style="margin: -2.5rem -2.5rem 2rem -2.5rem; overflow: hidden; border-radius: var(--radius-md) var(--radius-md) 0 0;">
                    <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: auto;' ) ); ?>
                </div>
            <?php endif; ?>

            <?php
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
            ?>

            <div style="margin-top: 3rem; padding-top: 1.5rem; border-top: 1px solid var(--color-stone-200); display: flex; justify-content: space-between; align-items: center;">
                <a href="<?php echo esc_url( home_url( '/articles/' ) ); ?>" style="font-weight: 700; color: var(--color-primary);">
                    &larr; Back to Articles
                </a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="gv-btn gv-btn-primary gv-btn-sm">
                    Inquire Products
                </a>
            </div>
        </article>
    </div>
</div>

<?php
get_footer();
