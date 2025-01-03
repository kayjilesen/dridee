<?php

    get_header();
?>

	<main role="main">
		<!-- section -->
		<section id="author">
			<div class="container-fluid">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-6">
							<?php
								if (have_posts()): the_post();
									echo '<div class="topWrapper">';
										echo '<div class="authorInfo">';
											echo '<h2>Auteur</h2>';
											echo '<h1>' . get_the_author() . '</h1>';
										echo '</div>';
										echo '<div class="authorImage">';
											echo get_avatar(get_the_author_meta('user_email'), 150);
										echo '</div>';
									echo '</div>';
									echo '<div class="bottomWrapper">';
										if ( get_the_author_meta('description')) :
											echo '<h3>Over ' . explode(' ', get_the_author())[0] . '</h3>';
											echo '<h4>' . wpautop( get_the_author_meta('description') ) . '</h4>';
										endif;
									echo '</div>';
									echo '<div class="socialWrapper">';
										echo (!empty(get_the_author_meta('facebook')) ? '<a title="Auteur Facebook Page ' . get_the_author() . '" target="_blank" href="' . get_the_author_meta("facebook") . '"><img src="' . get_stylesheet_directory_uri() . '/img/icons/fb-blue.png" title="Facebook Social Link Averex" alt="Facebook Icoon Icon Blauw"></a>' : "");
										echo (!empty(get_the_author_meta('instagram')) ? '<a title="Auteur Instagram Page ' . get_the_author() . '" target="_blank" href="' . get_the_author_meta("instagram") . '"><img src="' . get_stylesheet_directory_uri() . '/img/icons/insta-blue.png" title="Instagram Social Link Averex" alt="Instagram Icoon Icon Blauw"></a>' : "");
										echo (!empty(get_the_author_meta('linkedin')) ? '<a title="Auteur LinkedIn Page ' . get_the_author() . '" target="_blank" href="' . get_the_author_meta("linkedin") . '"><img src="' . get_stylesheet_directory_uri() . '/img/icons/li-blue.png" title="LinkedIn Social Link Averex" alt="LinkedIn Icoon Icon Blauw"></a>' : "");
									echo '</div>';
								endif;
							?>
						</div>
					</div>
					<?php 
					// Get Blog Posts
					$args = array(
						'post_type' => 'post',
						'author' => get_the_author_meta('id')
					);
					$post_query = new WP_Query($args);
					?>
					
				</div>
			</div>
		</section>
		<!-- /section -->
		<section id="section-blog">
			<div class="container-fluid">
				<div class="container">
					<h2>Blogs (<?php echo count($post_query->posts); ?>)</h2>
					<div class="row">
						<?php 
                    		for($i = 0; $i < count($post_query->posts); $i++){
                        		if($post_query->have_posts()) {
									$post_query->the_post();
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
										echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">';
											echo '<article id="post-' . $post_query->posts[$i]->ID . '">';
												echo '<div class="background-block" style="background: url(' . $image[0] . '); background-size: cover; background-position: center;">';
													echo '<div class="innerBlock">';
														echo '<a title="' . get_the_title() . '" href="' . get_the_permalink() . '">';
															echo '<h3>';
																echo the_title();
															echo '</h3>';
														echo '</a>';
														echo '<div class="bottomBar">';
															echo '<a title="Lees meer over ' . get_the_title() . '"href="' . get_the_permalink() . '"><div class="readMoreButton">Lees meer <i class="fas fa-long-arrow-alt-right"></i></div></a>';
														echo '</div>';
													echo '</div>';
												echo '</div>';
											echo '</article>';
										echo '</div>';
								} else {
									echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4"></div>';
								}
							}
							?>
					</div>
				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>

