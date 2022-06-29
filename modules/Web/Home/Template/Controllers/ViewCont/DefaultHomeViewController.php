<?php

//modules\Home\Homepage\Controllers\ViewCont;

namespace HomeTemplateViewCont;
use Master\Controllers\ViewCont\ViewController;
//contains all assets

class DefaultHomeViewController extends ViewController{

	public function __construct(){
		parent::__construct();
		//My Own CSS
		helper("form_handling");
		$this->set_style();
		$this->set_script();
		$this->set_language();
		$this->set_title();
	}

	public function set_locale(){

	}

	public function set_title(){
		$this->set_data_view("title","MyWebsite.com | Website Tagline");
	}

	public function set_style(){

		// $data_css_st = array(
		// 	'bootstrap/css/bootstrap.min.css'
		// );

		// $this->set_css_data($data_css_rd,"top","last","assets/");
	}

	public function set_script(){
		// $data_js_st = array(
		// 	"plugins/sweetalert2/sweetalert2.min.js"
		// );

		// $this->set_js_data($data_js_st,"bottom","last","assets/vendor/");
	}

	public function set_language(){
		$this->set_data_view('language',"english");
	}
}
