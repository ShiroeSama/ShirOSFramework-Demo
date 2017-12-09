<?php
	
	/**
	 * --------------------------------------------------------------------------
	 *   @Copyright : License MIT 2017
	 *
	 *   @Author : Alexandre Caillot
	 *   @WebSite : https://www.shiros.fr
	 *
	 *   @File : AppController.php
	 *   @Created_at : 05/12/2017
	 *   @Update_at : 05/12/2017
	 * --------------------------------------------------------------------------
	 */

	namespace App\Controller;

	use \App;
	
	use ShirOSBundle\Utils\Url\Url;
	use ShirOSBundle\Controller\Controller;
	use ShirOSBundle\Utils\Exception\RouteException;

	class AppController extends Controller
	{
		/**
		 * AppController constructor.
		 */
		public function __construct()
		{
			parent::__construct();

			$this->ApplicationModule = App::getInstance();
			$this->UrlModule = new Url($this->ConfigModule->get('Server.Homepage'));
			$this->SessionModule->navSet();
		}
	}
?>