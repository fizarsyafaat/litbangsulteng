<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class PertolonganPersalinan extends Model
{ 	 	 	
    protected $table      = 'pertolongan_persalinan';
    protected $primaryKey = 'pertolongan_persalinan_id';

    protected $returnType = "BusinessProcessRoot\Entities\PertolonganPersalinan";
}