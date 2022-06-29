<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class LamaWaktu extends Model
{ 	 	 	
    protected $table      = 'lama_waktu';
    protected $primaryKey = 'lama_waktu_id';

    protected $returnType = "BusinessProcessRoot\Entities\LamaWaktu";
}