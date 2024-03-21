<?php 
	get_header('index');
	$path = get_template_directory_uri();
?>


	<main id="primary" class="site-main">
		<!-- main screen -->
		<section class="main-screen">
			<div class="main-screen__block wow fadeIn">
				<h1 class="main-screen__title">ООО «ЗАВОД ТЕХНОЛАЙН»</h1>
				<div class="main-screen__line"></div>
				<h2 class="main-screen__subtitle">Выпускает продукцию нефтегазовой, атомной отрасли <br>и строительно-промышленного сектора</h2>
				<a href="<?php echo get_template_directory_uri().'/assets/img/presentation.pdf'?>" target="_blank" class="main-screen__but but-4">Скачать презентацию</a>
				<a href="#service-section" class="main-screen__down"><i class="fa-solid fa-angle-down"></i></a>
			</div>
		</section>


		<!-- services -->
		<section id="service-section" class="service section">
			<div class="container">
				<div class="row">
					<h2 class="service__title title-1 wow fadeInDown">Что мы производим</h2>
				</div>
				<div class="row">
					<?php
						$items = get_field('production_repeater', 'option');
						foreach($items as $item){ 
					?>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							
								<div class="service__card wow fadeIn" tabindex="0" data-wow-duration=".5s">
									<img width="360px" height="362px" class="service__img img-fluid" src="<?php echo $item['img']?>" alt="Что мы производим">
									<div class="service__front">
										<h5 class="service__front-title"><?php echo $item['title']?></h5>
									</div>
									<a href="<?php echo $item['link']; ?>" class="service__hover">
										<div class="service__box box1"></div>
										<div class="service__box box2"></div>
										<div class="service__hover-content">
											<h5 class="service__hover-title"><?php echo $item['subtitle']?></h5>
											<p class="service__hover-text">
												<?php echo $item['list']?>	
											</p>
											<img class="service__prompt" src="<?php echo $path?>/assets/img/hand.gif" alt="Подсказка">
										</div>
									</a>
								</div>

							</div>
						
					<?php		
						}
					?>
				</div>
			</div>
		</section>

		<!-- advantage -->
		<section class="advantage section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<h2 class="advantage__title title-1 wow fadeInLeft">НАШЕ ПРЕИМУЩЕСТВО</h2>
						<ul class="advantage__ul wow fadeInLeft">
							<li>ПРОИЗВОДСТВЕННЫЕ И ТЕХНОЛОГИЧЕСКИЕ МОЩНОСТИ ЗАВОДА</li>
							<li>современное обрабатывающие оборудование</li>
							<li>современное сварочное оборудование</li>
							<li>современное оборудование подготовки и покраски</li>
							<li>современное оборудование по гибке и вальцовке</li>
							<li>современное оборудование по раскрою листового материала</li>
							<li>современная лаборатория неразрушающего контроля</li>
							<li>Профессиональная команда</li>
							<li>ИНДИВИДУАЛЬНЫЙ ПОДХОД</li>
						</ul>
					
						<div class="row advantage__experience-row">
							<div class="col-xs-6 advantage__border">
								<span id="experience-num" class="advantage__experience-num wow fadeInUp">12 000</span>
								<span class="advantage__experience-num advantage__experience-numtext wow fadeInUp"> 
									кв.м 
									<span class="advantage__plus">+</span>
								</span>
							</div>
							<div class="col-xs-6">
								<p class="advantage__experience-text advantage__fw brand-2-cl wow fadeInUp">
									ПРОФЕССИОНАЛИЗМ ПЕРСОНАЛА
								</p>
							</div>
						</div>

						<p class="advantage__experience-text">
							Позволяет брать в работу сложные и трудоемкие проекты, а так же выпускать продукцию в сжатые сроки
						</p>

					</div>
				</div>
			</div>
		</section>

		<!-- works -->
		<section class="works">
			<div class="container">
				<div class="row">
					<div class="works__slider">
						<div class="works__slider-page">
							<img src="<?php echo $path?>/assets/img/index/works/1.webp" alt="ТехноЛайн">
						</div>
						<div class="works__slider-page">
							<img src="<?php echo $path?>/assets/img/index/works/2.webp" alt="ТехноЛайн">
						</div>
						<div class="works__slider-page">
							<img src="<?php echo $path?>/assets/img/index/works/3.webp" alt="ТехноЛайн">
						</div>
						<div class="works__slider-page">
							<img src="<?php echo $path?>/assets/img/index/works/4.webp" alt="ТехноЛайн">
						</div>
						<div class="works__slider-page">
							<img src="<?php echo $path?>/assets/img/index/works/5.webp" alt="ТехноЛайн">
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- our possibilities -->
		<section class="our-possibilities">
			<div class="container">
				<div class="row our-possibilities__top-row">
					<div class="col-sm-8">
						<h2 class="our-possibilities__title title-1 wow fadeInLeft">Наши возможности</h2>
					</div>
					<div class="col-sm-4">
						<!-- <a href="services/" class="our-possibilities__but but-2 wow fadeInRight">Все услуги</a> -->
					</div>
				</div>
			</div>
			
			<div class="container our-posibilities__container">
				<div class="row">
					<div class="our-possibilities__gallery">

							<?php
								$id = 0;
								$items = get_field('repeater', 'option');
								foreach ($items as $item) { 
									if(!$item['dont_show_checkbox']){ ?>
										<a href="/gallery#group-<?php echo $id;?>" class="our-possibilities__item wow fadeIn">
											<img src="<?php echo $item['main_img']?>" alt="<?php echo $item['block_name']?>">
											<div class="our-possibilities__caption">
												<?php echo $item['block_name']?>
											</div>
										</a>
								<?php
										$id = $id + 1;
									}
								}
							?>

					</div>
				</div>
			</div>
		</section>

		<section class="reviews">
			<div class="container">
				<h2 class="reviews__title title-1 wow fadeInLeft">Наши отзывы</h2>
				<div class="reviews__widget">
					<div class="reviews__review" style="width:100%; max-width: 560px; height:600px;overflow:hidden;position:relative;"><iframe style="width:100%;height:100%;border:1px solid #e6e6e6;border-radius:8px;box-sizing:border-box" src="https://yandex.ru/maps-reviews-widget/237041411646?comments"></iframe><a href="https://yandex.ru/maps/org/zavod_tekhnolayn/237041411646/" target="_blank" style="box-sizing:border-box;text-decoration:none;color:#b3b3b3;font-size:10px;font-family:YS Text,sans-serif;padding:0 20px;position:absolute;bottom:8px;width:100%;text-align:center;left:0;overflow:hidden;text-overflow:ellipsis;display:block;max-height:14px;white-space:nowrap;padding:0 16px;box-sizing:border-box">Завод ТехноЛайн на карте Воронежа — Яндекс Карты</a></div>
					<div class="revews__map" style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/org/zavod_tekhnolayn/237041411646/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Завод ТехноЛайн</a><a href="https://yandex.ru/maps/193/voronezh/category/metal_structures/184106658/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Металлоконструкции в Воронеже</a><a href="https://yandex.ru/maps/193/voronezh/category/energy_equipment/184107082/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:28px;">Энергетическое оборудование в Воронеже</a><iframe src="https://yandex.ru/map-widget/v1/?ll=39.143200%2C51.684458&mode=search&oid=237041411646&ol=biz&z=18.48" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
				</div>
			</div>

		</section>
	</main>

<?php get_footer(); ?>