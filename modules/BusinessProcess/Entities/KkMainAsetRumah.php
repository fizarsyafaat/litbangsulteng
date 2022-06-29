<?php

namespace BusinessProcessRoot\Entities;
use BusinessProcessRoot\Models\SumberAirMinum as SumberAirMinumModel;
use BusinessProcessRoot\Models\KeteranganSumberAirMinum as KeteranganSumberAirMinumModel;
use BusinessProcessRoot\Models\StatusKepemilikanRumah as StatusKepemilikanRumahModel;
use BusinessProcessRoot\Models\SaranaMck as SaranaMckModel;
use BusinessProcessRoot\Models\DayaListrik as DayaListrikModel;
use BusinessProcessRoot\Models\LuasPekaranganRumah as LuasPekaranganRumahModel;
use BusinessProcessRoot\Models\PemanfaatanDanauDkk as PemanfaatanDanauDKKModel;
use BusinessProcessRoot\Models\DindingRumah as DindingRumahModel;
use BusinessProcessRoot\Models\AtapRumah as AtapRumahModel;
use BusinessProcessRoot\Models\LantaiRumah as LantaiRumahModel;
use CodeIgniter\Entity;

class KkMainAsetRumah extends Entity
{
	protected $kk_main_aset_rumah_id;
	protected $kk_id;
	protected $sumber_air_minum;
	protected $ket_sumber_air_minum;
	protected $status_kepemilikan_rumah;
	protected $sarana_mck;
	protected $daya_listrik;
	protected $luas_pekarangan_rumah;
	protected $pemanfaatan_danau_dkk;
	protected $dinding_rumah;
	protected $atap_rumah;
	protected $lantai_rumah;

	public function get_sumber_air_minum_string(){

		$skm_model = new SumberAirMinumModel();
		$skm_ent = $skm_model->find($this->attributes['sumber_air_minum']);
		return $skm_ent->nama_sumber_air_minum;

	}
	public function get_ket_sumber_air_minum_string(){

		$skm_model = new KeteranganSumberAirMinumModel();
		$skm_ent = $skm_model->find($this->attributes['ket_sumber_air_minum']);
		return $skm_ent->nama_keterangan_sumber_air_minum;

	}

	public function get_status_kepemilikan_rumah_string(){

		$skm_model = new StatusKepemilikanRumahModel();
		$skm_ent = $skm_model->find($this->attributes['status_kepemilikan_rumah']);
		return $skm_ent->nama_status_kepemilikan_rumah;

	}

	public function get_sarana_mck_string(){

		$skm_model = new SaranaMckModel();
		$skm_ent = $skm_model->find($this->attributes['sarana_mck']);
		return $skm_ent->nama_sarana_mck;

	}

	public function get_daya_listrik_string(){

		$skm_model = new DayaListrikModel();
		$skm_ent = $skm_model->find($this->attributes['daya_listrik']);
		return $skm_ent->nama_daya_listrik;

	}

	public function get_luas_pekarangan_rumah_string(){

		$skm_model = new LuasPekaranganRumahModel();
		$skm_ent = $skm_model->find($this->attributes['luas_pekarangan_rumah']);
		return $skm_ent->nama_luas_pekarangan_rumah;

	}

	public function get_pemanfaatan_danau_dkk_string(){

		$skm_model = new PemanfaatanDanauDKKModel();
		$skm_ent = $skm_model->find($this->attributes['pemanfaatan_danau_dkk']);
		return $skm_ent->nama_pemanfaatan_danau_dkk;

	}

	public function get_dinding_rumah_string(){

		$skm_model = new DindingRumahModel();
		$skm_ent = $skm_model->find($this->attributes['dinding_rumah']);
		return $skm_ent->nama_dinding_rumah;

	}

	public function get_atap_rumah_string(){

		$skm_model = new AtapRumahModel();
		$skm_ent = $skm_model->find($this->attributes['atap_rumah']);
		return $skm_ent->nama_atap_rumah;

	}

	public function get_lantai_rumah_string(){

		$skm_model = new LantaiRumahModel();
		$skm_ent = $skm_model->find($this->attributes['lantai_rumah']);
		return $skm_ent->nama_lantai_rumah;

	}
	


}