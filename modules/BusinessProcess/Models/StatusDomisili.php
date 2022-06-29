<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class StatusDomisili extends Model
{ 	 	 	
    protected $table      = 'status_domisili';
    protected $primaryKey = 'status_domisili_id';

    protected $returnType = "BusinessProcessRoot\Entities\StatusDomisili";
}