<?php
 require get_template_directory() . '/inc/example-post-type.php';
 require get_template_directory() . '/inc/enqueue-scripts.php';
 require get_template_directory() . '/inc/register-settings.php';
 require get_template_directory() . '/inc/customizer.php';
 require get_template_directory() . '/inc/template_functions.php';
 
 function portfolio_resources(){
   wp_enqueue_style('style', get_stylesheet_uri());
 }
 
 add_action('wp_enqueue_scripts', 'portfolio_resources');
 
 //Navigation menus
 register_nav_menus(array(
   'primary' => __('Primary Menu'),
 ))
?>
