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
<section class="gv-contact-section">
    <div class="gv-container">
        <div class="gv-contact-wrapper">

            <!-- Left: Info -->
            <div class="gv-contact-info">
                <span class="gv-contact-tag">
                    <span class="gv-contact-tag-line"></span>
                    Contact Us
                </span>
                <h2 class="gv-contact-heading">
                    We Are Always Ready To<br>Help You And Your<br>Questions
                </h2>
                <p class="gv-contact-desc">
                    Have a question or need more information about our products and services? Get in touch with our team and we'll be happy to assist with your inquiry.
                </p>

                <div class="gv-contact-details">
                    <div class="gv-contact-detail-item">
                        <strong class="gv-contact-detail-label">Phone Number</strong>
                        <div class="gv-contact-detail-value">
                            <a href="<?php echo esc_url( $contact['whatsapp_url'] ); ?>" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: none;">
                                <?php echo esc_html( $contact['whatsapp'] ); ?>
                            </a>
                        </div>
                        <?php if ( ! empty( $contact['phone_secondary'] ) ) : ?>
                            <div class="gv-contact-detail-sub"><?php echo esc_html( $contact['phone_secondary'] ); ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="gv-contact-detail-item">
                        <strong class="gv-contact-detail-label">Our Location</strong>
                        <div class="gv-contact-detail-value gv-contact-detail-value--normal">
                            <?php echo nl2br( esc_html( $contact['address'] ) ); ?>
                        </div>
                    </div>

                    <div class="gv-contact-detail-item">
                        <strong class="gv-contact-detail-label">Email</strong>
                        <div class="gv-contact-detail-value">
                            <a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>"><?php echo esc_html( $contact['email'] ); ?></a>
                        </div>
                    </div>

                    <div class="gv-contact-detail-item">
                        <strong class="gv-contact-detail-label">Social Network</strong>
                        <div class="gv-contact-social-icons">
                            <?php if ( ! empty( $contact['youtube_url'] ) ) : ?>
                                <a href="<?php echo esc_url( $contact['youtube_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="gv-contact-social-link" aria-label="YouTube">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                </a>
                            <?php endif; ?>
                            <?php if ( ! empty( $contact['instagram_url'] ) ) : ?>
                                <a href="<?php echo esc_url( $contact['instagram_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="gv-contact-social-link" aria-label="Instagram">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                            <?php endif; ?>
                            <?php if ( ! empty( $contact['facebook_url'] ) ) : ?>
                                <a href="<?php echo esc_url( $contact['facebook_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="gv-contact-social-link" aria-label="Facebook">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Get in Touch Form Card -->
            <div class="gv-contact-form-card">
                <h3 class="gv-contact-form-title">Get in Touch</h3>

                <!-- Status Notification Banner -->
                <div id="gv-form-alert" class="gv-contact-alert" style="display: none;"></div>

                <form id="gv-contact-form" class="gv-contact-form" data-ajaxurl="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
                    <input type="hidden" name="nonce" id="gv_nonce" value="<?php echo esc_attr( wp_create_nonce( 'gv_contact_form_nonce' ) ); ?>">

                    <!-- Anti-Spam Invisible Honeypot -->
                    <div style="position: absolute; left: -9999px; top: -9999px; opacity: 0; pointer-events: none;" aria-hidden="true">
                        <input type="text" name="company_website_hp" id="gv_company_website_hp" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="gv-field">
                        <label for="gv_fullname">Full Name</label>
                        <input type="text" id="gv_fullname" name="fullname" required placeholder="Your full name">
                    </div>

                    <div class="gv-field">
                        <label for="gv_email">Contact Email</label>
                        <input type="email" id="gv_email" name="email" required placeholder="your@email.com">
                    </div>

                    <div class="gv-field">
                        <label for="gv_subject">Subject</label>
                        <div class="gv-select-wrapper">
                            <select id="gv_subject" name="subject">
                                <?php
                                $raw_subjects = get_theme_mod( 'gv_contact_subjects', "Wholesale Vanilla Beans Inquiry\nVanilla Powder / Extract Quote\nCustom OEM Packaging Request\nPhysical Sample Request" );
                                $subjects_list = array_filter( array_map( 'trim', explode( "\n", (string) $raw_subjects ) ) );
                                if ( empty( $subjects_list ) ) {
                                    $subjects_list = array(
                                        'Wholesale Vanilla Beans Inquiry',
                                        'Vanilla Powder / Extract Quote',
                                        'Custom OEM Packaging Request',
                                        'Physical Sample Request',
                                    );
                                }
                                foreach ( $subjects_list as $subj_item ) :
                                ?>
                                    <option value="<?php echo esc_attr( $subj_item ); ?>"><?php echo esc_html( $subj_item ); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="gv-select-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                            </span>
                        </div>
                    </div>

                    <div class="gv-field">
                        <label for="gv_message">Message</label>
                        <textarea id="gv_message" name="message" rows="4" required placeholder="Tell us about your inquiry..."></textarea>
                    </div>

                    <button type="submit" id="gv_submit_btn" class="gv-contact-submit-btn">
                        SEND MESSAGE
                    </button>
                </form>

                <script>
                // Handle URL query parameter prefill (e.g. ?product=Vanilla+Beans)
                document.addEventListener('DOMContentLoaded', function() {
                    const urlParams = new URLSearchParams(window.location.search);
                    const prod = urlParams.get('product');
                    if (prod) {
                        const subjectSelect = document.getElementById('gv_subject');
                        const customOption = document.createElement('option');
                        customOption.value = 'Inquiry for ' + prod;
                        customOption.textContent = 'Inquiry for ' + prod;
                        customOption.selected = true;
                        subjectSelect.prepend(customOption);

                        const msgField = document.getElementById('gv_message');
                        if (msgField && !msgField.value) {
                            msgField.value = 'Hello Grand Vanilla team, I am interested in ordering or receiving a wholesale export quote for ' + prod + '.\n\nEstimated Volume / Requirements:\nDestination Country: ';
                        }
                    }
                });

                document.getElementById('gv-contact-form').addEventListener('submit', function(e) {
                    e.preventDefault();
                    var form     = this;
                    var ajaxUrl  = form.getAttribute('data-ajaxurl');
                    var alertBox = document.getElementById('gv-form-alert');
                    var btn      = document.getElementById('gv_submit_btn');

                    var name    = document.getElementById('gv_fullname').value.trim();
                    var email   = document.getElementById('gv_email').value.trim();
                    var subject = document.getElementById('gv_subject').value;
                    var message = document.getElementById('gv_message').value.trim();
                    var nonce   = document.getElementById('gv_nonce').value;
                    var hp      = document.getElementById('gv_company_website_hp') ? document.getElementById('gv_company_website_hp').value : '';

                    if (!name || !email || !message) {
                        alertBox.className     = 'gv-contact-alert gv-contact-alert--error';
                        alertBox.innerHTML     = '<strong>Error:</strong> Please fill in all required fields.';
                        alertBox.style.display = 'block';
                        return;
                    }

                    btn.disabled      = true;
                    btn.textContent   = 'SENDING INQUIRY...';
                    btn.style.opacity = '0.7';
                    alertBox.style.display = 'none';

                    var formData = new FormData();
                    formData.append('action', 'gv_submit_contact_form');
                    formData.append('nonce', nonce);
                    formData.append('fullname', name);
                    formData.append('email', email);
                    formData.append('subject', subject);
                    formData.append('message', message);
                    formData.append('company_website_hp', hp);

                    fetch(ajaxUrl, {
                        method: 'POST',
                        body: formData
                    })
                    .then(function(res) {
                        return res.json();
                    })
                    .then(function(data) {
                        btn.disabled      = false;
                        btn.textContent   = 'SEND MESSAGE';
                        btn.style.opacity = '1';

                        if (data && data.success) {
                            alertBox.className = 'gv-contact-alert gv-contact-alert--success';
                            var waLinkHtml = '';
                            if (data.data && data.data.whatsapp_url) {
                                waLinkHtml = '<div style="margin-top: 8px;"><a href="' + data.data.whatsapp_url + '" target="_blank" rel="noopener noreferrer" style="color: #0f5132; font-weight: 600; text-decoration: underline;">Or chat with our export desk via WhatsApp &rarr;</a></div>';
                            }
                            alertBox.innerHTML = '<strong>✓ Inquiry Sent Successfully!</strong> ' +
                                                 (data.data && data.data.message ? data.data.message : 'Your message has been delivered.') +
                                                 waLinkHtml;
                            alertBox.style.display = 'block';
                            form.reset();
                        } else {
                            alertBox.className = 'gv-contact-alert gv-contact-alert--error';
                            alertBox.innerHTML = '<strong>Submission Failed:</strong> ' + (data && data.data && data.data.message ? data.data.message : 'Please try again or contact us directly via email.');
                            alertBox.style.display = 'block';
                        }
                    })
                    .catch(function(err) {
                        btn.disabled      = false;
                        btn.textContent   = 'SEND MESSAGE';
                        btn.style.opacity = '1';
                        alertBox.className = 'gv-contact-alert gv-contact-alert--error';
                        alertBox.innerHTML = '<strong>Error:</strong> Network error occurred. Please try again.';
                        alertBox.style.display = 'block';
                    });
                });
                </script>
            </div>

        </div>
    </div>
</section>

<style>
/* ── Contact Section ─────────────────────────────────── */
.gv-contact-section {
    background: #E1E2DD;
    padding: 5rem 0;
}

/* Wrapper: two-column at ≥900 px */
.gv-contact-wrapper {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2.5rem;
    align-items: start;
}

@media (min-width: 900px) {
    .gv-contact-wrapper {
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: start;
    }
}

/* ── Left Info Panel ─────────────────────────────────── */
.gv-contact-tag {
    display: flex;
    align-items: center;
    gap: 0.625rem;
    font-size: 0.8125rem;
    font-family: var(--font-heading);
    color: var(--color-nw-500);
    letter-spacing: 0.03em;
    margin-bottom: 1.25rem;
}

.gv-contact-tag-line {
    display: inline-block;
    width: 2rem;
    height: 1px;
    background: var(--color-nw-500);
}

.gv-contact-heading {
    font-family: var(--font-heading);
    font-size: clamp(1.75rem, 3vw, 2.375rem);
    font-weight: 500;
    color: var(--color-dark-khaki);
    line-height: 1.2;
    margin-bottom: 1.25rem;
}

.gv-contact-desc {
    font-size: 0.9rem;
    color: var(--color-nw-500);
    line-height: 1.75;
    margin-bottom: 2.5rem;
    max-width: 30rem;
}

/* 2×2 detail grid */
.gv-contact-details {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.75rem 2rem;
}

.gv-contact-detail-label {
    display: block;
    font-size: 0.8125rem;
    font-family: var(--font-heading);
    font-weight: 500;
    color: var(--color-dark-khaki);
    margin-bottom: 0.35rem;
}

.gv-contact-detail-value {
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--color-pitch-black);
    line-height: 1.5;
}

.gv-contact-detail-value a {
    color: var(--color-pitch-black);
    text-decoration: none;
}

.gv-contact-detail-value a:hover {
    color: var(--color-dark-khaki);
}

.gv-contact-detail-value--normal {
    font-weight: 400;
    color: var(--color-nw-500);
}

.gv-contact-detail-sub {
    font-size: 0.8125rem;
    color: var(--color-nw-500);
    margin-top: 0.1rem;
}

/* Social icons */
.gv-contact-social-icons {
    display: flex;
    gap: 0.625rem;
    margin-top: 0.25rem;
}

.gv-contact-social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 2rem;
    height: 2rem;
    border-radius: var(--radius-4);
    background: rgba(54, 62, 25, 0.12);
    color: var(--color-dark-khaki);
    transition: var(--transition);
}

.gv-contact-social-link:hover {
    background: var(--color-dark-khaki);
    color: #fff;
}

/* ── Right Form Card ─────────────────────────────────── */
.gv-contact-form-card {
    background: #f2f2ed;
    border-radius: var(--radius-8);
    padding: 2.75rem 2.25rem;
}

.gv-contact-form-title {
    font-family: var(--font-heading);
    font-size: 1.5rem;
    font-weight: 500;
    color: var(--color-dark-khaki);
    margin-bottom: 2rem;
}

.gv-contact-alert {
    padding: 0.875rem 1rem;
    border-radius: var(--radius-4);
    background: #d1e7dd;
    color: #0f5132;
    margin-bottom: 1.25rem;
    font-size: 0.875rem;
    line-height: 1.5;
}

.gv-contact-alert--success {
    background: #d1e7dd !important;
    color: #0f5132 !important;
    border: 1px solid #badbcc;
}

.gv-contact-alert--error {
    background: #f8d7da !important;
    color: #842029 !important;
    border: 1px solid #f5c2c7;
}

/* Form fields with underline style */
.gv-contact-form {
    display: flex;
    flex-direction: column;
    gap: 0;
}

.gv-field {
    padding-bottom: 1.375rem;
    margin-bottom: 0.125rem;
}

.gv-field label {
    display: block;
    font-size: 0.8rem;
    color: var(--color-nw-500);
    margin-bottom: 0.5rem;
    font-family: var(--font-body);
}

.gv-field input,
.gv-field textarea {
    width: 100%;
    background: transparent;
    border: none;
    border-bottom: 1px solid var(--color-nw-300);
    border-radius: 0;
    padding: 0.35rem 0;
    font-size: 0.875rem;
    font-family: var(--font-body);
    color: var(--color-pitch-black);
    outline: none;
    transition: border-color 0.2s;
    box-sizing: border-box;
}

.gv-field input::placeholder,
.gv-field textarea::placeholder {
    color: transparent;
}

.gv-field input:focus,
.gv-field textarea:focus {
    border-bottom-color: var(--color-dark-khaki);
}

.gv-field textarea {
    resize: none;
    line-height: 1.6;
}

/* Select with underline */
.gv-select-wrapper {
    position: relative;
}

.gv-select-wrapper select {
    width: 100%;
    background: transparent;
    border: none;
    border-bottom: 1px solid var(--color-nw-300);
    border-radius: 0;
    padding: 0.35rem 1.5rem 0.35rem 0;
    font-size: 0.875rem;
    font-family: var(--font-body);
    color: var(--color-pitch-black);
    outline: none;
    appearance: none;
    -webkit-appearance: none;
    cursor: pointer;
    transition: border-color 0.2s;
}

.gv-select-wrapper select:focus {
    border-bottom-color: var(--color-dark-khaki);
}

.gv-select-arrow {
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
    color: var(--color-nw-500);
    display: flex;
    align-items: center;
}

/* Submit button */
.gv-contact-submit-btn {
    margin-top: 1.5rem;
    display: inline-block;
    padding: 0.8rem 2rem;
    background: #9a9e88;
    color: #fff;
    border: none;
    border-radius: var(--radius-4);
    font-family: var(--font-heading);
    font-size: 0.8125rem;
    font-weight: 500;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background 0.2s;
}

.gv-contact-submit-btn:hover {
    background: var(--color-dark-khaki);
}
</style>

<!-- 3. Google Maps Embed -->
<section class="gv-map-section">
    <div class="gv-map-header">
        <div class="gv-container">
            <span class="gv-contact-tag">
                <span class="gv-contact-tag-line"></span>
                Our Location
            </span>
            <p class="gv-map-address"><?php echo esc_html( $contact['address'] ); ?></p>
        </div>
    </div>
    <div class="gv-map-wrapper">
        <iframe
            id="gv-map-iframe"
            title="Grand Vanilla Indonesia Location"
            src="<?php echo esc_url( $contact['maps_embed_url'] ); ?>"
            width="100%"
            height="450"
            style="border: 0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="strict-origin-when-cross-origin">
        </iframe>
    </div>
</section>

<style>
.gv-map-section {
    background: #E1E2DD;
}

.gv-map-header {
    padding: 2rem 0 1.25rem;
}

.gv-map-address {
    font-size: 0.9rem;
    color: var(--color-nw-500);
    margin-top: 0.25rem;
    margin-bottom: 0;
}

.gv-map-wrapper {
    width: 100%;
    line-height: 0;
    filter: grayscale(20%) contrast(95%);
}

.gv-map-wrapper iframe {
    display: block;
    width: 100%;
}
</style>

<!-- 4. CTA Banner -->
<?php
get_template_part( 'template-parts/cta-banner', null, array(
    'title'    => 'Looking For A Reliable<br>Indonesian Vanilla Supplier?',
    'btn_text' => 'Request a Quote',
    'btn_url'  => $contact['whatsapp_url'],
) );
?>

<?php
get_footer();
