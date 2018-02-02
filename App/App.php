<?php
	
	/**
	 * --------------------------------------------------------------------------
	 *   @Copyright : License MIT 2017
	 *
	 *   @Author : Alexandre Caillot
	 *   @WebSite : https://www.shiros.fr
	 *
	 *   @File : App.php
	 *   @Created_at : 05/12/2017
	 *   @Update_at : 05/12/2017
	 * --------------------------------------------------------------------------
	 */

	use App\Gateway\AppManager;
	
	use ShirOSBundle\Utils\Url\Url;
	use ShirOSBundle\ApplicationKernel;
	use ShirOSBundle\Database\Gateway\Manager;
	
	/**
	 * Classe représentant l'Application
	 *
	 * Redéfinition de la classe 'Router' du Framework
	 * Permet d'ajouter des comportements, tels que la gestion des accès aux pages
	 *
	 */
	class App extends ApplicationKernel
	{
		/**
		 * Contient l'instance de la classe
		 * @var App
		 */
		protected static $_instance;
		
		/**
		 *	Instance de la Classe de gestion des Urls
		 * 	@var Url
		 */
		protected $UrlModule;
		
		
		/**
		 * App constructor, Singleton
		 */
		protected function __construct()
		{
			parent::__construct();
			$this->UrlModule = new Url($this->ConfigModule->get('Server.Homepage'));
		}
		
		/**
		 * Retourne l'instance de la classe 'App'
		 *
		 * @return App
		 */
		public static function getInstance()
		{
			if(is_null(self::$_instance))
				self::$_instance = new App();
			return self::$_instance;
		}
		
		
		/* ------------------------ Accès à la DAL (Database) ------------------------ */
		
		/**
		 *	Recupère un Manager pour une Gateway spécifique
		 *
		 *	@param String $name
		 *
		 *	@return AppManager
		 */
		public function getManager(String $name): Manager { return new AppManager($name, $this->getDatabase()); }


		/* ------------------------ Récupèration des Css ------------------------ */

			/**
			 * Recupère une liste de feuille Css
			 *
			 * @param String $dir
			 *
			 * @return String
			 */
			public function getCss(String $dir)
			{
				$css = "";
				$prohibitedDirCss = array(
					'.',
					'..',
					'Users',
					'Fonts',
				);

				if(file_exists($dir))
				{
					$files = scandir($dir);

					foreach ($files as $file) 
					{
						if(in_array($file, $prohibitedDirCss))
							continue;

						$css .= "<link type=\"text/css\" rel=\"stylesheet\" href=\"{$this->UrlModule->getUrl()}/{$dir}{$file}\">\n";
					}
				}

				return $css;
			}


		/* ------------------------ Autoload ------------------------ */

			/**
			 * Fonction permetant d'appeler les Autoloaders pour charger tout nos fichiers
			 */
			public static function load()
			{
				require ROOT . '/App/Autoloader.php';
				App\Autoloader::register();

				require ROOT . '/Core/Core.php';
				Core\Core::register();
				
				/* -- Création de la Session Utilisateur -- */
				ShirOSBundle\Utils\Session\Session::getInstance()->initSession();
				
				/* -- Création de la Session de Navigation -- */
				ShirOSBundle\Utils\Session\Session::getInstance()->navInit();
			}
	}
?>