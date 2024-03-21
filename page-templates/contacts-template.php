<?php
/*
Template Name: Шаблон страницы "Контакты"
Template Post Type: page
*/
?>

<?php 
    get_header();
    $path = get_template_directory_uri();
    $items = get_field('contacts_repeater','option');
?>

<main>
<section class="contacts">
        <div class="container">
            <div class="row">
                <div class="contacts__items">
                    <?php foreach($items as $item){ ?>   
                        
                        <div class="contacts__item">
                            <div class="contacts__header">
                                <?php echo $item['icon']?>
                                <h3 class="contacts__title">
                                    <?php echo $item['title']?>
                                </h3>
                            </div>
                            <div class="contacts__body">
                                <?php echo $item['description']?>
                            </div>
                        </div>

                    <?php  
                        }
                    ?>
                </div>

                <div>
                    <?php
                        the_field('yandex_map', 'option');
                    ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
