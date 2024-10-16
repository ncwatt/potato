<?php
    class GTCTEK_Potato_Templates {
        private static $initiated = false;
    
        public static function init() {
            if ( ! self::$initiated ) {
                self::init_hooks();
            }
        }

        private static function init_hooks() {
            add_filter( 'theme_page_templates', array( 'GTCTEK_Potato_Templates', 'register_templates' ), 10, 3 );
            add_filter( 'template_include', array( 'GTCTEK_Potato_Templates', 'include_template' ), 99 );
            self::$initiated = true;
        }

        private static function plugin_templates() {
            $templates = [];

            $templates[ 'blank_dev_page.php' ] = 'Blank Dev Page';

            return $templates;
        }

        public static function register_templates( $page_templates, $theme, $post ) {
            $templates = self::plugin_templates();

            foreach ( $templates as $key=>$value ) {
                $page_templates[$key] = $value;
            }

            return $page_templates;
        }

        public static function include_template( $template ) {
            global $post;
            $templates = self::plugin_templates();
            $slug = get_page_template_slug( $post->ID );

            if ( isset( $templates[$slug] ) ) {
                $template = GTCTEK_POTATO__PLUGIN_DIR . "templates/" . $slug;
            }

            return $template;
        }
    }
?>