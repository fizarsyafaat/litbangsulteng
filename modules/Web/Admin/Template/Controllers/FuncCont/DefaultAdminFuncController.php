<?php

//modules\Home\Homepage\Controllers\ViewCont;

namespace AdminTemplateFuncCont;
use Master\Controllers\FuncCont\FuncController;
use Config\Services as SVC;

class DefaultAdminFuncController extends FuncController{
	public $session;


	public function __construct(){
		parent::__construct();
	}
}
