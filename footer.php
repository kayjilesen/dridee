<?php

	// Footer Menus
	$menu_name = 'header-menu';
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>
		
			<footer class="footer relative overflow-hidden bg-[#f9f9f9]" role="contentinfo">
                    <div class="container">
                        <div class="flex flex-col md:flex-row justify-between items-center py-6 font-light text-sm">
                            <div class="general-info mb-4 md:mb-0">
                                <span class=""><span class="text-orange">©</span> <?php echo date('Y'); ?></span>
                                <span class="text-orange mx-2">-</span>
                                <a href="/algemene-voorwaarden" class="mr-4 font-normal capitalize">algemene voorwaarden</a>
                            </div>
                            <div class="footer-logo">
                                <a href="/#intro"><img class="h-8" src="<?php echo get_field('logo','option')['sizes']['small']; ?>" alt="Logo"></a>
                            </div>
                        </div>
                    </div>
			</footer>

		</div>
        <?php wp_footer(); ?>
        <script src="<?php echo get_stylesheet_directory_uri() . '/assets/js/script.js?v=' . filemtime(get_stylesheet_directory() . '/assets/js/script.js'); ?>" type="text/javascript"></script>
	</body>
</html> 