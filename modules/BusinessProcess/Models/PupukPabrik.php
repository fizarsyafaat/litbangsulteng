<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class PupukPabrik extends Model
{ 	 	 	
    protected $table      = 'pupuk_pabrik';
    protected $primaryKey = 'pupuk_pabrik_id';

    protected $returnType = "BusinessProcessRoot\Entities\PupukPabrik";
}