<?php
/*Template name: Главная*/
get_header(); ?>
    <section class="work">
        <div class="work__inner">
            <? if(get_post_meta($post->ID,'work__title', true)){?><div class="work__title"><? echo get_post_meta($post->ID,'work__title',true);?></div><?}?>
            <? if(get_post_meta($post->ID,'work__note', true)){?><p class="work__note"><? echo get_post_meta($post->ID,'work__note',true);?></p><?}?>
            <? if(get_post_meta($post->ID,'work__btn', true)){?><a href="" class="work__btn"><? echo get_post_meta($post->ID,'work__btn',true);?></a><?}?>
            <img src="./img/path.png" srcset="./img/path@2x.png 2x,
             ./img/path@3x.png 3x" class="work__bg">
        </div>
        <div class="work__arrow js-scroll" data-block="#about">
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </div>
    </section>


<?php get_footer(); ?>