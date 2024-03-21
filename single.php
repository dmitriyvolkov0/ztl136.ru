<?php

	$path = get_template_directory_uri(); 
	get_header('index');
?>

	<?php 
		$rnd = rand(0, 999).''.time();
	?>
	<link rel="stylesheet" href="<?php echo $path.'/assets/css/service/taxonomy-service.css?'.$rnd?>">
	<link rel="stylesheet" href="<?php echo $path.'/assets/css/service/taxonomy-service-media.css?'.$rnd?>">
	
	
	<main id="primary" class="site-main">
		<div class="service">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-8 col-sm-8">
						<img class="service__img" src="<?php the_field('img'); ?>" alt="ТехноЛайн">

						<h1 class="service__title"><?php the_title();?></h1>

						<div class="service__description">
							<?php the_content(); ?>
						</div>

						<div class="service__pagination">
							<?php
								the_post_navigation(
									array(
										'prev_text' => '
											<span class="service__pagination-prev but-3">
												<i class="fa-solid fa-angle-left"></i>Назад
											</span>',
										'next_text' => '
											<span class="service__pagination-next but-3">
												Далее<i class="fa-solid fa-angle-right"></i>
											</span>
										',
									)
								);
							?>
						</div>

					</div>
					<div class="col-lg-3 col-md-4 col-sm-4">
						<?php get_sidebar('search');?>
						<?php get_sidebar('service');?>
					</div>
				</div>
			</div>
		</div>
		
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
