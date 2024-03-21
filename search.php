<?php
    $path = get_template_directory_uri(); 
	get_header();

    $rnd = rand(0, 999).''.time();
?>

	<!--  -->
    <link rel="stylesheet" href="<?php echo $path?>/assets/css/service/service.css?<?php echo $rnd;?>">
    <link rel="stylesheet" href="<?php echo $path?>/assets/css/service/service_media.css?<?php echo $rnd;?>">


    <style>
        .service{
            margin: 20px auto;
        }
        .service__item{
            position: relative;
            max-width: 300px;
            margin: 0 auto;
        }

        .service__card{
            position: absolute;
            right: 0;
            top: 0;
            padding: 5px;
            background: #c7c7c7;
            color: #fff;
        }

        .not-found{
            font-size: 22px;
            text-align: center;
            color: var(--brand-cl);
        }
        .search-img{
            display: block;
            margin: 0 auto;
            max-width: 340px;
            width: 100%;
        }
    </style>

	<section class="service">
        <div class="container">
            <div class="row">
                <div class="service__items">
                    <?php 
                        $args = array(
                            'post_type' => array('post', 'vacancies'), // Указываем, что мы ищем только записи
                            's' => get_search_query(), // Передаем поисковую строку, введенную пользователем
                            'post_status' => 'publish',
                            'post__not_in' => get_all_page_ids()
                        );
                        $query = new WP_Query($args);
                        if ( $query->have_posts() ) { ?>
                        

                            <?php while ( have_posts() ) :
                                the_post(); 
                                $post_type = get_post()->post_type == 'post' ? 'Услуга' : 'Вакансия';   ?>    
                                

                                <div class="service__item" style="width: 100%">
                                <span class="service__card">
                                    <?php echo $post_type;?>
                                </span>
                                    <?php 
                                        $img_path = get_field('icon');
                                        if(gettype(get_field('icon')) == 'NULL'){ $img_path = $path.'/assets/img/search/worker.webp'; }
                                    ?>
                                    <img src="<?php echo $img_path; ?>" alt="ТехноЛайн">
                                    <h3 class="service__item-title">
                                        <?php the_title();?>
                                    </h3>
                                    <a href="<?php the_permalink(); ?>" class="but-2">Подробнее...</a>
                                </div>
                        
                        

                        <?php 
                            endwhile;
                        } else{?>
                            <img class="search-img" src="<?php echo $path?>/assets/img/search/search.webp" alt="Не найдено!">
                            <h1 class="not-found">К сожалению, мы ничего не нашли </br>по вашему запросу</h1>
                        <?php } 
                    ?>
                </div>
            </div>
        </div>
    </section>

<?php
get_sidebar();
get_footer();
