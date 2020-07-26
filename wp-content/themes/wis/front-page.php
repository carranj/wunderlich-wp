<?php  get_header(); ?>
<main>
    <div class="home-intro" style="background: url(http://josecarranco.com/wis/wp-content/uploads/2020/07/intro-photo.png);">
    </div>
    
    <div class='home-jumbotron col-md-12'>
        <h1><?php the_field('intro_title'); ?></h1>
        <?php the_field('intro_paragraph'); ?>
    </div>

    
</main>

<?php get_footer(); ?> 
