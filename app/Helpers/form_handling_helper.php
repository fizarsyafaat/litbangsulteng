<?php 

function FHHelperShowFormError($errorFlash, $field){
	$string = "";
	if(isset($errorFlash[$field])){
	    foreach($errorFlash[$field] as $eu){
	    if(strlen($eu)>=1){
	            $string .= '<p class="text-danger">' . $eu . '</p>';
	    	}
	    }
	}

	return $string;
}

function decode_j_html($string){
	$l = htmlspecialchars_decode(htmlspecialchars_decode($string));

	return $l;
}

function check_submitted_form($query_param,$field,$compared){
	if(isset($query_param[$field])){
		if($query_param[$field]==$compared){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

function set_default_value($query_param,$id){
	if(isset($query_param[$id])){
		echo "value='" . $query_param[$id] . "'";
	}
}

function set_default_text($query_param,$id){
	if(isset($query_param[$id])){
		return $query_param[$id];
	}
}

function set_default_value_select($query_param,$field,$compared){
	if(isset($query_param[$field])){
		if($query_param[$field]==$compared){
			echo "selected='selected'";
		}else{
			return false;
		}
	}else{
		return false;
	}
}