<?php
/**
 * The template for displaying all generic and legal pages (Privacy Policy, Terms of Supply, etc.)
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();
$slug    = get_post_field( 'post_name', get_post() );

// Dynamic Hero Banner Data based on Page Slug
if ( 'privacy-policy' === $slug ) {
    $hero_tag    = '#privacyPolicy';
    $hero_subtag = 'Data Protection & Commercial Privacy Standards';
} elseif ( 'terms' === $slug || 'terms-of-supply' === $slug ) {
    $hero_tag    = '#termsOfSupply';
    $hero_subtag = 'Commercial Export Conditions & Vanilla Bean Specifications';
} else {
    $hero_tag    = '#' . sanitize_title( get_the_title() );
    $hero_subtag = get_the_title();
}

$hero_custom_bg = get_theme_mod( 'gv_hero_about', '' );
if ( has_post_thumbnail() ) {
    $hero_bg_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
} elseif ( ! empty( $hero_custom_bg ) ) {
    $hero_bg_url = $hero_custom_bg;
} else {
    $hero_bg_url = gv_asset_img( 'About Us Hero Section.png' );
}
?>

<style>
/* ==========================================================================
   Grand Vanilla ID — Clean Legal & Policy Page Styles
   ========================================================================== */
.gv-legal-page-section {
    background-color: #FAF8F5;
    padding: 4.5rem 0 6rem;
    min-height: 65vh;
}

.gv-legal-paper-card {
    max-width: 920px;
    margin: 0 auto;
    background: #FFFFFF;
    border: 1px solid rgba(54, 62, 25, 0.08);
    border-radius: 10px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.03);
    padding: clamp(2rem, 5vw, 4rem);
    box-sizing: border-box;
}

.gv-legal-paper-header {
    border-bottom: 1px solid #E8ECE5;
    padding-bottom: 1.75rem;
    margin-bottom: 2.5rem;
}

.gv-legal-paper-date {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.8125rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #6E7564;
    margin-bottom: 0.5rem;
}

.gv-legal-paper-title {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(1.85rem, 3.2vw, 2.35rem);
    font-weight: 500;
    color: #363E19;
    line-height: 1.25;
    letter-spacing: -0.015em;
    margin: 0;
}

/* Document Body Prose */
.gv-legal-body-prose {
    color: #3B4230;
    font-family: var(--font-body, 'Lato', sans-serif);
    font-size: 1rem;
    line-height: 1.85;
}

.gv-legal-body-prose h2 {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: clamp(1.25rem, 2vw, 1.45rem);
    font-weight: 600;
    color: #1A1D16;
    margin: 2.75rem 0 1rem 0;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid #E8ECE5;
    letter-spacing: -0.01em;
}

.gv-legal-body-prose h2:first-of-type {
    margin-top: 0;
}

.gv-legal-body-prose h3 {
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 1.15rem;
    font-weight: 600;
    color: #363E19;
    margin: 1.75rem 0 0.75rem 0;
}

.gv-legal-body-prose p {
    margin: 0 0 1.35rem 0;
    color: #4A5239;
    line-height: 1.85;
}

.gv-legal-body-prose strong {
    color: #1A1D16;
    font-weight: 600;
}

.gv-legal-body-prose em {
    color: #636A57;
}

.gv-legal-body-prose a {
    color: #363E19;
    text-decoration: underline;
    text-underline-offset: 3px;
    font-weight: 500;
    transition: color 0.2s ease;
}

.gv-legal-body-prose a:hover {
    color: #5E6C2D;
}

.gv-legal-body-prose ul,
.gv-legal-body-prose ol {
    margin: 0 0 1.75rem 0;
    padding-left: 1.5rem;
}

.gv-legal-body-prose li {
    margin-bottom: 0.75rem;
    color: #4A5239;
    line-height: 1.75;
}

.gv-legal-body-prose li strong {
    color: #1A1D16;
}

/* Clean Editorial Table */
.gv-legal-table-wrap {
    overflow-x: auto;
    margin: 2rem 0 2.25rem;
    border: 1px solid #E1E5DE;
    border-radius: 6px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
}

.gv-legal-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.875rem;
    text-align: left;
    background: #FFFFFF;
    margin: 0;
}

.gv-legal-table th {
    background-color: #F4F6F2;
    color: #363E19;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-weight: 600;
    font-size: 0.8125rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 0.9rem 1rem;
    border-bottom: 1px solid #D5DBD1;
    white-space: nowrap;
}

.gv-legal-table td {
    padding: 0.95rem 1rem;
    border-bottom: 1px solid #EEF1EB;
    color: #3B4230;
    line-height: 1.55;
    vertical-align: top;
}

.gv-legal-table tr:last-child td {
    border-bottom: none;
}

.gv-legal-table tr:nth-child(even) td {
    background-color: #FAFBF9;
}

.gv-legal-table tr:hover td {
    background-color: #F3ECE6;
}

.gv-legal-table strong {
    color: #1A1D16;
}

/* Paper Footer / Sign-off */
.gv-legal-paper-footer {
    border-top: 1px solid #E8ECE5;
    padding-top: 2rem;
    margin-top: 3.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1.5rem;
}

.gv-legal-footer-contact {
    font-size: 0.875rem;
    color: #555B49;
    line-height: 1.6;
    max-width: 600px;
}

.gv-legal-footer-contact strong {
    color: #1A1D16;
}

.gv-legal-footer-contact a {
    color: #363E19;
    font-weight: 600;
    text-decoration: underline;
}

.gv-legal-print-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: transparent;
    border: 1px solid #363E19;
    color: #363E19;
    font-family: var(--font-heading, 'Jost', sans-serif);
    font-size: 0.8125rem;
    font-weight: 500;
    padding: 0.6rem 1.15rem;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.gv-legal-print-btn:hover {
    background: #363E19;
    color: #FFFFFF;
}

/* Responsive */
@media (max-width: 767px) {
    .gv-legal-page-section {
        padding: 3rem 0 4.5rem;
    }
    .gv-legal-paper-card {
        padding: 1.75rem 1.25rem;
    }
    .gv-legal-paper-footer {
        flex-direction: column;
        align-items: flex-start;
    }
    .gv-legal-print-btn {
        width: 100%;
        justify-content: center;
    }
}

/* Print Styles */
@media print {
    .gv-header, .gv-footer, .gv-hero-page, .gv-cta-banner, .gv-legal-print-btn {
        display: none !important;
    }
    .gv-legal-page-section {
        background: #FFFFFF !important;
        padding: 0 !important;
    }
    .gv-legal-paper-card {
        border: none !important;
        box-shadow: none !important;
        padding: 0 !important;
        max-width: 100% !important;
    }
}
</style>

<!-- 1. Unified Hero Banner Section -->
<section class="gv-hero-page" style="background-image: url('<?php echo esc_url( $hero_bg_url ); ?>');">
    <div class="gv-container">
        <h1 class="gv-hero-tag"><?php echo esc_html( $hero_tag ); ?></h1>
        <p class="gv-hero-subtag"><?php echo esc_html( $hero_subtag ); ?></p>
    </div>
</section>

<!-- 2. Main Content Card Section -->
<main class="gv-legal-page-section" id="main-content">
    <div class="gv-container">
        <article class="gv-legal-paper-card">
            
            <header class="gv-legal-paper-header">
                <div class="gv-legal-paper-date">Last Updated: September 2026 &middot; Grand Vanilla Indonesia</div>
                <h2 class="gv-legal-paper-title"><?php the_title(); ?></h2>
            </header>

            <div class="gv-legal-body-prose">
                <?php
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
                ?>
            </div>

            <footer class="gv-legal-paper-footer">
                <div class="gv-legal-footer-contact">
                    For commercial inquiries regarding export contracts, sample evaluations, or volume orders, contact our export desk at 
                    <a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>"><?php echo esc_html( $contact['email'] ); ?></a> 
                    or via <a href="<?php echo esc_url( $contact['whatsapp_url'] ); ?>" target="_blank" rel="noopener noreferrer">WhatsApp (+62 877-1775-2085)</a>.
                </div>
                <button type="button" onclick="window.print();" class="gv-legal-print-btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg>
                    Print / Save PDF
                </button>
            </footer>

        </article>
    </div>
</main>

<!-- 3. Global CTA Banner Component -->
<?php get_template_part( 'template-parts/cta-banner' ); ?>

<?php
get_footer();
