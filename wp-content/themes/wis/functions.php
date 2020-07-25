<?php


function theme_styles(){
	wp_enqueue_style( 'photoswipe_css', get_template_directory_uri() . '/js/photoswipe/photoswipe.css' );
	wp_enqueue_style( 'photoswipe_skin', get_template_directory_uri() . '/js/photoswipe/default-skin/default-skin.css' );
	wp_enqueue_style( 'bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}

add_action('wp_enqueue_scripts', 'theme_styles');

function theme_js() {

	global $wp_scripts;

	wp_register_script('html5_shiv','https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false);
	wp_register_script('respond_js','https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false);

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

	wp_enqueue_script('photoswipe_js', get_template_directory_uri() . '/js/photoswipe/photoswipe.min.js', array(), '',true );
	wp_enqueue_script('photoswipe_ui', get_template_directory_uri() . '/js/photoswipe/photoswipe-ui-default.min.js', array(), '',true );
	wp_enqueue_script('bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js', array('jquery'), '4.4.1',true );
	wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/theme.js', array('bootstrap_js'), '',true );	 
}
add_action( 'wp_enqueue_scripts', 'theme_js');
add_theme_support ( 'menus' );
add_theme_support ( 'post-thumbnails' );

/* Obfuscate E-Mail Addresses
	Use shotcode in editor: [mailto][/mailto]
	=============================================== */
	function cwc_mail_shortcode( $atts , $content=null ) {
		for ($i = 0; $i < strlen($content); $i++) $encodedmail .= "&#" . ord($content[$i]) . ';';
		return '<a href="mailto:'.$encodedmail.'">'.$encodedmail.'</a>';
	}
	add_shortcode('mailto', 'cwc_mail_shortcode');


	/* Remove Post Formatting Around Images
	=============================================== */
    function filter_ptags_on_images($content){
       return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    }
	add_filter('the_content', 'filter_ptags_on_images');

	/* Custom Breadcrumbs
	=============================================== */
	function the_breadcrumb() {
		global $post;
		echo '<ul id="breadcrumbs">';
		if (!is_home()) {
			echo '<li><a href="';
			echo get_option('home');
			echo '">';
			echo 'Home <span class="separator"> / </span>';
			
			echo '</a></li>';
			if (is_category() || is_single()) {
				echo '<li>';
				the_category(' </li><span class="separator"> / </span><li> ');
				if (is_single()) {
					echo '</li><span class="separator"> / </span><li>';
					the_title();
					echo '</li>';
				}
			} elseif (is_page()) {
				if($post->post_parent){
					$anc = get_post_ancestors( $post->ID );
					$title = get_the_title();
					foreach ( $anc as $ancestor ) {
						$output = '<li><a href="#" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a><span class="separator"> / </span></li>';
					}
					echo $output;
					echo '<strong title="'.$title.'"> '.$title.'</strong>';
				} else {
					echo '<li><strong> '.get_the_title().'</strong></li>';
				}
			}
		}
		echo '</ul>';
	}


?>