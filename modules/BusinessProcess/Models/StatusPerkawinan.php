<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class StatusPerkawinan extends Model
{ 	 	 	
    protected $table      = 'status_perkawinan';
    protected $primaryKey = 'status_perkawinan_id';

    protected $returnType = "BusinessProcessRoot\Entities\StatusPerkawinan";
}