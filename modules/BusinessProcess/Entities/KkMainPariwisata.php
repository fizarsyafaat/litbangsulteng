<?php

namespace BusinessProcessRoot\Entities;

use BusinessProcessRoot\Models\JumlahAktivitasWisataBulanan as JumlahAktivitasWisataBulananModel;
use BusinessProcessRoot\Models\JumlahBiayaWisataBulanan as JumlahBiayaWisataBulananModel;
use BusinessProcessRoot\Models\LokasiObjekWisata as LokasiObjekWisataModel;


use CodeIgniter\Entity;

class KkMainPariwisata extends Entity
{
	protected $kk_main_pariwisata_id;
	protected $kk_id;
	protected $jumlah_aktivitas_wisata_bulanan;
	protected $jumlah_biaya_wisata_bulanan;
	protected $lokasi_objek_wisata;
	protected $daya_tarik_wisata_palu;
	protected $pengelolaan_pariwisata_palu;

	public function get_jumlah_aktivitas_wisata_bulanan_string(){
			$skm_model = new JumlahAktivitasWisataBulananModel();
			$skm_ent = $skm_model->find($this->attributes['jumlah_aktivitas_wisata_bulanan']);
			return $skm_ent->nama_jumlah_aktivitas_wisata_bulanan;
	}

	public function get_jumlah_biaya_wisata_bulanan_string(){

			$skm_model = new JumlahBiayaWisataBulananModel();
			$skm_ent = $skm_model->find($this->attributes['jumlah_biaya_wisata_bulanan']);
			return $skm_ent->nama_jumlah_biaya_wisata_bulanan;
	}
	public function get_lokasi_objek_wisata_string(){

			$skm_model = new LokasiObjekWisataModel();
			$skm_ent = $skm_model->find($this->attributes['lokasi_objek_wisata']);
			return $skm_ent->nama_lokasi_objek_wisata;
	}
}