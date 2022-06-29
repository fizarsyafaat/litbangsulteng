<?php

namespace Master\Controllers\ViewCont;
use App\Controllers\BaseController;

//Contains all view features

class ViewController extends BaseController
{
	protected $css_top = array();
	protected $css_bottom = array();
	protected $js_top = array();
	protected $js_bottom = array();
	protected $data_view = array();

	public function __construct(){
		$this->set_data_view("title","Smart City Palu");
	}

	public function tc_view($namespace){
		$data = $this->data_view;
		$data['css_top'] = $this->css_top;
		$data['js_top'] = $this->js_top;
		$data['css_bottom'] = $this->css_bottom;
		$data['js_bottom'] = $this->js_bottom;

		return view($namespace,$data);
	}

	public function tc_render($namespace){
		$data = $this->data_view;
		$data['css_top'] = $this->css_top;
		$data['js_top'] = $this->js_top;
		$data['css_bottom'] = $this->css_bottom;
		$data['js_bottom'] = $this->js_bottom;

		$parser = \Config\Services::parser();
		return $parser->setData($data)
             ->render($namespace);
	}

	public function get_css_top(){
		return $this->css_top;
	}

	public function get_js_top(){
		return $this->js_top;
	}

	public function get_css_bottom(){
		return $this->css_bottom;
	}

	public function get_js_bottom(){
		return $this->js_bottom;
	}

	public function set_css_data($css="none",$css_position="top",$array_position="last",$prefix=""){
		if(is_array($css)){
			if(strlen($prefix)>=1){
				foreach($css as $key => $m){
					$css[$key] = $prefix . $m;
				}
			}
			if($css_position == "top"){
	            if($array_position == "last"){
	                $merge = array_merge($this->css_top,$css);
	            }else{
	                $merge = array_merge($css,$this->css_top);
	            }

	            $this->css_top = $merge;
			}else{
	            if($array_position == "last"){
	                $merge = array_merge($this->css_bottom,$css);
	            }else{
	                $merge = array_merge($css,$this->css_bottom);
	            }

	            $this->css_bottom = $merge;
			}
		}else{
			if($css_position == "top"){
	            if($array_position == "last"){
	                array_push($this->css_top,$css);
	            }else{
	                array_unshift($this->css_top, $css);
	            }
			}else{
	            if($array_position == "last"){
	                array_push($this->css_bottom,$css);
	            }else{
	                array_unshift($this->css_bottom, $css);
	            }
			}
		}
	}

	public function set_js_data($js="none",$js_position="top",$array_position="last",$prefix=""){
		if(is_array($js)){
			if(strlen($prefix)>=1){
				foreach($js as $key => $m){
					$js[$key] = $prefix . $m;
				}
			}
			if($js_position == "top"){
	            if($array_position == "last"){
	                $merge = array_merge($this->js_top,$js);
	            }else{
	                $merge = array_merge($js,$this->js_top);
	            }

	            $this->js_top = $merge;
			}else{
	            if($array_position == "last"){
	                $merge = array_merge($this->js_bottom,$js);
	            }else{
	                $merge = array_merge($js,$this->js_bottom);
	            }

	            $this->js_bottom = $merge;
			}
		}else{
			if($js_position == "top"){
	            if($array_position == "last"){
	                array_push($this->js_top,$js);
	            }else{
	                array_unshift($this->js_top, $js);
	            }
			}else{
	            if($array_position == "last"){
	                array_push($this->js_bottom,$js);
	            }else{
	                array_unshift($this->js_bottom, $js);
	            }
			}
		}
	}

	public function set_data_view($var,$value){
		$this->data_view[$var] = $value;
	}

	public function get_data_view(){
		return $this->data_view;
	}

}
