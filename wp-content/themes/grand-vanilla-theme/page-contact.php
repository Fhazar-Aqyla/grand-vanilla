<?php
/**
 * Template Name: Contact Page
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();
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
                            <div style="font-size: 0.9375rem; font-weight: 700; color: var(--color-pitch-black);"><?php echo esc_html( $contact['whatsapp'] ); ?></div>
                            <div style="font-size: 0.8125rem; color: var(--color-nw-500);">+123 456 789 12</div>
                        </div>

                        <div>
                            <strong style="font-size: 0.8125rem; color: var(--color-nw-500); display: block; text-transform: uppercase; font-family: var(--font-heading); margin-bottom: 0.35rem;">Our Location</strong>
                            <div style="font-size: 0.875rem; color: var(--color-pitch-black); line-height: 1.4;">
                                <?php echo nl2br( esc_html( $contact['address'] ) ); ?>
                            </div>
                        </div>

                        <div>
                            <strong style="font-size: 0.8125rem; color: var(--color-nw-500); display: block; text-transform: uppercase; font-family: var(--font-heading); margin-bottom: 0.35rem;">Email</strong>
                            <div style="font-size: 0.9375rem; font-weight: 700; color: var(--color-dark-khaki);">
                                <a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>"><?php echo esc_html( $contact['email'] ); ?></a>
                            </div>
                        </div>

                        <div>
                            <strong style="font-size: 0.8125rem; color: var(--color-nw-500); display: block; text-transform: uppercase; font-family: var(--font-heading); margin-bottom: 0.35rem;">Social Network</strong>
                            <div style="display: flex; gap: 0.75rem; font-size: 1.125rem; margin-top: 0.25rem;">
                                <a href="<?php echo esc_url( $contact['whatsapp_url'] ); ?>" target="_blank" rel="noopener noreferrer" style="color: var(--color-dark-khaki);">💬</a>
                                <a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>" style="color: var(--color-dark-khaki);">📧</a>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: var(--color-dark-khaki);">📍</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Get in Touch Form Card -->
                <div class="gv-card" style="padding: 2.5rem; background: var(--color-white); position: relative;">
                    <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1.5rem;">Get in Touch</h3>

                    <!-- Status Notification Banner -->
                    <div id="gv-form-alert" style="display: none; padding: 1rem; border-radius: var(--radius-8); background: #d1e7dd; color: #0f5132; margin-bottom: 1.25rem; font-size: 0.875rem;">
                        <strong>✓ Inquiry Sent Successfully!</strong> Redirecting to our WhatsApp Export Desk...
                    </div>

                    <form id="gv-contact-form" style="display: flex; flex-direction: column; gap: 1.25rem;">
                        <div>
                            <label for="gv_fullname" style="display: block; font-size: 0.8125rem; font-weight: 600; color: var(--color-nw-500); margin-bottom: 0.35rem;">Full Name</label>
                            <input type="text" id="gv_fullname" name="fullname" required placeholder="John Doe / Global Importers Ltd." style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-nb-200); border-radius: var(--radius-8); font-size: 0.875rem; background: var(--color-parchment);">
                        </div>

                        <div>
                            <label for="gv_email" style="display: block; font-size: 0.8125rem; font-weight: 600; color: var(--color-nw-500); margin-bottom: 0.35rem;">Contact Email</label>
                            <input type="email" id="gv_email" name="email" required placeholder="john@company.com" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-nb-200); border-radius: var(--radius-8); font-size: 0.875rem; background: var(--color-parchment);">
                        </div>

                        <div>
                            <label for="gv_subject" style="display: block; font-size: 0.8125rem; font-weight: 600; color: var(--color-nw-500); margin-bottom: 0.35rem;">Subject</label>
                            <select id="gv_subject" name="subject" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-nb-200); border-radius: var(--radius-8); font-size: 0.875rem; background: var(--color-parchment);">
                                <option value="Wholesale Vanilla Beans Inquiry">Wholesale Vanilla Beans Inquiry</option>
                                <option value="Vanilla Powder / Extract Quote">Vanilla Powder / Extract Quote</option>
                                <option value="Custom OEM Packaging Request">Custom OEM Packaging Request</option>
                                <option value="Physical Sample Request">Physical Sample Request</option>
                            </select>
                        </div>

                        <div>
                            <label for="gv_message" style="display: block; font-size: 0.8125rem; font-weight: 600; color: var(--color-nw-500); margin-bottom: 0.35rem;">Message</label>
                            <textarea id="gv_message" name="message" rows="4" required placeholder="Tell us your target volume, destination port (FOB/CIF), and specifications..." style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-nb-200); border-radius: var(--radius-8); font-size: 0.875rem; font-family: inherit; background: var(--color-parchment);"></textarea>
                        </div>

                        <button type="submit" id="gv_submit_btn" class="gv-btn gv-btn-primary" style="width: 100%; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.05em;">
                            SEND MESSAGE
                        </button>
                    </form>

                    <script>
                    document.getElementById('gv-contact-form').addEventListener('submit', function(e) {
                        e.preventDefault();
                        var name = document.getElementById('gv_fullname').value;
                        var email = document.getElementById('gv_email').value;
                        var subject = document.getElementById('gv_subject').value;
                        var message = document.getElementById('gv_message').value;

                        var alertBox = document.getElementById('gv-form-alert');
                        var btn = document.getElementById('gv_submit_btn');
                        
                        btn.innerHTML = 'PREPARING INQUIRY...';
                        btn.style.opacity = '0.7';
                        alertBox.style.display = 'block';

                        var text = "Hello Grand Vanilla Indonesia,\n\n" +
                                   "*New Export Quotation Request*\n" +
                                   "• Name: " + name + "\n" +
                                   "• Email: " + email + "\n" +
                                   "• Subject: " + subject + "\n" +
                                   "• Details: " + message;

                        var waUrl = "https://wa.me/6281226974731?text=" + encodeURIComponent(text);

                        setTimeout(function() {
                            window.open(waUrl, '_blank');
                            btn.innerHTML = 'SEND MESSAGE';
                            btn.style.opacity = '1';
                        }, 800);
                    });
                    </script>
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
            <a href="<?php echo esc_url( $contact['whatsapp_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="gv-btn gv-btn-primary">
                Request a Quote
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
