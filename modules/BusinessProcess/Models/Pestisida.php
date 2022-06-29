<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class Pestisida extends Model
{ 	 	 	
    protected $table      = 'pestisida';
    protected $primaryKey = 'pestisida_id';

    protected $returnType = "BusinessProcessRoot\Entities\Pestisida";
}