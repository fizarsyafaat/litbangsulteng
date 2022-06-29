<?php

//modules\Home\Homepage\Controllers\ViewCont;

namespace AdminpageViewCont;

use AdminTemplateViewCont\DefaultAdminViewController;
use BusinessProcessRoot\Models\User as UserModel;

class Health extends DefaultAdminViewController{
	
	public function __construct(){
		parent::__construct();

		$this->set_data_view("menu","health");
	}

	public function disease(){
		$this->set_data_view("submenu","disease");
		$data_pl_top = array(
			'flot/jquery.flot.js','flot/plugins/jquery.flot.resize.js',
			'flot/plugins/jquery.flot.pie.js'
		);

		$this->set_js_data($data_pl_top,"bottom","last","assets/admin/plugins/");

		return $this->tc_view("AdminpageView\main\health\disease");
	}
}
