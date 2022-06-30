<?php

namespace BusinessProcessRoot\Entities;
use BusinessProcessRoot\Models\KomoditasTanamanPangan as KomoditasTanamanPanganModel;
use BusinessProcessRoot\Models\HasilPemasaran as HasilPemasaranModel;
use BusinessProcessRoot\Models\JumlahProduksi as JumlahProduksiModel;
use BusinessProcessRoot\Models\JumlahPohon as JumlahPohonModel;
use BusinessProcessRoot\Models\JenisBibit as JenisBibitModel;
use BusinessProcessRoot\Models\Pestisida as PestisidaModel;
use BusinessProcessRoot\Models\PupukOrganik as PupukOrganikModel;
use BusinessProcessRoot\Models\PupukPabrik as PupukPabrikModel;
use BusinessProcessRoot\Models\LuasLahan as LuasLahanModel;
use CodeIgniter\Entity;

class KkMainAsetTanamanPangan extends Entity
{
	protected $kk_main_aset_perkebunan_id;
	protected $kk_id;
	protected $jenis_komoditas;
	protected $luas_panen;
	protected $jumlah_produksi;
	protected $jumlah_pohon;
	protected $jenis_bibit;
	protected $pestisida;
	protected $pupuk_organik;
	protected $pupuk_pabrik;
	protected $lokasi;
	protected $hasil_pemasaran;

	public function get_jenis_komoditas_pangan_string(){

			$skm_model = new KomoditasTanamanPanganModel();
		$skm_ent = $skm_model->find($this->attributes['jenis_komoditas']);
		return $skm_ent->nama_komoditas_tanaman_pangan;
	}

	public function get_luas_panen_string(){

			$skm_model = new LuasLahanModel();
			$skm_ent = $skm_model->find($this->attributes['luas_panen']);
			return $skm_ent->nama_luas_lahan;
	}

	public function get_jumlah_produksi_string(){

			$skm_model = new JumlahProduksiModel();
			$skm_ent = $skm_model->find($this->attributes['jumlah_produksi']);
			return $skm_ent->nama_jumlah_produksi;
	}


	public function get_jumlah_pohon_string(){

			$skm_model = new JumlahPohonModel();
			$skm_ent = $skm_model->find($this->attributes['jumlah_pohon']);
			return $skm_ent->nama_jumlah_pohon;
	}


	public function get_jenis_bibit_string(){

			$skm_model = new JenisBibitModel();
			$skm_ent = $skm_model->find($this->attributes['jenis_bibit']);
			return $skm_ent->nama_jenis_bibit;
	}

	public function get_pestisida_string(){

			$skm_model = new PestisidaModel();
			$skm_ent = $skm_model->find($this->attributes['pestisida']);
			return $skm_ent->nama_pestisida;
	}

	public function get_pupuk_organik_string(){

			$skm_model = new PupukOrganikModel();
			$skm_ent = $skm_model->find($this->attributes['pupuk_organik']);
			return $skm_ent->nama_pupuk_organik;
	}

	public function get_pupuk_pabrik_string(){

			$skm_model = new PupukPabrikModel();
			$skm_ent = $skm_model->find($this->attributes['pupuk_pabrik']);
			return $skm_ent->nama_pupuk_pabrik;
	}

	public function get_hasil_pemasaran_string(){

		$skm_model = new HasilPemasaranModel();
		$skm_ent = $skm_model->find($this->attributes['hasil_pemasaran']);
		return $skm_ent->nama_hasil_pemasaran;

	}

}