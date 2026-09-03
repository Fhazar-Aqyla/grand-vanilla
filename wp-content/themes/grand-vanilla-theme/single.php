<?php
/**
 * The template for displaying all single blog posts
 * High-Fidelity implementation matching Figma (Desktop, Tablet, Mobile)
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();

// ── Post Data ─────────────────────────────────────────
if ( ! have_posts() ) {
    get_footer();
    exit;
}

the_post();

// Category
$cats     = get_the_category();
$cat_name = ! empty( $cats ) ? $cats[0]->name : 'Vanilla Guide';

// Excerpt
$excerpt = get_the_excerpt();
if ( empty( $excerpt ) ) {
    $excerpt = 'Discover the unique aroma, rich flavor profile, and meticulous cultivation processes that position Indonesian vanilla as a premium choice for global B2B culinary professionals.';
}

// Date formatted: "12 December 2026"
$post_date = get_the_date( 'j F Y' );

// Reading time
$word_count   = str_word_count( strip_tags( get_the_content() ) );
$reading_time = max( 1, (int) ceil( $word_count / 200 ) );

// Featured image (fallback to Detail Blog.png)
$featured_img = has_post_thumbnail()
    ? get_the_post_thumbnail_url( null, 'full' )
    : $img_dir . 'Detail Blog.png';

// Blog archive URL
$blog_url = get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/articles/' );
?>

<div class="gv-detail-blog-page">

    <!-- ① Breadcrumb Bar with Container Divider Line -->
    <div class="gv-detail-bc-wrapper">
        <div class="gv-container">
            <nav class="gv-detail-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <span class="gv-detail-bc-sep">//</span>
                <a href="<?php echo esc_url( $blog_url ); ?>">Blog</a>
                <span class="gv-detail-bc-sep">//</span>
                <span class="gv-detail-bc-current"><?php echo esc_html( wp_trim_words( get_the_title(), 5, '...' ) ); ?></span>
            </nav>
            <div class="gv-detail-header-divider"></div>
        </div>
    </div>

    <!-- ② Post Header (Centered, continuous background) -->
    <section class="gv-detail-header-section">
        <div class="gv-container">
            <div class="gv-detail-header-inner">
                <span class="gv-detail-cat"><?php echo esc_html( $cat_name ); ?></span>
                <h1 class="gv-detail-title"><?php the_title(); ?></h1>
                <p class="gv-detail-excerpt"><?php echo esc_html( $excerpt ); ?></p>
                <div class="gv-detail-meta">
                    <span class="gv-detail-meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <?php echo esc_html( $post_date ); ?>
                    </span>
                    <span class="gv-detail-meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <?php echo esc_html( $reading_time ); ?> min read
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- ③ Featured Image (Full Container Width, Sharp Corners) -->
    <div class="gv-detail-featured-section">
        <div class="gv-container">
            <div class="gv-detail-featured-wrap">
                <img
                    src="<?php echo esc_url( $featured_img ); ?>"
                    alt="<?php echo esc_attr( get_the_title() ); ?>"
                    class="gv-detail-featured-img"
                    loading="eager"
                >
            </div>
        </div>
    </div>

    <!-- ④ Article Body Content -->
    <section class="gv-detail-content-section">
        <div class="gv-container">
            <div class="gv-detail-article-wrap">
                <article class="gv-detail-article">
                    <?php
                    $raw_content = apply_filters( 'the_content', get_the_content() );

                    // Automatically wrap Key Takeaways heading + list into styled container
                    if ( preg_match( '/<h3[^>]*>.*?Key Takeaways.*?<\/h3>\s*<ul[^>]*>.*?<\/ul>/is', $raw_content ) ) {
                        $raw_content = preg_replace(
                            '/(<h3[^>]*>.*?Key Takeaways.*?<\/h3>\s*<ul[^>]*>.*?<\/ul>)/is',
                            '<div class="gv-takeaways-box">$1</div>',
                            $raw_content
                        );
                    }

                    echo $raw_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    ?>
                </article>
            </div>
        </div>
    </section>

    <!-- ⑤ Explore More Insights Section -->
    <?php
    $related_args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 2,
        'post__not_in'   => array( get_the_ID() ),
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    $related_query = new WP_Query( $related_args );
    $total_posts   = wp_count_posts( 'post' )->publish;

    $fallback_imgs = array(
        $img_dir . 'Buat Blog Example 1.png',
        $img_dir . 'Buat blog example 2.png',
    );

    if ( $related_query->have_posts() ) :
    ?>
    <section class="gv-detail-more-section">
        <div class="gv-container">
            <h2 class="gv-detail-more-heading">Explore More Insights</h2>

            <div class="gv-detail-more-list">
                <?php
                $rel_idx = 0;
                while ( $related_query->have_posts() ) :
                    $related_query->the_post();

                    // Badge (counts down: e.g. 11/12, 10/12)
                    $badge_num  = str_pad( max( 1, $total_posts - $rel_idx - 1 ), 2, '0', STR_PAD_LEFT );
                    $badge_tot  = str_pad( $total_posts, 2, '0', STR_PAD_LEFT );
                    $badge      = $badge_num . '/' . $badge_tot;

                    // Image
                    if ( has_post_thumbnail() ) {
                        $rel_img = get_the_post_thumbnail_url( null, 'large' );
                    } else {
                        $rel_img = $fallback_imgs[ $rel_idx % 2 ];
                    }

                    // Category
                    $rel_cats     = get_the_category();
                    $rel_cat_name = ! empty( $rel_cats ) ? $rel_cats[0]->name : 'Vanilla Guide';
                    $rel_idx++;
                    ?>
                    <div class="gv-detail-more-item">
                        <span class="gv-detail-more-badge"><?php echo esc_html( $badge ); ?></span>
                        <div class="gv-detail-more-row">
                            <div class="gv-detail-more-img-wrap">
                                <img
                                    src="<?php echo esc_url( $rel_img ); ?>"
                                    alt="<?php echo esc_attr( get_the_title() ); ?>"
                                    class="gv-detail-more-img"
                                    loading="lazy"
                                >
                            </div>
                            <div class="gv-detail-more-content">
                                <span class="gv-detail-more-cat">
                                    <span class="gv-detail-more-cat-line"></span>
                                    <?php echo esc_html( $rel_cat_name ); ?>
                                </span>
                                <h3 class="gv-detail-more-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="gv-detail-more-desc">
                                    <?php echo wp_trim_words( get_the_excerpt(), 22, '...' ); ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="gv-detail-more-link">
                                    Continue Reading &nbsp;&rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <!-- View All Blogs Button -->
            <div class="gv-detail-more-footer">
                <a href="<?php echo esc_url( $blog_url ); ?>" class="gv-detail-view-all-btn">
                    View All Blogs &nbsp;&rarr;
                </a>
            </div>
        </div>
    </section>
    <?php endif; ?>

</div><!-- /.gv-detail-blog-page -->

<!-- ⑥ CTA Banner -->
<?php
get_template_part( 'template-parts/cta-banner', null, array(
    'title'    => 'Looking For A Reliable<br>Indonesian Vanilla Supplier?',
    'btn_text' => 'Request a Quote',
    'btn_url'  => home_url( '/contact/' ),
) );
?>

<style>
/* ==========================================================================
   DETAIL BLOG — Pixel-Perfect High-Fidelity Styling (Desktop / Tablet / Mobile)
   Matches Figma Specifications: #E1E2DD Continuous Canvas, Clean Typography
   ========================================================================== */

.gv-detail-blog-page {
    background-color: #E1E2DD;
    color: #363E19;
    font-family: var(--font-body, 'Inter', sans-serif);
    width: 100%;
    overflow-x: hidden;
}

/* ① Breadcrumbs */
.gv-detail-bc-wrapper {
    background-color: #E1E2DD;
    padding-top: 1.75rem;
}

.gv-detail-breadcrumb {
    display: flex;
    align-items: center;
    gap: 0.625rem;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.875rem;
    color: #979492;
    flex-wrap: wrap;
}

.gv-detail-breadcrumb a {
    color: #979492;
    text-decoration: none;
    transition: color 0.2s ease;
}

.gv-detail-breadcrumb a:hover {
    color: #363E19;
}

.gv-detail-bc-sep {
    color: #979492;
    font-weight: 400;
}

.gv-detail-bc-current {
    color: #363E19;
    font-weight: 700;
}

.gv-detail-header-divider {
    width: 100%;
    height: 1.5px;
    background-color: #363E19;
    margin-top: 1rem;
}

/* ② Post Header */
.gv-detail-header-section {
    background-color: #E1E2DD;
    padding: 3.5rem 0 2.5rem;
}

.gv-detail-header-inner {
    text-align: center;
    max-width: 900px;
    margin: 0 auto;
}

.gv-detail-cat {
    display: inline-block;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.9375rem;
    font-weight: 600;
    color: #363E19;
    margin-bottom: 1rem;
    letter-spacing: 0.02em;
}

.gv-detail-title {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(2.25rem, 4.5vw, 3.75rem);
    font-weight: 800;
    color: #363E19;
    line-height: 1.15;
    margin: 0 0 1.5rem 0;
    letter-spacing: -0.015em;
}

.gv-detail-excerpt {
    font-size: clamp(1rem, 1.3vw, 1.125rem);
    color: #716F6E;
    line-height: 1.65;
    max-width: 780px;
    margin: 0 auto 1.75rem;
}

.gv-detail-meta {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1.75rem;
    flex-wrap: wrap;
}

.gv-detail-meta-item {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.875rem;
    font-weight: 600;
    color: #363E19;
}

.gv-detail-meta-item svg {
    stroke: #363E19;
    flex-shrink: 0;
}

/* ③ Featured Image */
.gv-detail-featured-section {
    background-color: #E1E2DD;
    padding: 0 0 1rem;
}

.gv-detail-featured-wrap {
    width: 100%;
    overflow: hidden;
    border-radius: 0;
    max-height: 620px;
}

.gv-detail-featured-img {
    width: 100%;
    height: auto;
    max-height: 620px;
    object-fit: cover;
    display: block;
    border-radius: 0;
}

/* ④ Article Content */
.gv-detail-content-section {
    background-color: #E1E2DD;
    padding: 2.5rem 0 4.5rem;
}

.gv-detail-article-wrap {
    width: 100%;
    margin: 0 auto;
}

.gv-detail-article {
    font-size: 1.0625rem;
    line-height: 1.8;
    color: #716F6E;
}

/* Centered Article Heading */
.gv-detail-article h2,
.gv-detail-article .wp-block-heading:not(h3) {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(1.85rem, 3.2vw, 2.5rem);
    font-weight: 800;
    color: #363E19;
    text-align: center;
    margin: 2rem 0 2.25rem;
    line-height: 1.25;
    letter-spacing: -0.01em;
}

.gv-detail-article p {
    font-size: 1.0625rem;
    color: #716F6E;
    line-height: 1.8;
    margin-bottom: 1.5rem;
}

/* Blockquote */
.gv-detail-article blockquote,
.gv-detail-article .wp-block-quote {
    background-color: #C1C3B8;
    border-left: 8px solid #363E19;
    border-radius: 0;
    padding: 2.25rem 2.5rem;
    margin: 3.25rem 0;
    font-style: italic;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(1.125rem, 1.8vw, 1.35rem);
    line-height: 1.65;
    color: #363E19;
    box-sizing: border-box;
}

.gv-detail-article blockquote p,
.gv-detail-article .wp-block-quote p {
    margin: 0;
    color: #363E19;
    font-style: italic;
    line-height: inherit;
    font-size: inherit;
}

/* Key Takeaways Box */
.gv-takeaways-box {
    background-color: #EBECE8;
    border: none;
    border-radius: 0;
    padding: 2.25rem 2.5rem;
    margin: 3.25rem 0;
    box-sizing: border-box;
}

.gv-takeaways-box h3,
.gv-detail-article h3 {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 1.5rem;
    font-weight: 700;
    color: #363E19;
    margin: 0 0 1.25rem 0;
    line-height: 1.3;
}

.gv-takeaways-box ul,
.gv-detail-article .wp-block-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.875rem;
}

.gv-takeaways-box ul li,
.gv-detail-article .wp-block-list li {
    list-style: none;
    position: relative;
    padding-left: 2rem;
    font-size: 1.0625rem;
    color: #716F6E;
    line-height: 1.6;
    margin: 0;
}

/* Circular checkmark icon */
.gv-takeaways-box ul li::before,
.gv-detail-article .wp-block-list li::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0.22em;
    width: 1.2rem;
    height: 1.2rem;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23363E19' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='12' cy='12' r='10'/%3E%3Cpath d='M8 12l2.5 2.5L16 9'/%3E%3C/svg%3E");
    background-size: contain;
    background-repeat: no-repeat;
}

/* ⑤ Explore More Insights */
.gv-detail-more-section {
    background-color: #E1E2DD;
    padding: 3rem 0 5rem;
    border-top: 1px solid rgba(54, 62, 25, 0.12);
}

.gv-detail-more-heading {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(2rem, 3.5vw, 2.75rem);
    font-weight: 800;
    color: #363E19;
    margin: 0 0 3.5rem 0;
    letter-spacing: -0.01em;
}

.gv-detail-more-list {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    margin-bottom: 3.5rem;
}

.gv-detail-more-item {
    position: relative;
    padding-bottom: 0.5rem;
}

.gv-detail-more-badge {
    display: block;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(3.5rem, 7vw, 6rem);
    font-weight: 800;
    color: rgba(54, 62, 25, 0.14);
    line-height: 1;
    margin-bottom: -1.25rem;
    letter-spacing: -0.02em;
    user-select: none;
    pointer-events: none;
}

.gv-detail-more-row {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
    align-items: center;
}

@media (min-width: 768px) {
    .gv-detail-more-row {
        grid-template-columns: 5fr 6fr;
        gap: 3rem;
    }
}

.gv-detail-more-img-wrap {
    overflow: hidden;
    aspect-ratio: 16 / 10;
    border-radius: 0;
    background: #DDE2D9;
}

.gv-detail-more-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    border-radius: 0;
    transition: transform 0.4s ease;
}

.gv-detail-more-img-wrap:hover .gv-detail-more-img {
    transform: scale(1.03);
}

.gv-detail-more-content {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.gv-detail-more-cat {
    display: flex;
    align-items: center;
    gap: 0.625rem;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.875rem;
    font-weight: 600;
    color: #363E19;
}

.gv-detail-more-cat-line {
    display: inline-block;
    width: 1.75rem;
    height: 1.5px;
    background-color: #363E19;
    flex-shrink: 0;
}

.gv-detail-more-title {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(1.35rem, 2.4vw, 1.875rem);
    font-weight: 800;
    color: #363E19;
    line-height: 1.25;
    margin: 0;
}

.gv-detail-more-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.2s ease;
}

.gv-detail-more-title a:hover {
    color: #2A3010;
}

.gv-detail-more-desc {
    font-size: 0.9375rem;
    color: #716F6E;
    line-height: 1.65;
    margin: 0;
}

.gv-detail-more-link {
    display: inline-flex;
    align-items: center;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.875rem;
    font-weight: 600;
    color: #363E19;
    text-decoration: underline;
    text-underline-offset: 4px;
    transition: color 0.2s ease;
    margin-top: 0.25rem;
}

.gv-detail-more-link:hover {
    color: #0A0804;
}

/* View All Blogs Button */
.gv-detail-more-footer {
    display: flex;
    justify-content: center;
    margin-top: 2rem;
}

.gv-detail-view-all-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #363E19;
    color: #FFFFFF !important;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.9375rem;
    font-weight: 600;
    padding: 0.85rem 2.25rem;
    border-radius: 4px;
    text-decoration: none;
    box-shadow: 0 4px 12px rgba(54, 62, 25, 0.18);
    transition: background-color 0.2s ease, transform 0.15s ease;
}

.gv-detail-view-all-btn:hover {
    background-color: #242A11;
    transform: translateY(-2px);
    color: #FFFFFF !important;
}

/* ==========================================================================
   Responsive Breakpoints (Tablet & Mobile)
   ========================================================================== */
@media (max-width: 1024px) {
    .gv-detail-header-section {
        padding: 2.75rem 0 2rem;
    }
    .gv-detail-featured-wrap {
        max-height: 480px;
    }
    .gv-detail-featured-img {
        max-height: 480px;
    }
    .gv-detail-article blockquote,
    .gv-detail-article .wp-block-quote {
        padding: 1.85rem 2rem;
        margin: 2.5rem 0;
    }
    .gv-takeaways-box {
        padding: 1.85rem 2rem;
        margin: 2.5rem 0;
    }
}

@media (max-width: 767px) {
    .gv-detail-bc-wrapper {
        padding-top: 1.25rem;
    }
    .gv-detail-breadcrumb {
        font-size: 0.75rem;
        gap: 0.4rem;
    }
    .gv-detail-header-section {
        padding: 2rem 0 1.5rem;
    }
    .gv-detail-cat {
        font-size: 0.8125rem;
        margin-bottom: 0.75rem;
    }
    .gv-detail-title {
        font-size: 1.75rem;
        margin-bottom: 1rem;
    }
    .gv-detail-excerpt {
        font-size: 0.9375rem;
        margin-bottom: 1.25rem;
    }
    .gv-detail-meta {
        gap: 1rem;
        font-size: 0.75rem;
    }
    .gv-detail-featured-wrap {
        max-height: 280px;
    }
    .gv-detail-featured-img {
        max-height: 280px;
    }
    .gv-detail-article h2,
    .gv-detail-article .wp-block-heading:not(h3) {
        font-size: 1.5rem;
        margin: 1.75rem 0 1.25rem;
    }
    .gv-detail-article p {
        font-size: 0.9375rem;
        line-height: 1.7;
    }
    .gv-detail-article blockquote,
    .gv-detail-article .wp-block-quote {
        padding: 1.25rem 1.25rem;
        margin: 2rem 0;
        font-size: 1.0625rem;
        border-left-width: 6px;
    }
    .gv-takeaways-box {
        padding: 1.5rem 1.25rem;
        margin: 2rem 0;
    }
    .gv-takeaways-box h3,
    .gv-detail-article h3 {
        font-size: 1.25rem;
    }
    .gv-takeaways-box ul li,
    .gv-detail-article .wp-block-list li {
        font-size: 0.875rem;
        padding-left: 1.75rem;
    }
    .gv-detail-more-section {
        padding: 2.5rem 0 4rem;
    }
    .gv-detail-more-heading {
        font-size: 1.75rem;
        margin-bottom: 2rem;
    }
    .gv-detail-more-row {
        grid-template-columns: 1fr;
        gap: 1.25rem;
    }
    .gv-detail-more-badge {
        font-size: 3rem;
        margin-bottom: -0.75rem;
    }
}
</style>

<?php
get_footer();
