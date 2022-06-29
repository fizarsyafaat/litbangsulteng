<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KomoditasIkan extends Model
{ 	 	 	
    protected $table      = 'komoditas_ikan';
    protected $primaryKey = 'komoditas_ikan_id';

    protected $returnType = "BusinessProcessRoot\Entities\KomoditasIkan";
}