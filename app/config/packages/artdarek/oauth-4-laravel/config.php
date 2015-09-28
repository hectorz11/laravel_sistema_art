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

		/**
		 * Twitter
		 */
		'Twitter' => array(
    		'client_id'     => 'YlX8o3x8VHUiYKpH2v4DQFgj5',
    		'client_secret' => 'prwqn7ZRpyKv6hE4w3DYQUKkHv6j1KH9sO5hwD3bQm6elsgvkH',
   			 // No scope - oauth1 doesn't need scope
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