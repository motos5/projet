<?php
/*
* Template name: Home Page
*/
get_header();
?>

<main class="main" id="main">
    <?php if ( have_posts() ){ while ( have_posts() ){ the_post(); ?>
    <section class="home-header">
        <div class="container home-header__container">
            <div class="home-header__inner">
                <img class="home-header__img" src="<?php the_field('background_image'); ?>" alt="">
                <div class="home-header__content">
                    <p class="home-header__subtitle"><?php the_field('subtitle'); ?></p>
                    <h1 class="home-header__title"><?php the_field('title'); ?></h1>
                    <p class="home-header__description"><?php the_field('description'); ?></p>
                    <a class="home-header__link" href="#">register</a>
                </div>
            </div>
        </div>
    </section>
    <section class="welcome">
        <div class="container">
            <div class="welcome__inner">
                <div class="welcome__left">
                    <img class="welcome__img" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/welcome-image.jpg" alt="">
                </div>
                <div class="welcome__right">
                    <h2 class="welcome__title"><?php the_field('welcome_title'); ?></h2>
                    <?php the_content(); ?>
                    <a class="arrow-btn welcome__arrow-btn" href="<?php echo get_post_type_archive_link('speakers'); ?>">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25.7279 12C25.7279 11.4477 25.2802 11 24.7279 11L15.7279 11C15.1756 11 14.7279 11.4477 14.7279 12C14.7279 12.5523 15.1756 13 15.7279 13L23.7279 13L23.7279 21C23.7279 21.5523 24.1756 22 24.7279 22C25.2802 22 25.7279 21.5523 25.7279 21V12ZM12.7071 25.435L25.435 12.7071L24.0208 11.2929L11.2929 24.0208L12.7071 25.435Z" fill="#202020"></path>
                            <circle cx="18" cy="18" r="17" stroke="#202020" stroke-width="2"></circle>
                        </svg>
                        Learn more
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php } } else { ?>
	<div><?php esc_html_e('The page currently does not contain any information. Maybe this will be fixed soon.', 'pro'); ?></div>
<?php } ?>
</main>

<?php get_footer(); ?>