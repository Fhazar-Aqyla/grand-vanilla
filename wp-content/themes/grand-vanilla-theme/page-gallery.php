<?php
/**
 * Template Name: Gallery Page
 *
 * @package GrandVanilla
 */

get_header();
?>

<div class="gv-section-sm" style="background: linear-gradient(180deg, #f7efe4 0%, var(--color-cream) 100%); border-bottom: 1px solid var(--color-stone-200); text-align: center;">
    <div class="gv-container">
        <span class="gv-badge gv-badge-primary" style="margin-bottom: 0.75rem;">Proof of Harvest & Processing</span>
        <h1 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.75rem;">Harvest & Sun Curing Gallery</h1>
        <p style="color: var(--color-stone-600); max-width: 38rem; margin: 0 auto; font-size: 0.9375rem;">
            Visual documentation of our agroforestry vanilla plantations, hand pollination, sun drying decks, wooden crate sweating, and export packaging.
        </p>
    </div>
</div>

<div class="gv-section">
    <div class="gv-container">
        
        <div class="gv-grid-3">
            <?php
            $gallery_query = new WP_Query( array(
                'post_type'      => 'vanilla_gallery',
                'posts_per_page' => 12,
                'post_status'    => 'publish',
            ) );

            if ( $gallery_query->have_posts() ) :
                while ( $gallery_query->have_posts() ) : $gallery_query->the_post();
                    ?>
                    <div class="gv-card" style="padding: 1rem;">
                        <div style="height: 220px; overflow: hidden; border-radius: var(--radius-sm); margin-bottom: 1rem; background: var(--color-cream-card);">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'gallery-thumb', array( 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
                            <?php else : ?>
                                <div style="display: flex; align-items: center; justify-content: center; height: 100%; font-size: 2.5rem;">
                                    📷
                                </div>
                            <?php endif; ?>
                        </div>
                        <h3 style="font-size: 1.125rem; font-weight: 700;"><?php the_title(); ?></h3>
                        <?php if ( get_the_content() ) : ?>
                            <p style="font-size: 0.8125rem; color: var(--color-stone-600); margin-top: 0.5rem;"><?php echo get_the_excerpt(); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Realistic documentation cards matching harvest & curing processes
                $dummy_galleries = array(
                    array(
                        'title' => 'Harvest at Peak Yellow Tips',
                        'desc'  => 'Vanilla beans are carefully hand-picked individually only when the blossom end turns pale golden yellow.',
                        'icon'  => '🌱'
                    ),
                    array(
                        'title' => 'Traditional Sun Drying Decks',
                        'desc'  => 'Pods spread on clean wooden blankets for 2-3 hours of gentle morning sun exposure.',
                        'icon'  => '☀️'
                    ),
                    array(
                        'title' => 'Wooden Box Night Sweating',
                        'desc'  => 'Wrapped in woolen blankets and stored in pinewood crates to induce enzyme hydrolyzation into vanillin.',
                        'icon'  => '📦'
                    ),
                    array(
                        'title' => 'Manual Pod Sorting & Grading',
                        'desc'  => 'Experienced artisan sorters measuring length, moisture retention, and aroma purity.',
                        'icon'  => '🔍'
                    ),
                    array(
                        'title' => 'Aroma-Sealed Wax Bundling',
                        'desc'  => 'Tied with raffia and enveloped in European food-grade wax paper to preserve volatile oils.',
                        'icon'  => '✨'
                    ),
                    array(
                        'title' => 'Vacuum Packaging for Export',
                        'desc'  => 'Multilayer food-grade vacuum sealing ensuring freshness during transatlantic cargo flights.',
                        'icon'  => '✈️'
                    ),
                );

                foreach ( $dummy_galleries as $dg ) :
                    ?>
                    <div class="gv-card" style="padding: 1.5rem;">
                        <div style="height: 180px; overflow: hidden; border-radius: var(--radius-sm); margin-bottom: 1.25rem; background: var(--color-cream-card); display: flex; flex-direction: column; align-items: center; justify-content: center;">
                            <span style="font-size: 3rem; margin-bottom: 0.5rem;"><?php echo esc_html( $dg['icon'] ); ?></span>
                            <span style="font-size: 0.75rem; color: var(--color-stone-500); font-weight: 700; text-transform: uppercase;">Harvest & Curing Process</span>
                        </div>
                        <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem;"><?php echo esc_html( $dg['title'] ); ?></h3>
                        <p style="font-size: 0.8125rem; color: var(--color-stone-600); line-height: 1.5;"><?php echo esc_html( $dg['desc'] ); ?></p>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>

    </div>
</div>

<?php
get_footer();
