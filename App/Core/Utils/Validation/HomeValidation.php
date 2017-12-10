<?php
	
	/**
	 * --------------------------------------------------------------------------
	 *   @Copyright : License MIT 2017
	 *
	 *   @Author : Alexandre Caillot
	 *   @WebSite : https://www.shiros.fr
	 *
	 *   @File : HomeValidationn.php
	 *   @Created_at : 06/12/2017
	 *   @Update_at : 06/12/2017
	 * --------------------------------------------------------------------------
	 */
		
	namespace App\Core\Utils\Validation;
	
	use ShirOSBundle\Config;
	use ShirOSBundle\Utils\Validation\Validation;
	use ShirOSBundle\Utils\Validation\ValidationBuilder;
	use ShirOSBundle\Utils\Validation\Type\EmailType;
	use ShirOSBundle\Utils\Validation\Type\StringType;
	
	class HomeValidation extends Validation
	{
		/**
		 * Instance de la Classe de gestion des Configs
		 * @var Config
		 */
		protected $ConfigModule;
		
		/**
		 * @var string
		 */
		protected $emptyMessage = '';
		
		public function __construct()
		{
			$this->ConfigModule = Config::getInstance();
			parent::__construct();
		}
		
		protected function buildForm(ValidationBuilder &$builder)
		{
			$builder->add(StringType::type(), $this->ConfigModule->get('Fields.Name.Username'))
					->add(EmailType::type(), $this->ConfigModule->get('Fields.Name.Email'), array(
						self::PARAM_MESSAGE => 'Format Incorrect'
					));
		}
	}
?>