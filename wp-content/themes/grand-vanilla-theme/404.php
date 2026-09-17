<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
?>

<div class="gv-404-wrapper" style="background-color: #FAF8F5; min-height: 70vh; display: flex; align-items: center; justify-content: center; padding: 5rem 1.5rem;">
    <div class="gv-404-card" style="max-width: 680px; width: 100%; text-align: center; background: #FFFFFF; border: 1px solid #E1E2DD; border-radius: 8px; padding: 3.5rem 2.5rem; box-shadow: 0 10px 30px rgba(54,62,25,0.04);">
        
        <!-- Eyebrow Badge -->
        <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(54,62,25,0.06); color: #363E19; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.8125rem; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; padding: 6px 16px; border-radius: 20px; margin-bottom: 1.5rem;">
            <span style="display: inline-block; width: 6px; height: 6px; background: #363E19; border-radius: 50%;"></span>
            Error 404 &bull; Page Not Found
        </div>

        <!-- 404 Big Heading -->
        <h1 style="font-family: var(--font-heading, 'Jost', sans-serif); font-size: clamp(2.25rem, 5vw, 3.25rem); font-weight: 600; color: #363E19; line-height: 1.15; margin: 0 0 1rem 0;">
            We Couldn't Find<br>That Page
        </h1>

        <!-- Body description -->
        <p style="font-size: 1rem; line-height: 1.6; color: #5C6246; max-width: 520px; margin: 0 auto 2.25rem auto;">
            The URL you entered might have changed, was removed, or is temporarily unavailable. Let us help you navigate back to our export operations and catalog.
        </p>

        <!-- CTA Buttons -->
        <div style="display: flex; align-items: center; justify-content: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 2.5rem;">
            <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" 
               style="background-color: #363E19; color: #FFFFFF; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 500; padding: 0.8rem 1.8rem; border-radius: 4px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: opacity 0.2s ease;">
                Explore Vanilla Products &rarr;
            </a>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
               style="background-color: transparent; border: 1px solid #363E19; color: #363E19; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 500; padding: 0.8rem 1.8rem; border-radius: 4px; text-decoration: none; transition: all 0.2s ease;">
                Return to Home
            </a>
        </div>

        <!-- Quick Directory Navigation -->
        <div style="border-top: 1px solid #E1E2DD; padding-top: 1.75rem;">
            <span style="display: block; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: #8C9286; margin-bottom: 0.75rem;">Quick Links:</span>
            <div style="display: flex; justify-content: center; gap: 1.25rem; flex-wrap: wrap; font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.875rem;">
                <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" style="color: #363E19; text-decoration: none; font-weight: 500;">About Us</a>
                <span style="color: #CCD2C7;">&bull;</span>
                <a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" style="color: #363E19; text-decoration: none; font-weight: 500;">Curing Gallery</a>
                <span style="color: #CCD2C7;">&bull;</span>
                <a href="<?php echo esc_url( home_url( '/articles/' ) ); ?>" style="color: #363E19; text-decoration: none; font-weight: 500;">Articles & Insights</a>
                <span style="color: #CCD2C7;">&bull;</span>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="color: #363E19; text-decoration: none; font-weight: 500;">Contact Us</a>
            </div>
        </div>

    </div>
</div>

<?php
get_footer();
