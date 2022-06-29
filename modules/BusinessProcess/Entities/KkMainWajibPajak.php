<?php

namespace BusinessProcessRoot\Entities;

use CodeIgniter\Entity;
use BusinessProcessRoot\Models\KewajibanWajibPajakRetribusi as KewajibanWajibPajakRetribusiModel;

class KkMainWajibPajak extends Entity
{
	protected $kk_main_wajib_pajak_id;
	protected $kk_id;
	protected $wajib_pajak_id;


	public function get_wajib_pajak_retribusi_string(){
		$skm_model = new KewajibanWajibPajakRetribusiModel();
		$skm_ent = $skm_model->find($this->attributes['wajib_pajak_id']);
		return $skm_ent->nama_wajib_pajak_retribusi;
	}
}