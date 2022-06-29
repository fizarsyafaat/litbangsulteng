<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainWajibPajak extends Model
{ 	 	 	
    protected $table      = 'kk_main_wajib_pajak';
    protected $primaryKey = 'kk_main_wajib_pajak_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMainWajibPajak";
    protected $allowedFields = array('kk_id','wajib_pajak_id');
}