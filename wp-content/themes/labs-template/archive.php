<?php
get_header();
// Ce fichier template spécial de WordPress est appelé pour afficher les catégories ou taxonomies ou autre archive. Voir le wp hierarchy.
get_template_part('templates/blog/banner');
?>

<div class="page-section spad">
    <div class="container single-post-container">
        <h1>
            <?php the_archive_title(); ?>
        </h1>

        <div class="row">
            <div class="col-sm-8 col-sm-7 blog-posts">
                <ul class="list-group mb-5">
                    <!-- Dans cette boucle, nous allons récupérer tous les posts qui correspondent à la recherche. -->
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="single-post">
                            <div class="post-thumbnail">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt=""><a href="<?php the_permalink(); ?>">
                                    <h2 class="post-title">
                                        <?php the_title(); ?>
                                    </h2>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </ul>
            </div>

            <?php get_template_part('templates/blog/widget'); ?>
        </div>
    </div>

    <?php
    get_template_part('templates/services/newletter');
    get_footer();
    ?>
</div>