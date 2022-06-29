<?php

namespace BusinessProcessRoot\Entities;

use CodeIgniter\Entity;

use BusinessProcessRoot\Models\MataPencaharianPokok as MataPencaharianPokokModel;
use BusinessProcessRoot\Models\AktivitasEkonomiLainnya as AktivitasEkonomiLainnyaModel;
use BusinessProcessRoot\Models\SumberModal as SumberModalModel;
use BusinessProcessRoot\Models\Modal as ModalModel;
use BusinessProcessRoot\Models\LabaPerBulan as LabaPerBulanModel;
use BusinessProcessRoot\Models\UangPerBulan as UangPerBulanModel;
use BusinessProcessRoot\Models\LembagaKemasyarakatan as LembagaKemasyarakatanModel;

class KkMainDataPekerjaanDanOrganisasi extends Entity
{
	protected $kk_main_data_pekerjaan_dan_organisasi_id;
	protected $kk_id;
	protected $lembaga_kemasyarakatan;
	protected $aktivitas_ekonomi;
	protected $sumber_modal;
	protected $modal;
	protected $laba_per_bulan;
	protected $penghasilan_per_bulan;
	protected $pengeluaran_per_bulan;
	protected $mata_pencaharian_pokok;

	public function get_sumber_modal_string(){
		$skm_model = new SumberModalModel();
		$skm_ent = $skm_model->find($this->attributes['sumber_modal']);
		return $skm_ent->nama_sumber_modal;
	}

	public function get_modal_string(){
		$skm_model = new ModalModel();
		$skm_ent = $skm_model->find($this->attributes['modal']);
		return $skm_ent->nama_modal;
	}

	public function get_laba_per_bulan_string(){
		$skm_model = new LabaPerBulanModel();
		$skm_ent = $skm_model->find($this->attributes['laba_per_bulan']);
		return $skm_ent->nama_laba_per_bulan;
	}

	public function get_pengeluaran_per_bulan_string(){
		$skm_model = new UangPerBulanModel();
		$skm_ent = $skm_model->find($this->attributes['pengeluaran_per_bulan']);
		return $skm_ent->nama_uang_per_bulan;
	}

	public function get_penghasilan_per_bulan_string(){
		$skm_model = new UangPerBulanModel();
		$skm_ent = $skm_model->find($this->attributes['penghasilan_per_bulan']);
		return $skm_ent->nama_uang_per_bulan;
	}

	public function get_aktivitas_ekonomi_string(){
		$skm_model = new AktivitasEkonomiLainnyaModel();
		$skm_ent = $skm_model->find($this->attributes['aktivitas_ekonomi']);
		return $skm_ent->nama_aktivitas_ekonomi_lainnya;
	}

	public function get_mata_pencaharian_pokok_string(){
		$skm_model = new MataPencaharianPokokModel();
		$skm_ent = $skm_model->find($this->attributes['mata_pencaharian_pokok']);
		return $skm_ent->nama_mata_pencaharian_pokok;
	}

	public function get_lembaga_kemasyarakatan_string(){
		$skm_model = new LembagaKemasyarakatanModel();
		$skm_ent = $skm_model->find($this->attributes['lembaga_kemasyarakatan']);
		return $skm_ent->nama_lembaga_kemasyarakatan;
	}
}