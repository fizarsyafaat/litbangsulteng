<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAsetTernak extends Model
{
    protected $table      = 'kk_main_aset_ternak';
    protected $primaryKey = 'kk_main_aset_ternak_id'; 	
    
    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetTanamanPangan";
    protected $allowedFields = array('kk_id','jenis_ternak','luas_kandang','jumlah_ekor','jenis_hasil_ternak','jumlah_produksi_hasil_ternak','pemasaran_hasil_ternak','jenis_pakan_ternak');
}