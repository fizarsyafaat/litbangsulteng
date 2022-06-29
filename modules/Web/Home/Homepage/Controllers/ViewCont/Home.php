<?php

namespace HomepageViewCont;

use HomeTemplateViewCont\DefaultHomeViewController;
use Config\Services as SVC;
use \Firebase\JWT\JWT;

use BusinessProcessRoot\Models\User as UserModel;

class Home extends DefaultHomeViewController{
	protected $systemMenu;

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$user = new UserModel();
		$user_list = $user->findAll();
		return $this->tc_view("HomepageView\content\home");	
	}
}
