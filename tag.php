<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Espira
 */

get_header();

$tag_id = get_queried_object_id();



?>
<div id="content" class="site-content">
	<div id="pageinnerbanner" class="pageinnerbanner" style="background-image:url('<?php echo  get_term_meta( $tag_id , 'category_image', true); ?>')";>
		<div class="container">
			<div class="banner-inner">
				<div class="row">
					<div class="col-md-12">
						<h3><?php $current_tag = single_tag_title( "", false ); echo 'Tag: '.$current_tag; ?></h3>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /Page Banner -->
	<div class="category-wrapper">
		<div class="container">
			<div class="row" id="load-post-tag">
				<?php 
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$temp = $wp_query;
					$wp_query = null;
					$wp_query = new WP_Query();
					$wp_query->query('showposts=10&post_type=post&paged='.$paged.'&cat='.$cat_id);
					
					if ( get_query_var('paged') ) {
						$paged = get_query_var('paged');
					} elseif ( get_query_var('page') ) {
						$paged = get_query_var('page');
					} else {
						$paged = 1;
					}

					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 9,
						'paged' => $paged,
						'tag_id' => $tag_id,
					);

					$wp_query = new WP_Query( $args );
					
					$total_record = $wp_query->found_posts;
					$load_more_record = $total_record - 12;
					while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				
						<div class="col-md-4 col-sm-4">
							<div class="artitab-withimg">
								<a href="<?php the_permalink(); ?>">
								<?php 
								if(has_post_thumbnail()) { ?>
								<figure class="thumbnail-img">
									<img src="<?php the_post_thumbnail_url(); ?>">
								</figure>
								<?php } else {?>
								<figure class="thumbnail-img cat-feature">
									<img src="http://espira.indexportal.no/wp-content/themes/espira/images/espira-logo.png">
								</figure>
								<?php } ?>
								</a>
								<div class="artitab-withimg-container">
									<div class="artitab-artipublish">
										<?php $post_date = get_the_date( 'j. F Y' );  
											echo $post_date;
										?>
									</div>
									<h4><?php the_title(); ?></h4>
									<a href="<?php the_permalink(); ?>" class="konsern-nyheter-single-btn"><span>LES ARTIKKELEN</span> &gt;&gt;</a>
								</div>
							</div>
						</div>
					<?php endwhile;  ?>
			</div>
			
		<!-- <div class="loading-category"><img src="<?php //echo get_template_directory_uri();?>/images/espira_loader.gif"></div> -->
		</div>
		<div class="loadmore text-center">
					<input type="hidden" id="posts_per_page" name="posts_per_page" value="9" />
					<input type="hidden" id="tag_id" name="tag_id" value="<?php echo $tag_id;?>" />
					<input type="hidden" id="paged" name="paged" value="2" />
					<input type="hidden" id="total_record" value='<?php echo $total_record;?>' />
					<button type="button" id="tag_post_load" class="btn btn-block tag_post_load" style="display:none;"><?php _e('Vis flere nyheter', 'espira');?><?php echo '(' . $load_more_record . ')'; ?></button>
				</div>
	</div>
</div>
<?php get_footer(); ?>