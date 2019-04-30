<?php
get_header();
// Ce fichier template spécial de WordPress est appelé suite à une recherche avec un formulaire de type get qui pointe sur l'url de base du site.
get_template_part('templates/blog/banner');
?>

<div class="container single-post-container">
    <h1>Résultat de la recherche pour
        <span>"
            <?php echo get_search_query(); ?>"</span>
    </h1>
    <ul class="list-group mb-5">
        <!-- Dans cette boucle, nous allons récupérer tous les posts qui correspondent à la recherche. -->
        <?php while (have_posts()) : the_post(); ?>
            <li class="list-group-item">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
</div>

<?php
get_footer();
?>