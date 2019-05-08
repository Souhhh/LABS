<div class="col-md-8 col-sm-7 blog-posts">
	<?php
	$paged = (get_query_var('paged')) ?
	get_query_var('paged') : 1;
	?>

	<!-- Post item -->
	<?php
	// Nous allons faire en sorte d'aller chercher tous les articles pour les afficher sur la page
	// Pour cela, nous allons utiliser la class WP_Query
	$args = [
		'post_type' => 'post',
		'posts_per_page' => 3, // pour récupérer que mes 3 derniers articles
		'paged' => $paged,
	];
	$query = new WP_Query($args);
	// La fonction wp_reset_query() permet de réinitialiser les valeurs $post en fonction du context
	while ($query->have_posts()) : $query->the_post();
		$post_id = get_the_ID($query); ?>
		<div class="post-item">
			<div class="post-thumbnail">
				<img src="<?php the_post_thumbnail_url(); ?>" alt="">
				<div class="post-date">
					<h2><?php the_time('j'); ?></h2>
					<h3><?php the_time('F Y'); ?></h3>
				</div>
			</div>
			<div class="">
				<h2 class="post-title">
					<?php the_title(); ?>
				</h2>
				<div class="post-meta">
					<a href=""><?php the_author(); ?></a>
					<a href=""> <?php $postTags = get_the_tags();
					if ($postTags){
						foreach($postTags as $tag){
							echo $tag->name . "," . ' ' . '';
						}
					}
					?>
					</a>
					<a href=""><?php comments_number(); ?></a>
				</div>
				<p class="post-content">
						<?php the_content(); ?>
				</p>
				<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
			</div>
		</div>
	<?php endwhile; ?>


	<!-- Pagination -->
	<!-- <div class="page-pagination">
		<a class="active" href="">01.</a>
		<a href="">02.</a>
		<a href="">03.</a>
	</div> -->

	<div class="page-pagination">
		<?php
		$current_page = max(1, get_query_var('paged'));
		echo paginate_links(array(
			'format' => '/page/%#%',
			'current' => $current_page,
			'total' => $query->max_num_pages,
			'prev_text' => __('« Prev'),
			'next_text' => __('Next »'),
		));
		wp_reset_postdata();
		?>

	</div>
</div>