<?php
/*
 * Template Name: FRONTPAGE
 */

get_header();

$id = get_the_ID()

?>

<div class="container-fluid home_content">
    <div class="row">
        <div class="col-4 home_text">
           <?= wpautop(get_post_field('post_content', $id)); ?>
        </div>
       <div class="col-8 services">
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
                    </a>
                </div>

            <?php
            endwhile;
            endif;
            ?>
        </div>
       </div>
    </div>
</div>

<?php get_footer(); ?>
