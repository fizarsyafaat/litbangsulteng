<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class MataPencaharianPokok extends Model
{ 	 	 	
    protected $table      = 'mata_pencaharian_pokok';
    protected $primaryKey = 'mata_pencaharian_pokok_id';

    protected $returnType = "BusinessProcessRoot\Entities\MataPencaharianPokok";
}