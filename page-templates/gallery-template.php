<?php
/*
Template Name: Шаблон страницы "Галерея"
Template Post Type: page
*/
?>

<?php 
    get_header();
    $path = get_template_directory_uri();
?>

<main>
<section class="gallery">
        <div class="container" id="gallery-container">
                <?php 
                    $items = get_field('repeater', 'option');
                    $items = json_encode($items);
                ?>

                <script>
                    // TODO: переписать код
                    let items = <?php echo $items?>;
                    let container = document.querySelector('#gallery-container');
                    let output_count = 3;

                    //Выводит блоки по порядку
                    function outputBlocks(blocks){
                        blocks.forEach((block, id) => {
                            let elem = `<div class="row" id="block-id-${id}">`;
                            elem += `<h2 class="gallery__title" id="group-${id}">${block.block_name}</h2>`;
                            elem += `<div class="gallery__items">`;
                                //Сюда вставаляется галерея
                            elem += `</div>`;
                            elem += `</div>`;
                            container.innerHTML += elem;

                            outputGallery(id, 0, 3);
                            outputLoadMore(id);                            
                        });
                    }

                    // Выводит галерею заданного блока
                    function outputGallery(id, start, end){
                        let gallery_block = document.querySelector(`#block-id-${id} .gallery__items`);
                        let elem = '';
                        
                        for(let i = start; i < end; i++){
                            let cur_item_url = items[id]['gallery_arr'][i];
                            if(cur_item_url == null) { cur_item_url = "<?php echo $path . '/assets/img/plug.webp'?>";}
                            elem += `
                                <a class="gallery__item" href="${cur_item_url}" data-fancybox="gallery-${id}" data-caption="${items[id]['block_name']}">
                                    <img src="${cur_item_url}" alt="${items[id]['block_name']}"/>
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                            `;
                        }
                        gallery_block.innerHTML += elem;
                    }

                    function loadMoreClick(id){
                        let loadMoreBut = document.querySelector(`#loadmore-id-${id}`);
                        outputGallery(id, 3, items[id]['gallery_arr'].length);
                        loadMoreBut.remove();
                    }

                    function outputLoadMore(id){
                        if(items[id]['gallery_arr'].length > 6){
                            let row_block = document.querySelector(`#block-id-${id}`);
                            row_block.innerHTML += `<button class="loadmore-but but-1" id="loadmore-id-${id}" onclick="loadMoreClick(${id})" data-start=3 data-end=6>Больше фото</button>`;
                        }
                        
                    }
                    outputBlocks(items);
                </script>
        </div>
    </section>

</main>

<?php get_footer(); ?>
