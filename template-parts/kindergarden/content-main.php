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
$own_video_link = get_post_meta(get_the_ID(), 'own_video_link', true);
if ($own_video_link) {
    ?>
				  <video id="kindergarden_video" width="100%" autoplay loop muted>
				    <source src="<?php echo $own_video_link; ?>" type="video/mp4">
				    <source src="<?php echo $own_video_link; ?>" type="video/ogg">
				  </video>
			<?php } else {?>
			<?php
$video_link = get_post_meta(get_the_ID(), 'video_link', true);
    if ($video_link) {
        ?>
				<div class="video-background">

					<div class="video-foreground">
					    <iframe width="560" height="315" src="<?php echo $video_link; ?>" allow="autoplay" frameborder="0" allowfullscreen allow="autoplay"></iframe>
				    </div>
				</div>
            <?php } else {?>
				<div class="pageSliderWrapper">
					<div id="owl-one" class="owl-carousel owl-theme">
					    <?php $feature_galleries = get_post_meta(get_the_ID(), 'feature_galleries', true);
        if (isset($feature_galleries) && !empty($feature_galleries)) {
            ?>
                            <?php foreach ($feature_galleries as $feature_gallery) {?>
                                <div class="slider-item">
                                <img src="<?php echo $feature_gallery; ?>" class="img-fluid">
                            </div>
                            <?php }?>
                        <?php }?>
                            <?php if(has_post_thumbnail()) { ?>
                                
                                <div class="slider-item">
                                <img src="<?php the_post_thumbnail_url(); ?> " class="img-fluid">
                            </div>
                                <?php } 
                                ?>

					</div>
				</div>
			<?php }
}
if (empty($own_video_link) && empty($video_link) && empty($feature_galleries) && empty(has_post_thumbnail())) {
    $top_img = get_theme_mod('archive_banner',  get_template_directory_uri() . '/images/pagebanner-img.jpg'); ?>
    <img src="<?php echo $top_img;?>" class="img-fluid logo-theme search-logo">
    <?php
}
?>
    <!-- Page Two -->
    <section class="pagecontent pagetwo">
        <div class="container">

            <h2 class="txtgreen"><?php the_title();?></h2> 
            <div class="row">
                <div class="col-md-9">
                    <?php the_content();?>
                    <?php $daily_galleries = get_post_meta(get_the_ID(), 'daily_galleries', true);
                    if (isset($daily_galleries) && !empty($daily_galleries)) {
                        ?>
                        <div class="row first_blockgallery">
                        <?php 
                         $i=0;
                        foreach ($daily_galleries as $daily_gallery) {
                            if ($i < 3) {
                        ?>

                            <div class="col-md-4 text-center">
                                <img src="<?php echo $daily_gallery; ?>" class="img-fluid">
                            </div>
                        <?php }
                        $i++;
                        ?>

                        <?php }?>
                    </div>
                    <?php }?>
                </div>
                <div class="col-md-3 text-center">
                    <?php $web = get_post_meta(get_the_ID(), 'web', true); 
                    if(isset($web) && !empty($web)){ ?>
                        <a href="<?php echo $web; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/promo.png" class="website_feature"></a>
                    <?php } ?>
                </div>
            </div>
            <h3 class="section-heading">BARN ER FYLT AV FANTASTISKE<br> EVNER OG EGENSKAPER</h3><br>
        </div>
	</section><!-- /Page Two -->
    <!-- Department Display -->
    <?php
        $categories = get_the_terms(get_the_ID(), 'kindergarden_nutrition');
        if (!empty($categories) && !is_wp_error($categories)) {
            foreach ($categories as $category) {
                $nutrition_bg = get_term_meta($category->term_id, 'nutrition_bg_img', true);  
                $nutrition_img = get_term_meta($category->term_id, 'nutrition_img', true);                        
                ?>
                <div class="foodsection" data-parallax="scroll" style="background: url(<?php echo $nutrition_bg; ?>)no-repeat; background-size: cover;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="nutrition-image-wrapper">
                                <img src="<?php echo $nutrition_img; ?>"  class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="colorblock three blleft">
                                    <h2><?php echo $category->name; ?></h2>
                                    <p><?php echo $category->description; ?></p>
                                    <?php $cost = get_post_meta(get_the_ID(), 'cost', true);
                                    if (isset($cost) && !empty($cost)) {
                                        ?>
                                        <h2 class="bltxt"><?php _e('KOSTPENGER', 'espira');?> <br><span class="nutrition-cost">KR <?php echo $cost ?>,- PER MND </span></h2>
                                    <?php }?>
                                    <div class="btn-center food-btn">
                                        <a href="<?php echo site_url().'/pedagogisk-innhold/mat-og-maltid/'?>" class="site-btn-white">Les mer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>       
            <?php }
        } ?>


	<?php
$departments = get_the_terms(get_the_ID(), 'kindergarden_department');
if (!empty($departments) && !is_wp_error($departments)) {
    ?>
        <section id="content" class="site-content">
            <div class="container">
                <div class="sitecontentinn">
                    <?php foreach ($departments as $department) {
        $kindergarden_taxonomyavatar = get_term_meta($department->term_id, 'kindergarden_departmentavatar', true);
        $kindergarden_color = get_term_meta($department->term_id, 'kindergarden_department_color', true);
        $department_link = get_term_meta($department->term_id, 'department_link', true);

        ?>
                        <div class="row clearfix myspace">
                        <?php if (!empty($kindergarden_taxonomyavatar)) {?>
                            <div class="col-sm-12 col-md-5 text-center">
                                    <figure class="thumbnail-img text-center">
                                        <img src="<?php echo $kindergarden_taxonomyavatar; ?>" alt="Category Image 1">
                                    </figure>
                            </div>
                            <?php
}?>
                            <div class="col-sm-12 col-md-7">
                                <div class="content-block">
                                    <h2 class="primary-color"><?php echo $department->name; ?></h2>
                                    <p><?php echo $department->description; ?></p>
                                    <?php if(!empty($department_link)){ ?>
                                    <a href="<?php echo $department_link; ?>"  class="btn-linkv"><?php _e('Les mer', 'espira');?> >></a>
                                <?php }?>
                                </div>
                            </div>
                        </div>
                        <?php
}?>
                    <h3 class="section-heading"><?php _e('Vi utvikler fremtidens barnehager', 'espira');?></h3>
                </div>
            </div>
        </section>
	<?php }?>

    <!-- /department display -->

    <?php $daily_galleries = get_post_meta(get_the_ID(), 'daily_galleries', true);
        if (isset($daily_galleries) && !empty($daily_galleries)) {
        ?>
    <!-- gallery -->
    <section id="content" class="site-content lightbg fantastisk-start-wapper">
        <div class="container">
             <h3 class="section-heading"><?php _e('EN FANTASTISK START PA LIVET!', 'espira');?></h3>           
            <div id="owl-three" class="owl-carousel owl-theme">
                <div class="slider-item">
                   
                        <?php
                            $counter = 0;
                            foreach ($daily_galleries as $daily_gallery) {
                            if ($counter == 2) {
                            ?>
                            </div>
                             <div class="slider-item">
                                <?php
                                $counter = 0;
                                }
                                ?>
                                <figure class="thumbnail-img fantastisk-start-img">
                                    <div class="image-border">
                                    <a href="<?php echo $daily_gallery;?>" data-fancybox="gallery" data-caption="">
                                        <img src="<?php echo $daily_gallery; ?>" alt="" class="img-fluid">
                                    </a>
                            </div>
                                </figure>

                            <?php
                            $counter++;
                            }
                        ?>
                   
                </div>
			</div>
      </div>
    </section>
    <?php }?>
    <!-- /gallery -->
    <!-- Category Display -->
    <?php
$categories = get_the_terms(get_the_ID(), 'kindergarden_category');
if (!empty($categories) && !is_wp_error($categories)) {
    foreach ($categories as $category) {
        $kindergarden_taxonomyavatar = get_term_meta($category->term_id, 'kindergarden_taxonomy_avatar', true);
        $kindergarden_category_color = get_term_meta($category->term_id, 'kindergarden_category_color', true);
        $kindergarden_certificate_link = get_term_meta($category->term_id, 'certificate_link', true);
        ?>
                <section id="content" class="skolespira-wrapper"style="background: url(<?php echo $kindergarden_taxonomyavatar; ?>)no-repeat; background-size: cover;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="skolespira-content-box" style="background-color:<?php echo $kindergarden_category_color; ?>">
                                            <h2><?php echo $category->name; ?></h2>
                                            <p><?php echo $category->description; ?></p>
                                            <?php if(!empty($kindergarden_certificate_link)) {?>
                                            <p class="text-right"><a href="<?php echo $kindergarden_certificate_link; ?>" class="btn-linkv">Les mer  &gt;&gt;</a></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
            <?php }
}?>
    <!-- /Category Display -->

    <!-- avdelinger -->
    <section id="content" class="avdelinger-wrapper">
        <div class="container">
            <h3><?php _e('Avdelinger og ansatte', 'espira');?></h3>
            <div class="avdelinger-content-wrapper">
                <div class="row">
                <?php
$personal_informs = get_post_meta(get_the_ID(), 'espira_styrer', true);
if ($personal_informs):
    echo '<div class="col-sm-12 col-md-6">';
?>
                <?php
foreach ($personal_informs as $key => $personal_inform) {
    //if ($personal_inform['employee_rolle'] == 'Styrer') {
        ?>
                    <p>
                        
                        <div class="avdelinger-left">
                            <?php 
                                if(!empty( $personal_inform['styrer_person_image'])){ ?>
                                    <img src="<?php echo $personal_inform['styrer_person_image']; ?>" alt="avdelinger-img1">

                               <?php } else { ?>
                                <img src="<?php echo site_url();?>/wp-content/uploads/2020/01/defaultuserimage.jpg" class="img-fluid kindgergarten_mainemployee">
                              <?php } ?>
                            
                            <p>
                                <?php if($personal_inform['styrer_name']){ ?>
                                <span><strong>Styrer</strong> <br><?php echo $personal_inform['styrer_name']; ?></span>
                            <?php } ?>
                                <?php if($personal_inform['styrer_telefon']){ ?>
                                <span>Tlf: <?php echo $personal_inform['styrer_telefon']; ?></span>
                                <?php } ?>
                                <?php if($personal_inform['styrer_email']){ ?>
                                <span>E-post: <a href="mailto:<?php echo $personal_inform['styrer_email']; ?>"><?php echo $personal_inform['styrer_email']; ?></a></span>
                                <?php } ?>
                            </p>
                            <p><?php echo $personal_inform['styrer_ansatte']; ?></p>
                            <div style="clear:both;width:100%;display:block;"></div>
                        </div>
                    
                    <?php }
                    echo '</div>';
//}
?>

                <?php
foreach ($personal_informs as $key => $personal_inform) {
    if ($personal_inform['employee_rolle'] == 'Fagpedagog') {
        ?>
                    <div class="col-sm-12 col-md-6">
                        <div class="avdelinger-right">
                             <?php 
                                if(!empty( $personal_inform['person_image'])){ ?>
                                    <img src="<?php echo $personal_inform['person_image']; ?>" alt="avdelinger-img1">

                               <?php } else { ?>
                                <img src="<?php echo site_url();?>/wp-content/uploads/2020/01/defaultuserimage.jpg" class="img-fluid kindgergarten_mainemployee">
                              <?php } ?>
                            <p>
                                <?php if($personal_inform['name']){ ?>
                                <span><strong>Fagpedagog</strong><br> <?php echo $personal_inform['name']; ?></span>
                            <?php } ?>
                                <?php if($personal_inform['personel_telefon']){ ?>
                                <span>Tlf: <?php echo $personal_inform['personel_telefon']; ?></span>
                                <?php } ?>
                                <?php if($personal_inform['personel_email']){ ?>
                                <span>E-post: <a href="mailto:<?php echo $personal_inform['personel_email']; ?>"><?php echo $personal_inform['personel_email']; ?></a></span>
                                <?php } ?>
                            </p>
                            <p><?php echo $personal_inform['content_for_ansatte']; ?></p>
                        </div>
                    </div>
                    <?php }
}
?>
                    <?php endif;?>
                </div>

            </div>
        </div>
    </section>
    <!-- //avdelinger -->

    <section id="multi-tab-wrapper">
        <div class="multi-tab-section">
            <div class="full-color-bgbox"></div>
            <div class="container"> 
                <ul class="nav nav-tabs" role="tablist">
                    
                    <?php 
                        $employee_roles = get_post_meta(get_the_ID(), 'role', true);
                        if($employee_roles):
                            echo '<div id="owldep" class="owl-carousel"> ';
                            $val = 0;
                            foreach($employee_roles as $employee_role) {   
                            $b = $val++;
                            if($b == 0){
                                $active = 'active';
                            }else {
                                $active = '';
                            }
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link <?php echo $active;?>" href="#<?php echo $val++; ?>a" role="tab" data-toggle="tab"><?php echo $employee_role['role_title']; ?></a>
                            </li>
                        
                        <?php  
                        }
                        echo '</div>';
                    endif;
                    ?> 
                    
                </ul>
                
                <?php
                $val = 0;
                if($employee_roles):
                    echo '<div class="tab-content">';
                    foreach($employee_roles as $employee_role) {    
                        $b = $val++;
                        if($b == 0){
                        $active = 'active show';
                        }else {
                        $active = '';
                        }   
                    ?>
                        <div role="tabpanel" class="tab-pane fade in <?php echo $active;?>" id="<?php echo $val++; ?>a">
                            <div class="tab tab-details-content ">
                                            <div class="tab-content-section">
                                                <div class="tab-details-heading">
                                                    <h3><?php echo $employee_role['role_title']; ?></h3>
                                                    <h4><?php echo $employee_role['personel_telefon']; ?></h4>
                                                </div>

                                                <div class="row">
                                                    <?php 
                                                    $personal_informs = get_post_meta(get_the_ID(), 'personell', true);
                                                    if(!empty($personal_informs)):
                                                    $demo_img = get_template_directory_uri() . '/images/employee.png';
                                                        foreach ($personal_informs as $key => $personal_inform) {
                                                            if ($employee_role['role_title'] == $personal_inform['role']) {
                                                                if ($personal_inform['role'] != 'Styrer' && $personal_inform['role'] != 'Fagpedagog' && $personal_inform['humanid'] != '') {?>

                                                                    <div class="tab-detailstab col-sm-12 col-md-3">
                                                                    <?php
                                                                        if($personal_inform['person_image']) { 
                                                                            echo '<img class="img-fluid" src="'.$personal_inform['person_image'].'"
                                                                            alt="avdelinger-img1">';
                                                                        } else {
                                                                            echo '<img class="img-fluid" src="'.$demo_img.'"
                                                                            alt="avdelinger-img1">';
                                                                        }
                                                                        ?>
                                                                    
                                                                        <span><?php echo $personal_inform['name']; ?></span>
                                                                        <h4><?php echo $personal_inform['title']; ?></h4>
                                                                    </div>
                                                                    <?php }
                                                            }
                                                        }
                                                    endif;
                                                        ?>
                                                </div>
                                                <p class="text-center"><?php echo $employee_role['role_details']; ?></p>
                                            </div>
                                        </div>
                        </div>
                    <?php }
                    echo '</div>';
                   endif;
                ?>
                
            </div>
        </div>
    </section>
    <!-- //Tabs -->



    <!-- video gallery section -->
    <?php $kindergarden_videos = get_post_meta(get_the_ID(), 'video_links', true);
if (isset($kindergarden_videos) && !empty($kindergarden_videos)) {
    ?>
        <section id="content" class="video-gallery-wrapper">
            <div class="container">
                <h3 class="section-heading"><?php _e('Video', 'espira');?></h3>

                <div class="video-container">
                    <div id="owl-four" class="owl-carousel owl-theme">
                        <?php
$counter = 0;
    foreach ($kindergarden_videos as $kindergarden_video) {?>
                            <div class="slider-item">
                                <figure class="thumbnail-img video-thumb">
                                    <a href="<?php echo $kindergarden_video['body_videolink']; ?>" data-fancybox="gallery" data-caption="<?php echo $kindergarden_video['body_videotitle']; ?>">
                                        <!-- <video class="gallery-video" src="<?php //echo $kindergarden_video['body_videolink']; ?>" alt="videos"> -->
                                        
                                        <?php 
                                        $url = $kindergarden_video['body_videolink'];
                                        echo wp_oembed_get( $url );?>
                                    </a>
                                </figure>
                                <h4><?php echo $kindergarden_video['body_videotitle']; ?></h4>
                            </div>
                        <?php }
    ?>
                    </div>
                </div>
            </div>
        </section>
    <?php }?>
    <!-- //video gallery section -->



    <!-- kom-innom section -->
    <?php
$background_image = get_post_meta(get_the_ID(), 'visiting_hour_bg', true);
 ?>
    <section id="content" class="kom-innom-wrapper" style="background: url(<?php if(isset($background_image) && !empty($background_image)){echo $background_image; } else {echo get_template_directory_uri().'/images/apenthusbg.jpg'; } ?>) no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-6 col-lg-5 offset-lg-7 col-xl-4 offset-xl-8">
                    <div class="kom-innom-content">
                    <h3><?php _e('Kom innom og se Hvordan vi har det!', 'espira');?></h3>
                        <div class="apent-hus-box">
                        <h4><?php _e('ÅPENT HUS', 'espira');?></h4>
						<div class="min-height-block">
						<?php $detail_open_visiting = get_post_meta(get_the_ID(), 'detail_open_visiting', true);
echo '<p>' . $detail_open_visiting . '</p>';
?>
						<ul>
						<?php $visiting_dates = get_post_meta(get_the_ID(), 'open_date_visiting', true)?>
						<?php foreach ($visiting_dates as $visiting_date) {?>

									<li><?php echo $visiting_date; ?></li>
								<?php }?>
						</ul>
                        </div>
                        <div class="btn-center kom-innom-btn">
                            <?php $visiting_email = get_post_meta(get_the_ID(), 'email', true);?>
                            <a href="mailto:<?php echo $visiting_email; ?>" class="site-btn-yellow">Book Dag Her >></a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //kom-innom section -->
    		<!-- Mapcontact Block -->
	<section class="mapcontact clearfix">
		<div class="site-map">
			<?php
$mapGPS = get_post_meta(get_the_ID(), 'visit_area', true);
//echo $mapGPS['latitude'];
//echo $mapGPS['longitude'];
?>

			<div id="map" style="height: 350px;" class="kindergarden_map"></div>

            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBr2q08BHCBK-HWA3y0InCwKsCcxPwHDcU&callback=initMap"></script>
              <script>
                    function initMap() {
                        var uluru = {lat: <?php echo $mapGPS['latitude'] ?>, lng: <?php echo $mapGPS['longitude'] ?>};
                        var map = new google.maps.Map(
                            document.getElementById("map"), {zoom: 16, center: uluru});
                        var marker = new google.maps.Marker({position: uluru, map: map});
                    }
                </script>
		    </div>
		<div class="site-contact">
			<div class="contact-inner">
				<h2><?php _e('HVOR I ALL VERDEN?', 'espira');?></h2>
				<div class="cinner-blockWrapper">
					<div class="cinner-block">
						<h5><?php _e('ESPIRA', 'espira');?></h5>
						<?php $visiting_adress_1 = get_post_meta(get_the_ID(), 'visit_address', true);
if (isset($visiting_adress_1) && !empty($visiting_adress_1)) {
    ?>
						<p class="boldFont">
							<?php echo $visiting_adress_1; ?>
						</p>
							<?php }?>



							<?php $phone = get_post_meta(get_the_ID(), 'phone', true);
if (isset($phone) && !empty($phone)) {
    ?>
							<?php echo 'Telefon:<a href="tel:'.$phone.'">' . $phone . '</a><br>'; ?>
							<?php }?>


							<?php $email = get_post_meta(get_the_ID(), 'email', true);
if (isset($email) && !empty($email)) {
    ?>
							<?php echo 'E-post:<a href="mailto:'.$email .'">' . $email . '</a><br>'; ?>
							<?php }?>

						</p>

						<?php $facebook = get_post_meta(get_the_ID(), 'facebook', true);
if (isset($facebook) && !empty($facebook)) {
    ?>
								<figure class="thumbnail-img">
								<a href="<?php echo $facebook; ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/images/facebook-icon.png" alt="Facebook Icon">
								</a>
								</figure>
							<?php }?>


						<?php $instagram = get_post_meta(get_the_ID(), 'instagram', true);
if (isset($instagram) && !empty($instagram)) {
    ?>
								<figure class="thumbnail-img">
								<a href="<?php echo $instagram; ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/images/instagram-icon.png" alt="instagram Icon">
								</a>
								</figure>
							<?php }?>


							<?php $youtube = get_post_meta(get_the_ID(), 'youtube', true);
if (isset($youtube) && !empty($youtube)) {
    ?>
									<figure class="thumbnail-img">
									<a href="<?php echo $youtube; ?>">
										<img src="<?php echo get_template_directory_uri(); ?>/images/youtube-icon.png" alt="youtube Icon">
									</a>
									</figure>
								<?php }?>


							<?php $linkedin = get_post_meta(get_the_ID(), 'linkedin', true);
if (isset($linkedin) && !empty($linkedin)) {
    ?>
									<figure class="thumbnail-img">
									<a href="<?php echo $linkedin; ?>">
										<img src="<?php echo get_template_directory_uri(); ?>/images/linkedin-icon.png" alt="linkedin Icon">
									</a>
									</figure>
								<?php }?>


					</div>
					<div class="cinner-block">

						<?php
$personal_informs = get_post_meta(get_the_ID(), 'espira_styrer', true);
if ($personal_informs):
?>
								 <h5><?php _e('STYRER', 'espira');?>:</h5>
								  <?php
foreach ($personal_informs as $key => $personal_inform) {
    if ($personal_inform['styrer_name']) {
        ?>
								  	<p>
										<?php echo $personal_inform['styrer_name'] . ', ' . $personal_inform['styrer_telefon']; ?><br>
										<?php echo $personal_inform['styrer_email']; ?>
									</p>
								  <?php }
}
?>

								  <h5 class="hasmargin"><?php _e('FAGPEDAGOG', 'espira');?>:</h5>

								  <?php
foreach ($personal_informs as $key => $personal_inform) {
    if ($personal_inform['employee_rolle'] == 'Fagpedagog') {
        ?>
									  	<p>

											<?php echo $personal_inform['name'] . ', ' . $personal_inform['personel_telefon']; ?><br>
											<?php echo $personal_inform['personel_email']; ?>
										</p>
								  <?php }
}
?>


								  <?php endif;?>
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
						<h5><?php _e('ÅPNINGSTIDER', 'espira');?></h5>
						<p><?php
$opening_hours = get_post_meta(get_the_ID(), 'opening_days', true);
if ($opening_hours) {
    echo $opening_hours;
}
?>
						</p>


							<?php $cost = get_post_meta(get_the_ID(), 'cost', true);
if (isset($cost) && !empty($cost)) {
    ?>
                                <h5 class="hasmargin"><?php _e('KOSTPENGER', 'espira');?></h5>
                                <p>KR <?php echo $cost ?>, -PER AR </p>
                            <?php }?>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /Mapcontact Block -->
	<!-- Statistics Block -->
	<section id="statistics" class="statistics">
    <?php 
    $parent_iframe = get_post_meta(get_the_ID(), 'parent_iframe', true);
    $employees_iframe = get_post_meta(get_the_ID(), 'employees_iframe', true);
    $employee_education_iframe = get_post_meta(get_the_ID(), 'employee_education_iframe', true);
    if( $parent_iframe || $employees_iframe ||  $employee_education_iframe) {?>

            <h4><?php _e('STATISTIKK FRA BARNEHAGEFAKTA.NO', 'espira');?></h4>
    <?php } ?>
            <div class="stat-blockWrapper">
                <div class="container">
                <div class="row">
                    <?php  if (isset($parent_iframe) && !empty($parent_iframe)) { ?>
                    <div class="col-md-4">
                        <div class="stat-block clearfix">
                                <?php	echo $parent_iframe; ?>
                        </div>
                    </div>
                    <?php }?>

                    <?php  if (isset($employees_iframe) && !empty($employees_iframe)) { ?>
                    <div class="col-md-4">
                        <div class="stat-block clearfix">
                                <?php	echo $employees_iframe; ?>
                        </div>
                    </div>
                    <?php }?>

                    <?php if (isset($employee_education_iframe) && !empty($employee_education_iframe)) { ?>
                    <div class="col-md-4">
                        <div class="stat-block clearfix">
                                <?php	echo $employee_education_iframe; ?>
                        </div>
                    </div>
                    <?php }?>
            </div>
            </div>
           <?php if( $parent_iframe || $employees_iframe ||  $employee_education_iframe) {?>
            <div class="btn-center">
                    <a href="http://barnehagefakta.no/barnehage/1015752/espira-aarkjar-barnehage" class="site-btn" target="_blank"><?php _e('FLERE TALL PA BARNEHAGEFAKTA.NO', 'espira');?> &gt; &gt;</a>
            </div>
            
    <?php } ?>
		</div>
    </section>

    <section id="content" class="two-col-ctabox">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    
                                <?php $samarbeidsutvalg_description = get_post_meta(get_the_ID(), 'samarbeidsutvalg_description', true);
                                $samarbeidsutvalg_link = get_post_meta(get_the_ID(), 'samarbeidsutvalg_link', true);
                                if (isset($samarbeidsutvalg_description) && !empty($samarbeidsutvalg_description)) {
                                    echo $samarbeidsutvalg_description;}
                                ?>
                                <?php if (isset($samarbeidsutvalg_link) && !empty($samarbeidsutvalg_link)) {?>
                    <div class="cta-green-btn">
                        <h4>Samarbeidsutvalg</h4>
                            <div class="btnwrapper-green text-right">
                                <a class="outline-cta-btn text-right" href="<?php echo $samarbeidsutvalg_link ?>"><?php _e('Les mer ', 'espira');?> &gt;&gt;</a>
                            </div>
                    </div>
                        <?php }?>
                </div>
                <div class="col-md-12 col-lg-6">
                <?php
$pdf_arsplan = get_post_meta(get_the_ID(), 'pdf_one', true);
if (isset($pdf_arsplan) && !empty($pdf_arsplan)) {?>
    <div class="cta-blue-btn">
        <h4><?php _e('LES OG LAST NED VÅR ÅRSPLAN', 'espira');?> <a class="outline-cta-btn text-right" href="<?php echo $pdf_arsplan; ?>" target="_blank">&gt;&gt;</a></h4>
    </div>
<?php }?>
<?php
$pdf_vedtekter = get_post_meta(get_the_ID(), 'pdf_two', true);
if (isset($pdf_vedtekter) && !empty($pdf_vedtekter)) {?>
                        <div class="cta-blue-btn">
                            <h4><?php _e('LES VÅRE VEDTEKTER', 'espira');?><a class="outline-cta-btn text-right" href="<?php echo $pdf_vedtekter; ?>" target="_blank">&gt;&gt;</a></h4>
                        </div>
                <?php }?>
                </div>
            </div>
        </div>
    </section>