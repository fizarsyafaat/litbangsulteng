<?php

namespace BusinessProcessRoot\Master\Traits;
use \Config\Services as SVC;
use BusinessProcessRoot\Master\Entities\Misc\Pagination as PaginationEntity;

trait Pagination{
	public function setPagination($config){
		//total_halaman
		$total_halaman = ceil($config['total_data']/$config['data_per_page']);

		$stop = false;
		$array_prev = array();
		$array_next = array();
		$side_page_inc = 0;
		$next_prev = $config['current_page'] - 1;
		$next_next = $config['current_page'] + 1;

		while($stop == false){
			if($next_prev == 0 || $side_page_inc == $config['side_page']){
				$stop = true;
			}else{
				$array_prev[] = $next_prev;
			}
			$side_page_inc += 1;
			$next_prev -= 1;
		}

		$stop = false;

		$side_page_inc = 0;

		while($stop == false){
			if($next_next >= ($total_halaman+1) || $side_page_inc == $config['side_page']){
				$stop = true;
			}else{
				$array_next[] = $next_next;
			}
			$side_page_inc += 1;
			$next_next += 1;
		}

		$pagination_send = new PaginationEntity();

		$pagination_send->array_prev = $array_prev;
		$pagination_send->array_next = $array_next;
		$pagination_send->next_ellipsis = false;
		$pagination_send->prev_ellipsis = false;
		$pagination_send->next_prev_button = $config['prev_next'];
		$pagination_send->last_page = $total_halaman;
		$pagination_send->data_per_page = $config['data_per_page'];
		if(isset($config['not_uri'])){
			$pagination_send->not_uri = 1;
		}

		if(sizeof($array_next)==3){
			if($array_next[2] == $total_halaman){
				$pagination_send->next_ellipsis = false;
			}else{
				if(($array_next[2] + 1) == $total_halaman){
					$pagination_send->array_next[] = $total_halaman;
				}else{
					$pagination_send->next_ellipsis = true;
				}
			}
		}

		if(sizeof($array_prev)==3){
			if($array_prev[2] == 1){
				$pagination_send->prev_ellipsis = false;				
			}else{
				if(($array_prev[2] - 1) == 1){
					$pagination_send->array_prev[] = true;
				}else{
					$pagination_send->prev_ellipsis = true;
				}				
			}
		}

		if(isset($config['not_uri'])){
			$pagination_send->base_link = "none";
			$pagination_send->query_param = array();
		}else{
			$link = $config['query_param']->uri->getPath();
			$scheme = $config['query_param']->uri->getScheme();
			$host = $config['query_param']->uri->getHost();
			$port = $config['query_param']->uri->getPort();

			$base_link = $scheme . "://" . $host . ":" . $port . "/" . $link;

			$pagination_send->base_link = $base_link;

			$queryParam = $config['query_param']->getGet();

			$qParray = array();

			foreach($queryParam as $k=>$v){
				if($k != "page"){
					$qParray[$k] = $v;
				}
			}

			$pagination_send->query_param = $qParray;
		}

		$pagination_send->current_page = $config['current_page'];

        return $pagination_send;
	}
}