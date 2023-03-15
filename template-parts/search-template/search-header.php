<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Espira
 */

?>
<!-- Search Page Header -->
			<section id="content" class="site-content search">
		<div class="container">
			<div class="search-headingbox">
				<h2 class="primary-color"><?php _e('FINN DIN ESPIRA-BARNEHAGE', 'espira');?></h2>
			</div>
			<input type="hidden" id="lat" name="lat" value="">
			<input type="hidden" id="lng" name="lng" value="">
			<!-- <form class="form searchform">
				<div class="form-group">
				<?php  //$sok=$_REQUEST['sok'];?>
					<input type="text" id="chheda-map" class="form-control" name="name" placeholder="Søk etter sted eller postnummer" value="<?php //echo  $sok??'';?>">
					<input type="hidden" id="lat" name="lat" value="">
					<input type="hidden" id="lng" name="lng" value="">

				</div>
				<div class="form-group">
					<button type="button" class="btn site-btn"><?php //_e('FINN', 'espira');?></button>
				</div>
				<div class="form-group">
					<button type="button" class="btn site-btn"><?php //_e('FINN NÆRMESTE', 'espira');?><span class="borderline"></span></button>
				</div>
			</form> -->

			<!-- Main Box -->
			<div id="sresultmain" class="sresultmain">
				<div class="rslt-heading">
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<div class="rslt-left">
								<h4>
								<?php 
								if(($_REQUEST['sok']!='')||($_REQUEST['municipality']!='')||($_REQUEST['zipcode']!='')){
									$count='-';
								}
								else{
									$args = array(
										'post_type' => 'kindergarden'
									);
									$total_record_query=new WP_Query($args);
									$count= $total_record_query->found_posts??'-';

								}
									
									
								?>
									TREFF PÅ <span>NÆRMESTE</span>: <span id="display-search-total" style="color:#fff"> <?php echo $count;?></span>
									<br><span id="display-search-location" style="color:#fff"><?php echo $_REQUEST['sok']??'';?></span>
								</h4>
							</div>
						</div>
						<div class="col-md-7 col-sm-8">
							<div class="rslt-middle">
								<p><?php _e('Barnehager etter fylker, kommuner, byer og byleder', 'espira');?>:</p>
								<form class="selectgrp">
									<div class="form-group">
										<select class="selectpicker form-control" id="municipality">
											<?php
												$kindergarden_municipality = get_meta_location('fylke', 'kindergarden');
												$repetation_municipality = array_filter($kindergarden_municipality);
												$main_municipality = array_unique($repetation_municipality);
												sort($main_municipality);
												echo '<option value="">Fylke</option>';
												foreach ($main_municipality as $key => $value):
													echo '<option value="' . $value . '">' . $value . '</option>';
												endforeach;
											?>
										</select>
									</div>
									<div class="form-group">
										<select class="selectpicker form-control" id="zipcode">

										<?php
											$kindergarden_postal_place = get_meta_location('postal_place', 'kindergarden');
											$postal_place = array_filter($kindergarden_postal_place);
											$main_postal_place = array_unique($postal_place);
											sort($main_postal_place);
											echo '<option value="">Sted</option>';
											foreach ($main_postal_place as $key => $value):
											echo '<option value="' . $value . '">' . $value . '</option>';
											endforeach;
										?>
										</select>
									</div>
								</form>
								<a href="<?php echo site_url();?>/finn-barnehage/" class="reset-search">Tøm søket</a>
							</div>
						</div>
						<div class="col-md-2 col-sm-4">
							<div class="rslt-right">
								<p><?php _e('Visning', 'espira');?>:</p>
								<div class="listview">
									<ul>
										<li class="gridmain">
											<a href="javascript:void(0)" class="squborder">
												<span></span>
												<span></span>
												<span></span>
												<span></span>
											</a>
										</li>
									<!-- 	<li class="listmain">
											<a href="javascript:void(0)" class="list-view">
												<span class="borderline"></span>
												<span class="borderline"></span>
											</a>
										</li> -->
										<li class="active firsmain">
											<a href="javascript:void(0)" class="circleborder wholemap">
												<span class="circleline"></span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
