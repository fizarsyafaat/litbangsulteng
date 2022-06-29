<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KomoditasTernak extends Model
{ 	 	 	
    protected $table      = 'komoditas_ternak';
    protected $primaryKey = 'komoditas_ternak_id';

    protected $returnType = "BusinessProcessRoot\Entities\KomoditasTernak";
}