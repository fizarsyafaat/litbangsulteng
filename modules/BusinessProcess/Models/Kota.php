<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;
class Kota extends Model
{ 	 	 	
    protected $table      = 'kota';
    protected $primaryKey = 'id_kota';

    protected $returnType = "BusinessProcessRoot\Entities\Kota";
}