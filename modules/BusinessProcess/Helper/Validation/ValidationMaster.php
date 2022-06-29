<?php

namespace BusinessProcessRoot\Helper\Validation;

use \Config\Services as SVC;
use BusinessProcessRoot\Entities\Response\Helper\ValidateResponse;
use BusinessProcessRoot\Models\User as UserModel;
use \Datetime;

use App\Libraries\Slug\Slug;
use App\Libraries\Slug\SlugOptions;

trait ValidationMaster{
	public $defaultEtity;
	public $defaultRule;

	public function validateWithoutInput($value="",$functionpe=array(),$param=""){
		$n = $value;
		foreach($functionpe as $f){
			if(strlen($param)>=1){
				$re = $this->$f("none",$n,$param);
			}else{
				$re = $this->$f("none",$n);
			}

			$n = $re['value'];
		}

		return $n;
	}

	public function validateRule($rule,$entity){
		$this->defaultEtity = $entity;
		$this->defaultRule = $rule;

		$array_all_rule = array();
		$error_message = array();
		$is_error = 0;
		foreach($rule as $m=>$k){
			$array_rule = array();
			$array_rule_sm = array();
			$rule = $k[0];
			$string = "";
			for($i=0; $i < strlen($rule); $i++){
				if($rule[$i] == "|" || $i == strlen($rule) - 1){
					if($i == strlen($rule) - 1){
						$string .= $rule[$i];
					}
					$array_rule[] = $string;
					$string = "";
				}else{
					$string .= $rule[$i];
				}
			}

			for($j=0; $j < sizeof($array_rule); $j++){
				$array_rule_ob = array();
				$p = explode(':', $array_rule[$j], 2);

				for($ks=0;$ks<sizeof($p);$ks++){
					if($ks == 0){
						$array_rule_ob['function'] = $p[$ks];
					}else{
						$array_rule_ob['param'][] = $p[$ks];
					}
				}

				$array_rule_sm[] = $array_rule_ob;
			}

			$data = array(
				'field' => $m,
				'validate' => $array_rule_sm
			);

			$array_all_rule[] = $data;
		}

		foreach($array_all_rule as $aar){
			$param = $aar['field'];
			foreach($aar['validate'] as $av){
				$function = $av['function'];
				if(isset($av['param'])){
					$lc = $this->$function($param, $entity->$param,$av['param']);
				}else{
					$lc = $this->$function($param, $entity->$param);
				}

				$entity->$param = $lc['value'];
				$is_error += $lc['error'];
				$error_message[$param][] = $lc['error_message'];
			}
		}

		$vr = new ValidateResponse();
		$vr->is_error = $is_error;
		$vr->error_message = $error_message;
		$vr->result = $entity;

		return $vr;
	}

	public function changenull($field="",$val="",$param=array("")){
		if(strlen($val)==0){
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $param[0];
		}else{
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		}

		return $data_send;
	}

	public function base64_decoder($field="",$val=""){
		$data_send = array();
		$data_send['error'] = 0;
		$data_send['value'] = base64_decode($val);
		$data_send['error_message'] = "";

		return $data_send;
	}

	public function required($field,$val){
		$data_send = array();
		if(strlen($val)>=1){
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		}else{
			$data_send['error'] = 1;
			$data_send['error_message'] = $this->defaultRule[$field][1] . " field is required";
			$data_send['value'] = $val;
		}

		return $data_send;
	}

	public function numeric_positive($field="",$val="",$param=array("")){
		$data_send = array();
		if(empty($param[0])){
			$param[0] = "";
		}

		if(preg_match('/^[0-9' . $param[0] . ']+$/i', $val)){
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		}else{
			$data_send['error'] = 1;
			$data_send['error_message'] = $this->defaultRule[$field][1] . " field is not formatted correctly";
			$data_send['value'] = "error_log";
		}

		return $data_send;
	}

	public function numeric($field="",$val="",$param=array("")){
		$data_send = array();
		if(empty($param[0])){
			$param[0] = "";
		}

		if(is_numeric($val)){
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		}else{
			$data_send['error'] = 1;
			$data_send['error_message'] = $this->defaultRule[$field][1] . " field is not formatted correctly";
			$data_send['value'] = "error_log";
		}

		return $data_send;
	}

	public function must_be_array($field="",$val="",$param=array("")){
		$data_send = array();
		if(empty($param[0])){
			$param[0] = "";
		}

		if(is_array($val)){
			switch($param[0]) {
				case 'numeric':
					foreach($val as $v){
						$v = (int) $v;
					}
				break;
			}

			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		}else{
			$data_send['error'] = 1;
			$data_send['error_message'] = $this->defaultRule[$field][1] . " field is not an array";
			$data_send['value'] = "error_log";
		}

		return $data_send;
	}

	public function float($field="",$val="",$param=array("")){
		$data_send = array();
		$data_send['error'] = 0;
		$data_send['error_message'] = "";
		$data_send['value'] = (float) $val;

		return $data_send;
	}

	public function larger($field="",$val="",$param=array("")){
		if(is_float($val)){
			$val = (float)$val;
			$m = (float)$param[0];
		}else{
			$val = (int)$val;
			$m = (int)$param[0];
		}
		if($val>$m){
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		}else{
			$data_send['error'] = 1;
			$data_send['error_message'] = $this->defaultRule[$field][1] . " field is not formatted correctly";
			$data_send['value'] = 0;
		}

		return $data_send;
	}

	public function smaller($field="",$val="",$param=array("")){
		if(is_float($val)){
			$val = (float)$val;
			$m = (float)$param[0];
		}else{
			$val = (int)$val;
			$m = (int)$param[0];
		}
		if($val<$m){
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		}else{
			$data_send['error'] = 1;
			$data_send['error_message'] = $this->defaultRule[$field][1] . " field is not formatted correctly";
			$data_send['value'] = 0;
		}

		return $data_send;
	}

	public function alphanumeric($field="none",$val="none",$param=array()){
		$data_send = array();
		if(empty($param[0])){
			$param[0] = "";
		}
		if(preg_match('/^[A-Za-z0-9' . $param[0] . ']+$/i', $val)){
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		}else{
			$data_send['error'] = 1;
			$data_send['error_message'] = $this->defaultRule[$field][1] . " field is not formatted correctly";
			$data_send['value'] = "error_log";
		}

		return $data_send;
	}

	public function alphabetic($field="none",$val="none",$param=array()){
		$data_send = array();
		if(empty($param[0])){
			$param[0] = "";
		}
		if(preg_match('/^[a-zA-Z' . $param[0] . ']+$/i', $val)){
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		}else{
			$data_send['error'] = 1;
			$data_send['error_message'] = $this->defaultRule[$field][1] . " field is not formatted correctly";
			$data_send['value'] = "error_log";
		}

		return $data_send;
	}

	public function unique($field,$val,$param){
		$db = \Config\Database::connect();

		$data_send = array();

		$table_column = explode(".", $param[0]);

		$table = $table_column[0];
		$column = $table_column[1];

		$query = $db->query('SELECT '. $column . ' FROM ' . $table . ' where ' . $column . " = '" . $val . "'");
		$results = $query->getResult();

		if(sizeof($results)>=1){
			$data_send['error'] = 1;
			$data_send['error_message'] = "The " . $this->defaultRule[$field][1] . " is taken" ;
			$data_send['value'] = $val;
		}else{
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		}

		return $data_send;
	}

	public function exist($field,$val,$param){
		$db = \Config\Database::connect();

		$data_send = array();

		$table_column = explode(".", $param[0]);

		$table = $table_column[0];
		$column = $table_column[1];

		$query = $db->query('SELECT '. $column . ' FROM ' . $table . ' where ' . $column . " = '" . $val . "'");
		$results = $query->getResult();

		if(sizeof($results)==0){
			$data_send['error'] = 1;
			$data_send['error_message'] = "The " . $this->defaultRule[$field][1] . " does not exist" ;
			$data_send['value'] = $val;
		}else{
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		}

		return $data_send;
	}

	public function getid($field,$val,$param){
		$db = \Config\Database::connect();

		$data_send = array();

		$table_column = explode(".", $param[0]);

		$table = $table_column[0];
		$column_id = $table_column[2];
		$column_where = $table_column[1];

		$query = $db->query('SELECT '. $column_id . ' FROM ' . $table . ' where ' . $column_where . " = '" . $val . "'");
		$results = $query->getResult();

		if(sizeof($results)==0){
			$data_send['error'] = 1;
			$data_send['error_message'] = "The " . $this->defaultRule[$field][1] . " does not exist" ;
			$data_send['value'] = $val;
		}else{
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $results[0]->timezone_id;
		}

		return $data_send;
	}

	public function max_length($field,$val,$param){
		$data_send = array();
		$param_f = (int) $param[0];
		if(strlen($val)<=$param_f){
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		}else{
			$data_send['error'] = 1;
			$data_send['error_message'] = $this->defaultRule[$field][1] . " field is too long";
			$data_send['value'] = $val;
		}

		return $data_send;
	}

	public function min_length($field,$val,$param){
		$data_send = array();
		$param_f = (int) $param[0];
		if(strlen($val)>=$param_f){
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		}else{
			$data_send['error'] = 1;
			$data_send['error_message'] = $this->defaultRule[$field][1] . " field is too short";
			$data_send['value'] = $val;
		}

		return $data_send;
	}

	public function valid_phone($field,$val){
		$data_send = array();
		if(!preg_match("/^\+?\d*$/",$val)){
			$data_send['error'] = 1;
			$data_send['error_message'] = $this->defaultRule[$field][1] . " field is not valid";
			$data_send['value'] = $val;
		}else{
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		}

		return $data_send;
	}

	public function omit_script($field,$val){
		$ch = curl_init();

		$data = array(
			'string_val' => $val,
			'token' => "DaPQopV0S4uOh2ANACeij.RxBMvYcinj7vfbopN.Kok0z7LsUNK49s2WK5tk8cxuYvkuV2rYz0TrowOOrGg6KRkUvOUAAS6kRfdj6vXQYlc2O_z_mFpaMUSZjMPhAaCHioOa7Ap4WrW2Ja3kDvhlP29kdghsWxEcpF6jBzZ44M6R1czaMlOT4URIduMxbccEjavJThVwIzTMW394AR-.GhwWt8LoLX-pu"
		);

		curl_setopt($ch, CURLOPT_URL,"https://api.agurooz.com/APIController/htmlPurify");
		// curl_setopt($ch, CURLOPT_URL,"http://localhost/2020_11_28_mangrovis_api/APIController/htmlPurify");

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = json_decode(curl_exec($ch));
		curl_close($ch);

		$data_send = array();
		$data_send['error'] = $server_output->error;
		$data_send['value'] = $server_output->result;
		$data_send['error_message'] = $server_output->error_message;

		return $data_send;
	}

	public function encode_html($field,$val){
		$data_send = array();
		$data_send['error'] = 0;
		$data_send['value'] = htmlspecialchars($val);
		$data_send['error_message'] = "";

		return $data_send;
	}

	public function hash_password($field,$val){
		$data_send = array();
		$data_send['error'] = 0;
		$data_send['value'] = password_hash($val,PASSWORD_DEFAULT);
		$data_send['error_message'] = "";

		return $data_send;
	}

	public function valid_date($field,$val){

    	$d = \DateTime::createFromFormat("Y-m-d", $val);

	    $result = $d && $d->format("Y-m-d") == $val;

		if ($result) {
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		} else {
			$data_send['error'] = 1;
			$data_send['error_message'] = "The " . $this->defaultRule[$field][1] . " field is not valid";
			$data_send['value'] = "01-01-2001";
		}

		return $data_send;
	}

	public function valid_datetime($field,$val){

    	$d = \DateTime::createFromFormat("Y-m-d H:i:s", $val);

	    $result = $d && $d->format("Y-m-d H:i:s") == $val;

		if ($result) {
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		} else {
			$data_send['error'] = 1;
			$data_send['error_message'] = "The " . $this->defaultRule[$field][1] . " field is not valid";
			$data_send['value'] = "01-01-2001 00:00:00";
		}

		return $data_send;
	}

	public function valid_time($field,$val){

    	$d = \DateTime::createFromFormat("H:i:s", $val);

	    $result = $d && $d->format("H:i:s") == $val;

		if ($result) {
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		} else {
			$data_send['error'] = 1;
			$data_send['error_message'] = "The " . $this->defaultRule[$field][1] . " field is not valid";
			$data_send['value'] = "00:00:00";
		}

		return $data_send;
	}

	public function valid_yearud($field,$val){
		if ($val >= 1900 && $val < 2500) {
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		} else {
			$data_send['error'] = 1;
			$data_send['error_message'] = "The " . $this->defaultRule[$field][1] . " field is not valid";
			$data_send['value'] = "00:00:00";
		}

		return $data_send;
	}

	public function valid_email($field,$val){
		if (filter_var($val, FILTER_VALIDATE_EMAIL)) {
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		} else {
			$data_send['error'] = 1;
			$data_send['error_message'] = "The " . $this->defaultRule[$field][1] . " field is not valid";
			$data_send['value'] = "error@error.error";
		}

		return $data_send;
	}

	public function is_same($field,$val,$param){
		if($param[0][0] == "[" && $param[0][strlen($param[0])-1] == "]"){
			$jparam = substr($param[0], 1,(strlen($param[0])-2) );
			if($val == $this->defaultEtity->$jparam){
				$data_send['error'] = 0;
				$data_send['error_message'] = "";
				$data_send['value'] = $val;
			}else{
				$data_send['error'] = 1;
				$data_send['error_message'] = "The " . $this->defaultRule[$field][1]  .  " is not same with " . $this->defaultRule[$jparam][1] . " field";
				$data_send['value'] = $val;
			}
		}else{
			if($val == $param[0]){
				$data_send['error'] = 0;
				$data_send['error_message'] = "";
				$data_send['value'] = $val;
			}else{
				$data_send['error'] = 1;
				$data_send['error_message'] = $this->defaultRule[$field][1] . " field is not inputted correctly";
				$data_send['value'] = $val;
			}
		}

		return $data_send;
	}

	public function isbetween($field,$val,$param){
		$in_array = explode(".", $param[0]);
		if(in_array($val, $in_array)){
			$data_send['error'] = 0;
			$data_send['error_message'] = "";
			$data_send['value'] = $val;
		}else{
			$data_send['error'] = 1;
			$data_send['error_message'] = $this->defaultRule[$field][1] . " field is not inputted correctly";
			$data_send['value'] = $val;
		}

		return $data_send;
	}

	public function transferfromtimezone($field,$val,$param){
		$uModel = new UserModel();
		$use_detail = $uModel->where("user_id",$param)->findAll();

		if(sizeof($use_detail)==0){
			$data_send['error'] = 1;
			$data_send['error_message'] = "The " . $this->defaultRule[$field][1] . " field is incorrect format" ;
			$data_send['value'] = $val;
		}else{
			$timezone_name = $use_detail[0]->get_timezone_detail()[0]->timezone_name;

	    	$datetime = \DateTime::createFromFormat('Y-m-d H:i:s', $val, new \DateTimeZone($timezone_name));
		    $result = $datetime && $datetime->format("Y-m-d H:i:s") == $val;
			if($result){
		    	$datetime->setTimeZone(new \DateTimeZone(DEFAULT_SERVER_TIMEZONE));
				$data_send['error'] = 0;
				$data_send['error_message'] = "";
				$data_send['value'] = $datetime->format("Y-m-d H:i:s");
			}else{
				$data_send['error'] = 1;
				$data_send['error_message'] = "The " . $this->defaultRule[$field][1] . " field is incorrect format" ;
				$data_send['value'] = $val;
			}
		}

		return $data_send;
	}

	public function get_slug($field, $val){
		$slug_option_1 = new SlugOptions();
		$slug = new Slug($slug_option_1);

		$slug_title = $slug->generate($val);

		$data_send = array();
		$data_send['error'] = 0;
		$data_send['value'] = $slug_title;
		$data_send['error_message'] = "";

		return $data_send;
	}

	public function get_only_numeric($field, $val){
		$output = preg_replace('/[^0-9]/', '', $val);
		
		$data_send['error'] = 0;
		$data_send['error_message'] = "";
		$data_send['value'] = $output;

		return $data_send;
	}

	public function validateError(ValidateResponse $vr){
		if($vr->is_error >= 1){
			return true;
		}else{
			return false;
		}
	}

	public function addValidateError($result,$newError){
		$field = $newError[0];

		if(isset($result->error_message[$field])){
			$array_error_all = $result->error_message;
			$array_error = $result->error_message[$field];
			$array_error[] = $newError[1];

			$array_error_all[$field] = $array_error;

			$result->error_message = $array_error_all;

			$result->is_error += 1;
		}else{
			$array_error_all = $result->error_message;
			$array_error = array();
			$array_error[] = $newError[1];

			$array_error_all[$field] = $array_error;

			$result->error_message = $array_error_all;

			$result->is_error += 1;
		}
		return $result;
	}

	public function filterValidateRequestParam($request,$additional_param){
		if(isset($additional_param['REQUEST_TYPE'])){
			$default_req = $additional_param['REQUEST_TYPE'];
			unset($additional_param["REQUEST_TYPE"]);
		}else{
			$default_req = "get";
		}

		if($request != null){
			if($default_req == "get"){
				$all_req_unf = $request->getGet();
			}else if($default_req == "post"){
				$all_req_unf = $request->getPost();
			}
		}

		$all_req_fin = array();

		if(isset($additional_param["ACCEPTED_PARAM"])){
			foreach($additional_param['ACCEPTED_PARAM'] as $k){
				if(isset($all_req_unf[$k])){
					$all_req_fin[$k] = $all_req_unf[$k];
				}
			}

			unset($additional_param["ACCEPTED_PARAM"]);
		}

		if(isset($additional_param['ADD_REQUEST'])){
			foreach($additional_param['ADD_REQUEST'] as $k => $v){
				$all_req_fin[$k] = $v;
			}

			unset($additional_param["ADD_REQUEST"]);
		}

		$optional_info = array();

		if(isset($additional_param['ADDITIONAL_VALIDATION'])){
			$optional_info['ADDITIONAL_VALIDATION'] = $additional_param['ADDITIONAL_VALIDATION'];
			unset($additional_param["ADDITIONAL_VALIDATION"]);
		}

		if(isset($additional_param['MANDATORY_VALIDATION'])){
			$optional_info['MANDATORY_VALIDATION'] = $additional_param['MANDATORY_VALIDATION'];
			unset($additional_param["MANDATORY_VALIDATION"]);
		}

		$data_return = array(
			'all_param' => $all_req_fin,
			'additional_param' => $additional_param,
			'optional_info' => $optional_info
		);

		return $data_return;
	}
}
