<?php
	
	/**
	 * --------------------------------------------------------------------------
	 *   @Copyright : License MIT 2017
	 *
	 *   @Author : Alexandre Caillot
	 *   @WebSite : https://www.shiros.fr
	 *
	 *   @File : Autoloader.php
	 *   @Created_at : 05/12/2017
	 *   @Update_at : 05/12/2017
	 * --------------------------------------------------------------------------
	 */

	namespace App;

	/**
	 * System permettant de charger automatiquement les differentes class
	 */

	class Autoloader
	{
		/**
		 * Enregistre le Namespace avec une méthode de 'CallBack' en cas d'utilisation de classe de ce Namepsace
		 */
		public static function register() { spl_autoload_register(array(__CLASS__, 'autoload')); }

		/**
		 * Charge / Inclut le fichier de la Classe, lors de son utilisation dans l'Application (Instanciation)
		 *
		 * @param String $class | Correspond au nom complet de la classe à instancier
		 */
		public static function autoload(String $class)
		{
			if(strpos($class, __NAMESPACE__ . '\\') === 0)
			{	
				$class = str_replace(__NAMESPACE__ . '\\' , '' , $class);
				$class = str_replace('\\', DIRECTORY_SEPARATOR , $class);
				require __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
			}
		}
	}
?>