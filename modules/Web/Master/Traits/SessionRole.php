<?php

namespace Master\Traits;
use \Config\Services as SVC;

trait SessionRole{
	public function getSessionRole(){
		$session = SVC::session();

		$session_data = $session->get("data");
		
		if(isset($session_data->fix_role)){
			$role = $session_data->fix_role;
			switch ($role){
				case 'user':
				return $session_data->role;
				break;
				
				default:
				return 0;
				break;
			}

		}else{
			return 0;
		}
	}
}