<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KualitasBayi extends Model
{ 	 	 	
    protected $table      = 'kualitas_bayi';
    protected $primaryKey = 'kualitas_bayi_id';

    protected $returnType = "BusinessProcessRoot\Entities\KualitasBayi";
}