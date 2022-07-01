<?php

namespace BusinessProcessRoot\Entities;

use BusinessProcessRoot\Models\AsetTransportasiUmum as AsetTransportasiUmumModel;
use CodeIgniter\Entity;

class KkMainAsetTransportasiUmum extends Entity
{
	protected $kk_main_aset_transportasi_umum_id;
	protected $kk_id;
	protected $aset_transportasi;

	public function get_transportasi_umum_string(){
		$skm_model = new AsetTransportasiUmumModel();
		$skm_ent = $skm_model->find($this->attributes['aset_transportasi']);
		return $skm_ent->nama_aset_transportasi_umum; 
	}
}