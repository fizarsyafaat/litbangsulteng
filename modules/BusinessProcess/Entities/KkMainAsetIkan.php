<?php

namespace BusinessProcessRoot\Entities;
use BusinessProcessRoot\Models\KomoditasIkan as KomoditasIkanModel; 
use BusinessProcessRoot\Models\LuasPanenIkan as LuasPanenIkanModel;
use BusinessProcessRoot\Models\JumlahProduksi as JumlahProduksiModel;
use BusinessProcessRoot\Models\HasilPemasaran as HasilPemasaranModel;
use BusinessProcessRoot\Models\JumlahEkorIkan as JumlahEkorIkanModel;
use BusinessProcessRoot\Models\JenisBibit as JenisBibitModel;
use BusinessProcessRoot\Models\JenisPakanTernak as JenisPakanTernakModel;

use CodeIgniter\Entity;

class KkMainAsetIkan extends Entity
{
	protected $kk_main_aset_ikan_id;
	protected $kk_id;
	protected $jenis_komoditas;
	protected $luas_panen;
	protected $jumlah_produksi;
	protected $hasil_pemasaran;
	protected $jumlah_ikan;
	protected $jenis_bibit_ikan;
	protected $jenis_pakan;


	public function get_komoditas_ikan_string(){

			$skm_model = new KomoditasIkanModel();
			$skm_ent = $skm_model->find($this->attributes['jenis_komoditas']);
			return $skm_ent->nama_komoditas_ikan;
	}
	public function get_luas_panen_ikan_string(){

			$skm_model = new LuasPanenIkanModel();
			$skm_ent = $skm_model->find($this->attributes['luas_panen']);
			return $skm_ent->nama_luas_panen_ikan;
	}
	public function get_jumlah_produksi_ikan_string(){

			$skm_model = new JumlahProduksiModel();
			$skm_ent = $skm_model->find($this->attributes['jumlah_produksi']);
			return $skm_ent->nama_jumlah_produksi;
	}
	public function get_hasil_pemasaran_ikan_string(){

			$skm_model = new HasilPemasaranModel();
			$skm_ent = $skm_model->find($this->attributes['hasil_pemasaran']);
			return $skm_ent->nama_hasil_pemasaran;
	}	
	public function get_jumlah_ikan_string(){

			$skm_model = new JumlahEkorIkanModel();
			$skm_ent = $skm_model->find($this->attributes['jumlah_ikan']);
			return $skm_ent->nama_jumlah_ekor_ikan;
	}
	public function get_jenis_bibit_ikan_string(){

			$skm_model = new JenisBibitModel();
			$skm_ent = $skm_model->find($this->attributes['jenis_bibit_ikan']);
			return $skm_ent->nama_jenis_bibit;
	}
	public function get_jenis_pakan_ikan_string(){

			$skm_model = new JenisPakanTernakModel();
			$skm_ent = $skm_model->find($this->attributes['jenis_pakan']);
			return $skm_ent->nama_jenis_pakan_ternak;
	}

}