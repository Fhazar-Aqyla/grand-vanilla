<?php
/**
 * Grand Vanilla ID Theme Functions & Definitions
 *
 * @package GrandVanilla
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * 1. Theme Setup
 */
function grand_vanilla_setup() {
    // Let WordPress manage document title
    add_theme_support( 'title-tag' );

    // Enable Featured Images (Post Thumbnails)
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'product-card', 600, 450, true );
    add_image_size( 'gallery-thumb', 800, 600, true );

    // Custom Logo Support
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 280,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // HTML5 markup support
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Register Navigation Menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Navigation Menu', 'grand-vanilla' ),
        'footer'  => esc_html__( 'Footer Navigation Menu', 'grand-vanilla' ),
    ) );
}
add_action( 'after_setup_theme', 'grand_vanilla_setup' );

/**
 * Custom Walkers for Primary & Mobile Navigation to preserve exact styling
 */
class Grand_Vanilla_Nav_Walker extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = null ) {}
    public function end_lvl( &$output, $depth = 0, $args = null ) {}
    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item    = $data_object;
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $is_active = in_array( 'current-menu-item', $classes ) || in_array( 'current_page_item', $classes );

        // Manual match for front page or blog archive
        if ( is_front_page() && home_url( '/' ) === trailingslashit( $item->url ) ) {
            $is_active = true;
        }

        $active_style = $is_active ? 'border-bottom: 2px solid #363E19;' : '';
        $link_style   = "font-family: var(--font-heading, 'Jost', sans-serif); font-size: 0.9375rem; font-weight: 500; color: #363E19; text-decoration: none; position: relative; padding-bottom: 4px; {$active_style}";

        $output .= '<a href="' . esc_url( $item->url ) . '" style="' . esc_attr( $link_style ) . '">';
        $output .= esc_html( $item->title );
        $output .= '</a>';
    }
    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {}
}

class Grand_Vanilla_Mobile_Walker extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = null ) {}
    public function end_lvl( &$output, $depth = 0, $args = null ) {}
    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item = $data_object;
        $link_style = "font-family: var(--font-heading, 'Jost', sans-serif); font-size: 1rem; font-weight: 500; color: #363E19; text-decoration: none;";

        $output .= '<a href="' . esc_url( $item->url ) . '" style="' . esc_attr( $link_style ) . '">';
        $output .= esc_html( $item->title );
        $output .= '</a>';
    }
    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {}
}

class Grand_Vanilla_Footer_Walker extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = null ) {}
    public function end_lvl( &$output, $depth = 0, $args = null ) {}
    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item = $data_object;
        $output .= '<a href="' . esc_url( $item->url ) . '">' . esc_html( $item->title ) . '</a>';
    }
    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {}
}

/**
 * 2. Enqueue Styles and Scripts
 */
function grand_vanilla_scripts() {
    // Google Fonts: Jost (Headings) and Lato (Body)
    wp_enqueue_style(
        'grand-vanilla-google-fonts',
        'https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&family=Lato:wght@300;400;500;700&display=swap',
        array(),
        null
    );

    // Main Theme Stylesheet (with cache-busting timestamp during active development)
    wp_enqueue_style(
        'grand-vanilla-style',
        get_stylesheet_uri(),
        array( 'grand-vanilla-google-fonts' ),
        filemtime( get_stylesheet_directory() . '/style.css' )
    );

    // Responsive Mobile & Tablet Refinements (isolated from desktop)
    $responsive_css = get_stylesheet_directory() . '/assets/css/responsive-mobile-tablet.css';
    if ( file_exists( $responsive_css ) ) {
        wp_enqueue_style(
            'grand-vanilla-responsive',
            get_stylesheet_directory_uri() . '/assets/css/responsive-mobile-tablet.css',
            array( 'grand-vanilla-style' ),
            filemtime( $responsive_css )
        );
    }
}
add_action( 'wp_enqueue_scripts', 'grand_vanilla_scripts' );

/**
 * 3. Register Custom Post Type: Vanilla Products
 */
function grand_vanilla_register_product_cpt() {
    $labels = array(
        'name'                  => _x( 'Vanilla Products', 'Post type general name', 'grand-vanilla' ),
        'singular_name'         => _x( 'Vanilla Product', 'Post type singular name', 'grand-vanilla' ),
        'menu_name'             => _x( 'Vanilla Products', 'Admin Menu text', 'grand-vanilla' ),
        'name_admin_bar'        => _x( 'Vanilla Product', 'Add New on Toolbar', 'grand-vanilla' ),
        'add_new'               => __( 'Add New Product', 'grand-vanilla' ),
        'add_new_item'          => __( 'Add New Vanilla Product', 'grand-vanilla' ),
        'new_item'              => __( 'New Product', 'grand-vanilla' ),
        'edit_item'             => __( 'Edit Product', 'grand-vanilla' ),
        'view_item'             => __( 'View Product', 'grand-vanilla' ),
        'all_items'             => __( 'All Products', 'grand-vanilla' ),
        'search_items'          => __( 'Search Products', 'grand-vanilla' ),
        'not_found'             => __( 'No products found.', 'grand-vanilla' ),
        'not_found_in_trash'    => __( 'No products found in Trash.', 'grand-vanilla' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'products' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-cart',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'vanilla_product', $args );

    // Taxonomy: Product Categories / Varieties
    $cat_labels = array(
        'name'              => _x( 'Product Categories', 'taxonomy general name', 'grand-vanilla' ),
        'singular_name'     => _x( 'Product Category', 'taxonomy singular name', 'grand-vanilla' ),
        'search_items'      => __( 'Search Categories', 'grand-vanilla' ),
        'all_items'         => __( 'All Categories', 'grand-vanilla' ),
        'edit_item'         => __( 'Edit Category', 'grand-vanilla' ),
        'update_item'       => __( 'Update Category', 'grand-vanilla' ),
        'add_new_item'      => __( 'Add New Category', 'grand-vanilla' ),
        'new_item_name'     => __( 'New Category Name', 'grand-vanilla' ),
        'menu_name'         => __( 'Categories', 'grand-vanilla' ),
    );

    register_taxonomy( 'product_variety', array( 'vanilla_product' ), array(
        'hierarchical'      => true,
        'labels'            => $cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'product-category' ),
        'show_in_rest'      => true,
    ) );
}
add_action( 'init', 'grand_vanilla_register_product_cpt' );

/**
 * 4. Register Custom Post Type: Harvest & Curing Gallery (Slug: curing-gallery to avoid collision with /gallery/ page)
 */
function grand_vanilla_register_gallery_cpt() {
    $labels = array(
        'name'               => _x( 'Curing Gallery', 'Post type general name', 'grand-vanilla' ),
        'singular_name'      => _x( 'Gallery Item', 'Post type singular name', 'grand-vanilla' ),
        'menu_name'          => _x( 'Gallery CPT', 'Admin Menu text', 'grand-vanilla' ),
        'add_new'            => __( 'Add New Photo', 'grand-vanilla' ),
        'add_new_item'       => __( 'Add New Gallery Photo', 'grand-vanilla' ),
        'all_items'          => __( 'All Gallery Items', 'grand-vanilla' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'curing-gallery' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-format-gallery',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'vanilla_gallery', $args );

    // Taxonomy: Gallery Categories (e.g. Vanilla, Company)
    $gallery_cat_labels = array(
        'name'              => _x( 'Gallery Categories', 'taxonomy general name', 'grand-vanilla' ),
        'singular_name'     => _x( 'Gallery Category', 'taxonomy singular name', 'grand-vanilla' ),
        'search_items'      => __( 'Search Categories', 'grand-vanilla' ),
        'all_items'         => __( 'All Categories', 'grand-vanilla' ),
        'edit_item'         => __( 'Edit Category', 'grand-vanilla' ),
        'update_item'       => __( 'Update Category', 'grand-vanilla' ),
        'add_new_item'      => __( 'Add New Category', 'grand-vanilla' ),
        'new_item_name'     => __( 'New Category Name', 'grand-vanilla' ),
        'menu_name'         => __( 'Categories', 'grand-vanilla' ),
    );

    register_taxonomy( 'gallery_category', array( 'vanilla_gallery' ), array(
        'hierarchical'      => true,
        'labels'            => $gallery_cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'gallery-category' ),
        'show_in_rest'      => true,
    ) );
}
add_action( 'init', 'grand_vanilla_register_gallery_cpt' );

/**
 * 4b. Register Custom Post Type: Our Facilities (vanilla_facility)
 */
function grand_vanilla_register_facility_cpt() {
    $labels = array(
        'name'               => _x( 'Our Facilities', 'Post type general name', 'grand-vanilla' ),
        'singular_name'      => _x( 'Facility', 'Post type singular name', 'grand-vanilla' ),
        'menu_name'          => _x( 'Facilities', 'Admin Menu text', 'grand-vanilla' ),
        'add_new'            => __( 'Add New Facility', 'grand-vanilla' ),
        'add_new_item'       => __( 'Add New Facility', 'grand-vanilla' ),
        'edit_item'          => __( 'Edit Facility', 'grand-vanilla' ),
        'new_item'           => __( 'New Facility', 'grand-vanilla' ),
        'all_items'          => __( 'All Facilities', 'grand-vanilla' ),
        'search_items'       => __( 'Search Facilities', 'grand-vanilla' ),
        'not_found'          => __( 'No facilities found.', 'grand-vanilla' ),
        'not_found_in_trash' => __( 'No facilities found in Trash.', 'grand-vanilla' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-building',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'vanilla_facility', $args );
}
add_action( 'init', 'grand_vanilla_register_facility_cpt' );

function grand_vanilla_add_facility_meta_box() {
    add_meta_box(
        'vanilla_facility_meta',
        __( 'Facility Tag & Category', 'grand-vanilla' ),
        'grand_vanilla_facility_meta_callback',
        'vanilla_facility',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'grand_vanilla_add_facility_meta_box' );

function grand_vanilla_facility_meta_callback( $post ) {
    wp_nonce_field( 'grand_vanilla_save_facility_meta', 'grand_vanilla_facility_nonce' );
    $tag = get_post_meta( $post->ID, '_gv_facility_tag', true );
    ?>
    <p>
        <label for="gv_facility_tag"><strong><?php esc_html_e( 'Category / Tag Line (e.g. Warehouse & Storage):', 'grand-vanilla' ); ?></strong></label><br>
        <input type="text" id="gv_facility_tag" name="gv_facility_tag" value="<?php echo esc_attr( $tag ); ?>" style="width:100%; max-width:500px; padding:8px; margin-top:4px;" placeholder="e.g. Warehouse & Storage">
    </p>
    <p class="description"><?php esc_html_e( 'Tip: Use the Featured Image box on the right sidebar to upload the facility photo.', 'grand-vanilla' ); ?></p>
    <?php
}

function grand_vanilla_save_facility_meta( $post_id ) {
    if ( ! isset( $_POST['grand_vanilla_facility_nonce'] ) || ! wp_verify_nonce( $_POST['grand_vanilla_facility_nonce'], 'grand_vanilla_save_facility_meta' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['gv_facility_tag'] ) ) {
        update_post_meta( $post_id, '_gv_facility_tag', sanitize_text_field( $_POST['gv_facility_tag'] ) );
    }
}
add_action( 'save_post_vanilla_facility', 'grand_vanilla_save_facility_meta' );

/**
 * 5. Meta Boxes for Vanilla Product Lab Specifications & Dynamic Varieties Repeater
 */
function grand_vanilla_admin_scripts( $hook ) {
    global $post_type;
    if ( ( 'post.php' === $hook || 'post-new.php' === $hook ) && 'vanilla_product' === $post_type ) {
        wp_enqueue_media();
    }
}
add_action( 'admin_enqueue_scripts', 'grand_vanilla_admin_scripts' );

function grand_vanilla_add_product_meta_box() {
    // 1. Single product general export specs
    add_meta_box(
        'vanilla_product_specs',
        __( 'Vanilla B2B Export Specifications (General)', 'grand-vanilla' ),
        'grand_vanilla_product_specs_callback',
        'vanilla_product',
        'normal',
        'default'
    );

    // 2. Dynamic multi-varieties repeater (Planifolia, Tahitensis, Pompona, etc.)
    add_meta_box(
        'vanilla_product_varieties',
        __( 'Product Varieties & Interactive Sections (Planifolia, Tahitensis, etc.)', 'grand-vanilla' ),
        'grand_vanilla_product_varieties_callback',
        'vanilla_product',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'grand_vanilla_add_product_meta_box' );

function grand_vanilla_product_specs_callback( $post ) {
    wp_nonce_field( 'grand_vanilla_save_specs', 'grand_vanilla_specs_nonce' );

    $vanillin = get_post_meta( $post->ID, '_gv_vanillin', true );
    $moisture = get_post_meta( $post->ID, '_gv_moisture', true );
    $length   = get_post_meta( $post->ID, '_gv_length', true );
    $origin   = get_post_meta( $post->ID, '_gv_origin', true );
    $grade    = get_post_meta( $post->ID, '_gv_grade', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="gv_grade"><?php esc_html_e( 'Grade / Classification', 'grand-vanilla' ); ?></label></th>
            <td>
                <input type="text" id="gv_grade" name="gv_grade" value="<?php echo esc_attr( $grade ); ?>" placeholder="e.g. Gourmet Grade A / Extraction Grade" class="regular-text">
                <p class="description"><?php esc_html_e( 'Standard commercial classification of the pods.', 'grand-vanilla' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="gv_vanillin"><?php esc_html_e( 'Vanillin Content (%)', 'grand-vanilla' ); ?></label></th>
            <td>
                <input type="text" id="gv_vanillin" name="gv_vanillin" value="<?php echo esc_attr( $vanillin ); ?>" placeholder="e.g. 2.0% - 2.4%" class="regular-text">
                <p class="description"><?php esc_html_e( 'Laboratory certified vanillin concentration percentage.', 'grand-vanilla' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="gv_moisture"><?php esc_html_e( 'Moisture Content (%)', 'grand-vanilla' ); ?></label></th>
            <td>
                <input type="text" id="gv_moisture" name="gv_moisture" value="<?php echo esc_attr( $moisture ); ?>" placeholder="e.g. 30% - 35%" class="regular-text">
                <p class="description"><?php esc_html_e( 'Moisture percentage level (e.g. 30%-35% for Gourmet, 20%-25% for Extraction).', 'grand-vanilla' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="gv_length"><?php esc_html_e( 'Pod Length (cm)', 'grand-vanilla' ); ?></label></th>
            <td>
                <input type="text" id="gv_length" name="gv_length" value="<?php echo esc_attr( $length ); ?>" placeholder="e.g. 16 - 20 cm" class="regular-text">
                <p class="description"><?php esc_html_e( 'Average bean length in centimeters.', 'grand-vanilla' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="gv_origin"><?php esc_html_e( 'Origin / Growing Region', 'grand-vanilla' ); ?></label></th>
            <td>
                <input type="text" id="gv_origin" name="gv_origin" value="<?php echo esc_attr( $origin ); ?>" placeholder="e.g. Jember, East Java / Bali & Papua" class="regular-text">
                <p class="description"><?php esc_html_e( 'Harvest terroir and cooperative growing location.', 'grand-vanilla' ); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Repeater Callback for Product Varieties
 */
function grand_vanilla_product_varieties_callback( $post ) {
    wp_nonce_field( 'grand_vanilla_save_varieties', 'grand_vanilla_varieties_nonce' );

    $varieties = get_post_meta( $post->ID, '_gv_varieties', true );
    if ( ! is_array( $varieties ) ) {
        $varieties = array();
    }
    ?>
    <div id="gv-varieties-wrapper" style="margin: 1rem 0;">
        <p class="description" style="margin-bottom: 1.5rem; font-size: 13px;">
            <?php esc_html_e( 'Tambahkan jenis varietas di bawah ini (misal: Vanilla Planifolia Beans, Vanilla Tahitensis Beans, Vanilla Pompona Beans, dll). Pengunjung dapat mengklik tab setiap varietas untuk melihat foto carousel, overview, dan spesifikasi yang otomatis berubah.', 'grand-vanilla' ); ?>
        </p>

        <div id="gv-varieties-list" style="display: flex; flex-direction: column; gap: 1.5rem;">
            <?php
            $v_index = 0;
            foreach ( $varieties as $v_key => $v_data ) :
                $v_name       = isset( $v_data['name'] ) ? $v_data['name'] : '';
                $v_short_name = isset( $v_data['short_name'] ) ? $v_data['short_name'] : '';
                $v_overview   = isset( $v_data['overview'] ) ? $v_data['overview'] : '';
                $v_carousel   = isset( $v_data['carousel'] ) && is_array( $v_data['carousel'] ) ? implode( "\n", $v_data['carousel'] ) : '';
                $v_specs      = isset( $v_data['specs'] ) && is_array( $v_data['specs'] ) ? $v_data['specs'] : array();

                $v_aroma      = isset( $v_specs['Aroma / Profile'] ) ? $v_specs['Aroma / Profile'] : '';
                $v_moisture   = isset( $v_specs['Moisture Level'] ) ? $v_specs['Moisture Level'] : '';
                $v_appearance = isset( $v_specs['Appearance / Color'] ) ? $v_specs['Appearance / Color'] : '';
                $v_origin     = isset( $v_specs['Terroir / Origin'] ) ? $v_specs['Terroir / Origin'] : '';
                $v_length     = isset( $v_specs['Length'] ) ? $v_specs['Length'] : '';
                $v_usage      = isset( $v_specs['Usage'] ) ? $v_specs['Usage'] : '';
            ?>
                <div class="gv-variety-item-card" style="border: 1px solid #ccd0d4; background: #f9f9f9; border-radius: 8px; padding: 1.25rem; position: relative;">
                    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ddd; padding-bottom: 0.75rem; margin-bottom: 1rem;">
                        <h4 style="margin: 0; font-size: 15px; color: #1d2327;">
                            Varietas #<span class="gv-v-number"><?php echo $v_index + 1; ?></span>: <strong><?php echo esc_html( $v_name ? $v_name : 'Varietas Baru' ); ?></strong>
                        </h4>
                        <button type="button" class="button button-link-delete gv-remove-variety-btn" style="color: #b32d2e;">Hapus Varietas</button>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                        <div>
                            <label style="font-weight: 600; display: block; margin-bottom: 4px;">Nama Lengkap Varietas (Tab & Heading)</label>
                            <input type="text" name="gv_varieties[<?php echo $v_index; ?>][name]" value="<?php echo esc_attr( $v_name ); ?>" placeholder="e.g. Vanilla Planifolia Beans" style="width: 100%;">
                        </div>
                        <div>
                            <label style="font-weight: 600; display: block; margin-bottom: 4px;">Nama Singkat (Variety Bullet)</label>
                            <input type="text" name="gv_varieties[<?php echo $v_index; ?>][short_name]" value="<?php echo esc_attr( $v_short_name ); ?>" placeholder="e.g. Vanilla Planifolia" style="width: 100%;">
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="font-weight: 600; display: block; margin-bottom: 4px;">Deskripsi / Product Overview</label>
                        <textarea name="gv_varieties[<?php echo $v_index; ?>][overview]" rows="3" style="width: 100%;" placeholder="Deskripsi lengkap tentang varietas ini..."><?php echo esc_textarea( $v_overview ); ?></textarea>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="font-weight: 600; display: block; margin-bottom: 4px;">Foto Carousel (1 baris per URL gambar)</label>
                        <textarea name="gv_varieties[<?php echo $v_index; ?>][carousel]" rows="3" style="width: 100%;" placeholder="https://domain.com/wp-content/.../image1.png"><?php echo esc_textarea( $v_carousel ); ?></textarea>
                        <button type="button" class="button gv-add-media-btn" style="margin-top: 4px;">+ Pilih Gambar dari Media Library</button>
                    </div>

                    <div style="border-top: 1px solid #ddd; padding-top: 1rem; margin-top: 1rem;">
                        <h5 style="margin: 0 0 0.75rem 0; font-size: 13px; text-transform: uppercase;">Spesifikasi / Product Characteristics:</h5>
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.75rem;">
                            <div>
                                <label style="font-size: 12px; font-weight: 600; display: block;">Aroma / Profile</label>
                                <input type="text" name="gv_varieties[<?php echo $v_index; ?>][specs][Aroma / Profile]" value="<?php echo esc_attr( $v_aroma ); ?>" style="width: 100%;" placeholder="Sweet, warm, distinctly vanilla">
                            </div>
                            <div>
                                <label style="font-size: 12px; font-weight: 600; display: block;">Moisture Level</label>
                                <input type="text" name="gv_varieties[<?php echo $v_index; ?>][specs][Moisture Level]" value="<?php echo esc_attr( $v_moisture ); ?>" style="width: 100%;" placeholder="30-35% (Plump, oily)">
                            </div>
                            <div>
                                <label style="font-size: 12px; font-weight: 600; display: block;">Appearance / Color</label>
                                <input type="text" name="gv_varieties[<?php echo $v_index; ?>][specs][Appearance / Color]" value="<?php echo esc_attr( $v_appearance ); ?>" style="width: 100%;" placeholder="Dark brown to black, lustrous">
                            </div>
                            <div>
                                <label style="font-size: 12px; font-weight: 600; display: block;">Terroir / Origin</label>
                                <input type="text" name="gv_varieties[<?php echo $v_index; ?>][specs][Terroir / Origin]" value="<?php echo esc_attr( $v_origin ); ?>" style="width: 100%;" placeholder="East Java, Indonesia">
                            </div>
                            <div>
                                <label style="font-size: 12px; font-weight: 600; display: block;">Length</label>
                                <input type="text" name="gv_varieties[<?php echo $v_index; ?>][specs][Length]" value="<?php echo esc_attr( $v_length ); ?>" style="width: 100%;" placeholder="16 - 20 cm (Gourmet / Grade A)">
                            </div>
                            <div>
                                <label style="font-size: 12px; font-weight: 600; display: block;">Usage</label>
                                <input type="text" name="gv_varieties[<?php echo $v_index; ?>][specs][Usage]" value="<?php echo esc_attr( $v_usage ); ?>" style="width: 100%;" placeholder="Industrial, Gourmet">
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $v_index++;
            endforeach;
            ?>
        </div>

        <div style="margin-top: 1.5rem;">
            <button type="button" id="gv-add-variety-btn" class="button button-primary button-large" style="background: #363E19; border-color: #363E19;">
                + Tambah Varietas Baru (Add Variety)
            </button>
        </div>
    </div>

    <!-- Repeater & Media Library JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const wrapper = document.getElementById('gv-varieties-list');
        const addBtn = document.getElementById('gv-add-variety-btn');
        if (!wrapper || !addBtn) return;

        function reindexVarieties() {
            const cards = wrapper.querySelectorAll('.gv-variety-item-card');
            cards.forEach((card, idx) => {
                const numSpan = card.querySelector('.gv-v-number');
                if (numSpan) numSpan.textContent = idx + 1;

                card.querySelectorAll('input, textarea').forEach(input => {
                    const name = input.getAttribute('name');
                    if (name) {
                        input.setAttribute('name', name.replace(/gv_varieties\[\d+\]/, 'gv_varieties[' + idx + ']'));
                    }
                });
            });
        }

        // Add variety
        addBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const nextIdx = wrapper.querySelectorAll('.gv-variety-item-card').length;
            const card = document.createElement('div');
            card.className = 'gv-variety-item-card';
            card.style.cssText = 'border: 1px solid #ccd0d4; background: #f9f9f9; border-radius: 8px; padding: 1.25rem; position: relative; margin-bottom: 1rem;';
            card.innerHTML = `
                <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ddd; padding-bottom: 0.75rem; margin-bottom: 1rem;">
                    <h4 style="margin: 0; font-size: 15px; color: #1d2327;">
                        Varietas #<span class="gv-v-number">${nextIdx + 1}</span>: <strong>Varietas Baru</strong>
                    </h4>
                    <button type="button" class="button button-link-delete gv-remove-variety-btn" style="color: #b32d2e;">Hapus Varietas</button>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                    <div>
                        <label style="font-weight: 600; display: block; margin-bottom: 4px;">Nama Lengkap Varietas (Tab & Heading)</label>
                        <input type="text" name="gv_varieties[${nextIdx}][name]" value="" placeholder="e.g. Vanilla Pompona Beans" style="width: 100%;">
                    </div>
                    <div>
                        <label style="font-weight: 600; display: block; margin-bottom: 4px;">Nama Singkat (Variety Bullet)</label>
                        <input type="text" name="gv_varieties[${nextIdx}][short_name]" value="" placeholder="e.g. Vanilla Pompona" style="width: 100%;">
                    </div>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Deskripsi / Product Overview</label>
                    <textarea name="gv_varieties[${nextIdx}][overview]" rows="3" style="width: 100%;" placeholder="Deskripsi lengkap tentang varietas ini..."></textarea>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Foto Carousel (1 baris per URL gambar)</label>
                    <textarea name="gv_varieties[${nextIdx}][carousel]" rows="3" style="width: 100%;" placeholder="https://domain.com/wp-content/.../image1.png"></textarea>
                    <button type="button" class="button gv-add-media-btn" style="margin-top: 4px;">+ Pilih Gambar dari Media Library</button>
                </div>
                <div style="border-top: 1px solid #ddd; padding-top: 1rem; margin-top: 1rem;">
                    <h5 style="margin: 0 0 0.75rem 0; font-size: 13px; text-transform: uppercase;">Spesifikasi / Product Characteristics:</h5>
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.75rem;">
                        <div>
                            <label style="font-size: 12px; font-weight: 600; display: block;">Aroma / Profile</label>
                            <input type="text" name="gv_varieties[${nextIdx}][specs][Aroma / Profile]" value="" style="width: 100%;" placeholder="Sweet, exotic aroma">
                        </div>
                        <div>
                            <label style="font-size: 12px; font-weight: 600; display: block;">Moisture Level</label>
                            <input type="text" name="gv_varieties[${nextIdx}][specs][Moisture Level]" value="" style="width: 100%;" placeholder="30-35%">
                        </div>
                        <div>
                            <label style="font-size: 12px; font-weight: 600; display: block;">Appearance / Color</label>
                            <input type="text" name="gv_varieties[${nextIdx}][specs][Appearance / Color]" value="" style="width: 100%;" placeholder="Plump, thick pods">
                        </div>
                        <div>
                            <label style="font-size: 12px; font-weight: 600; display: block;">Terroir / Origin</label>
                            <input type="text" name="gv_varieties[${nextIdx}][specs][Terroir / Origin]" value="" style="width: 100%;" placeholder="Papua, Indonesia">
                        </div>
                        <div>
                            <label style="font-size: 12px; font-weight: 600; display: block;">Length</label>
                            <input type="text" name="gv_varieties[${nextIdx}][specs][Length]" value="" style="width: 100%;" placeholder="18 - 22 cm">
                        </div>
                        <div>
                            <label style="font-size: 12px; font-weight: 600; display: block;">Usage</label>
                            <input type="text" name="gv_varieties[${nextIdx}][specs][Usage]" value="" style="width: 100%;" placeholder="Gourmet Extracts, Artisanal">
                        </div>
                    </div>
                </div>
            `;
            wrapper.appendChild(card);
            reindexVarieties();
        });

        // Delegate remove and media library buttons
        wrapper.addEventListener('click', function(e) {
            if (e.target.classList.contains('gv-remove-variety-btn')) {
                e.preventDefault();
                if (confirm('Hapus varietas ini?')) {
                    e.target.closest('.gv-variety-item-card').remove();
                    reindexVarieties();
                }
            }

            if (e.target.classList.contains('gv-add-media-btn')) {
                e.preventDefault();
                const textarea = e.target.closest('div').querySelector('textarea');
                const customUploader = wp.media({
                    title: 'Pilih Foto Carousel Varietas',
                    button: { text: 'Gunakan Foto Terpilih' },
                    multiple: true
                }).on('select', function() {
                    const selection = customUploader.state().get('selection');
                    const urls = [];
                    selection.each(function(attachment) {
                        urls.push(attachment.toJSON().url);
                    });
                    if (urls.length > 0) {
                        const currentVal = textarea.value.trim();
                        textarea.value = currentVal ? currentVal + '\n' + urls.join('\n') : urls.join('\n');
                    }
                }).open();
            }
        });
    });
    </script>
    <?php
}

function grand_vanilla_save_product_specs( $post_id ) {
    // Check nonce for specs
    if ( isset( $_POST['grand_vanilla_specs_nonce'] ) && wp_verify_nonce( $_POST['grand_vanilla_specs_nonce'], 'grand_vanilla_save_specs' ) ) {
        if ( current_user_can( 'edit_post', $post_id ) ) {
            $fields = array( 'gv_grade', 'gv_vanillin', 'gv_moisture', 'gv_length', 'gv_origin' );
            foreach ( $fields as $field ) {
                if ( isset( $_POST[ $field ] ) ) {
                    update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
                }
            }
        }
    }

    // Check nonce for varieties repeater
    if ( isset( $_POST['grand_vanilla_varieties_nonce'] ) && wp_verify_nonce( $_POST['grand_vanilla_varieties_nonce'], 'grand_vanilla_save_varieties' ) ) {
        if ( current_user_can( 'edit_post', $post_id ) ) {
            if ( isset( $_POST['gv_varieties'] ) && is_array( $_POST['gv_varieties'] ) ) {
                $sanitized_varieties = array();
                foreach ( $_POST['gv_varieties'] as $v_raw ) {
                    $name       = sanitize_text_field( $v_raw['name'] ?? '' );
                    $short_name = sanitize_text_field( $v_raw['short_name'] ?? '' );
                    $overview   = sanitize_textarea_field( $v_raw['overview'] ?? '' );
                    $carousel_raw = sanitize_textarea_field( $v_raw['carousel'] ?? '' );
                    $carousel_lines = array_filter( array_map( 'trim', explode( "\n", str_replace( "\r", "", $carousel_raw ) ) ) );

                    $specs = array();
                    if ( isset( $v_raw['specs'] ) && is_array( $v_raw['specs'] ) ) {
                        foreach ( $v_raw['specs'] as $sk => $sv ) {
                            $specs[ sanitize_text_field( $sk ) ] = sanitize_text_field( $sv );
                        }
                    }

                    if ( ! empty( $name ) ) {
                        $sanitized_varieties[] = array(
                            'name'       => $name,
                            'short_name' => $short_name ?: $name,
                            'overview'   => $overview,
                            'carousel'   => array_values( $carousel_lines ),
                            'specs'      => $specs,
                        );
                    }
                }
                update_post_meta( $post_id, '_gv_varieties', $sanitized_varieties );
            } else {
                delete_post_meta( $post_id, '_gv_varieties' );
            }
        }
    }
}
add_action( 'save_post_vanilla_product', 'grand_vanilla_save_product_specs' );

/**
 * 6. WordPress Customizer Settings (Appearance -> Customize)
 */
function grand_vanilla_customize_register( $wp_customize ) {
    // Section: Grand Vanilla Settings
    $wp_customize->add_section( 'grand_vanilla_options', array(
        'title'       => __( 'Grand Vanilla Settings', 'grand-vanilla' ),
        'priority'    => 30,
        'description' => __( 'Customize Hero Text and Contact Info for Grand Vanilla ID', 'grand-vanilla' ),
    ) );

    // Hero Title
    $wp_customize->add_setting( 'gv_hero_title', array(
        'default'           => 'Premium Indonesian vanilla, sourced for the global market.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'gv_hero_title', array(
        'label'    => __( 'Hero Title (Headline)', 'grand-vanilla' ),
        'section'  => 'grand_vanilla_options',
        'type'     => 'text',
    ) );

    // Hero Subtitle
    $wp_customize->add_setting( 'gv_hero_subtitle', array(
        'default'           => 'We deliver premium Indonesian vanilla with consistent quality, reliable supply, and tailored solutions for global B2B buyers.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'gv_hero_subtitle', array(
        'label'    => __( 'Hero Subtitle', 'grand-vanilla' ),
        'section'  => 'grand_vanilla_options',
        'type'     => 'textarea',
    ) );

    // WhatsApp Number
    $wp_customize->add_setting( 'gv_whatsapp', array(
        'default'           => '087717752085',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'gv_whatsapp', array(
        'label'    => __( 'Primary WhatsApp Number', 'grand-vanilla' ),
        'section'  => 'grand_vanilla_options',
        'type'     => 'text',
    ) );

    // Email Address
    $wp_customize->add_setting( 'gv_email', array(
        'default'           => 'grandvanilla@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'gv_email', array(
        'label'    => __( 'Primary Export Email', 'grand-vanilla' ),
        'section'  => 'grand_vanilla_options',
        'type'     => 'email',
    ) );

    // Location Address
    $wp_customize->add_setting( 'gv_address', array(
        'default'           => 'Sumbersari 2 Street, Jember, East Java, Indonesia',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'gv_address', array(
        'label'    => __( 'Office / Warehouse Location', 'grand-vanilla' ),
        'section'  => 'grand_vanilla_options',
        'type'     => 'text',
    ) );

    // Instagram URL
    $wp_customize->add_setting( 'gv_instagram', array(
        'default'           => 'https://instagram.com',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'gv_instagram', array(
        'label'    => __( 'Instagram Profile URL', 'grand-vanilla' ),
        'section'  => 'grand_vanilla_options',
        'type'     => 'url',
    ) );
}
add_action( 'customize_register', 'grand_vanilla_customize_register' );

/**
 * 7. Helper: Get Company Contact Info
 */
/**
 * 7. Helper: Get Company Contact Info
 */
function grand_vanilla_get_contact_info() {
    $whatsapp = get_theme_mod( 'gv_whatsapp', '087717752085' );
    $clean_wa = preg_replace( '/[^0-9]/', '', $whatsapp );
    if ( substr( $clean_wa, 0, 1 ) === '0' ) {
        $clean_wa = '62' . substr( $clean_wa, 1 );
    }

    return array(
        'whatsapp'      => $whatsapp,
        'clean_wa'      => $clean_wa,
        'whatsapp_url'  => 'https://wa.me/' . $clean_wa . '?text=' . rawurlencode('Hello Grand Vanilla Indonesia, I would like to inquire about sourcing your Indonesian vanilla beans for export.'),
        'email'         => get_theme_mod( 'gv_email', 'grandvanilla@gmail.com' ),
        'address'       => get_theme_mod( 'gv_address', 'Sumbersari 2 Street, Jember, East Java, Indonesia' ),
        'instagram_url' => get_theme_mod( 'gv_instagram', 'https://instagram.com' ),
        'export_hubs'   => 'Jakarta (CGK) & Bali (DPS), Indonesia',
    );
}

/**
 * 8. Custom Meta Boxes for Pages: Homepage & About Us Page
 */
function grand_vanilla_add_page_meta_boxes() {
    global $post;
    if ( ! $post || 'page' !== $post->post_type ) {
        return;
    }

    $template = get_post_meta( $post->ID, '_wp_page_template', true );
    $is_front = ( (int) get_option( 'page_on_front' ) === (int) $post->ID ) || 'front-page.php' === $template || 'home' === $post->post_name;

    // Homepage Meta Box
    if ( $is_front ) {
        add_meta_box(
            'gv_frontpage_meta',
            __( 'Homepage: Sections & Value Propositions', 'grand-vanilla' ),
            'grand_vanilla_frontpage_meta_callback',
            'page',
            'normal',
            'high'
        );
    }

    // About Us Page Meta Box
    if ( 'page-about.php' === $template || 'about' === $post->post_name ) {
        add_meta_box(
            'gv_aboutpage_meta',
            __( 'About Us Page: Narrative, Vision, Mission & Sourcing', 'grand-vanilla' ),
            'grand_vanilla_aboutpage_meta_callback',
            'page',
            'normal',
            'high'
        );
    }
}
add_action( 'add_meta_boxes', 'grand_vanilla_add_page_meta_boxes' );

/**
 * Callback for Homepage Meta Box
 */
function grand_vanilla_frontpage_meta_callback( $post ) {
    wp_nonce_field( 'grand_vanilla_save_frontpage_meta', 'grand_vanilla_frontpage_nonce' );

    $fields = array(
        'gv_hero_stat_num'     => get_post_meta( $post->ID, '_gv_hero_stat_num', true ) ?: '12+',
        'gv_hero_stat_label'   => get_post_meta( $post->ID, '_gv_hero_stat_label', true ) ?: 'Trusted Customers Worldwide',
        'gv_home_about_heading'=> get_post_meta( $post->ID, '_gv_home_about_heading', true ) ?: 'Grand Vanilla Indonesia',
        'gv_home_about_p1'     => get_post_meta( $post->ID, '_gv_home_about_p1', true ) ?: "Grand Vanilla Indonesia is an Indonesian vanilla supplier and exporter providing high-quality vanilla products for international buyers. We connect buyers with trusted sources of Indonesian vanilla, with a strong focus on product quality, consistent supply, and reliable service for wholesale and export needs.",
        'gv_home_about_p2'     => get_post_meta( $post->ID, '_gv_home_about_p2', true ) ?: "Grand Vanilla Indonesia is an Indonesian vanilla supplier and exporter providing high-quality vanilla products for international buyers. We connect buyers with trusted sources of Indonesian vanilla, with a strong focus on product quality, consistent supply, and reliable service for wholesale and export needs.",
        'gv_home_about_f1'     => get_post_meta( $post->ID, '_gv_home_about_f1', true ) ?: 'Premium Product Quality',
        'gv_home_about_f2'     => get_post_meta( $post->ID, '_gv_home_about_f2', true ) ?: 'Consistent Global Supply',
        'gv_home_about_f3'     => get_post_meta( $post->ID, '_gv_home_about_f3', true ) ?: 'Reliable Business Service',
        'gv_home_about_f4'     => get_post_meta( $post->ID, '_gv_home_about_f4', true ) ?: 'Flexible Custom Solutions',

        // 4 Value Props
        'gv_home_vp1_title'    => get_post_meta( $post->ID, '_gv_home_vp1_title', true ) ?: 'Quality Focused',
        'gv_home_vp1_desc'     => get_post_meta( $post->ID, '_gv_home_vp1_desc', true ) ?: 'We maintain product quality to meet international standards and diverse industry requirements.',
        'gv_home_vp2_title'    => get_post_meta( $post->ID, '_gv_home_vp2_title', true ) ?: 'Consistent Supply',
        'gv_home_vp2_desc'     => get_post_meta( $post->ID, '_gv_home_vp2_desc', true ) ?: 'We provide reliable vanilla supply for wholesale, bulk, and ongoing business needs.',
        'gv_home_vp3_title'    => get_post_meta( $post->ID, '_gv_home_vp3_title', true ) ?: 'Indonesian Origin',
        'gv_home_vp3_desc'     => get_post_meta( $post->ID, '_gv_home_vp3_desc', true ) ?: 'We connect global buyers with quality Indonesian vanilla known for its rich aroma and flavor.',
        'gv_home_vp4_title'    => get_post_meta( $post->ID, '_gv_home_vp4_title', true ) ?: 'Reliable Service',
        'gv_home_vp4_desc'     => get_post_meta( $post->ID, '_gv_home_vp4_desc', true ) ?: 'We provide responsive support for international buyers and their sourcing needs.',

        // OEM & Flexible Supply
        'gv_home_oem_subtitle' => get_post_meta( $post->ID, '_gv_home_oem_subtitle', true ) ?: 'From high-volume wholesale supply to customized vanilla solutions, we provide flexible products and services designed to meet the needs of international buyers and business partners.',
        'gv_home_oem_heading'  => get_post_meta( $post->ID, '_gv_home_oem_heading', true ) ?: 'Special OEM & Bulk Vanilla',
        'gv_home_oem_desc'     => get_post_meta( $post->ID, '_gv_home_oem_desc', true ) ?: 'Vanilla products supplied in larger quantities to support wholesalers, distributors, manufacturers, and businesses with ongoing or high-volume requirements.',
        'gv_home_oem_f1_title' => get_post_meta( $post->ID, '_gv_home_oem_f1_title', true ) ?: 'High-Volume Supply',
        'gv_home_oem_f1_desc'  => get_post_meta( $post->ID, '_gv_home_oem_f1_desc', true ) ?: 'Supporting larger orders for wholesalers, distributors, and manufacturers.',
        'gv_home_oem_f2_title' => get_post_meta( $post->ID, '_gv_home_oem_f2_title', true ) ?: 'Consistent Quality',
        'gv_home_oem_f2_desc'  => get_post_meta( $post->ID, '_gv_home_oem_f2_desc', true ) ?: 'Carefully sourced vanilla with quality standards maintained across orders.',
        'gv_home_oem_f3_title' => get_post_meta( $post->ID, '_gv_home_oem_f3_title', true ) ?: 'Custom Packaging',
        'gv_home_oem_f3_desc'  => get_post_meta( $post->ID, '_gv_home_oem_f3_desc', true ) ?: 'Packaging options can be adapted to your product, branding, and requirements.',
        'gv_home_oem_f4_title' => get_post_meta( $post->ID, '_gv_home_oem_f4_title', true ) ?: 'Flexible Quantities',
        'gv_home_oem_f4_desc'  => get_post_meta( $post->ID, '_gv_home_oem_f4_desc', true ) ?: 'Order volumes can be adjusted based on your production and business needs.',

        // Who We Serve
        'gv_home_serve_1'      => get_post_meta( $post->ID, '_gv_home_serve_1', true ) ?: 'IMPORTERS',
        'gv_home_serve_2'      => get_post_meta( $post->ID, '_gv_home_serve_2', true ) ?: 'DISTRIBUTORS',
        'gv_home_serve_3'      => get_post_meta( $post->ID, '_gv_home_serve_3', true ) ?: 'FOOD MANUFACTURERS',
        'gv_home_serve_4'      => get_post_meta( $post->ID, '_gv_home_serve_4', true ) ?: 'SPICE TRADERS',
        'gv_home_serve_5'      => get_post_meta( $post->ID, '_gv_home_serve_5', true ) ?: 'BAKERIES',
        'gv_home_serve_6'      => get_post_meta( $post->ID, '_gv_home_serve_6', true ) ?: 'CONFECTIONERY COMPANIES',
    );
    ?>
    <div style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; max-width: 1000px;">
        <!-- Section 1: Hero Statistics -->
        <div style="background: #fdfdfd; border: 1px solid #ddd; border-left: 4px solid #363E19; padding: 1.25rem; margin-bottom: 1.5rem; border-radius: 4px;">
            <h3 style="margin: 0 0 1rem 0; font-size: 15px; color: #363E19;">1. Hero Statistics Floating Badge</h3>
            <div style="display: grid; grid-template-columns: 140px 1fr; gap: 1rem;">
                <div>
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Angka Statistik</label>
                    <input type="text" name="gv_hero_stat_num" value="<?php echo esc_attr( $fields['gv_hero_stat_num'] ); ?>" style="width: 100%;">
                </div>
                <div>
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Label Statistik</label>
                    <input type="text" name="gv_hero_stat_label" value="<?php echo esc_attr( $fields['gv_hero_stat_label'] ); ?>" style="width: 100%;">
                </div>
            </div>
        </div>

        <!-- Section 2: About Us Preview -->
        <div style="background: #fdfdfd; border: 1px solid #ddd; border-left: 4px solid #363E19; padding: 1.25rem; margin-bottom: 1.5rem; border-radius: 4px;">
            <h3 style="margin: 0 0 1rem 0; font-size: 15px; color: #363E19;">2. About Us Preview Section (Homepage)</h3>
            <div style="margin-bottom: 1rem;">
                <label style="font-weight: 600; display: block; margin-bottom: 4px;">Heading</label>
                <input type="text" name="gv_home_about_heading" value="<?php echo esc_attr( $fields['gv_home_about_heading'] ); ?>" style="width: 100%;">
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Paragraf 1</label>
                    <textarea name="gv_home_about_p1" rows="4" style="width: 100%;"><?php echo esc_textarea( $fields['gv_home_about_p1'] ); ?></textarea>
                </div>
                <div>
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Paragraf 2</label>
                    <textarea name="gv_home_about_p2" rows="4" style="width: 100%;"><?php echo esc_textarea( $fields['gv_home_about_p2'] ); ?></textarea>
                </div>
            </div>
            <div style="border-top: 1px solid #eee; padding-top: 1rem;">
                <label style="font-weight: 600; display: block; margin-bottom: 6px;">4 Kotak Fitur / Pillars:</label>
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.75rem;">
                    <input type="text" name="gv_home_about_f1" value="<?php echo esc_attr( $fields['gv_home_about_f1'] ); ?>" placeholder="Pillar 1">
                    <input type="text" name="gv_home_about_f2" value="<?php echo esc_attr( $fields['gv_home_about_f2'] ); ?>" placeholder="Pillar 2">
                    <input type="text" name="gv_home_about_f3" value="<?php echo esc_attr( $fields['gv_home_about_f3'] ); ?>" placeholder="Pillar 3">
                    <input type="text" name="gv_home_about_f4" value="<?php echo esc_attr( $fields['gv_home_about_f4'] ); ?>" placeholder="Pillar 4">
                </div>
            </div>
        </div>

        <!-- Section 3: 4 Value Proposition Cards -->
        <div style="background: #fdfdfd; border: 1px solid #ddd; border-left: 4px solid #363E19; padding: 1.25rem; margin-bottom: 1.5rem; border-radius: 4px;">
            <h3 style="margin: 0 0 1rem 0; font-size: 15px; color: #363E19;">3. Value Propositions (4 Cards)</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
                <!-- Card 1 -->
                <div style="background: #f4f6f3; padding: 1rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 1: Judul</label>
                    <input type="text" name="gv_home_vp1_title" value="<?php echo esc_attr( $fields['gv_home_vp1_title'] ); ?>" style="width: 100%; margin-bottom: 8px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 1: Deskripsi</label>
                    <textarea name="gv_home_vp1_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $fields['gv_home_vp1_desc'] ); ?></textarea>
                </div>
                <!-- Card 2 -->
                <div style="background: #f4f6f3; padding: 1rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 2: Judul</label>
                    <input type="text" name="gv_home_vp2_title" value="<?php echo esc_attr( $fields['gv_home_vp2_title'] ); ?>" style="width: 100%; margin-bottom: 8px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 2: Deskripsi</label>
                    <textarea name="gv_home_vp2_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $fields['gv_home_vp2_desc'] ); ?></textarea>
                </div>
                <!-- Card 3 -->
                <div style="background: #f4f6f3; padding: 1rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 3: Judul</label>
                    <input type="text" name="gv_home_vp3_title" value="<?php echo esc_attr( $fields['gv_home_vp3_title'] ); ?>" style="width: 100%; margin-bottom: 8px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 3: Deskripsi</label>
                    <textarea name="gv_home_vp3_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $fields['gv_home_vp3_desc'] ); ?></textarea>
                </div>
                <!-- Card 4 -->
                <div style="background: #f4f6f3; padding: 1rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 4: Judul</label>
                    <input type="text" name="gv_home_vp4_title" value="<?php echo esc_attr( $fields['gv_home_vp4_title'] ); ?>" style="width: 100%; margin-bottom: 8px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 4: Deskripsi</label>
                    <textarea name="gv_home_vp4_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $fields['gv_home_vp4_desc'] ); ?></textarea>
                </div>
            </div>
        </div>

        <!-- Section 4: Flexible Supply & OEM -->
        <div style="background: #fdfdfd; border: 1px solid #ddd; border-left: 4px solid #363E19; padding: 1.25rem; margin-bottom: 1.5rem; border-radius: 4px;">
            <h3 style="margin: 0 0 1rem 0; font-size: 15px; color: #363E19;">4. Flexible Vanilla Supply & Special OEM</h3>
            <div style="margin-bottom: 1rem;">
                <label style="font-weight: 600; display: block; margin-bottom: 4px;">Subtitle Bagian Kanan</label>
                <textarea name="gv_home_oem_subtitle" rows="2" style="width: 100%;"><?php echo esc_textarea( $fields['gv_home_oem_subtitle'] ); ?></textarea>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Heading OEM</label>
                    <input type="text" name="gv_home_oem_heading" value="<?php echo esc_attr( $fields['gv_home_oem_heading'] ); ?>" style="width: 100%;">
                </div>
                <div>
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Deskripsi OEM</label>
                    <textarea name="gv_home_oem_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $fields['gv_home_oem_desc'] ); ?></textarea>
                </div>
            </div>
            <div style="border-top: 1px solid #eee; padding-top: 1rem;">
                <label style="font-weight: 600; display: block; margin-bottom: 6px;">4 Poin Fitur OEM (Judul & Deskripsi Singkat):</label>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem;">
                    <div>
                        <input type="text" name="gv_home_oem_f1_title" value="<?php echo esc_attr( $fields['gv_home_oem_f1_title'] ); ?>" placeholder="Fitur 1 Judul" style="width: 100%; margin-bottom: 4px;">
                        <input type="text" name="gv_home_oem_f1_desc" value="<?php echo esc_attr( $fields['gv_home_oem_f1_desc'] ); ?>" placeholder="Fitur 1 Deskripsi" style="width: 100%;">
                    </div>
                    <div>
                        <input type="text" name="gv_home_oem_f2_title" value="<?php echo esc_attr( $fields['gv_home_oem_f2_title'] ); ?>" placeholder="Fitur 2 Judul" style="width: 100%; margin-bottom: 4px;">
                        <input type="text" name="gv_home_oem_f2_desc" value="<?php echo esc_attr( $fields['gv_home_oem_f2_desc'] ); ?>" placeholder="Fitur 2 Deskripsi" style="width: 100%;">
                    </div>
                    <div>
                        <input type="text" name="gv_home_oem_f3_title" value="<?php echo esc_attr( $fields['gv_home_oem_f3_title'] ); ?>" placeholder="Fitur 3 Judul" style="width: 100%; margin-bottom: 4px;">
                        <input type="text" name="gv_home_oem_f3_desc" value="<?php echo esc_attr( $fields['gv_home_oem_f3_desc'] ); ?>" placeholder="Fitur 3 Deskripsi" style="width: 100%;">
                    </div>
                    <div>
                        <input type="text" name="gv_home_oem_f4_title" value="<?php echo esc_attr( $fields['gv_home_oem_f4_title'] ); ?>" placeholder="Fitur 4 Judul" style="width: 100%; margin-bottom: 4px;">
                        <input type="text" name="gv_home_oem_f4_desc" value="<?php echo esc_attr( $fields['gv_home_oem_f4_desc'] ); ?>" placeholder="Fitur 4 Deskripsi" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 5: Who We Serve (6 B2B Targets) -->
        <div style="background: #fdfdfd; border: 1px solid #ddd; border-left: 4px solid #363E19; padding: 1.25rem; border-radius: 4px;">
            <h3 style="margin: 0 0 1rem 0; font-size: 15px; color: #363E19;">5. Who We Serve In Global B2B Markets (6 Cards)</h3>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.75rem;">
                <input type="text" name="gv_home_serve_1" value="<?php echo esc_attr( $fields['gv_home_serve_1'] ); ?>" placeholder="Target 1">
                <input type="text" name="gv_home_serve_2" value="<?php echo esc_attr( $fields['gv_home_serve_2'] ); ?>" placeholder="Target 2">
                <input type="text" name="gv_home_serve_3" value="<?php echo esc_attr( $fields['gv_home_serve_3'] ); ?>" placeholder="Target 3">
                <input type="text" name="gv_home_serve_4" value="<?php echo esc_attr( $fields['gv_home_serve_4'] ); ?>" placeholder="Target 4">
                <input type="text" name="gv_home_serve_5" value="<?php echo esc_attr( $fields['gv_home_serve_5'] ); ?>" placeholder="Target 5">
                <input type="text" name="gv_home_serve_6" value="<?php echo esc_attr( $fields['gv_home_serve_6'] ); ?>" placeholder="Target 6">
            </div>
        </div>
    </div>
    <?php
}

/**
 * Callback for About Us Page Meta Box
 */
function grand_vanilla_aboutpage_meta_callback( $post ) {
    wp_nonce_field( 'grand_vanilla_save_aboutpage_meta', 'grand_vanilla_aboutpage_nonce' );

    $fields = array(
        'gv_about_hero_subtag'     => get_post_meta( $post->ID, '_gv_about_hero_subtag', true ) ?: 'Connecting Indonesian vanilla with global markets.',
        'gv_about_overview_heading'=> get_post_meta( $post->ID, '_gv_about_overview_heading', true ) ?: 'Grand Vanilla Indonesia',
        'gv_about_overview_p1'     => get_post_meta( $post->ID, '_gv_about_overview_p1', true ) ?: "Grand Vanilla Indonesia is an Indonesian vanilla supplier and exporter providing high-quality vanilla products for international buyers. We connect buyers with trusted sources of Indonesian vanilla, with a strong focus on product quality, consistent supply, and reliable service for wholesale and export needs.",
        'gv_about_overview_p2'     => get_post_meta( $post->ID, '_gv_about_overview_p2', true ) ?: "Grand Vanilla Indonesia is an Indonesian vanilla supplier and exporter providing high-quality vanilla products for international buyers. We connect buyers with trusted sources of Indonesian vanilla, with a strong focus on product quality, consistent supply, and reliable service for wholesale and export needs.",
        'gv_about_overview_f1'     => get_post_meta( $post->ID, '_gv_about_overview_f1', true ) ?: 'Premium Product Quality',
        'gv_about_overview_f2'     => get_post_meta( $post->ID, '_gv_about_overview_f2', true ) ?: 'Consistent Global Supply',
        'gv_about_overview_f3'     => get_post_meta( $post->ID, '_gv_about_overview_f3', true ) ?: 'Reliable Business Service',
        'gv_about_overview_f4'     => get_post_meta( $post->ID, '_gv_about_overview_f4', true ) ?: 'Flexible Custom Solutions',

        // Journey, Story, Vision, Mission
        'gv_about_journey_desc'    => get_post_meta( $post->ID, '_gv_about_journey_desc', true ) ?: 'Explore our range of quality Indonesian vanilla products, carefully sourced and prepared to meet the needs of global B2B buyers.',
        'gv_about_story_title'     => get_post_meta( $post->ID, '_gv_about_story_title', true ) ?: 'Our Story',
        'gv_about_story_text'      => get_post_meta( $post->ID, '_gv_about_story_text', true ) ?: "Grand Vanilla Indonesia was founded in 2019 in Jember, East Java, with a simple goal: to bring Indonesia's rich vanilla resources to a wider global market. Starting from local vanilla sourcing and small-scale supply, the company gradually expanded its network and began serving wholesale and international B2B buyers.",
        'gv_about_vision_text'     => get_post_meta( $post->ID, '_gv_about_vision_text', true ) ?: "To grow as a trusted Indonesian vanilla supplier and export partner, connecting quality products with international buyers while creating long-term value across global markets.",
        'gv_about_mission_text'    => get_post_meta( $post->ID, '_gv_about_mission_text', true ) ?: "To provide quality Indonesian vanilla with consistent supply and reliable service, while supporting international buyers with solutions that meet their product and business requirements.",

        // 4 Value Props
        'gv_about_vp1_title'       => get_post_meta( $post->ID, '_gv_about_vp1_title', true ) ?: 'Quality Focused',
        'gv_about_vp1_desc'        => get_post_meta( $post->ID, '_gv_about_vp1_desc', true ) ?: 'We maintain product quality to meet international standards and diverse industry requirements.',
        'gv_about_vp2_title'       => get_post_meta( $post->ID, '_gv_about_vp2_title', true ) ?: 'Consistent Supply',
        'gv_about_vp2_desc'        => get_post_meta( $post->ID, '_gv_about_vp2_desc', true ) ?: 'We provide reliable vanilla supply for wholesale, bulk, and ongoing business needs.',
        'gv_about_vp3_title'       => get_post_meta( $post->ID, '_gv_about_vp3_title', true ) ?: 'Quality Assurance',
        'gv_about_vp3_desc'        => get_post_meta( $post->ID, '_gv_about_vp3_desc', true ) ?: 'We ensure consistent quality through careful inspection and control.',
        'gv_about_vp4_title'       => get_post_meta( $post->ID, '_gv_about_vp4_title', true ) ?: 'Full Traceability',
        'gv_about_vp4_desc'        => get_post_meta( $post->ID, '_gv_about_vp4_desc', true ) ?: 'We provide transparent sourcing with traceability from origin through the supply chain.',

        // Sourcing 3 Steps
        'gv_about_src1_title'      => get_post_meta( $post->ID, '_gv_about_src1_title', true ) ?: 'Local Product',
        'gv_about_src1_desc'       => get_post_meta( $post->ID, '_gv_about_src1_desc', true ) ?: 'Vanilla sourced from Indonesia and connected to local growing regions.',
        'gv_about_src2_title'      => get_post_meta( $post->ID, '_gv_about_src2_title', true ) ?: 'Trusted Sourcing',
        'gv_about_src2_desc'       => get_post_meta( $post->ID, '_gv_about_src2_desc', true ) ?: 'Working with selected local sources to maintain product quality and consistency.',
        'gv_about_src3_title'      => get_post_meta( $post->ID, '_gv_about_src3_title', true ) ?: 'Quality Selection',
        'gv_about_src3_desc'       => get_post_meta( $post->ID, '_gv_about_src3_desc', true ) ?: 'Products are selected according to buyer requirements and intended applications, ensuring the right quality and specifications for every order.',

        // Export Capability 4 Cards
        'gv_about_exp1_title'      => get_post_meta( $post->ID, '_gv_about_exp1_title', true ) ?: 'Wholesale Supply',
        'gv_about_exp1_desc'       => get_post_meta( $post->ID, '_gv_about_exp1_desc', true ) ?: 'Vanilla products available for wholesale and recurring business requirements.',
        'gv_about_exp2_title'      => get_post_meta( $post->ID, '_gv_about_exp2_title', true ) ?: 'Bulk Orders',
        'gv_about_exp2_desc'       => get_post_meta( $post->ID, '_gv_about_exp2_desc', true ) ?: 'Supporting larger-volume orders for distributors, manufacturers, and other B2B buyers.',
        'gv_about_exp3_title'      => get_post_meta( $post->ID, '_gv_about_exp3_title', true ) ?: 'International Buyers',
        'gv_about_exp3_desc'       => get_post_meta( $post->ID, '_gv_about_exp3_desc', true ) ?: 'Serving importers, distributors, manufacturers, and businesses across global markets.',
        'gv_about_exp4_title'      => get_post_meta( $post->ID, '_gv_about_exp4_title', true ) ?: 'Custom Requirement',
        'gv_about_exp4_desc'       => get_post_meta( $post->ID, '_gv_about_exp4_desc', true ) ?: 'Product options can be discussed based on specific buyer requirements and applications.',

        // Facilities 2 Rows
        'gv_about_fac1_tag'        => get_post_meta( $post->ID, '_gv_about_fac1_tag', true ) ?: 'Warehouse & Storage',
        'gv_about_fac1_title'      => get_post_meta( $post->ID, '_gv_about_fac1_title', true ) ?: 'Controlled Storage Facilities',
        'gv_about_fac1_desc'       => get_post_meta( $post->ID, '_gv_about_fac1_desc', true ) ?: 'Vanilla is stored in controlled conditions to preserve aroma, moisture, and quality.',
        'gv_about_fac2_tag'        => get_post_meta( $post->ID, '_gv_about_fac2_tag', true ) ?: 'Processing & Preparation',
        'gv_about_fac2_title'      => get_post_meta( $post->ID, '_gv_about_fac2_title', true ) ?: 'Careful Handling & Packing',
        'gv_about_fac2_desc'       => get_post_meta( $post->ID, '_gv_about_fac2_desc', true ) ?: 'Sorting, vacuum-packing, and packaging preparation to meet export requirements.',
    );
    ?>
    <div style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; max-width: 1000px;">
        <!-- Section 1: Hero Subtag -->
        <div style="background: #fdfdfd; border: 1px solid #ddd; border-left: 4px solid #363E19; padding: 1.25rem; margin-bottom: 1.5rem; border-radius: 4px;">
            <h3 style="margin: 0 0 1rem 0; font-size: 15px; color: #363E19;">1. Hero Header Subtag</h3>
            <div>
                <label style="font-weight: 600; display: block; margin-bottom: 4px;">Subtag Slogan</label>
                <input type="text" name="gv_about_hero_subtag" value="<?php echo esc_attr( $fields['gv_about_hero_subtag'] ); ?>" style="width: 100%;">
            </div>
        </div>

        <!-- Section 2: Overview & 4 Feature Pills -->
        <div style="background: #fdfdfd; border: 1px solid #ddd; border-left: 4px solid #363E19; padding: 1.25rem; margin-bottom: 1.5rem; border-radius: 4px;">
            <h3 style="margin: 0 0 1rem 0; font-size: 15px; color: #363E19;">2. Company Overview & 4 Feature Boxes</h3>
            <div style="margin-bottom: 1rem;">
                <label style="font-weight: 600; display: block; margin-bottom: 4px;">Heading</label>
                <input type="text" name="gv_about_overview_heading" value="<?php echo esc_attr( $fields['gv_about_overview_heading'] ); ?>" style="width: 100%;">
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Paragraf 1</label>
                    <textarea name="gv_about_overview_p1" rows="4" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_overview_p1'] ); ?></textarea>
                </div>
                <div>
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Paragraf 2</label>
                    <textarea name="gv_about_overview_p2" rows="4" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_overview_p2'] ); ?></textarea>
                </div>
            </div>
            <div style="border-top: 1px solid #eee; padding-top: 1rem;">
                <label style="font-weight: 600; display: block; margin-bottom: 6px;">4 Kotak Fitur / Pillars:</label>
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.75rem;">
                    <input type="text" name="gv_about_overview_f1" value="<?php echo esc_attr( $fields['gv_about_overview_f1'] ); ?>" placeholder="Pillar 1">
                    <input type="text" name="gv_about_overview_f2" value="<?php echo esc_attr( $fields['gv_about_overview_f2'] ); ?>" placeholder="Pillar 2">
                    <input type="text" name="gv_about_overview_f3" value="<?php echo esc_attr( $fields['gv_about_overview_f3'] ); ?>" placeholder="Pillar 3">
                    <input type="text" name="gv_about_overview_f4" value="<?php echo esc_attr( $fields['gv_about_overview_f4'] ); ?>" placeholder="Pillar 4">
                </div>
            </div>
        </div>

        <!-- Section 3: Journey, Story, Vision, Mission -->
        <div style="background: #fdfdfd; border: 1px solid #ddd; border-left: 4px solid #363E19; padding: 1.25rem; margin-bottom: 1.5rem; border-radius: 4px;">
            <h3 style="margin: 0 0 1rem 0; font-size: 15px; color: #363E19;">3. Our Journey, Story, Vision & Mission</h3>
            <div style="margin-bottom: 1rem;">
                <label style="font-weight: 600; display: block; margin-bottom: 4px;">Subjudul Journey</label>
                <textarea name="gv_about_journey_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_journey_desc'] ); ?></textarea>
            </div>
            <div style="margin-bottom: 1rem;">
                <label style="font-weight: 600; display: block; margin-bottom: 4px;">Teks Cerita "Our Story" (Di atas foto fasilitas)</label>
                <textarea name="gv_about_story_text" rows="3" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_story_text'] ); ?></textarea>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div>
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Teks "Our Vision"</label>
                    <textarea name="gv_about_vision_text" rows="3" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_vision_text'] ); ?></textarea>
                </div>
                <div>
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Teks "Our Mission"</label>
                    <textarea name="gv_about_mission_text" rows="3" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_mission_text'] ); ?></textarea>
                </div>
            </div>
        </div>

        <!-- Section 4: 4 Value Propositions -->
        <div style="background: #fdfdfd; border: 1px solid #ddd; border-left: 4px solid #363E19; padding: 1.25rem; margin-bottom: 1.5rem; border-radius: 4px;">
            <h3 style="margin: 0 0 1rem 0; font-size: 15px; color: #363E19;">4. Trusted Partner Value Propositions (4 Cards)</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
                <div style="background: #f4f6f3; padding: 1rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 1: Judul & Deskripsi</label>
                    <input type="text" name="gv_about_vp1_title" value="<?php echo esc_attr( $fields['gv_about_vp1_title'] ); ?>" style="width: 100%; margin-bottom: 6px;">
                    <textarea name="gv_about_vp1_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_vp1_desc'] ); ?></textarea>
                </div>
                <div style="background: #f4f6f3; padding: 1rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 2: Judul & Deskripsi</label>
                    <input type="text" name="gv_about_vp2_title" value="<?php echo esc_attr( $fields['gv_about_vp2_title'] ); ?>" style="width: 100%; margin-bottom: 6px;">
                    <textarea name="gv_about_vp2_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_vp2_desc'] ); ?></textarea>
                </div>
                <div style="background: #f4f6f3; padding: 1rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 3: Judul & Deskripsi</label>
                    <input type="text" name="gv_about_vp3_title" value="<?php echo esc_attr( $fields['gv_about_vp3_title'] ); ?>" style="width: 100%; margin-bottom: 6px;">
                    <textarea name="gv_about_vp3_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_vp3_desc'] ); ?></textarea>
                </div>
                <div style="background: #f4f6f3; padding: 1rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 4: Judul & Deskripsi</label>
                    <input type="text" name="gv_about_vp4_title" value="<?php echo esc_attr( $fields['gv_about_vp4_title'] ); ?>" style="width: 100%; margin-bottom: 6px;">
                    <textarea name="gv_about_vp4_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_vp4_desc'] ); ?></textarea>
                </div>
            </div>
        </div>

        <!-- Section 5: Local Sourcing (3 Steps) -->
        <div style="background: #fdfdfd; border: 1px solid #ddd; border-left: 4px solid #363E19; padding: 1.25rem; margin-bottom: 1.5rem; border-radius: 4px;">
            <h3 style="margin: 0 0 1rem 0; font-size: 15px; color: #363E19;">5. Our Sourcing Process (3 Steps)</h3>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem;">
                <div style="background: #f4f6f3; padding: 0.85rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Step 1</label>
                    <input type="text" name="gv_about_src1_title" value="<?php echo esc_attr( $fields['gv_about_src1_title'] ); ?>" style="width: 100%; margin-bottom: 4px;">
                    <textarea name="gv_about_src1_desc" rows="3" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_src1_desc'] ); ?></textarea>
                </div>
                <div style="background: #f4f6f3; padding: 0.85rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Step 2</label>
                    <input type="text" name="gv_about_src2_title" value="<?php echo esc_attr( $fields['gv_about_src2_title'] ); ?>" style="width: 100%; margin-bottom: 4px;">
                    <textarea name="gv_about_src2_desc" rows="3" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_src2_desc'] ); ?></textarea>
                </div>
                <div style="background: #f4f6f3; padding: 0.85rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Step 3</label>
                    <input type="text" name="gv_about_src3_title" value="<?php echo esc_attr( $fields['gv_about_src3_title'] ); ?>" style="width: 100%; margin-bottom: 4px;">
                    <textarea name="gv_about_src3_desc" rows="3" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_src3_desc'] ); ?></textarea>
                </div>
            </div>
        </div>

        <!-- Section 6: Export Capability (4 Cards) -->
        <div style="background: #fdfdfd; border: 1px solid #ddd; border-left: 4px solid #363E19; padding: 1.25rem; margin-bottom: 1.5rem; border-radius: 4px;">
            <h3 style="margin: 0 0 1rem 0; font-size: 15px; color: #363E19;">6. Export Capability (4 Cards)</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
                <div style="background: #f4f6f3; padding: 1rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 1: Judul & Deskripsi</label>
                    <input type="text" name="gv_about_exp1_title" value="<?php echo esc_attr( $fields['gv_about_exp1_title'] ); ?>" style="width: 100%; margin-bottom: 6px;">
                    <textarea name="gv_about_exp1_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_exp1_desc'] ); ?></textarea>
                </div>
                <div style="background: #f4f6f3; padding: 1rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 2: Judul & Deskripsi</label>
                    <input type="text" name="gv_about_exp2_title" value="<?php echo esc_attr( $fields['gv_about_exp2_title'] ); ?>" style="width: 100%; margin-bottom: 6px;">
                    <textarea name="gv_about_exp2_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_exp2_desc'] ); ?></textarea>
                </div>
                <div style="background: #f4f6f3; padding: 1rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 3: Judul & Deskripsi</label>
                    <input type="text" name="gv_about_exp3_title" value="<?php echo esc_attr( $fields['gv_about_exp3_title'] ); ?>" style="width: 100%; margin-bottom: 6px;">
                    <textarea name="gv_about_exp3_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_exp3_desc'] ); ?></textarea>
                </div>
                <div style="background: #f4f6f3; padding: 1rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Card 4: Judul & Deskripsi</label>
                    <input type="text" name="gv_about_exp4_title" value="<?php echo esc_attr( $fields['gv_about_exp4_title'] ); ?>" style="width: 100%; margin-bottom: 6px;">
                    <textarea name="gv_about_exp4_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_exp4_desc'] ); ?></textarea>
                </div>
            </div>
        </div>

        <!-- Section 7: Facilities (2 Rows) -->
        <div style="background: #fdfdfd; border: 1px solid #ddd; border-left: 4px solid #363E19; padding: 1.25rem; border-radius: 4px;">
            <h3 style="margin: 0 0 1rem 0; font-size: 15px; color: #363E19;">7. Our Facilities (2 Rows)</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
                <div style="background: #f4f6f3; padding: 1rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Fasilitas 1: Tagline</label>
                    <input type="text" name="gv_about_fac1_tag" value="<?php echo esc_attr( $fields['gv_about_fac1_tag'] ); ?>" style="width: 100%; margin-bottom: 6px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Fasilitas 1: Judul</label>
                    <input type="text" name="gv_about_fac1_title" value="<?php echo esc_attr( $fields['gv_about_fac1_title'] ); ?>" style="width: 100%; margin-bottom: 6px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Fasilitas 1: Deskripsi</label>
                    <textarea name="gv_about_fac1_desc" rows="3" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_fac1_desc'] ); ?></textarea>
                </div>
                <div style="background: #f4f6f3; padding: 1rem; border-radius: 4px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Fasilitas 2: Tagline</label>
                    <input type="text" name="gv_about_fac2_tag" value="<?php echo esc_attr( $fields['gv_about_fac2_tag'] ); ?>" style="width: 100%; margin-bottom: 6px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Fasilitas 2: Judul</label>
                    <input type="text" name="gv_about_fac2_title" value="<?php echo esc_attr( $fields['gv_about_fac2_title'] ); ?>" style="width: 100%; margin-bottom: 6px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Fasilitas 2: Deskripsi</label>
                    <textarea name="gv_about_fac2_desc" rows="3" style="width: 100%;"><?php echo esc_textarea( $fields['gv_about_fac2_desc'] ); ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Save Handler for Page Meta Boxes
 */
function grand_vanilla_save_page_meta( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_page', $post_id ) ) {
        return;
    }

    // Save Homepage Meta
    if ( isset( $_POST['grand_vanilla_frontpage_nonce'] ) && wp_verify_nonce( $_POST['grand_vanilla_frontpage_nonce'], 'grand_vanilla_save_frontpage_meta' ) ) {
        $front_fields = array(
            'gv_hero_stat_num', 'gv_hero_stat_label',
            'gv_home_about_heading', 'gv_home_about_p1', 'gv_home_about_p2',
            'gv_home_about_f1', 'gv_home_about_f2', 'gv_home_about_f3', 'gv_home_about_f4',
            'gv_home_vp1_title', 'gv_home_vp1_desc',
            'gv_home_vp2_title', 'gv_home_vp2_desc',
            'gv_home_vp3_title', 'gv_home_vp3_desc',
            'gv_home_vp4_title', 'gv_home_vp4_desc',
            'gv_home_oem_subtitle', 'gv_home_oem_heading', 'gv_home_oem_desc',
            'gv_home_oem_f1_title', 'gv_home_oem_f1_desc',
            'gv_home_oem_f2_title', 'gv_home_oem_f2_desc',
            'gv_home_oem_f3_title', 'gv_home_oem_f3_desc',
            'gv_home_oem_f4_title', 'gv_home_oem_f4_desc',
            'gv_home_serve_1', 'gv_home_serve_2', 'gv_home_serve_3',
            'gv_home_serve_4', 'gv_home_serve_5', 'gv_home_serve_6',
        );

        foreach ( $front_fields as $f ) {
            if ( isset( $_POST[ $f ] ) ) {
                $val = ( strpos( $f, 'desc' ) !== false || strpos( $f, 'p1' ) !== false || strpos( $f, 'p2' ) !== false || strpos( $f, 'subtitle' ) !== false ) 
                    ? sanitize_textarea_field( $_POST[ $f ] ) 
                    : sanitize_text_field( $_POST[ $f ] );
                update_post_meta( $post_id, '_' . $f, $val );
            }
        }
    }

    // Save About Us Meta
    if ( isset( $_POST['grand_vanilla_aboutpage_nonce'] ) && wp_verify_nonce( $_POST['grand_vanilla_aboutpage_nonce'], 'grand_vanilla_save_aboutpage_meta' ) ) {
        $about_fields = array(
            'gv_about_hero_subtag',
            'gv_about_overview_heading', 'gv_about_overview_p1', 'gv_about_overview_p2',
            'gv_about_overview_f1', 'gv_about_overview_f2', 'gv_about_overview_f3', 'gv_about_overview_f4',
            'gv_about_journey_desc', 'gv_about_story_title', 'gv_about_story_text',
            'gv_about_vision_text', 'gv_about_mission_text',
            'gv_about_vp1_title', 'gv_about_vp1_desc',
            'gv_about_vp2_title', 'gv_about_vp2_desc',
            'gv_about_vp3_title', 'gv_about_vp3_desc',
            'gv_about_vp4_title', 'gv_about_vp4_desc',
            'gv_about_src1_title', 'gv_about_src1_desc',
            'gv_about_src2_title', 'gv_about_src2_desc',
            'gv_about_src3_title', 'gv_about_src3_desc',
            'gv_about_exp1_title', 'gv_about_exp1_desc',
            'gv_about_exp2_title', 'gv_about_exp2_desc',
            'gv_about_exp3_title', 'gv_about_exp3_desc',
            'gv_about_exp4_title', 'gv_about_exp4_desc',
            'gv_about_fac1_tag', 'gv_about_fac1_title', 'gv_about_fac1_desc',
            'gv_about_fac2_tag', 'gv_about_fac2_title', 'gv_about_fac2_desc',
        );

        foreach ( $about_fields as $f ) {
            if ( isset( $_POST[ $f ] ) ) {
                $val = ( strpos( $f, 'desc' ) !== false || strpos( $f, 'p1' ) !== false || strpos( $f, 'p2' ) !== false || strpos( $f, 'text' ) !== false ) 
                    ? sanitize_textarea_field( $_POST[ $f ] ) 
                    : sanitize_text_field( $_POST[ $f ] );
                update_post_meta( $post_id, '_' . $f, $val );
            }
        }
    }
}
add_action( 'save_post_page', 'grand_vanilla_save_page_meta' );

