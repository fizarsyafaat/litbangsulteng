<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class SumberAirMinum extends Model
{ 	 	 	
    protected $table      = 'sumber_air_minum';
    protected $primaryKey = 'sumber_air_minum_id';

    protected $returnType = "BusinessProcessRoot\Entities\SumberAirMinum";
}