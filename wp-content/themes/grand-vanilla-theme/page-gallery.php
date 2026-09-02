<?php
/**
 * Template Name: Gallery Page
 *
 * @package GrandVanilla
 */

get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';
$contact = grand_vanilla_get_contact_info();
?>

<!-- 1. Hero Section -->
<section class="gv-hero-page" style="background-image: url('<?php echo esc_url( $img_dir . 'Gallery Hero Section.png' ); ?>');">
    <div class="gv-container">
        <h1 class="gv-hero-tag">#ourGallery</h1>
        <p class="gv-hero-subtag">See Our People, Products, And Operations</p>
    </div>
</section>

<!-- 2. A Closer Look Carousel -->
<section class="gv-section">
    <div class="gv-container">
        
        <div style="margin-bottom: 2.5rem;">
            <span class="gv-section-tag">Gallery</span>
            <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.5rem;">A Closer Look At Grand Vanilla</h2>
            <p style="color: var(--color-nw-500); font-size: 0.9375rem;">
                Explore the people, products, sourcing, and processes behind our Indonesian vanilla.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.25rem; margin-bottom: 5rem;">
            <div class="gv-card">
                <img src="<?php echo esc_url( $img_dir . 'Gallery Example Carroussel 1.png' ); ?>" alt="Fresh Vanilla Pods" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 1.25rem;">
                    <span style="font-size: 0.75rem; color: var(--color-dark-khaki); font-weight: 700; text-transform: uppercase;">Vanilla Collection</span>
                    <h3 style="font-size: 1rem; font-weight: 700; margin-top: 0.25rem;">Fresh Vanilla Pods</h3>
                </div>
            </div>
            <div class="gv-card">
                <img src="<?php echo esc_url( $img_dir . 'Gallery Example Carroussel 2.png' ); ?>" alt="Premium Vanilla Beans" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 1.25rem;">
                    <span style="font-size: 0.75rem; color: var(--color-dark-khaki); font-weight: 700; text-transform: uppercase;">Vanilla Collection</span>
                    <h3 style="font-size: 1rem; font-weight: 700; margin-top: 0.25rem;">Premium Vanilla Beans</h3>
                </div>
            </div>
            <div class="gv-card">
                <img src="<?php echo esc_url( $img_dir . 'Gallery Example Carroussel 3.png' ); ?>" alt="Vanilla in Bloom" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 1.25rem;">
                    <span style="font-size: 0.75rem; color: var(--color-dark-khaki); font-weight: 700; text-transform: uppercase;">Vanilla Collection</span>
                    <h3 style="font-size: 1rem; font-weight: 700; margin-top: 0.25rem;">Vanilla in Bloom</h3>
                </div>
            </div>
            <div class="gv-card">
                <img src="<?php echo esc_url( $img_dir . 'Gallery Example Carroussel 4.png' ); ?>" alt="Indonesian Vanilla Selection" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 1.25rem;">
                    <span style="font-size: 0.75rem; color: var(--color-dark-khaki); font-weight: 700; text-transform: uppercase;">Vanilla Collection</span>
                    <h3 style="font-size: 1rem; font-weight: 700; margin-top: 0.25rem;">Indonesian Vanilla Selection</h3>
                </div>
            </div>
            <div class="gv-card">
                <img src="<?php echo esc_url( $img_dir . 'Gallery Example Carroussel 5.png' ); ?>" alt="Handcrafted Vanilla" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 1.25rem;">
                    <span style="font-size: 0.75rem; color: var(--color-dark-khaki); font-weight: 700; text-transform: uppercase;">Vanilla Collection</span>
                    <h3 style="font-size: 1rem; font-weight: 700; margin-top: 0.25rem;">Handcrafted Vanilla</h3>
                </div>
            </div>
        </div>

        <!-- 3. Explore More Gallery (Interactive Tabs & 12 Grid) -->
        <div>
            <div style="display: flex; flex-direction: column; justify-content: space-between; margin-bottom: 2.5rem; gap: 1rem;">
                <h2 style="font-size: 2rem; font-weight: 800;">Explore More Gallery</h2>
                
                <!-- Category Filter Tabs -->
                <div style="display: flex; gap: 0.75rem;" id="gv-gallery-tabs">
                    <button type="button" class="gv-pill gv-pill-khaki gv-filter-btn" data-filter="all" style="cursor: pointer;">All Gallery</button>
                    <button type="button" class="gv-pill gv-filter-btn" data-filter="vanilla" style="cursor: pointer;">Vanilla</button>
                    <button type="button" class="gv-pill gv-filter-btn" data-filter="company" style="cursor: pointer;">Company</button>
                </div>
            </div>

            <!-- 12 Gallery Items Grid -->
            <div class="gv-grid-4" id="gv-gallery-grid" style="gap: 1.5rem; margin-bottom: 3.5rem;">
                <?php
                $gallery_samples = array(
                    array( 'img' => 'Gallery Example Carroussel 1.png', 'title' => 'Sun Drying Decks', 'desc' => 'Patient sun drying under equatorial sunshine in East Java.', 'cat' => 'vanilla' ),
                    array( 'img' => 'Gallery Example Carroussel 2.png', 'title' => 'Wooden Sweat Boxes', 'desc' => 'Nightly sweat box conditioning to maximize natural vanillin.', 'cat' => 'vanilla' ),
                    array( 'img' => 'Gallery Example Carroussel 3.png', 'title' => 'Orchid Hand Pollination', 'desc' => 'Delicate hand pollination during morning floral bloom.', 'cat' => 'vanilla' ),
                    array( 'img' => 'Gallery Example Carroussel 4.png', 'title' => 'Pod Length Sorting', 'desc' => 'Precision manual sorting by length and moisture.', 'cat' => 'vanilla' ),
                    array( 'img' => 'Gallery Example Carroussel 5.png', 'title' => 'Wax Paper Bundling', 'desc' => 'Aroma-sealed wax wrapping for export safety.', 'cat' => 'vanilla' ),
                    array( 'img' => 'Our Story.png', 'title' => 'Agroforestry Canopy', 'desc' => 'Shade-grown vanilla vines climbing live Gamal trees.', 'cat' => 'company' ),
                    array( 'img' => 'Sourcing.png', 'title' => 'Fresh Pod Harvest', 'desc' => 'Harvesting only when pods develop yellow blossom tips.', 'cat' => 'vanilla' ),
                    array( 'img' => 'Processing.png', 'title' => 'Inspection Facility', 'desc' => 'Laboratory moisture testing and quality inspection.', 'cat' => 'company' ),
                    array( 'img' => 'Warehouse.png', 'title' => 'Clean Room Storage', 'desc' => 'Climate-controlled warehouse and logistics staging.', 'cat' => 'company' ),
                    array( 'img' => 'Bulk  Wholesale Vanilla 1.png', 'title' => 'Export Shipping Staging', 'desc' => 'FOB / CIF export packaging for global buyers.', 'cat' => 'company' ),
                    array( 'img' => 'Planifolia Carroussel 1.png', 'title' => 'Planifolia Grade A Pods', 'desc' => 'Supple, glossy caviar-rich Gourmet vanilla beans.', 'cat' => 'vanilla' ),
                    array( 'img' => 'Tahitensis Carroussel 1.png', 'title' => 'Tahitensis Floral Pods', 'desc' => 'Aromatic floral pods for boutique confectionery.', 'cat' => 'vanilla' ),
                );

                foreach ( $gallery_samples as $item ) :
                    ?>
                    <div class="gv-card gv-gallery-item" data-cat="<?php echo esc_attr( $item['cat'] ); ?>">
                        <div style="height: 180px; overflow: hidden; background: var(--color-warm-sand-alt);">
                            <img src="<?php echo esc_url( $img_dir . $item['img'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 1.25rem;">
                            <span style="font-size: 0.6875rem; color: var(--color-dark-khaki); font-weight: 700; text-transform: uppercase;">Vanilla Operations</span>
                            <h3 style="font-size: 0.9375rem; font-weight: 700; margin: 0.25rem 0 0.5rem;"><?php echo esc_html( $item['title'] ); ?></h3>
                            <p style="font-size: 0.75rem; color: var(--color-nw-500); line-height: 1.5;"><?php echo esc_html( $item['desc'] ); ?></p>
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>
            </div>

            <script>
            document.querySelectorAll('#gv-gallery-tabs .gv-filter-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('#gv-gallery-tabs .gv-filter-btn').forEach(function(b) {
                        b.classList.remove('gv-pill-khaki');
                    });
                    btn.classList.add('gv-pill-khaki');

                    var filter = btn.getAttribute('data-filter');
                    document.querySelectorAll('#gv-gallery-grid .gv-gallery-item').forEach(function(card) {
                        if (filter === 'all' || card.getAttribute('data-cat') === filter) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
            </script>

        </div>

    </div>
</section>

<!-- 4. CTA Banner (High-Fidelity Figma Component) -->
<?php
get_template_part( 'template-parts/cta-banner', null, array(
    'title'    => 'Looking For A Reliable<br>Indonesian Vanilla Supplier?',
    'btn_text' => 'Request a Quote',
    'btn_url'  => home_url( '/contact/' ),
) );
?>

<?php
get_footer();
