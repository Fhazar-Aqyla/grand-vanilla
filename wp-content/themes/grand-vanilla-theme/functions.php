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
        'menu_name'          => _x( 'Gallery', 'Admin Menu text', 'grand-vanilla' ),
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
            <?php esc_html_e( 'Configure product varieties below (e.g. Vanilla Planifolia Beans, Vanilla Tahitensis Beans, etc.). Buyers can toggle variety tabs to view specific photos, overview, and lab characteristics.', 'grand-vanilla' ); ?>
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
                            Variety #<span class="gv-v-number"><?php echo $v_index + 1; ?></span>: <strong><?php echo esc_html( $v_name ? $v_name : 'New Variety' ); ?></strong>
                        </h4>
                        <button type="button" class="button button-link-delete gv-remove-variety-btn" style="color: #b32d2e;">Delete Variety</button>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                        <div>
                            <label style="font-weight: 600; display: block; margin-bottom: 4px;">Full Variety Name (Tab & Heading)</label>
                            <input type="text" name="gv_varieties[<?php echo $v_index; ?>][name]" value="<?php echo esc_attr( $v_name ); ?>" placeholder="e.g. Vanilla Planifolia Beans" style="width: 100%;">
                        </div>
                        <div>
                            <label style="font-weight: 600; display: block; margin-bottom: 4px;">Short Name (Variety Bullet)</label>
                            <input type="text" name="gv_varieties[<?php echo $v_index; ?>][short_name]" value="<?php echo esc_attr( $v_short_name ); ?>" placeholder="e.g. Vanilla Planifolia" style="width: 100%;">
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="font-weight: 600; display: block; margin-bottom: 4px;">Description / Product Overview</label>
                        <textarea name="gv_varieties[<?php echo $v_index; ?>][overview]" rows="3" style="width: 100%;" placeholder="Detailed overview for this vanilla variety..."><?php echo esc_textarea( $v_overview ); ?></textarea>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="font-weight: 600; display: block; margin-bottom: 4px;">Carousel Photos (1 URL per line)</label>
                        <textarea name="gv_varieties[<?php echo $v_index; ?>][carousel]" rows="3" style="width: 100%;" placeholder="https://domain.com/wp-content/.../image1.png"><?php echo esc_textarea( $v_carousel ); ?></textarea>
                        <button type="button" class="button gv-add-media-btn" style="margin-top: 4px;">+ Choose Photos from Media Library</button>
                    </div>

                    <div style="border-top: 1px solid #ddd; padding-top: 1rem; margin-top: 1rem;">
                        <h5 style="margin: 0 0 0.75rem 0; font-size: 13px; text-transform: uppercase;">Specifications / Product Characteristics:</h5>
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
                + Add New Variety
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
                        Variety #<span class="gv-v-number">${nextIdx + 1}</span>: <strong>New Variety</strong>
                    </h4>
                    <button type="button" class="button button-link-delete gv-remove-variety-btn" style="color: #b32d2e;">Delete Variety</button>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                    <div>
                        <label style="font-weight: 600; display: block; margin-bottom: 4px;">Full Variety Name (Tab & Heading)</label>
                        <input type="text" name="gv_varieties[${nextIdx}][name]" value="" placeholder="e.g. Vanilla Pompona Beans" style="width: 100%;">
                    </div>
                    <div>
                        <label style="font-weight: 600; display: block; margin-bottom: 4px;">Short Name (Variety Bullet)</label>
                        <input type="text" name="gv_varieties[${nextIdx}][short_name]" value="" placeholder="e.g. Vanilla Pompona" style="width: 100%;">
                    </div>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Description / Product Overview</label>
                    <textarea name="gv_varieties[${nextIdx}][overview]" rows="3" style="width: 100%;" placeholder="Detailed overview for this vanilla variety..."></textarea>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="font-weight: 600; display: block; margin-bottom: 4px;">Carousel Photos (1 URL per line)</label>
                    <textarea name="gv_varieties[${nextIdx}][carousel]" rows="3" style="width: 100%;" placeholder="https://domain.com/wp-content/.../image1.png"></textarea>
                    <button type="button" class="button gv-add-media-btn" style="margin-top: 4px;">+ Choose Photos from Media Library</button>
                </div>
                <div style="border-top: 1px solid #ddd; padding-top: 1rem; margin-top: 1rem;">
                    <h5 style="margin: 0 0 0.75rem 0; font-size: 13px; text-transform: uppercase;">Specifications / Product Characteristics:</h5>
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
                if (confirm('Are you sure you want to delete this variety?')) {
                    e.target.closest('.gv-variety-item-card').remove();
                    reindexVarieties();
                }
            }

            if (e.target.classList.contains('gv-add-media-btn')) {
                e.preventDefault();
                const textarea = e.target.closest('div').querySelector('textarea');
                const customUploader = wp.media({
                    title: 'Select Variety Carousel Photos',
                    button: { text: 'Use Selected Photos' },
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
 * 5b. Auto-assign sequential menu_order for new vanilla products
 * Ensures newly added products always append to "Explore More Products" without displacing Top 3 featured items.
 */
function grand_vanilla_auto_assign_product_order( $data, $postarr ) {
    if ( ! isset( $data['post_type'] ) || ! in_array( $data['post_type'], array( 'vanilla_product', 'vanilla_facility' ), true ) ) {
        return $data;
    }

    // Skip auto-drafts and trashed items
    if ( in_array( $data['post_status'], array( 'auto-draft', 'trash' ), true ) ) {
        return $data;
    }

    $post_id = isset( $postarr['ID'] ) ? (int) $postarr['ID'] : 0;

    // If an existing item already has a non-zero menu_order in the database, keep it
    if ( $post_id > 0 ) {
        $existing_order = (int) get_post_field( 'menu_order', $post_id );
        if ( $existing_order > 0 ) {
            if ( isset( $data['menu_order'] ) && (int) $data['menu_order'] > 0 ) {
                return $data;
            }
            $data['menu_order'] = $existing_order;
            return $data;
        }
    }

    // If menu_order is not explicitly set (is 0 or empty), auto-assign to end of catalog / list
    if ( empty( $data['menu_order'] ) || (int) $data['menu_order'] === 0 ) {
        global $wpdb;
        $max_order = (int) $wpdb->get_var( $wpdb->prepare(
            "SELECT MAX(menu_order) FROM {$wpdb->posts} WHERE post_type = %s AND post_status NOT IN ('trash', 'auto-draft') AND ID != %d",
            $data['post_type'],
            $post_id
        ) );

        if ( 'vanilla_product' === $data['post_type'] ) {
            // Minimum order is 4, ensuring it never displaces the Top 3 (#1, #2, #3)
            $data['menu_order'] = max( 3, $max_order ) + 1;
        } else {
            $data['menu_order'] = max( 0, $max_order ) + 1;
        }
    }

    return $data;
}
add_filter( 'wp_insert_post_data', 'grand_vanilla_auto_assign_product_order', 10, 2 );

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
        'label'       => __( 'Primary WhatsApp / Phone Number', 'grand-vanilla' ),
        'description' => __( 'Main contact number displayed in header, contact page, and floating button.', 'grand-vanilla' ),
        'section'     => 'grand_vanilla_options',
        'type'        => 'text',
    ) );

    // Secondary Phone Number (Landline / Office)
    $wp_customize->add_setting( 'gv_phone_secondary', array(
        'default'           => '+621 234 567 82',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'gv_phone_secondary', array(
        'label'       => __( 'Secondary Phone / Office Telp (Optional)', 'grand-vanilla' ),
        'description' => __( 'Displayed under phone number in Contact Us page. Leave empty to hide.', 'grand-vanilla' ),
        'section'     => 'grand_vanilla_options',
        'type'        => 'text',
    ) );

    // Email Address
    $wp_customize->add_setting( 'gv_email', array(
        'default'           => 'nirwanatim@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'gv_email', array(
        'label'       => __( 'Primary Export & Inquiry Email', 'grand-vanilla' ),
        'description' => __( 'Email address displayed on site and recipient for contact form inquiries.', 'grand-vanilla' ),
        'section'     => 'grand_vanilla_options',
        'type'        => 'email',
    ) );

    // Location Address
    $wp_customize->add_setting( 'gv_address', array(
        'default'           => 'Sumbersari 2 Street, Jember, East Java, Indonesia',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'gv_address', array(
        'label'    => __( 'Office / Warehouse Location', 'grand-vanilla' ),
        'section'  => 'grand_vanilla_options',
        'type'     => 'textarea',
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

    // Facebook URL
    $wp_customize->add_setting( 'gv_facebook', array(
        'default'           => 'https://facebook.com',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'gv_facebook', array(
        'label'    => __( 'Facebook Page URL', 'grand-vanilla' ),
        'section'  => 'grand_vanilla_options',
        'type'     => 'url',
    ) );

    // YouTube URL
    $wp_customize->add_setting( 'gv_youtube', array(
        'default'           => 'https://youtube.com',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'gv_youtube', array(
        'label'    => __( 'YouTube Channel URL', 'grand-vanilla' ),
        'section'  => 'grand_vanilla_options',
        'type'     => 'url',
    ) );

    // Google Maps Embed URL Sanitizer (Accepts raw URL or full <iframe src="..."> HTML)
    function grand_vanilla_sanitize_maps_url( $input ) {
        $input = trim( (string) $input );
        if ( preg_match( '/src=["\']([^"\']+)["\']/i', $input, $matches ) ) {
            return esc_url_raw( $matches[1] );
        }
        return esc_url_raw( $input );
    }

    // Google Maps Visibility Toggle
    if ( ! function_exists( 'grand_vanilla_sanitize_checkbox' ) ) {
        function grand_vanilla_sanitize_checkbox( $checked ) {
            return ( ( isset( $checked ) && true == $checked ) ? true : false );
        }
    }

    $wp_customize->add_setting( 'gv_show_map', array(
        'default'           => true,
        'sanitize_callback' => 'grand_vanilla_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'gv_show_map', array(
        'label'       => __( 'Tampilkan Google Maps di Halaman Kontak', 'grand-vanilla' ),
        'description' => __( 'Centang untuk mengaktifkan/menampilkan bagian Google Maps di halaman Kontak. Hapus centang untuk menyembunyikannya (hide).', 'grand-vanilla' ),
        'section'     => 'grand_vanilla_options',
        'type'        => 'checkbox',
    ) );

    // Google Maps Embed URL
    $wp_customize->add_setting( 'gv_maps_embed_url', array(
        'default'           => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d36092.836208309294!2d107.28651792040289!3d-6.262369707513481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e697760017df9ad%3A0x74508c4a886051a4!2sHorizon%20University%20Indonesia!5e1!3m2!1sid!2sid!4v1788419127699!5m2!1sid!2sid',
        'sanitize_callback' => 'grand_vanilla_sanitize_maps_url',
    ) );
    $wp_customize->add_control( 'gv_maps_embed_url', array(
        'label'       => __( 'Google Maps Embed (URL or iframe Code)', 'grand-vanilla' ),
        'description' => __( 'Paste either the Google Maps embed URL (https://www.google.com/maps/embed?...) or the entire iframe code from Google Maps. The system will automatically extract and display it.', 'grand-vanilla' ),
        'section'     => 'grand_vanilla_options',
        'type'        => 'textarea',
    ) );

    // Contact Form Subjects (Dropdown Options)
    $wp_customize->add_setting( 'gv_contact_subjects', array(
        'default'           => "Wholesale Vanilla Beans Inquiry\nVanilla Powder / Extract Quote\nCustom OEM Packaging Request\nPhysical Sample Request",
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'gv_contact_subjects', array(
        'label'       => __( 'Contact Form Subjects (Dropdown Options)', 'grand-vanilla' ),
        'description' => __( 'List each dropdown subject option on a new line.', 'grand-vanilla' ),
        'section'     => 'grand_vanilla_options',
        'type'        => 'textarea',
    ) );

    // Comprehensive Image Controls for All Key Sections & Banners
    $images_to_register = array(
        'gv_hero_image'      => array(
            'label' => __( 'Homepage: Hero Background Image', 'grand-vanilla' ),
            'desc'  => __( 'Background photo for the main hero section on homepage.', 'grand-vanilla' ),
        ),
        'gv_about_image'     => array(
            'label' => __( 'Homepage & About: About Us Photo (Vanilla Beans)', 'grand-vanilla' ),
            'desc'  => __( 'Photo of vanilla beans on burlap in the About Us section.', 'grand-vanilla' ),
        ),
        'gv_oem_image'       => array(
            'label' => __( 'Homepage: Special OEM & Bulk Packaging Photo', 'grand-vanilla' ),
            'desc'  => __( 'Photo of bulk vanilla bundles and boxes in Flexible Vanilla Supply section.', 'grand-vanilla' ),
        ),
        'gv_maps_image'      => array(
            'label' => __( 'Homepage: Worldwide Export Map Graphic', 'grand-vanilla' ),
            'desc'  => __( 'Map illustration for Connecting Indonesia To The World.', 'grand-vanilla' ),
        ),
        'gv_story_image'     => array(
            'label' => __( 'About Page: Our Story Facility Photo', 'grand-vanilla' ),
            'desc'  => __( 'Facility photo with text overlay in Our Journey & Purpose section.', 'grand-vanilla' ),
        ),
        'gv_sourcing_image'  => array(
            'label' => __( 'About Page: Sourcing Plantation Photo', 'grand-vanilla' ),
            'desc'  => __( 'Plantation photo in Sourced From Local Indonesia section.', 'grand-vanilla' ),
        ),
        'gv_hero_about'      => array(
            'label' => __( 'Banner: About Us Page Header', 'grand-vanilla' ),
            'desc'  => __( 'Top banner background image on About Us page (#knowUs).', 'grand-vanilla' ),
        ),
        'gv_hero_products'   => array(
            'label' => __( 'Banner: Products Page Header', 'grand-vanilla' ),
            'desc'  => __( 'Top banner background image on Products page (#exploreProducts).', 'grand-vanilla' ),
        ),
        'gv_hero_gallery'    => array(
            'label' => __( 'Banner: Gallery Page Header', 'grand-vanilla' ),
            'desc'  => __( 'Top banner background image on Gallery page (#ourMoments).', 'grand-vanilla' ),
        ),
        'gv_hero_blog'       => array(
            'label' => __( 'Banner: Blog Page Header', 'grand-vanilla' ),
            'desc'  => __( 'Top banner background image on Blog / Articles page.', 'grand-vanilla' ),
        ),
        'gv_hero_contact'    => array(
            'label' => __( 'Banner: Contact Us Page Header', 'grand-vanilla' ),
            'desc'  => __( 'Top banner background image on Contact Us page (#keepInTouch).', 'grand-vanilla' ),
        ),
        'gv_vp1_icon_img'    => array(
            'label' => __( 'Icon: Quality Focused (Card 1)', 'grand-vanilla' ),
            'desc'  => __( 'Custom icon image/SVG for "Quality Focused" card on About Us page.', 'grand-vanilla' ),
        ),
        'gv_vp2_icon_img'    => array(
            'label' => __( 'Icon: Consistent Supply (Card 2)', 'grand-vanilla' ),
            'desc'  => __( 'Custom icon image/SVG for "Consistent Supply" card on About Us page.', 'grand-vanilla' ),
        ),
        'gv_vp3_icon_img'    => array(
            'label' => __( 'Icon: Indonesian Origin (Card 3)', 'grand-vanilla' ),
            'desc'  => __( 'Custom icon image/SVG for Card 3 on About Us page.', 'grand-vanilla' ),
        ),
        'gv_vp4_icon_img'    => array(
            'label' => __( 'Icon: Reliable Service (Card 4)', 'grand-vanilla' ),
            'desc'  => __( 'Custom icon image/SVG for Card 4 on About Us page.', 'grand-vanilla' ),
        ),
    );

    foreach ( $images_to_register as $key => $conf ) {
        $wp_customize->add_setting( $key, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $key, array(
            'label'       => $conf['label'],
            'description' => $conf['desc'],
            'section'     => 'grand_vanilla_options',
        ) ) );
    }
}
add_action( 'customize_register', 'grand_vanilla_customize_register' );

/**
 * 7. Helper: Get Company Contact Info
 */
function grand_vanilla_get_contact_info() {
    $whatsapp = get_theme_mod( 'gv_whatsapp', '087717752085' );
    $clean_wa = preg_replace( '/[^0-9]/', '', $whatsapp );
    if ( substr( $clean_wa, 0, 1 ) === '0' ) {
        $clean_wa = '62' . substr( $clean_wa, 1 );
    }

    $raw_map = get_theme_mod( 'gv_maps_embed_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d36092.836208309294!2d107.28651792040289!3d-6.262369707513481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e697760017df9ad%3A0x74508c4a886051a4!2sHorizon%20University%20Indonesia!5e1!3m2!1sid!2sid!4v1788419127699!5m2!1sid!2sid' );
    if ( preg_match( '/src=["\']([^"\']+)["\']/i', $raw_map, $matches ) ) {
        $raw_map = $matches[1];
    }

    return array(
        'whatsapp'        => $whatsapp,
        'clean_wa'        => $clean_wa,
        'whatsapp_url'    => 'https://wa.me/' . $clean_wa . '?text=' . rawurlencode('Hello Grand Vanilla Indonesia, I would like to inquire about sourcing your Indonesian vanilla beans for export.'),
        'phone_secondary' => get_theme_mod( 'gv_phone_secondary', '+621 234 567 82' ),
        'email'           => get_theme_mod( 'gv_email', 'nirwanatim@gmail.com' ),
        'address'         => get_theme_mod( 'gv_address', 'Sumbersari 2 Street, Jember, East Java, Indonesia' ),
        'instagram_url'   => get_theme_mod( 'gv_instagram', 'https://instagram.com' ),
        'facebook_url'    => get_theme_mod( 'gv_facebook', 'https://facebook.com' ),
        'youtube_url'     => get_theme_mod( 'gv_youtube', 'https://youtube.com' ),
        'maps_embed_url'  => $raw_map,
        'show_map'        => (bool) get_theme_mod( 'gv_show_map', true ),
        'export_hubs'     => 'Jakarta (CGK) & Bali (DPS), Indonesia',
    );
}

/**
 * 7a-2. Register Meta Box for Contact Page: Toggle Google Maps Visibility in WP-Admin
 */
function grand_vanilla_add_contact_map_meta_box() {
    add_meta_box(
        'gv_contact_map_settings',
        __( 'Pengaturan Google Maps', 'grand-vanilla' ),
        'grand_vanilla_render_contact_map_meta_box',
        'page',
        'side',
        'default'
    );
}
add_action( 'add_meta_boxes', 'grand_vanilla_add_contact_map_meta_box' );

function grand_vanilla_render_contact_map_meta_box( $post ) {
    wp_nonce_field( 'gv_save_contact_map_nonce', 'gv_contact_map_nonce_field' );
    $val = get_post_meta( $post->ID, '_gv_hide_map', true );
    ?>
    <p style="margin-bottom: 0.6rem; font-size: 13px; color: #444;">
        <?php _e( 'Opsi visibilitas peta Google Maps di halaman Kontak:', 'grand-vanilla' ); ?>
    </p>
    <label style="display: flex; align-items: center; gap: 8px; font-size: 13px; cursor: pointer;">
        <input type="checkbox" name="gv_hide_map" value="1" <?php checked( $val, '1' ); ?>>
        <span style="color: #b32d2e; font-weight: 600;"><?php _e( 'Sembunyikan Peta (Hide Map)', 'grand-vanilla' ); ?></span>
    </label>
    <p style="font-size: 11px; color: #777; margin-top: 6px; line-height: 1.4;">
        <?php _e( 'Centang opsi ini jika ingin menyembunyikan/menonaktifkan bagian Google Maps. Jika tidak dicentang, peta akan mengikuti pengaturan tema.', 'grand-vanilla' ); ?>
    </p>
    <?php
}

function grand_vanilla_save_contact_map_meta_box( $post_id ) {
    if ( ! isset( $_POST['gv_contact_map_nonce_field'] ) || ! wp_verify_nonce( $_POST['gv_contact_map_nonce_field'], 'gv_save_contact_map_nonce' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_page', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['gv_hide_map'] ) && '1' === $_POST['gv_hide_map'] ) {
        update_post_meta( $post_id, '_gv_hide_map', '1' );
    } else {
        delete_post_meta( $post_id, '_gv_hide_map' );
    }
}
add_action( 'save_post', 'grand_vanilla_save_contact_map_meta_box' );

/**
 * 7b. Register Custom Post Type: Contact Form Inquiries (B2B Leads)
 */
function grand_vanilla_register_inquiry_cpt() {
    $labels = array(
        'name'               => _x( 'Inquiries', 'post type general name', 'grand-vanilla' ),
        'singular_name'      => _x( 'Inquiry', 'post type singular name', 'grand-vanilla' ),
        'menu_name'          => _x( 'Inquiries', 'admin menu', 'grand-vanilla' ),
        'name_admin_bar'     => _x( 'Inquiry', 'add new on admin bar', 'grand-vanilla' ),
        'edit_item'          => __( 'Inquiry Details', 'grand-vanilla' ),
        'view_item'          => __( 'View Inquiry', 'grand-vanilla' ),
        'all_items'          => __( 'All Inquiries', 'grand-vanilla' ),
        'search_items'       => __( 'Search Inquiries', 'grand-vanilla' ),
        'not_found'          => __( 'No inquiries received yet.', 'grand-vanilla' ),
        'not_found_in_trash' => __( 'No inquiries found in Trash.', 'grand-vanilla' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'capabilities'       => array(
            'create_posts' => 'do_not_allow', // Disable manual creation of inquiries
        ),
        'map_meta_cap'       => true,
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 26,
        'menu_icon'          => 'dashicons-email-alt',
        'supports'           => array( 'title' ),
    );

    register_post_type( 'gv_inquiry', $args );
}
add_action( 'init', 'grand_vanilla_register_inquiry_cpt' );

function grand_vanilla_inquiry_columns( $columns ) {
    return array(
        'cb'              => isset( $columns['cb'] ) ? $columns['cb'] : '<input type="checkbox" />',
        'title'           => __( 'Sender & Subject', 'grand-vanilla' ),
        'sender_name'     => __( 'Sender Name', 'grand-vanilla' ),
        'sender_email'    => __( 'Sender Email', 'grand-vanilla' ),
        'inquiry_message' => __( 'Message Excerpt', 'grand-vanilla' ),
        'date'            => __( 'Date Received', 'grand-vanilla' ),
    );
}
add_filter( 'manage_gv_inquiry_posts_columns', 'grand_vanilla_inquiry_columns' );

function grand_vanilla_inquiry_column_content( $column, $post_id ) {
    switch ( $column ) {
        case 'sender_name':
            echo esc_html( get_post_meta( $post_id, '_inquiry_name', true ) ?: '-' );
            break;
        case 'sender_email':
            $email = get_post_meta( $post_id, '_inquiry_email', true );
            if ( $email ) {
                echo '<a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a>';
            } else {
                echo '-';
            }
            break;
        case 'inquiry_message':
            $msg = get_post_meta( $post_id, '_inquiry_message', true );
            echo esc_html( wp_trim_words( $msg, 12, '...' ) );
            break;
    }
}
add_action( 'manage_gv_inquiry_posts_custom_column', 'grand_vanilla_inquiry_column_content', 10, 2 );

function grand_vanilla_add_inquiry_meta_boxes() {
    add_meta_box(
        'gv_inquiry_details_box',
        __( 'Inquiry Details (Website Lead)', 'grand-vanilla' ),
        'grand_vanilla_inquiry_meta_callback',
        'gv_inquiry',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'grand_vanilla_add_inquiry_meta_boxes' );

function grand_vanilla_inquiry_meta_callback( $post ) {
    $name    = get_post_meta( $post->ID, '_inquiry_name', true );
    $email   = get_post_meta( $post->ID, '_inquiry_email', true );
    $subject = get_post_meta( $post->ID, '_inquiry_subject', true );
    $message = get_post_meta( $post->ID, '_inquiry_message', true );
    $date    = get_the_date( 'F j, Y, H:i', $post->ID );
    ?>
    <table class="form-table" style="max-width: 750px;">
        <tr>
            <th scope="row" style="width: 160px;"><strong><?php esc_html_e( 'Sender Name:', 'grand-vanilla' ); ?></strong></th>
            <td><strong style="font-size: 14px; color: #363E19;"><?php echo esc_html( $name ); ?></strong></td>
        </tr>
        <tr>
            <th scope="row"><strong><?php esc_html_e( 'Sender Email:', 'grand-vanilla' ); ?></strong></th>
            <td>
                <a href="mailto:<?php echo esc_attr( $email ); ?>" class="button button-primary" style="background: #363E19 !important; border-color: #363E19 !important;">
                    ✉️ <?php echo esc_html( $email ); ?> &mdash; Reply via Email
                </a>
            </td>
        </tr>
        <tr>
            <th scope="row"><strong><?php esc_html_e( 'Inquiry Subject:', 'grand-vanilla' ); ?></strong></th>
            <td><?php echo esc_html( $subject ); ?></td>
        </tr>
        <tr>
            <th scope="row"><strong><?php esc_html_e( 'Date Received:', 'grand-vanilla' ); ?></strong></th>
            <td><?php echo esc_html( $date ); ?></td>
        </tr>
        <tr>
            <th scope="row" style="vertical-align: top;"><strong><?php esc_html_e( 'Full Message:', 'grand-vanilla' ); ?></strong></th>
            <td>
                <div style="background: #fdfdfd; border: 1px solid #ccd0d4; padding: 14px 16px; border-radius: 6px; white-space: pre-wrap; font-family: inherit; font-size: 13px; line-height: 1.6; color: #23282d; box-shadow: inset 0 1px 2px rgba(0,0,0,0.04);">
                    <?php echo esc_html( $message ); ?>
                </div>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * 7c. AJAX Handler: Contact Us Form Submission
 */
function grand_vanilla_submit_contact_form() {
    // Check nonce
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'gv_contact_form_nonce' ) ) {
        wp_send_json_error( array( 'message' => __( 'Security check failed. Please refresh the page and try again.', 'grand-vanilla' ) ) );
    }

    // Anti-spam Honeypot Check (Silently drop spam bots)
    if ( ! empty( $_POST['company_website_hp'] ) ) {
        wp_send_json_success( array( 'message' => __( 'Your inquiry has been received.', 'grand-vanilla' ) ) );
    }

    $name    = isset( $_POST['fullname'] ) ? sanitize_text_field( wp_unslash( $_POST['fullname'] ) ) : '';
    $email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $subject = isset( $_POST['subject'] ) ? sanitize_text_field( wp_unslash( $_POST['subject'] ) ) : '';
    $message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

    if ( empty( $name ) || empty( $email ) || ! is_email( $email ) || empty( $message ) ) {
        wp_send_json_error( array( 'message' => __( 'Please fill in all required fields with a valid email address.', 'grand-vanilla' ) ) );
    }

    // 1. Save into WordPress Database as gv_inquiry
    $post_title = sprintf( '[%s] %s', $subject ?: 'Inquiry', $name );
    $inquiry_id = wp_insert_post( array(
        'post_type'    => 'gv_inquiry',
        'post_status'  => 'publish',
        'post_title'   => $post_title,
        'post_content' => $message,
    ) );

    if ( $inquiry_id && ! is_wp_error( $inquiry_id ) ) {
        update_post_meta( $inquiry_id, '_inquiry_name', $name );
        update_post_meta( $inquiry_id, '_inquiry_email', $email );
        update_post_meta( $inquiry_id, '_inquiry_subject', $subject );
        update_post_meta( $inquiry_id, '_inquiry_message', $message );
    }

    // 2. Determine recipient email from Customizer (default nirwanatim@gmail.com)
    $contact = grand_vanilla_get_contact_info();
    $to      = ! empty( $contact['email'] ) ? $contact['email'] : 'nirwanatim@gmail.com';

    // 3. Prepare Email
    $site_name    = get_bloginfo( 'name' );
    $mail_subject = sprintf( '[%s Inquiry] %s - from %s', $site_name, $subject, $name );

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . $site_name . ' <noreply@' . ( isset( $_SERVER['SERVER_NAME'] ) ? sanitize_text_field( wp_unslash( $_SERVER['SERVER_NAME'] ) ) : 'grandvanilla.id' ) . '>',
        'Reply-To: ' . $name . ' <' . $email . '>',
    );

    $body  = '<html><body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">';
    $body .= '<div style="background-color: #363E19; color: #fff; padding: 18px 24px; border-radius: 6px 6px 0 0;">';
    $body .= '<h2 style="margin: 0; font-size: 20px; font-weight: 500;">New B2B Inquiry Received</h2>';
    $body .= '<p style="margin: 4px 0 0 0; font-size: 13px; opacity: 0.85;">Grand Vanilla Indonesia Export Desk</p>';
    $body .= '</div>';
    $body .= '<div style="border: 1px solid #e2e2dd; border-top: none; padding: 24px; border-radius: 0 0 6px 6px; background: #FAF8F5;">';
    $body .= '<p style="margin-top: 0;"><strong>Sender Name:</strong> ' . esc_html( $name ) . '</p>';
    $body .= '<p><strong>Contact Email:</strong> <a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a></p>';
    $body .= '<p><strong>Subject:</strong> ' . esc_html( $subject ) . '</p>';
    $body .= '<p><strong>Message:</strong></p>';
    $body .= '<div style="background: #fff; border: 1px solid #ddd; padding: 14px; border-radius: 4px; white-space: pre-wrap;">' . esc_html( $message ) . '</div>';
    $body .= '<hr style="border: none; border-top: 1px solid #e0e0e0; margin: 24px 0 16px;">';
    $body .= '<p style="font-size: 12px; color: #777; margin: 0;">This inquiry was submitted from the Grand Vanilla Indonesia website contact form.</p>';
    $body .= '</div>';
    $body .= '</body></html>';

    // Hook timeout on phpmailer so local environments don't hang if SMTP is offline
    add_action( 'phpmailer_init', 'grand_vanilla_phpmailer_timeout', 10, 1 );

    // Attempt to send email via wp_mail
    @wp_mail( $to, $mail_subject, $body, $headers );

    remove_action( 'phpmailer_init', 'grand_vanilla_phpmailer_timeout', 10 );

    // Build WhatsApp URL if client wants to follow up via WA
    $wa_text = "Hello Grand Vanilla Indonesia,\n\n" .
               "*New Export Quotation Request*\n" .
               "• Name: "    . $name    . "\n" .
               "• Email: "   . $email   . "\n" .
               "• Subject: " . $subject . "\n" .
               "• Details: " . $message;
    $wa_url  = 'https://wa.me/' . $contact['clean_wa'] . '?text=' . rawurlencode( $wa_text );

    wp_send_json_success( array(
        'message'      => sprintf( __( 'Thank you, %s! Your inquiry has been sent to our export team (%s). We will review and respond promptly.', 'grand-vanilla' ), esc_html( $name ), esc_html( $to ) ),
        'whatsapp_url' => $wa_url,
    ) );
}
add_action( 'wp_ajax_gv_submit_contact_form', 'grand_vanilla_submit_contact_form' );
add_action( 'wp_ajax_nopriv_gv_submit_contact_form', 'grand_vanilla_submit_contact_form' );

function grand_vanilla_phpmailer_timeout( $phpmailer ) {
    $phpmailer->Timeout = 3;
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

/**
 * ============================================================================
 * 9. ADVANCED SEO & SCHEMA.ORG STRUCTURED DATA ENGINE
 * ============================================================================
 */

/**
 * Dynamic Document Titles for Maximum SEO & Click-Through-Rate
 */
function grand_vanilla_custom_document_title( $title ) {
    $site_name = 'Grand Vanilla Indonesia';
    $tagline   = 'Premium Indonesian Vanilla Supplier & Exporter';

    if ( is_front_page() ) {
        return "{$site_name} | {$tagline}";
    } elseif ( is_post_type_archive( 'vanilla_product' ) || is_page( 'products' ) ) {
        return "Indonesian Vanilla Products & Wholesale Catalog | {$site_name}";
    } elseif ( is_singular( 'vanilla_product' ) ) {
        $prod_title = get_the_title();
        return "{$prod_title} — Wholesale & B2B Export | {$site_name}";
    } elseif ( is_page( 'about' ) ) {
        return "About Us — Sustainable Sourcing & Curing Facilities | {$site_name}";
    } elseif ( is_page( 'gallery' ) ) {
        return "Curing & Production Gallery | {$site_name}";
    } elseif ( is_page( 'contact' ) ) {
        return "Contact & B2B Export Inquiry | {$site_name}";
    } elseif ( is_home() || is_archive() ) {
        return "Vanilla Industry Insights & Articles | {$site_name}";
    } elseif ( is_singular( 'post' ) ) {
        $post_title = get_the_title();
        return "{$post_title} | {$site_name}";
    }

    return $title;
}
add_filter( 'pre_get_document_title', 'grand_vanilla_custom_document_title', 20 );

/**
 * Output Essential SEO Meta Tags, Canonical Links, Open Graph & Twitter Cards
 */
function grand_vanilla_seo_meta_tags() {
    $site_name    = 'Grand Vanilla Indonesia';
    $site_url     = home_url( '/' );
    $default_desc = 'Grand Vanilla Indonesia is a trusted Indonesian vanilla supplier and exporter, supplying gourmet vanilla beans, powder, and extract for international wholesale and B2B buyers.';
    $default_img  = get_template_directory_uri() . '/assets/images/Product Unggulan 1.png';
    $og_type      = 'website';
    $canonical    = home_url( add_query_arg( array(), $GLOBALS['wp']->request ) );
    
    // Determine page-specific meta
    if ( is_front_page() ) {
        $title = "{$site_name} | Premium Indonesian Vanilla Supplier & Exporter";
        $desc  = $default_desc;
        $img   = $default_img;
        $canonical = $site_url;
    } elseif ( is_post_type_archive( 'vanilla_product' ) || is_page( 'products' ) ) {
        $title = "Indonesian Vanilla Products Catalog | {$site_name}";
        $desc  = "Explore our premium Indonesian vanilla products: Gourmet Vanilla Beans (Planifolia & Tahitensis), Vanilla Powder, and Pure Vanilla Extract for global export.";
        $img   = get_template_directory_uri() . '/assets/images/Product Unggulan 1.png';
        $canonical = home_url( '/products/' );
    } elseif ( is_singular( 'vanilla_product' ) ) {
        global $post;
        $title = get_the_title() . " — Indonesian Vanilla Wholesale | {$site_name}";
        $excerpt = get_the_excerpt( $post );
        $desc  = ! empty( $excerpt ) ? esc_attr( wp_strip_all_tags( $excerpt ) ) : "Premium quality {$post->post_title} supplied by Grand Vanilla Indonesia for international B2B and wholesale export.";
        $img   = has_post_thumbnail( $post->ID ) ? get_the_post_thumbnail_url( $post->ID, 'full' ) : $default_img;
        $og_type = 'product';
        $canonical = get_permalink( $post->ID );
    } elseif ( is_page( 'about' ) ) {
        $title = "About Us — Sustainable Sourcing & Modern Facilities | {$site_name}";
        $desc  = "Discover Grand Vanilla Indonesia: direct ethical farmer sourcing, state-of-the-art curing facilities, and reliable supply chain for global vanilla buyers.";
        $img   = get_template_directory_uri() . '/assets/images/Warehouse.png';
        $canonical = home_url( '/about/' );
    } elseif ( is_page( 'gallery' ) ) {
        $title = "Curing & Production Gallery | {$site_name}";
        $desc  = "Explore our visual journey of sustainable Indonesian vanilla harvesting, traditional sun-curing, sorting, and export-grade preparation.";
        $img   = get_template_directory_uri() . '/assets/images/Harvest.png';
        $canonical = home_url( '/gallery/' );
    } elseif ( is_page( 'contact' ) ) {
        $title = "Contact & Wholesale Inquiry | {$site_name}";
        $desc  = "Connect with Grand Vanilla Indonesia for international vanilla export inquiries, custom OEM packaging, volume pricing, and sample requests.";
        $img   = $default_img;
        $canonical = home_url( '/contact/' );
    } elseif ( is_singular( 'post' ) ) {
        global $post;
        $title = get_the_title() . " | {$site_name}";
        $excerpt = get_the_excerpt( $post );
        $desc  = ! empty( $excerpt ) ? esc_attr( wp_strip_all_tags( $excerpt ) ) : wp_trim_words( wp_strip_all_tags( $post->post_content ), 25 );
        $img   = has_post_thumbnail( $post->ID ) ? get_the_post_thumbnail_url( $post->ID, 'full' ) : $default_img;
        $og_type = 'article';
        $canonical = get_permalink( $post->ID );
    } elseif ( is_home() || is_archive() ) {
        $title = "Vanilla Industry Insights & News | {$site_name}";
        $desc  = "Read the latest news, market trends, and vanilla harvesting insights from Grand Vanilla Indonesia.";
        $img   = $default_img;
        $canonical = home_url( '/articles/' );
    } else {
        $title = wp_get_document_title();
        $desc  = $default_desc;
        $img   = $default_img;
    }
    ?>
    <!-- SEO Primary Meta Tags -->
    <meta name="description" content="<?php echo esc_attr( $desc ); ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="<?php echo esc_url( $canonical ); ?>">
    <meta name="author" content="Grand Vanilla Indonesia">
    <meta name="publisher" content="Grand Vanilla Indonesia">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="<?php echo esc_attr( $og_type ); ?>">
    <meta property="og:url" content="<?php echo esc_url( $canonical ); ?>">
    <meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $desc ); ?>">
    <meta property="og:image" content="<?php echo esc_url( $img ); ?>">
    <meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo esc_url( $canonical ); ?>">
    <meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr( $desc ); ?>">
    <meta name="twitter:image" content="<?php echo esc_url( $img ); ?>">
    <?php
}
add_action( 'wp_head', 'grand_vanilla_seo_meta_tags', 1 );

/**
 * Output Comprehensive Schema.org JSON-LD Structured Data
 */
function grand_vanilla_schema_jsonld() {
    $site_url  = home_url( '/' );
    $logo_url  = get_template_directory_uri() . '/assets/images/Logo with text.png';
    $wa_number = '+6287717752085';

    // 1. Corporation / Organization Schema
    $org_schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Corporation',
        'name'        => 'Grand Vanilla Indonesia',
        'alternateName' => 'Grand Vanilla ID',
        'url'         => $site_url,
        'logo'        => $logo_url,
        'description' => 'Indonesian vanilla supplier and exporter delivering gourmet vanilla beans, vanilla powder, and pure vanilla extract for international wholesale and B2B buyers.',
        'address'     => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Jl. Dr. Saharjo No. 123, Tebet',
            'addressLocality' => 'Jakarta Selatan',
            'addressRegion'   => 'DKI Jakarta',
            'postalCode'      => '12810',
            'addressCountry'  => 'ID',
        ),
        'contactPoint' => array(
            '@type'             => 'ContactPoint',
            'telephone'         => $wa_number,
            'contactType'       => 'sales',
            'areaServed'        => 'Worldwide',
            'availableLanguage' => array( 'English', 'Indonesian' ),
        ),
        'sameAs' => array(
            'https://www.instagram.com/grandvanilla.id',
            'https://www.linkedin.com/company/grand-vanilla-indonesia',
        ),
    );

    // 2. WebSite Schema with SearchAction
    $website_schema = array(
        '@context' => 'https://schema.org',
        '@type'    => 'WebSite',
        'name'     => 'Grand Vanilla Indonesia',
        'url'      => $site_url,
        'potentialAction' => array(
            '@type'       => 'SearchAction',
            'target'      => home_url( '/?s={search_term_string}' ),
            'query-input' => 'required name=search_term_string',
        ),
    );

    // Output Global Organization and WebSite schemas
    echo "\n<!-- Schema.org Structured Data (JSON-LD) -->\n";
    echo '<script type="application/ld+json">' . wp_json_encode( $org_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . "</script>\n";
    echo '<script type="application/ld+json">' . wp_json_encode( $website_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . "</script>\n";

    // 3. BreadcrumbList Schema
    $breadcrumbs = array(
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => array(
            array(
                '@type'    => 'ListItem',
                'position' => 1,
                'name'     => 'Home',
                'item'     => $site_url,
            ),
        ),
    );

    if ( is_post_type_archive( 'vanilla_product' ) || is_page( 'products' ) ) {
        $breadcrumbs['itemListElement'][] = array(
            '@type'    => 'ListItem',
            'position' => 2,
            'name'     => 'Products',
            'item'     => home_url( '/products/' ),
        );
        echo '<script type="application/ld+json">' . wp_json_encode( $breadcrumbs, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . "</script>\n";
    } elseif ( is_singular( 'vanilla_product' ) ) {
        global $post;
        $breadcrumbs['itemListElement'][] = array(
            '@type'    => 'ListItem',
            'position' => 2,
            'name'     => 'Products',
            'item'     => home_url( '/products/' ),
        );
        $breadcrumbs['itemListElement'][] = array(
            '@type'    => 'ListItem',
            'position' => 3,
            'name'     => get_the_title( $post->ID ),
            'item'     => get_permalink( $post->ID ),
        );
        echo '<script type="application/ld+json">' . wp_json_encode( $breadcrumbs, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . "</script>\n";

        // 4. Product Schema on Single Product Detail Pages
        $prod_image = has_post_thumbnail( $post->ID ) ? get_the_post_thumbnail_url( $post->ID, 'full' ) : get_template_directory_uri() . '/assets/images/Product Unggulan 1.png';
        $moisture   = get_post_meta( $post->ID, '_gv_spec_moisture', true ) ?: '25% - 35%';
        $vanillin   = get_post_meta( $post->ID, '_gv_spec_vanillin', true ) ?: '1.8% - 2.4%';

        $product_schema = array(
            '@context'    => 'https://schema.org/',
            '@type'       => 'Product',
            'name'        => get_the_title( $post->ID ),
            'image'       => array( $prod_image ),
            'description' => get_the_excerpt( $post->ID ) ?: "Indonesian gourmet {$post->post_title} with {$vanillin} vanillin content and {$moisture} moisture level.",
            'brand'       => array(
                '@type' => 'Brand',
                'name'  => 'Grand Vanilla Indonesia',
            ),
            'countryOfOrigin' => array(
                '@type' => 'Country',
                'name'  => 'Indonesia',
            ),
            'offers' => array(
                '@type'         => 'Offer',
                'url'           => get_permalink( $post->ID ),
                'priceCurrency' => 'USD',
                'price'         => 'Contact for B2B Quotation',
                'availability'  => 'https://schema.org/InStock',
                'itemCondition' => 'https://schema.org/NewCondition',
                'seller'        => array(
                    '@type' => 'Organization',
                    'name'  => 'Grand Vanilla Indonesia',
                ),
            ),
        );
        echo '<script type="application/ld+json">' . wp_json_encode( $product_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . "</script>\n";
    } elseif ( is_page( 'about' ) ) {
        $breadcrumbs['itemListElement'][] = array(
            '@type'    => 'ListItem',
            'position' => 2,
            'name'     => 'About Us',
            'item'     => home_url( '/about/' ),
        );
        echo '<script type="application/ld+json">' . wp_json_encode( $breadcrumbs, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . "</script>\n";
    } elseif ( is_page( 'gallery' ) ) {
        $breadcrumbs['itemListElement'][] = array(
            '@type'    => 'ListItem',
            'position' => 2,
            'name'     => 'Gallery',
            'item'     => home_url( '/gallery/' ),
        );
        echo '<script type="application/ld+json">' . wp_json_encode( $breadcrumbs, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . "</script>\n";
    } elseif ( is_page( 'contact' ) ) {
        $breadcrumbs['itemListElement'][] = array(
            '@type'    => 'ListItem',
            'position' => 2,
            'name'     => 'Contact Us',
            'item'     => home_url( '/contact/' ),
        );
        echo '<script type="application/ld+json">' . wp_json_encode( $breadcrumbs, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . "</script>\n";
    }
}
add_action( 'wp_head', 'grand_vanilla_schema_jsonld', 2 );

/**
 * PageSpeed & Core Web Vitals Optimization: Auto-inject loading="lazy" & decoding="async"
 */
function grand_vanilla_optimize_image_attributes( $attr, $attachment, $size ) {
    if ( ! is_admin() ) {
        if ( empty( $attr['loading'] ) ) {
            $attr['loading'] = 'lazy';
        }
        if ( empty( $attr['decoding'] ) ) {
            $attr['decoding'] = 'async';
        }
    }
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'grand_vanilla_optimize_image_attributes', 10, 3 );

/**
 * 10. White-Label & Custom Branding for Grand Vanilla WP Admin
 */

// A. Custom Login Page Branding
function grand_vanilla_custom_login_style() {
    $logo_url = get_template_directory_uri() . '/assets/images/Logo with text.png';
    ?>
    <style type="text/css">
        body.login {
            background-color: #FAF8F5;
            background-image: radial-gradient(#E1E2DD 1px, transparent 1px);
            background-size: 24px 24px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            color: #363E19;
        }
        #login h1 a, .login h1 a {
            background-image: url('<?php echo esc_url( $logo_url ); ?>') !important;
            height: 64px !important;
            width: 260px !important;
            background-size: contain !important;
            background-repeat: no-repeat !important;
            background-position: center bottom !important;
            margin-bottom: 24px !important;
            padding-bottom: 0 !important;
        }
        .login form {
            background: #FFFFFF !important;
            border: 1px solid #E1E2DD !important;
            border-radius: 8px !important;
            box-shadow: 0 10px 30px rgba(54, 62, 25, 0.08) !important;
            padding: 30px 26px !important;
        }
        .login label {
            font-size: 13px;
            font-weight: 500;
            color: #363E19;
        }
        .login input[type="text"],
        .login input[type="password"] {
            border: 1px solid #D5D7CE !important;
            border-radius: 4px !important;
            padding: 8px 12px !important;
            font-size: 14px !important;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .login input[type="text"]:focus,
        .login input[type="password"]:focus {
            border-color: #363E19 !important;
            box-shadow: 0 0 0 2px rgba(54, 62, 25, 0.15) !important;
        }
        .wp-core-ui .button-primary {
            background: #363E19 !important;
            border-color: #363E19 !important;
            color: #FFFFFF !important;
            border-radius: 4px !important;
            font-weight: 600 !important;
            padding: 6px 18px !important;
            box-shadow: 0 2px 6px rgba(54, 62, 25, 0.2) !important;
            transition: background 0.2s, transform 0.1s !important;
        }
        .wp-core-ui .button-primary:hover,
        .wp-core-ui .button-primary:focus {
            background: #1F240E !important;
            border-color: #1F240E !important;
        }
        .login #nav a, .login #backtoblog a {
            color: #5C6246 !important;
            font-size: 13px;
        }
        .login #nav a:hover, .login #backtoblog a:hover {
            color: #363E19 !important;
        }
    </style>
    <?php
}
add_action( 'login_enqueue_scripts', 'grand_vanilla_custom_login_style' );

function grand_vanilla_login_logo_url() {
    return home_url( '/' );
}
add_filter( 'login_headerurl', 'grand_vanilla_login_logo_url' );

function grand_vanilla_login_logo_title() {
    return get_bloginfo( 'name' ) . ' Portal Admin';
}
add_filter( 'login_headertext', 'grand_vanilla_login_logo_title' );

// B. Custom Top-Level Sidebar Menu Shortcut: "Theme Settings"
function grand_vanilla_add_settings_menu() {
    add_menu_page(
        __( 'Grand Vanilla Settings', 'grand-vanilla' ),
        __( 'Theme Settings', 'grand-vanilla' ),
        'manage_options',
        'customize.php?autofocus[section]=grand_vanilla_options',
        '',
        'dashicons-admin-settings',
        25
    );
}
add_action( 'admin_menu', 'grand_vanilla_add_settings_menu' );

// C. Custom Dashboard Welcome Banner (Prominent at the Very Top of Dashboard)
function grand_vanilla_custom_dashboard_banner() {
    $screen = get_current_screen();
    if ( ! $screen || 'dashboard' !== $screen->id ) {
        return;
    }

    $logo_url = get_template_directory_uri() . '/assets/images/Logo with text.png';
    ?>
    <div class="gv-admin-welcome-card" style="padding: 24px 28px; background: #FAF8F5; border: 1px solid #E1E2DD; border-radius: 8px; margin: 16px 0 24px 0; box-shadow: 0 4px 15px rgba(54,62,25,0.04);">
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; margin-bottom: 20px; padding-bottom: 16px; border-bottom: 1px solid #E1E2DD;">
            <div style="display: flex; align-items: center; gap: 16px;">
                <img src="<?php echo esc_url( $logo_url ); ?>" alt="Grand Vanilla Indonesia" style="height: 40px; width: auto; object-fit: contain;">
                <div>
                    <h2 style="margin: 0; font-size: 19px; color: #363E19; font-weight: 600; line-height: 1.2;">Grand Vanilla Indonesia Management Portal</h2>
                    <p style="margin: 4px 0 0 0; font-size: 13px; color: #5C6246;">Centralized management for the official export catalog, curing gallery, facilities, and international buyer inquiries.</p>
                </div>
            </div>
            <div>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" rel="noopener noreferrer" class="button button-secondary" style="font-size: 12px; padding: 4px 14px; height: auto;">
                    View Website &rarr;
                </a>
            </div>
        </div>

        <h4 style="margin: 0 0 12px 0; font-size: 11px; color: #363E19; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 600;">Quick Access Navigation:</h4>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 10px;">
            <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=gv_inquiry' ) ); ?>" class="button button-secondary" style="padding: 8px 14px; text-align: center; height: auto; font-size: 13px; border-radius: 4px;">
                Buyer Inquiries
            </a>
            <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=vanilla_product' ) ); ?>" class="button button-secondary" style="padding: 8px 14px; text-align: center; height: auto; font-size: 13px; border-radius: 4px;">
                Add Vanilla Product
            </a>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=grand_vanilla_options' ) ); ?>" class="button button-secondary" style="padding: 8px 14px; text-align: center; height: auto; font-size: 13px; border-radius: 4px;">
                Contact & Social Info
            </a>
            <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=vanilla_gallery' ) ); ?>" class="button button-secondary" style="padding: 8px 14px; text-align: center; height: auto; font-size: 13px; border-radius: 4px;">
                Harvest & Curing Gallery
            </a>
            <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=vanilla_facility' ) ); ?>" class="button button-secondary" style="padding: 8px 14px; text-align: center; height: auto; font-size: 13px; border-radius: 4px;">
                Warehouse Facilities
            </a>
            <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" class="button button-secondary" style="padding: 8px 14px; text-align: center; height: auto; font-size: 13px; border-radius: 4px;">
                Write New Article
            </a>
        </div>
    </div>
    <?php
}
add_action( 'admin_notices', 'grand_vanilla_custom_dashboard_banner' );

// Clean up default clutter widgets
function grand_vanilla_cleanup_dashboard() {
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
    remove_meta_box( 'rank_math_dashboard_widget', 'dashboard', 'side' );
    remove_meta_box( 'rank_math_dashboard_widget', 'dashboard', 'normal' );
}
add_action( 'wp_dashboard_setup', 'grand_vanilla_cleanup_dashboard' );

// Hide default black welcome panel box, third-party notice clutter on Dashboard, and add section titles in Sidebar
function grand_vanilla_custom_admin_styles() {
    ?>
    <style type="text/css">
        #welcome-panel { display: none !important; }

        /* Hide third-party notice clutter across Admin */
        .index-php .wrap > .notice:not(.gv-notice),
        .index-php .wrap > div.updated:not(.gv-notice),
        .index-php .wrap > div.error:not(.gv-notice),
        div.notice[class*="rank-math"],
        div.notice:has(a[href*="rank-math"]) {
            display: none !important;
        }

        /* Prevent sidebar labels from breaking onto two lines */
        #adminmenu .wp-menu-name {
            white-space: nowrap;
        }

        /* Completely eliminate submenu flyout popup for Inquiries */
        #adminmenu #menu-posts-gv_inquiry .wp-submenu,
        #adminmenu #menu-posts-gv_inquiry.wp-has-current-submenu .wp-submenu {
            display: none !important;
        }

        /* Hide "Add New" button on Inquiries list page */
        .post-type-gv_inquiry .page-title-action {
            display: none !important;
        }

        /* Sidebar Section Labels for clean visual categorization */
        #adminmenu #menu-posts-gv_inquiry::before {
            content: "WEBSITE CONTENT";
            display: block;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.12em;
            color: #8c8f94;
            padding: 14px 12px 6px 12px;
            text-transform: uppercase;
            border-top: 1px solid rgba(255,255,255,0.06);
            margin-top: 6px;
        }

        #adminmenu #menu-media::before {
            content: "SYSTEM & SETTINGS";
            display: block;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.12em;
            color: #8c8f94;
            padding: 14px 12px 6px 12px;
            text-transform: uppercase;
            border-top: 1px solid rgba(255,255,255,0.06);
            margin-top: 6px;
        }

        /* Hide section labels if sidebar is collapsed/folded */
        .folded #adminmenu #menu-posts-gv_inquiry::before,
        .folded #adminmenu #menu-media::before {
            display: none !important;
        }
    </style>
    <?php
}
add_action( 'admin_head', 'grand_vanilla_custom_admin_styles' );

// D. Custom Admin Footer Text
function grand_vanilla_custom_admin_footer() {
    echo '<span id="footer-thankyou"><strong>Grand Vanilla Indonesia</strong> &bull; B2B Export Management System</span>';
}
add_filter( 'admin_footer_text', 'grand_vanilla_custom_admin_footer' );

// E. Organize & Streamline Admin Sidebar Menu for Client Clarity (Full English)
function grand_vanilla_simplify_admin_menu() {
    global $menu, $submenu;

    // 1. Remove Comments menu (not needed for B2B export website)
    remove_menu_page( 'edit-comments.php' );

    // 2. Remove submenus for 'gv_inquiry' so NO flyout popup appears on hover
    remove_submenu_page( 'edit.php?post_type=gv_inquiry', 'edit.php?post_type=gv_inquiry' );
    remove_submenu_page( 'edit.php?post_type=gv_inquiry', 'post-new.php?post_type=gv_inquiry' );

    // 3. Inquiry count badge
    $inquiry_count = 0;
    if ( post_type_exists( 'gv_inquiry' ) ) {
        $counts = wp_count_posts( 'gv_inquiry' );
        $inquiry_count = isset( $counts->publish ) ? (int) $counts->publish : 0;
    }
    $badge = $inquiry_count > 0 ? sprintf( ' <span class="update-plugins count-%1$d" style="background:#d63638;color:#fff;border-radius:10px;padding:2px 7px;font-size:10px;font-weight:700;float:right;margin-top:2px;margin-right:8px;"><span class="plugin-count">%1$d</span></span>', $inquiry_count ) : '';

    // 4. Rename top-level menu items to clean, single-line professional English
    foreach ( $menu as $key => $item ) {
        if ( isset( $item[2] ) ) {
            // Inquiries
            if ( 'edit.php?post_type=gv_inquiry' === $item[2] ) {
                $menu[$key][0] = __( 'Inquiries', 'grand-vanilla' ) . $badge;
            }
            // Products
            if ( 'edit.php?post_type=vanilla_product' === $item[2] ) {
                $menu[$key][0] = __( 'Vanilla Products', 'grand-vanilla' );
            }
            // Gallery
            if ( 'edit.php?post_type=vanilla_gallery' === $item[2] ) {
                $menu[$key][0] = __( 'Gallery', 'grand-vanilla' );
            }
            // Facilities
            if ( 'edit.php?post_type=vanilla_facility' === $item[2] ) {
                $menu[$key][0] = __( 'Facilities', 'grand-vanilla' );
            }
            // Pages
            if ( 'edit.php?post_type=page' === $item[2] ) {
                $menu[$key][0] = __( 'Pages', 'grand-vanilla' );
            }
            // Posts -> Articles & Blog
            if ( 'edit.php' === $item[2] ) {
                $menu[$key][0] = __( 'Articles & Blog', 'grand-vanilla' );
                $menu[$key][6] = 'dashicons-welcome-write-blog';
            }
            // Theme Settings
            if ( 'customize.php?autofocus[section]=grand_vanilla_options' === $item[2] ) {
                $menu[$key][0] = __( 'Theme Settings', 'grand-vanilla' );
            }
        }
    }

    // 5. Polish Submenus into clean English
    // Vanilla Products
    if ( isset( $submenu['edit.php?post_type=vanilla_product'] ) ) {
        $submenu['edit.php?post_type=vanilla_product'][5][0]  = __( 'All Products', 'grand-vanilla' );
        $submenu['edit.php?post_type=vanilla_product'][10][0] = __( 'Add New Product', 'grand-vanilla' );
        if ( isset( $submenu['edit.php?post_type=vanilla_product'][15] ) ) {
            $submenu['edit.php?post_type=vanilla_product'][15][0] = __( 'Product Categories', 'grand-vanilla' );
        }
    }

    // Gallery
    if ( isset( $submenu['edit.php?post_type=vanilla_gallery'] ) ) {
        $submenu['edit.php?post_type=vanilla_gallery'][5][0]  = __( 'All Gallery Items', 'grand-vanilla' );
        $submenu['edit.php?post_type=vanilla_gallery'][10][0] = __( 'Add New Photo', 'grand-vanilla' );
        if ( isset( $submenu['edit.php?post_type=vanilla_gallery'][15] ) ) {
            $submenu['edit.php?post_type=vanilla_gallery'][15][0] = __( 'Categories', 'grand-vanilla' );
        }
    }

    // Facilities
    if ( isset( $submenu['edit.php?post_type=vanilla_facility'] ) ) {
        $submenu['edit.php?post_type=vanilla_facility'][5][0]  = __( 'All Facilities', 'grand-vanilla' );
        $submenu['edit.php?post_type=vanilla_facility'][10][0] = __( 'Add New Facility', 'grand-vanilla' );
    }

    // Pages
    if ( isset( $submenu['edit.php?post_type=page'] ) ) {
        $submenu['edit.php?post_type=page'][5][0]  = __( 'All Pages', 'grand-vanilla' );
        $submenu['edit.php?post_type=page'][10][0] = __( 'Add New Page', 'grand-vanilla' );
    }

    // Articles & Blog
    if ( isset( $submenu['edit.php'] ) ) {
        $submenu['edit.php'][5][0]  = __( 'All Articles', 'grand-vanilla' );
        $submenu['edit.php'][10][0] = __( 'Add New Article', 'grand-vanilla' );
        if ( isset( $submenu['edit.php'][15] ) ) {
            $submenu['edit.php'][15][0] = __( 'Categories', 'grand-vanilla' );
        }
    }
}
add_action( 'admin_menu', 'grand_vanilla_simplify_admin_menu', 999 );

// 6. Custom Sidebar Menu Order: Group Client Content at the Top
function grand_vanilla_admin_menu_order( $menu_order ) {
    return array(
        'index.php',                                              // 1. Dashboard
        'separator1',                                             // --- Separator ---
        'edit.php?post_type=gv_inquiry',                          // 2. Inquiries
        'edit.php?post_type=vanilla_product',                     // 3. Vanilla Products
        'edit.php?post_type=vanilla_gallery',                     // 4. Gallery
        'edit.php?post_type=vanilla_facility',                    // 5. Facilities
        'edit.php?post_type=page',                                // 6. Pages
        'edit.php',                                               // 7. Articles & Blog
        'customize.php?autofocus[section]=grand_vanilla_options', // 8. Theme Settings
        'separator2',                                             // --- Separator ---
        'upload.php',                                             // Media Library
    );
}
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'grand_vanilla_admin_menu_order' );



