<?php

    /*
    * Template Name: Spreker
    */

    get_header();

?>

<section id="hero" class="relative overflow-hidden mt-20">
    <div class="container py-32 md:py-48 relative z-[1]">
        <h1 class="text-xl md:text-3xl text-white text-center font-bold"><?php echo get_field('intro_title'); ?></h1>
        <h2 class="text-lg md:text-2xl text-white text-center font-bold mt-4"><?php echo get_field('intro_subtitle'); ?></h2>
        <div class="button-wrapper flex flex-row flex-wrap items-center justify-center gap-2 mt-6">
            <div class="open-booking button primary orange">Boek als spreker</div>
            <a href="#verhaal" class="button primary grey">Lees het verhaal</a>
        </div>
    </div>
    <div class="background-container">
        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', false); ?>
        <div class="gradient-overlay bg-gradient-to-r from-black/30 via-50% via-black/70 to-black/30"></div>
    </div>
</section>

<section id="spreker">
    <div class="container">
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 xl:gap-20">
            <div class="content-col lg:col-span-2">
                <div id="verhaal" class="verhaal content-my">
                    <h2><?php echo get_field('story_title'); ?></h2>
                    <div class="text-wrapper">
                        <?php echo get_field('story_text'); ?>
                    </div>
                </div>
                <div id="bekend-van" class="bekend-van content-my">
                    <h2>Bekend van:</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-4 mt-8">
                        <div class="boek-col flex flex-row items-center gap-2 !py-0 !pl-2 !pr-4">
                            <div class="image-block w-20 h-24 min-w-20 min-h-24 relative">
                                <img class="w-20 h-auto absolute left-0 max-lg:left-4 top-1/2 -translate-y-1/2 object-contain" src="<?php echo get_field('book_image')['url']; ?>" alt="<?php echo get_field('book_image')['alt']; ?>">
                            </div>
                            <div class="title-col flex flex-col py-4 max-lg:pl-10">
                                <h3 class="text-base md:text-lg font-bold"><?php echo get_field('book_title'); ?></h3>
                                <a class="text-sm italic text-orange underline" href="<?php echo get_field('book_link'); ?>">Lees meer</a>
                            </div>
                        </div>
                        <div class="koets-col flex flex-row items-center gap-2 !py-0 !pl-2 !pr-4 relative">
                            <div class="absolute bg-white top-1/2 -translate-y-1/2 left-2 image-block w-28 h-28 min-w-28 min-h-28 rounded-full border-[2px] border-dashed border-orange p-1">
                                <img class="rounded-full" src="<?php echo get_field('koets_image')['url']; ?>" alt="<?php echo get_field('koets_image')['alt']; ?>">
                            </div>
                            <div class="title-col flex flex-col py-4 pl-32">
                                <h3 class="text-base md:text-lg font-bold"><?php echo get_field('koets_title'); ?></h3>
                                <h5 class="text-sm italic"><?php echo get_field('koets_subtitle'); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="onderwerpen" class="onderwerpen content-my">
                    <h2>Onderwerpen</h2>
                    <div class="subjects-wrapper flex flex-col">
                        <?php while(have_rows('subjects')): the_row(); ?>
                            <div class="subject flex flex-row gap-4 py-4 border-b border-dark-gray/10">
                                <div class="subject-number"><?php echo get_row_index(); ?></div>
                                <h3 class="text-base md:text-lg font-bold"><?php echo get_sub_field('item'); ?></h3>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="melding mt-6">
                        <div class="bg-dark-gray/5 border-[2px] border-dashed border-dark-gray/30 rounded-[8px] p-4 text-sm font-bold"><?php echo get_field('other_subjects'); ?></div>
                    </div>
                </div>
                <div id="doelgroepen" class="doelgroepen content-my">
                    <h2>Voor wie?</h2>
                    <h4 class="text-base md:text-lg text-dark-gray"><?php echo get_field('doelgroep_subtitle'); ?></h4>
                    <div class="doelgroepen mt-12 grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-10">
                        <?php while(have_rows('target_audience')): the_row(); ?>
                            <div class="doelgroep-col flex flex-col items-center !pt-0">
                                <div class="doelgroep-icon w-16 min-w-16 h-16 min-h-16 bg-orange rounded-full flex items-center justify-center -translate-y-1/2 relative -mb-12">
                                    <img class="w-8 h-8 object-contain" src="<?php echo get_sub_field('icon')['url']; ?>" alt="<?php echo get_sub_field('icon')['alt']; ?>">
                                </div>
                                <h3 class="text-base text-center font-bold mt-4"><?php echo get_sub_field('group'); ?></h3>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div id="reacties" class="reacties content-my">
                    <h2><?php echo get_field('feedback_title'); ?></h2>
                    <div class="feedback-swiper">
                        <div class="swiper-wrapper">
                            <?php while(have_rows('feedback_videos')): the_row(); ?>
                                <div class="swiper-slide">
                                    <div class="feedback-video">
                                        <div class="video-wrapper">
                                            <video src="<?php echo get_sub_field('video')['url']; ?>" controls></video>
                                        </div>
                                        <h6 class="italic text-base mt-3"><?php echo get_sub_field('title'); ?></h6>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <div id="boeken" class="md:!p-8 content-my">
                    <h3 class="text-base md:text-lg font-bold text-center lg:text-left"><?php echo get_field('bookings_title'); ?></h3>
                    <div class="button-wrapper mt-4 flex flex-row justify-center md:justify-start flex-wrap gap-2.5">
                        <div class="open-booking button primary orange">Offerte aanvragen</div>
                        <a href="/#contact" class="button primary grey">Kom in contact</a>
                    </div>
                </div>
            </div>
            <div class="sidebar-col content-my">
                <div class="inhoud-block mb-6 border border-dark-gray/10 rounded-[8px] md:rounded-[16px] px-4 py-6">
                    <ul>
                        <li><a href="#verhaal">Het verhaal</a></li>
                        <li><a href="#bekend-van">Bekend van</a></li>
                        <li><a href="#onderwerpen">Onderwerpen</a></li>
                        <li><a href="#doelgroepen">Voor wie?</a></li>
                        <li><a href="#reacties">Reacties</a></li>
                        <li><a href="#boeken">Boeken</a></li>
                    </ul>
                </div>
                <div class="block h-full w-full relative">
                    <div class="norbert-col top-24 flex flex-col items-center sticky border border-dark-gray/10 rounded-[8px] md:rounded-[16px] px-4 py-8">
                        <div class="image-block w-32 h-32 relative rounded-full overflow-hidden">
                            <img class="w-full h-full object-contain" src="<?php echo get_field('norbert_photo')['url']; ?>" alt="<?php echo get_field('norbert_image')['alt']; ?>">
                        </div>
                        <div class="text-wrapper mt-4">
                            <h3 class="text-center text-lg md:text-xl font-bold">Norbert Hulleman</h3>
                            <div class="text-sm text-orange text-center font-bold"><?php echo get_field('norbert_about'); ?></div>
                            <div class="button-wrapper mt-4 flex items-center justify-center">
                                <div class="open-booking button primary orange">Boek als spreker</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<sidebar id="booking">
    <div class="inner-booking relatie w-full h-full relative z-[2]">
        <div class="overlay fixed top-0 left-0 w-full h-full bg-dark-gray opacity-0 z-[1]"></div>
            <div class="inner-wrapper overflow-y-scroll flex flex-col w-full bg-white absolute z-[2] right-0 top-0 h-full lg:w-2/3 xl:w-1/2 translate-x-full px-6 lg:px-12 py-16">
                <div id="closeForms" class="close-form absolute z-[3] top-4 right-4 lg:right-6 w-10 h-10 bg-orange flex items-center justify-center text-white fill-white hover:cursor-pointer duration-300 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 duration-200 ease" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </div>
                <h2 class="text-xl md:text-2xl font-bold text-dark-gray mb-4"><?php echo get_field('form_title'); ?></h2>
                <div class="form-wrapper">
                    <?php echo do_shortcode("[ninja_form id=" . get_field('form_id') . "]"); ?>
                </div>
            </div>
        <div class="overlay fixed top-0 left-0 w-full h-full bg-dark-gray opacity-0 z-[1]"></div>
    </div>
</sidebar>

<?php get_footer(); ?>