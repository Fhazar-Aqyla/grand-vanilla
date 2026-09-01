<?php
/**
 * The template for displaying single vanilla product specifications
 *
 * @package GrandVanilla
 */

get_header();

$contact = grand_vanilla_get_contact_info();
$vanillin = get_post_meta( get_the_ID(), '_gv_vanillin', true ) ?: '1.8% - 2.4%';
$moisture = get_post_meta( get_the_ID(), '_gv_moisture', true ) ?: '28% - 33%';
$length   = get_post_meta( get_the_ID(), '_gv_length', true ) ?: '16 - 20 cm';
$origin   = get_post_meta( get_the_ID(), '_gv_origin', true ) ?: 'Bali, East Java, Papua (Indonesia)';
$grade    = get_post_meta( get_the_ID(), '_gv_grade', true ) ?: 'Gourmet Grade A';
?>

<div class="gv-section-sm" style="background: linear-gradient(180deg, #f7efe4 0%, var(--color-cream) 100%); border-bottom: 1px solid var(--color-stone-200);">
    <div class="gv-container">
        <span class="gv-badge gv-badge-primary" style="margin-bottom: 0.5rem;"><?php echo esc_html( $grade ); ?></span>
        <h1 style="font-size: 2.25rem; font-weight: 800;"><?php the_title(); ?></h1>
    </div>
</div>

<div class="gv-section">
    <div class="gv-container">
        <div style="display: grid; grid-template-columns: repeat(1, minmax(0, 1fr)); gap: 3rem;">
            
            <div style="display: grid; grid-template-columns: 1fr; gap: 2.5rem;" class="gv-product-single-grid">
                
                <div class="gv-card">
                    <h2 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1.25rem;">Technical & Laboratory Specifications</h2>
                    
                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 2rem; font-size: 0.875rem;">
                        <tbody>
                            <tr style="border-bottom: 1px solid var(--color-stone-200);">
                                <td style="padding: 0.75rem 0; font-weight: 700; color: var(--color-stone-600); width: 40%;">Botanical Variety</td>
                                <td style="padding: 0.75rem 0; color: var(--color-stone-800); font-weight: 600;"><?php the_title(); ?></td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--color-stone-200);">
                                <td style="padding: 0.75rem 0; font-weight: 700; color: var(--color-stone-600);">Classification / Grade</td>
                                <td style="padding: 0.75rem 0; color: var(--color-stone-800);"><?php echo esc_html( $grade ); ?></td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--color-stone-200);">
                                <td style="padding: 0.75rem 0; font-weight: 700; color: var(--color-stone-600);">Vanillin Concentration</td>
                                <td style="padding: 0.75rem 0; color: var(--color-stone-800); font-weight: 700; color: var(--color-primary);"><?php echo esc_html( $vanillin ); ?></td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--color-stone-200);">
                                <td style="padding: 0.75rem 0; font-weight: 700; color: var(--color-stone-600);">Moisture Content</td>
                                <td style="padding: 0.75rem 0; color: var(--color-stone-800);"><?php echo esc_html( $moisture ); ?></td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--color-stone-200);">
                                <td style="padding: 0.75rem 0; font-weight: 700; color: var(--color-stone-600);">Average Length</td>
                                <td style="padding: 0.75rem 0; color: var(--color-stone-800);"><?php echo esc_html( $length ); ?></td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--color-stone-200);">
                                <td style="padding: 0.75rem 0; font-weight: 700; color: var(--color-stone-600);">Origin / Harvesting Region</td>
                                <td style="padding: 0.75rem 0; color: var(--color-stone-800);"><?php echo esc_html( $origin ); ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 0.75rem 0; font-weight: 700; color: var(--color-stone-600);">Packaging Standard</td>
                                <td style="padding: 0.75rem 0; color: var(--color-stone-800);">Aroma-sealed wax paper bundles & 1kg - 5kg vacuum packs</td>
                            </tr>
                        </tbody>
                    </table>

                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 1rem;">Product Description & Profile</h3>
                    <div class="gv-content" style="margin-bottom: 2rem;">
                        <?php
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                        ?>
                    </div>

                    <div style="display: flex; gap: 1rem; flex-wrap: wrap; padding-top: 1.5rem; border-top: 1px solid var(--color-stone-200);">
                        <a href="<?php echo esc_url( home_url( '/contact/?product=' . urlencode( get_the_title() ) ) ); ?>" class="gv-btn gv-btn-primary">
                            Request FOB/CIF Quote for This Product &rarr;
                        </a>
                        <a href="<?php echo esc_url( $contact['whatsapp_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="gv-btn gv-btn-outline">
                            💬 WhatsApp Inquiry
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<?php
get_footer();
