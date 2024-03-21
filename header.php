
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Технолайн завод</title>
	<meta name="description" content="<?php echo get_bloginfo('description')?>">
	<meta name="keywords" content="изготовление металлоконструкций, нефтегазовый, строительство, сварочные работы, дробеметная обработка, завод, предприятие, сайт завода, заводы россии" />
	
	
<?php 
	require_once (dirname(__FILE__).'/inc/preloader.php');
	$path = get_template_directory_uri(); 
?>

	<?php 
		wp_head(); 

		$rnd = rand(0, 999).''.time();
		$page_data = get_queried_object();
	?>
	
</head>
<body>
	<header>
		<nav class="menu">
			<div class="container">
				<div class="row">
					<div class="menu__section">
						<a href="/"><img class="menu__logo" src="<?php echo $path . '/assets/img/logo.png' ?>" alt="ТехноЛайн"></a>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'top',
									'menu_class'     => 'menu__ul',
									'menu_id' 		 => null,
									'container' 	 => false
								)
							);
						?>
						<i class="menu__mobile-but fa-solid fa-bars"></i>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<section class="header-screen">
        <h1 class="header-screen__title wow fadeIn">
			<?php echo $page_data->post_title?>
		</h1>
        <div class="header-screen__breadcrumbs wow fadeIn">
            <span><?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs('|'); ?></span>
        </div>
    </section>