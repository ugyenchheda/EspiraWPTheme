<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Espira
 */

get_header();
?>
<section class="single-template">
	<div class="container">
		<div class="row konsern-nyheter-row">
            <div class="col-sm-12 col-md-9 float-right">
                <div class="row">
                    <div class="col-sm-12 col-md-8 konsern-nyheter-col">
                        <div class="konsern-side-mid">
                            <div class="konsern-main-articlebox">
                                <?php
                                $post_id =get_the_ID();
                                    $featured_img_url = get_the_post_thumbnail_url($post_id,'full'); 
                                    if(!empty ( $featured_img_url )){
                                        echo ' <figure class="thumbnail-img"> <img src="'.$featured_img_url.'"></figure>';
                                    }
                                ?>

                                <h2 class="event_green"><?php the_title(); ?></h2>

                                <div class="share-and-publisertbox">
                                    <div class="social-share-artibox">
    
                                        <ul>
                                        <?php
                                            echo '<li><a target="_blank" class="facebook" href="https://www.facebook.com/sharer/sharer.php?u='. urlencode(esc_url(get_permalink())) .'"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>'; 
                                            echo '<li><a target="_blank" class="twitter" href="https://twitter.com/intent/tweet?text='. esc_attr(wp_get_document_title()) .'. '. esc_url(get_permalink()) .'"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
                                            echo '<li><a target="_blank" class="" href="mailto:?subject='. esc_attr(wp_get_document_title()) .'. '. esc_url(get_permalink()) .'"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>';
                                                        
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="publisertbox-info-artibox">
                                    <?php $post_date = get_the_date( 'j. F Y' );  
                                        echo $post_date;
                                    ?>
                                    </div>
                                </div>


                                <?php 
                                $excerpt = '';
                                if (has_excerpt()) {
                                    $excerpt = wp_strip_all_tags(get_the_excerpt());
                                    echo '<div class="arti-intro-textbox">'.$excerpt.'</div>';
                                }
                                ?>
                                <?php the_content();?>

                <?php  
                    $post_tags = get_the_tags();
                    if ( $post_tags ) {
                        echo '<div class="tags_title"><h4><span class="tags_title">Tags:</span> </h4></div>';
                    
                    global $post;
                    foreach(get_the_tags($post->ID) as $tag)
                    {
                        echo '<a href="' . get_tag_link($tag->term_id) . '" class="tag-btn">' . $tag->name . '</a>';
                    }
                    echo '</h4>';
                }
                ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 konsern-nyheter-col">
                            <?php dynamic_sidebar(get_post_meta($post_id, 'right_sidebar', true)); ?>
                    </div>
                </div>
            </div>
			<div class="col-sm-12 col-md-3 konsern-nyheter-col float-left">
                    <?php dynamic_sidebar(get_post_meta($post_id, 'left_sidebar', true)); ?>
			</div> 
		</div>
    </div>
    

        <!-- video gallery section -->
        <?php $nyheter_viedos = get_post_meta($post_id, 'nyheter_video_link', true);

if (isset($nyheter_viedos) && !empty($nyheter_viedos)) {
?>
<section id="content" class="video-gallery-wrapper">
            <div class="container">
                <h3 class="section-heading"><?php echo count($nyheter_viedos) ; _e(' Videos', 'espira');?></h3>

                <div class="video-container">
                    <div id="owl-four" class="owl-carousel owl-theme">
                        <?php
                        $counter = 0;
                        foreach ($nyheter_viedos as $nyheter_viedo) {?>
                            <div class="slider-item">
                                <figure class="thumbnail-img video-thumb">
                                    <a href="<?php echo $nyheter_viedo; ?>" data-fancybox="gallery" data-caption="Gallery Image 1">
                                    
                                        <video class="gallery-video" src="<?php echo $nyheter_viedo; ?>" alt="videos">
                                    </a>
                                </figure>

                                <h4><?php $videoname= substr($nyheter_viedo, strrpos($nyheter_viedo, '/') + 1);
                                echo substr($videoname, 0, strrpos($videoname, '.')); ?></h4>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </section>

<?php
}else{
    $news_videos = get_post_meta($post_id, 'news_video_links', true);
    if (isset($news_videos) && !empty($news_videos)) {
    ?>

    <section id="content" class="video-gallery-wrapper">
                <div class="container">
                    <h3 class="section-heading"><?php echo count($news_videos) ; _e(' Videos', 'espira');?></h3>

                    <div class="video-container">
                        <div id="owl-four" class="owl-carousel owl-theme">
                            <?php
                            $counter = 0;
                            foreach ($news_videos as $news_video) {?>
                                <div class="slider-item">
                                    <figure class="thumbnail-img video-thumb">
                                        <a href="<?php echo $news_video; ?>" data-fancybox="gallery" data-caption="Gallery Image 1">
                                        <div class="border-youtube">
                                            <?php echo wp_oembed_get( $news_video, array( 'width' => 480,'height' => 350 ))?>
                                        </div>    
                                        </a>
                                    </figure>

                                    <h4><?php $video_name= substr($news_video, strrpos($news_video, '/') + 1);
                                        echo substr($video_name, 0, strrpos($video_name, '.')); ?></h4>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
    <?php
    }
}
    ?>
        

    <!-- //video gallery section -->

  

</section>
<?php
get_footer();
