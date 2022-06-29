<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainLembagaPendidikan extends Model
{ 	 	 	
    protected $table      = 'kk_main_lembaga_pendidikan';
    protected $primaryKey = 'kk_main_lembaga_pendidikan_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMainLembagaPendidikan";
    protected $allowedFields = array('kk_id','lembaga_pendidikan');
}