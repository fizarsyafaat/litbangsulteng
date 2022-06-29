<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class TempatPersalinan extends Model
{ 	 	 	
    protected $table      = 'tempat_persalinan';
    protected $primaryKey = 'tempat_persalinan_id';

    protected $returnType = "BusinessProcessRoot\Entities\TempatPersalinan";
}