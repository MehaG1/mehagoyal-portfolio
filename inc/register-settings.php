<?php

function register_primary_menu() {
  register_nav_menu( 'primary', 'Primary Menu' );
}
add_action( 'after_setup_theme', 'register_primary_menu' );

/*
*
* Walker for the main menu 
*
*/
function add_arrow( $output, $item, $depth, $args ){
  //Only add class to 'top level' items on the 'primary' menu.
  if('primary' == $args->theme_location && $depth === 0 ){
      if (in_array("menu-item-has-children", $item->classes)) {
          $new_output = '<div class="sub-wrap">' . 
                          $output . 
                        '<i class="nav-icon fas fa-chevron-down down-icon" aria-hidden="true"></i></div>';
          return $new_output;
      }
  }
  return $output;
}
add_filter( 'walker_nav_menu_start_el', 'add_arrow',10,4);

// Example of how to use a repeatable box

function example_repeatable_customizer($wp_customize) {
  require 'section_vars.php';  
  require_once 'controller.php';  
  
  $wp_customize->add_section($example_section, array(
    'title' => 'Example Repeaters',
  ));
  
  $wp_customize->add_setting(
    $example_repeater,
    array(
        'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
        'transport' => 'refresh',
    ) );

  $wp_customize->add_control(
      new Onepress_Customize_Repeatable_Control(
          $wp_customize,
          $example_repeater,
          array(
              'label' 		=> esc_html__('Example Q & A Repeater'),
              'description'   => '',
              'section'       => $example_section,
              'live_title_id' => 'some_quote',
              'title_format'  => esc_html__('[live_title]'), // [live_title]
              'max_item'      => 10, // Maximum item can add
              'limited_msg' 	=> wp_kses_post( __( 'Max items added' ) ),
              'fields'    => array(
                  'some_quote'  => array(
                      'title' => esc_html__('Text'),
                      'type'  =>'text',
                  ),
                  'some_image' => array(
                    'title' => esc_html__('Image'),
                    'type'  =>'media',
                ),
              ),
          )
      )
  );
}
add_action( 'customize_register', 'example_repeatable_customizer' );

function home_customizer($wp_customize) {
  require 'section_vars.php';
  $wp_customize->add_section($home_section, array(
    'title' => 'Testing Home Page',
  ));

  $wp_customize->add_setting($home_top_vid, array(
    'default' => 'https://www.youtube.com/embed/A0Wyx-OOX4A',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control($home_top_vid, array(
    'label' => 'Top Video Embed',
    'section' => $home_section,
  ));

  $wp_customize->add_setting($home_top_img);
  $wp_customize->add_control( new WP_Customize_Image_Control( 
      $wp_customize, 
      $home_top_img, 
      array(
          'label' => 'Top Image',
          'section' => $home_section
      )
  ));
  // Top Desc
  $wp_customize->add_setting($home_top_desc);
  $wp_customize->add_control($home_top_desc, array(
      'label' => 'Top Description',
      'section' => $home_section,
      'type' => 'textarea'
  ));
}
add_action( 'customize_register', 'home_customizer' );

function biography_customizer($wp_customize){
  require 'section_vars.php';
  $wp_customize->add_section('bio_section', array(
    'title' => "Biography",
  ));
  $wp_customize->add_setting('bio_name', array(
    'default' => 'Meha Goyal',
  ));
  $wp_customize->add_control('bio_name', array(
    'label' => 'Name',
    'section' => 'bio_section',
  ));
  $wp_customize->add_setting('biography', array(
    'default' => 'Hi! My name is Meha',
  ));
  $wp_customize->add_control('biography', array(
    'label' => 'Biography Description',
    'section' => 'bio_section',
    'type' => 'textarea',
  ));
  $wp_customize->add_setting('bio_image');
  $wp_customize->add_control(new WP_Customize_Image_Control(
    $wp_customize,
    'bio_image',
    array(
      'label' => 'Biography Image',
      'section' => 'bio_section'
    )
  ));
}
add_action('customize_register', 'biography_customizer');

function project_customizer($wp_customize){
  require 'section_vars.php';
  $wp_customize->add_section('project_section', array(
    'title' => "Projects",
  ));
  $wp_customize->add_setting('project_title', array(
    'default' => 'Default Project Name',
  ));
  $wp_customize->add_control('project_title', array(
    'label' => 'Project Name',
    'section' => 'project_section',
  ));
  $wp_customize->add_setting('project_description');
  $wp_customize->add_control('project_description', array(
    'label' => 'Project Description',
    'section' => 'project_section',
    'type' => 'textarea',
  ));
  $wp_customize->add_setting('project_image');
  $wp_customize->add_control(new WP_Customize_Image_Control(
    $wp_customize,
    'project_image',
    array(
      'label' => 'Project Image',
      'section' => 'project_section'
    )
  ));

}
add_action('customize_register', 'project_customizer');