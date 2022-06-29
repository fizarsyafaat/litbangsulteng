<?php

namespace BusinessProcessRoot\Entities\SessionCookies;

use BusinessProcessRoot\Models\User as UserModel;
use CodeIgniter\Entity;

class UserSession extends Entity
{
	protected $user_id;
	protected $user_name;
	protected $user_email;
	protected $user_role;
	protected $user_status;
	public $fix_role = "user";

	public function get_user_detail(){
        $uModel = new UserModel();

        $user_detail = $uModel->where('user_id',$this->attributes['user_id'])
        ->findAll();

        if(sizeof($user_detail)==1){
            unset($user_detail->password);
            unset($user_detail->public_key);
            unset($user_detail->username);
            unset($user_detail->token);
            unset($user_detail->email);
            unset($user_detail->user_id);
            unset($user_detail->point);
            unset($user_detail->forum_signature);
            unset($user_detail->message_signature);
            unset($user_detail->date_registered);
            unset($user_detail->image);
            unset($user_detail->user_country);
            unset($user_detail->user_timezone);
            unset($user_detail->coin);
            unset($user_detail->birthdate);
            unset($user_detail->token_public);
            unset($user_detail->token_private);
            unset($user_detail->bank_verified);
            unset($user_detail->allowed_action);
            unset($user_detail->address);
        }

        return $user_detail;
	}
}