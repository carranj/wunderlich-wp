<?php get_header(); ?>

<div class="col-md-12">  
  <section class="text-center">
    <h1><?php the_title(); ?></h1>  
  </section>
</div>

<div class="container">
  <div class="col-md-9">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <h2><?php the_title(); ?></h2>
      <p><em><?php echo the_time ('l, F jS, Y');?></em></p>
    
      <?php the_content(); ?>
      <p><em>Share this article:</em> <a href="http://www.facebook.com/sharer.php?u=" target="_blank"> <i class="fa fa-facebook-square"></i></a> 
        <a href="http://twitter.com/share?url=&text=" target="_blank"> <i class="fa fa-twitter-square"></i></a> 
      </p>
      <div class="featured-img-section">
        <?php if ( has_post_thumbnail() ) { ?>
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        <?php } ?>
      </div>

    <?php endwhile; else: ?>
      <h1>Oh No!</h1>
      <p>No Content is appearing for this page!</p>

    <?php endif; ?>
  </div>

  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?> 