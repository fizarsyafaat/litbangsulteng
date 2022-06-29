<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class LuasLahan extends Model
{ 	 	 	
    protected $table      = 'luas_lahan';
    protected $primaryKey = 'luas_lahan_id';

    protected $returnType = "BusinessProcessRoot\Entities\LuasLahan";
}