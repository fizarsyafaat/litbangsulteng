<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class LembagaKemasyarakatan extends Model
{ 	 	 	
    protected $table      = 'lembaga_kemasyarakatan';
    protected $primaryKey = 'lembaga_kemasyarakatan_id';

    protected $returnType = "BusinessProcessRoot\Entities\LembagaKemasyarakatan";
}