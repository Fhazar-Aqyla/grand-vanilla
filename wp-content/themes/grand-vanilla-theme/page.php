<?php
/**
 * The template for displaying all pages
 *
 * @package GrandVanilla
 */

get_header();
?>

<div class="gv-section-sm" style="background: linear-gradient(180deg, #f7efe4 0%, var(--color-cream) 100%); border-bottom: 1px solid var(--color-stone-200);">
    <div class="gv-container">
        <h1 style="font-size: 2.25rem; font-weight: 500;"><?php the_title(); ?></h1>
    </div>
</div>

<div class="gv-section">
    <div class="gv-container">
        <div class="gv-card gv-content">
            <?php
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
