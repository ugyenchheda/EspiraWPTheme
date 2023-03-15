<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Espira
 */

 get_header();
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<?php dynamic_sidebar('nyheter-left'); ?>
			</div>
			<div class="col-md-6">
				<?php 
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
				if(!empty ( $featured_img_url )){
					echo '<img src="'.$featured_img_url.'">';
				}
				?>
					<h2 class="event_green"><?php the_title(); ?></h2>


<?php $instagram = get_post_meta(get_the_ID(), 'instagram', true);
if (isset($instagram) && !empty($instagram)) {
?>
<figure class="thumbnail-img">
<a href="<?php echo $instagram; ?>" class="bg-green">
<img src="<?php echo get_template_directory_uri(); ?>/images/instagram-icon.png" alt="instagram Icon">
</a>
</figure>
<?php }?>


<?php $youtube = get_post_meta(get_the_ID(), 'youtube', true);
if (isset($youtube) && !empty($youtube)) {
?>
<figure class="thumbnail-img">
<a href="<?php echo $youtube; ?>" class="bg-green">
<img src="<?php echo get_template_directory_uri(); ?>/images/youtube-icon.png" alt="youtube Icon">
</a>
</figure>
<?php }?>


<?php $linkedin = get_post_meta(get_the_ID(), 'linkedin', true);
if (isset($linkedin) && !empty($linkedin)) {
?>
<figure class="thumbnail-img">
<a href="<?php echo $linkedin; ?>" class="bg-green">
<img src="<?php echo get_template_directory_uri(); ?>/images/linkedin-icon.png" alt="linkedin Icon" >
</a>
</figure>
<?php }?>


<?php $twitter = get_post_meta(get_the_ID(), 'twitter', true);
if (isset($twitter) && !empty($twitter)) {
    ?>
<a href="mailto:<?php echo $twitter; ?>" class="bg-green">
<img src="<?php echo get_template_directory_uri(); ?>/images/linkedin-icon.png" alt="linkedin Icon">
</a>
<?php }?>


<?php $email = get_post_meta(get_the_ID(), 'email', true);
if (isset($email) && !empty($email)) {
    ?>
<a href="mailto:<?php echo $email; ?>" class="bg-green">
<img src="<?php echo get_template_directory_uri(); ?>/images/linkedin-icon.png" alt="linkedin Icon">
</a>
<?php }?>
					<?php $post_date = get_the_date( 'j. F Y' ); 
					echo $post_date;?>
					<?php 
						$description = get_post_meta(get_the_ID(), 'nyheter_excerpt', true);
						if(!empty ( $description )) {
							echo $description;
						}
					?>
					<?php  
					the_content();
					?>
			</div>
			<div class="col-md-3">
				<div class="news-rightbar">
					<?php dynamic_sidebar('nyheter-right'); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
