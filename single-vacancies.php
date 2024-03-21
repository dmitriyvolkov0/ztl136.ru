<?php

	$path = get_template_directory_uri(); 
	get_header();
	$postID = get_the_ID();

	$rnd = rand(0, 999).''.time();

	// Функция получения блока 
	function getBlock($block_name, $title){
		$items = get_field($block_name);
		echo '
			<section class="vacancy__section">
				<h2 class="vacancy__title">'.$title.'</h2>
				<ul class="vacancy__ul">';
		foreach($items as $item) 
			echo '<li>'.$item["field"].'</li>';
		echo '	</ul>
			</section>';
	}

?>
	
	<link rel="stylesheet" href="<?php echo $path.'/assets/css/vacancies/single-vacancies.css?'.$rnd?>">
	<link rel="stylesheet" href="<?php echo $path.'/assets/css/vacancies/single-vacancies-media.css?'.$rnd?>">
	
	<main class="vacancy">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-8 col-sm-8">
					
					<?php
						$output_arr = get_field('output_vacancy_checkbox');
						foreach($output_arr as $item){
							if($item['value'] == 'responsibilities')
								getBlock('responsibilities', 'Обязанности:');
							if($item['value'] == 'requirements')
								getBlock('requirements', 'Требования:');
							if($item['value'] == 'conditions') 
								getBlock('conditions', 'Условия:');
						}
					?>
					
					<section class="vacancy__section">
						<h2 class="vacancy__title">Заработная плата:</h2>
						<span class="vacancy__salary">
							<?php the_field('salary'); ?>
							 <i class="fa-solid fa-ruble-sign"></i>
						</span>
					</section>
					<button data-remodal-target="modal" class="vacancy__respond-but but-2 popup-content">Откликнуться на вакансию</button>
				</div>

				<div class="col-lg-3 col-md-4 col-sm-4">
					<?php get_sidebar('search');?>
					<?php get_sidebar('vacancies');?>
				</div>
				
			</div>
		</div>
	</main><!-- #main -->

	<?php
		get_sidebar();
		get_footer();
	?>

<div id="respond-modal" class="remodal" data-remodal-id="modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <?php echo do_shortcode('[contact-form-7 id="98d071a" title="Форма отклика на вакансию"]')?>
</div>


<!--TODO: Перенести в functions.php -->
<link rel="stylesheet" href="<?php echo $path;?>/assets/libs/remodal/remodal.css">
<link rel="stylesheet" href="<?php echo $path;?>/assets/libs/remodal/remodal-default-theme.css">
<script src="<?php echo $path;?>/assets/libs/remodal/remodal.min.js"></script>

<script>
	document.querySelector('#job').value = '<?php the_title()?>';
</script>