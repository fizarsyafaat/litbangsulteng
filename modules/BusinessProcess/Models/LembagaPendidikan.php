<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class LembagaPendidikan extends Model
{ 	 	 	
    protected $table      = 'lembaga_pendidikan';
    protected $primaryKey = 'lembaga_pendidikan_id';

    protected $returnType = "BusinessProcessRoot\Entities\LembagaPendidikan";
}