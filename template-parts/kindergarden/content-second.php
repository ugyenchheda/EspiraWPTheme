<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Espira
 */

?>
<!-- Page Slider -->
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
<?php } ?>
<div class="pageSliderWrapper">
		<div class="slider-contentWrapper">
			<div class="container">
				<div class="slider-content">
					<h2><?php the_title();?></h2>
				</div>
			</div>
		</div>
	</div><!-- /Page Slider -->

	<!-- Section Page Content -->
	<section class="pagecontent pagetwo">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<h2 class="txtgreen"><?php _e( 'BARNEHAGEN VAR', 'espira' ); ?></h2>
					<?php echo wpautop( get_post_meta( get_the_ID(), 'content_for_marnehagen', true ) ); ?>
					<div class="imageWrapper">
						<div class="row">
							<?php $marnehagen_daily_galleries = get_post_meta( get_the_ID(), 'marnehagen_daily_galleries', true);
								if(isset($marnehagen_daily_galleries) && !empty($marnehagen_daily_galleries)){
								?>
									<?php foreach($marnehagen_daily_galleries as $marnehagen_daily_gallery) { ?>
									
								<div class="col-md-4">
									<a href="#">
										<figure class="thumbnail-img">
											<img src="<?php echo $marnehagen_daily_gallery; ?>" alt="" class="img-fluid">
										</figure>
									</a>
								</div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="sidebarcolorblockWrapper">
						<div class="colorblock one">
						<?php 
								$pdf_arsplan = get_post_meta(get_the_ID(), 'pdf_one', true); 
								if(isset($pdf_arsplan) && !empty($pdf_arsplan)) {
									echo '<h2>ARSPLAN <a href="'.$pdf_arsplan.'">LAST NED >></a></h2>';
								}
							?>
							<?php 
								$pdf_vedtekter = get_post_meta(get_the_ID(), 'pdf_two', true); 
								if(isset($pdf_arsplan) && !empty($pdf_arsplan)) {
									echo '<h2>VEDTEKTER <a href="'.$pdf_vedtekter.'">LAST NED >></a></h2>';
								}
							?>
						</div>
						<div class="colorblock two">
							<?php 
								$marnehagen_cost = get_post_meta(get_the_ID(), 'marnehagen_cost', true); 
								if(isset($marnehagen_cost) && !empty($marnehagen_cost)) {
								?>
							<figure class="thumbnail-img">
								<img src="<?php echo get_template_directory_uri(); ?>/images/icon4.png" alt="Color Block Image">
							</figure>
							<div class="colorblock-d">
								<h2>KOST-PENGER</h2>
								<p class="boldFont"> <?php echo $marnehagen_cost ?></p>
							</div>
								<?php } ?>
						</div>
						<div class="colorblock three">
						<?php 
								$ukesmenyer_text = get_post_meta(get_the_ID(), 'ukesmenyer_text', true); 
								if(isset($ukesmenyer_text) && !empty($ukesmenyer_text)) {
								?>
							<h3>UKESMENYER</h3>
							<p>
								<?php echo $ukesmenyer_text; ?>
							</p>
								<?php }?>
							<ul>
							<?php $ukesmenyer_lists = get_post_meta( get_the_ID(), 'ukesmenyer_lists', true);
								if(isset($ukesmenyer_lists) && !empty($ukesmenyer_lists)){
								?>
									<?php foreach($ukesmenyer_lists as $ukesmenyer_list) { ?>
									<li><?php echo $ukesmenyer_list; ?></li>
								<?php } ?>
							<?php } ?>
							</ul>
							<a href="#" class="btn-linkv"><?php _e( 'SE VAR UKESMENY HER >>', 'espira' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /Section Page Content -->
	<!-- Section Page Content -->
	<section id="contentBlockWrapper" class="contentBlockWrapper two">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="desc-block cblock bgcolor1">
						<div class="desc-content width100">
							<h2><?php _e( 'AVDELINGER OG KONTAKTTINFO', 'espira' ); ?></h2>
							<p class="txtwhite"><?php _e( 'Her finner du informasjon om vare forskjellige avdelinger og barne-grupper, samt detaljert kontaktinformasjon.', 'espira' ); ?></p>
							<a href="<?php the_permalink(); ?>/?page=ansatte-og-avdelinger" class="flright"><?php _e( 'LES MER', 'espira' ); ?> &gt;&gt;</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="desc-block cblock bgcolor3">
						<figure class="thumbnail-img">
						<?php $employee_details = get_post_meta( get_the_ID(), 'employee_detail', true);
							$employee_details = reset($employee_details);
							$employee_images= $employee_details['employee_image'];
							foreach($employee_images as $employee_image){
								echo '<img src="'.$employee_image.'">';
							}
							?>
							
						</figure>
						<div class="desc-content text-center">
							<h2><?php _e( 'ANSATTE', 'espira' ); ?></h2>
							<p class="txtwhite"><?php _e( 'Treff vare ansatte, laer hvem de er og hva de kan tilby av kompetanse og innsikt.', 'espira' ); ?></p>
							<a href="<?php the_permalink(); ?>/?page=ansatte-og-avdelinger"><?php _e( 'LES MER', 'espira' ); ?> &gt;&gt;</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="desc-block cblock bgcolor1">
						<div class="desc-content width100 text-center">
							<h3 class="bl txtwhite"><?php _e( 'VI HAR PLASS TIL', 'espira' ); ?></h3>
							<h3 class="txtwhite hasnum"><?php echo get_post_meta(get_the_ID(), 'kids_number', true)?></h3>
							<h3 class="bl txtwhite"><?php _e( 'BARN HOS OSS ', 'espira' ); ?> :)</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="twocolblock">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="twocol-left">
							<h3 class="txtred"><?php _e( 'VAR VISJON', 'espira' ); ?></h3>
							<h2 class="txtred font54"><?php _e( 'Sol ute - sol inne', 'espira' ); ?></h2>
							<div class="inline-content">
								<div class="inline-cleft">
									<p><?php _e( 'Vi vil spre sol og godt humor til alle vare brukere, bade barn og foreldre. Dette stiller krav til oss i en travel hverdag, men vi er svaert bevisste pa hvem vi er til for. Vi vil ha noe a strekke oss mot og spordergor vare brukere med jevne mellomrom om hva vi kan gjore bedre. Vi vil behandle hverandre pa samme mate. Vi tror at et godt arbeidsmiljo skaper trivsel og stabilitet. Humor er som kjent smittsomt, bade godt og darlig - da er det viktig a spre det gode humoret.', 'espira' ); ?>
									</p>
								</div>
								<div class="inline-cright">
									<figure class="thumbnail-img">
										<img src="<?php echo get_template_directory_uri(); ?>/images/sunimg.png" alt="Sun Image">
									</figure>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="twocol-right">
							<h3 class="txtwhite"><?php _e( 'VARE VERDIER', 'espira' ); ?></h3>
							<ul>
								<li></li>
								<li><?php _e( 'Fleksibel', 'espira' ); ?></li>
								<li><?php _e( 'Ordentlig', 'espira' ); ?></li>
							</ul>
							<p><?php _e( 'i tillegg til visjonen, skal vare fire kjerneverdier fortelle alle som jobber i organisasjonem hvordan vi skal opptre internt og eksternt. Vare verdier uttrykker hvordan vare ansatte skal forholde seg til barn, foreldre, medarbeidere og samarbeidspartnere. Barn og foreldre skal mote kom-petente voksne som gjor en ordentlig jobb, viser fleksibi-litet og er personlige i motet med barn og voksne.', 'espira' ); ?></p>
							<p><?php _e( 'Barnehagenes planer og Espirastandarder viser hva verdiene innerbaerer, og hvordan de kommer til uttrykk i praksis.', 'espira' ); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /Section Page Content -->


