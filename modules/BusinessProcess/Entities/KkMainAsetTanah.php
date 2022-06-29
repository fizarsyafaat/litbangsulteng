<?php

namespace BusinessProcessRoot\Entities;
use BusinessProcessRoot\Models\AsetTanah as AsetTanahModel;
use CodeIgniter\Entity;

class KkMainAsetTanah extends Entity
{
	protected $kk_main_aset_tanah_id;
	protected $kk_id;
	protected $aset_tanah_id;

	public function get_aset_tanah_string(){

		$skm_model = new AsetTanahModel();
		$skm_ent = $skm_model->find($this->attributes['aset_tanah_id']);
		return $skm_ent->nama_aset_tanah;

	}
}