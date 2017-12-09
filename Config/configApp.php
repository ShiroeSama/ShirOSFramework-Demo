<?php
	
	/**
	 * --------------------------------------------------------------------------
	 *   @Copyright : License MIT 2017
	 *
	 *   @Author : Alexandre Caillot
	 *   @WebSite : https://www.shiros.fr
	 *
	 *   @File : configApp.php
	 *   @Created_at : 02/12/2017
	 *   @Update_at : 02/12/2017
	 * --------------------------------------------------------------------------
	 */

    /*
    |--------------------------------------------------------------------------
    | Config App
    |--------------------------------------------------------------------------
    |
    */

    $Config = [
	
	    /*
		|--------------------------------------------------------------------------
		| User
		|--------------------------------------------------------------------------
		|
		*/
	
	    'User' => [
		    'Date' => [
			    'Format' => 'd/m/Y à H:i:s',
		    ],
	    ],
	
	    /*
		|--------------------------------------------------------------------------
		| Session
		|--------------------------------------------------------------------------
		|
		*/
		
	    'Session' => [
		    'Date' => 'Date',
		    'Grade' => 'Grade',
	    ],
	
	    /*
		|--------------------------------------------------------------------------
		| Fields
		|--------------------------------------------------------------------------
		|
		*/
	
	   'Fields' => [
		    'Name' => [
			    # Account / Profile
			    'Id' => 'Id',
			    'Username' => 'Username',
			    'Email' => 'Email',
			    'Date' => 'Date'
		    ],
	   ],

    /*
    |--------------------------------------------------------------------------
    | End Config
    |--------------------------------------------------------------------------
    |
    */

    ];

	/*
	|--------------------------------------------------------------------------
	| Return Config
	|--------------------------------------------------------------------------
	|
	*/

	return $Config;
?>