<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAsetLainnya extends Model
{ 	
    protected $table      = 'kk_main_aset_lainnya';
    protected $primaryKey = 'kk_main_aset_lainnya_id';
    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetLainnya";
    protected $allowedFields = array('kk_id','aset_lainnya_id');
}