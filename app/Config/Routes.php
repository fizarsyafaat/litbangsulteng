<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('\HomepageViewCont\Home');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//for web{
    //for home{
        $routes->get('/', '\AuthpageViewCont\UserAuth::login',['as' => 'home']);
		$routes->get('/logout', '\AuthpageFuncCont\HTTP\FUserAuth::logout',['as' => 'logout']);
	//for auth{
		$routes->group('',['filter' => 'onlyguest'], function($routes)
		{
			$routes->get('/user-login', '\AuthpageViewCont\UserAuth::login',['as' => 'user.login.view']);
			$routes->get('/user-register', '\AuthpageViewCont\UserAuth::register',['as' => 'user.register.view']);
			$routes->get('/user-register-success', '\AuthpageViewCont\UserAuth::user_register_success',['as' => 'user.register.success']);
			$routes->get('/user-forgot-password', '\AuthpageViewCont\UserAuth::user_forgot_password',['as' => 'user.forgot.password']);
			$routes->get('/user-reset-password-success', '\AuthpageViewCont\UserAuth::user_reset_password_success',['as' => 'user.reset.password.success']);
			$routes->get('/user-reset-password', '\AuthpageViewCont\UserAuth::user_reset_password',['as' => 'user.reset.password']);
			$routes->get('/user-reset-password-final-success', '\AuthpageViewCont\UserAuth::user_reset_password_final_success',['as' => 'user.reset.password.final.success']);
			$routes->get('/user-login-via-email', '\AuthpageViewCont\UserAuth::user_login_via_email',['as' => 'user.login.via.email']);

			$routes->post('/user-login', '\AuthpageFuncCont\HTTP\FUserAuth::login');
			$routes->post('/user-register', '\AuthpageFuncCont\HTTP\FUserAuth::register');
			$routes->post('/user-forgot-password', '\AuthpageFuncCont\HTTP\FUserAuth::user_forgot_password');
			$routes->post('/user-reset-password', '\AuthpageFuncCont\HTTP\FUserAuth::user_reset_password');
			$routes->post('/json-user-check-login-attempt', '\AuthpageFuncCont\JSON\FUserAuthJSON::json_user_check_login_attempt');
		});

	//for panel{
		$routes->group('panel',['filter' => 'authfilter:user'],function($routes)
		{
		    $routes->get('/', '\AdminpageViewCont\Dashboard::landing_page',['as'=>'user.panel.dashboard']);
		    $routes->get('search-kk', '\AdminpageViewCont\Dashboard::cari_kk',['as'=>'user.panel.cari_kk']);
		    $routes->get('insert-data', '\AdminpageViewCont\Dashboard::insert_data',['as'=>'user.panel.insert-data']);
		    $routes->get('kobo-collect', '\AdminpageViewCont\Dashboard::kobo_collect',['as'=>'user.panel.kobo-collect']);
		    $routes->get('success-resend-email', '\AdminpageViewCont\Dashboard::success_resend_email',['as'=>'user.panel.notif.success_resend_email']);
		    $routes->get('error-validate-error', '\AdminpageViewCont\Dashboard::error_validate_error',['as'=>'user.panel.notif.error_validate_error']);

		    $routes->post('insert-data', '\AdminpageFuncCont\HTTP\Dashboard::insert_data',['as'=>'user.panel.post.insert-data']);

			$routes->group('general',function($routes)
			{
				$routes->group('json',function($routes)
				{
				    $routes->post('get-main-kk', '\AdminpageFuncCont\JSON\GeneralJSON::json_get_main_kk/$1',['as'=>'user.panel.alamat.get-main-kk']);
				    $routes->post('get-main-kk-kecamatan', '\AdminpageFuncCont\JSON\GeneralJSON::json_get_main_kk_kecamatan/$1',['as'=>'user.panel.alamat.get-main-kk-kecamatan']);
				    $routes->post('get-main-kk-kelurahan', '\AdminpageFuncCont\JSON\GeneralJSON::json_get_main_kk_kelurahan/$1',['as'=>'user.panel.alamat.get-main-kk-kelurahan']);
				});
			});

			$routes->group('health',function($routes)
			{
			    $routes->get('disease', '\AdminpageViewCont\Health::disease',['as'=>'user.panel.dashboard.health']);
			    $routes->get('disease-example', '\AdminpageViewCont\Health::disease_example',['as'=>'user.panel.dashboard.disease_example']);
				$routes->group('json',function($routes)
				{
				    $routes->post('get-penyakit', '\AdminpageFuncCont\JSON\KesehatanJSON::json_get_kesehatan',['as'=>'user.panel.health.get_kesehatan']);
				});
			});

			$routes->group('pekerjaan',function($routes)
			{
			    $routes->get('pekerjaan', '\AdminpageViewCont\pekerjaan::pekerjaan',['as'=>'user.panel.pekerjaan.pekerjaan']);
			    $routes->get('pekerjaan-example', '\AdminpageViewCont\pekerjaan::pekerjaan_example',['as'=>'user.panel.dashboard.pekerjaan_example']);
				$routes->group('json',function($routes)
				{
				    $routes->post('get-pekerjaan', '\AdminpageFuncCont\JSON\PekerjaanJSON::json_get_pekerjaan',['as'=>'user.panel.pekerjaan.get_ekonomi']);
				});
			});

			$routes->group('ekonomi',function($routes)
			{
			    $routes->get('ekonomi', '\AdminpageViewCont\ekonomi::ekonomi',['as'=>'user.panel.ekonomi.ekonomi']);
			    $routes->get('ekonomi-example', '\AdminpageViewCont\ekonomi::ekonomi_example',['as'=>'user.panel.dashboard.ekonomi_example']);
				$routes->group('json',function($routes)
				{
				    $routes->post('get-ekonomi', '\AdminpageFuncCont\JSON\EkonomiJSON::json_get_ekonomi',['as'=>'user.panel.ekonomi.get_ekonomi']);
				});
			});

			$routes->group('tani',function($routes)
			{
			    $routes->get('tani', '\AdminpageViewCont\tani::tani',['as'=>'user.panel.tani.tani']);
			    $routes->get('tani-example', '\AdminpageViewCont\tani::tani_example',['as'=>'user.panel.dashboard.tani_example']);
				$routes->group('json',function($routes)
				{
				    $routes->post('get-tani', '\AdminpageFuncCont\JSON\TaniJSON::json_get_tani',['as'=>'user.panel.tani.get_tani']);
				});
			});


			$routes->group('panganobat',function($routes)
			{
			    $routes->get('panganobat', '\AdminpageViewCont\panganobat::panganobat',['as'=>'user.panel.panganobat.panganobat']);
			    $routes->get('panganobat-example', '\AdminpageViewCont\panganobat::panganobat_example',['as'=>'user.panel.dashboard.panganobat_example']);
				$routes->group('json',function($routes)
				{
				    $routes->post('get-panganobat', '\AdminpageFuncCont\JSON\PanganobatJSON::json_get_panganobat',['as'=>'user.panel.panganobat.get_panganobat']);
				});
			});

			$routes->group('hutan',function($routes)
			{
			    $routes->get('hutan', '\AdminpageViewCont\hutan::hutan',['as'=>'user.panel.hutan.hutan']);
			    $routes->get('hutan-example', '\AdminpageViewCont\hutan::hutan_example',['as'=>'user.panel.dashboard.hutan_example']);
				$routes->group('json',function($routes)
				{
				    $routes->post('get-hutan', '\AdminpageFuncCont\JSON\HutanJSON::json_get_hutan',['as'=>'user.panel.hutan.get_hutan']);
				});
			});


			$routes->group('rumah',function($routes)
			{
			    $routes->get('rumah', '\AdminpageViewCont\rumah::rumah',['as'=>'user.panel.rumah.rumah']);
			    $routes->get('rumah-example', '\AdminpageViewCont\rumah::rumah_example',['as'=>'user.panel.dashboard.rumah_example']);
				$routes->group('json',function($routes)
				{
				    $routes->post('get-rumah', '\AdminpageFuncCont\JSON\RumahJSON::json_get_rumah',['as'=>'user.panel.rumah.get_rumah']);
				});
			});
			
			$routes->group('kebun',function($routes)
			{
			    $routes->get('kebun', '\AdminpageViewCont\kebun::kebun',['as'=>'user.panel.kebun.kebun']);
			    $routes->get('kebun-example', '\AdminpageViewCont\kebun::kebun_example',['as'=>'user.panel.dashboard.kebun_example']);
				$routes->group('json',function($routes)
				{
				    $routes->post('get-kebun', '\AdminpageFuncCont\JSON\KebunJSON::json_get_kebun',['as'=>'user.panel.kebun.get_kebun']);
				});
			});
			



			$routes->group('address',function($routes)
			{
				$routes->group('json',function($routes)
				{
				    $routes->post('get-subdistrict/(:num)', '\AdminpageFuncCont\JSON\AlamatJSON::json_get_kelurahan/$1',['as'=>'user.panel.alamata.get-kelurahan']);
				});
			});


			
			$routes->group('plant',function($routes)
			{
				$routes->group('json',function($routes)
				{
				    $routes->post('get-forestry', '\AdminpageFuncCont\JSON\TanamanJSON::json_get_kehutanan',['as'=>'user.panel.tanaman.get-kehutanan']);
				    $routes->post('get-farm', '\AdminpageFuncCont\JSON\TanamanJSON::json_get_perkebunan',['as'=>'user.panel.tanaman.get-perkebunan']);
				    $routes->post('get-agriculture', '\AdminpageFuncCont\JSON\TanamanJSON::json_get_pertanian',['as'=>'user.panel.tanaman.get-pertanian']);
				    $routes->post('get-food', '\AdminpageFuncCont\JSON\TanamanJSON::json_get_tanaman_pangan',['as'=>'user.panel.tanaman.get-tanaman-pangan']);
				    $routes->post('get-medicine', '\AdminpageFuncCont\JSON\TanamanJSON::json_get_tanaman_obat',['as'=>'user.panel.tanaman.get-tanaman-obat']);
				});
			});
			$routes->group('animal',function($routes)
			{
				$routes->group('json',function($routes)
				{
				    $routes->post('get-livestock', '\AdminpageFuncCont\JSON\BinatangJSON::json_get_ternak',['as'=>'user.panel.animal.get-ternak']);
				    $routes->post('get-fishery', '\AdminpageFuncCont\JSON\BinatangJSON::json_get_perikanan',['as'=>'user.panel.animal.get-ikan']);
				    $routes->post('get-fishery-catch', '\AdminpageFuncCont\JSON\BinatangJSON::json_get_perikanan_tangkap',['as'=>'user.panel.animal.get-ikan-tangkap']);
				});
			});
		});
	//}
//}

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
