<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Espira
 */

?>
</div>
<div class="post-headerimg">
<?php $featured_img_url = get_the_post_thumbnail_url($post_id);  
	 echo '<img src="'.$featured_img_url.'" rel="lightbox">';
?>
</div>
<div class="container">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<div class="single-content">		
				
			<?php //echo get_the_post_thumbnail( $post_id, 'post_feat_xl', array( 'class' => '' ) ); ?>
				<?php
				if ( is_singular() ) :
					the_title( '<h2 class="primary-color">', '</h2>' );
				else :
					the_title( '<h2 class="primary-color"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) :
					?>

				<?php endif; ?>
			</div>
		</header><!-- .entry-header -->

		

			<?php 
			if (has_excerpt()) {
				$excerpt = wp_strip_all_tags(get_the_excerpt());
				echo '<div class="row"><div class="col-md-2"></div><div class="col-md-8"><p class="boldfont marbot25 text-center">'.$excerpt.'</p></div><div class="col-md-2"></div></div>';
			}
			?>
			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'espira' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'espira' ),
				'after'  => '</div>',
			) );
			?>
	</article>
