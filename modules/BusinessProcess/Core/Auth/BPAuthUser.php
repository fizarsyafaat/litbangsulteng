<?php

namespace BusinessProcessRoot\Core\Auth;

use \Config\Services as SVC;
use BusinessProcessRoot\Entities\Request\UserLoginRequest as ULREntity;
use BusinessProcessRoot\Helper\Validation\ValidationMaster;
use BusinessProcessRoot\Entities\User as UserEntities;
// use BusinessProcessRoot\Entities\TeacherResetPassword as TeacherResetPasswordEntities;
// use BusinessProcessRoot\Entities\LoginFailedUser as LoginFailedUserEntities;
// use BusinessProcessRoot\Entities\SuspendedAccountTeacher as SuspendedAccountTeacherEntities;

// use BusinessProcessRoot\Models\TeacherResetPassword as TeacherResetPasswordModel;
// use BusinessProcessRoot\Models\LoginFailedUser as LoginFailedUserModel;
// use BusinessProcessRoot\Models\SuspendedAccountTeacher as SuspendedAccountTeacherModel;
use BusinessProcessRoot\Models\User as UserModel;

use BusinessProcessRoot\Entities\SessionCookies\UserSession;
use BusinessProcessRoot\Traits\ValidateEntity\User as UserVE;

trait BPAuthUser{
	use ValidationMaster;
	// use RandomGenerator;
	use UserVE;

	public function BP_login(ULREntity $tl){
		// $sat_m = new SuspendedAccountTeacherModel();

		$rules = array(
			'user_email' => array(
				'required|valid_email',
				"User Email",
				'user_email'
			),
			'user_password' => array(
				'required',
				'User Password',
				'user_password'
			)
		);

		$result = $this->validateRule($rules,$tl);
		if($this->validateError($result)){
			return $result;
		}else{
			$data = $result->result;
			$user = new UserModel();
			$userdata = $user->where('user_email',$data->user_email)->first();
			if(!empty($userdata)){
	            $pass = $userdata->user_password;

	            if(password_verify($data->user_password, $pass)){
					$us = new UserSession();

					$us->user_id = $userdata->user_id;
					$us->user_name = $userdata->user_name;
					$us->user_email = $userdata->user_email;
					$us->user_role = $userdata->user_role;
					$us->user_status = $userdata->user_status;
	            	$result->result = $us;

	            	return $result;
	            }else{
	            	$result = $this->addValidateError($result, array("user_password","Password is incorrect"));
	            	return $result;
	            }

			}else{
            	$result = $this->addValidateError($result, array("user_password","Password is incorrect"));
				return $result;
			}
		}
	}


	public function BP_register(UserEntities $tr){
		$rules = array(
			'user_name' => array(
				'required|max_length:80|omit_script|encode_html',
				"Name",
				'name'
			),
			'user_email' => array(
				'required|valid_email',
				"Email",
				'email'
			),
			'user_password' => array(
				'required|min_length:8',
				'Password',
				'password'
			)
		);

		$result = $this->validateRule($rules,$tr);

		if($this->validateError($result)){
			return $result;
		}else{
			$user = new UserEntities();
			$received = $result->result;

			$user->user_name = $received->user_name;
			$user->user_email = $received->user_email;
			$user->user_password = $received->user_password;
			$user->user_role = 1;
			$user->user_status = 1;
			$user_model = new UserModel();

			$user_model->insert($user);

			$user->user_id = $user_model->getInsertId();

			$result->result = $user;

			return $result;
		}
	}

/*
	public function BP_teacher_forgot_password($request=null,$additional_param=array()){
		$u_model = new UserModel();
		$trp_model = new TeacherResetPasswordModel();
		$trp_ent = new TeacherResetPasswordEntities();

		$p = $this->filterValidateRequestParam($request,$additional_param);
		$req = $p['all_param'];

		$additional_param = $p['additional_param'];
		$optional_info = $p['optional_info'];
		$resultVE = $this->validateInputUserVE($req,$optional_info);

		if($this->validateError($resultVE)){
			return $resultVE;
		}else{
			if(isset($additional_param)){
				foreach($additional_param as $ap => $ap_v){
					$resultVE->result->$ap = $ap_v;
				}
			}

			$u_detail = $u_model->where("email",$resultVE->result->email)->findAll();

			if(sizeof($u_detail) == 1){
				$trp_ent->teacher_id = $u_detail[0]->user_id;
				$trp_ent->date_requested = date("Y-m-d H:i:s");
				$trp_ent->token = $this->generate_alphabet(140);

				$trp_model->insert($trp_ent);

				$email = SVC::email();

				$email->setFrom(NO_REPLY_EMAIL, 'Agurooz');
				$email->setTo($u_detail[0]->email);

				$email->setSubject('Reset Password Agurooz');

				$data = array(
					'name' => $u_detail[0]->name,
					'url' => base_url() . "/" . route_to('teacher.reset.password'),
					'token' => $trp_ent->token,
					'user_id' => $u_detail[0]->user_id
				);

				$email->setMessage(view("App\Views\\email\\teacher_reset_password",$data));

				$email->send();
			}

			return $resultVE;
		}
	}

	public function BP_teacher_reset_password($request=null,$additional_param=array()){
		$u_model = new UserModel();
		$trp_model = new TeacherResetPasswordModel();
		$sat_model = new SuspendedAccountTeacherModel();
		$lfu_model = new LoginFailedUserModel();

		$trp_ent = new TeacherResetPasswordEntities();

		$p = $this->filterValidateRequestParam($request,$additional_param);
		$req = $p['all_param'];

		$additional_param = $p['additional_param'];
		$optional_info = $p['optional_info'];
		$resultVE = $this->validateInputUserChangePasswordVE($req,$optional_info);

		if($this->validateError($resultVE)){
			return $resultVE;
		}else{
			if(isset($additional_param)){
				foreach($additional_param as $ap => $ap_v){
					$resultVE->result->$ap = $ap_v;
				}
			}

			$trp_detail = $trp_model->where("teacher_id",$resultVE->result->user_id)->where("token",$resultVE->result->token)
			->orderBy("date_requested","DESC")->first();

			if(!empty($trp_detail)){
				$date_now = new \DateTime();
				$date_link = new \DateTime($trp_detail->date_requested);

				$diff = $date_now->diff($date_link);

				$hours = $diff->h;
				$hours = $hours + ($diff->days*24);
				$minutes = $diff->i;
				$minutes = $minutes + ($hours * 60);

				if($minutes >= 60){
		            $resultVE = $this->addValidateError($resultVE, array("general","Invalid Token"));
				}else{
					$u_ent = new UserEntities();
					$u_ent->user_id = $trp_detail->teacher_id;
					$u_ent->password = $resultVE->result->new_password;
					$u_ent->status = 1;

					$u_detail = $u_model->find($trp_detail->teacher_id);

					$u_model->update($u_ent->user_id,$u_ent);
					$trp_model->where("teacher_id",$u_ent->user_id)->delete();
					$sat_model->where("username",$u_detail->username)->delete();
					$lfu_model->where("username",$u_detail->username)->delete();
				}

			}else{
	            $resultVE = $this->addValidateError($resultVE, array("general","Invalid Token"));
			}

			return $resultVE;
		}
	}

	public function BP_check_teacher_login_attempt($request=null,$additional_param=array()){
		$u_model = new UserModel();
		$lfu_model = new LoginFailedUserModel();

		$p = $this->filterValidateRequestParam($request,$additional_param);
		$req = $p['all_param'];

		$additional_param = $p['additional_param'];
		$optional_info = $p['optional_info'];
		$resultVE = $this->validateInputUserVE($req,$optional_info);

		if($this->validateError($resultVE)){
			return $resultVE;
		}else{
			if(isset($additional_param)){
				foreach($additional_param as $ap => $ap_v){
					$resultVE->result->$ap = $ap_v;
				}
			}

			$lfu_detail = $lfu_model->where("username",$resultVE->result->username)->findAll();

			$resultVE->result->total_attempt = sizeof($lfu_detail);

			return $resultVE;
		}
	}
*/
}