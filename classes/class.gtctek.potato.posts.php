<?php

class GTCTEK_Potato_Posts {
    private static $initiated = false;
    
    public static function init() {
        if ( ! self::$initiated ) {
            self::init_hooks();
        }
    }
}