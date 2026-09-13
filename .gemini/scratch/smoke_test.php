<?php
require_once __DIR__ . '/../../wp-load.php';

$urls = [
    'Homepage'         => home_url('/'),
    'About Us'         => home_url('/about/'),
    'Products Archive' => home_url('/products/'),
    'Gallery'          => home_url('/gallery/'),
    'Articles'         => home_url('/articles/'),
    'Contact'          => home_url('/contact/'),
];

// Also get any vanilla product single URL
$sample_product = get_posts([
    'post_type'      => 'vanilla_product',
    'posts_per_page' => 1,
    'post_status'    => 'publish',
]);
if (!empty($sample_product)) {
    $urls['Single Product (' . $sample_product[0]->post_title . ')'] = get_permalink($sample_product[0]->ID);
}

// Also get any blog post single URL
$sample_post = get_posts([
    'post_type'      => 'post',
    'posts_per_page' => 1,
    'post_status'    => 'publish',
]);
if (!empty($sample_post)) {
    $urls['Single Blog Post (' . $sample_post[0]->post_title . ')'] = get_permalink($sample_post[0]->ID);
}

echo "=== Testing All Core Page Endpoints ===\n\n";

$all_good = true;
foreach ($urls as $name => $url) {
    $response = wp_remote_get($url, ['timeout' => 10]);
    if (is_wp_error($response)) {
        echo "❌ [ERROR] {$name} ({$url}): " . $response->get_error_message() . "\n";
        $all_good = false;
    } else {
        $code = wp_remote_retrieve_response_code($response);
        $body = wp_remote_retrieve_body($response);
        $len  = strlen($body);
        
        // Check for fatal errors or warnings in HTML
        $has_fatal = (stripos($body, 'Fatal error') !== false || stripos($body, 'Parse error') !== false || stripos($body, 'There has been a critical error') !== false);
        
        if ($code === 200 && !$has_fatal) {
            echo "✅ [200 OK] {$name} ({$len} bytes) -> {$url}\n";
        } else {
            echo "⚠️ [STATUS {$code}] {$name} -> {$url}" . ($has_fatal ? " (Contains PHP error message!)" : "") . "\n";
            $all_good = false;
        }
    }
}

echo "\n======================================\n";
if ($all_good) {
    echo "🎉 ALL ENDPOINTS RETURNED HTTP 200 WITH ZERO ERRORS!\n";
} else {
    echo "⚠️ SOME ENDPOINTS NEED ATTENTION.\n";
}
