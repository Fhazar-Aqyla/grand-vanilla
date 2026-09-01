<?php
/**
 * Template Name: Contact Page
 *
 * @package GrandVanilla
 */

get_header();

$contact = grand_vanilla_get_contact_info();
$prefilled_product = isset( $_GET['product'] ) ? sanitize_text_field( $_GET['product'] ) : '';
?>

<div class="gv-section-sm" style="background: linear-gradient(180deg, #f7efe4 0%, var(--color-cream) 100%); border-bottom: 1px solid var(--color-stone-200); text-align: center;">
    <div class="gv-container">
        <span class="gv-badge gv-badge-primary" style="margin-bottom: 0.75rem;">Wholesale & B2B Inquiry</span>
        <h1 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.75rem;">Contact Grand Vanilla ID</h1>
        <p style="color: var(--color-stone-600); max-width: 38rem; margin: 0 auto; font-size: 0.9375rem;">
            Request FOB / CIF freight quotes, laboratory Certificates of Analysis (COA), or order evaluation samples directly from our export specialists.
        </p>
    </div>
</div>

<div class="gv-section">
    <div class="gv-container">
        
        <div style="display: grid; grid-template-columns: repeat(1, minmax(0, 1fr)); gap: 3rem;">
            
            <div style="display: grid; grid-template-columns: 1fr; gap: 2rem;" class="gv-contact-split">
                
                <!-- Contact Direct Cards -->
                <div class="gv-card" style="background-color: var(--color-dark); color: #ffffff;">
                    <span class="gv-badge gv-badge-accent" style="margin-bottom: 1rem;">Direct Channels</span>
                    <h2 style="font-size: 1.5rem; font-weight: 800; color: #ffffff; margin-bottom: 1rem;">
                        Connect Directly With Our Export Team
                    </h2>
                    <p style="color: #a8a29e; font-size: 0.875rem; margin-bottom: 2rem; line-height: 1.6;">
                        For urgent price quotations, bulk contract negotiations, or rapid sample requests, feel free to contact us via WhatsApp or Email.
                    </p>

                    <div style="display: flex; flex-direction: column; gap: 1.25rem; margin-bottom: 2rem;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="font-size: 1.5rem; background: rgba(255,255,255,0.1); width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">📱</div>
                            <div>
                                <span style="font-size: 0.75rem; color: #a8a29e; display: block; text-transform: uppercase;">WhatsApp Direct</span>
                                <a href="<?php echo esc_url( $contact['whatsapp_url'] ); ?>" target="_blank" rel="noopener noreferrer" style="color: #22c55e; font-weight: 700; font-size: 1rem;">
                                    +62 812-2697-4731
                                </a>
                            </div>
                        </div>

                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="font-size: 1.5rem; background: rgba(255,255,255,0.1); width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">📧</div>
                            <div>
                                <span style="font-size: 0.75rem; color: #a8a29e; display: block; text-transform: uppercase;">Official Export Email</span>
                                <a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>" style="color: #ffffff; font-weight: 600; font-size: 1rem;">
                                    <?php echo esc_html( $contact['email'] ); ?>
                                </a>
                            </div>
                        </div>

                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="font-size: 1.5rem; background: rgba(255,255,255,0.1); width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">📍</div>
                            <div>
                                <span style="font-size: 0.75rem; color: #a8a29e; display: block; text-transform: uppercase;">Export Hubs</span>
                                <span style="color: #e7e5e4; font-size: 0.875rem;">Soekarno-Hatta (CGK), Jakarta & I Gusti Ngurah Rai (DPS), Bali</span>
                            </div>
                        </div>
                    </div>

                    <div style="padding-top: 1.5rem; border-top: 1px solid rgba(255,255,255,0.1);">
                        <a href="<?php echo esc_url( $contact['whatsapp_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="gv-btn gv-btn-primary" style="width: 100%;">
                            Chat on WhatsApp Now &rarr;
                        </a>
                    </div>
                </div>

                <!-- Inquiry Form -->
                <div class="gv-card">
                    <span class="gv-badge gv-badge-primary" style="margin-bottom: 0.75rem;">Quotation Request Form</span>
                    <h2 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 0.5rem;">Send a B2B Inquiry</h2>
                    <p style="color: var(--color-stone-600); font-size: 0.875rem; margin-bottom: 1.5rem;">
                        Fill out the details below and our international sales manager will respond within 24 business hours.
                    </p>

                    <form action="<?php echo esc_url( $contact['whatsapp_url'] ); ?>" method="GET" target="_blank" style="display: flex; flex-direction: column; gap: 1.25rem;">
                        <div>
                            <label style="display: block; font-size: 0.8125rem; font-weight: 700; color: var(--color-stone-700); margin-bottom: 0.35rem;">Your Full Name / Company Name</label>
                            <input type="text" name="name" required placeholder="e.g. John Doe / Global Flavors Ltd." style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-stone-300); border-radius: var(--radius-sm); font-size: 0.875rem;">
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div>
                                <label style="display: block; font-size: 0.8125rem; font-weight: 700; color: var(--color-stone-700); margin-bottom: 0.35rem;">Email Address</label>
                                <input type="email" name="email" required placeholder="john@company.com" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-stone-300); border-radius: var(--radius-sm); font-size: 0.875rem;">
                            </div>
                            <div>
                                <label style="display: block; font-size: 0.8125rem; font-weight: 700; color: var(--color-stone-700); margin-bottom: 0.35rem;">Destination Country / Port</label>
                                <input type="text" name="port" required placeholder="e.g. Rotterdam, Hamburg, Los Angeles" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-stone-300); border-radius: var(--radius-sm); font-size: 0.875rem;">
                            </div>
                        </div>

                        <div>
                            <label style="display: block; font-size: 0.8125rem; font-weight: 700; color: var(--color-stone-700); margin-bottom: 0.35rem;">Product of Interest</label>
                            <input type="text" name="product" value="<?php echo esc_attr( $prefilled_product ); ?>" placeholder="e.g. Planifolia Gourmet Grade A (25 kg)" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-stone-300); border-radius: var(--radius-sm); font-size: 0.875rem;">
                        </div>

                        <div>
                            <label style="display: block; font-size: 0.8125rem; font-weight: 700; color: var(--color-stone-700); margin-bottom: 0.35rem;">Estimated Quantity & Specifications Requirement</label>
                            <textarea name="message" rows="4" placeholder="Mention target volume (e.g. 50 kg - 1 MT), delivery term (FOB / CIF), and any custom packaging requirements..." style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-stone-300); border-radius: var(--radius-sm); font-size: 0.875rem; font-family: inherit;"></textarea>
                        </div>

                        <button type="submit" class="gv-btn gv-btn-primary" style="width: 100%; font-size: 0.9375rem;">
                            Submit Export Inquiry &rarr;
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

<?php
get_footer();
