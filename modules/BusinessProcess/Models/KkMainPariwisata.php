<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainPariwisata extends Model
{ 	 	 	
    protected $table      = 'kk_main_pariwisata';
    protected $primaryKey = 'kk_main_pariwisata_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMainPariwisata";
    protected $allowedFields = array('kk_id','jumlah_biaya_wisata_bulanan','lokasi_objek_wisata','daya_tarik_wisata_palu','pengelolaan_pariwisata_palu','jumlah_aktivitas_wisata_bulanan');
}