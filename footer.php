<div class="pagetop js-pagetop"><i class="fas fa-angle-up"></i>PAGE TOP</div>

<footer class="footer">
    <div class="container">
        <div class="footer_inner">
            <?php
            wp_nav_menu(
                array(
                    'menu' => 'global-navigation',
                    'menu_class' => '',
                    'container' => 'nav'
                )
            );
            ?>
            <div class="footer_copyright">
                <small>&copy; BISTRO CALME All rights reserved.</small>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>