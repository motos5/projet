<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__left">
                    <?php
                        if( has_custom_logo() ){
                            echo get_custom_logo();
                        }
                    ?>
                    <nav class="header__menu menu">
                        <?php
                            wp_nav_menu( [
                                'theme_location'  => 'menu-header',
                                'container'       => '',
                                'menu_class'      => 'menu__list',
                                'menu_id'         => '',
                                'echo'            => true,
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            ] );
                        ?>
                        <!-- <ul class="menu__list">
                            <li class="menu__item">
                                <a class="menu__link" href="#">Home</a>
                            </li>
                            <li class="menu__item">
                                <a class="menu__link" href="#">About</a>
                            </li>
                            <li class="menu__item">
                                <a class="menu__link" href="#">Speakers</a>
                            </li>
                            <li class="menu__item">
                                <a class="menu__link" href="#">Agenda</a>
                            </li>
                            <li class="menu__item">
                                <a class="menu__link" href="#">Contact</a>
                            </li>
                        </ul> -->
                    </nav>
                </div>
                <div class="header__right">
                    <div class="user-menu">
                        <a class="user-menu__btn" href="#">register</a>
                        <div class="language-wrapper">
                            <select class="language" name="select-language" id="">
                                <option value="en">EN</option>
                                <option value="ua">UA</option>
                                <option value="ru">RU</option>
                            </select>
                            <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 5L9 1" stroke="#404040" stroke-width="2"/>
                            </svg>
                        </div>
                    </div>
                    <button class="menu-btn" type="button">
                    <svg class="menu-btn__img" width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="30" height="4" fill="#323232"/>
                        <rect y="9" width="20" height="4" fill="#323232"/>
                        <rect y="18" width="10" height="4" fill="#323232"/>
                    </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>