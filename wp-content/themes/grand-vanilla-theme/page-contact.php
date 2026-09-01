<?php
/**
 * Template Name: Contact Page
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
?>

<!-- 1. Hero Section -->
<section class="gv-hero-page" style="background-image: url('<?php echo esc_url( $img_dir . 'Contact Us  Hero Section.png' ); ?>');">
    <div class="gv-container">
        <h1 class="gv-hero-tag">#getInTouch</h1>
        <p class="gv-hero-subtag">Discuss your vanilla requirements with us.</p>
    </div>
</section>

<!-- 2. Contact Split Section -->
<section class="gv-section">
    <div class="gv-container">
        
        <div style="display: grid; grid-template-columns: 1fr; gap: 3.5rem;" class="gv-contact-grid">
            
            <div style="display: grid; grid-template-columns: 1fr; gap: 3.5rem;" class="gv-contact-split">
                
                <!-- Left: Info -->
                <div>
                    <span class="gv-section-tag">Contact Us</span>
                    <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 1.25rem; line-height: 1.2;">
                        We Are Always Ready To<br>Help You And Your<br>Questions
                    </h2>
                    <p style="color: var(--color-nw-500); font-size: 0.9375rem; line-height: 1.7; margin-bottom: 2.5rem; max-width: 32rem;">
                        Have a question or need more information about our products and services? Get in touch with our team and we'll be happy to assist with your inquiry.
                    </p>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                        <div>
                            <strong style="font-size: 0.8125rem; color: var(--color-nw-500); display: block; text-transform: uppercase; font-family: var(--font-heading); margin-bottom: 0.35rem;">Phone Number</strong>
                            <div style="font-size: 0.9375rem; font-weight: 700; color: var(--color-pitch-black);">+62 812-2697-4731</div>
                            <div style="font-size: 0.8125rem; color: var(--color-nw-500);">+123 456 789 12</div>
                        </div>

                        <div>
                            <strong style="font-size: 0.8125rem; color: var(--color-nw-500); display: block; text-transform: uppercase; font-family: var(--font-heading); margin-bottom: 0.35rem;">Our Location</strong>
                            <div style="font-size: 0.875rem; color: var(--color-pitch-black); line-height: 1.4;">
                                Sumbersari 2 Street, Jember<br>East Java, Indonesia
                            </div>
                        </div>

                        <div>
                            <strong style="font-size: 0.8125rem; color: var(--color-nw-500); display: block; text-transform: uppercase; font-family: var(--font-heading); margin-bottom: 0.35rem;">Email</strong>
                            <div style="font-size: 0.9375rem; font-weight: 700; color: var(--color-dark-khaki);">
                                <a href="mailto:grandvanilla@gmail.com">grandvanilla@gmail.com</a>
                            </div>
                        </div>

                        <div>
                            <strong style="font-size: 0.8125rem; color: var(--color-nw-500); display: block; text-transform: uppercase; font-family: var(--font-heading); margin-bottom: 0.35rem;">Social Network</strong>
                            <div style="display: flex; gap: 0.75rem; font-size: 1.125rem; margin-top: 0.25rem;">
                                <a href="https://wa.me/6281226974731" target="_blank" rel="noopener noreferrer" style="color: var(--color-dark-khaki);">💬</a>
                                <a href="mailto:grandvanilla@gmail.com" style="color: var(--color-dark-khaki);">📧</a>
                                <a href="#" style="color: var(--color-dark-khaki);">🌐</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Get in Touch Form Card -->
                <div class="gv-card" style="padding: 2.5rem; background: var(--color-white);">
                    <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1.5rem;">Get in Touch</h3>

                    <form action="https://wa.me/6281226974731" method="GET" target="_blank" style="display: flex; flex-direction: column; gap: 1.25rem;">
                        <div>
                            <label style="display: block; font-size: 0.8125rem; font-weight: 600; color: var(--color-nw-500); margin-bottom: 0.35rem;">Full Name</label>
                            <input type="text" name="name" required placeholder="John Doe / Global Importers Ltd." style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-nb-200); border-radius: var(--radius-8); font-size: 0.875rem; background: var(--color-parchment);">
                        </div>

                        <div>
                            <label style="display: block; font-size: 0.8125rem; font-weight: 600; color: var(--color-nw-500); margin-bottom: 0.35rem;">Contact Email</label>
                            <input type="email" name="email" required placeholder="john@company.com" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-nb-200); border-radius: var(--radius-8); font-size: 0.875rem; background: var(--color-parchment);">
                        </div>

                        <div>
                            <label style="display: block; font-size: 0.8125rem; font-weight: 600; color: var(--color-nw-500); margin-bottom: 0.35rem;">Subject</label>
                            <select name="subject" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-nb-200); border-radius: var(--radius-8); font-size: 0.875rem; background: var(--color-parchment);">
                                <option value="Wholesale Vanilla Beans Inquiry">Wholesale Vanilla Beans Inquiry</option>
                                <option value="Vanilla Powder / Extract Quote">Vanilla Powder / Extract Quote</option>
                                <option value="Custom OEM Packaging Request">Custom OEM Packaging Request</option>
                                <option value="Physical Sample Request">Physical Sample Request</option>
                            </select>
                        </div>

                        <div>
                            <label style="display: block; font-size: 0.8125rem; font-weight: 600; color: var(--color-nw-500); margin-bottom: 0.35rem;">Message</label>
                            <textarea name="text" rows="4" placeholder="Tell us your target volume, destination port (FOB/CIF), and specifications..." style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-nb-200); border-radius: var(--radius-8); font-size: 0.875rem; font-family: inherit; background: var(--color-parchment);"></textarea>
                        </div>

                        <button type="submit" class="gv-btn gv-btn-primary" style="width: 100%; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.05em;">
                            SEND MESSAGE
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>
</section>

<style>
@media (min-width: 900px) {
    .gv-contact-split { grid-template-columns: 1fr 1fr !important; }
}
</style>

<!-- 3. CTA Banner -->
<section class="gv-cta-banner">
    <div class="gv-container">
        <h2>Looking For A Reliable<br>Indonesian Vanilla Supplier?</h2>
        <div style="display: flex; justify-content: center; gap: 1rem;">
            <a href="https://wa.me/6281226974731" target="_blank" rel="noopener noreferrer" class="gv-btn gv-btn-primary">
                Request a Quote
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
