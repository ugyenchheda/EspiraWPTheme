<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Espira
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<?php wp_head(); ?>
	<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-58614783-1', 'auto');
ga('send', 'pageview');
</script>
<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5LMTJ7F');</script>

<!-- End Google Tag Manager -->

<body>

<!-- Google Tag Manager (noscript) -->

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5LMTJ7F" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- End Google Tag Manager (noscript) -->
</head>
<body <?php body_class(); ?>>
	<!-- Site Header -->
		<!-- Site Navigation -->
	<!-- Site Navigation -->
	<div class="site-navigation">
		<div class="bgoverlay">
		</div>
		<div class="navWrapper">
			<button class="closebtn">×</button>
			<div class="navin-wrap">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'container_class' => '',
					'nav' => 'false',
					'menu_id'  => '',
				) );
				?>
				<div class="nav-inner">
					<h4><?php _e( 'VIL DU BESØKE OSS?', 'espira')?></h4>
					<p><?php _e( 'Velg en av de markerte dagene i kalenderen under :)', 'espira')?></p>
				</div>
				<div class="nav-calendar">
					
				</div>
				<figure class="thumbnail-img">
					<a href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/images/goicon.png" alt="Go Ahead">
					</a>
				</figure>
			</div>
		</div>
	</div><!-- /site navigation -->


	<header id="header" class="site-header">
		<div class="container">
			<div class="searchheadwrap">
				<div class="site-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sitelogo">
						<?php
						//$transparent_logo = get_theme_mod('transparent_logo',  get_template_directory_uri(). '/images/espira-logo.png');
						$search_logo = get_theme_mod('search_logo',  get_template_directory_uri(). '/images/espira-logo.png');


						if(!empty($search_logo)){
							echo '<img src="'.$search_logo.'" class="img-fluid logo-theme search-logo">';
						}

						?>
					</a>
				</div>
				<div class="header-text">
					<h4><?php the_title();?> | <span>APNINGSTID </span> MANDAG - FREDAG KL. 07:00 - 17:00</h4>
				</div>
				<div class="header-right">
					<div class="menu-block">
						<p class="primary-color"><?php _e( 'MENY', 'espira')?>
							<img src="http://espira.no/wp-content/uploads/2019/11/drop-down-arrow.png" style="position: relative;top: -2px">
						</p>
						<button class="navbar-toggle">
							<span></span>
							<span></span>
							<span></span>
						</button>
					</div>
				</div>
			</div>
		</div>

	</header><!-- #masthead -->