<?php 
    $postID = get_the_ID();
    $post_max_count = 7;
    
?>

<div class="sidebar">
    <h3 class="sidebar-title">Наши вакансии</h3>
    <ul class="sidebar-ul">
    <?php
        $args = array(
            'post_type' => 'vacancies',
            'posts_per_page' => $post_max_count, // Количество записей на каждой странице
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1, // Текущая страница
        );

        $query = query_posts( $args );
        if( have_posts() ){
            while( have_posts() ){
                the_post();
                $curPostId = get_the_ID();
                $postID === $curPostId ? $activeClass = 'sidebar-active-item' : $activeClass = null;
                
    ?>
        
        <li class="<?php echo $activeClass;?>">
            <a href="<?php the_permalink();?>">
                <?php the_title();?>
                <span class="sidebar-date"><?php echo get_the_date();?></span>
            </a>
        </li>

        
    <?php            
            }
            wp_reset_query();
        } else {
            echo '<h4>Вакансии не найдены!</h4>';
        }
    ?>
    </ul>

    <?php
        $all_posts_count = count(query_posts(array('post_type' => 'vacancies')));
        if($all_posts_count > $post_max_count) { echo '<a href="/vacancies" class="sidebar-but but-2">Все вакансии</a>'; }
    ?>
</div>