<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAsetTanah extends Model
{
    protected $table      = 'kk_main_aset_tanah';
    protected $primaryKey = 'kk_main_aset_tanah_id'; 	

    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetTanah";
    protected $allowedFields = array('kk_id','aset_tanah_id');
}