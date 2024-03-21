<?php $path = get_template_directory_uri(); ?>

<footer class="footer">
    <div class="container">
        <div class="footer__sec d-flex">
           
            <div class="footer__inf-block">
                <h3 class="footer__subtitle">Наши контакты</h3>
                <ul class="footer__inf">
                    <li><i class="fa fa-map"></i><span><a href="/contacts/#map">Россия, 394019, г. Воронеж ул. Малаховского, 51</a></span></li>
                    <li>
                        <i class="fa fa-phone"></i>
                        <span>
                            <a href="tel:+74732619157">+7 (473) 261-91-57</a>,
                            <a href="tel:+74732619158">+7 (473) 261-91-58</a>
                        </span>
                    </li>
                    <li><i class="fa fa-envelope"></i><span><a href="mailto:thl.office@mail.ru">thl.office@mail.ru</a></span></li>
                    <li><i class="fa fa-globe-europe"></i><span><a href="https://ztl136.ru">ztl136.ru</a></span></li>
                </ul>
            </div>

            
            <div class="footer__inf-block">
                <h3 class="footer__subtitle">Документы</h3>
                <ul class="footer__inf">
                    <!-- <li><a href="#">Политика конфиденциальности</a></li> -->
                    <!-- <li><a href="#">Пользовательское соглашение</a></li> -->
                    <li><a href="/policy/">Политика обработки персональных данных</a></li>
                </ul>
            </div>

        
            <div class="footer__menu-block">
                <img class="footer__logo" src="<?php echo $path . '/assets/img/logo.png' ?>" alt="ТехноЛайн">
                <!-- TODO: добавить в админку -->
                <ul class="footer__menu">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/services">Услуги</a></li>
                    <li><a href="/gallery">Фотогалерея</a></li>
                    <li><a href="/video">Видео</a></li>
                    <li><a href="/contacts">Контакты</a></li>
                </ul>
            </div>
           
        </div>
    </div>

    <div class="footer__bottom">
        <div class="container">
            <div class="row">
                <div class="footer__bottom-block">
                    <span></span>
                    <span class="footer__bottom-copyright">© 2019-<?php echo date('Y');?> Все права защищены, <a href="<?php echo bloginfo('url')?>/wp-admin/" target="_blank">Завод Технолайн</a></span>
                    <!-- TODO: добавить в админку -->
                    <a class="footer__social" href="https://www.youtube.com/@user-kx5vi4hy3g" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<button id="up-but"><i class="fa-solid fa-angle-up"></i></button>


<?php wp_footer(); ?>
</body>
</html>
