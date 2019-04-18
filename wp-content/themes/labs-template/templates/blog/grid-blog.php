<div class="col-md-8 col-sm-7 blog-posts">
					<!-- Post item -->
					<?php
					// Nous allons faire en sorte d'aller chercher tous les articles pour les afficher sur la page
					// Pour cela, nous allons utiliser la class WP_Query
					$args = [
                        'post_type' => 'post',
						// 'category_name' => 'design'
						'posts_per_page' => 3, // pour récupérer que mes 3 derniers articles
					];
					$query = new WP_Query($args);
					// La fonction wp_reset_query() permet de réinitialiser les valeurs $post en fonction du context
					wp_reset_query();
					while ($query->have_posts()) : $query->the_post(); ?>
						<div class="post-item">
							<div class="post-thumbnail">
								<img src="<?php the_post_thumbnail_url()
											?>" alt="">
								<div class="post-date">
									<h2>03</h2>
									<h3>Nov 2017</h3>
								</div>
							</div>
							<div class="post-content">
								<h2 class="post-title">
									<?php the_title(); ?>
								</h2>
								<div class="post-meta">
									<a href="">Loredana Papp</a>
									<a href="">Design, Inspiration</a>
									<a href="">2 Comments</a>
								</div>
								<p class="post-content">
									<?php the_content(); ?>
								</p>
								<a href="" class="read-more">Read More</a>
							</div>
						</div>
					<?php endwhile; ?>


					<!-- Pagination -->
					<div class="page-pagination">
						<a class="active" href="">01.</a>
						<a href="">02.</a>
						<a href="">03.</a>
					</div>
				</div>

