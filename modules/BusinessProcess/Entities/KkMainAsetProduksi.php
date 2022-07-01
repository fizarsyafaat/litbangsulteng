<?php

namespace BusinessProcessRoot\Entities;

use BusinessProcessRoot\Models\AsetSaranaProduksi as AsetSaranaProduksiModel;
use CodeIgniter\Entity;

class KkMainAsetProduksi extends Entity
{
	protected $kk_main_aset_produksi_id;
	protected $kk_id;
	protected $aset_produksi;

	public function get_aset_produksi_string(){
		$skm_model = new AsetSaranaProduksiModel();
		$skm_ent = $skm_model->find($this->attributes['aset_produksi']);
		return $skm_ent->nama_aset_sarana_produksi; 
	}
}