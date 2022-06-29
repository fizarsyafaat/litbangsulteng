<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainLembagaPemerintahan extends Model
{ 	 	 	
    protected $table      = 'kk_main_lembaga_pemerintahan';
    protected $primaryKey = 'kk_main_lembaga_pemerintahan_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMainLembagaPemerintahan";
    protected $allowedFields = array('kk_id','lembaga_pemerintahan_id');
}