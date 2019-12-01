<?php

get_header();
$id = get_the_ID();

?>

<div class="container">
    <div class="row">
        <div class="page_content col-12 custom_padding">
            <h1><?php the_title(); ?></h1>

            <?= wpautop(get_post_field('post_content', $id)); ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>
