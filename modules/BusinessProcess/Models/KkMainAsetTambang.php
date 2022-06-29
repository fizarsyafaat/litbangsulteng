<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAsetTambang extends Model
{
    protected $table      = 'kk_main_aset_tambang';
    protected $primaryKey = 'kk_main_aset_tambang_id'; 	

    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetTambang";
    protected $allowedFields = array('kk_id','aset_tambang_id');
}