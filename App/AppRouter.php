<?php
	
	/**
	 * --------------------------------------------------------------------------
	 *   @Copyright : License MIT 2017
	 *
	 *   @Author : Alexandre Caillot
	 *   @WebSite : https://www.shiros.fr
	 *
	 *   @File : Router.php
	 *   @Created_at : 05/12/2017
	 *   @Update_at : 05/12/2017
	 * --------------------------------------------------------------------------
	 */

	namespace App;

	use App\Core\Utils\Authentication\AppAuthentication;
	
	use ShirOSBundle\Config;
	use ShirOSBundle\Router;
	use ShirOSBundle\Utils\Exception\RouteException;
	
	
	/**
	 * Classe gérant l'acces aux differentes Pages
	 *
	 * Redéfinition de la classe 'Router' du Framework
	 * Permet d'ajouter des comportements, tels que la gestion des accès aux pages
	 *
	 */
	class AppRouter extends Router
	{
		/**
		 * Contient l'instance de la classe
		 * @var AppRouter
		 */
		protected static $_instance;
		
		/**
		 * Instance de la Classe de gestion de l'authentification
		 * @var AppAuthentication
		 */
		protected $AuthModule;


		/**
		 * Construteur de la classe 'AppRouter', Singleton
		 *
		 * @param String $filePath
		 */
		protected function __construct(String $filePath)
		{
			parent::__construct($filePath);
			$this->AuthModule = new AppAuthentication();
			
		}

		/**
		 * Retourne l'instance de la classe 'AppRouter'
		 *
		 * @param String $filePath | Default Value => NULL
		 *
		 * @return AppRouter
		 */
		public static function getInstance(string $filePath = NULL)
		{
			if(is_null($filePath))
				$filePath = self::$routing_path;

			if(is_null(self::$_instance))
				self::$_instance = new AppRouter($filePath);
			return self::$_instance;
		}
		
		/**
		 * @throws RouteException
		 */
		protected function checkAccessPermissions()
		{
			$controller = str_replace($this->controllerFolder . '\\', '', $this->controller);
			
			switch ($controller) {
				case 'Security\SecurityController':
					if ($this->action === 'logout')
						break;
					
					if (!$this->AuthModule->loggedAdmin())
						throw new RouteException(RouteException::ROUTE_FORBIDDEN_ERROR_CODE);
					break;
			}
		}
	}
?>