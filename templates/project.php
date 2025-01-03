<?php

    get_header();

    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' )[0];

?>

<article>
    
        
        
        <?php
            //  Recensie
            if(has_category(get_cat_ID('recensie'))){
                echo '<div class="mx-auto !max-w-screen-md px-6 lg:px-0 py-12 lg:py-32">';
                    echo '<h1>' . get_the_title() . '</h1>';
                    echo the_content();
                    echo '<div class="flex flex-col md:flex-row my-12 items-center justify-start">';
                        echo '<img class="w-36 rounded-full" src="' . $image . '">';
                        if(!empty(get_field('client_logo'))) echo '<img class="w-48 ml-8 object-contain" src="' . get_field('client_logo')['url'] . '">';
                    echo '</div>';
                    echo '<div class="button-wrapper mt-8">
                        <a href="/" class="font-bold py-3 px-5 my-4 text-white bg-orange duration-300 hover:text-black hover:bg-[#ecf0f6] rounded-full">Ga terug</a>
                    </div>';
                echo '</div>';
            } else {
                echo '<div class="mx-auto !max-w-screen-lg px-6 lg:px-0 py-12 lg:py-32">';
                    echo '<div class="flex flex-col lg:flex-row wrap my-12 items-start justify-start">';
                        echo '<div class="content order-2 md:order-1">';
                            echo '<h1>' . get_the_title() . '</h1>';
                            echo the_content();
                            echo '<div class="button-wrapper mt-8">
                                <a href="/" class="font-bold py-3 px-5 my-4 text-white bg-orange duration-300 hover:text-black hover:bg-[#ecf0f6] rounded-full">Ga terug</a>
                            </div>';
                        echo '</div>';
                        echo '<img class="w-full md:w-72 order-1 md:order-2 mt-12 lg:mt-0 lg:ml-12 object-contain" src="' . $image . '">';
                    echo '</div>';
                echo '</div>';
            }
        ?>
   
</article>


<?php get_footer(); ?>