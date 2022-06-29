<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class LantaiRumah extends Model
{ 	 	 	
    protected $table      = 'lantai_rumah';
    protected $primaryKey = 'lantai_rumah_id';

    protected $returnType = "BusinessProcessRoot\Entities\LantaiRumah";
}