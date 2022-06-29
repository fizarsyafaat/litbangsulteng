<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KomoditasTanamanPangan extends Model
{ 	 	 	
    protected $table      = 'komoditas_tanaman_pangan';
    protected $primaryKey = 'komoditas_tanaman_pangan_id';

    protected $returnType = "BusinessProcessRoot\Entities\KomoditasTanamanPangan";
}