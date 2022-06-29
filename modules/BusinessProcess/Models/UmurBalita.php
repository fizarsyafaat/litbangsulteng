<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class UmurBalita extends Model
{ 	 	 	
    protected $table      = 'umur_balita';
    protected $primaryKey = 'umur_balita_id';

    protected $returnType = "BusinessProcessRoot\Entities\UmurBalita";
}