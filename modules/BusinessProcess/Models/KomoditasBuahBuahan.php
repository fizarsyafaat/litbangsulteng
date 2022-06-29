<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KomoditasBuahBuahan extends Model
{ 	 	 	
    protected $table      = 'komoditas_buah_buahan';
    protected $primaryKey = 'komoditas_buah_buahan_id';

    protected $returnType = "BusinessProcessRoot\Entities\KomoditasBuahBuahan";
}