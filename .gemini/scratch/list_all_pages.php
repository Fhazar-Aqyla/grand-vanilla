<?php
require_once __DIR__ . '/../../wp-load.php';

$pages = get_posts([
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_status'    => 'any',
]);

echo "Pages in database:\n";
foreach ($pages as $p) {
    echo "ID: {$p->ID} | Slug: '{$p->post_name}' | Title: '{$p->post_title}' | Status: '{$p->post_status}'\n";
}

echo "\nTheme Reading Options:\n";
echo "show_on_front: " . get_option('show_on_front') . "\n";
echo "page_on_front: " . get_option('page_on_front') . "\n";
echo "page_for_posts: " . get_option('page_for_posts') . "\n";
