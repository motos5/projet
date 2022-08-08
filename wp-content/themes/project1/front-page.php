<?php get_header(); ?>

<main class="main" id="main">
    <section class="archive-content">
        <div class="container">
            <div class="archive-content__box">
                <div class="archive-content__left">
                    <?php get_sidebar(); ?>
                </div>
    
                <div class="archive-content__right">
                    <div class="archive-content__top">
                        <h2 class="archive-content__title">Speakers</h2>
                    </div>
        
                    <div class="archive-content__tabs">
                        <div class="archive-content__list" id="archive-list">
                            <?php
                                $speakers = new WP_Query(array(
                                    'post_type' => 'speakers',
                                    'posts_per_page' => -1,
                                ));
                            ?>
                            <?php if ( $speakers->have_posts() ) : while ( $speakers->have_posts() ) : $speakers->the_post();?>
                            <div class="archive-content__item">
                                <a class="archive-content__flag-link" href="#">
                                    <?php
                                    if( get_field('flag') == 'germany' ) { ?>
                                        
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 15.5C12.1421 15.5 15.5 12.1421 15.5 8C15.5 3.85786 12.1421 0.5 8 0.5C3.85786 0.5 0.5 3.85786 0.5 8C0.5 12.1421 3.85786 15.5 8 15.5Z" fill="#ED4C5C"/>
                                                <path d="M11.75 6.75H9.25V4.25H6.75V6.75H4.25V9.25H6.75V11.75H9.25V9.25H11.75V6.75Z" fill="white"/>
                                                <path d="M7.97344 0.5C4.69844 0.5 1.92344 2.6 0.898438 5.5H15.0484C14.0234 2.6 11.2484 0.5 7.97344 0.5Z" fill="#3E4347"/>
                                                <path d="M7.97344 15.5C11.2484 15.5 14.0234 13.425 15.0484 10.5H0.898438C1.92344 13.425 4.69844 15.5 7.97344 15.5Z" fill="#FFE62E"/>
                                                <path d="M0.901562 5.5C0.626562 6.275 0.476562 7.125 0.476562 8C0.476562 8.875 0.626562 9.725 0.901562 10.5H15.0516C15.3266 9.725 15.4766 8.875 15.4766 8C15.4766 7.125 15.3266 6.275 15.0516 5.5H0.901562Z" fill="#ED4C5C"/>
                                            </svg>
                                        
                                    <?php } if( get_field('flag') == 'switzerland' ) { ?>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 15.5C12.1421 15.5 15.5 12.1421 15.5 8C15.5 3.85786 12.1421 0.5 8 0.5C3.85786 0.5 0.5 3.85786 0.5 8C0.5 12.1421 3.85786 15.5 8 15.5Z" fill="#ED4C5C"/>
                                                <path d="M11.75 6.75H9.25V4.25H6.75V6.75H4.25V9.25H6.75V11.75H9.25V9.25H11.75V6.75Z" fill="white"/>
                                            </svg>
                                    <?php } ?>
                                </a>
                                <a class="archive-content__country-link" href="<?php the_permalink(); ?>">
                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'speakers_archive', array('class' => "archive-content__country-img",)); ?>
                                </a>
                                <div class="archive-content__info">
                                    <a class="archive-content__name-link" href="<?php the_permalink(); ?>">
                                        <h4 class="archive-content__name"><?php the_title(); ?></h4>
                                    </a>
                                    <a class="archive-content__position-link" href="#">
                                        <p class="archive-content__position"><?php the_excerpt(); ?></p>
                                    </a>
                                </div>
                            </div>
                            <?php endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>