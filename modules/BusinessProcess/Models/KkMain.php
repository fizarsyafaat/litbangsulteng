<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;
 	 	 	 	
class KkMain extends Model
{ 	
    protected $table      = 'kk_main';
    protected $primaryKey = 'kk_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMain";
    protected $allowedFields = array('no_kk',"kode_pum","alamat","rt","rw","kelurahan","kode_pos","no_k","tanggal_dikeluarkan","pihak_mengeluarkan","kepala_keluarga","data_collection_time");
}