<?php

//modules\Home\Homepage\Controllers\ViewCont;

namespace AuthpageFuncCont\HTTP;

use AuthTemplateFuncCont\DefaultAuthFuncCont as DefaultAuthFuncController;
// use BusinessProcessRoot\Master\Entities\Request\Auth\TeacherRegisterRequest as TRREntity;
use BusinessProcessRoot\Entities\Request\UserLoginRequest as ULREntity;
use BusinessProcessRoot\Entities\User as UserEntities;

use CodeIgniter\HTTP\RequestInterface;
use Config\Services as SVC;
use BusinessProcessRoot\Core\Auth\BPAuthUser;
use BusinessProcessRoot\Helper\Validation\ValidationMaster;

class FUserAuth extends DefaultAuthFuncController{
	public $request;
	use BPAuthUser;

	public function __construct(){
		parent::__construct();
		 $this->request = SVC::request();
	}

	public function login(){
		$user = new ULREntity();

		$user->user_password = $this->request->getPost("user-password");
		$user->user_email = $this->request->getPost("user-email");

		$result = $this->BP_login($user);

		if($this->validateError($result)){
			return redirect()->route('user.login.view')->with('error',$result);
		}else{
			$session = SVC::session();

			$data_session = array(
				'data' =>$result->result
			);

            $session->set($data_session);

			return redirect()->route('user.panel.dashboard');
		}
	}

	public function logout(){
		$session = SVC::session();
		$session->destroy();
		return redirect()->route('home');
	}

/*
	public function register(){

		$user = new UserEntities();

		$user->user_name = "Jafar Sadik";
		$user->user_email = "jafartadulako@gmail.com";
		$user->user_password = "pemkotpalu123";

		$result = $this->BP_register($user);

		if($this->validateError($result)){
			return redirect()->route('teacher.register.view')->with('error',$result);
		}else{		
			return redirect()->route('teacher.register.success');
		}
	}


	//reset password
	public function teacher_forgot_password(){
		$session = SVC::session();

		$request = $this->request;

		$accepted_param = array(
			'email',
		);

		$additional_param = array(
			'ACCEPTED_PARAM' => $accepted_param,
			'REQUEST_TYPE' => 'post'
		);

		$result = $this->BP_teacher_forgot_password($request,$additional_param);
		$session->setFlashdata('set-forgot-password', 1);
		return redirect()->route('teacher.reset.password.success');
	}

	//verification email

	//reset password
	public function teacher_reset_password(){
		$session = SVC::session();

		$request = $this->request;

		$accepted_param = array(
			'confirm-new-password',
			'new-password',
			'token',
			'user-id'
		);

		$additional_param = array(
			'ACCEPTED_PARAM' => $accepted_param,
			'REQUEST_TYPE' => 'post'
		);

		$result = $this->BP_teacher_reset_password($request,$additional_param);

		if($this->validateError($result)){
			return redirect()->back()->with('error',$result);
		}else{
			$session->setFlashdata('set-success-reset-password', 1);
			return redirect()->route('teacher.reset.password.final.success');
		}
	}

	*/
}
