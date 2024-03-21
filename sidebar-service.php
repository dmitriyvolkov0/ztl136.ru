<?php $postID = get_the_ID();?>

<div class="sidebar">
    <h3 class="sidebar-title">Наши услуги</h3>
    <ul class="sidebar-ul">
    <?php
        query_posts( $args );
        if( have_posts() ){
            while( have_posts() ){
                the_post();
                $curPostId = get_the_ID();
                $postID === $curPostId ? $activeClass = 'sidebar-active-item' : $activeClass = null;
                
    ?>
        
        <li class="<?php echo $activeClass;?>">
            <a href="<?php the_permalink();?>">
                <?php the_title();?>
            </a>
            
        </li>

        
    <?php            
            }
            wp_reset_query();
        } else {
            echo '<h4>Услуги не найдены!</h4>';
        }
    ?>
    </ul>
</div>