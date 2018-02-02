<?php
	
	/**
	 * --------------------------------------------------------------------------
	 *   @Copyright : License MIT 2017
	 *
	 *   @Author : Alexandre Caillot
	 *   @WebSite : https://www.shiros.fr
	 *
	 *   @File : route.php
	 *   @Created_at : 02/12/2017
	 *   @Update_at : 02/12/2017
	 * --------------------------------------------------------------------------
	 */
	
	$Route = [
	
		/*
		|--------------------------------------------------------------------------
		| Root Folder
		|--------------------------------------------------------------------------
		|
		| Racine du dossier des Controlleurs.
		|
		*/
	
		'ROOT_FOLDER' => 'App/Controller',
	
	
		/*
		|--------------------------------------------------------------------------
		| Routing
		|--------------------------------------------------------------------------
		|
		| Définition des routes pour l'acces au page
		|
		| Exemple :
		|   'Homepage' => [
		|		'Rule'   => '/accueil',
		|		'Action' => 'HomeController.index' | Dans le cas où tout les controllers sont dans le même dossier (App/Controller/HomeController.php)
		|                       or
		|                   'Home.HomeController.index' | Dans le cas où les controllers ne sont dans le même dossier (App/Controller/Home/HomeController.php)
		|	]
		|
		*/
		
		'Homepage' => [
			'Rule'   => '/',
			'Action' => 'HomeController.index',
		],
		
		'Security' => [
			'Rule'   => '/security',
			'Action' => 'Security.SecurityController.secure',
		],
		
		'Logout' => [
			'Rule'   => '/logout',
			'Action' => 'Security.SecurityController.logout',
		],
	
	
	/*
	|--------------------------------------------------------------------------
	| End Config
	|--------------------------------------------------------------------------
	|
	*/
	
	];

	return $Route;
?>