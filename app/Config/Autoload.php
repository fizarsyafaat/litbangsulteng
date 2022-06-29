<?php

namespace Config;

use CodeIgniter\Config\AutoloadConfig;

/**
 * -------------------------------------------------------------------
 * AUTO-LOADER
 * -------------------------------------------------------------------
 * This file defines the namespaces and class maps so the Autoloader
 * can find the files as needed.
 *
 * NOTE: If you use an identical key in $psr4 or $classmap, then
 * the values in this file will overwrite the framework's values.
 */
class Autoload extends AutoloadConfig
{

	/**
	 * -------------------------------------------------------------------
	 * Namespaces
	 * -------------------------------------------------------------------
	 * This maps the locations of any namespaces in your application to
	 * their location on the file system. These are used by the autoloader
	 * to locate files the first time they have been instantiated.
	 *
	 * The '/app' and '/system' directories are already mapped for you.
	 * you may change the name of the 'App' namespace if you wish,
	 * but this should be done prior to creating any namespaced classes,
	 * else you will need to modify all of those classes for this to work.
	 *
	 * Prototype:
	 *
	 *   $psr4 = [
	 *       'CodeIgniter' => SYSTEMPATH,
	 *       'App'	       => APPPATH
	 *   ];
	 *
	 * @var array
	 */
	public $psr4 = [
		APP_NAMESPACE => APPPATH, // For custom app namespace
		'Config'      => APPPATH . 'Config',

		//Helper

		'WebRoot' => ROOTPATH . 'modules/Web',
		'ApiRoot' => ROOTPATH . 'modules/Api',
		'CronJobRoot' => ROOTPATH . 'modules/CronJobs',
		'BusinessProcessRoot' => ROOTPATH . 'modules/BusinessProcess',
		'ApiMobileStudentRoot' => ROOTPATH . 'modules/APIMobileStudent',
		'ApiMobileTeacherRoot' => ROOTPATH . 'modules/APIMobileTeacher',

		//Regular
		'Auth' => ROOTPATH . 'modules/Web/Auth',
		'Admin' => ROOTPATH . 'modules/Web/Admin',
		'Home' => ROOTPATH . 'modules/Web/Home',
		'Master' => ROOTPATH . 'modules/Web/Master',
		'User' => ROOTPATH . 'modules/Web/User',

		//BP Master{
		'BusinessProcessRoot/Master/EmailMessage' => ROOTPATH . 'modules/BusinessProcess/Master/EmailMessage',
		//}

		//WEB{
			//FOR Admin
			//Admin Regular
			'AdminpageFolder' => ROOTPATH . 'modules/Web/Admin/Adminpage',
			'AdminTemplateFolder' => ROOTPATH . 'modules/Web/Admin/Template',

				//Homepage MVC
				'AdminpageViewCont' => ROOTPATH . 'modules/Web/Admin/Adminpage/Controllers/ViewCont',
				'AdminpageFuncCont' => ROOTPATH . 'modules/Web/Admin/Adminpage/Controllers/FuncCont',
				'AdminpageView' => ROOTPATH . 'modules/Web/Admin/Adminpage/Views',
				'AdminpageModel' => ROOTPATH . 'modules/Web/Admin/Adminpage/Models',

				//HomeTemplate MVC
				'AdminTemplateViewCont' => ROOTPATH . 'modules/Web/Admin/Template/Controllers/ViewCont',
				'AdminTemplateFuncCont' => ROOTPATH . 'modules/Web/Admin/Template/Controllers/FuncCont',
				'AdminTemplateView' => ROOTPATH . 'modules/Web/Admin/Template/Views',
				'AdminTemplateModel' => ROOTPATH . 'modules/Web/Admin/Template/Models',

			//FOR User
			//User Regular
			'UserpageFolder' => ROOTPATH . 'modules/Web/User/Adminpage',
			'UserTemplateFolder' => ROOTPATH . 'modules/Web/User/Template',

				//Homepage MVC
				'StudentpageViewCont' => ROOTPATH . 'modules/Web/User/Studentpage/Controllers/ViewCont',
				'StudentpageFuncCont' => ROOTPATH . 'modules/Web/User/Studentpage/Controllers/FuncCont',
				'StudentpageView' => ROOTPATH . 'modules/Web/User/Studentpage/Views',
				'StudentpageModel' => ROOTPATH . 'modules/Web/User/Studentpage/Models',

				//HomeTemplate MVC
				'StudentTemplateViewCont' => ROOTPATH . 'modules/Web/User/Template/Controllers/ViewCont',
				'StudentTemplateFuncCont' => ROOTPATH . 'modules/Web/User/Template/Controllers/FuncCont',
				'StudentTemplateView' => ROOTPATH . 'modules/Web/User/Template/Views',
				'StudentTemplateModel' => ROOTPATH . 'modules/Web/User/Template/Models',


			//FOR AUTH
			'AuthpageFolder' => ROOTPATH . 'modules/Web/Auth/Authpage',
			'AuthTemplateFolder' => ROOTPATH . 'modules/Web/Auth/Template',

				//Homepage MVC
				'AuthpageViewCont' => ROOTPATH . 'modules/Web/Auth/Authpage/Controllers/ViewCont',
				'AuthpageFuncCont' => ROOTPATH . 'modules/Web/Auth/Authpage/Controllers/FuncCont',
				'AuthpageView' => ROOTPATH . 'modules/Web/Auth/Authpage/Views',
				'AuthpageModel' => ROOTPATH . 'modules/Web/Auth/Authpage/Models',

				//HomeTemplate MVC
				'AuthTemplateViewCont' => ROOTPATH . 'modules/Web/Auth/Template/Controllers/ViewCont',
				'AuthTemplateFuncCont' => ROOTPATH . 'modules/Web/Auth/Template/Controllers/FuncCont',
				'AuthTemplateView' => ROOTPATH . 'modules/Web/Auth/Template/Views',
				'AuthTemplateModel' => ROOTPATH . 'modules/Web/Auth/Template/Models',		


			//FOR HOME
			//Home Regular
			'HomepageFolder' => ROOTPATH . 'modules/Web/Home/Homepage',
			'HomeTemplateFolder' => ROOTPATH . 'modules/Web/Home/Template',

				//Homepage MVC
				'HomepageViewCont' => ROOTPATH . 'modules/Web/Home/Homepage/Controllers/ViewCont',
				'HomepageFuncCont' => ROOTPATH . 'modules/Web/Home/Homepage/Controllers/FuncCont',
				'HomepageView' => ROOTPATH . 'modules/Web/Home/Homepage/Views',
				'HomepageModel' => ROOTPATH . 'modules/Web/Home/Homepage/Models',

				//HomeTemplate MVC
				'HomeTemplateViewCont' => ROOTPATH . 'modules/Web/Home/Template/Controllers/ViewCont',
				'HomeTemplateFuncCont' => ROOTPATH . 'modules/Web/Home/Template/Controllers/FuncCont',
				'HomeTemplateView' => ROOTPATH . 'modules/Web/Home/Template/Views',
				'HomeTemplateModel' => ROOTPATH . 'modules/Web/Home/Template/Models',
		//}
	];

	/**
	 * -------------------------------------------------------------------
	 * Class Map
	 * -------------------------------------------------------------------
	 * The class map provides a map of class names and their exact
	 * location on the drive. Classes loaded in this manner will have
	 * slightly faster performance because they will not have to be
	 * searched for within one or more directories as they would if they
	 * were being autoloaded through a namespace.
	 *
	 * Prototype:
	 *
	 *   $classmap = [
	 *       'MyClass'   => '/path/to/class/file.php'
	 *   ];
	 *
	 * @var array
	 */
	public $classmap = [];
}
