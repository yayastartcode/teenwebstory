<?php
/**
 * Template Name: Blog Index
 * Description: The template for displaying the Blog index /blog.
 *
 */

get_header();

$page_id = get_option( 'page_for_posts' );
?>
<div class="row">
	<div class="container pt-3 px-3 rounded bg-light grc mb-4">
		
        <h2 class="mb-4">Rekomendasi </h2>
        <div class="row flex-nowrap overflow-auto">
		<?php
			global $post;

			$myposts = get_posts( array(
				'numberposts'    => 10,
				'category'       => 3
			) );

			if ( $myposts ) {
				foreach ( $myposts as $post ) : 
					setup_postdata( $post ); ?>
			<div class="col mb-4">
                <div class="card">
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail');?>" class="card-img-top" alt="<?php the_title(); ?>">
                    <div class="card-body">
                        <a href="<?php the_permalink(); ?>"><h5 class="card-title"><?php the_title(); ?></h5></a>
                    </div>
                </div>
            </div>
				<?php
				endforeach;
				wp_reset_postdata();
			}
		?>  
        </div>
    </div>

	<div class="container pt-3 px-3 rounded bg-light grc mb-4">
        <h2 class="mb-4">Fantasi </h2>
        <div class="row flex-nowrap overflow-auto">
			<?php

			$myfposts = get_posts( array(
				'numberposts'    => 10,
				'category'       => 2
			) );

			if ( $myfposts ) {
				foreach ( $myfposts as $postf ) : 
					setup_postdata( $postf ); ?>
			<div class="col mb-4">
                <div class="card">
                    <img src="<?php echo get_the_post_thumbnail_url($postf->ID, 'thumbnail');?>" class="card-img-top" alt="<?php the_title(); ?>">
                    <div class="card-body">
                        <a href="<?php the_permalink(); ?>"><h5 class="card-title"><?php the_title(); ?></h5></a>
                    </div>
                </div>
            </div>
				<?php
				endforeach;
				wp_reset_postdata();
			}
		?>  

            
        </div>
    </div>



	<div class="container pt-3 px-3 rounded bg-light grc mb-4">
        <h2 class="mb-4">Teen Romance </h2>
        <div class="row flex-nowrap overflow-auto">

		<?php

			$mytposts = get_posts( array(
				'numberposts'    => 10,
				'category'       => 4
			) );

			if ( $mytposts ) {
				foreach ( $mytposts as $postt ) : 
					setup_postdata( $postt ); 
					if(get_the_post_thumbnail_url($postt->ID, 'thumbnail') == null) {
						$turl ="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9T4eZdmlbj1NKFcbcizY5I0AkfL6t0qaidw&s";
					} else {
						$turl = get_the_post_thumbnail_url($postt->ID, 'thumbnail');
					}
					?>

			<div class="col mb-4">
                <div class="card">
                    <img src="<?php echo $turl;?>" class="card-img-top" alt="<?php the_title(); ?>">
                    <div class="card-body">
                        <a href="<?php the_permalink(); ?>"><h5 class="card-title"><?php the_title(); ?></h5></a>
                    </div>
                </div>
            </div>
				<?php
				endforeach;
				wp_reset_postdata();
			}
		?>  
            
        </div>
    </div>


</div><!-- /.row -->
<?php
get_footer();
