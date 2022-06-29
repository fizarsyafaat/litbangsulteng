<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KomoditasTanamanObat extends Model
{ 	 	 	
    protected $table      = 'komoditas_tanaman_obat';
    protected $primaryKey = 'komoditas_tanaman_obat_id';

    protected $returnType = "BusinessProcessRoot\Entities\KomoditasTanamanObat";
}