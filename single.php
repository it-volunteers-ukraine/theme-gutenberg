<?php

get_header();
?>

	<main id="primary" class="site-main">
        <div class="container">

            <?php
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', get_post_type() );

            endwhile; // End of the loop.
            ?>

        </div>
	</main><!-- #main -->

<?php
get_footer();
