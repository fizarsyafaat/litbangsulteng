<?php

namespace BusinessProcessRoot\Master\Traits;
use \Config\Services as SVC;

trait RandomGenerator{
	public function generate_alphabet($length = 20){
	    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function generate_numeric($length = 20){
	    $characters = '0123456789';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function generate_consonant($length = 20){
	    $characters = 'bcdfghjklmnpqrstvwxyz';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function generate_vocal($length = 20){
	    $characters = 'aiueoy';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function generate_alphabetnumeric($length = 20){
	    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function integer_to_hex($id){
		$string_dec = "";
		$string_zero = "";
		$iteration = floor(log($id,27));
		$result_iteration = 0;
		for($i=$iteration;$i>=0;$i--){
			$k = floor($id/pow(27,$i));
			if($k==0){
				$string_dec .= "0";
			}else{
				$string_dec .= chr(64+$k);
			}
			$k_t = $id - pow(27,$i)*$k;
			$id = $k_t;
		}

		$panjang = strlen($string_dec);
		$iteration = 7-$panjang;
		for($i=$iteration;$i>0;$i--){
			$string_zero .= "0";
		}

		$string_finished = $string_zero . $string_dec;
		$string_finished_last = "";

		$order = 1;

		for($i=0;$i<strlen($string_finished);$i++){
			if($order%3 == 0){
				$order+=1;
				$string_finished_last .= rand(1,9);
				$string_finished_last .= $string_finished[$i];
			}else{
				$string_finished_last .= $string_finished[$i];
			}
			$order+=1;
		}

		return $string_finished_last;
	}
}