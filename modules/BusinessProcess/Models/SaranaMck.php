<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class SaranaMck extends Model
{ 	 	 	
    protected $table      = 'sarana_mck';
    protected $primaryKey = 'sarana_mck_id';

    protected $returnType = "BusinessProcessRoot\Entities\SaranaMck";
}