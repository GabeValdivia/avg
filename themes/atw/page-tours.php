<?php 
/*
* Template Name: Tours
*/
get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

        <h2><span><?php the_title(); ?></span></h2>
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                
                <?php
                    $args = array(
                        'post_type' => 'my_tours',
                        'posts_per_page' => -1,
                        'orderby' => 'title',
                        'order'  => 'ASC',
                    );
                ?>
                <ul>
                <?php $tours = new WP_Query($args); while($tours->have_posts() ): $tours->the_post(); ?>
                    
                <li>
                    <div class="featured-tour">
                        <?php the_post_thumbnail(); ?>
                        <a href="<?php the_permalink(); ?>" class="more-info">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/moreinfo.png" alt="">
                        </a>
                    </div>
                </li>

                <?php endwhile; wp_reset_postdata(); ?>
                </ul>
                <br class="clear">

				<?php edit_post_link(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
