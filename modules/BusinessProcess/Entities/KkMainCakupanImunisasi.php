<?php

namespace BusinessProcessRoot\Entities;

use BusinessProcessRoot\Models\CakupanImunisasi as CakupanImunisasiModel;
use CodeIgniter\Entity;

class KkMainCakupanImunisasi extends Entity
{
	protected $kk_main_cakupan_imunisasi_id;
	protected $kk_id;
	protected $cakupan_imunisasi;

	public function get_cakupan_imunisasi_string(){
		$skm_model = new CakupanImunisasiModel();
		$skm_ent = $skm_model->find($this->attributes['cakupan_imunisasi']);
		return $skm_ent->nama_cakupan_imunisasi;
	}
}