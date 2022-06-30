<?php

namespace BusinessProcessRoot\Entities;
use BusinessProcessRoot\Models\KomoditasTernak as KomoditasTernakModel;
use BusinessProcessRoot\Models\LuasKandang as LuasKandangModel;
use BusinessProcessRoot\Models\JumlahEkor as JumlahEkorModel;
use BusinessProcessRoot\Models\JenisKomoditasHasilTernak as JenisKomoditasHasilTernakModel;
use BusinessProcessRoot\Models\JumlahProduksi as JumlahProduksiModel;
use BusinessProcessRoot\Models\HasilPemasaran as HasilPemasaranModel;
use BusinessProcessRoot\Models\JenisPakanTernak as JenisPakanTernakModel;
use CodeIgniter\Entity;

class KkMainAsetTernak extends Entity
{
	protected $kk_main_aset_ternak_id;
	protected $kk_id;
	protected $jenis_ternak;
	protected $luas_kandang;
	protected $jumlah_ekor;
	protected $jenis_hasil_ternak;
	protected $jumlah_produksi_hasil_ternak;
	protected $pemasaran_hasil_ternak;
	protected $jenis_pakan_ternak;


	public function get_jenis_ternak_string() {
		$skm_model = new KomoditasTernakModel();
		$skm_ent = $skm_model->find($this->attributes['jenis_ternak']);
		return $skm_ent->nama_komoditas_ternak;
	}
	public function get_luas_kandang_string() {
		$skm_model = new LuasKandangModel();
		$skm_ent = $skm_model->find($this->attributes['luas_kandang']);
		return $skm_ent->nama_luas_kandang;
	}

	public function get_jumlah_ekor_string() {
		$skm_model = new JumlahEkorModel();
		$skm_ent = $skm_model->find($this->attributes['jumlah_ekor']);
		return $skm_ent->nama_jumlah_ekor;
	}

	public function get_jenis_hasil_ternak_string() {
		$skm_model = new JenisKomoditasHasilTernakModel();
		$skm_ent = $skm_model->find($this->attributes['jenis_hasil_ternak']);
		return $skm_ent->nama_jenis_komoditas_hasil_ternak;
	}

	public function get_jumlah_produksi_hasil_ternak_string() {
		$skm_model = new JumlahProduksiModel();
		$skm_ent = $skm_model->find($this->attributes['jumlah_produksi_hasil_ternak']);
		return $skm_ent->nama_jumlah_produksi;
	}

	public function get_pemasaran_hasil_ternak_string() {
		$skm_model = new HasilPemasaranModel();
		$skm_ent = $skm_model->find($this->attributes['pemasaran_hasil_ternak']);
		return $skm_ent->nama_hasil_pemasaran;
	}

	public function get_jenis_pakan_ternak_string() {
		$skm_model = new JenisPakanTernakModel();
		$skm_ent = $skm_model->find($this->attributes['jenis_pakan_ternak']);
		return $skm_ent->nama_jenis_pakan_ternak;
	}


}