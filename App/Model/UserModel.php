<?php
	
	/**
	 * --------------------------------------------------------------------------
	 *   @Copyright : License MIT 2017
	 *
	 *   @Author : Alexandre Caillot
	 *   @WebSite : https://www.shiros.fr
	 *
	 *   @File : UserModel.php
	 *   @Created_at : 09/12/2017
	 *   @Update_at : 09/12/2017
	 * --------------------------------------------------------------------------
	 */

	namespace App\Model;
	
	use App\Core\AppModel;
	
	/**
	 * Représente une ligne de la base de données
	 * Herite de AppModel
	 */	
	class UserModel extends AppModel
	{
		public function getSerialId() { return substr($this->idNumber,1); }
		
		public function getDateFormat()
		{
			$date = new \DateTime();
			$date->setTimestamp($this->date);
			return $date->format($this->ConfigModule->get('User.Date.Format'));
		}
	}	
?>