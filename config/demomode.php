<?php 

    return [

        /**
         * ENABLE DEMO MODE?
         * ------------------------
         * Use from true to enable demo 
         * mode for your production env
         * 
         */

        'enabled' => env('DEMO_ENABLED',false),

        /**
         * CUSTOM FLASH VARIABLE
         * ------------------------
         * If you want to use custom flash
         * alerts like, realrashid/sweetalert 
         * has toast_error, success, etc flash 
         * variables to show alert, then use it
         * here.
         * 
         */

        'flash' => 'info',

        /**
         * CUSTOM MESSAGE
         * ------------------------
         * If you want to show a custom flash 
         * message to the users, set it here.
         * 
         */
        
        'msg' => 'Further action is disabled in demo mode!'
    ];