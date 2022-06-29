<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class Log extends Model
{ 	 	 	
    protected $table      = 'log';
    protected $primaryKey = 'id_log';

    protected $returnType = "BusinessProcessRoot\Entities\Log";
}