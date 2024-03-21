<?php 
	// Удаление ненужных блоков в админке
	function hide_comments_menu() {
		remove_menu_page('edit-comments.php');
	}
	add_action('admin_menu', 'hide_comments_menu');


	//Подключаем стили
	add_action("wp_enqueue_scripts", "style_theme");
	function style_theme(){
		$rnd = rand(0, 999).''.time();
		wp_enqueue_style( "bootstrap", get_template_directory_uri() . '/assets/libs/bootstrap/bootstrap.css');//Bootstrap grid
		wp_enqueue_style( "default", get_template_directory_uri() . '/assets/css/default.css?'.$rnd);
		wp_enqueue_style( "slick_css", get_template_directory_uri() . '/assets/libs/slick/slick.css'); // slick
		wp_enqueue_style( "animate_css", get_template_directory_uri() . '/assets/libs/animate.min.css'); // animate css
		
		if(is_home()){
			wp_enqueue_style( "index_css", get_template_directory_uri() . '/assets/css/index/index.css?'.$rnd);
			wp_enqueue_style( "index_media", get_template_directory_uri() . '/assets/css/index/index_media.css?'.$rnd);
		}else if(is_page('services')){
			wp_enqueue_style( "service_css", get_template_directory_uri() . '/assets/css/service/service.css?'.$rnd);
			wp_enqueue_style( "service_media_css", get_template_directory_uri() . '/assets/css/service/service_media.css?'.$rnd);
		}else if(is_page('gallery')){
			wp_enqueue_style( "fancybox_css",'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css'); //Fancybox
			wp_enqueue_style( "gallery_css", get_template_directory_uri() . '/assets/css/gallery/gallery.css?'.$rnd);
			wp_enqueue_style( "gallery_css_media", get_template_directory_uri() . '/assets/css/gallery/gallery-media.css?'.$rnd);
		}else if(is_page('video')){
			wp_enqueue_style( "video_css", get_template_directory_uri() . '/assets/css/video/video.css?'.$rnd);
		}else if(is_page('contacts')){
			wp_enqueue_style( "contacts_css", get_template_directory_uri() . '/assets/css/contacts/contacts.css?'.$rnd);
			wp_enqueue_style( "contacts_media_css", get_template_directory_uri() . '/assets/css/contacts/contacts-media.css?'.$rnd);
		}else if(is_page('vacancies')){
			wp_enqueue_style( "vacancies_css", get_template_directory_uri() . '/assets/css/vacancies/vacancies.css?'.$rnd);
			wp_enqueue_style( "vacancies_media_css", get_template_directory_uri() . '/assets/css/vacancies/vacancies-media.css?'.$rnd);
		}
	}


	// Подключаем скрипты
	add_action("wp_footer", "script_theme");
	function script_theme(){
		$rnd = rand(0, 999).''.time(); 
		if(is_page('gallery')){
			wp_enqueue_script('fancybox_js', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js'); //Fancybox
			wp_enqueue_script('gallery_js', get_template_directory_uri().'/assets/js/gallery.js?v='.$rnd);
		}
		wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/a6e07ca6ec.js');
		
		wp_deregister_script('jquery'); //Jquery
		wp_register_script('jquery', 'https://code.jquery.com/jquery-2.2.0.min.js');
		wp_enqueue_script('jquery');

		wp_enqueue_script('slick_js', get_template_directory_uri() .'/assets/libs/slick/slick.js');//slick
		wp_enqueue_script('wow_js', get_template_directory_uri() .'/assets/libs/wow.min.js');//wow
		wp_enqueue_script('index_js', get_template_directory_uri() .'/assets/js/index.js?v='.$rnd);		

	}

	//Регистрация меню
	add_action('after_setup_theme', 'register_menu');
	function register_menu(){
		register_nav_menu( 'top', 'Меню в шапке');
		register_nav_menu( 'bottom', 'Меню в футере');
	}

	//Подключаем хлебные крошки
	require_once (dirname(__FILE__).'/inc/breadcrumbs.php');

	// Регистрация таксономии для нового типа записи "Вакансии"
	add_action( 'init', 'createVacanciesTaxonomy' );
	function createVacanciesTaxonomy(){
		register_taxonomy( 'department', [ 'vacancies' ], [
			'label'                 => '',
			'labels'                => [
				'name'              => 'Отделы',
				'singular_name'     => 'Отделы',
				'search_items'      => 'Найти отдел',
				'all_items'         => 'Все отделы',
				'view_item '        => 'Смотреть отдел',
				'parent_item'       => 'Родитель отдела',
				'parent_item_colon' => 'Родитель отдела:',
				'edit_item'         => 'Редактировать отдел',
				'update_item'       => 'Обновить отдел',
				'add_new_item'      => 'Добавить новый отдел',
				'new_item_name'     => 'Название нового отдела',
				'menu_name'         => 'Отделы',
				'back_to_items'     => '← Вернуться к отделам',
			],
			'description'           => '',
			'public'                => true,
			'hierarchical'          => true,

			'rewrite'               => true,
			//'query_var'             => $taxonomy, // название параметра запроса
			'capabilities'          => array(),
			'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
			'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
			'show_in_rest'          => null, // добавить в REST API
			'rest_base'             => null, // $taxonomy
		] );
	}

	// Регистрация нового типа "Вакансии"
	function custom_post_navigation_markup_template($template, $class) {
		$template = '
		%3$s';
		return $template;
	}
	add_filter('navigation_markup_template', 'custom_post_navigation_markup_template', 10, 2);

	function custom_post_type() {
		$labels = array(
			'name'               => 'Вакансии',
			'singular_name'      => 'Вакансия',
			'menu_name'          => 'Вакансии',
			'add_new'            => 'Добавить новую вакансию',
			'add_new_item'       => 'Добавить новую вакансию',
			'edit_item'          => 'Редактировать вакансию',
			'new_item'           => 'Новая вакансия',
			'view_item'          => 'Просмотреть вакансию',
			'search_items'       => 'Поиск вакансии',
			'not_found'          => 'Вакансии не найдены',
			'not_found_in_trash' => 'Вакансия не найдены в корзине',
			'parent_item_colon'  => 'Родительский элемент:',
			'all_items'          => 'Все вакансии',
			'archives'           => 'Архивы',
			'insert_into_item'   => 'Вставить в вакансию',
			'uploaded_to_this_item' => 'Загруженные для этой вакансии',
			'featured_image'        => 'Изображение',
			'set_featured_image'    => 'Задать изображение',
			'remove_featured_image' => 'Удалить изображение',
			'use_featured_image'    => 'Использовать как изображение',
			'filter_items_list'     => 'Фильтровать список вакансий',
			'items_list_navigation' => 'Навигация по списку вакансий',
			'items_list'            => 'Список вакансий',
			'name_admin_bar'        => 'Вакансии',
		);
	
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'vacancies' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'menu_icon'          => 'dashicons-id',
			'hierarchical'       => false,
			'menu_position'      => 5,
			'supports'           => array( 'title', 'editor')
		);
	
		register_post_type( 'vacancies', $args );
	}
	add_action( 'init', 'custom_post_type' );

	// Связываем тип записи "вакансии" с single-vacancies.php
	function custom_post_type_single_template( $template ) {
		if ( is_singular( 'custom_post_type' ) ) {
			$template = get_template_directory() . '/single-vacancies.php';
		}
		return $template;
	}
	add_filter( 'template_include', 'custom_post_type_single_template' );


	// удаляет <br> и <p> из вывода форма contact form 7 
	add_filter('wpcf7_autop_or_not', '__return_false');

	
	// Функция для добавления блока в раздел "Консоль"
	function add_custom_block_to_dashboard() {
		wp_add_dashboard_widget(
			'content_manager_dashboard_widget',  // Идентификатор виджета
			'Для отдела кадров',
			'render_personnel_department_block'
		);
		wp_add_dashboard_widget(
			'personnel_department_dashboard_widget2',
			'Для контент-менеджера',
			'render_content_manager_block'
		);
	}
	function render_personnel_department_block() {
		echo '
			<p><b>Отклики на вакансии:<b></p>
			<a class="button button-primary" href="admin.php?page=cfdb7-list.php">Смотреть отклики</a>';
	}
	function render_content_manager_block(){
		echo '
			<style>
				.widget__body hr{
					margin: 20px 0;
				}
				.widget__arrow{
					display: inline-block;
					color: #3858e9;
					font-size: 13px;
					line-height: 2.15384615;
					min-height: 30px;
					width: fit-content;
					margin: 0;
					padding: 0;
				}
			</style>
			<p><b>Редактирование страниц:<b></p>
			<div class="widget__body">
				<a class="button button-primary" href="admin.php?page=main_settings">Главная</a>
				<a class="button button-primary" href="admin.php?page=gallery">Фотогалерея</a>
				<a class="button button-primary" href="admin.php?page=video">Видео</a>
				<a class="button button-primary" href="admin.php?page=contacts">Контакты</a>
				<a class="button button-primary" href="edit.php">Услуги</a>
				<hr>
				<a class="button button-primary" href="edit.php?post_type=vacancies">Вакансии</a>
				<span class="widget__arrow"> > </span>
				<a class="button button-primary" href="edit-tags.php?taxonomy=department&post_type=vacancies">Отделы</a>
				
			</div>
			';
	}
	add_action('wp_dashboard_setup', 'add_custom_block_to_dashboard');
?>