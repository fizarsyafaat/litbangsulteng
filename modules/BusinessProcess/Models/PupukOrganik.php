<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class PupukOrganik extends Model
{ 	 	 	
    protected $table      = 'pupuk_organik';
    protected $primaryKey = 'pupuk_organik_id';

    protected $returnType = "BusinessProcessRoot\Entities\PupukOrganik";
}