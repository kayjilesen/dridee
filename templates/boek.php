<?php

    /* 
        Template name: Boek 
    */

    get_header(); 

?>

<section id="intro" class="mt-16">
    <div class="max-w-screen-lg mx-auto py-12 lg:py-32 px-6 lg:px-0">
        <img class="max-w-sm w-1/2 md:w-1/3 lg:w-1/4 max-h-[50vh] text-center mx-auto mb-12 object-contain" src="<?php echo get_field('book_image')['url']; ?>" alt="boek norbert hulleman koets salou">
        <h2 class="text-lg lg:text-2xl font-bold text-center !leading-relaxed"><?php echo get_field('intro_title'); ?></h2>
        <div class="my-16 lg:my-24 max-w-screen-md mx-auto leading-loose">
            <?php echo get_field('intro_text'); ?>
        </div>
        <h3 class="italic text-lg lg:text-xl font-bold text-center"><?php echo get_field('cta_text_1'); ?></h3>
        <?php 
            if(get_field('book_link', 'option')){
                echo '<div class="button-wrapper items-center justify-center flex mt-8">
                    <a class="button primary orange" href="#bestellen">' . get_field('cta_button_text_1') . '</a>
                </div>';
            }
        ?>
    </div>
</section>

<section id="reviews" class="bg-light-orange">
    <div class="container mx-auto py-12 lg:py-16 px-6 lg:px-0">
        <div class="grid grid-cols-12 my-12 mt-12 md:my-16">
            <div class="col-span-12 md:col-span-6 lg:col-span-5 flex flex-col items-start justify-center">
                <?php echo get_field('review_1'); ?>
                <span class="text-orange italic font-bold block mt-2"><?php echo get_field('review_writer_1'); ?></span>
            </div>
            <div class="col-span-1 hidden lg:block spacer"></div>
            <div class="col-span-12 md:col-span-6 relative mt-8 md:mt-0">
                <img class="relative z-[2] md:w-[70%] lg:rotate-0" src="<?php echo get_field('review_image_1')['url']; ?>" alt="">
            </div>
        </div>
        <div class="grid grid-cols-12 mt-12 mb-12 md:mt-16">
            <div class="col-span-12 md:col-span-6 relative order-3 md:order-1 mt-8 md:mt-0">
                <img class="relative md:w-[80%]" src="<?php echo get_field('review_image_2')['url']; ?>" alt="">
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-5 flex flex-col items-start justify-center order-1 lg:order-3">
                <?php echo get_field('review_2'); ?>
                <span class="text-orange italic font-bold block mt-2"><?php echo get_field('review_writer_2'); ?></span>
            </div>
        </div>
    </div>
</section>

<section id="proloog">
    <div class="max-w-screen-md mx-auto leading-loose py-12 lg:py-24 px-6 lg:px-0">
        <h2 class="text-lg lg:text-2xl font-bold mb-8 !leading-relaxed"><?php echo get_field('proloog_title'); ?></h2>
        <div class="text-sm">
            <?php echo get_field('proloog_text'); ?>
        </div>
    </div>
</section>

<section id="bestellen" class="bg-orange">
    <div class="max-w-screen-lg mx-auto py-12 lg:py-24 px-4 lg:px-0">
        <div class="max-w-screen-sm mx-auto">
            <div class="px-8 pt-12 pb-0 bg-white rounded-xl shadow-md">
                <h3 class="text-lg lg:text-xl !font-bold text-center"><?php echo get_field('cta_text_2'); ?></h3>
                <h4 class="text-md lg:text-lg !font-bold text-gray-500 text-center italic mt-2"><?php echo get_field('cta_price'); ?></h4>
                <?php echo do_shortcode('[ninja_form id=2]'); ?>
            </div>
        </div>
    </div>
</section>

<section id="reviews2">
    <div class="lg:max-w-screen-lg xl:max-w-screen-xl mx-auto py-12 lg:py-16 px-6 md:px-12 xl:px-0">
        <div class="grid grid-cols-12 lg:gap-12">
            <div class="col-span-12 lg:col-span-4 my-8">
                <img class="w-full object-contain max-h-[240px] mb-8" src="<?php echo get_field('review_image_3')['url']; ?>" alt="">
                <p class="text-center"><?php echo get_field('review_3'); ?></p>
                <span class="text-orange text-center italic font-bold block mt-2"><?php echo get_field('review_writer_3'); ?></span>
            </div>
            <div class="col-span-12 lg:col-span-4 my-8">
                <img class="w-full object-contain max-h-[240px] mb-8" src="<?php echo get_field('review_image_4')['url']; ?>" alt="">
                <p class="text-center"><?php echo get_field('review_4'); ?></p>
                <span class="text-orange text-center italic font-bold block mt-2"><?php echo get_field('review_writer_4'); ?></span>
            </div>
            <div class="col-span-12 lg:col-span-4 my-8">
            <img class="w-full object-contain max-h-[240px] mb-8" src="<?php echo get_field('review_image_5')['url']; ?>" alt="">
            <p class="text-center"><?php echo get_field('review_5'); ?></p>
                <span class="text-orange text-center italic font-bold block mt-2"><?php echo get_field('review_writer_5'); ?></span>
            </div>
            <div class="col-span-12 lg:col-span-4 my-8">
                <img class="w-full object-contain max-h-[240px] mb-8" src="<?php echo get_field('review_image_6')['url']; ?>" alt="">
                <p class="text-center"><?php echo get_field('review_6'); ?></p>
                <span class="text-orange text-center italic font-bold block mt-2"><?php echo get_field('review_writer_6'); ?></span>
            </div>
            <div class="col-span-12 lg:col-span-4 my-8">
                <img class="w-full object-contain max-h-[240px] mb-8" src="<?php echo get_field('review_image_7')['url']; ?>" alt="">
                <p class="text-center"><?php echo get_field('review_7'); ?></p>
                <span class="text-orange text-center italic font-bold block mt-2"><?php echo get_field('review_writer_7'); ?></span>
            </div>
            <div class="col-span-12 lg:col-span-4 my-8">
                <img class="w-full object-contain max-h-[240px] mb-8" src="<?php echo get_field('review_image_8')['url']; ?>" alt="">
                <p class="text-center"><?php echo get_field('review_8'); ?></p>
                <span class="text-orange text-center italic font-bold block mt-2"><?php echo get_field('review_writer_8'); ?></span>
            </div>
        </div>
    </div>
</section>

<section id="foto" class="bg-dark-gray">
    <div class="foto-container relative max-w-screen-sm mx-auto">
        <img class="absolute z-[2] left-6 md:left-16 -rotate-12 translate-y-4 shadow-md h-[90%]" src="<?php echo get_field('foto_image_1')['url']; ?>" alt="">
        <img class="relative z-[1] left-1/2 -translate-x-1/2 -translate-y-4 shadow-md" src="<?php echo get_field('foto_image_2')['url']; ?>" alt="">
        <img class="absolute z-[2] top-1/3 right-0 right-10 rotate-6 shadow-md"src="<?php echo get_field('foto_image_3')['url']; ?>" alt="">
    </div>
    <div class="container pb-24 pt-10">
        <div class="text-wrapper flex flex-row items-center justify-center wrap">
            <span class="text-white font-bold mx-2"><?php echo get_field('foto_text'); ?></span>
            <a target="_blank" class="mx-2 font-bold text-orange" href="<?php echo get_field('foto_link'); ?>">Bekijk ze hier!</a>
        </div>
        <div class="video-wrapper mt-24 max-w-2xl px-6 mx-auto">
            <a href="<?php echo get_field('video'); ?>" target="_blank" class="relative flex items-center justify-center">
                <div class="image-container horizontal">
                    <img src="<?php echo get_field('video_thumbnail')['url']; ?>" alt="">
                    <div class="image-overlay opacity-60"></div>
                </div>
                <div class="info-wrapper absolute top-0 left-0 w-full h-full flex flex-col items-center justify-center">
                    <h4 class="text-white uppercase font-bold text-md xl:text-xl">SBS6 Door Het Lint</h4>
                    <h3 class="text-white font-bold text-sm xl:text-lg flex flex-row items-center">Bekijk de hele video <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 ml-2 inline" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" /></svg></h3>
                </div>
            </a>
        </div>
        
    </div>
</section>

<?php get_footer(); ?>