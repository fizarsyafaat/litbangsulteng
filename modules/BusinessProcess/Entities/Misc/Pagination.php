<?php

namespace BusinessProcessRoot\Entities\Misc;

use CodeIgniter\Entity;

class Pagination extends Entity
{
	public $array_prev;
	public $array_next;
	public $next_ellipsis;
	public $prev_ellipsis;
	public $next_prev_button;
	public $base_link;
	public $not_uri;
	public $query_param;
	public $current_page;
	public $last_page;
	public $data_per_page;
	public $jsonPage;

	public function generate_button($page=1,$current=false){
		$link = $this->base_link . "?page=" . $page;

		foreach($this->query_param as $k => $v){
			$link .= "&" . $k ."=" . $v;
		}

		if(isset($this->not_uri)){
			if($current == false){
				$string = "<a class='page_item' href='#' meta-page='" . $page . "'>" . $page . "</a>";
			}else{
				$string = "<a>" . $page . "</a>";
			}
		}else{
			if($current == false){
				$string = "<a class='page_item' href='" . $link . "' meta-page='" . $page . "'>" . $page . "</a>";
			}else{
				$string = "<a>" . $page . "</a>";
			}
		}

		return $string;
	}

	public function generate_np_button($text="Previous",$page=1){
		$link = $this->base_link . "?page=" . $page;

		foreach($this->query_param as $k => $v){
			$link .= "&" . $k ."=" . $v;
		}

		if(isset($this->not_uri)){
			if($page < 1 || $page > $this->last_page){
				$string = "<a>" . $text . "</a>";
			}else{
				$string = "<a class='page_item' href='#' meta-page='" . $page . "'>" . $text . "</a>";
			}
		}else{
			if($page < 1 || $page > $this->last_page){
				$string = "<a>" . $text . "</a>";
			}else{
				$string = "<a class='page_item' href='" . $link . "' meta-page='" . $page . "'>" . $text . "</a>";
			}
		}

		return $string;
	}

	public function generate_ellipsis($position="prev"){

		if($position=="prev"){
			$string = $this->generate_button(1);
			$string .= "<span class='ellipsis'> . . . </span>";
		}else{
			$string = "<span class='ellipsis'> . . . </span>";
			$string .= $this->generate_button($this->last_page);
		}

		return $string;
	}

	public function renderPager(){
		if($this->current_page == 0){
			
		}else{
			$button_all = array();

			if($this->next_prev_button == true){
				$button_all[] =$this->generate_np_button("Previous",$this->current_page-1);
			}

			if($this->prev_ellipsis){
				$button_all[] = $this->generate_ellipsis("prev");
			}

			for ($i=sizeof($this->array_prev) - 1;$i >= 0; $i--){ 
				$button_all[] = $this->generate_button($this->array_prev[$i]);
			}

			$button_all[] = $this->generate_button($this->current_page,true);

			foreach($this->array_next as $an){
				$button_all[] = $this->generate_button($an);
			}

			if($this->next_ellipsis){
				$button_all[] = $this->generate_ellipsis("next");
			}

			if($this->next_prev_button == true){
				$button_all[] =$this->generate_np_button("Next",$this->current_page+1);
			}

			foreach($button_all as $ba){
				echo $ba;
			}
		}
	}

	public function renderPagerJson(){
		$all_page = "";
		if($this->current_page == 0){
			
		}else{
			$button_all = array();

			if($this->next_prev_button == true){
				$button_all[] =$this->generate_np_button("Previous",$this->current_page-1);
			}

			if($this->prev_ellipsis){
				$button_all[] = $this->generate_ellipsis("prev");
			}

			for ($i=sizeof($this->array_prev) - 1;$i >= 0; $i--){ 
				$button_all[] = $this->generate_button($this->array_prev[$i]);
			}

			$button_all[] = $this->generate_button($this->current_page,true);

			foreach($this->array_next as $an){
				$button_all[] = $this->generate_button($an);
			}

			if($this->next_ellipsis){
				$button_all[] = $this->generate_ellipsis("next");
			}

			if($this->next_prev_button == true){
				$button_all[] =$this->generate_np_button("Next",$this->current_page+1);
			}

			foreach($button_all as $ba){
				$all_page .= $ba;
			}
		}	

		return $all_page;
	}

	public function renderPagerAPI(){
		$button_all = array();
		if($this->current_page == 0){
			
		}else{
			$button_all = array();

			if($this->next_prev_button == true){
				$h = new \StdClass();
				$h->name = "Previous";
				$h->type = "bt_text";
				$h->page = $this->current_page - 1;
				$button_all[] = $h;
			}

			if($this->prev_ellipsis){
				$h = new \StdClass();
				$h->name = "prev";
				$h->page = 0;
				$h->type = "ellipsis";
				$button_all[] = $h;
			}

			for ($i=sizeof($this->array_prev) - 1;$i >= 0; $i--){ 
				$h = new \StdClass();
				$h->name = $this->array_prev[$i];
				$h->page = $this->array_prev[$i];
				$h->current = 0;
				$h->type = "bt_number";
				$button_all[] = $h;
			}

			$h = new \StdClass();
			$h->name = $this->current_page;
			$h->page = $this->current_page;
			$h->current = 1;
			$h->type = "bt_number";
			$button_all[] = $h;

			foreach($this->array_next as $an){
				$h = new \StdClass();
				$h->name = $an;
				$h->page = $an;
				$h->current = 0;
				$h->type = "bt_number";
				$button_all[] = $h;
			}

			if($this->next_ellipsis){
				$h = new \StdClass();
				$h->name = "next";
				$h->page = 0;
				$h->type = "ellipsis";
				$button_all[] = $h;
			}

			if($this->next_prev_button == true){
				$h = new \StdClass();
				$h->name = "Next";
				$h->type = "bt_text";
				$h->page = $this->current_page + 1;
				$button_all[] = $h;
			}
		}	

		return $button_all;
	}
}