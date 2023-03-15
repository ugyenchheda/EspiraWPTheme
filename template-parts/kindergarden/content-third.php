<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Espira
 */

?><!-- Page Slider -->
	<div class="pageSliderWrapper">
		<div id="owl-one" class="owl-carousel owl-theme">
		<?php $feature_galleries = get_post_meta( get_the_ID(), 'feature_galleries', true);
				if(isset($feature_galleries) && !empty($feature_galleries)){
				?>
					<?php foreach($feature_galleries as $feature_gallery) { ?>
						<div class="slider-item">
						<img src="<?php echo $feature_gallery; ?>" alt="" class="img-fluid">
					</div>
					<?php } ?>
				<?php } ?>
		</div>

		<?php
			$terms = get_terms( 'kindergarden_category' );	
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
		?>


		<div class="category-contentWrapper">
			<div class="container">
				<div class="category-content">

					<ul>
					<?php foreach ( $terms as $term ) {
					$kindergarden_taxonomyavatar = get_term_meta($term->term_id, 'kindergarden_taxonomyavatar', true);
					if(!empty($kindergarden_taxonomyavatar)) {	
					?>
						<li>
							<a href="<?php echo get_term_link( $term->term_id, 'kindergarden_category' ); ?>">
								<img src="<?php echo $kindergarden_taxonomyavatar; ?>" alt="Category Image 1">
							</a>
						</li>
					<?php
					}
				} ?>	
					</ul>
				</div>
			</div>
		</div>
			<?php } ?>
		<div class="slider-contentWrapper">
			<div class="container">
				<div class="slider-content">
					<figure class="thumbnail-img">
						<img src="<?php echo get_template_directory_uri(); ?>/images/slider-logo.png" alt="Slider Logo">
					</figure>
					<h2><?php the_title();?></h2>
					<?php
						$monday_open = get_post_meta( get_the_ID(), 'monday_open', true );
						$monday_close = get_post_meta( get_the_ID(), 'monday_close', true );
						$tuesday_open = get_post_meta( get_the_ID(), 'tuesday_open', true );
						$tuesday_close = get_post_meta( get_the_ID(), 'tuesday_close', true );
						$wednesday_open = get_post_meta( get_the_ID(), 'wednesday_open', true );
						$wednesday_close = get_post_meta( get_the_ID(), 'wednesday_close', true );
						$thursday_open = get_post_meta( get_the_ID(), 'thursday_open', true );
						$thursday_close = get_post_meta( get_the_ID(), 'thursday_close', true );
						$friday_open = get_post_meta( get_the_ID(), 'friday_open', true );
						$friday_close = get_post_meta( get_the_ID(), 'friday_close', true );
					?>
					<p><?php
						if($monday_open){
							echo 'MANDAG KL  ' .$monday_open. ' - ' .$monday_close. '<br>';
						}
						
						if($tuesday_open){
							echo 'TIRSDAG KL  ' .$tuesday_open. ' - ' .$tuesday_close. '<br>';
						}
						
						if($wednesday_open){
							echo 'ONSDAG KL  ' .$wednesday_open. ' - ' .$wednesday_close. '<br>';
						}
						
						if($thursday_open){
							echo 'TORSDAG KL  ' .$thursday_open. ' - ' .$thursday_close. '<br>';
						}
						
						if($friday_open){
							echo 'FREDAG KL  ' .$friday_open. ' - ' .$friday_close. '<br>';
						}
					?>
					</p>
				</div>
			</div>
		</div>
	</div><!-- /Page Slider -->
	<section id="fourblock" class="fourblock">
		<div class="container">
		<h2 class="txtgreen">Kommer Snart</h2>
		</div>
	</section><!-- /Four Column Section -->

