<?php
/*
Template Name: Plantilla Blog
*/
get_header();
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        /*Page loop*/
        /* Start the Loop */
        while (have_posts()) :
            the_post();

            get_template_part('template-parts/content/content', 'page');

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) {
                comments_template();
            }

        endwhile; // End of the loop.
        /*End page loop*/

        /*Post loop*/
        // Define custom query parameters

        /* THE BELOW LINE IS A NEW ADDITION */
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $custom_query_args = array(
            'category_name' => 'how_to',
            'posts_per_page' => 2,
            /* THE BELOW LINE IS A NEW ADDITION */
            'paged' => $paged
        );

        // Instantiate custom query
        $custom_query = new WP_Query($custom_query_args);

        // Pagination fix
        $temp_query = $wp_query;
        $wp_query   = NULL;
        $wp_query   = $custom_query;

        //print_r($custom_query);

        // Output custom query loop
        if ($custom_query->have_posts()) :
            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                // Loop output goes here
                get_template_part('template-parts/content/content');
            endwhile;


        endif;

        // Reset postdata
        wp_reset_postdata();

        // Previous/next page navigation.
        mitema_the_posts_navigation();

        // Reset main query object
        $wp_query = NULL;
        $wp_query = $temp_query;

        /*End post loop*/

        ?>

    </main><!-- #main -->
</section><!-- #primary -->
<?php
get_sidebar();
get_footer();
