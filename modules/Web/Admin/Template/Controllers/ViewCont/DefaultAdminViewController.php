<?php

//modules\Home\Homepage\Controllers\ViewCont;

namespace AdminTemplateViewCont;

use Master\Controllers\ViewCont\ViewController;
use Master\Traits\SessionRole;
use WebRoot\Master\Filters\Auth\AuthFilter;
use Config\Services as SVC;
//contains all assets

class DefaultAdminViewController extends ViewController{
	use SessionRole;

	public $security;
	public $session;
	public $session_handling;
	public $error;
	public $INDEX;

	public function __construct(){
		parent::__construct();
		//My Own CSS

		$this->session_handling = SVC::session();
		$this->security = SVC::security();
		$this->INDEX = 1;

		$this->set_data_view("INDEX",$this->INDEX);

		helper("form_handling");
		$this->set_style();
		$this->set_script();
		$this->set_session();

		$this->set_data_view("menu_clicked",array(0));
		$this->set_data_view("menu","none");
	}

	public function set_session(){
		$session_ent = SVC::session();
		if($session_ent->image = "none"){
			$session_ent->image = "user-profile.png";
		}
		$this->session = $session_ent->get('data');
		$this->set_data_view("session",$this->session);
	}

	public function set_style(){
		$data_css_st = array(
			"custom/panel/master.css"
		);

		$this->set_css_data($data_css_st,"top","last","assets/css/");

		$data_css_rd = array(
			'fontawesome-free/css/all.min.css','tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
			'icheck-bootstrap/icheck-bootstrap.min.css','jqvmap/jqvmap.min.css','overlayScrollbars/css/OverlayScrollbars.min.css',
			'daterangepicker/daterangepicker.css','summernote/summernote-bs4.min.css'
		);

		$this->set_css_data($data_css_rd,"top","last","assets/admin/plugins/");

		$data_css_dist = array(
			'css/adminlte.min.css'
		);

		$this->set_css_data($data_css_dist,"top","last","assets/admin/dist/");
	}

	public function set_script(){

		$data_js_top = array(
			"config.js"
		);

		$this->set_js_data($data_js_top,"top","first","assets/general/");

		$data_pl_top = array(
			'jquery/jquery.min.js','jquery-ui/jquery-ui.min.js',
			'bootstrap/js/bootstrap.bundle.min.js','chart.js/Chart.min.js',
			'jqvmap/jquery.vmap.min.js','jqvmap/maps/jquery.vmap.usa.js','jquery-knob/jquery.knob.min.js','moment/moment.min.js',
			'daterangepicker/daterangepicker.js','tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
			'summernote/summernote-bs4.min.js','overlayScrollbars/js/jquery.overlayScrollbars.min.js'
		);

		$this->set_js_data($data_pl_top,"bottom","first","assets/admin/plugins/");

		$data_dist_top = array(
			'js/adminlte.js','js/pages/dashboard.js'
		);

		$this->set_js_data($data_dist_top,"bottom","last","assets/admin/dist/");
	}

}
