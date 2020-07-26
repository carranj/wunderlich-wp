<?php get_header(); ?>
<main>
	<div class="tint">
		<div class="internal-jumbotron">
			<div class="container">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
	<div class="container">
	<?php the_breadcrumb(); ?>
		<?php get_template_part( 'page-templates/flexible_content/flexible_content' ); ?>
        <div class="gallery">
        <?php

        // Check rows exists.
        if( have_rows('repeatable_gallery') ):
        
            // Loop through rows.
            while( have_rows('repeatable_gallery') ) : the_row();
        
                // Load sub field value.
                $group_title = get_sub_field('group_title');
                $images = get_sub_field('photos');
                $size = 'full';
            ?>
                <h2><?php echo $group_title; ?></h2>
                <?php
                if( $images ): ?>
                    <div class="my-gallery mb-4">
                    <?php foreach( $images as $image ): ?>
                        <figure itemprop="associatedMedia">
                        <a href="<?php echo esc_url($image['url']); ?>" itemprop="contentUrl" data-size="<?php echo $image['width']; ?>x<?php echo $image['height']; ?>">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </a>            
                        <figcaption itemprop="caption description"><?php echo esc_html($image['caption']); ?></figcaption>                                    
                    </figure>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>



            <?php
            // End loop.
            endwhile;
        
        // No value.
        else :
            // Do something...
        endif;
        ?>

         

            <!-- Root element of PhotoSwipe. Must have class pswp. -->
            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                <!-- Background of PhotoSwipe. 
                    It's a separate element, as animating opacity is faster than rgba(). -->
                <div class="pswp__bg"></div>

                <!-- Slides wrapper with overflow:hidden. -->
                <div class="pswp__scroll-wrap">

                    <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                    <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                    <div class="pswp__container">
                        <div class="pswp__item"></div>
                        <div class="pswp__item"></div>
                        <div class="pswp__item"></div>
                    </div>

                    <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                    <div class="pswp__ui pswp__ui--hidden">

                        <div class="pswp__top-bar">

                            <!--  Controls are self-explanatory. Order can be changed. -->

                            <div class="pswp__counter"></div>

                            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                            <!-- <button class="pswp__button pswp__button--share" title="Share"></button> -->

                            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                            <div class="pswp__preloader">
                                <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                            <div class="pswp__share-tooltip"></div> 
                        </div>

                        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                        </button>

                        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                        </button>

                        <div class="pswp__caption">
                            <div class="pswp__caption__center"></div>
                        </div>

                    </div>

                </div>

            </div>
        <!-- END GALLERY -->
        </div>
	</div>
</main>


<?php get_footer(); ?>
