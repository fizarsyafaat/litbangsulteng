<?php

namespace BusinessProcessRoot\Entities;

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
}