<?php

namespace BusinessProcessRoot\Entities;

use BusinessProcessRoot\Models\KualitasIbuHamil as KualitasIbuHamilModel;
use BusinessProcessRoot\Models\KualitasBayi as KualitasBayiModel;
use BusinessProcessRoot\Models\TempatPersalinan as TempatPersalinanModel;
use BusinessProcessRoot\Models\PertolonganPersalinan as PertolonganPersalinanModel;
use BusinessProcessRoot\Models\FasilitasLayananKesehatan as FasilitasLayananKesehatanModel;
use BusinessProcessRoot\Models\UmurBalita as UmurBalitaModel;
use BusinessProcessRoot\Models\BeratBadan as BeratBadanModel;
use BusinessProcessRoot\Models\KondisiSaatPengukuran as KondisiSaatPengukuranModel;
use BusinessProcessRoot\Models\TinggiBadan as TinggiBadanModel;
use BusinessProcessRoot\Models\StatusGiziBalita as StatusGiziBalitaModel;
use CodeIgniter\Entity;

class KkMainPersalinan extends Entity
{
	protected $kk_main_persalinan_id;
	protected $kk_id;
	protected $kualitas_ibu_hamil;
	protected $kualitas_bayi;
	protected $tempat_persalinan;
	protected $pertolongan_persalinan;
	protected $fasilitas_layanan_kesehatan;
	protected $jenis_kelamin_balita;
	protected $umur;
	protected $berat_badan;
	protected $tinggi_badan;
	protected $kondisi_saat_pengukuran;
	protected $status_gizi_balita;


	public function get_kualitas_ibu_hamil_string(){
		$skm_model = new KualitasIbuHamilModel();
		$skm_ent = $skm_model->find($this->attributes['kualitas_ibu_hamil']);
		return $skm_ent->nama_kualitas_ibu_hamil;
	}

	public function get_jenis_kelamin_balita_string (){
		switch ($this->attributes['jenis_kelamin_balita']) {
			case '1':
				return 'laki laki';
				break;
			case '2':
				return 'perempuan';
				break;
			default:
				return 'data tidak di ketahui';
				break;
		}
	}

	public function get_kualitas_bayi_string(){
		$skm_model = new KualitasBayiModel();
		$skm_ent = $skm_model->find($this->attributes['kualitas_bayi']);
		return $skm_ent->nama_kualitas_bayi;
	}
	public function get_tempat_persalinan_string(){
		$skm_model = new TempatPersalinanModel();
		$skm_ent = $skm_model->find($this->attributes['tempat_persalinan']);
		return $skm_ent->nama_tempat_persalinan;
	}
	public function get_pertolongan_persalinan_string(){
		$skm_model = new PertolonganPersalinanModel();
		$skm_ent = $skm_model->find($this->attributes['pertolongan_persalinan']);
		return $skm_ent->nama_pertolongan_persalinan;
	}
	public function get_fasilitas_layanan_kesehatan_string(){
		$skm_model = new FasilitasLayananKesehatanModel();
		$skm_ent = $skm_model->find($this->attributes['fasilitas_layanan_kesehatan']);
		return $skm_ent->nama_fasilitas_layanan_kesehatan;
	}
	public function get_umur_balita_string(){
		$skm_model = new UmurBalitaModel();
		$skm_ent = $skm_model->find($this->attributes['umur']);
		return $skm_ent->nama_umur_balita;
	}
	public function get_berat_badan_string(){
		$skm_model = new BeratBadanModel();
		$skm_ent = $skm_model->find($this->attributes['berat_badan']);
		return $skm_ent->nama_berat_badan;
	}
	public function get_tinggi_badan_string(){
		$skm_model = new TinggiBadanModel();
		$skm_ent = $skm_model->find($this->attributes['tinggi_badan']);
		return $skm_ent->nama_tinggi_badan;
	}
	public function get_kondisi_saat_pengukuran_string(){
		$skm_model = new KondisiSaatPengukuranModel();
		$skm_ent = $skm_model->find($this->attributes['kondisi_saat_pengukuran']);
		return $skm_ent->nama_kondisi_saat_pengukuran;
	}
	public function get_status_gizi_balita_string(){
		$skm_model = new StatusGiziBalitaModel();
		$skm_ent = $skm_model->find($this->attributes['status_gizi_balita']);
		return $skm_ent->nama_status_gizi_balita;
	}
}