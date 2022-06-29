<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class Provinsi extends Model
{ 	 	 	
    protected $table      = 'provinsi';
    protected $primaryKey = 'id_provinsi';

    protected $returnType = "BusinessProcessRoot\Entities\Provinsi";
}