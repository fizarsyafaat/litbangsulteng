<?php

namespace BusinessProcessRoot\Entities;

use BusinessProcessRoot\Models\RatingNilai as RatingNilaiModel;
use CodeIgniter\Entity;

class Pendata extends Entity
{
	protected $id_pendata;
	protected $kk_id;
	protected $pekerjaan;
	protected $jabatan;
	protected $sumber_data;
	protected $no_handphone;
	protected $nama;

	public function get_jumlah_aktivitas_wisata_bulanan_string(){
			$skm_model = new JumlahAktivitasWisataBulananModel();
			$skm_ent = $skm_model->find($this->attributes['jumlah_aktivitas_wisata_bulanan']);
			return $skm_ent->nama_jumlah_aktivitas_wisata_bulanan;
	}

}