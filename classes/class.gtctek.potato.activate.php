<?php

class GTCTEK_Potato_Activate {
    private static $initiated = false;
    
    public static function init() {
        if ( ! self::$initiated ) {
            self::init_hooks();
        }
    }

    private static function init_hooks() {
        self::$initiated = true;
    }
}