<!-- Sidebar area -->
<div class="col-md-4 col-sm-5 sidebar">

	<!-- Single widget qui contient la barre de recherche -->
	<div class="widget-item">
		<?php get_search_form(); ?>
	</div>

	<!-- Single widget qui contient les catégories -->
	<div class="widget-item">
		<?php dynamic_sidebar('widget1'); ?>
	</div>

	<!-- Single widget qui contient la galerie photo instagram -->
	<div class="widget-item">
		<?php dynamic_sidebar('widget2'); ?>
	</div>

	<!-- Single widget pour les tags -->
	<div class="widget-item">
		<h2 class="widget-title">Tags</h2>
		<ul class="tag">
			<?php
			$allTags = get_tags();
			foreach ($allTags as $tag) {
				echo '<li><a href="' .  get_tag_link($tag->term_id) . '"> ' . $tag->name . '</a></li>';
			};
			?>
		</ul>
	</div>

	<!-- Single widget qui contient la citation (quote) -->
	<div class="widget-item">
		<?php dynamic_sidebar('widget3'); ?>
	</div>

	<!-- Single widget (image de publicité) -->
	<div class="widget-item">
		<h2 class="widget-title">Add</h2>
		<div class="add">
			<img src="<?php echo get_template_directory_uri(); ?>/img/add.jpg" alt="">
		</div>
	</div>

</div>
</div>
</div>
</div>