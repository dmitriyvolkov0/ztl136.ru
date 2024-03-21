<?php
    $department_slug = get_queried_object()->slug;
    wp_redirect( '/vacancies/?department=' . $department_slug );
    get_header('index');
?>

<?php
    get_footer();
?>