<?php
	
	/**
	 * --------------------------------------------------------------------------
	 *   @Copyright : License MIT 2017
	 *
	 *   @Author : Alexandre Caillot
	 *   @WebSite : https://www.shiros.fr
	 *
	 *   @File : HomeService.php
	 *   @Created_at : 09/12/2017
	 *   @Update_at : 09/12/2017
	 * --------------------------------------------------------------------------
	 */
	
	namespace App\Core\Services;
	
	use App\Core\Utils\Authentication\AppAuthentication;
	use App\Model\UserModel;
	use ShirOSBundle\Services\Service;
	
	class HomeService extends Service
	{
		/**
		 * Instance de la Classe de gestion de l'authentification
		 * @var AppAuthentication
		 */
		protected $AuthModule;
		
		/**
		 * HomeService constructor.
		 */
		public function __construct()
		{
			parent::__construct();
			$this->AuthModule = new AppAuthentication();
		}
		
		public function createUser(array $values): UserModel
		{
			$values[$this->ConfigModule->get('Fields.Name.Id')] = '#' . mt_rand(0000,9999);
			$values[$this->ConfigModule->get('Fields.Name.Date')] = time();
			$user = new UserModel($values);
			
			$this->AuthModule->loginWithModel($user);
			return $user;
		}
	}
?>