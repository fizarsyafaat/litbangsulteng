<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class PolaMakan extends Model
{ 	 	 	
    protected $table      = 'pola_makan';
    protected $primaryKey = 'pola_makan_id';

    protected $returnType = "BusinessProcessRoot\Entities\PolaMakan";
}