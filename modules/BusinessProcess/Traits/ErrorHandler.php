<?php

namespace BusinessProcessRoot\Master\Traits;

use \Config\Services as SVC;
use BusinessProcessRoot\Master\Models\LogTeacher as LogTeacherModel;
use BusinessProcessRoot\Master\Entities\LogTeacher as LogTeacherEntities;

trait ErrorHandler{
	public function setErrorHandlerContent($error){
		try{
			$k = $error->error_message;
			$text = "<ol style='margin-top: 29px;font-size: 20px;font-weight: bold;'>";

			foreach($k as $m){
				foreach($m as $nc){
					if(strlen($nc)>=1){
						$text .= "<li style='list-style-position: inside;'>" . $nc . "</li>";
					}
				}
			}

			$text .= "</ol>";

			return $text;
		}catch(\Exception $e){
			return "<p>Oops.. Something wrong</p>";
		}
	}
}