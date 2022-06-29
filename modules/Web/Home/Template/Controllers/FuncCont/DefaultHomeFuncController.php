<?php

//modules\Home\Homepage\Controllers\ViewCont;

namespace HomeTemplateFuncCont;
use Master\Controllers\FuncCont\FuncController;
use BusinessProcessRoot\Master\Traits\RandomGenerator;
use Config\Services as SVC;

class DefaultHomeFuncController extends FuncController{
	use RandomGenerator;

	public $session;


	public function __construct(){
		parent::__construct();
	}
}
