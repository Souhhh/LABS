<!-- Sidebar area -->
<div class="col-md-4 col-sm-5 sidebar">

	<!-- Single widget -->
	<div class="widget-item">

	</form>
		<?php //dynamic_sidebar('my-search'); ?>
		<?php get_search_form(); ?>
	</div>


	<!-- <form action="#" class="search-form">
		<input type="text" placeholder="Search">
		<button class="search-btn"><i class="flaticon-026-search"></i></button>
	</form> -->

	<!-- Single widget -->
	<div class="widget-item">
		<?php dynamic_sidebar('my-category'); ?>
	</div>

	<!-- Single widget -->
	<div class="widget-item">
		<h2 class="widget-title">Instagram</h2>
		<ul class="instagram">
			<li><img src="<?php echo get_template_directory_uri(); ?>/img/instagram/1.jpg" alt=""></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/img/instagram/2.jpg" alt=""></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/img/instagram/3.jpg" alt=""></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/img/instagram/4.jpg" alt=""></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/img/instagram/5.jpg" alt=""></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/img/instagram/6.jpg" alt=""></li>
		</ul>
	</div>

	<!-- Single widget -->
	<div class="widget-item">
		<h2 class="widget-title">Tags</h2>
		<ul class="tag">
			<?php
			$categories = get_tags();
			foreach ($categories as $cat) {
				echo '<li><a href="' . get_tag_link($cat->term_id) . '"> ' . $cat->name . '</a></li>';
			};
			?>
		</ul>
	</div>

	<!-- Single widget -->
	<div class="widget-item">
		<h2 class="widget-title">Quote</h2>
		<div class="quote">
			<span class="quotation">‘​‌‘​‌</span>
			<p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. Sed lacinia turpis at ultricies vestibulum.</p>
		</div>
	</div>
</div>
<!-- Single widget -->
<!-- <div class="widget-<?php echo get_site_url(); ?>item">
	<h2 class="widget-title">Categories</h2>
	<ul>
		<li><a href="#">Vestibulum maximus</a></li>
		<li><a href="#">Nisi eu lobortis pharetra</a></li>
		<li><a href="#">Orci quam accumsan </a></li>
		<li><a href="#">Auguen pharetra massa</a></li>
		<li><a href="#">Tellus ut nulla</a></li>
		<li><a href="#">Etiam egestas viverra </a></li>
	</ul>
</div> -->


<!-- Single widget -->
<!-- <div class="widget-item">
	<h2 class="widget-title">Tags</h2>
	<ul class="tag">
		<li><a href="">branding</a></li>
		<li><a href="">identity</a></li>
		<li><a href="">video</a></li>
		<li><a href="">design</a></li>
		<li><a href="">inspiration</a></li>
		<li><a href="">web design</a></li>
		<li><a href="">photography</a></li>
	</ul>
</div> -->

<!-- Single widget (image de publicité) -->
<div class="widget-item">
	<h2 class="widget-title">Add</h2>
	<div class="add">
		<a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/add.jpg" alt=""></a>
	</div>
</div>
</div>
</div>
</div>
</div>
<!-- page section end -->