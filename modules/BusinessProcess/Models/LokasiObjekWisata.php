<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class LokasiObjekWisata extends Model
{ 	 	 	
    protected $table      = 'lokasi_objek_wisata';
    protected $primaryKey = 'lokasi_objek_wisata_id';

    protected $returnType = "BusinessProcessRoot\Entities\LokasiObjekWisata";
}