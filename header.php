
<?php

	$menu_name = 'header-menu';
	$menu_locations = get_nav_menu_locations();
	$primary_menu = wp_get_nav_menu_object( $menu_locations[ $menu_name ] );
    $menuitems = wp_get_nav_menu_items( $primary_menu->term_id, array( 'order' => 'DESC' ) );

    $firstParent = true;
    $firstChild = true;
?>

<!doctype html>
<html <?php language_attributes(); ?> class="no-js w-full">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' -'; } ?> <?php bloginfo('name'); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&display=swap" rel="stylesheet">
		<?php wp_head(); ?>
        <?php 
            if(!empty(get_field('google_analytics','option'))){
                echo '<link href="//www.google-analytics.com" rel="dns-prefetch">';
                echo get_field('google_analytics', 'option');
            }
        ?>
    </head>
    <body <?php body_class('bg-white text-black max-w-screen scroll-smooth'); ?>>
    
	<header id="masthead" class="text-black left-0 bg-white fixed w-full z-[99] border-b border-[#f9f9f9]">
        <div class="max-w-full">
            <nav class="navbar navbar-expand-lg navbar-light max-w-full relative lg:px-20 text-sm">
                <div class="mobileNav bg-white z-[90] flex flex-row justify-between items-center px-4 py-4 lg:hidden fixed w-full ">
                    <a href="/"><img class="lg:hidden duration-300 h-8" src="<?php echo get_field('logo','option')['url']; ?>" alt="Logo"></a>
                    <button class="navbar-toggler items-center justify-center grid grid-auto-rows gap-2" id="toggleMenu" type="button">
                        <div class="navbar-wrapper-1"><div class="navbar-bar bar1"></div></div>
                        <div class="navbar-wrapper-2"><div class="navbar-bar bar2"></div></div>
                        <div class="navbar-wrapper-3"><div class="navbar-bar bar3"></div></div>
                    </button>
                </div>
                <div class="z-[80] navbar-collapse -translate-x-full top-0 md:top-unset lg:w-auto lg:-translate-x-0 fixed lg:relative lg:flex flex-row justify-between items-center lg:translate-y-12 px-4" id="navbarNavAltMarkup">
                    <div class="navbar-logo">
                        <a href="/#intro"><img class="hidden lg:block w-40" title="Logo " src="<?php echo get_field('logo', 'option')['url']; ?>" alt="Logo "></a>
                    </div>
                    <div class="navbar-nav flex flex-col lg:flex-row">
                        <?php
                            for($i = 0; $i < count($menuitems); $i++){
                                echo '<div class="nav-item mx-2 font-bold text-md relative inline-block ' . (get_the_title() ===  $menuitems[$i]->title ? 'active' : '') . '">';
                                    echo '<a class="py-3 px-5 my-4 text-orange bg-light-orange duration-300 lg:text-base hover:bg-orange hover:text-white rounded-full" title="Pagina ' . $menuitems[$i]->title . '" href="' .  $menuitems[$i]->url . '">' . $menuitems[$i]->title . '</a>';
                                echo '</div>';
                            }
                        ?> 
                    </div>
                    <div class="navbar-links pl-6 mt-6 lg:pl-0 lg:mt-0">
                        <?php if(get_field('linkedin_link', 'option')) echo '<a href="' . get_field('linkedin_link','option') . '" target="_blank"><img class="w-6" src="' . get_field('linkedin_logo', 'option')['url'] . '"></a>'; ?>
                    </div>
                </div>
            </nav>
        </div>
    </header>

	
