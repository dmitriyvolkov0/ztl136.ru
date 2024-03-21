<?php
/*
Template Name: Шаблон страницы "Услуги"
Template Post Type: page
*/
?>

<?php 
    get_header();
    $path = get_template_directory_uri();
?>

<main>
    <section class="service">
        <div class="container">
            <div class="row">
                <div class="service__items">

                <?php
                    query_posts( $args );
                    if( have_posts() ){
                        while( have_posts() ){
                            the_post(); 
                            if(!get_field('dont_show_in_services')) {?>
                            
                            <div class="service__item">
                                <img src="<?php the_field('icon'); ?>" alt="ТехноЛайн">
                                <h3 class="service__item-title">
                                    <?php the_title(); ?>
                                </h3>
                                <a href="<?php the_permalink(); ?>" class="but-2">Подробнее...</a>
                            </div>
                <?php }}
                        wp_reset_query();
                    } else {
                        echo '<h4>Услуги не найдены!</h4>';
                    }
                ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>