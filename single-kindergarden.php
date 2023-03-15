<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Espira
 */

 get_header('kindergarden');
?>


<div id="content" class="site-content">
				<?php
				while ( have_posts() ) :
					the_post();

					$mode = ($_REQUEST['page'] ? $_REQUEST['page'] : ''); // returns true

					switch ($mode) {
						case "barnehagen-var":
							get_template_part( 'template-parts/kindergarden/content', 'second' );
							break;
						case "ansatte-og-avdelinger":
							get_template_part( 'template-parts/kindergarden/content', 'third' );
							break;
						default:
						get_template_part( 'template-parts/kindergarden/content', 'main');
					}
				endwhile; // End of the loop.
				?> 
			</div>
<?php
get_footer();
