<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Espira
 */

?>

<footer id="footer" class="site-footer">
		<div class="container">
			<div class="footertop">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<?php dynamic_sidebar('footer-1');?>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<?php dynamic_sidebar('footer-2');?>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<?php dynamic_sidebar('footer-3');?>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<?php dynamic_sidebar('footer-4');?>
					</div>                    
				</div>
			</div>
		</div>
		<div class="footerbtm">
			<div class="container">
				<div class="row">
				<?php dynamic_sidebar('social');?>
					<div class="col-md-5 col-sm-12">
					<?php
						$copyright = get_theme_mod('btm_footer_text');
						$footer_text = get_theme_mod('footer_text');
						$footer_text_link = get_theme_mod('link_footer_text');
					?>
						<p class="footer-text"><?php echo $copyright; ?> |  <a href="<?php echo $footer_text_link; ?>" class="loginLink"><?php echo $footer_text; ?></a></p>
					</div>
					<div class="col-md-7 col-sm-12">
						<?php
							$cookies_text = get_theme_mod('cookies_policy');
							$cookies_policy_link = get_theme_mod('cookies_policy_link');
						?>
					<p class="cookies-text"><a href="<?php echo $cookies_policy_link; ?>" class="cookies-link"><?php echo $cookies_text; ?></a></p>
					</div>
				</div>
			</div>
</div>
	</footer>
<?php wp_footer();?>

</body>
</html>
