<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KomoditasKehutanan extends Model
{ 	 	 	
    protected $table      = 'komoditas_kehutanan';
    protected $primaryKey = 'komoditas_kehutanan_id';

    protected $returnType = "BusinessProcessRoot\Entities\KomoditasKehutanan";
}