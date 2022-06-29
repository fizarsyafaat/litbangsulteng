<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class PendidikanTerakhir extends Model
{ 	 	 	
    protected $table      = 'pendidikan_terakhir';
    protected $primaryKey = 'pendidikan_terakhir_id';

    protected $returnType = "BusinessProcessRoot\Entities\PendidikanTerakhir";
}