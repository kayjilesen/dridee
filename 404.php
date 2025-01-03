<?php get_header(); ?>

	<main role="main">
		<section id="error" class="">
			<article id="post-404">
				<div class="container py-24">
                    <div class="">
                        <div class="textWrapper fv">
                            <h2 class="pc uc fwb"><?php echo (is_404() ? '404 ' : ''); ?> ERROR</h2>
                            <h1 class="fwb">Op deze pagina is niks te vinden.</h1>
                            <div class="buttonWrapper start"><a class="button primary" href="<?php echo home_url(); ?>">Ga terug </a></div>
                        </div>
                    </div>
				</div>
			</article>
		</section>
		<div class="error-image">
		</div>
	</main>

<?php get_footer(); ?>