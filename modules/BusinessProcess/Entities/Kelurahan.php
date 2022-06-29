<?php

namespace BusinessProcessRoot\Entities;

use CodeIgniter\Entity;
use BusinessProcessRoot\Models\Kecamatan as KecamatanModel;

class Kelurahan extends Entity
{
	protected $id_kelurahan;
	protected $nama_kelurahan;
	protected $id_kecamatan;

	public function get_full_address(){
		$kecamatan = $this->get_kecamatan()->nama_kecamatan;

		return ", Kelurahan " . ucwords(strtolower($this->attributes['nama_kelurahan'])) . ", Kecamatan " . ucwords(strtolower($this->get_kecamatan()->nama_kecamatan));
	}


	public function get_kecamatan(){
		$kcmtn_model = new KecamatanModel();

		$kcmtn_ent = $kcmtn_model->find($this->attributes['id_kecamatan']);

		return $kcmtn_ent;
	}
}