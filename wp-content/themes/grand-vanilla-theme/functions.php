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
 * 2. Enqueue Styles and Scripts
 */
function grand_vanilla_scripts() {
    // Google Fonts: Jost (Headings) and Lato (Body)
    wp_enqueue_style(
        'grand-vanilla-google-fonts',
        'https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700;800&family=Lato:wght@300;400;700&display=swap',
        array(),
        null
    );

    // Main Theme Stylesheet
    wp_enqueue_style(
        'grand-vanilla-style',
        get_stylesheet_uri(),
        array( 'grand-vanilla-google-fonts' ),
        wp_get_theme()->get( 'Version' )
    );
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
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
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
 * 4. Register Custom Post Type: Harvest & Curing Gallery
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
        'rewrite'            => array( 'slug' => 'gallery' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-format-gallery',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'vanilla_gallery', $args );
}
add_action( 'init', 'grand_vanilla_register_gallery_cpt' );

/**
 * 5. Meta Boxes for Vanilla Product Lab Specifications
 */
function grand_vanilla_add_product_meta_box() {
    add_meta_box(
        'vanilla_product_specs',
        __( 'Vanilla B2B Export Specifications', 'grand-vanilla' ),
        'grand_vanilla_product_specs_callback',
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
            <td><input type="text" id="gv_grade" name="gv_grade" value="<?php echo esc_attr( $grade ); ?>" placeholder="e.g. Gourmet Grade A / Extraction Grade" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="gv_vanillin"><?php esc_html_e( 'Vanillin Content (%)', 'grand-vanilla' ); ?></label></th>
            <td><input type="text" id="gv_vanillin" name="gv_vanillin" value="<?php echo esc_attr( $vanillin ); ?>" placeholder="e.g. 1.8% - 2.4%" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="gv_moisture"><?php esc_html_e( 'Moisture Content (%)', 'grand-vanilla' ); ?></label></th>
            <td><input type="text" id="gv_moisture" name="gv_moisture" value="<?php echo esc_attr( $moisture ); ?>" placeholder="e.g. 28% - 33%" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="gv_length"><?php esc_html_e( 'Pod Length (cm)', 'grand-vanilla' ); ?></label></th>
            <td><input type="text" id="gv_length" name="gv_length" value="<?php echo esc_attr( $length ); ?>" placeholder="e.g. 16 - 20 cm" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="gv_origin"><?php esc_html_e( 'Origin / Growing Region', 'grand-vanilla' ); ?></label></th>
            <td><input type="text" id="gv_origin" name="gv_origin" value="<?php echo esc_attr( $origin ); ?>" placeholder="e.g. Bali, Java, Papua (Indonesia)" class="regular-text"></td>
        </tr>
    </table>
    <?php
}

function grand_vanilla_save_product_specs( $post_id ) {
    if ( ! isset( $_POST['grand_vanilla_specs_nonce'] ) || ! wp_verify_nonce( $_POST['grand_vanilla_specs_nonce'], 'grand_vanilla_save_specs' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $fields = array( 'gv_grade', 'gv_vanillin', 'gv_moisture', 'gv_length', 'gv_origin' );
    foreach ( $fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
        }
    }
}
add_action( 'save_post_vanilla_product', 'grand_vanilla_save_product_specs' );

/**
 * 6. Helper: Get Company Contact
 */
function grand_vanilla_get_contact_info() {
    return array(
        'whatsapp'     => '081226974731',
        'whatsapp_url' => 'https://wa.me/6281226974731?text=Hello%20Grand%20Vanilla%2C%20I%20would%20like%20to%20inquire%20about%20your%20Indonesian%20vanilla%20beans%20export.',
        'email'        => 'export@grandvanilla.id',
        'export_hubs'  => 'Jakarta (CGK) & Bali (DPS), Indonesia',
    );
}
