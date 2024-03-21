<?php
/*
Template Name: Шаблон страницы "Видео"
Template Post Type: page
*/
?>

<?php 
    get_header();
    $path = get_template_directory_uri();
?>

<main>
<section class="video">
        <div class="container">
            <div class="row">
                <div class="video__items">
                    <?php
                        $items = get_field('video_repeater', 'option');
                        // var_dump($items);
                        foreach ($items as $item) { ?>
                            <div class="video__item">
                                
                                <iframe class="video__iframe" width="auto" height="auto" src="<?php echo $item['video_link']?>" title="YouTube video player" 
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen
                                    srcdoc="
                                        <style>
                                            *{padding:0;margin:0;overflow:hidden}
                                            html,body{height:100%}
                                            a{display:flex; justify-content:center; align-items:center;}
                                            img,span,div{position:absolute;width:100%;top:0;bottom:0;}
                                            div{margin:auto}
                                            span{height:100%;text-align:center;font:20px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black;display: flex;align-items: center;justify-content: center;}
                                            div{width: 85px; height: 50px; background: rgba(25, 24, 24, 0.74); border-radius: 10px;}
                                            a:hover div{background: red;}
                                        </style>
                                        <a href=<?php echo $item['video_link']?>>
                                            <img src=<?php echo $path?>/assets/img/video/preview.jpg alt='ТехноЛайн'>
                                            <div>
                                                <span>▶</span>
                                            </div>
                                        </a>">
                                </iframe>
                                <h3 class="video__title">
                                    <?php echo $item['video_name']?>
                                </h3>
                            </div>
                    <?php
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
