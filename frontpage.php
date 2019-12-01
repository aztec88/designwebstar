<?php
/*
 * Template Name: FRONTPAGE
 */

get_header();

$id = get_the_ID();

?>

<div class="container-fluid home_content">
    <div class="row">
        <div class="col-12 col-lg-4 home_text">
            <div class="text_wrapper">
                <?= wpautop(get_post_field('post_content', $id)); ?>
            </div>
        </div>
       <div class="col-12 col-lg-8 services">
           <div class="row">
            <!-- Services -->

            <?php

            $args = array(
                'post_type'=>'services',
                'orderby' =>'menu_order',
                'posts_per_page' => 0
            );

            $the_query = new WP_Query( $args );
            if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
            ?>

            <div class="col-4 single_service">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('', array('class' => 'img-fluid')); ?>
                    <?= get_field( "service_icon" ); ?>
                    <div class="single_services_content">
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_excerpt() ?></p>
                    </div>
                </a>
            </div>

            <?php
            endwhile;
            endif;
            wp_reset_query();
            ?>
        </div>
       </div>
    </div>
</div>

<?php get_footer(); ?>
