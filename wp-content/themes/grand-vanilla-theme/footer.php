<?php
/**
 * The footer template for Grand Vanilla ID theme
 *
 * @package GrandVanilla
 */

$contact = grand_vanilla_get_contact_info();
?>
    </main><!-- #primary -->

    <footer id="colophon" class="gv-footer">
        <div class="gv-container">
            <div class="gv-footer-grid">
                
                <!-- Col 1: Bio & Branding -->
                <div>
                    <div class="gv-brand-logo" style="margin-bottom: 1rem; color: #ffffff;">
                        GRAND<span style="color: #f59e0b;">VANILLA</span>
                    </div>
                    <p style="font-size: 0.8125rem; color: #a8a29e; margin-bottom: 1.25rem; line-height: 1.6;">
                        Indonesia's premier producer and direct bulk exporter of sustainably cultivated gourmet vanilla beans, cured to perfection under tropical sunshine.
                    </p>
                    <div style="font-size: 0.75rem; color: #a8a29e;">
                        <strong style="color: #e7e5e4;">Export Hubs:</strong> <?php echo esc_html( $contact['export_hubs'] ); ?>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h4>Quick Navigation</h4>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Our Harvest</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Vanilla Catalog</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">Curing Gallery</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/articles/' ) ); ?>">Export News & Insights</a></li>
                    </ul>
                </div>

                <!-- Col 3: Product Varieties -->
                <div>
                    <h4>Vanilla Varieties</h4>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Planifolia Gourmet Pods</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Tahitensis Floral Pods</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Extraction Grade Vanilla</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Custom / OEM Vanilla Products</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact & Inquiries (PRD Aligned) -->
                <div>
                    <h4>Export Inquiries</h4>
                    <p style="font-size: 0.8125rem; color: #a8a29e; margin-bottom: 1rem;">
                        Reach out for FOB/CIF freight quotes, laboratory specification sheets, and sample shipments.
                    </p>
                    <div class="gv-footer-contact-item">
                        <span>📧</span>
                        <a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>" style="color: #e7e5e4;"><?php echo esc_html( $contact['email'] ); ?></a>
                    </div>
                    <div class="gv-footer-contact-item">
                        <span>📱</span>
                        <a href="<?php echo esc_url( $contact['whatsapp_url'] ); ?>" target="_blank" rel="noopener noreferrer" style="color: #22c55e; font-weight: 600;">
                            +62 812-2697-4731 (WhatsApp)
                        </a>
                    </div>
                </div>

            </div>

            <!-- Bottom Copyright -->
            <div class="gv-footer-bottom">
                <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> Grand Vanilla ID. All rights reserved.</p>
                <p>Sustainably Cultivated in Bali, Java & Papua, Indonesia</p>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
