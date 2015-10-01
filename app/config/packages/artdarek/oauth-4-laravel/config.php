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
		 * Twitter
		 */
		'Twitter' => array(
    		'client_id'     => 'OYpBkaznZ5YbZXkBCIRJOITl0',
    		'client_secret' => 'Xl1ciV6qEJUfiSIpNM99BrW2cxZ4xfsPnpdsZD1iIZmnXGz3LV',
		),

        /**
         * Google
         */
        'Google' => array(
		    'client_id'     => '382943520733-6of2p0sini7h68g6b3bg7ag1urb66qig.apps.googleusercontent.com',
		    'client_secret' => 'jgbOhNrCzmzsSXbciy_u_VSu',
		    'scope'         => array('userinfo_email', 'userinfo_profile'),
		),

		/**
		 * GitHub
		 */
		'GitHub' => array(
			'client_id'		=> '449d33f4b6ae451c2bbd',
			'client_secret' => 'ec641d49f5592415b6f56d1d5475bc554b5dc517',
			'scope'			=> array('user'),
		),

	)

);