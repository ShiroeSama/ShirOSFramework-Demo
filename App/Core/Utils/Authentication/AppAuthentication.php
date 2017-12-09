<?php
	
	/**
	 * --------------------------------------------------------------------------
	 *   @Copyright : License MIT 2017
	 *
	 *   @Author : Alexandre Caillot
	 *   @WebSite : https://www.shiros.fr
	 *
	 *   @File : AppAuthentication.php
	 *   @Created_at : 05/12/2017
	 *   @Update_at : 05/12/2017
	 * --------------------------------------------------------------------------
	 */

	namespace App\Core\Utils\Authentication;

	use \App;

	use App\Model\UserModel;

	use ShirOSBundle\Model\Model;
	use ShirOSBundle\Utils\Authentication\Authentication;

	class AppAuthentication extends Authentication
	{
		/**
		 * Manager des Users
		 * @var App\Gateway\AppManager
		 */
		protected $UserManager;

		/**
		 * Constructeur du System d'authentification	
		 */
		public function __construct()
		{
			parent::__construct($this->UserManager);
		}

		/* ------------------------ Fonctions Complémentaires ------------------------ */

			/**
			 * Retourne le tableau associatif contenant les informations d'authentification et de l'Utilisateur
			 *
			 * @param Model $user
			 *
			 * @return array
			 */
			protected function createAuthArray(Model $user): array
			{
				/** @var UserModel $user */
				
				return array(
					$this->ConfigModule->get('ShirOS.Session.Id') => $user->username . $user->id,
					$this->ConfigModule->get('ShirOS.Session.Name') => $user->username,
					$this->ConfigModule->get('Session.Email') => $user->email,
					$this->ConfigModule->get('Session.Date') => $user->date,
					$this->ConfigModule->get('Session.Grade') => $this->ConfigModule->get('Grade.Admin'),
				);
			}

			/**
			 * Créer la Session de l'Utilisateur, en utilisant le Module de Session
			 *
			 * @param Model $user
			 */
			protected function createSession(Model $user)
			{
				$auth = $this->createAuthArray($user);

				/* -- Création de la Session -- */

					$this->SessionModule->authInit($auth);
			}

			/**
			 * Mets à jour la Session de l'Utilisateur, en utilisant le Module de Session
			 *
			 * @param UserModel $user
			 */
			public function updateSession(UserModel $user)
			{
				$auth = $this->createAuthArray($user);

				/* -- Modification de la Session -- */

					$this->SessionModule->authEdit($auth);
			}
		
		/* ------------------------ Login ------------------------ */
		
			/**
			 * Permet de vérifier si l'utilisateur est connecté en Admin
			 *
			 * @param UserModel $user
			 * @return void
			 */
			public function loginWithModel(UserModel $user)
			{
				$this->createSession($user);
			}
		
		/* ------------------------ Fonctions isAdmin ------------------------ */
		
			/**
			 * Permet de vérifier si l'utilisateur est connecté en Admin
			 *
			 * @return bool
			 */
			public function loggedAdmin()
			{
				return $this->logged() && $this->SessionModule->authValueFor($this->ConfigModule->get('Session.Grade')) === $this->ConfigModule->get('Grade.Admin');
			}
	}
?>