<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Espira
 */

get_header();
?>

<section class="pagecontent errorpage">
		<div class="container">
			<div class="error-inner">
				<div class="row">
					<div class="col-md-12">
						<h4><?php _e( '404', 'espira')?></h4>
						<p><?php _e( 'Side ikke funnet !', 'espira')?></p>
						<p class="desc"><?php _e( 'Siden du ser er ikke funnet. ', 'espira website ')?></p>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-angle-left"></i><?php _e( 'Go Back', 'espira')?></a>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php
get_footer();
