<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KomoditasPerkebunan extends Model
{ 	 	 	
    protected $table      = 'komoditas_perkebunan';
    protected $primaryKey = 'komoditas_perkebunan_id';

    protected $returnType = "BusinessProcessRoot\Entities\KomoditasPerkebunan";
}