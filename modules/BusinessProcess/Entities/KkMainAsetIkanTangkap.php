<?php

namespace BusinessProcessRoot\Entities;

use BusinessProcessRoot\Models\AlatTangkap as AlatTangkapModel;
use BusinessProcessRoot\Models\JumlahUnitAlatTangkap as JumlahUnitAlatTangkapModel;
use CodeIgniter\Entity;

class KkMainAsetIkanTangkap extends Entity
{
	protected $kk_main_aset_ikan_tangkap_id;
	protected $kk_id;
	protected $alat_tangkap_media_ikan;
	protected $jumlah_unit;  

	public function get_alat_tangkap_media_ikan_string(){

			$skm_model = new AlatTangkapModel();
			$skm_ent = $skm_model->find($this->attributes['alat_tangkap']);
			return $skm_ent->nama_alat_tangkap;
	}
	public function get_jumlah_unit_string(){

			$skm_model = new JumlahUnitAlatTangkapModel();
			$skm_ent = $skm_model->find($this->attributes['jumlah_unit']);
			return $skm_ent->nama_jumlah_unit_alat_tangkap;
	}
}