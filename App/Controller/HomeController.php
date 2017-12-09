<?php
	
	/**
	 * --------------------------------------------------------------------------
	 *   @Copyright : License MIT 2017
	 *
	 *   @Author : Alexandre Caillot
	 *   @WebSite : https://www.shiros.fr
	 *
	 *   @File : HomeController.php
	 *   @Created_at : 05/12/2017
	 *   @Update_at : 05/12/2017
	 * --------------------------------------------------------------------------
	 */
		
	namespace App\Controller;
	
	use App\Core\Services\HomeService;
	use App\Core\Utils\Authentication\AppAuthentication;
	use App\Core\Utils\Validation\HomeValidation;
	use ShirOSBundle\View\HTML\ShirOSForm;
	
	class HomeController extends AppController
	{
		/**
		 * Instance de la classe de validation de formulaire
		 * @var HomeService
		 */
		protected $HomeService;
		/**
		 * Instance de la Classe de gestion de l'authentification
		 * @var AppAuthentication
		 */
		protected $AuthModule;
		
		/**
		 * Instance de la classe de validation de formulaire
		 * @var HomeValidation
		 */
		protected $ValidationModule;
		
		
		/**
		 * HomeController constructor.
		 */
		public function __construct()
		{
			parent::__construct();
			$this->HomeService = new HomeService();
			$this->AuthModule = new AppAuthentication();
			$this->ValidationModule = new HomeValidation();
		}
		
		
		/* ------------------------ Route ------------------------ */
		
		/**
		 * Homepage
		 * @throws \ShirOSBundle\Utils\Exception\ValidationException
		 */
		public function index()
		{
			$errors = [];
			$valid = true;
			$logged = false;
			$user = NULL;
				
            if($this->RequestModule->isPostRequest()) {
                $post = $this->RequestModule->getPostRequest();
                
                $this->ValidationModule->validateForm($post);
	            $valid = $this->ValidationModule->isValid();
                
                if ($valid) {
                    $values = $this->ValidationModule->getValues();
                    $user = $this->HomeService->createUser($values);
                    $logged = $this->AuthModule->loggedAdmin();
                } else {
                	$errors = $this->ValidationModule->getErrors();
                }
            }

			$elements = [
				'Items 1',
				'Items 2',
				'Items 3',
				'Items 4',
				'Items 5',
				'Items 6',
				'Items 7',
				'Items 8',
				'Items 9',
				'Items 10',
			];
            
            $form = new ShirOSForm($this->RequestModule->getPostRequest());
			
			$var = compact('elements', 'form', 'user', 'logged', 'valid', 'errors');
			$this->render('Home.index', $var);
		}
	}
?>