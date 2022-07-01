<?php

namespace BusinessProcessRoot\Entities;

use BusinessProcessRoot\Models\AcceptorKb as AcceptorKbModel;
use CodeIgniter\Entity;

class KkMainAcceptorKb extends Entity
{
	protected $kk_main_acceptor_kb_id;
	protected $kk_id;
	protected $acceptor_kb_id;


	public function get_acceptorkb_string(){
		$skm_model = new AcceptorKbModel();
		$skm_ent = $skm_model->find($this->attributes['acceptor_kb_id']);
		return $skm_ent->nama_acceptor_kb;
	}
}