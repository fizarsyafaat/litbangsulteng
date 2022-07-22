<?php

//modules\Home\Homepage\Controllers\ViewCont;

namespace AdminpageViewCont;

use AdminTemplateViewCont\DefaultAdminViewController;
use BusinessProcessRoot\Models\User as UserModel;

class Rumah extends DefaultAdminViewController{
	
	public function __construct(){
		parent::__construct();
		$data_pl_top = array(
			'flot/jquery.flot.js','flot/plugins/jquery.flot.resize.js',
			'flot/plugins/jquery.flot.pie.js'
		);

		$this->set_js_data($data_pl_top,"bottom","last","assets/admin/plugins/");

		$this->set_data_view("menu","pekerjaan");
	}

	public function rumah_example(){
		$this->set_data_view("submenu","rumah");
		return $this->tc_view("AdminpageView\main\pekerjaan\grafikrumah");
	}

	public function rumah(){
		$data_js_rd = array(
			'rumah.js'
		);

		$this->set_js_data($data_js_rd,"bottom","last","assets/admin/custom/js/");


		$this->set_data_view("submenu","rumah");
		return $this->tc_view("AdminpageView\main\pekerjaan\grafikrumah");
	}


}
