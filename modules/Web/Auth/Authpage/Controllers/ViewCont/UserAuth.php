<?php

//modules\Home\Homepage\Controllers\ViewCont;

namespace AuthpageViewCont;

use BusinessProcessRoot\Models\UserResetPassword as UserResetPasswordModel;
use BusinessProcessRoot\Models\SuspendedAccountUser as SuspendedAccountUserModel;
use BusinessProcessRoot\Models\User as UserModel;

use BusinessProcessRoot\Entities\User as UserEntities;

use BusinessProcessRoot\Entities\SessionCookies\UserSession;

use AuthTemplateViewCont\DefaultAuthViewController;
use Config\Services as SVC;

class UserAuth extends DefaultAuthViewController{

	public function __construct(){
		parent::__construct();


		$data_js_rd = array(
			"custom/auth/auth.js"
		);

		$this->set_js_data($data_js_rd,"bottom","last","assets/js/");
	}

	public function login(){
		$error = $this->session_handling->getFlashdata('error');

		if(!empty($error)){
			if(isset($error->error_message)){
				$this->set_data_view("error",$error->error_message);
			}else{
				$this->set_data_view("error",array($error));
			}
		}else{
			$this->set_data_view("error",null);
		}

		return $this->tc_view("AuthpageView\login");
	}

	public function register(){
		$error = $this->session_handling->getFlashdata('error');

		if(!empty($error)){
			$this->set_data_view("error",$error->error_message);
		}else{
			$this->set_data_view("error",null);
		}

		return $this->tc_view("AuthpageView\\teacher\\register");	
	}

	public function teacher_forgot_password(){
		$error = $this->session_handling->getFlashdata('error');

		if(!empty($error)){
			$this->set_data_view("error",$error->error_message);
		}else{
			$this->set_data_view("error",null);
		}

		return $this->tc_view("AuthpageView\\teacher\\forgot_password");		
	}

	public function teacher_reset_password_success(){
		$session = SVC::session();

		$l = $session->getFlashdata('set-forgot-password');

		if($l != null){
			$this->set_data_view("message_title","Email Sent Successfully");
			$this->set_data_view("message_content","Please check your email for further information");

			return $this->tc_view("HomepageView\content\generalnotif\\success");
		}else{
			return redirect()->route('home');
		}
	}

	public function teacher_reset_password_final_success(){
		$session = SVC::session();

		$l = $session->getFlashdata('set-success-reset-password');

		if($l != null){
			$this->set_data_view("message_title","Password reset Successfully");
			$this->set_data_view("message_content","You can now login with your new password");

			return $this->tc_view("HomepageView\content\generalnotif\\success");
		}else{
			return redirect()->route('home');
		}	
	}

	public function teacher_reset_password(){
		$error = $this->session_handling->getFlashdata('error');
		$token = $this->request->getGet("token");
		$user_id = $this->request->getGet("user-id");

		$trp_model = new TeacherResetPasswordModel();

		$trp_detail = $trp_model->where("teacher_id",$user_id)->orderBy("date_requested","DESC")->first();

		if(empty($trp_detail)){
			$this->set_data_view("message_title","Link Can Not Be Processed");
			$this->set_data_view("message_content","Either your link has expired or the url link is not complete");

			return $this->tc_view("HomepageView\content\generalnotif\\error");
		}else{
			if($trp_detail->token != $token){
				$this->set_data_view("message_title","Link Can Not Be Processed");
				$this->set_data_view("message_content","You have requested resetting password more than 1 time. Please click the link in the lastest email");

				return $this->tc_view("HomepageView\content\generalnotif\\error");
			}else{
				$date_now = new \DateTime();
				$date_link = new \DateTime($trp_detail->date_requested);

				$diff = $date_now->diff($date_link);

				$hours = $diff->h;
				$hours = $hours + ($diff->days*24);
				$minutes = $diff->m;
				$minutes = $minutes + ($hours * 60);

				if($minutes >= 60){
					$this->set_data_view("message_title","Link Has Expired");
					$this->set_data_view("message_content","Your link has expired. The URL only valid for 1 hour after requesting password");

					return $this->tc_view("HomepageView\content\generalnotif\\error");
				}else{
					if(!empty($error)){
						$this->set_data_view("error",$error->error_message);
					}else{
						$this->set_data_view("error",null);
					}

					$this->set_data_view("token",$token);
					$this->set_data_view("user_id",$user_id);

					return $this->tc_view("AuthpageView\\teacher\\reset_password");
				}
			}
		}
	}

	public function teacher_register_success(){
		$session = SVC::session();

		$l = $session->getFlashdata('set-registration-teacher');

		if($l != null){
			$this->set_data_view("message_title","Registration Success");
			$this->set_data_view("message_content","Please check your email to verify your email");

			return $this->tc_view("HomepageView\content\generalnotif\\success");
		}else{
			return redirect()->route('home');
		}
	}

	//login via email
	public function teacher_login_via_email(){
		$error = $this->session_handling->getFlashdata('error');
		$token_1 = $this->request->getGet("KmAlHE3caw");
		$token_2 = $this->request->getGet("mJW2mapL");
		$token_3 = $this->request->getGet("nJSmeaOIE");
		$user_id = $this->request->getGet("user-id");

		$sat_model = new SuspendedAccountTeacherModel();
		$u_model = new UserModel();

		$u_detail = $u_model->find($user_id);

		$sat_detail = $sat_model->where("username",$u_detail->username)->first();

		if(empty($sat_detail)){
			$this->set_data_view("message_title","Link Can Not Be Processed");
			$this->set_data_view("message_content","Either your link has expired or the url link is not complete");

			return $this->tc_view("HomepageView\content\generalnotif\\error");
		}else{
			if($sat_detail->token_1 == $token_1 && $sat_detail->token_2 == $token_2 && $sat_detail->token_3 == $token_3){
				$date_now = new \DateTime();
				$date_link = new \DateTime($sat_detail->date_suspended);

				$diff = $date_now->diff($date_link);

				$hours = $diff->h;
				$hours = $hours + ($diff->days*24);
				$minutes = $diff->m;
				$minutes = $minutes + ($hours * 60);

				if($minutes >= 60){
					$this->set_data_view("message_title","Link Has Expired");
					$this->set_data_view("message_content","Your link has expired. The URL only valid for 1 hour after requesting password");

					return $this->tc_view("HomepageView\content\generalnotif\\error");
				}else{
					$session = SVC::session();

					$us = new UserSession();

					$us->user_id = $u_detail->user_id;
					$us->username = $u_detail->username;
					$us->name = $u_detail->name;
					$us->address = $u_detail->address;
					$us->email = $u_detail->email;
					$us->role = $u_detail->role;
					$us->status = $u_detail->status;
					$us->public_key = $u_detail->public_key;

					$data_session = array(
						'data' =>$us
					);

		            $session->set($data_session);
		            $sat_model->delete($sat_detail->suspended_account_id);

		            $user_updated = new UserEntities();
		            $user_updated->user_id = $u_detail->user_id;
		            $user_updated->status = 1;

		            $u_model->update($user_updated->user_id,$user_updated);

					return redirect()->route('user.panel.dashboard');
				}
			}else{
				$this->set_data_view("message_title","Link Can Not Be Processed");
				$this->set_data_view("message_content","The link is broken");

				return $this->tc_view("HomepageView\content\generalnotif\\error");
			}
		}
	}

	public function account_verification(){
		$public_key = $this->request->getGet("verification-key");
		$user_id = $this->request->getGet("user-id");

		$u_model = new UserModel();

		$u_detail = $u_model->where("user_id",$user_id)->where("public_key",$public_key)->first();

		if(empty($u_detail)){
			$this->set_data_view("message_title","Link Can Not Be Processed");
			$this->set_data_view("message_content","Either your link has expired or the url link is not complete");

			return $this->tc_view("HomepageView\content\generalnotif\\error");
		}else{
			$u_detail->status = 1;
			$u_model->update($u_detail->user_id,$u_detail);
			$this->set_data_view("message_title","Your email has been verified");
			$this->set_data_view("message_content","You can now use some features in teacher panel");

			return $this->tc_view("HomepageView\content\generalnotif\\success");
		}
	}
}
