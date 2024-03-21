<?php
/*
Template Name: Шаблон страницы "Наши вакансии"
Template Post Type: page
*/
?>

<?php 
    get_header();
    $path = get_template_directory_uri();

    // Получаем все элементы таксономии "department"
    $terms = get_terms( [
        'taxonomy' => 'department',
        'hide_empty' => false,
    ] );

    // Получите выбранный раздел из URL-параметров или любым другим способом
    $selected_department = $_GET['department'];
    $post_max_count = 6;
?>

<main>
    <div class="container">
        <div class="row">
            <section class="vacancies">
                <ul class="vacancies__menu">
                    <?php
                        if($selected_department == null){ 
                            echo '<li class="vacancies__menu-active_link"><a href="'.get_permalink().'">Все вакансии</a></li>'; }
                        else {
                            echo '<li><a href="'.get_permalink().'">Все вакансии</a></li>';}
                    ?>
                    
                    <?php if(count($terms) > 0): 
                        foreach($terms as $term){
                            $active_class = null;
                            if($term->slug == $selected_department) $active_class = 'vacancies__menu-active_link';
                            echo '<li class="'.$active_class.'"><a href="'.get_permalink().'?department='.$term->slug.'">'.$term->name.'</a></li>';
                        }
                    ?>
                    <?php
                        endif;
                    ?>
                    
                </ul>

                <div class="vacancies__items">
                    <?php
                        $tax_query = null;

                        if(trim($selected_department) != null){
                            $tax_query = array(
                                array(
                                    'taxonomy' => 'department',
                                    'field' => 'slug',
                                    'terms' => $selected_department,
                                ),
                            );
                        }

                        $args = array(
                            'post_type' => 'vacancies',
                            'posts_per_page' => $post_max_count,
                            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                            'tax_query' => $tax_query
                        );
                        $query = new WP_Query( $args );

                        if ( $query->have_posts() ) :
                            while ( $query->have_posts() ) : $query->the_post();?>
                             
                             <a href="<?php the_permalink();?>" class="vacancies__item">
                                <div class="vacancies__left-col">
                                    <h3 class="vacancies__title">
                                        <?php the_title(); ?>
                                    </h3>
                                    <span class="vacancies__date">
                                        <?php echo get_the_date()?>
                                    </span>
                                </div>
                                <div class="vacancies__right-col">
                                    <span class="vacancies__salary">
                                        <?php the_field('salary'); ?>
                                        <i class="fa-solid fa-ruble-sign"></i>
                                    </span>
                                </div>
                            </a>
                             
                        <?php
                            endwhile;
                            
                            // Выводим пагинацию
                            echo '<div class="vacancies__pagination">';
                            echo paginate_links(array(
                                'total' => $query->max_num_pages,
                                'current' => max(1, get_query_var('paged')),
                                'prev_text'    => __('<i class="fa-solid fa-chevron-left"></i>'),
                                'next_text'    => __('<i class="fa-solid fa-chevron-right"></i>'),
                            ));
                            echo '</div>';

                            wp_reset_postdata();
                        else :
                            echo '<h2>Вакансии не найдены!</h2>';
                        endif;
                    ?>
                </div>
            </section>
        </div>
    </div>
</main>

<?php
    get_footer();
?>