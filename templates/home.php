<?php

    /* 
        Template name: Home
    */

    $args = array(
        'post_type' => 'projecten',
        'posts_per_page' => 99,
        'cat' => get_cat_ID('actueel'),
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $actueel_query = new WP_Query($args);

    $args = array(
        'post_type' => 'projecten',
        'posts_per_page' => 99,
        'cat' => get_cat_ID('als'),
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $als_query = new WP_Query($args);

    $args = array(
        'post_type' => 'projecten',
        'posts_per_page' => 99,
        'cat' => get_cat_ID('geschiedenis'),
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $geschiedenis_query = new WP_Query($args);

    get_header();

?>

<section id="intro" class="w-full mt-20 relative h-[400px] lg:h-[60vh] top-0 flex items-center justify-center overflow-hidden">
    <div class="container relative flex flex-col px-6 lg:px-0">
        <div class="relative z-[3] max-w-screen-lg flex flex-col items-center justify-center">
            <h1 class="text-2xl lg:text-5xl text-center font-bold text-white"><?php echo get_field('intro_title'); ?></h1>
            <div class="button-wrapper flex flex-row flex-wrap justify-center gap-3 mt-6">
                <a href="<?php echo get_field('button_1_link'); ?>" class="button primary orange"><?php echo get_field('button_1_title'); ?></a>
                <a href="<?php echo get_field('button_2_link'); ?>" class="button primary grey"><?php echo get_field('button_2_title'); ?></a>
            </div>
        </div>
    </div>
    <div class="background-container z-[1] h-full">
        <?php if(!empty(get_field('intro_video'))) { ?>
            <video loop="" muted="" playsinline="" autoplay="" poster="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', false)[0]; ?>" class="absolute z-[-1] top-1/2 left-1/2 h-auto w-full min-w-full min-h-full object-cover -translate-x-1/2 -translate-y-1/2">
                <source src="<?php echo get_field('intro_video'); ?>" type="video/mp4">
            </video>
            <div class="gradient-overlay bg-gradient-to-r from-black/30 via-black/50 to-black/30 via-50%"></div>
        <?php } else { ?>
            <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', false); ?>
            <div class="gradient-overlay bg-gradient-to-r from-black/30 via-50% via-black/70 to-black/30"></div>
        <?php } ?>
    </div>
</section>

<section id="denken" class="relative">
    <div class="max-w-screen-full lg:max-w-4xl mx-auto z-[1] py-20 px-6 lg:px-0">
        <div class="flex flex-col items-center">
            <img class="mb-8" src="<?php echo get_field('denken_image')['url']; ?>" alt="">
            <div class="text-orange font-bold text-3xl lg:leading-loose text-center mb-8"><?php echo get_field('denken_title'); ?></div>
            <div class="text-center font-light text-md leading-loose pr-4 lg:pr-0"><?php echo get_field('denken_text'); ?></div>
        </div>
    </div>
</section>

<section id="banner1" class="banner relative">
    <div class="mx-auto max-w-lg py-24 relative z-[2] flex items-center pl-6 md:pl-0 md:justify-start">
        <h2 class="text-3xl lg:text-6xl uppercase font-bold text-right text-white"><?php echo get_field('banner_text_1'); ?></h2>
    </div>
    <div class="background-image h-full top-0 left-0 absolute w-full z-[1] overflow-hidden">
        <img class="min-h-full w-full object-cover" src="<?php echo get_field('banner_image_1')['url']; ?>" alt="">
    </div>
    <img class="z-[3] absolute top-0 -translate-y-1/2 right-20 pointer-events-none"  src="wp-content/uploads/2022/05/dridee-blad-2.png" alt="">
</section>

<section id="durven" class="relative">
    <div class="max-w-screen-full lg:max-w-3xl mx-auto z-[1] py-20 px-6 lg:px-0">
        <div class="flex flex-col items-center">
            <img class="mb-8" src="<?php echo get_field('durven_image')['url']; ?>" alt="">
            <div class="text-orange font-bold text-3xl text-center lg:leading-loose mb-8"><?php echo get_field('durven_title'); ?></div>
            <div class="text-center font-light text-md leading-loose pr-4 lg:pr-0"><?php echo get_field('durven_text'); ?></div>
        </div>
    </div>
</section>

<section id="dridee" class="relative">
    <div class="max-w-screen-full lg:max-w-3xl border-t-2 mx-auto z-[1] py-20 px-6 lg:px-0">
        <div class="flex flex-col items-center">
            <img class="mb-12" src="<?php echo get_field('logo', 'option')['sizes']['small']; ?>" alt="">
            <div class="text-center font-light text-md leading-relaxed pr-4 lg:pr-0"><?php echo get_field('dridee_text'); ?></div>
        </div>
    </div>
</section>

<section id="actueel" class="">
    <div class="container px-6 lg:px-0 py-12 lg:px-0">    
        <div class="image-wrap flex flex-row justify-center">
            <img class="mb-8 max-w-[220px]" src="/wp-content/uploads/2022/05/actuele-projecten.png" alt="">
        </div>
        <?php 
            if($actueel_query){
                $projectCount = 0;
                echo '<div class="grid grid-auto-cols grid-cols-1 md:grid-cols-12 gap-4">';
                while($actueel_query->have_posts()) : $actueel_query->the_post();

                    $projectImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' )[0];

                    echo '<div class="col-span-1 md:col-span-4 lg:col-span-4 relative">';
                        echo '<div class="image-container square">';
                            echo '<a href="' . get_permalink(get_the_ID()) . '">';
                                echo '<img class="object-fit duration-500" src="' . $projectImage . '">';
                            echo '</a>';
                        echo '</div>';
                        echo '<div class="hover-wrapper pointer-events-none w-full h-full absolute left-0 top-0 opacity-0">';
                            echo '<span class="text-lg md:text-2xl font-normal font-serif">' . get_field('project_subtitle', get_the_ID()) . '</span>';
                        echo '</div>';
                        echo '<div class="project-title py-4">';
                            echo '<h4 class="text-sm md:text-lg font-extrabold">' . get_the_title() . '</h4>';
                            echo '<span class="text-orange font-bold">' . get_field('project_link', get_the_ID()) . '</span>';
                        echo '</div>';
                    echo '</div>';
                    $projectCount++;
                endwhile;
                wp_reset_postdata();
                echo '</div>';
            }
        ?>
</section>

<section id="als" class="mt-24">
    <div class="lg:max-w-screen-lg xl:max-w-screen-xl mx-auto border-t px-6 lg:px-0 py-12 lg:px-0">
        <div class="image-wrap flex flex-row justify-center">
            <img class="mb-6 max-w-[220px]" src="/wp-content/uploads/2022/05/stichting-als-nederland.png" alt="">
        </div>
        <div class="opgehaald flex flex-row wrap justify-center mb-8">
            <h3 class="text-md md:text-xl lg:text-2xl font-bold">Totaal opgehaald: <span class="text-orange"><?php echo get_field('totaal_opgehaald'); ?></h3>
        </div>
        <?php 
            if($als_query){
                $projectCount = 0;
                echo '<div class="grid grid-auto-cols grid-cols-1 md:grid-cols-12 gap-4">';
                while($als_query->have_posts()) : $als_query->the_post();

                    $projectImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' )[0];

                    echo '<div class="col-span-1 md:col-span-4 lg:col-span-4 xl:col-span-3 relative">';
                        echo '<div class="image-container square">';
                            echo '<a ' . (!empty(get_field('project_link', get_the_ID())) ? 'href="' . get_field('project_link', get_the_ID()) . '" target="_blank"' : 'href="' . get_permalink(get_the_ID()) ) . '">';
                                echo '<img class="object-fit duration-300" src="' . $projectImage . '">';
                            echo '</a>';
                        echo '</div>';
                        echo '<div class="hover-wrapper pointer-events-none w-full h-full absolute left-0 top-0 opacity-0">';
                            echo '<span class="text-lg md:text-2xl font-normal font-serif">' . get_field('project_subtitle', get_the_ID()) . '</span>';
                        echo '</div>';
                        echo '<div class="project-title py-4">';
                            echo '<h4 class="text-sm md:text-lg font-extrabold">' . get_the_title() . '</h4>';
                            echo '<span class="text-orange text-md lg:text-lg font-bold">' . get_field('project_year', get_the_ID()) . '</span>';
                        echo '</div>';
                    echo '</div>';
                    $projectCount++;
                endwhile;
                wp_reset_postdata();
                echo '</div>';
            }
        ?>
</section>


<section id="geschiedenis" class="mt-24">
    <div class="container !max-w-screen-xl border-t  px-6 lg:px-0 py-8 lg:py-32 lg:px-0">
        <div class="image-wrap flex flex-row justify-center">
            <img class="mb-8 max-w-[220px]" src="/wp-content/uploads/2022/05/geschiedenis.png" alt="">
        </div>
        <?php 
            if($geschiedenis_query){
                $projectCount = 0;
                echo '<div class="grid grid-cols-12 gap-2 md:gap-4">';
                while($geschiedenis_query->have_posts()) : $geschiedenis_query->the_post();

                    $projectImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' )[0];

                    echo '<div class="col-span-12 md:col-span-6 xl:col-span-4 flex flex-row justify-start relative p-2 rounded-md border border-[#f1f1f1] hover:shadow-md duration-300">';
                        echo '<div class="left-info w-20">';
                            echo '<div class="image-container square rounded-sm">';
                                echo '<a ' . (!empty(get_field('project_link', get_the_ID())) ? 'href="' . get_field('project_link', get_the_ID()) . '" target="_blank"' : 'href="' . get_permalink(get_the_ID()) ) . '">';
                                    echo '<img class="object-contain duration-300" src="' . $projectImage . '">';
                                echo '</a>';
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="right-info flex flex-col justify-center items-center">';
                            echo '<div class="project-title flex flex-col ml-4">';
                                echo '<a ' . (!empty(get_field('project_link', get_the_ID())) ? 'href="' . get_field('project_link', get_the_ID()) . '" target="_blank"' : 'href="' . get_permalink(get_the_ID()) ) . '">';
                                    echo '<h4 class="text-sm md:text-lg font-extrabold !leading-tight">' . get_the_title() . '</h4>';
                                echo '</a>';
                                //echo '<span class="text-sm italic text-orange font-bold">' . get_field('project_link', get_the_ID()) . '</span>';
                                echo '<span class="text-orange text-md lg:text-lg font-bold">' . get_field('project_year', get_the_ID()) . '</span>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    $projectCount++;
                endwhile;
                wp_reset_postdata();
                echo '</div>';
            }
        ?>
</section>

<section id="banner2" class="banner relative">
    <div class="mx-auto max-w-md py-32 relative z-[2] flex flex-col items-center justify-start px-4 lg:px-0">
        <h2 class="text-3xl lg:text-6xl mb-4 font-bold uppercase text-left text-white"><?php echo get_field('banner_text_2'); ?></h2>
        <h4 class="text-lg lg:text-2xl font-bold uppercase text-left text-white"><?php echo get_field('banner_subtitle_2'); ?></h4>
    </div>
    <div class="background-image overflow-hidden h-full top-0 left-0 absolute w-full z-[1]">
        <img class="min-h-full w-full object-cover" src="<?php echo get_field('banner_image_2')['url']; ?>" alt="">
    </div>
    <img class="z-[3] absolute top-0 -translate-y-1/2 right-20 pointer-events-none"  src="wp-content/uploads/2022/05/dridee-blad-3.png" alt="">
</section>

<section id="contact">
    <div class="container px-6 lg:px-0">
        <div class="grid grid-cols-auto grid-cols-1 md:grid-cols-12 lg:gap-8">
            <div class="col-span-1 md:col-span-6 pt-24">
                <div class="text-wrapper relative  text-2xl lg:text-4xl font-bold font-serif leading-normal">
                    <?php echo do_shortcode('[ninja_form id=1]'); ?>
                </div>
            </div>
            <div class="col-span-1 md:col-span-6 pt-24 flex justify-end items-end">
                <a href="tel:<?php echo get_field('telefoon','option'); ?>"><img src="<?php echo get_field('contact_image')['url']; ?>"></a>
            </div>
        </div>
    </div>
</section>

<section id="banner3" class="banner relative overflow-hidden">
    <div class="hidden lg:block lg:py-40"></div>
    <div class="background-image h-full top-0 left-0 relative lg:absolute w-full z-[1]">
        <img class="min-h-full min-w-full w-full object-cover" src="<?php echo get_field('banner_image_3')['url']; ?>" alt="">
    </div>
</section>

<?php get_footer(); ?>