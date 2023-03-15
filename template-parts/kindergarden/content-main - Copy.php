<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Espira
 */

?><!-- Page Slider -->
			<?php
			$own_video_link = get_post_meta( get_the_ID(), 'own_video_link', true );
			if($own_video_link ) {
			?>
				  <video id="kindergarden_video" width="100%" autoplay loop muted>
				    <source src="<?php echo $own_video_link; ?>" type="video/mp4">
				    <source src="<?php echo $own_video_link; ?>" type="video/ogg">
				  </video>
			<?php }  

			else { ?>

			<?php
			$video_link = get_post_meta( get_the_ID(), 'video_link', true );
			if($video_link ) {
			?>
				<div class="video-background">
					<div class="video-foreground">
					<iframe width="560" height="315" src="<?php echo $video_link; ?>" frameborder="0" allowfullscreen allow="autoplay"></iframe>
				</div>
				</div>
			<?php }  else { ?>
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


					<div class="category-contentWrapper large-Screen">
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

				</div>
			<?php } 
		} ?>
		<div class="pageSliderWrapper">
			<div class="slider-contentWrapper">
				<div class="container">
					<div class="slider-content">
						<h2><?php the_title();?></h2>
					</div>
				</div>
			</div>
		</div><!-- /Page Slider -->
	<section id="fourblock" class="fourblock">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-3">
					<div class="column-block one">
						
						<h2><?php _e( 'BARNEHAGEN', 'espira' ); ?><br><?php _e( 'VÅR', 'espira' ); ?></h2>
						<?php $marnehagen=  wpautop( get_post_meta( get_the_ID(), 'content_for_marnehagen', true ) );
							$trimmed_marnehagen = substr( strip_tags($marnehagen) , 0, 110);
							echo '<div class="min-height-block"><p>'.$trimmed_marnehagen.'</p></div>';
						?>
						<a href="<?php the_permalink(); ?>/?page=barnehagen-var" class="btn-linkv">LES MER >></a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-3">
					<div class="column-block two">
						<h2>VISJON & <br> VERDIER</h2>
						<div class="min-height-block">
							<p>
								Vi vil spre sol og godt humør til alle våre brukere, både barn og foreldre. Dette stiller krav til oss i en travel hverdag.
							</p>
						</div>
						<a href="<?php the_permalink(); ?>/?page=barnehagen-var" class="btn-linkv">LES MER >></a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-3">
					<div class="column-block three">
					<h2><?php _e( 'VISJON', 'espira' ); ?> & <br><?php _e( 'VERDIER', 'espira' ); ?></h2>
						<?php $ansatte=  wpautop( get_post_meta( get_the_ID(), 'content_for_ansatte', true ) );
							$trimmed_ansatte = substr( $ansatte, 0, 100);
							echo '<div class="min-height-block"><p>'.$trimmed_ansatte.'</p></div>';
						?>
						<a href="<?php the_permalink(); ?>/?page=ansatte-og-avdelinger" class="btn-linkv">LES MER >></a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-3">
					<div class="column-block four">
						<h2><?php _e( 'ÅPENT HUS', 'espira' ); ?></h2>
						<div class="min-height-block">
						<?php $visiting_date= get_post_meta( get_the_ID(), 'detail_open_visiting', true );
							echo '<p>'.$visiting_date.'</p>';
						?>
						<ul>
						<?php $visiting_dates= get_post_meta( get_the_ID(), 'open_date_visiting', true ) ?>
						<?php foreach($visiting_dates as $visiting_date) { ?>
							
									<li><?php echo $visiting_date; ?></li>
								<?php } ?>
						</ul>
							</div>
						<?php $visiting_email= get_post_meta( get_the_ID(), 'email', true );?>
						<a href="mailto:<?php echo $visiting_email;?>" class="btn-linkv">BOOK DAG HER >></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Page Slider 2 -->
	<?php $daily_galleries = get_post_meta( get_the_ID(), 'daily_galleries', true);
		if(isset($daily_galleries) && !empty($daily_galleries)){
	?>
	<section id="fourSliderWrapper" class="fourSliderWrapper">
		<div class="container">
			<h3><?php _e( 'EN FANTASTISK START PÅ LIVER!', 'espira' ); ?></h3>

			<div id="owl-two" class="owl-carousel owl-theme">
				<?php foreach($daily_galleries as $daily_gallery) { ?>

				<div class="slider-item">
					<figure class="thumbnail-img">
						<img src="<?php echo $daily_gallery; ?>" alt="" >
					</figure>
				</div>
			<?php } ?>
			</div>
		<?php } ?>
		<a href="#" class="btn-linkv"><?php _e( 'SE HELE BILDEGALLERIET ', 'espira' ); ?> &gt;&gt;</a>
		</div>
	</section><!-- /Page Slider 2 -->
	
	<?php
			$departments = get_terms( 'kindergarden_department' );	
			if ( ! empty( $departments ) && ! is_wp_error( $departments ) ){
		?>		
		<section id="contentBlockWrapper" class="contentBlockWrapper">
			<div class="container">
				<div class="row">
						<?php foreach ( $departments as $department ) {
						$kindergarden_taxonomyavatar = get_term_meta($department->term_id, 'kindergarden_departmentavatar', true);
						$kindergarden_color = get_term_meta($department->term_id, 'kindergarden_department_color', true);
						if(!empty($kindergarden_taxonomyavatar)) {	
						?>
						<div class="col-md-4 col-sm-4">
						<div class="desc-block cblock bgcolor1" style="background: <?php echo $kindergarden_color;?>">
							<figure class="thumbnail-img">
								<img src="<?php echo $kindergarden_taxonomyavatar; ?>" alt="Category Image 1">
							</figure>
							<div class="desc-content">
									<h3><?php echo $department->name; ?></h3>
									<p><?php echo $department->description; ?></p>
								<a href="<?php echo get_term_link( $department->term_id, 'kindergarden_department' ); ?>"><?php _e( 'Les Mer ', 'espira' ); ?> >></a>
						</div>
						</div>
						</div>
						<?php
						}
					} ?>	
				</div>
			</div>
		</section>
	<?php } ?>

		<!-- Mapcontact Block -->
		<section class="mapcontact clearfix">		
		
		<div class="site-map">
			<?php 
			$mapGPS = get_post_meta( get_the_ID(), 'visit_area', true );
			//echo $mapGPS['latitude'];
			//echo $mapGPS['longitude'];
			 ?>

			<div id="map" style="height: 350px;"></div>
			<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBr2q08BHCBK-HWA3y0InCwKsCcxPwHDcU&callback=initMap">
</script>
			<script>
				function initMap() {
					var uluru = {lat: <?php echo $mapGPS['latitude']?>, lng: <?php echo $mapGPS['longitude']?>};
					var map = new google.maps.Map(
						document.getElementById("map"), {zoom: 16, center: uluru});
					var marker = new google.maps.Marker({position: uluru, map: map});
				}
			</script>

		</div>
		<div class="site-contact">
			<div class="contact-inner">
				<h2><?php _e( 'HVOR I ALL VERDEN?', 'espira' ); ?></h2>
				<div class="cinner-blockWrapper">
					<div class="cinner-block">
						<h5><?php _e( 'ESPIRA', 'espira' ); ?></h5>
						<?php $visiting_adress_1 = get_post_meta(get_the_ID(), 'visit_address_1', true);
							if(isset($visiting_adress_1) && !empty($visiting_adress_1)){
							?>
						<p class="boldFont">
							<?php echo $visiting_adress_1 ;?>
						</p>
							<?php } ?>
						
						<p><?php $visit_area = get_post_meta(get_the_ID(), 'visit_area', true);
							if(isset($visit_area) && !empty($visit_area)){
							?>
							<?php echo $visit_area. '<br>';?>
							<?php } ?>

							<?php $phone = get_post_meta(get_the_ID(), 'phone', true);
							if(isset($phone) && !empty($phone)){
							?>
							<?php echo 'Telefon:' .$phone. '<br>';?>
							<?php } ?>

							
							<?php $email = get_post_meta(get_the_ID(), 'email', true);
							if(isset($email) && !empty($email)){
							?>
							<?php echo 'E-post:' .$email. '<br>';?>
							<?php } ?>

						</p>

						<?php $facebook = get_post_meta(get_the_ID(), 'facebook', true);
							if(isset($facebook) && !empty($facebook)){
							?>
								<figure class="thumbnail-img">
								<a href="<?php echo $facebook; ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/images/facebook-icon.png" alt="Facebook Icon">
								</a>
								</figure>
							<?php } ?>
							

						<?php $instagram = get_post_meta(get_the_ID(), 'instagram', true);
							if(isset($instagram) && !empty($instagram)){
							?>
								<figure class="thumbnail-img">
								<a href="<?php echo $instagram; ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/images/instagram-icon.png" alt="instagram Icon">
								</a>
								</figure>
							<?php } ?>
							

							<?php $youtube = get_post_meta(get_the_ID(), 'youtube', true);
								if(isset($youtube) && !empty($youtube)){
								?>
									<figure class="thumbnail-img">
									<a href="<?php echo $youtube; ?>">
										<img src="<?php echo get_template_directory_uri(); ?>/images/youtube-icon.png" alt="youtube Icon">
									</a>
									</figure>
								<?php } ?>
							

							<?php $linkedin = get_post_meta(get_the_ID(), 'linkedin', true);
								if(isset($linkedin) && !empty($linkedin)){
								?>
									<figure class="thumbnail-img">
									<a href="<?php echo $linkedin; ?>">
										<img src="<?php echo get_template_directory_uri(); ?>/images/linkedin-icon.png" alt="linkedin Icon">
									</a>
									</figure>
								<?php } ?>

					
					</div>
					<div class="cinner-block">
						
						<?php 
							$personal_informs = get_post_meta( get_the_ID(), 'personell', true );
							if($personal_informs):
							?>														
								 <h5><?php _e( 'STYRER', 'espira' ); ?>:</h5> 
								  <?php 								 
								  foreach ($personal_informs as $key => $personal_inform) { 
									 if($personal_inform['role'] == 'Styrer') { 
									  ?>
								  	<p>
										<?php echo $personal_inform['name']. ', '.$personal_inform['personel_telefon'] ;  ?><br>
										<?php echo $personal_inform['personel_email'];  ?>	
									</p>		
								  <?php }
								  }								  
								  ?>
								  
								  <h5 class="hasmargin"><?php _e( 'FAGPEDAGOG', 'espira' ); ?>:</h5>
								   
								  <?php 
								  foreach ($personal_informs as $key => $personal_inform) { 
									 if($personal_inform['role'] == 'Fagpedagog') { 
									  ?>
									  	<p>
								  
											<?php echo $personal_inform['name']. ', '.$personal_inform['personel_telefon'] ;  ?><br>
											<?php echo $personal_inform['personel_email'];  ?>	
										</p>	
								  <?php }
								  }								  
								  ?>
								  
								 
								  <?php endif; ?>
						<!-- <p>
							Tone Mila, 98 90 57 79 <br>
							tone.mila@espira.no
						</p> -->
						<!-- <h5 class="hasmargin"><?php //_e( 'FAGPEDAGOG', 'espira' ); ?>:</h5> -->
						<!-- <p>
							Linda Fromreide, <br>
							linda.fromreide@espira.no
						</p> -->
					</div>
					<div class="cinner-block">
						<h5><?php _e( 'AONINGSTIDER', 'espira' ); ?></h5>
						<p><?php 
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
						if($monday_open){
							echo 'Mandag:  ' .$monday_open. ' - ' .$monday_close. '<br>';
						}
						
						if($tuesday_open){
							echo 'Tirsdag:  ' .$tuesday_open. ' - ' .$tuesday_close. '<br>';
						}
						
						if($wednesday_open){
							echo 'Onsdag:  ' .$wednesday_open. ' - ' .$wednesday_close. '<br>';
						}
						
						if($thursday_open){
							echo 'Torsdag:  ' .$thursday_open. ' - ' .$thursday_close. '<br>';
						}
						
						if($friday_open){
							echo 'Fredag:  ' .$friday_open. ' - ' .$friday_close. '<br>';
						}
					?>
						</p>
							

							<?php $marnehagen_cost = get_post_meta(get_the_ID(), 'marnehagen_cost', true);
								if(isset($marnehagen_cost) && !empty($marnehagen_cost)){
								?>

						<h5 class="hasmargin"><?php _e( 'KOSTPENGER', 'espira' ); ?></h5>
						<p>
								<?php echo $marnehagen_cost ?>
						</p>
								<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /Mapcontact Block -->
	
	<!-- Statistics Block -->
	<section id="statistics" class="statistics">
					<h4><?php _e( 'STATISTIKK FRA BARNEHAGEFAKTA.NO', 'espira' ); ?></h4>
					
					<div class="stat-blockWrapper">
						<div class="container">
						<div class="row">
							<?php $parent_iframe = get_post_meta(get_the_ID(), 'parent_iframe', true);
								if(isset($parent_iframe) && !empty($parent_iframe)){
									?>
							<div class="col-md-4">
								<div class="stat-block clearfix">
										<?php	echo $parent_iframe; ?>
								</div>
							</div>
							<?php } ?>

							<?php $employees_iframe = get_post_meta(get_the_ID(), 'employees_iframe', true);
										if(isset($employees_iframe) && !empty($employees_iframe)){
										?>
							<div class="col-md-4">
								<div class="stat-block clearfix">
										<?php	echo $employees_iframe; ?>
								</div>
							</div>
							<?php } ?>
							
							<?php $employee_education_iframe = get_post_meta(get_the_ID(), 'employee_education_iframe', true);
										if(isset($employee_education_iframe) && !empty($employee_education_iframe)){
										?>
							<div class="col-md-4">
								<div class="stat-block clearfix">
										<?php	echo $employee_education_iframe; ?>
								</div>
							</div>
							<?php } ?>
					</div>
					</div>
					
					
					<div class="btn-center">
							<a href="#" class="site-btn">FLERE TALL PA BARNEHAGEFAKTA.NO &gt; &gt;</a>
					</div>
			</div>
	</section>
	<script type="text/javascript">
    document.getElementById('kindergarden_video').play();
	</script>