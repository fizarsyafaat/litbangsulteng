<?php

//modules\Home\Homepage\Controllers\ViewCont;

namespace AuthTemplateViewCont;
use Master\Controllers\ViewCont\ViewController;
use Master\Models\SystemMenu;
use Master\Models\SystemMenuInRole;
use Master\Entities\Menu;
use Master\Traits\SessionRole;
use Master\Helper\FormHandling;
use Config\Services as SVC;
//contains all assets

class DefaultAuthViewController extends ViewController{
	use SessionRole;
	public $security;

	public $session_handling;

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
		$data_css_rd = array(
			'css/custom/master.css','css/theme/home/style.css'
		);

		$this->set_css_data($data_css_rd,"top","last","assets/");
	}

	public function set_script(){
		$data_js_nd = array(
			'custom/master.js'
		);

		$this->set_js_data($data_js_nd,"bottom","last","assets/js/");
	}
}
