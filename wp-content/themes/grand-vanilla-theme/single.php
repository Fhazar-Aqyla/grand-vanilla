<?php
/**
 * The template for displaying all single blog posts
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();
?>

<div class="gv-section-sm" style="border-bottom: 1px solid var(--color-nb-100); padding-bottom: 1.5rem;">
    <div class="gv-container" style="max-width: 860px;">
        <!-- Breadcrumbs -->
        <div style="font-size: 0.8125rem; color: var(--color-nw-500); font-family: var(--font-heading); margin-bottom: 2rem;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: var(--color-nw-500);">Home</a> / 
            <a href="<?php echo esc_url( home_url( '/articles/' ) ); ?>" style="color: var(--color-nw-500);">Blog</a> / 
            <span style="color: var(--color-pitch-black); font-weight: 700;"><?php the_title(); ?></span>
        </div>

        <div style="text-align: center; margin-bottom: 2rem;">
            <span style="font-size: 0.8125rem; color: var(--color-dark-khaki); font-weight: 700; text-transform: uppercase; font-family: var(--font-heading); display: block; margin-bottom: 0.75rem;">
                Vanilla Guide
            </span>
            <h1 style="font-size: clamp(2rem, 4vw, 2.75rem); font-weight: 800; line-height: 1.2; margin-bottom: 1rem;">
                <?php the_title(); ?>
            </h1>
            <p style="color: var(--color-nw-500); font-size: 1.0625rem; max-width: 42rem; margin: 0 auto 1.5rem; line-height: 1.6;">
                Discover the unique aroma, rich flavor profile, and meticulous cultivation processes that position Indonesian vanilla as a premium choice for global B2B culinary professionals.
            </p>
            <div style="font-size: 0.8125rem; color: var(--color-nw-400); font-family: var(--font-heading);">
                📅 <?php echo get_the_date(); ?> &bull; ⏱️ 6 min read
            </div>
        </div>
    </div>
</div>

<div class="gv-section">
    <div class="gv-container" style="max-width: 860px;">
        
        <!-- Hero Featured Image -->
        <div style="border-radius: var(--radius-16); overflow: hidden; box-shadow: var(--shadow-md); margin-bottom: 3.5rem; max-height: 480px;">
            <img src="<?php echo esc_url( $img_dir . 'Detail Blog.png' ); ?>" alt="<?php the_title(); ?>" style="width: 100%; height: auto; object-fit: cover;">
        </div>

        <!-- Article Content -->
        <article style="font-size: 1.0625rem; line-height: 1.8; color: var(--color-pitch-black); margin-bottom: 4rem;">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    the_content();
                endwhile;
            endif;
            ?>

            <!-- Pull Quote Box -->
            <blockquote style="background: var(--color-warm-sand); border-left: 4px solid var(--color-dark-khaki); padding: 1.75rem 2rem; border-radius: 0 var(--radius-12) var(--radius-12) 0; margin: 2.5rem 0; font-style: italic; font-size: 1.125rem; line-height: 1.7; color: var(--color-pitch-black);">
                "Indonesian vanilla isn't just an ingredient; it's a structural component of flavor. Its deep, complex profile provides a foundation that lighter vanillas simply cannot achieve in high-heat or complex formulations."
            </blockquote>

            <!-- Key Takeaways Box -->
            <div style="background: var(--color-parchment); border: 1px solid var(--color-nb-200); border-radius: var(--radius-16); padding: 2rem; margin-top: 3rem;">
                <h3 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 1rem; color: var(--color-dark-khaki);">Key Takeaways</h3>
                
                <ul style="display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.9375rem; color: var(--color-pitch-black);">
                    <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                        <span style="color: var(--color-dark-khaki); font-weight: 800;">✓</span>
                        <span>Indonesian vanilla offers a unique woody, smoky flavor profile ideal for industrial F&B applications.</span>
                    </li>
                    <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                        <span style="color: var(--color-dark-khaki); font-weight: 800;">✓</span>
                        <span>Rigorous hand-pollination and traditional curing ensure consistently high vanillin content.</span>
                    </li>
                    <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                        <span style="color: var(--color-dark-khaki); font-weight: 800;">✓</span>
                        <span>Direct B2B sourcing guarantees traceability and premium quality control.</span>
                    </li>
                </ul>
            </div>
        </article>

        <!-- Explore More Insights -->
        <div style="border-top: 1px solid var(--color-nb-200); padding-top: 3.5rem;">
            <h2 style="font-size: 1.75rem; font-weight: 800; margin-bottom: 2.5rem;">Explore More Insights</h2>

            <div style="display: flex; flex-direction: column; gap: 2rem; margin-bottom: 3rem;">
                <div class="gv-card" style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; padding: 1.5rem; align-items: center;" class="gv-blog-card-split">
                    <div style="position: relative; border-radius: var(--radius-12); overflow: hidden; height: 180px;">
                        <img src="<?php echo esc_url( $img_dir . 'Buat blog example 2.png' ); ?>" alt="From Vanilla Bean to Global Ingredient" style="width: 100%; height: 100%; object-fit: cover;">
                        <span style="position: absolute; top: 1rem; left: 1rem; font-size: 2rem; font-weight: 800; font-family: var(--font-heading); color: #fff; text-shadow: 0 2px 8px rgba(0,0,0,0.6);">11/12</span>
                    </div>
                    <div>
                        <span style="font-size: 0.75rem; color: var(--color-dark-khaki); font-weight: 700; text-transform: uppercase;">Vanilla Insight</span>
                        <h3 style="font-size: 1.25rem; font-weight: 800; margin: 0.35rem 0 0.5rem;">From Vanilla Bean to Global Ingredient</h3>
                        <p style="color: var(--color-nw-500); font-size: 0.875rem; margin-bottom: 1rem;">Explore how quality vanilla is sourced, processed, and prepared to meet the needs of international B2B buyers.</p>
                        <a href="<?php echo esc_url( home_url( '/from-vanilla-bean-to-global-ingredient/' ) ); ?>" class="gv-btn gv-btn-outline gv-btn-sm">Continue Reading &rarr;</a>
                    </div>
                </div>
            </div>

            <div style="text-align: center;">
                <a href="<?php echo esc_url( home_url( '/articles/' ) ); ?>" class="gv-btn gv-btn-primary">
                    View All Blogs &rarr;
                </a>
            </div>
        </div>

    </div>
</div>

<!-- CTA Banner -->
<section class="gv-cta-banner">
    <div class="gv-container">
        <h2>Looking For A Reliable<br>Indonesian Vanilla Supplier?</h2>
        <div style="display: flex; justify-content: center; gap: 1rem;">
            <a href="<?php echo esc_url( $contact['whatsapp_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="gv-btn gv-btn-primary">
                Request a Quote
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
