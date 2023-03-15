<?php
/**
 * The main template file
Template Name: Search - Grild | List Page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package
 */

get_header();

get_template_part('template-parts/search-template/search', 'header');
?>

				<div class="rslt-content hide firstpage listview">
					<div class="rslt-wrapper" id="search_result">
						<!-- Search data fetch -->
						<?php
							
							if(($_REQUEST['sok']!='')||($_REQUEST['municipality']!='')||($_REQUEST['zipcode']!='')){
								$posts_per_page = 1;
								
							}else{
							
							$posts_per_page = -1;
							}
							
							$args = array(
								'post_type' => 'kindergarden',
								'posts_per_page' => $posts_per_page,
								'orderby'=> 'title', 
								'order' => 'ASC'

							);
							$query = new WP_Query($args);
							$total_record = $query->found_posts;
							$load_more_record = $total_record - $posts_per_page;
							if ($load_more_record <= 0) {
								$load_more_record = 0;
							}
							if ($query->have_posts()) {
								while ($query->have_posts()) {
									$query->the_post();
									?>
											<div class="rslt-col">
												<div class="rslt-listsec">
													<figure class="thumbnail-img search check">
														<?php
															$kindergarden_thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'post_image_l');
															if (!empty($kindergarden_thumbnail))  { ?>
															<img src="<?php echo $kindergarden_thumbnail; ?>" alt="Image">
														<?php } else  {
														 $feature_galleries = get_post_meta(get_the_ID(), 'feature_galleries', true);


														 if(!empty($feature_galleries)){
														 	 $i=0;
									                    foreach ($feature_galleries as $feature_gallery) {
									                        if ($i < 1) {
									                    ?>
									                            <img src="<?php echo $feature_gallery; ?>" class="img-fluid">
									                    <?php } }
									                     $i++; 
														 }else{
														 	echo '<img src="'.site_url().'/wp-content/themes/espira/images/espira-logo.png" class="default_search_image" alt="Image">';

														 }


									                     } ?>
													</figure>
													<?php
														$mapGPS = get_post_meta(get_the_ID(), 'visit_area', true);
														$post_id = get_the_ID();
													?>
													<?php //if ($mapGPS['latitude']): ?>
													<!-- 	<div class="map" id="map-<?php //echo $post_id; ?>" style="height: 350px;"><?php //echo $mapGPS['latitude']; ?>,<?php //echo $mapGPS['longitude']; ?>,15</div> -->

													

													<?php
														$kindergarden_email = get_post_meta(get_the_ID(), 'email', true);
														$kindergarden_phone = get_post_meta(get_the_ID(), 'phone', true);

													?>
													<div class="rslt-block nopad aligncenter">
														<div class="inner">
															<h4><?php the_title();?></h4>
															<ul>
																<li><?php echo get_post_meta(get_the_ID(), 'visit_address', true) ?>, <?php echo get_post_meta(get_the_ID(), 'zip_code', true) ?> <?php echo get_post_meta(get_the_ID(), 'postal_place', true) ?> </li>
																<?php if (!empty($kindergarden_phone)) {?>
																<li>Tlf.: <?php echo $kindergarden_phone; ?></li>
																<?php }?>
																<?php if (!empty($kindergarden_email)) {?>
																<li><?php echo $kindergarden_email; ?></li>
																<?php }?>
															</ul>
														</div>
													</div>
													<div class="btn-center">
														<a href="<?php echo get_the_permalink(); ?>" class="rsltbtn"><?php _e('BESØK BARNEHAGE', 'espira');?></a>
													</div>
												</div>
											</div>
										<?php
							}
								//wp_reset_postdata();
							
							
							}
						

							
							?>
					</div>
				</div>



<!-- This is the section for showing full map option  -->

				<div class="rslt-content whole-map" id="wholemap">
					<div class="row">
						<div class="col-sm-12 col-md-4 " style="overflow-y: auto;height: 682px;">
						<?php 
					if ($query->have_posts()) {
								while ($query->have_posts()) {
									$query->the_post();
									$post_id=get_the_ID();
									$title=get_the_title(get_the_ID());
									$mapGPS = get_post_meta(get_the_ID(), 'visit_area', true);
									$markers []=[$title,(double)$mapGPS['latitude'],(double)$mapGPS['longitude'],$post_id];
                    				$address=get_post_meta($post_id, 'visit_address', true) .','. get_post_meta($post_id, 'zip_code', true) .' '. get_post_meta($post_id, 'postal_place', true);
									$link="<a href='".get_the_permalink()."' class='rsltbtn'>BESØK BARNEHAGE</a>";
									$marker_contents[]=["<h4>".$title."</h4><p>".$address."</p><p>".$link."</p>"];
									$kindergarden_phone = get_post_meta(get_the_ID(), 'phone', true);
									$kindergarden_email = get_post_meta(get_the_ID(), 'email', true);
									?>
							<div class="rslt-listsec">
								<div class="rslt-block" id="<?php echo $post_id;?>">
									<h4 style="text-transform: uppercase; "><?php the_title();?></h4>
									<ul>
										<li><?php echo get_post_meta(get_the_ID(), 'visit_address', true) ?>, <?php echo get_post_meta(get_the_ID(), 'zip_code', true) ?> <?php echo get_post_meta(get_the_ID(), 'postal_place', true) ?> </li>
                                        <?php if (!empty($kindergarden_phone)) {?>
                                            <li>Tlf.: <?php echo $kindergarden_phone; ?></li>
                                        <?php }?>
                                        <?php if (!empty($kindergarden_email)) {?>
                                         <li><?php echo $kindergarden_email; ?></li>
                                        <?php }?>
									</ul>
									<a href="<?php echo get_the_permalink(); ?>" class="rsltbtn"><?php _e('BESØK BARNEHAGE', 'espira');?></a>
								</div>
							</div>
						

					
					<?php }
								wp_reset_postdata();
							}
							?>
							</div>
						<div class="col-sm-12 col-md-8">
							<div class="rslt-map" id='map-multiple-kindergardens' style="height: 682px;">
								<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61291610.229767844!2d17.880163669532557!3d20.343972991065442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da22a754b0b5d9%3A0x4b0340a3e4c71f25!2sThe%20Espira!5e0!3m2!1sen!2snp!4v1569949567238!5m2!1sen!2snp" width="100%" height="675" frameborder="0" style="border:0;" allowfullscreen=""></iframe> -->
							</div>
						</div>
					</div>
				</div>
		</div>
		<?php 
		$args = array(
			'post_type' => 'kindergarden',
			'posts_per_page' => -1,
			'orderby'=> 'title', 
			'order' => 'ASC',

		);
		$allquery = new WP_Query($args);
		if ($allquery->have_posts()) {
			while ($allquery->have_posts()) {
				$allquery->the_post();
				$post_id=get_the_ID();
				$title=get_the_title($post_id);
				$mapGPS = get_post_meta($post_id, 'visit_area', true);
				$markers_all []=[$title,(double)$mapGPS['latitude'],(double)$mapGPS['longitude'],$post_id];
				$address=get_post_meta($post_id, 'visit_address', true) .','. get_post_meta($post_id, 'zip_code', true) .' '. get_post_meta($post_id, 'postal_place', true);
				$link="<a href='".get_the_permalink()."' class='rsltbtn'>BESØK BARNEHAGE</a>";
				$marker_contents_all[]=["<h4>".$title."</h4><p>".$address."</p><p>".$link."</p>"];
			}
			wp_reset_postdata();
		}
		?>

				<div class="loadmore text-center">
					<input type="hidden" id="posts_per_page" name="posts_per_page" value="<?php echo $posts_per_page; ?>" />
					<input type="hidden" id="paged" name="paged" value="2" />
					<input type="hidden" id="markers" value='<?php echo esc_attr_e(json_encode($markers_all));?>'/>
					<input type="hidden" id="marker_contents" value='<?php echo esc_attr_e(json_encode($marker_contents_all));?>'/>
					<input type="hidden" id="total_record" value='<?php echo $total_record;?>' />
					<!-- <button type="button" id="espira_load_more" class="btn btn-block btn-line-espira"><?php _e('Vis flere kindergarden', 'stange');?><?php echo '(' . $load_more_record . ')'; ?></button> -->
				</div>
			</div>
	</section>



	<?php get_footer();?>
