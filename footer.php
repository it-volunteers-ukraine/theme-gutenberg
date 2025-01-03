<footer class="footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-logo">
                    <?php 
                        if ( has_custom_logo() ) {
                            echo get_custom_logo();
                        }
                    ?>
                </div>
            </div>

            <nav class="nav">
					<?php wp_nav_menu( [
							'theme_location'       => 'menu-footer',                          
							'container'            => false,                           
							'menu_class'           => 'menu',
							'menu_id'              => false,    
							'echo'                 => true,                            
							'items_wrap'           => '<ul id="%1$s" class="header_list %2$s">%3$s</ul>',  
							] ); 
						?>
                </nav>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
