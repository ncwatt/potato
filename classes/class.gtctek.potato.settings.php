<?php

class GTCTEK_Potato_Settings {
    private static $initiated = false;
    public static $settings;
    
    public static function init() {
        if ( ! self::$initiated ) {
            self::init_hooks();
        }
    }

    private static function init_hooks() {
        if ( is_admin() ) {
            add_action( 'admin_enqueue_scripts', array( 'GTCTEK_Potato_Settings', 'load_stylesheets' ) );
            add_action( 'admin_enqueue_scripts', array( 'GTCTEK_Potato_Settings', 'load_javascript' ) );
            add_action( 'wp_head', array( 'GTCTEK_Potato_Settings', 'add_meta_viewport' ) );
            add_action( 'admin_menu', array( 'GTCTEK_Potato_Settings', 'add_admin_menu_items' ) );
        }

        self::$initiated = true;
    }

    public static function register_settings() {

    }

    public static function add_meta_viewport() {
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
    }

    public static function load_stylesheets() {
        wp_enqueue_style( 'styles', GTCTEK_POTATO__PLUGIN_URI . 'assets/css/bootstrap.min.css', '', '5.3.3', 'all' );
    }

    public static function load_javascript() {
        wp_enqueue_script( 'scripts', GTCTEK_POTATO__PLUGIN_URI . 'assets/js/bootstrap.js', '', '5.3.3', 'all' );
    }

    public static function add_admin_menu_items() {
        $settings = self::get_settings();

        add_menu_page(
            __( $settings['name'], GTCTEK_POTATO__TEXT_DOMAIN ),
            $settings['name'],
            'manage_options',
            $settings['slug'],
            array( 'GTCTEK_Potato_Settings', $settings['function'] ),
            $settings['icon'],
            $settings['priority']
        );

        foreach ( $settings['children'] as $children => $child ) {
            add_submenu_page(
                $settings['slug'],
                $child['name'],
                $child['name'],
                'manage_options',
                $child['slug'],
                array( 'GTCTEK_Potato_Settings', $child['function'] )
            );
        }
    }

    public static function get_settings() {
        $items = array(
            'name'      => 'Potato',
            'slug'      => GTCTEK_POTATO__PREPEND . '-dashboard',
            'function'  => 'dashboard_page',
            'icon'      => '',
            'priority'  => 65,
            'children'  => array(
                GTCTEK_POTATO__PREPEND . '-dashboard' => array(
                    'name'      => 'Dashboard',
                    'slug'      => GTCTEK_POTATO__PREPEND . '-dashboard',
                    'function'  => 'dashboard_page',
                    'icon'      => '',
                    'priority'  => 65
                )
            )
        );
        $items['children'][GTCTEK_POTATO__PREPEND . '-percy'] = array(
            'name'      => 'Percy',
            'slug'      => GTCTEK_POTATO__PREPEND . '-percy',
            'function'  => 'percy_page',
            'icon'      => '',
            'priority'  => 65
        );

        return $items;
    }

    public static function dashboard_page() {
        ?>
        <p>Nothing to see here at the moment</p>
        <?php
    }

    public static function percy_page() {
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1>The Adventures of Percy the Potato</h1>
                    <p>
                        Once upon a time, in a lush green garden, there lived a small, round potato named Percy. Percy was no ordinary potato; 
                        he had big dreams of seeing the world beyond the garden patch.
                    </p>
                    <p>
                        One sunny morning, Percy decided it was time to embark on his grand adventure. He rolled out of the garden and onto the path 
                        leading to the bustling village nearby. As he rolled along, he encountered a friendly squirrel named Sammy.
                    </p>
                    <p>
                        "Where are you off to, Percy?" asked Sammy, twitching his bushy tail.
                    </p>
                    <p>
                        "I'm going to see the world!" Percy replied with excitement.
                    </p>
                    <p>
                        Sammy decided to join Percy on his journey. Together, they ventured through fields of tall grass, crossed babbling brooks, and even 
                        climbed a small hill. Along the way, they met many new friends, including Bella the butterfly, who showed them the most beautiful flowers, 
                        and Ollie the owl, who told them fascinating stories about the night sky.
                    </p>
                    <p>
                        One day, as they were exploring a dense forest, they stumbled upon a hidden village of vegetables. The villagers were in a panic because a 
                        mischievous rabbit named Rocco had been stealing their food. Percy, being brave and clever, came up with a plan to catch Rocco. With the help 
                        of his new friends, they set a trap and soon caught the naughty rabbit.
                    </p>
                    <p>
                        The vegetable villagers were so grateful that they threw a grand feast in Percy's honor. Percy realized that his adventure had not only 
                        allowed him to see the world but also to help others and make wonderful friends.
                    </p>
                    <p>
                        After many more adventures, Percy decided it was time to return home. He rolled back to the garden, where he was welcomed with open arms by 
                        his fellow potatoes. Percy shared his stories, and from that day on, he was known as Percy the Brave, the potato who dared to dream big.
                    </p>
                    <p>
                        And so, Percy lived happily ever after, always remembering the friends he made and the adventures he had.
                    </p>
                </div>
            </div>
        </div>
        <?php
    }
}