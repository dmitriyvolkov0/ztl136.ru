<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package techno-plant-wp
 */

	$path = get_template_directory_uri(); 
	get_header('404');
?>
	<main class="err">
		<img class="err__img" src="<?php echo $path ?>/assets/img/404/404.webp" alt="Страница не найдена!">
		<h1 class="err__title">Страница не найдена!</h1>
		<p class="err_description">Извините, страница, которую вы ищете, не существует. Если вы думаете, что что-то сломалось, сообщите о проблеме.</p>
		<div class="err__buts">
			<a class="err__but but-3" href="/">На главную</a>
			<a class="err__but but-3" href="mailto:thl136@mail.ru">Связаться с нами</a>
		</div>
	</main>