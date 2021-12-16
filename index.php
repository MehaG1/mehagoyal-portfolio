<?php 
  get_header(); 
?>
<div id="header-intro">
<h2>Hello, I'm</h2><br>
<h1>Meha Goyal</h1>
<img src = "/profile.jpeg" width = 400px/>
</div>

<section id = 'about'>
			<div>
				<h2>About Me</h2>
				<h3>Hi, my name is Meha and I am a social entrepreneur.</h3>
				<p>As a computer scientist passionate about community growth, my work aims to solve major social issues and make a positive impact on our communities.</p>
			</div>
		</section>

<div id = "projects">

</div>


<div>
    <?php
      require 'inc/section_vars.php';   
      // get_example_data is in /inc/template_functions.php
      $data  = get_example_data($example_repeater);
      if(!empty( $data ) ) { 
        ?>
        <section class="example">
        <?php
          foreach ( $data as $k => $f ) {
            $media = '';
            if ($f['some_image']) {
              // get_media_url function is in template_functions.php
              $media = '<img src="'.esc_url( get_media_url( $f['some_image'] ) ).'">';
            }
        ?>
            <div><?php echo $media ?></div>
            <div><?php echo $f['some_quote'] ?></div>

    <?php
          }
    ?>
        </section>
<?php } ?>

</div>

<?php get_footer(); ?>
