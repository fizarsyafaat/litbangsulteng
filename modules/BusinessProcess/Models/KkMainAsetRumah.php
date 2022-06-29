<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAsetRumah extends Model
{
    protected $table      = 'kk_main_aset_rumah';
    protected $primaryKey = 'kk_main_aset_rumah_id'; 	

    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetRumah";
    protected $allowedFields = array('kk_id','sumber_air_minum','ket_sumber_air_minum','status_kepemilikan_rumah','sarana_mck','daya_listrik','luas_pekarangan_rumah','pemanfaatan_danau_dkk','atap_rumah','dinding_rumah','lantai_rumah');
}