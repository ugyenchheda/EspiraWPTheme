<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Espira
 */

get_header();

$currCat = get_category(get_query_var('cat'));
$cat_name = $currCat->name;
$cat_id   = get_cat_ID( $cat_name );

$archieve_banner = get_theme_mod( 'archive_banner_image', get_template_directory_uri(). '/images/pagebanner-img.jpg');
$archive_title = get_theme_mod( 'archive_header', 'Archive Page');

?><div id="content" class="site-content">
	<div id="pageinnerbanner" class="pageinnerbanner" style="background-image:url('<?php echo $archieve_banner; ?>')";>
		<div class="container">
			<div class="banner-inner">
				<div class="row">
					<div class="col-md-12">
					<?php get_post_meta( get_the_ID(), 'category_image', true ); ?>
						<h3><?php echo $archive_title; ?></h3>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /Page Banner -->
	<?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$temp = $wp_query;
		$wp_query = null;
		$wp_query = new WP_Query();
		$wp_query->query('showposts=10&post_type=post&paged='.$paged.'&cat='.$cat_id);
		

	//  $paged = 1;

	//  if(isset($_REQUEST['paged']) && !empty($_REQUEST['paged'])){
	// 	$paged  = $_REQUEST['paged'];
	//  }

	//  if(isset($_REQUEST['page']) && !empty($_REQUEST['page'])){
	// 	$paged  = $_REQUEST['page'];
	//  }
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	   } elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	   } else {
		$paged = 1;
	   }

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 4,
		'paged' => $paged,
		'category_name' => $cat_name,
	);
	$wp_query = new WP_Query( $args );
	

	 ?>

	
<section class="pagecontent category">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-12 col-sm-12">
					<div class="articleWrapper">
			
				<?php   while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
						<article class="post">
							<div class="row">
								<div class="col-md-4 col-sm-4">
									<figure class="thumbnail-img">
										<img src="<?php the_post_thumbnail_url(); ?>" alt="Post Image 1">
									</figure>
								</div>
								<div class="col-md-8 col-sm-8">
									<div class="article-content">
										<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
										<span class="posted-time"><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></span>
										<?php if ( is_category() || is_archive() ) {
											echo wp_trim_words( get_the_excerpt(), 30, '...' );
											} else {
												echo wp_trim_words( get_the_content(), 40, '...' );
											} ?>
										</p>
										<a href="<?php the_permalink(); ?>" class="readmore"><?php _e( 'Readmore', 'espira')?> <i class="fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</article>
						
										<?php endwhile;  ?>
					
					
					</div>
					<div class="site-pagination">
					<?php 
					
	global $wp_query;
	$big = 999999999; // need an unlikely integer
	echo '<div class="paginate-links">';
	echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'prev_text' => __('<<'),
	'next_text' => __('>>'),
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages
	) );
	
	echo '</div>';
					?>
					</div>
				</div>
				<div class="col-lg-3 col-md-12 col-sm-12">
				
					<div class="sidebar">
					<?php dynamic_sidebar('category'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	</div>
<?php get_footer(); ?>