<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class PemanfaatanDanauDkk extends Model
{ 	 	 	
    protected $table      = 'pemanfaatan_danau_dkk';
    protected $primaryKey = 'pemanfaatan_danau_dkk_id';

    protected $returnType = "BusinessProcessRoot\Entities\PemanfaatanDanauDkk";
}