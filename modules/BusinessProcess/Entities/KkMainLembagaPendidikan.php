<?php

namespace BusinessProcessRoot\Entities;

use BusinessProcessRoot\Models\LembagaPendidikan as LembagaPendidikanModel;
use CodeIgniter\Entity;

class KkMainLembagaPendidikan extends Entity
{
	protected $kk_main_lembaga_pendidikan_id;
	protected $kk_id;
	protected $lembaga_pendidikan;

	public function get_lembaga_pendidikan_string(){
		$skm_model = new LembagaPendidikanModel();
		$skm_ent = $skm_model->find($this->attributes['lembaga_pendidikan']);
		return $skm_ent->nama_lembaga_pendidikan;
	}
}