<?php
get_header();
// Ce fichier template spécial de WordPress est appelé suite à une recherche avec un formulaire de type get qui pointe sur l'url de base du site.
get_template_part('templates/blog/banner');
?>

<div class="page-section spad">
    <div class="container">
        <h1>Résultat de la recherche pour
            <span>"
                <?php echo get_search_query(); ?>"</span>
        </h1>
        <div class="row">
            <div class="col-sm-8 col-sm-7 blog-posts">

                <ul class="list-group mb-5">
                    <!-- Dans cette boucle, nous allons récupérer tous les posts qui correspondent à la recherche. -->
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="single-post">
                            <div class="post-thumbnail">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                <a href="<?php the_permalink(); ?>">
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