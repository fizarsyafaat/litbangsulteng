<?php

namespace BusinessProcessRoot\Entities;

use CodeIgniter\Entity;

use BusinessProcessRoot\Models\Agama as AgamaModel;
use BusinessProcessRoot\Models\CacatFisik as CacatFisikModel;
use BusinessProcessRoot\Models\CacatMental as CacatMentalModel;
use BusinessProcessRoot\Models\GolonganDarah as GolonganDarahModel;
use BusinessProcessRoot\Models\HubunganDenganKepalaKeluarga as HubunganDenganKepalaKeluargaModel;
use BusinessProcessRoot\Models\JenisJaminanSosial as JenisJaminanSosialModel;
use BusinessProcessRoot\Models\LamaWaktu as LamaWaktuModel;
use BusinessProcessRoot\Models\PendidikanTerakhir as PendidikanTerakhirModel;
use BusinessProcessRoot\Models\StatusPerkawinan as StatusPerkawinanModel;
use BusinessProcessRoot\Models\StatusDomisili as StatusDomisiliModel;
use BusinessProcessRoot\Models\StatusKemiskinan as StatusKemiskinanModel;
use BusinessProcessRoot\Models\WajibIuran as WajibIuranModel;

class KkMainDataUtamaResponden extends Entity
{
	protected $data_utama_responden_id ;
	protected $kk_id;
	protected $nik_responden;
	protected $nama_lengkap;
	protected $jenis_kelamin;
	protected $hubungan_dengan_kepala_keluarga;
	protected $status_perkawinan;
	protected $agama;
	protected $golongan_darah;
	protected $kewarganegaraan;
	protected $etnis_suku;
	protected $pendidikan_terakhir;
	protected $status_domisili;
	protected $cacat_fisik;
	protected $cacat_mental;
	protected $status_kemiskinan;
	protected $pengguna_bpjs;
	protected $jenis_jaminan_sosial;
	protected $lama_waktu ;
	protected $wajib_iuran ;

	public function get_kewarganegaraan_string(){
		switch($this->attributes['kewarganegaraan']){
			case '1':
				return "Warga Negara Indonesia";
			break;

			case '2':
				return "Warga Negara Asing";
			break;

			default:
				return "Warga Negara Indonesia";
			break;
		}
	}

	public function get_jenis_kelamin_responden_string(){
		switch($this->attributes['pengguna_bpjs']){
			case '1':
				return "Laki-laki";
			break;

			case '2':
				return "Perempuan";
			break;

			default:
				return "Laki-laki";
			break;
		}
	}

	public function get_pendidikan_terakhir_string(){
		$skm_model = new PendidikanTerakhirModel();
		$skm_ent = $skm_model->find($this->attributes['pendidikan_terakhir']);
		return $skm_ent->nama_pendidikan_terakhir;
	}

	public function get_hubungan_dengan_kepala_keluarga_string(){
		$skm_model = new HubunganDenganKepalaKeluargaModel();
		$skm_ent = $skm_model->find($this->attributes['hubungan_dengan_kepala_keluarga']);
		return $skm_ent->nama_hubungan_dengan_kepala_keluarga;
	}

	public function get_status_perkawinan_string(){
		$skm_model = new StatusPerkawinanModel();
		$skm_ent = $skm_model->find($this->attributes['status_perkawinan']);
		return $skm_ent->nama_status_perkawinan;
	}

	public function get_status_domisili_string(){
		$skm_model = new StatusDomisiliModel();
		$skm_ent = $skm_model->find($this->attributes['status_domisili']);
		return $skm_ent->nama_status_domisili;
	}

	public function get_agama_string(){
		$skm_model = new AgamaModel();
		$skm_ent = $skm_model->find($this->attributes['agama']);
		return $skm_ent->nama_agama;
	}

	public function get_golongan_darah_string(){
		$skm_model = new GolonganDarahModel();
		$skm_ent = $skm_model->find($this->attributes['golongan_darah']);
		return $skm_ent->nama_golongan_darah;
	}

	public function get_cacat_fisik_string(){
		$skm_model = new CacatFisikModel();
		$skm_ent = $skm_model->find($this->attributes['cacat_fisik']);
		return $skm_ent->nama_cacat_fisik;
	}

	public function get_cacat_mental_string(){
		$skm_model = new CacatMentalModel();
		$skm_ent = $skm_model->find($this->attributes['cacat_mental']);
		return $skm_ent->nama_cacat_mental;
	}

	public function get_status_kemiskinan_string(){
		$skm_model = new StatusKemiskinanModel();
		$skm_ent = $skm_model->find($this->attributes['status_kemiskinan']);
		return $skm_ent->nama_status_kemiskinan;
	}

	public function get_jenis_jaminan_sosial_string(){
		$skm_model = new JenisJaminanSosialModel();
		$skm_ent = $skm_model->find($this->attributes['jenis_jaminan_sosial']);
		return $skm_ent->nama_jenis_jaminan_sosial;
	}

	public function get_lama_waktu_string(){
		$skm_model = new LamaWaktuModel();
		$skm_ent = $skm_model->find($this->attributes['lama_waktu']);
		return $skm_ent->nama_lama_waktu;
	}

	public function get_wajib_iuran_string(){
		$skm_model = new WajibIuranModel();
		$skm_ent = $skm_model->find($this->attributes['wajib_iuran']);
		return $skm_ent->nama_wajib_iuran;
	}

	public function get_pengguna_bpjs_string(){
		switch($this->attributes['pengguna_bpjs']){
			case '1':
				return "Yes";
			break;

			case '0':
				return "No";
			break;

			default:
				return "No";
			break;
		}
	}
}