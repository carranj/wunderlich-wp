 <!DOCTYPE html>
<html lang="en"> 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico"> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title><?php wp_title();?></title>
    <?php wp_head(); ?>
  </head>

<body <?php body_class(); ?>>
<div class="flex-container">
  <header>
    <div class="container">
      <div class="logo-container">
        <a href="<?php echo site_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/Wildcat_Logo.svg" alt=""></a>
      </div>
      <nav>
        <?php
          $args = array(
              'menu'      => 'menu-1',
              'container' => 'ul',
              'menu_class'      => 'nav flex-column',
          );
          wp_nav_menu( $args );
        ?>
      </nav>
    </div>
    
  </header>
