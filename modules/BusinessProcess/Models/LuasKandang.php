<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class LuasKandang extends Model
{ 	 	 	
    protected $table      = 'luas_kandang';
    protected $primaryKey = 'luas_kandang_id';

    protected $returnType = "BusinessProcessRoot\Entities\LuasKandang";
}