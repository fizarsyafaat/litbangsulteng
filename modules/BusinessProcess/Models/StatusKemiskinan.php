<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class StatusKemiskinan extends Model
{ 	 	 	
    protected $table      = 'status_kemiskinan';
    protected $primaryKey = 'status_kemiskinan_id';

    protected $returnType = "BusinessProcessRoot\Entities\StatusKemiskinan";
}