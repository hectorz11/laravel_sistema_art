<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => '1575770806035406',
            'client_secret' => 'b708acd52e6e80132c04bfb5ce89081c',
            'scope'         => array('email'),
        ),

        /**
         * Google
         */
        'Google' => array(
		    'client_id'     => '382943520733-6of2p0sini7h68g6b3bg7ag1urb66qig.apps.googleusercontent.com',
		    'client_secret' => 'jgbOhNrCzmzsSXbciy_u_VSu',
		    'scope'         => array('userinfo_email', 'userinfo_profile'),
		),	

	)

);