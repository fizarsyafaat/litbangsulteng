<?php

namespace BusinessProcessRoot\Master\Traits;
use \Config\Services as SVC;

trait NumberOrder{
	public function SetIndexNumber($data,$config){
		$page = $config['current_page'];
		$data_per_page = $config['data_per_page'];
		$beginning = $data_per_page * ($page - 1) + 1;

		foreach($data as $m){
			$m->index = $beginning;
			$beginning += 1;
		}

		return $data;
	}
}