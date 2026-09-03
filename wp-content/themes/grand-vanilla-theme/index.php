<?php
/**
 * The main template file (Blog Archive)
 * CMS-driven via WordPress Posts & Categories
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();

// ── Filter & Pagination ───────────────────────────────
$active_filter = isset( $_GET['blog_cat'] ) ? sanitize_text_field( wp_unslash( $_GET['blog_cat'] ) ) : 'all';
$posts_per_page = 4;
$current_page   = max( 1, isset( $_GET['blog_page'] ) ? absint( $_GET['blog_page'] ) : 1 );

$query_args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => $posts_per_page,
    'offset'         => ( $current_page - 1 ) * $posts_per_page,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

if ( $active_filter !== 'all' ) {
    $query_args['category_name'] = $active_filter;
}

$blog_query  = new WP_Query( $query_args );
$total_posts = $blog_query->found_posts;
$total_pages = (int) ceil( $total_posts / $posts_per_page );

// Build base URL for pagination/filter links
$base_url = get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/' );

// Fallback images (alternates when no featured image set)
$fallback_imgs = array(
    $img_dir . 'Buat Blog Example 1.png',
    $img_dir . 'Buat blog example 2.png',
);

// Categories for filter tabs
$filter_categories = array(
    array( 'slug' => 'vanilla-guide',   'label' => 'Vanilla Guide' ),
    array( 'slug' => 'vanilla-insight', 'label' => 'Vanilla Insight' ),
    array( 'slug' => 'global-market',   'label' => 'Global Market' ),
);
?>

<!-- 1. Hero Section -->
<section class="gv-hero-page" style="background-image: url('<?php echo esc_url( $img_dir . 'Blog Hero Section.png' ); ?>');">
    <div class="gv-container">
        <h1 class="gv-hero-tag">#readmore</h1>
        <p class="gv-hero-subtag">Discover the latest trends on our blog!</p>
    </div>
</section>

<!-- 2. Insights List Section -->
<section class="gv-blog-archive-section">
    <div class="gv-container">

        <!-- Section Header: 2 columns -->
        <div class="gv-blog-header">
            <div class="gv-blog-header-left">
                <span class="gv-blog-tag">
                    <span class="gv-blog-tag-line"></span>
                    Blog
                </span>
                <h2 class="gv-blog-heading">Insights From The World<br>Of Vanilla</h2>
            </div>
            <div class="gv-blog-header-right">
                <p class="gv-blog-header-desc">Discover insights on Indonesian vanilla, sourcing, quality, industry trends, and applications.</p>
            </div>
        </div>

        <!-- Filter Tabs (link-based, CMS-friendly) -->
        <div class="gv-blog-tabs">
            <a href="<?php echo esc_url( $base_url ); ?>"
               class="gv-blog-tab <?php echo $active_filter === 'all' ? 'active' : ''; ?>">
                All Blogs
            </a>
            <?php foreach ( $filter_categories as $fc ) : ?>
            <a href="<?php echo esc_url( add_query_arg( 'blog_cat', $fc['slug'], $base_url ) ); ?>"
               class="gv-blog-tab <?php echo $active_filter === $fc['slug'] ? 'active' : ''; ?>">
                <?php echo esc_html( $fc['label'] ); ?>
            </a>
            <?php endforeach; ?>
        </div>

        <!-- Blog Articles List -->
        <div class="gv-blog-list" id="gv-blog-list">

            <?php if ( $blog_query->have_posts() ) :
                $post_index = 0;
                while ( $blog_query->have_posts() ) :
                    $blog_query->the_post();

                    // Badge: counts down from total (e.g. "12/12")
                    $global_index   = ( $current_page - 1 ) * $posts_per_page + $post_index;
                    $badge_current  = str_pad( $total_posts - $global_index, 2, '0', STR_PAD_LEFT );
                    $badge_total    = str_pad( $total_posts, 2, '0', STR_PAD_LEFT );
                    $badge          = $badge_current . '/' . $badge_total;

                    // Featured image or fallback
                    if ( has_post_thumbnail() ) {
                        $img_src = get_the_post_thumbnail_url( null, 'large' );
                    } else {
                        $img_src = $fallback_imgs[ $post_index % 2 ];
                    }

                    // Category (first category)
                    $cats     = get_the_category();
                    $cat_name = ! empty( $cats ) ? $cats[0]->name : 'Blog';

                    $post_index++;
                    ?>
                    <div class="gv-blog-item">
                        <!-- Badge number -->
                        <span class="gv-blog-badge"><?php echo esc_html( $badge ); ?></span>

                        <!-- Image + Content row -->
                        <div class="gv-blog-row">
                            <div class="gv-blog-img-wrap">
                                <img
                                    src="<?php echo esc_url( $img_src ); ?>"
                                    alt="<?php echo esc_attr( get_the_title() ); ?>"
                                    class="gv-blog-img"
                                    loading="lazy"
                                >
                            </div>

                            <div class="gv-blog-content">
                                <span class="gv-blog-cat-tag">
                                    <span class="gv-blog-cat-line"></span>
                                    <?php echo esc_html( $cat_name ); ?>
                                </span>
                                <h3 class="gv-blog-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <p class="gv-blog-excerpt">
                                    <?php echo wp_trim_words( get_the_excerpt(), 28, '...' ); ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="gv-blog-readmore">
                                    Continue Reading &nbsp;&rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();

            else : ?>
                <div class="gv-blog-empty">
                    <p>No articles found in this category yet. Check back soon!</p>
                </div>
            <?php endif; ?>

        </div><!-- /.gv-blog-list -->

        <!-- Pagination -->
        <?php if ( $total_pages > 1 ) : ?>
        <nav class="gv-blog-pagination" aria-label="Blog pagination">

            <?php
            // Build prev/next & page links
            $prev_page = $current_page - 1;
            $next_page = $current_page + 1;

            function gv_page_url( $page, $base_url, $active_filter ) {
                $args = array( 'blog_page' => $page );
                if ( $active_filter !== 'all' ) {
                    $args['blog_cat'] = $active_filter;
                }
                return add_query_arg( $args, $base_url );
            }

            $prev_svg = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>';
            $next_svg = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>';
            ?>

            <!-- Prev -->
            <?php if ( $current_page > 1 ) : ?>
                <a href="<?php echo esc_url( gv_page_url( $prev_page, $base_url, $active_filter ) ); ?>" class="gv-page-btn" aria-label="Previous page"><?php echo $prev_svg; ?></a>
            <?php else : ?>
                <span class="gv-page-btn" style="opacity:.35; cursor:not-allowed;"><?php echo $prev_svg; ?></span>
            <?php endif; ?>

            <!-- Page numbers -->
            <?php
            $page_range = array();
            if ( $total_pages <= 7 ) {
                $page_range = range( 1, $total_pages );
            } else {
                $page_range[] = 1;
                if ( $current_page > 3 ) { $page_range[] = '...'; }
                for ( $p = max( 2, $current_page - 1 ); $p <= min( $total_pages - 1, $current_page + 1 ); $p++ ) {
                    $page_range[] = $p;
                }
                if ( $current_page < $total_pages - 2 ) { $page_range[] = '...'; }
                $page_range[] = $total_pages;
            }

            foreach ( $page_range as $p ) :
                if ( $p === '...' ) : ?>
                    <span class="gv-page-dots">...</span>
                <?php elseif ( $p === $current_page ) : ?>
                    <span class="gv-page-btn active" aria-current="page"><?php echo esc_html( $p ); ?></span>
                <?php else : ?>
                    <a href="<?php echo esc_url( gv_page_url( $p, $base_url, $active_filter ) ); ?>" class="gv-page-btn" aria-label="Page <?php echo esc_attr( $p ); ?>"><?php echo esc_html( $p ); ?></a>
                <?php endif;
            endforeach;
            ?>

            <!-- Next -->
            <?php if ( $current_page < $total_pages ) : ?>
                <a href="<?php echo esc_url( gv_page_url( $next_page, $base_url, $active_filter ) ); ?>" class="gv-page-btn" aria-label="Next page"><?php echo $next_svg; ?></a>
            <?php else : ?>
                <span class="gv-page-btn" style="opacity:.35; cursor:not-allowed;"><?php echo $next_svg; ?></span>
            <?php endif; ?>

        </nav>
        <?php endif; ?>

    </div><!-- /.gv-container -->
</section>

<style>
/* ── Blog Archive Section ─────────────────────────────── */
.gv-blog-archive-section {
    background: #e8e8df;
    padding: 5rem 0 6rem;
}

/* Header */
.gv-blog-header {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
    margin-bottom: 2.5rem;
}

@media (min-width: 768px) {
    .gv-blog-header {
        grid-template-columns: 1fr 1fr;
        align-items: end;
        gap: 2rem;
        margin-bottom: 3rem;
    }
}

.gv-blog-tag {
    display: flex;
    align-items: center;
    gap: 0.625rem;
    font-size: 0.8125rem;
    font-family: var(--font-heading);
    color: var(--color-nw-500);
    letter-spacing: 0.03em;
    margin-bottom: 0.875rem;
}

.gv-blog-tag-line {
    display: inline-block;
    width: 2rem;
    height: 1px;
    background: var(--color-nw-500);
}

.gv-blog-heading {
    font-family: var(--font-heading);
    font-size: clamp(1.75rem, 3.5vw, 2.5rem);
    font-weight: 800;
    color: var(--color-dark-khaki);
    line-height: 1.2;
    margin: 0;
}

.gv-blog-header-right {
    display: flex;
    align-items: flex-end;
    justify-content: flex-end;
}

.gv-blog-header-desc {
    font-size: 0.9rem;
    color: var(--color-nw-500);
    line-height: 1.7;
    text-align: right;
    max-width: 26rem;
    margin: 0;
}

/* Filter Tabs */
.gv-blog-tabs {
    display: flex;
    gap: 0.625rem;
    flex-wrap: wrap;
    margin-bottom: 3rem;
}

.gv-blog-tab {
    padding: 0.45rem 1.125rem;
    border: 1.5px solid var(--color-dark-khaki);
    border-radius: var(--radius-4);
    background: transparent;
    font-family: var(--font-heading);
    font-size: 0.8125rem;
    font-weight: 600;
    color: var(--color-dark-khaki);
    cursor: pointer;
    text-decoration: none;
    transition: background 0.2s, color 0.2s;
    display: inline-flex;
    align-items: center;
}

.gv-blog-tab:hover,
.gv-blog-tab.active {
    background: var(--color-dark-khaki);
    color: #fff;
}

/* Blog list */
.gv-blog-list {
    display: flex;
    flex-direction: column;
    gap: 0;
}

/* Empty state */
.gv-blog-empty {
    text-align: center;
    padding: 4rem 0;
    color: var(--color-nw-500);
    font-size: 1rem;
}

/* Individual item */
.gv-blog-item {
    padding-bottom: 0.5rem;
    margin-bottom: 1rem;
}

/* Badge number */
.gv-blog-badge {
    display: block;
    font-family: var(--font-heading);
    font-size: clamp(3rem, 7vw, 5.5rem);
    font-weight: 800;
    color: rgba(54, 62, 25, 0.13);
    line-height: 1;
    margin-bottom: -1rem;
    letter-spacing: -0.02em;
    pointer-events: none;
    user-select: none;
}

/* Row: image + content */
.gv-blog-row {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
    align-items: center;
    margin-bottom: 3rem;
}

@media (min-width: 700px) {
    .gv-blog-row {
        grid-template-columns: 2fr 3fr;
        gap: 3rem;
    }
}

/* Image */
.gv-blog-img-wrap {
    border-radius: var(--radius-8);
    overflow: hidden;
    aspect-ratio: 4 / 3;
}

.gv-blog-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}

.gv-blog-img-wrap:hover .gv-blog-img {
    transform: scale(1.03);
}

/* Content */
.gv-blog-content {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.gv-blog-cat-tag {
    display: flex;
    align-items: center;
    gap: 0.625rem;
    font-size: 0.8125rem;
    font-family: var(--font-heading);
    color: var(--color-nw-500);
    letter-spacing: 0.03em;
}

.gv-blog-cat-line {
    display: inline-block;
    width: 1.75rem;
    height: 1px;
    background: var(--color-nw-500);
    flex-shrink: 0;
}

.gv-blog-title {
    font-family: var(--font-heading);
    font-size: clamp(1.25rem, 2.5vw, 1.75rem);
    font-weight: 800;
    color: var(--color-dark-khaki);
    line-height: 1.25;
    margin: 0;
}

.gv-blog-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.2s;
}

.gv-blog-title a:hover {
    color: var(--color-dark-khaki-hover);
}

.gv-blog-excerpt {
    font-size: 0.9rem;
    color: var(--color-nw-500);
    line-height: 1.7;
    margin: 0;
}

.gv-blog-readmore {
    display: inline-flex;
    align-items: center;
    font-size: 0.875rem;
    font-weight: 600;
    font-family: var(--font-heading);
    color: var(--color-dark-khaki);
    text-decoration: underline;
    text-underline-offset: 3px;
    transition: color 0.2s;
    margin-top: 0.25rem;
}

.gv-blog-readmore:hover {
    color: var(--color-dark-khaki-hover);
}

/* ── Pagination ─────────────────────────────────────── */
.gv-blog-pagination {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding-top: 2.5rem;
    padding-bottom: 1rem;
    flex-wrap: wrap;
}

.gv-page-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 2.5rem;
    height: 2.5rem;
    padding: 0 0.625rem;
    border: 1.5px solid var(--color-dark-khaki);
    border-radius: var(--radius-4);
    background: transparent;
    font-family: var(--font-heading);
    font-size: 0.8125rem;
    font-weight: 600;
    color: var(--color-dark-khaki);
    cursor: pointer;
    text-decoration: none;
    transition: background 0.2s, color 0.2s, transform 0.15s;
    user-select: none;
    line-height: 1;
}

.gv-page-btn:hover {
    background: rgba(54,62,25,0.08);
    transform: translateY(-1px);
}

.gv-page-btn.active {
    background: var(--color-dark-khaki);
    color: #fff;
    pointer-events: none;
}

.gv-page-dots {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 2.5rem;
    height: 2.5rem;
    font-size: 0.9rem;
    color: var(--color-nw-500);
    pointer-events: none;
    user-select: none;
}
</style>

<!-- 3. CTA Banner -->
<?php
get_template_part( 'template-parts/cta-banner', null, array(
    'title'    => 'Looking For A Reliable<br>Indonesian Vanilla Supplier?',
    'btn_text' => 'Request a Quote',
    'btn_url'  => home_url( '/contact/' ),
) );
?>

<?php
get_footer();
