<?php

namespace BusinessProcessRoot\Entities\Misc;

use CodeIgniter\Entity;

class Statistic extends Entity
{
	protected $gender;

	public function get_percentage($data){
		$total_data = 0;
		$data_send = array();
		foreach($data as $l){
			$total_data += $l;
		}

		foreach($data as $key => $value){
			try{
				$n = new \StdClass();
				$n->name = ucfirst(strtolower($key));
				$n->percentage = round( ($value/$total_data) * 100,1) ;
				$n->total_data = $value;
				$data_send[] = $n;
			}catch(\Exception $e){
				$n->name = ucfirst(strtolower($key));
				$n->total_data = 0;
				$n->percentage = 0;
				$data_send[] = $n;
			}
		}

		return $data_send;
	}
}