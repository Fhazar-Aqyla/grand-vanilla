<?php
/**
 * Template Name: About Us Page
 *
 * @package GrandVanilla
 */

get_header();

$contact = grand_vanilla_get_contact_info();
?>

<div class="gv-section-sm" style="background: linear-gradient(180deg, #f7efe4 0%, var(--color-cream) 100%); border-bottom: 1px solid var(--color-stone-200); text-align: center;">
    <div class="gv-container">
        <span class="gv-badge gv-badge-primary" style="margin-bottom: 0.75rem;">Agroforestry & Direct Farm-Gate</span>
        <h1 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.75rem;">About Grand Vanilla ID</h1>
        <p style="color: var(--color-stone-600); max-width: 40rem; margin: 0 auto; font-size: 0.9375rem;">
            Connecting international culinary industries with pure Indonesian vanilla cultivated through sustainable agroforestry and traditional sun-curing heritage.
        </p>
    </div>
</div>

<div class="gv-section">
    <div class="gv-container">
        
        <div style="display: grid; grid-template-columns: repeat(1, minmax(0, 1fr)); gap: 3rem; margin-bottom: 4rem;">
            <div class="gv-card">
                <span class="gv-badge gv-badge-accent" style="margin-bottom: 1rem;">Our Mission</span>
                <h2 style="font-size: 1.75rem; font-weight: 800; margin-bottom: 1rem;">
                    Empowering Indonesian Farmers, Supplying World-Class Vanilla
                </h2>
                <p style="color: var(--color-stone-600); line-height: 1.8; margin-bottom: 1.5rem;">
                    Grand Vanilla ID was founded with a clear objective: to eliminate unnecessary middlemen and connect global buyers directly to Indonesian vanilla growers. Indonesia is naturally endowed with rich volcanic soil, high annual rainfall, and tropical mountain microclimates—the ideal terroir for producing exceptionally high-vanillin beans.
                </p>
                <p style="color: var(--color-stone-600); line-height: 1.8;">
                    Through direct farm-gate partnerships across Bali, East Java, and Papua, we ensure fair compensation for farming cooperatives while guaranteeing strict quality grading, traceable origin, and reliable export volume for overseas distributors and food manufacturers.
                </p>
            </div>
        </div>

        <div class="gv-grid-3" style="margin-bottom: 4rem;">
            <div class="gv-feature-card">
                <div class="gv-feature-icon">🌿</div>
                <h3 class="gv-feature-title">Agroforestry Cultivation</h3>
                <p class="gv-feature-desc">
                    Our vanilla vines climb living host trees (Gamal / Dadap) under a diverse tropical canopy, promoting soil biodiversity without chemical fertilizers.
                </p>
            </div>

            <div class="gv-feature-card">
                <div class="gv-feature-icon">☀️</div>
                <h3 class="gv-feature-title">Heritage Sun Curing</h3>
                <p class="gv-feature-desc">
                    Harvested only when pods develop yellow tips. Cured over 90–120 days via patient sunbathing and nightly blanket sweating in wooden crates.
                </p>
            </div>

            <div class="gv-feature-card">
                <div class="gv-feature-icon">✈️</div>
                <h3 class="gv-feature-title">Global Logistics</h3>
                <p class="gv-feature-desc">
                    Operating through strategic export hubs in Jakarta (CGK) and Bali (DPS) with complete export documentation and phytosanitary clearance.
                </p>
            </div>
        </div>

        <div class="gv-card" style="text-align: center; background: linear-gradient(135deg, #fdfbf7 0%, #f7efe4 100%);">
            <h2 style="font-size: 1.75rem; font-weight: 800; margin-bottom: 1rem;">Partner With Grand Vanilla ID</h2>
            <p style="color: var(--color-stone-600); max-width: 34rem; margin: 0 auto 2rem; font-size: 0.9375rem;">
                Looking for a consistent, ethically-sourced Indonesian vanilla supplier for your wholesale distribution or manufacturing line?
            </p>
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="gv-btn gv-btn-primary">
                    Get in Touch With Our Export Team &rarr;
                </a>
                <a href="<?php echo esc_url( $contact['whatsapp_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="gv-btn gv-btn-outline">
                    Chat on WhatsApp
                </a>
            </div>
        </div>

    </div>
</div>

<?php
get_footer();
