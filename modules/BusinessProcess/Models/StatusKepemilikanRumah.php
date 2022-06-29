<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class StatusKepemilikanRumah extends Model
{ 	 	 	
    protected $table      = 'status_kepemilikan_rumah';
    protected $primaryKey = 'status_kepemilikan_rumah_id';

    protected $returnType = "BusinessProcessRoot\Entities\StatusKepemilikanRumah";
}