<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainPersalinan extends Model
{ 	 	 	
    protected $table      = 'kk_main_persalinan';
    protected $primaryKey = 'kk_main_persalinan_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMainPersalinan";
    protected $allowedFields = array('kk_id','kualitas_ibu_hamil','kualitas_bayi','tempat_persalinan','pertolongan_persalinan','fasilitas_layanan_kesehatan','jenis_kelamin_balita','umur','berat_badan','tinggi_badan','kondisi_saat_pengukuran','status_gizi_balita');
}