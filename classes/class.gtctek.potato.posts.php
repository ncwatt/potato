<?php
    class GTCTEK_Potato_Posts {
        private static $initiated = false;
    
        public static function init() {
            if ( ! self::$initiated ) {
                self::init_hooks();
            }
        }

        private static function init_hooks() {
            add_shortcode( 'gtc_posts_list', array( 'GTCTEK_Potato_Posts', 'posts_list' ) );
            self::$initiated = true;
        }

        public static function posts_list( $atts ) {
            return "boobs";
            ?>
            <p>More boobies</p>
            <?php
        }
    }
?>