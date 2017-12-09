<?php
	
	/**
	 * --------------------------------------------------------------------------
	 *   @Copyright : License MIT 2017
	 *
	 *   @Author : Alexandre Caillot
	 *   @WebSite : https://www.shiros.fr
	 *
	 *   @File : SecurityController.php
	 *   @Created_at : 05/12/2017
	 *   @Update_at : 05/12/2017
	 * --------------------------------------------------------------------------
	 */
	
	namespace App\Controller\Security;

	use App\Controller\AppController;
	use App\Core\Utils\Authentication\AppAuthentication;
	
	class SecurityController extends AppController
	{
		/**
		 * Instance de la Classe de gestion de l'authentification
		 * @var AppAuthentication
		 */
		protected $AuthModule;
		
		/**
		 * SecurityController constructor.
		 */
		public function __construct()
		{
			parent::__construct();
			$this->AuthModule = new AppAuthentication();
		}
		
		/* ------------------------ Route ------------------------ */
		
		/**
		 * Homepage
		 */
		public function secure()
		{
			$this->render('Security.security');
		}
		
		/**
		 * Logout
		 */
		public function logout()
		{
			$this->AuthModule->logout();
			header('Location: ' . $this->UrlModule->getUrl());
		}
	}
	?>