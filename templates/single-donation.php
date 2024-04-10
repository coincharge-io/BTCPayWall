<?php
/*
*Template Name: Donation Form
*Template Post Type: btcpw_donation
*/

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

global $post;
$template = get_post_meta($post->ID, 'btcpaywall_tipping_text_template_name', true);

$shortcode = btcpaywall_output_shortcode_attributes($template, $post->ID);
?>

<?php get_header(); ?>
<?php get_the_post_thumbnail(get_the_ID(), 'thumbnail'); ?>
<div id="content" class="site-content">
    <section id="main">
        <h1><?php the_title(); ?></h1>
        <?php echo do_shortcode($shortcode); ?>
    </section>

</div>
<?php get_footer(); ?>