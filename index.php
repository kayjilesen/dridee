<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="noPadding">
            <div class="container wide">

                <h1 class="pageTitle">Nieuws</h1>

                <div class="grid c1 md-c2 lg-c3 gap50">
                    <?php get_template_part('loop'); ?>
                </div>

                <?php pagination(); ?>
            
            </div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
