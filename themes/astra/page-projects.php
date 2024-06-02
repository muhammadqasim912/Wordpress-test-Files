<?php
/*
Template Name: Projects Page
*/
?>


<?php
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <header class="page-header">
            <h1 class="page-title">Projects</h1>
        </header><!-- .page-header -->

        <?php
        // Define the query arguments
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type'      => 'projects',
            'posts_per_page' => 6,
            'paged'          => $paged,
        );

        // Custom query for projects
        $projects_query = new WP_Query($args);

        // Check if we have projects to display
        if ($projects_query->have_posts()) :
            echo '<div class="projects-grid">';

            // The Loop
            while ($projects_query->have_posts()) : $projects_query->the_post(); ?>
                <div class="project-card">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="project-thumbnail">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="project-info">
                            <h2 class="project-title"><?php the_title(); ?></h2>
                            <div class="project-excerpt"><?php the_excerpt(); ?></div>
                        </div>
                    </a>
                </div>
            <?php endwhile;

            echo '</div>';

            // Pagination
            the_posts_pagination(array(
                'prev_text'          => __('Previous', 'text-domain'),
                'next_text'          => __('Next', 'text-domain'),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'text-domain') . ' </span>',
            ));

        else :
            echo '<p>No projects found.</p>';
        endif;

        // Restore original post data
        wp_reset_postdata();
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<style>
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }
    .project-card {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        overflow: hidden;
        transition: box-shadow 0.3s ease;
    }
    .project-card:hover {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }
    .project-thumbnail img {
        width: 100%;
        height: auto;
        display: block;
    }
    .project-info {
        padding: 15px;
    }
    .project-title {
        font-size: 20px;
        margin: 0 0 10px;
    }
    .project-excerpt {
        font-size: 14px;
        color: #666;
    }
</style>

<?php
get_sidebar();
get_footer();
?>
