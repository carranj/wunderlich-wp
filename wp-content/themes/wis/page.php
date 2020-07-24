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
	</div>
</main>


<?php get_footer(); ?>
