<?php

namespace BusinessProcessRoot\Entities;

use BusinessProcessRoot\Models\PenderitaSakitKelainan as PenderitaSakitKelainanModel;
use BusinessProcessRoot\Models\PerilakuHidupBersih as PerilakuHidupBersihModel;
use BusinessProcessRoot\Models\PolaMakan as PolaMakanModel;
use BusinessProcessRoot\Models\KebiasaanBerobat as KebiasaanBerobatModel;
use BusinessProcessRoot\Models\JenisPenyakit as JenisPenyakitModel;
use CodeIgniter\Entity;

class KkMainKesehatan extends Entity
{
	protected $kk_main_kesehatan_id;
	protected $kk_id;
	protected $penderita_sakit_kelainan;
	protected $perilaku_hidup_bersih;
	protected $pola_makan;
	protected $kebiasaan_berobat;
	protected $jenis_penyakit;

		public function get_penderita_sakit_kelainan_string(){
			$skm_model = new PenderitaSakitKelainanModel();
			$skm_ent = $skm_model->find($this->attributes['penderita_sakit_kelainan']);
			return $skm_ent->nama_penderita_sakit_kelainan;
	}
		public function get_perilaku_hidup_bersih_string(){
			$skm_model = new PerilakuHidupBersihModel();
			$skm_ent = $skm_model->find($this->attributes['perilaku_hidup_bersih']);
			return $skm_ent->nama_perilaku_hidup_bersih;
	}
		public function get_pola_makan_string(){
			$skm_model = new PolaMakanModel();
			$skm_ent = $skm_model->find($this->attributes['pola_makan']);
			return $skm_ent->nama_pola_makan;
	}
		public function get_kebiasaan_berobat_string(){
			$skm_model = new KebiasaanBerobatModel();
			$skm_ent = $skm_model->find($this->attributes['kebiasaan_berobat']);
			return $skm_ent->nama_kebiasaan_berobat;
	}
		public function get_jenis_penyakit_string(){
			$skm_model = new JenisPenyakitModel();
			$skm_ent = $skm_model->find($this->attributes['jenis_penyakit']);
			return $skm_ent->nama_jenis_penyakit;
	}
}