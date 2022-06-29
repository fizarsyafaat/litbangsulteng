<?php

namespace BusinessProcessRoot\Entities;

use CodeIgniter\Entity;
use BusinessProcessRoot\Models\LembagaPemerintahan as LembagaPemerintahanModel;

class KkMainLembagaPemerintahan extends Entity
{
	protected $kk_main_lembaga_pemerintahan_id;
	protected $kk_id;
	protected $lembaga_pemerintahan_id;

	public function get_lembaga_pemerintahan_string(){
		$skm_model = new LembagaPemerintahanModel();
		$skm_ent = $skm_model->find($this->attributes['lembaga_pemerintahan_id']);
		return $skm_ent->nama_lembaga_pemerintahan;
	}
}