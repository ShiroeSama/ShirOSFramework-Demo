<?php
	
	/**
	 * --------------------------------------------------------------------------
	 *   @Copyright : License MIT 2017
	 *
	 *   @Author : Alexandre Caillot
	 *   @WebSite : https://www.shiros.fr
	 *
	 *   @File : AppModel.php
	 *   @Created_at : 05/12/2017
	 *   @Update_at : 05/12/2017
	 * --------------------------------------------------------------------------
	 */

	namespace App\Core;

	use ShirOSBundle\Model\Model;
	
	/**
	 * Représente une ligne de la base de données
	 * Herite de Model
	 */	
	class AppModel extends Model
	{
		/**
		 * Constructeur de notre class
		 *
		 * @param Array $array | Default Value = NULL
		 */
		public function __construct($array = NULL) { parent::__construct($array); }
	}	
?>