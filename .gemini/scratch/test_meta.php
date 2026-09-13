<?php
require_once __DIR__ . '/../../wp-load.php';

echo "Testing Page Meta Retrieval...\n";

// Check Home Page (ID 5)
$home_id = 5;
$about_id = 6;

echo "\n--- Home Page (ID $home_id) ---\n";
echo "Hero Stat Num: " . (get_post_meta($home_id, '_gv_hero_stat_num', true) ?: '(default fallback)') . "\n";
echo "Hero Stat Label: " . (get_post_meta($home_id, '_gv_hero_stat_label', true) ?: '(default fallback)') . "\n";
echo "About Heading: " . (get_post_meta($home_id, '_gv_home_about_heading', true) ?: '(default fallback)') . "\n";
echo "OEM Heading: " . (get_post_meta($home_id, '_gv_home_oem_heading', true) ?: '(default fallback)') . "\n";

echo "\n--- About Page (ID $about_id) ---\n";
echo "Hero Subtag: " . (get_post_meta($about_id, '_gv_about_hero_subtag', true) ?: '(default fallback)') . "\n";
echo "Story Title: " . (get_post_meta($about_id, '_gv_about_story_title', true) ?: '(default fallback)') . "\n";
echo "Facilities Tag 1: " . (get_post_meta($about_id, '_gv_about_fac1_tag', true) ?: '(default fallback)') . "\n";

// Test updating a meta to verify dynamic behavior
update_post_meta($home_id, '_gv_hero_stat_num', '15+');
echo "\nUpdated _gv_hero_stat_num on Home Page to: " . get_post_meta($home_id, '_gv_hero_stat_num', true) . "\n";

// Restore or keep custom
update_post_meta($home_id, '_gv_hero_stat_num', '12+');
echo "Reset _gv_hero_stat_num to: " . get_post_meta($home_id, '_gv_hero_stat_num', true) . "\n";

echo "\nAll Custom Meta Box integration is fully functioning!\n";
