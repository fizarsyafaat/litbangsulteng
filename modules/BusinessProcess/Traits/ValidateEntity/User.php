<?php

namespace BusinessProcessRoot\Traits\ValidateEntity;
use BusinessProcessRoot\Entities\User as UserEntities;
use BusinessProcessRoot\Helper\Validation\ValidationMaster;
use \Config\Services as SVC;

trait User{
	use ValidationMaster;

	public function validateInputUserVE($request=array(),$opt_info=array()){
		$a_entities = new UserEntities();

		if(isset($opt_info['MANDATORY_VALIDATION'])){
			foreach($opt_info['MANDATORY_VALIDATION'] as $omv){
				if(isset($request[$omv])){

				}else{
					$request[$omv] = "";
				}
			}
		}

		$rules = array();
		if(!empty($request)){
			foreach($request as $m => $v){
				switch($m){
					case 'user-email':
						if(isset($opt_info['ADDITIONAL_VALIDATION']['user-email'])){
							$string_p = implode("|", $opt_info['ADDITIONAL_VALIDATION']['user-email']);
							$string_p .= "|";
						}else{
							$string_p = "";
						}

						$ar = array(
							$string_p . 'valid_email',
							"User email",
							'user_email'
						);

						$a_entities->user_email = $v;

						$rules['user_email'] = $ar;
					break;

					case 'user-name':
						if(isset($opt_info['ADDITIONAL_VALIDATION']['user-name'])){
							$string_p = implode("|", $opt_info['ADDITIONAL_VALIDATION']['user-name']);
							$string_p .= "|";
						}else{
							$string_p = "";
						}

						$ar = array(
							$string_p . 'omit_script|encode_html',
							"User Name",
							'User Name'
						);

						$a_entities->user_name = $v;

						$rules['user_name'] = $ar;
					break;

					// case 'new-email':
					// 	if(isset($opt_info['ADDITIONAL_VALIDATION']['new_email'])){
					// 		$string_p = implode("|", $opt_info['ADDITIONAL_VALIDATION']['new_email']);
					// 		$string_p .= "|";
					// 	}else{
					// 		$string_p = "";
					// 	}

					// 	$ar = array(
					// 		$string_p . 'valid_email|unique:user.email|unique:student.student_email',
					// 		"New Email",
					// 		'new_email'
					// 	);

					// 	$a_entities->new_email = $v;

					// 	$rules['new_email'] = $ar;
					// break;

					case 'password':
						if(isset($opt_info['ADDITIONAL_VALIDATION']['password'])){
							$string_p = implode("|", $opt_info['ADDITIONAL_VALIDATION']['password']);
							$string_p .= "|";
						}else{
							$string_p = "";
						}

						$ar = array(
							$string_p . '',
							"Password",
							'password'
						);

						$a_entities->password = $v;

						$rules['password'] = $ar;
					break;
				}
			}
		}

		$result = $this->validateRule($rules,$a_entities);

		return $result;
	}
}