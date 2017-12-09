<?php
	
	/**
	 * --------------------------------------------------------------------------
	 *   @Copyright : License MIT 2017
	 *
	 *   @Author : Alexandre Caillot
	 *   @WebSite : https://www.shiros.fr
	 *
	 *   @File : UserModel.php
	 *   @Created_at : 05/12/2017
	 *   @Update_at : 05/12/2017
	 * --------------------------------------------------------------------------
	 */

	namespace App\Gateway;
	use ShirOSBundle\Database\Gateway\MySQLGateway;
	
	/**
	 * Représente la table User en base de données
	 * Herite de Gateway
	 */
	class UserGateway extends MySQLGateway
	{
		/**
		 * Nom de la Table
		 * @var String
		 */
		protected $table = "Users";

		/* ------------------------ Opérations CRUD et Opérations supplémentaire pour les MangaNews ------------------------ */
		
			/**
			 * Récupère la liste de tous les utilisateurs
			 *
			 * @return mixed
			 */
			public function all()
			{
				$request = "
					SELECT *
					FROM {$this->table} U
					ORDER BY U.username
				";
				return $this->query($request);
			}
	}
?>