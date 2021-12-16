<?php wp_head(); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title><?php bloginfo('name')?></title>
   </head>
  
   <body <?php body_class()?>>
       <div class = "container">
           <!--site header-->
           <header class = "header">
               <h1 class="title"><a href="<?php echo home_url()?>"><?php bloginfo('name')?></a></h1>
               <nav class="nav-bar">
                   <?php
                       $args = array(
                           'theme-location' => 'primary'
                       );
                   ?>
                   <?php wp_nav_menu($args);?>
               </nav>
           </header>