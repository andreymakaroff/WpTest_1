<footer class="footer">
        <div class="footer__form">
            <? echo do_shortcode('[contact-form-7 id="33" title="My form"]');?>
        </div>
        <div class="footer__contact">
            <div class="footer__avatar"></div>
            <div class="footer__address">
                <div class="footer__name"><?php bloginfo( 'name' ); ?><span class="footer__icon"></span></div>
                <p class="footer__field">E. hello@mabbly.com</p>
                <p class="footer__field">P. 312 448 7473</p>
                <p class="footer__field">A. 220 N Aberdeen St, Suite, 200 Chicago, IL 60607</p>
                <div class="footer__social">
                    <? if(get_option('tw')){?><a href="<? echo get_option('tw');?>" class="footer__link">
                        <img src="./img/twitter.svg" alt="Twitter"/>
                    </a><?}?>
                    <? if(get_option('fb')){?><a href="<? echo get_option('fb');?>" class="footer__link">
                        <img src="./img/fb.svg" alt="Facebook"/>
                    </a><?}?>
                    <? if(get_option('inst')){?><a href="<? echo get_option('inst');?>" class="footer__link">
                        <img src="./img/instagram.svg" alt="Instagram"/>
                    </a><?}?>
                    <? if(get_option('ln')){?><a href="<? echo get_option('ln');?>" class="footer__link">
                        <img src="./img/in.svg" alt="LinkedIn"/>
                    </a><?}?>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
<?php get_template_part( 'template-parts/scripts', 'footer' ); ?>
</body>
</html>